<?php
include("conexion.php");
$sql = "SELECT id, nombre FROM membresia";
$result = $con->query($sql);
?>

<h1>Nuevo Cliente</h1>
<form id="formNuevo" action="javascript:insertarCliente()">
    <input type="hidden" id="id" name="id">
    <label for="ci">CI</label>
    <input type="text" id="ci" name="ci" required>
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" required>
    <label for="celular">Celular</label>
    <input type="text" id="celular" name="celular" required>
    <label for="membresia">Membresia</label>
    <select id="membresia" name="membresia" required>
        <?php
        while ($membresia = $result->fetch_assoc()){
            ?>
            <option value="<?php echo $membresia['id'] ?>"><?php echo $membresia['nombre'] ?></option>
            <?php
        }
        ?>
    </select>
    <label for="registroPago">Pago</label>
    <div id="pago">Monto a Pagar: 100 Bs.</div>
    <select name="registroPago" id="registroPago">
        <option value="1">Pagado</option>
        <option value="2">Pendiente</option>
    </select>
    <button type="submit">Guardar</button>
    <button id="cancelarEditar" class="cancelar" onclick="cancelarEdicion()">Cancelar</button>
</form>