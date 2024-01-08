<?php

include('../../config.php');

$fecha = $_GET['fecha'];
$hora_cita = "";

$query = $pdo->prepare("SELECT * FROM tb_reservas where fecha_cita = '$fecha' ");
$query->execute();

$datos = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($datos as $dato) {
    // echo "existe";
    //rescatar datos de la bd cuadno cumple la condicion 
    $hora_cita = $dato['hora_cita']; //se rescata la hora de esa cita en esa fecha de la cossulta
    //alamcenamos los horarios en una cadena vector

    $horario = ['08:00 - 09:00', '09:00 - 10:00', '10:00 - 11:00', '11:00 - 12:00', '12:00 - 13:00', '14:00 - 15:00', '15:00 - 16:00', '16:00 - 17:00'];

    for ($i = 0; $i < 8; $i++) {

        if ($horario[$i] == $hora_cita) {
            $num = $i + 1;
            $hora_res = "#btn_h" . $num;
            echo "<script> 
            $('$hora_res').attr('disabled', true); 
            $('$hora_res').removeClass('btn-primary').addClass('btn-danger');
            </script>";
        }
    }
}
