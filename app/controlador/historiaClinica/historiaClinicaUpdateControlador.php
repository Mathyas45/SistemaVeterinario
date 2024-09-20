<?php
include('../../../config.php');

$id_historia = $_POST['id_historia'];
$id_reserva = $_POST['id_reserva'];
$motivo_consulta = $_POST['motivo_consulta'];
$id_paciente = $_POST['id_paciente']; // Suponiendo que el formulario tiene un campo oculto con el ID del paciente
$motivo_consulta = $_POST['motivo_consulta'];
$fecha_consulta = $_POST['fecha_consulta'];
$medico_responsable = $_POST['medico_responsable'];
$diagnostico = $_POST['diagnostico'];
$notas_padecimiento = $_POST['notas_padecimiento'];
$examenes = $_POST['examenes'];
$tratamiento = $_POST['tratamiento'];
$duracion_tratamiento = $_POST['duracion_tratamiento'];
$medicamentos = $_POST['medicamentos'];
$notas_tratamiento = $_POST['notas_tratamiento'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$color = "#2324ff";
$tipo_servicio = $_POST['tipo_servicio'];
$resultados_laboratorio = $_FILES['resultados_laboratorio']; // Array de archivos subidos

// Obtener el id del paciente
$id_paciente = $_POST['id_paciente'];

// Verificar si se proporcionó algún valor para la hora y la fecha
if (!empty($hora) && !empty($fecha)) {
    // Verificar si hay una reserva en esa fecha y hora diferente a la actual
    $sentencia_verificar = $pdo->prepare('SELECT COUNT(*) AS count FROM tb_reservas WHERE fecha_cita = :fecha AND hora_cita = :hora AND historia_id != :historia_id');
    $sentencia_verificar->bindParam(':fecha', $fecha);
    $sentencia_verificar->bindParam(':hora', $hora);
    $sentencia_verificar->bindParam(':historia_id', $id_historia);
    $sentencia_verificar->execute();
    $resultado_verificar = $sentencia_verificar->fetch(PDO::FETCH_ASSOC);
    // Verificar el resultado de la consulta
    if ($resultado_verificar['count'] > 0) {
        // Si ya existe una reserva para la fecha y hora seleccionadas, mostrar un mensaje de error o realizar alguna acción
        session_start();
        $_SESSION['mensaje'] = "Error: Ya existe una reserva en la hora seleccionada para esa fecha. Por favor, seleccione una hora diferente.";
        $_SESSION['icono'] = 'error';
        ?><script>
            window.history.back();
        </script><?php
        exit();
    }
}

// Buscar el id_usuario asociado al paciente
$sentencia_usuario = $pdo->prepare('SELECT id_usuario FROM tb_usuarios WHERE id_paciente = :id_paciente');
$sentencia_usuario->bindParam(':id_paciente', $id_paciente);
$sentencia_usuario->execute();
$resultado_usuario = $sentencia_usuario->fetch(PDO::FETCH_ASSOC);

// Verificar si se encontró un usuario asociado al paciente
if ($resultado_usuario) {
    $id_usuario = $resultado_usuario['id_usuario'];

    // Actualizar la historia clínica en la tabla tb_historias
    $sentencia_historia = $pdo->prepare("UPDATE tb_historias SET paciente_id = :id_paciente, motivo_consulta = :motivo_consulta, fecha_consulta = :fecha_consulta, medico_responsable = :medico_responsable, diagnostico = :diagnostico, notas_padecimiento = :notas_padecimiento, examenes = :examenes, tratamiento = :tratamiento, duracion_tratamiento = :duracion_tratamiento, medicamentos = :medicamentos, notas_tratamiento = :notas_tratamiento WHERE id_historia = :id_historia");
    $sentencia_historia->bindParam(':id_paciente', $id_paciente);
    $sentencia_historia->bindParam(':motivo_consulta', $motivo_consulta);
    $sentencia_historia->bindParam(':fecha_consulta', $fecha_consulta);
    $sentencia_historia->bindParam(':medico_responsable', $medico_responsable);
    $sentencia_historia->bindParam(':diagnostico', $diagnostico);
    $sentencia_historia->bindParam(':notas_padecimiento', $notas_padecimiento);
    $sentencia_historia->bindParam(':examenes', $examenes);
    $sentencia_historia->bindParam(':tratamiento', $tratamiento);
    $sentencia_historia->bindParam(':duracion_tratamiento', $duracion_tratamiento);
    $sentencia_historia->bindParam(':medicamentos', $medicamentos);
    $sentencia_historia->bindParam(':notas_tratamiento', $notas_tratamiento);
    $sentencia_historia->bindParam(':id_historia', $id_historia);
    $sentencia_historia->execute();

    // Actualizar la reserva en la tabla tb_reservas
    $sentencia_reserva = $pdo->prepare("UPDATE tb_reservas SET tipo_servicio = :tipo_servicio, fecha_cita = :fecha_cita, hora_cita = :hora_cita WHERE id_reserva = :id_reserva" );
    $sentencia_reserva->bindParam(':tipo_servicio', $tipo_servicio);
    $sentencia_reserva->bindParam(':fecha_cita', $fecha);
    $sentencia_reserva->bindParam(':hora_cita', $hora);
    $sentencia_reserva->bindParam(':id_reserva', $id_reserva);
    $sentencia_reserva->execute();

    // Subir los archivos
    if ($resultados_laboratorio !== null) {
    $numero_archivos = count($_FILES['resultados_laboratorio']['name']);
    for ($i = 0; $i < $numero_archivos; $i++) {
        $nombre_archivo = $_FILES['resultados_laboratorio']['name'][$i];
        $archivo_temporal = $_FILES['resultados_laboratorio']['tmp_name'][$i];
        $nombre_archivo_unico = uniqid() . '_' . $nombre_archivo; // Agregar un identificador único al nombre del archivo para evitar colisiones
        $ruta_archivo = '../../../public/archivosHistorias/' . $nombre_archivo_unico;
        move_uploaded_file($archivo_temporal, $ruta_archivo);

        // Ajustar la ruta de archivo para que tenga solo dos niveles de directorio ".."
        $ruta_archivo_rel = '../../public/archivosHistorias/' . $nombre_archivo_unico;

        // Guardar la información de los archivos en la base de datos
        $sentencia_archivo = $pdo->prepare('INSERT INTO tb_pruebas (historia_id, nombre_prueba, url_prueba, fecha_creacion) VALUES (:historia_id, :nombre_prueba, :url_prueba, :fecha_creacion)');
        $sentencia_archivo->bindParam(':historia_id', $id_historia);
        $sentencia_archivo->bindParam(':nombre_prueba', $nombre_archivo);
        $sentencia_archivo->bindParam(':url_prueba', $ruta_archivo_rel); // Guardar la ruta ajustada en la base de datos
        $sentencia_archivo->bindParam(':fecha_creacion', $fyh_creacion);
        $sentencia_archivo->execute();
        }	
    }
    session_start();
    $_SESSION['mensaje'] = "Se actualizó la historia clínica del paciente " . $nombre_paciente . " correctamente.";
    $_SESSION['icono'] = 'success';
    header('Location: ' . $URL . '/admin/historiaClinica/historiaPaciente.php?id_Paciente=' . $id_paciente);
    exit();
} else {
    // Si no se encontró un usuario asociado al paciente, mostrar un mensaje de error o realizar alguna acción
    session_start();
    $_SESSION['mensaje'] = "Error: No se encontró un usuario asociado al paciente. Por favor, revise los datos ingresados.";
    $_SESSION['icono'] = 'error';
    header('Location: ' . $URL . '/admin/historiaClinica/historiaPaciente.php?id_Paciente=' . $id_paciente);
    exit();
}
?>
