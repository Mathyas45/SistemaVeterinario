<?php

function eliminarUsuario($id_producto) {
   
    // Ejemplo:
    global $pdo; // Asegúrate de tener la conexión a la base de datos disponible
    $query = "DELETE FROM tb_productos WHERE id_producto = :id_producto";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
    $statement->execute();
}
?>
