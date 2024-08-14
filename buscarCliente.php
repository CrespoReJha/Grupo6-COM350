<?php
include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT id, ci, nombre, celular, membresia, estado FROM clientes WHERE id = $id";

$result = $con->query($sql);
$datos = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo json_encode($row, JSON_UNESCAPED_UNICODE);
    }
}

?>