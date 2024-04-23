<?php

include('../../config.php');

$username = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM tb_usuarios WHERE username = '$username' ";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

$contador = 0;
foreach ($usuarios as $usuario) {
    $contador = $contador + 1;
    $password_tabla = $usuario['password'];
    $password_cargo = $usuario['cargo'];
}

$hash = $password_tabla;
if (($contador > 0)  && (password_verify($password, $hash))) {
    echo "bienvenido al sistema";
    session_start();
    $_SESSION['sesion_email'] = $username;

    if ($password_cargo == 'Administrador') {
        session_start();
        $_SESSION['mensaje'] = "Bienvenido al sistema";
        $_SESSION['icono'] = "success";

        header('Location: ' . $URL . '/admin');
        
    } else {
        header('Location: ' . $URL . '/reservas.php');
        session_start();
        $_SESSION['mensaje'] = "Bienvenido, ya puede reservar su cita";
        $_SESSION['icono'] = "success";
    }
} else {
    //mandamos el mensaje de error al login vista
    session_start();
    $_SESSION['mensaje'] = "La cuenta o contraseña con incorrectos, vuelva a intentarlo";
    header('Location:' . $URL . '/login');
}
