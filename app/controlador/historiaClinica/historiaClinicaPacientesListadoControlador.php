<?php


$sql  ="SELECT * FROM tb_pacientes ";
$query = $pdo->prepare($sql);
$query->execute();
$pacientes = $query->fetchAll(PDO::FETCH_ASSOC);

