
function mostrarContenido() {
    fetch('listar_pagos.php') 
        .then(response => response.text())
        .then(data => {
            document.getElementById('contenido').innerHTML = data;
        })
        .catch(error => console.error('Error al cargar el contenido:', error));
}

function listarClientes(){
    fetch("listaClientes.html")
    .then((response) => response.text())
    .then((data) => {
        document.getElementById("contenido").innerHTML = data;
        mostrarClientes();
    });
}

function mostrarClientes(){
    fetch("listar.php")
    .then((response) => response.text())
    .then((data) => {
        clientes = JSON.parse(data);
        //console.log(clientes);
        cuerpoTabla = document.getElementById("clientes");
        clientes.forEach(cliente => {
            fila = document.createElement("tr");
            fila.innerHTML = `
            <td>${cliente.ci}</td>
            <td>${cliente.nombre}</td>
            <td>${cliente.celular}</td>
            <td>${cliente.membresia}</td>
            <td>${cliente.estado}</td>
            <td>
                <button onclick="buscarCliente(${cliente.id})">Editar</button>
                ${cliente.estado == 'inactivo' ? '<button id="btn_eliminar" onclick="eliminarCliente(' + cliente.id + ')" class="cancelar">Eliminar</button>' : ''}
            </td>
            `;
            cuerpoTabla.appendChild(fila);
        });
    });
}

function buscarCliente(id){
    fetch("formEditar.php")
    .then((response) => response.text())
    .then((data) => {
        document.getElementById("contenido").innerHTML = data;
        fetch("buscarCliente.php?id="+id)
        .then((response) => response.text())
        .then((data) => {
            cliente = JSON.parse(data);
            console.log(cliente);
            document.getElementById("ci").value = cliente.ci;
            document.getElementById("nombre").value = cliente.nombre;
            document.getElementById("celular").value = cliente.celular;
            document.getElementById("membresia").value = cliente.membresia;
            document.getElementById("estado").value = cliente.estado;
            document.getElementById("id").value = cliente.id;
        });
    });
}

function editar(){
    var formulario = new FormData(document.getElementById("formEditar"));
    fetch("editarCliente.php", {
        method: "POST",
        body: formulario
    })
    .then((response) => response.text())
    .then((data) => {
        console.log(data);
        listarClientes();
    });
}

function cancelarEdicion(){
    listarClientes();
}

function nuevoCliente(){
    console.log("Nuevo cliente");
    fetch("formNuevo.php")
    .then((response) => response.text())
    .then((data) => {
        document.getElementById("contenido").innerHTML = data;
        cambiarPago();
    });
}

function insertarCliente(){
    var formulario = new FormData(document.getElementById("formNuevo"));
    fetch("insertarCliente.php", {
        method: "POST",
        body: formulario
    })
    .then((response) => response.text())
    .then((data) => {
        console.log(data);
        listarClientes();
    });
}
function cambiarPago(){
    var selectMembresia = document.getElementById("membresia");
    selectMembresia.addEventListener("change", function() {
        //console.log(selectMembresia.value);
        fetch("obtenerMembresias.php")
        .then((response) => response.text())
        .then((data) => {
            //console.log(data);
            membresias = JSON.parse(data);
            //console.log(membresias);
            for (let i = 0; i < membresias.length; i++) {
                console.log(membresias[i].nombre);
                if(membresias[i].id == selectMembresia.value){
                    document.getElementById("pago").innerHTML = "Monto a Pagar: " + membresias[i].precio + " Bs.";
                }
            }
        });
    });
}

function eliminarCliente(id) {
    if (confirm("¿Estás seguro de que deseas eliminar este cliente?")) {
        var formData = new FormData();
        formData.append("id", id);

        fetch("eliminarCliente.php", {
            method: "POST",
            body: formData
        })
        .then((response) => response.text())
        .then((data) => {
            console.log(data);
            listarClientes(); // Recargar la lista de clientes
        })
        .catch((error) => {
            console.error("Error:", error);
        });
    }
}