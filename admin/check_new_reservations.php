<?php
session_start();
include('../config.php');

// Verificar si la fecha y hora de la última verificación está almacenada en la sesión
if (!isset($_SESSION['lastCheckDatetime'])) {
    // Si no está almacenada, inicializarla con la fecha y hora actual
    $_SESSION['lastCheckDatetime'] = date('Y-m-d H:i:s');
}

// Obtener la fecha y hora actual
$currentDatetime = date('Y-m-d H:i:s');

// Calcular la diferencia de tiempo desde la última verificación (puedes ajustar el intervalo según tus necesidades)
$timeDifference = strtotime($currentDatetime) - strtotime($_SESSION['lastCheckDatetime']);
$intervaloDeVerificacion = 60; // Intervalo de verificación en segundos (por ejemplo, 60 segundos = 1 minuto)

// Verificar si ha pasado el tiempo suficiente para realizar una nueva verificación
if ($timeDifference >= $intervaloDeVerificacion) {
    // Realizar una consulta a la base de datos para obtener las nuevas reservas
    $sql = "SELECT * FROM tb_reservas WHERE fyh_creacion > :lastCheckDatetime";
    $query = $pdo->prepare($sql);
    $query->bindParam(':lastCheckDatetime', $_SESSION['lastCheckDatetime']);
    $query->execute();
    $newReservations = $query->fetchAll(PDO::FETCH_ASSOC);

    // Verificar si hay nuevas reservas
    $hayNuevasReservas = !empty($newReservations);

    // Actualizar la fecha y hora de la última verificación en la sesión
    $_SESSION['lastCheckDatetime'] = $currentDatetime;
} else {
    // No ha pasado suficiente tiempo desde la última verificación
    $hayNuevasReservas = false;
}

// Crear la respuesta JSON
$response = array(
    'newReservations' => $hayNuevasReservas
);

// Enviar la respuesta JSON al cliente
header('Content-Type: application/json');
echo json_encode($response);
