<?php
include('../../config.php');

// Verificar si el DNI ya existe en la base de datos
$dni = $_POST['dni'];
$sentencia_verificar = $pdo->prepare('SELECT COUNT(*) AS count FROM tb_pacientes WHERE dni = :dni');
$sentencia_verificar->bindParam(':dni', $dni);
$sentencia_verificar->execute();
$resultado_verificar = $sentencia_verificar->fetch(PDO::FETCH_ASSOC);

if ($resultado_verificar['count'] > 0) {
    // El DNI ya existe en la base de datos
    $response = array('success' => false, 'message' => 'El DNI del paciente ya está registrado en la base de datos.');
} else {
    // El DNI no existe en la base de datos, proceder con la inserción del paciente
    $nombre_completo = $_POST['nombre_completo'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $genero = $_POST['genero'];
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
    $paciente = "paciente";

    // Insertar los datos del paciente en la tabla tb_pacientes
    $sentencia_insertar = $pdo->prepare('INSERT INTO tb_pacientes (nombre_completo, fecha_nacimiento, genero, dni, usuario, nombre_contacto, relacion_contacto, telefono_contacto, alergias, med_actual, enfermedad_cronica, fecha_ulti_consulta, motivo_ulti_consulta, tratamientos_previos) VALUES (:nombre_completo, :fecha_nacimiento, :genero, :dni, :usuario, :nombre_contacto, :relacion_contacto, :telefono_contacto, :alergias, :med_actual, :enfermedad_cronica, :fecha_ulti_consulta, :motivo_ulti_consulta, :tratamientos_previos)');
    $sentencia_insertar->bindParam(':nombre_completo', $nombre_completo);
    $sentencia_insertar->bindParam(':fecha_nacimiento', $fecha_nacimiento);
    $sentencia_insertar->bindParam(':genero', $genero);
    $sentencia_insertar->bindParam(':dni', $dni);
    $sentencia_insertar->bindParam(':usuario', $usuario);
    $sentencia_insertar->bindParam(':nombre_contacto', $nombre_contacto);
    $sentencia_insertar->bindParam(':relacion_contacto', $relacion_contacto);
    $sentencia_insertar->bindParam(':telefono_contacto', $telefono_contacto);
    $sentencia_insertar->bindParam(':alergias', $alergias);
    $sentencia_insertar->bindParam(':med_actual', $med_actual);
    $sentencia_insertar->bindParam(':enfermedad_cronica', $enfermedad_cronica);
    $sentencia_insertar->bindParam(':fecha_ulti_consulta', $fecha_ulti_consulta);
    $sentencia_insertar->bindParam(':motivo_ulti_consulta', $motivo_ulti_consulta);
    $sentencia_insertar->bindParam(':tratamientos_previos', $tratamientos_previos);

    if ($sentencia_insertar->execute()) {
        // Insertar el usuario asociado al paciente en la tabla tb_usuarios
        $password = password_hash($dni, PASSWORD_DEFAULT);
        // Después de la inserción del paciente
        $id_paciente = $pdo->lastInsertId();

        // Insertar el usuario asociado al paciente en la tabla tb_usuarios
        $sentencia_usuario = $pdo->prepare("INSERT INTO tb_usuarios (nombre, username, password, id_paciente, cargo) VALUES (:nombre, :username, :password, :id_paciente, :cargo)");
        $sentencia_usuario->bindParam(":nombre", $nombre_completo);
        $sentencia_usuario->bindParam(":username", $usuario);
        $sentencia_usuario->bindParam(":password", $password);
        $sentencia_usuario->bindParam(":id_paciente", $id_paciente);
        $sentencia_usuario->bindParam(":cargo", $paciente);
        $sentencia_usuario->execute();

        // La inserción fue exitosa
        $response = array('success' => true, 'message' => 'El paciente fue guardado correctamente.');
    } else {
        // La inserción del paciente falló
        $response = array('success' => false, 'message' => 'Error al guardar al paciente en la base de datos.');
    }
}

header('Content-Type: application/json');
echo json_encode($response);
