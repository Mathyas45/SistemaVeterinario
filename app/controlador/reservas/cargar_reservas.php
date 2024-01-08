<?php
include('../../config.php');

$sql = "SELECT title,start,end,color FROM tb_reservas";
$query =$pdo->prepare($sql);
$query ->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

// print_r($results);
echo json_encode($results);


