<?php
include('../../config.php');

$id_usuario = $_POST['id_usuario'];
$nombre_completo = $_POST['nombre_completo'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_verify = $_POST['password_verify'];
$cargo = $_POST['cargo'];


if ($password == "") {
    $sql = $pdo->prepare("UPDATE tb_usuarios SET nombre_completo=:nombre_completo, email=:email, cargo=:cargo, fyh_actualizacion = :fyh_actualizacion  
    WHERE id_usuario=:id_usuario ");
    $sql->bindParam('nombre_completo', $nombre_completo);
    $sql->bindParam('email', $email);
    $sql->bindParam('cargo', $cargo);
    $sql->bindParam('fyh_actualizacion', $fyh_creacion);
    $sql->bindParam('id_usuario', $id_usuario);

    if ($sql->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se actualizó al usuario de manera correcta";
        $_SESSION['icono'] = 'success';
        header('Location: ' . $URL . '/admin/usuarios/');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al actualizar el usuario";
        $_SESSION['icono'] = 'error';
        header('Location: ' . $URL . '/admin/usuarios/update.php?id_usuario=' . $id_usuario);
    }
}

if ($password == $password_verify) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = $pdo->prepare("UPDATE tb_usuarios SET nombre_completo=:nombre_completo, email=:email, password=:password, cargo=:cargo, fyh_actualizacion = :fyh_actualizacion  
    WHERE id_usuario=:id_usuario ");
    $sql->bindParam('nombre_completo', $nombre_completo);
    $sql->bindParam('email', $email);
    $sql->bindParam('password', $password);
    $sql->bindParam('cargo', $cargo);
    $sql->bindParam('fyh_actualizacion', $fyh_creacion);
    $sql->bindParam('id_usuario', $id_usuario);

    if ($sql->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se actualizó al usuario de manera correcta";
        $_SESSION['icono'] = 'success';
        header('Location: ' . $URL . '/admin/usuarios/');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al actualizar el usuario";
        $_SESSION['icono'] = 'error';
        header('Location: ' . $URL . '/admin/usuarios/update.php?id_usuario='.$id_usuario);
    }
}else{
    session_start();
    $_SESSION['mensaje'] = "Las contraseñas no coinciden";
    $_SESSION['icono'] = 'error';
    header('Location: ' . $URL . '/admin/usuarios/update.php?id_usuario='.$id_usuario);
}

