<?php
$conn = new mysqli("localhost", "root", "", "bd_gimnasio");
if ($con->connect_error)
    die("conexion fallada" . $con->connect_error);
?>