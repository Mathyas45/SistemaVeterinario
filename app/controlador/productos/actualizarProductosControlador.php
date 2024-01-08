<?php
include('../../config.php');

$nombre_producto = $_POST['nombre_producto'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$stock_minimo = $_POST['stock_minimo'];
$stock_maximo = $_POST['stock_maximo'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$fecha_de_ingreso = $_POST['fecha_de_ingreso'];
$id_producto = $_POST['id_producto'];

$imagen = $_POST['imagen'];

// para la imagen
if (!empty($_FILES["file"]['name'])) {
    // echo "hay imagen nueva";
    // actualizar imagen
    $nombreDelArhivo = date('Y-m-d-h-i-s') . $_FILES['file']['name'];
    $location = "../../../public/img/productos/" . $nombreDelArhivo;
    move_uploaded_file($_FILES['file']['tmp_name'], $location);
    $imagen = $nombreDelArhivo;
} else {
    // echo "no hay imagen nueva";
    $imagen = $_POST['imagen'];
}

$sentencia = $pdo->prepare("UPDATE tb_productos SET nombre_producto=:nombre_producto, descripcion=:descripcion, imagen=:imagen,stock=:stock,stock_minimo=:stock_minimo,stock_maximo=:stock_maximo,precio_compra=:precio_compra,
precio_venta = :precio_venta,fecha_de_ingreso = :fecha_de_ingreso,fyh_actualizacion = :fyh_actualizacion  
WHERE id_producto=:id_producto ");
$sentencia->bindParam('nombre_producto', $nombre_producto);
$sentencia->bindParam('descripcion', $descripcion);
$sentencia->bindParam('imagen', $imagen);
$sentencia->bindParam('stock', $stock);
$sentencia->bindParam('stock_minimo', $stock_minimo);
$sentencia->bindParam('stock_maximo', $stock_maximo);
$sentencia->bindParam('precio_compra', $precio_compra);
$sentencia->bindParam('precio_venta', $precio_venta);
$sentencia->bindParam('fecha_de_ingreso', $fecha_de_ingreso);
$sentencia->bindParam('fyh_actualizacion', $fyh_creacion);
$sentencia->bindParam('id_producto', $id_producto);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el producto de manera correcta";
    $_SESSION['icono'] = 'success';
    header('Location: ' . $URL . '/admin/productos/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error al actualizar el producto";
    $_SESSION['icono'] = 'error';
    header('Location: ' . $URL . '/admin/productos/update.php?id_usuario=' . $id_usuario);
}
