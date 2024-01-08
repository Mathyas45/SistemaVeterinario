<?php

function eliminarUsuario($id_usuario) {
    // Implementa la lógica para eliminar el usuario en la base de datos
    // Puedes usar una sentencia DELETE SQL

    // Ejemplo:
    global $pdo; // Asegúrate de tener la conexión a la base de datos disponible
    $query = "DELETE FROM tb_usuarios WHERE id_usuario = :id_usuario";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $statement->execute();
}
?>
