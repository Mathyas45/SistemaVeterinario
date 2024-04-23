<?php


$sql  ="SELECT * FROM tb_pacientes where id = '$id_paciente'";
$query = $pdo->prepare($sql);
$query->execute();
$pacientes = $query->fetchAll(PDO::FETCH_ASSOC);

foreach($pacientes as $paciente){
    $nombre_completo= $paciente['nombre_completo'];
    $fecha_nacimiento = $paciente['fecha_nacimiento'];
    $genero = $paciente['genero'];
    $dni= $paciente['dni'];
    $usuario = $paciente['usuario'];

}