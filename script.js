listarClientes();	

function listarClientes(){
    fetch("listaClientes.html")
    .then((response) => response.text())
    .then((data) => {
        document.getElementById("contenedor").innerHTML = data;
        mostrarClientes();
    });
}

function mostrarClientes(){
    fetch("listar.php")
    .then((response) => response.text())
    .then((data) => {
        clientes = JSON.parse(data);
        console.log(clientes);
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
            </td>
            `;
            cuerpoTabla.appendChild(fila);
        });
    });
}

function buscarCliente(id){
    fetch("formEditar.html")
    .then((response) => response.text())
    .then((data) => {
        document.getElementById("contenedor").innerHTML = data;
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