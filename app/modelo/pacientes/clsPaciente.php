<?php
include('../../config.php');

class clsPaciente
{

    function consultarPaciente($id_Paciente)
    {
        global $pdo;
        $sql  = "SELECT * FROM tb_pacientes where id = :id_Paciente";
        $query = $pdo->prepare($sql);
        $query->bindParam(':id_Paciente', $id_Paciente);
        $query->execute();
        $pacientes = $query->fetchAll(PDO::FETCH_ASSOC);
        return  $pacientes;
    }
}
