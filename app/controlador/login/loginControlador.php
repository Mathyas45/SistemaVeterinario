<?php

include('../../config.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM tb_usuarios WHERE email = '$email' ";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

$contador = 0;
foreach ($usuarios as $usuario) {
    $contador = $contador + 1;
    $password_tabla = $usuario['password'];
    $password_cargo= $usuario['cargo'];
}

$hash = $password_tabla;
if (($contador > 0)  && (password_verify($password, $hash))) {
    echo "bienvenido al sistema";
    session_start();
    $_SESSION['sesion_email'] = $email;
    
    if( $password_cargo == 'Administrador'){
        header('Location: ' . $URL . '/admin');

    }else{
        header('Location: ' . $URL . '/reservas.php');

    }
} else {
    echo "error en los datos";
    header('Location: ' . $URL . '/login');
}
