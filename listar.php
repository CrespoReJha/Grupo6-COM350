<?php
include("conexion.php");

$sql = "SELECT c.id as id, ci, c.nombre as nombre, celular, m.nombre as membresia, estado FROM clientes c INNER JOIN membresia m ON c.membresia = m.id";

$result = $con->query($sql);
$datos = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $datos[] = $row;
    }
}
echo json_encode($datos, JSON_UNESCAPED_UNICODE);
?>