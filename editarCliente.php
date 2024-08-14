<?php
include("conexion.php");

$id = $_POST['id'];
$ci = $_POST['ci'];
$nombre = $_POST['nombre'];
$celular = $_POST['celular'];
$membresia = $_POST['membresia'];
$estado = $_POST['estado'];

$sql = "UPDATE clientes SET ci = '$ci', nombre = '$nombre', celular = '$celular', membresia = '$membresia', estado = '$estado' WHERE id = $id";

$result = $con->query($sql);  
if(!$result){
    die("Error al insertar datos: " . $con->error);
}
?>