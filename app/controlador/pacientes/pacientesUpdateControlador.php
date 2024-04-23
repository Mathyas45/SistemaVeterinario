<?php
include('../../config.php');

$idPaciente = $_POST['idPaciente'];
$nombre_completo = $_POST['nombre_completo'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$genero = $_POST['genero'];
$dni = $_POST['dni'];
$usuario = $_POST['usuario'];
$nombre_contacto = $_POST['nombre_contacto'];
$relacion_contacto = $_POST['relacion_contacto'];
$telefono_contacto = $_POST['telefono_contacto'];
$alergias = $_POST['alergias'];
$med_actual = $_POST['med_actual'];
$enfermedad_cronica = $_POST['enfermedad_cronica'];
$fecha_ulti_consulta = $_POST['fecha_ulti_consulta'];
$motivo_ulti_consulta = $_POST['motivo_ulti_consulta'];
$tratamientos_previos = $_POST['tratamientos_previos'];

// Actualizar los datos del paciente en la tabla tb_pacientes
$sql = $pdo->prepare("UPDATE tb_pacientes SET nombre_completo=:nombre_completo, fecha_nacimiento=:fecha_nacimiento, genero=:genero, dni=:dni, usuario=:usuario, nombre_contacto=:nombre_contacto, relacion_contacto=:relacion_contacto, telefono_contacto=:telefono_contacto, alergias=:alergias, med_actual=:med_actual, enfermedad_cronica=:enfermedad_cronica, fecha_ulti_consulta=:fecha_ulti_consulta, motivo_ulti_consulta=:motivo_ulti_consulta, tratamientos_previos=:tratamientos_previos WHERE id = :idPaciente ");
$sql->bindParam(':nombre_completo', $nombre_completo);
$sql->bindParam(':fecha_nacimiento', $fecha_nacimiento);
$sql->bindParam(':genero', $genero);
$sql->bindParam(':dni', $dni);
$sql->bindParam(':usuario', $usuario);
$sql->bindParam(':nombre_contacto', $nombre_contacto);
$sql->bindParam(':relacion_contacto', $relacion_contacto);
$sql->bindParam(':telefono_contacto', $telefono_contacto);
$sql->bindParam(':alergias', $alergias);
$sql->bindParam(':med_actual', $med_actual);
$sql->bindParam(':enfermedad_cronica', $enfermedad_cronica);
$sql->bindParam(':fecha_ulti_consulta', $fecha_ulti_consulta);
$sql->bindParam(':motivo_ulti_consulta', $motivo_ulti_consulta);
$sql->bindParam(':tratamientos_previos', $tratamientos_previos);
$sql->bindParam(':idPaciente', $idPaciente);

if ($sql->execute()) {
    // Actualizar los datos del usuario asociado al paciente en la tabla tb_usuarios
    $hashed_password = password_hash($dni, PASSWORD_DEFAULT);
    $sql_usuario = $pdo->prepare("UPDATE tb_usuarios SET nombre=:nombre, username=:usuario, password=:password WHERE id_paciente=:idPaciente");
    $sql_usuario->bindParam(':nombre', $nombre_completo);
    $sql_usuario->bindParam(':usuario', $usuario);
    $sql_usuario->bindParam(':password', $hashed_password);
    $sql_usuario->bindParam(':idPaciente', $idPaciente);
    $sql_usuario->execute();

    // La actualización fue exitosa
    $response = array('success' => true, 'message' => 'El paciente y su usuario asociado fueron actualizados correctamente.');
} else {
    // La actualización del paciente falló
    $response = array('success' => false, 'message' => 'Error al actualizar el paciente y su usuario asociado en la base de datos.');
}

header('Content-Type: application/json');
echo json_encode($response);
