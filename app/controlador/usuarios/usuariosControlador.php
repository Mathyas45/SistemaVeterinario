<?php
$sql  ="SELECT * FROM tb_usuarios ";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);


$sql  ="SELECT * FROM tb_usuarios where cargo = 'Cliente' ";
$query = $pdo->prepare($sql);
$query->execute();
$clientes = $query->fetchAll(PDO::FETCH_ASSOC);