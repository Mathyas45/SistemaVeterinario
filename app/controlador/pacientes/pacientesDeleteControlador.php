<?php
include('../../../config.php');
include('../../modelo/pacientes/clsEliminar.php');

// Inicializa el arreglo de respuesta
$response = array();

// Verifica si se proporcionó un ID de paciente válido
if (isset($_GET['id_Paciente'])) {
    $id_Paciente = $_GET['id_Paciente'];
    eliminarUsuario($id_Paciente); // Implementa esta función en usuariosControlador.php

    // Agrega la información de la respuesta
    $response['success'] = true;
    $response['message'] = "Paciente eliminado correctamente";

    // Devuelve la respuesta en formato JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit(); // Detiene la ejecución del script aquí
}

// Si no se proporcionó un ID de paciente válido, devuelve una respuesta de error
$response['success'] = false;
$response['message'] = "ID de paciente no válido";

// Devuelve la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
exit();
