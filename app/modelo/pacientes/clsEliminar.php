<?php
function eliminarUsuario($id_Paciente)
{
    global $pdo;

    // Eliminar reservas asociadas al usuario
    $queryEliminarReservas = "DELETE FROM tb_reservas WHERE id_usuario IN (SELECT id_usuario FROM tb_usuarios WHERE id_paciente = :id_Paciente)";
    $statementEliminarReservas = $pdo->prepare($queryEliminarReservas);
    $statementEliminarReservas->bindParam(':id_Paciente', $id_Paciente, PDO::PARAM_INT);
    $statementEliminarReservas->execute();

    // Eliminar usuario asociado al paciente
    $queryEliminarUsuario = "DELETE FROM tb_usuarios WHERE id_paciente = :id_Paciente";
    $statementEliminarUsuario = $pdo->prepare($queryEliminarUsuario);
    $statementEliminarUsuario->bindParam(':id_Paciente', $id_Paciente, PDO::PARAM_INT);
    $statementEliminarUsuario->execute();

    // Eliminar paciente
    $queryEliminarPaciente = "DELETE FROM tb_pacientes WHERE id = :id_Paciente";
    $statementEliminarPaciente = $pdo->prepare($queryEliminarPaciente);
    $statementEliminarPaciente->bindParam(':id_Paciente', $id_Paciente, PDO::PARAM_INT);
    $statementEliminarPaciente->execute();
}
