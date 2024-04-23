<?php

$fyh_creacion = date('Y-m-d');

// Buscar el id_usuario asociado al paciente
$sentencia_usuario = $pdo->prepare('SELECT id_usuario FROM tb_usuarios WHERE id_paciente = :id_paciente ');
$sentencia_usuario->bindParam(':id_paciente', $id_paciente);
$sentencia_usuario->execute();
$resultado_usuario = $sentencia_usuario->fetch(PDO::FETCH_ASSOC);
if ($resultado_usuario) {
    $id_usuario = $resultado_usuario['id_usuario'];

    $sql  = "SELECT * FROM tb_reservas where id_usuario =  '$id_usuario' and fecha_cita > fyh_creacion";
    $query = $pdo->prepare($sql);
    $query->execute();
    $proximaCitas = $query->fetchAll(PDO::FETCH_ASSOC);
}
