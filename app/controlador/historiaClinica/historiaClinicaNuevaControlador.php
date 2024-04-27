<?php
include('../../config.php');

// Obtener los datos del formulario
$nombre_paciente = $_POST['nombre_paciente'];
$id_paciente = $_POST['id_paciente']; // Suponiendo que el formulario tiene un campo oculto con el ID del paciente
$motivo_consulta = $_POST['motivo_consulta'];
$fecha_consulta = $_POST['fecha_consulta'];
$medico_responsable = $_POST['medico'];
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

// Verificar si se proporcionó algún valor para la hora
if (!empty($hora) && !empty($fecha)) {
    // Si se proporcionó algún valor para la hora y la fecha, verificar si hay una reserva en esa fecha y hora
    $sentencia_verificar = $pdo->prepare('SELECT COUNT(*) AS count FROM tb_reservas WHERE fecha_cita = :fecha AND hora_cita = :hora');
    $sentencia_verificar->bindParam(':fecha', $fecha);
    $sentencia_verificar->bindParam(':hora', $hora);
    $sentencia_verificar->execute();
    $resultado_verificar = $sentencia_verificar->fetch(PDO::FETCH_ASSOC);

    // Verificar el resultado de la consulta
    if ($resultado_verificar['count'] > 0) {
        // Si ya existe una reserva para la fecha y hora seleccionadas, mostrar un mensaje de error o realizar alguna acción
        // echo "Ya existe una reserva en la hora seleccionada para esa fecha. Por favor, seleccione una hora diferente.";
        session_start();
        $_SESSION['mensaje'] = "Error: Ya existe una reserva en la hora seleccionada para esa fecha. Por favor, seleccione una hora diferente.";
        $_SESSION['icono'] = 'error';
        ?><script>
            window.history.back();
        </script><?php
                } else {
                    // Obtener el id del paciente
                    $id_paciente = $_POST['id_paciente'];

                    // Buscar el id_usuario asociado al paciente
                    $sentencia_usuario = $pdo->prepare('SELECT id_usuario FROM tb_usuarios WHERE id_paciente = :id_paciente ');
                    $sentencia_usuario->bindParam(':id_paciente', $id_paciente);
                    $sentencia_usuario->execute();
                    $resultado_usuario = $sentencia_usuario->fetch(PDO::FETCH_ASSOC);

                    // Verificar si se encontró un usuario asociado al paciente
                    if ($resultado_usuario) {
                        $id_usuario = $resultado_usuario['id_usuario'];

                        // Preparar la consulta SQL para insertar la historia clínica en la tabla tb_historias
                        $sentencia_historia = $pdo->prepare('INSERT INTO tb_historias (paciente_id, motivo_consulta, fecha_consulta, medico_responsable, diagnostico, notas_padecimiento, tratamiento, duracion_tratamiento, medicamentos, notas_tratamiento) 
                                                VALUES (:id_paciente, :motivo_consulta, :fecha_consulta, :medico_responsable, :diagnostico, :notas_padecimiento, :tratamiento, :duracion_tratamiento, :medicamentos, :notas_tratamiento)');
                        $sentencia_historia->bindParam(':id_paciente', $id_paciente);
                        $sentencia_historia->bindParam(':motivo_consulta', $motivo_consulta);
                        $sentencia_historia->bindParam(':fecha_consulta', $fecha_consulta);
                        $sentencia_historia->bindParam(':medico_responsable', $medico_responsable);
                        $sentencia_historia->bindParam(':diagnostico', $diagnostico);
                        $sentencia_historia->bindParam(':notas_padecimiento', $notas_padecimiento);
                        $sentencia_historia->bindParam(':tratamiento', $tratamiento);
                        $sentencia_historia->bindParam(':duracion_tratamiento', $duracion_tratamiento);
                        $sentencia_historia->bindParam(':medicamentos', $medicamentos);
                        $sentencia_historia->bindParam(':notas_tratamiento', $notas_tratamiento);
                        $sentencia_historia->execute();

                        // Obtenemos el ID de la última inserción
                        $id_historia = $pdo->lastInsertId();

                        // Preparar la consulta SQL para insertar la reserva en la tabla tb_reservas
                        $sentencia_reserva = $pdo->prepare('INSERT INTO tb_reservas (id_usuario, nombre_mascota, tipo_servicio, fecha_cita, hora_cita, title, start, end, color, fyh_creacion, historia_id) 
                                                VALUES (:id_usuario, :nombre_mascota, :tipo_servicio, :fecha_cita, :hora_cita, :title, :start, :end, :color, :fyh_creacion, :historia_id)');

                        $sentencia_reserva->bindParam(':id_usuario', $id_usuario);
                        $sentencia_reserva->bindParam(':nombre_mascota', $nombre_paciente);
                        $sentencia_reserva->bindParam(':tipo_servicio', $tipo_servicio);
                        $sentencia_reserva->bindParam(':fecha_cita', $fecha);
                        $sentencia_reserva->bindParam(':hora_cita', $hora);
                        $sentencia_reserva->bindParam(':title', $nombre_paciente);
                        $sentencia_reserva->bindParam(':start', $fecha);
                        $sentencia_reserva->bindParam(':end', $fecha);
                        $sentencia_reserva->bindParam(':color', $color); // Color por defecto
                        $sentencia_reserva->bindParam(':fyh_creacion', $fyh_creacion); // Fecha y hora actual
                        $sentencia_reserva->bindParam(':historia_id', $id_historia);
                            // Obtenemos el ID de la última inserción
                            $historia_id = $pdo->lastInsertId();

                        if ($sentencia_reserva->execute()) {
                            // Subir los archivos
                            $numero_archivos = count($_FILES['resultados_laboratorio']['name']);
                            for ($i = 0; $i < $numero_archivos; $i++) {
                                $nombre_archivo = $_FILES['resultados_laboratorio']['name'][$i];
                                $archivo_temporal = $_FILES['resultados_laboratorio']['tmp_name'][$i];
                                $ruta_archivo = '../../../public/archivosHistorias/' . $nombre_archivo;
                                move_uploaded_file($archivo_temporal, $ruta_archivo);

                                // Guardar la información de los archivos en la base de datos
                                $sentencia_archivo = $pdo->prepare('INSERT INTO tb_pruebas (historia_id, nombre_prueba, url_prueba,fecha_creacion) VALUES (:historia_id, :nombre_prueba, :url_prueba,:fecha_creacion)');
                                $sentencia_archivo->bindParam(':historia_id', $historia_id);
                                $sentencia_archivo->bindParam(':nombre_prueba', $nombre_archivo);
                                $sentencia_archivo->bindParam(':url_prueba', $ruta_archivo);
                                $sentencia_archivo->bindParam(':fecha_creacion', $fyh_creacion);

                                $sentencia_archivo->execute();
                            }
                            session_start();
                            $_SESSION['mensaje'] = "Se registró la historia clínica del paciente " . $nombre_paciente . " correctamente.";
                            $_SESSION['icono'] = 'success';
                            header('Location: ' . $URL . '/admin/historiaClinica/historiaPaciente.php?id_Paciente=' . $id_paciente);
                            exit();
                        } else {
                            session_start();
                            $_SESSION['mensaje'] = "Error al registrar la historia clínica del paciente " . $nombre_paciente;
                            $_SESSION['icono'] = 'error';
                            header('Location: ' . $URL . '/admin/historiaClinica/historiaPaciente.php?id_Paciente=' . $id_paciente);
                            exit();
                        }
                    }
                    else {
                        // Si no se encontró un usuario asociado al paciente, mostrar un mensaje de error o realizar alguna acción
                        session_start();
                        $_SESSION['mensaje'] = "Error: No se encontró un usuario asociado al paciente. Por favor, revise los datos ingresados.";
                        $_SESSION['icono'] = 'error';
                        header('Location: ' . $URL . '/admin/historiaClinica/historiaPaciente.php?id_Paciente=' . $id_paciente);
                        exit();
                    }
                }
            } else {
                // Si no se proporcionó ningún valor para la hora y la fecha, continuar con el proceso de guardar la consulta

                $sentencia_historia = $pdo->prepare('INSERT INTO tb_historias (paciente_id, motivo_consulta, fecha_consulta, medico_responsable, diagnostico, notas_padecimiento, tratamiento, duracion_tratamiento, medicamentos, notas_tratamiento) 
                                                    VALUES (:id_paciente, :motivo_consulta, :fecha_consulta, :medico_responsable, :diagnostico, :notas_padecimiento, :tratamiento, :duracion_tratamiento, :medicamentos, :notas_tratamiento)');
                $sentencia_historia->bindParam(':id_paciente', $id_paciente);
                $sentencia_historia->bindParam(':motivo_consulta', $motivo_consulta);
                $sentencia_historia->bindParam(':fecha_consulta', $fecha_consulta);
                $sentencia_historia->bindParam(':medico_responsable', $medico_responsable);
                $sentencia_historia->bindParam(':diagnostico', $diagnostico);
                $sentencia_historia->bindParam(':notas_padecimiento', $notas_padecimiento);
                $sentencia_historia->bindParam(':tratamiento', $tratamiento);
                $sentencia_historia->bindParam(':duracion_tratamiento', $duracion_tratamiento);
                $sentencia_historia->bindParam(':medicamentos', $medicamentos);
                $sentencia_historia->bindParam(':notas_tratamiento', $notas_tratamiento);
                if ($sentencia_historia->execute()) {
                    // Obtenemos el ID de la última inserción
                    $historia_id = $pdo->lastInsertId();

                    // Subir los archivos
                    $numero_archivos = count($_FILES['resultados_laboratorio']['name']);
                    for ($i = 0; $i < $numero_archivos; $i++) {
                        $nombre_archivo = $_FILES['resultados_laboratorio']['name'][$i];
                        $archivo_temporal = $_FILES['resultados_laboratorio']['tmp_name'][$i];
                        $ruta_archivo = '../../../public/archivosHistorias/' . $nombre_archivo;
                        move_uploaded_file($archivo_temporal, $ruta_archivo);

                        // Guardar la información de los archivos en la base de datos
                        $sentencia_archivo = $pdo->prepare('INSERT INTO tb_pruebas (historia_id, nombre_prueba, url_prueba, fecha_creacion) VALUES (:historia_id, :nombre_prueba, :url_prueba, :fecha_creacion)');
                        $sentencia_archivo->bindParam(':historia_id', $historia_id);
                        $sentencia_archivo->bindParam(':nombre_prueba', $nombre_archivo);
                        $sentencia_archivo->bindParam(':url_prueba', $ruta_archivo);
                        $sentencia_archivo->bindParam(':fecha_creacion', $fyh_creacion);

                        $sentencia_archivo->execute();
                    }

                    session_start();
                    $_SESSION['mensaje'] = "Se registró la historia clínica del paciente " . $nombre_paciente . " correctamente.";
                    $_SESSION['icono'] = 'success';
                    header('Location: ' . $URL . '/admin/historiaClinica/historiaPaciente.php?id_Paciente=' . $id_paciente);
                    exit();
                }
                else {
                    session_start();
                    $_SESSION['mensaje'] = "Error al registrar la historia clínica del paciente " . $nombre_paciente;
                    $_SESSION['icono'] = 'error';
                    header('Location: ' . $URL . '/admin/historiaClinica/historiaPaciente.php?id_Paciente=' . $id_paciente);
                    exit();
                }
            }
