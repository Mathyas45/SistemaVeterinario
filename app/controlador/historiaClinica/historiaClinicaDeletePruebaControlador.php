<?php
include('../../config.php');

$id_prueba = $_POST['id_prueba'];

try {
    $sql = "UPDATE tb_pruebas SET estado = '0' WHERE id_prueba = :id_prueba ";
    $query = $pdo->prepare($sql);
    $query->bindParam(':id_prueba', $id_prueba, PDO::PARAM_INT);
    $success = $query->execute();

    if ($success) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Error al eliminar la prueba de la base de datos.']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
