<?php


$sql  ="SELECT * FROM tb_historias where paciente_id = '$id_paciente' ORDER BY fecha_consulta DESC";
$query = $pdo->prepare($sql);
$query->execute();
$historias = $query->fetchAll(PDO::FETCH_ASSOC);

