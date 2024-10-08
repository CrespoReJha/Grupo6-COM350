

<div style=" display: flex; align-items: center;">
    <h2 style="margin-right: 100px;">Pagos</h2>
</div>

<table >
    <tr>
        <th>CI</th>
        <th>Cliente</th>
        <th>Monto</th> 
        <th>Detalle</th>  
        <th>Fecha</th>
        <th>Estado</th>
    </tr>

    <?php
    include 'conexion.php';
    
    $sql = "SELECT c.ci as ci,p.id,c.nombre,p.monto,p.detalle,p.fecha_pago,p.estado FROM pagos p INNER JOIN clientes c ON c.id = p.id_cliente WHERE p.estado='Pendiente';";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ci"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["monto"] . "</td>";
            echo "<td>" . $row["detalle"] . "</td>";
            echo "<td>" . $row["fecha_pago"] . "</td>";
            $color=($row["estado"]=="Pagado")? "style='color: green;border-color: green;' ":"style='color: red;border-color: red;' ";
            echo "<td><span ".$color.">" . $row["estado"] . "</span></td>";
            // echo "<td style='display: flex; '>
            //     <a  href='edit_member.php?id=" . $row["id"] . "'><img src='iconos/editar.svg' style='width: 40px; height: 40px; '></a>
            //     <a href='delete_member.php?id=" . $row["id"] . "'><img src='iconos/eliminar.svg' style='width: 40px; height: 40px; '></a>
            //     </td>";
            // echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No hay miembros registrados</td></tr>";
    }

    $con->close();
    ?>

</table>
