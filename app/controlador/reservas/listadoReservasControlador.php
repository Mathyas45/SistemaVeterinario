<?php

$sql  = "SELECT *, usu.email as email FROM tb_reservas as res INNER JOIN tb_usuarios as usu ON usu.id_usuario = res.id_usuario";
$query = $pdo->prepare($sql);
$query->execute();
$reservas = $query->fetchAll(PDO::FETCH_ASSOC);


$fecha_actual = date("Y-m-d"); // Obtiene la fecha actual en formato 'YYYY-MM-DD'
$sql = "SELECT * FROM tb_reservas WHERE fecha_cita = :fecha_actual";
$query = $pdo->prepare($sql);
$query->bindParam(':fecha_actual', $fecha_actual, PDO::PARAM_STR);
$query->execute();
$reservasHoy = $query->fetchAll(PDO::FETCH_ASSOC);
