<?php 
include("conexion.php");

$id = $_POST['id'];

$sql = "DELETE FROM clientes WHERE id = $id";

$result = $con->query($sql);  
if(!$result){
    die("Error al eliminar clientes: " . $con->error);
}
?>