<?php
require_once('../../modelo/pacientes/clsPaciente.php');

try {
    $id_paciente  = $_POST['idPaciente'];

    $objPaciente = new clsPaciente();
    $resultado = $objPaciente->consultarPaciente($id_paciente);

    // Verificar si se encontró un paciente con el ID dado
    if ($resultado) {
        // Devolver el objeto directamente
        echo json_encode($resultado[0]);
    } else {
        // Devolver un mensaje de error si no se encontró ningún paciente con el ID dado
        $mensajeError = array('correcto' => 0, 'mensaje' => 'No se encontró ningún paciente con el ID proporcionado.');
        echo json_encode($mensajeError);
    }
} catch (Exception $e) {
    // Devolver un mensaje de error si ocurre una excepción
    $resultadoError = array('correcto' => 0, 'mensaje' => $e->getMessage());
    echo json_encode($resultadoError);
}
