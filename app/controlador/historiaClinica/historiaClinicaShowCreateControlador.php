<?php


$sql= "SELECT * FROM tb_historias as historias 
INNER JOIN tb_pruebas as pruebas ON pruebas.historia_id = historias.id_historia
INNER JOIN tb_reservas as reservas ON reservas.historia_id = historias.id_historia
INNER JOIN tb_pacientes as pacientes ON pacientes.id = historias.paciente_id
where historias.id_historia = '$id_historia' ";
$query = $pdo->prepare($sql);
$query->execute();
$historias = $query->fetchAll(PDO::FETCH_ASSOC);

foreach( $historias as $historia ){
    $motivo_consulta = $historia['motivo_consulta'];
    $fecha_consulta = $historia['fecha_consulta'];
    $medico_responsable = $historia['medico_responsable'];
    $diagnostico = $historia['diagnostico'];
    $notas_padecimiento = $historia['notas_padecimiento'];
    $nombre_completo = $historia['nombre_completo'];
    $examenes = $historia['examenes'];
    $tratamiento = $historia['tratamiento'];
    $duracion_tratamiento = $historia['duracion_tratamiento'];
    $medicamentos = $historia['medicamentos'];
    $notas_tratamiento = $historia['notas_tratamiento'];
    $tipo_servicio = $historia['tipo_servicio'];
    $fecha = $historia['fecha_cita'];
    $hora = $historia['hora_cita']; 

}

