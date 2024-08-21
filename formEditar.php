<?php
include("conexion.php");
$sql = "SELECT id, nombre FROM membresia";
$result = $con->query($sql);
?>

<h1>Editar Cliente</h1>
<form id="formEditar" action="javascript:editar()">
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
    <label for="estado">Estado</label>
    <select id="estado" name="estado" required>
        <option value="activo">Activo</option>
        <option value="inactivo">Inactivo</option>
    </select><br>
    <button type="submit">Guardar</button>
    <button id="cancelarEditar" class="cancelar" onclick="cancelarEdicion()">Cancelar</button>
</form>