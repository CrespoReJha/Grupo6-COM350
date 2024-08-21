<?php
include("conexion.php");

//$id = $_POST['id'];
$ci = $_POST['ci'];
$nombre = $_POST['nombre'];
$celular = $_POST['celular'];
$membresia = $_POST['membresia'];
$registroPago = $_POST['registroPago'];
//$estado = $_POST['estado'];

$sql = "INSERT INTO clientes(ci, nombre, celular, membresia, estado) VALUES ('$ci', '$nombre', '$celular', '$membresia', 'activo')";

$result = $con->query($sql);  
if(!$result){
    die("Error al insertar datos: " . $con->error);
}

$ultimoIdCliente = $con->insert_id;

$sql2 = "SELECT precio FROM membresia WHERE id = $membresia";
$result2 = $con->query($sql2);
if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $precio = $row['precio'];
    $fechaRegistro = date('Y-m-d');
    if($registroPago == 1){
        $sql3 = "INSERT INTO pagos(id_cliente, monto, detalle, fecha_pago, estado) VALUES ('$ultimoIdCliente', '$precio', 'Pago de membresia', '$fechaRegistro', 'Pagado')";
    }else{
        $sql3 = "INSERT INTO pagos(id_cliente, monto, detalle, fecha_pago, estado) VALUES ('$ultimoIdCliente', '$precio', 'Pago de membresia', '$fechaRegistro', 'Pendiente')";
    }
    $result3 = $con->query($sql3);
    if(!$result3){
        die("Error al insertar datos: " . $con->error);
    }

}
?>