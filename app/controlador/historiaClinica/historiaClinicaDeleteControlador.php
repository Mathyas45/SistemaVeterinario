<?php
include('../../../config.php');

$id_historia = !empty($_POST['id_historia']) ? $_POST['id_historia'] : null;
$id_paciente = !empty($_POST['id_paciente']) ? $_POST['id_paciente'] : null;
$sql = $pdo->prepare("update tb_historias set estado='0' where id_historia=:id_historia");
$sql->bindParam(':id_historia', $id_historia, PDO::PARAM_INT);
$resultado = $sql->execute();
if ($resultado) {
    session_start();
    $_SESSION['mensaje'] = "Se elimino la historia clinica de manera correcta";
    $_SESSION['icono'] = 'success';
    echo json_encode(['success' => true, 'redirect_url' => $URL . '/admin/historiaClinica/historiaPaciente.php?id_Paciente=' . $id_paciente]);
} else {
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar la historia clinica";
    $_SESSION['icono'] = 'error';
    echo json_encode(['success' => false, 'redirect_url' => $URL . '/admin/historiaClinica/historiaPaciente.php?id_Paciente=' . $id_paciente]);
}