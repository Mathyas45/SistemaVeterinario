<?php
$sql= "SELECT * FROM tb_historias as historias 
INNER JOIN tb_pruebas as pruebas ON pruebas.historia_id = historias.id_historia
where historias.id_historia = '$id_historia' ";
$query = $pdo->prepare($sql);
$query->execute();
$historiass1 = $query->fetchAll(PDO::FETCH_ASSOC);
