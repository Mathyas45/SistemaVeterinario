<?php
include('../../app/config.php');
include('../../app/controlador/productos/eliminarProductosControlador.php');


// Verifica si se proporcionó un ID de usuario válido
if (isset($_GET['id_producto'])) {
    $id_producto = $_GET['id_producto'];
    eliminarUsuario($id_producto); // Implementa esta función en usuariosControlador.php
}

// Redirecciona a la página principal después de eliminar el usuario
header("Location: index.php");
exit();
?>