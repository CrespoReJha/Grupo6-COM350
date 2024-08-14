<?php
$conn = new mysqli("localhost", "root", "", "bd_gimnasio");
if ($conn->connect_error)
    die("conexion fallada" . $conn->connect_error);
?>