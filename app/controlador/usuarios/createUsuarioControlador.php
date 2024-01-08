<?php
include('../../config.php');



$nombre_completo = $_POST['nombre_completo'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_verify = $_POST['password_verify'];
$cargo = $_POST['cargo'];

//verificar dupicado
$contador = 0;
$sql  = "SELECT * FROM tb_usuarios where email ='$email'";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usaurio) {
    $contador = $contador + 1;
}

if ($contador > 0) {
    session_start();
    $_SESSION['mensaje'] = "El usuario con este correo ya existe " . $email;
    $_SESSION['icono'] = 'error';


    header('Location: ' . $URL . '/admin/usuarios/create.php');
} else {

    if ($password == $password_verify) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sentencia = $pdo->prepare("INSERT INTO tb_usuarios (nombre_completo, email, password, cargo, fyh_creacion)
                                                    VALUES (:nombre_completo, :email, :password, :cargo, :fyh_creacion) ");
        $sentencia->bindParam(":nombre_completo", $nombre_completo);
        $sentencia->bindParam(":email", $email);
        $sentencia->bindParam(":password", $password);
        $sentencia->bindParam(":cargo", $cargo);
        $sentencia->bindParam(":fyh_creacion", $fyh_creacion);
        $sentencia->execute();

        if ($sentencia) {
            session_start();
            $_SESSION['mensaje'] = "Se registro al usuario de manera correcta";
            $_SESSION['icono'] = 'success';
            header('Location: ' . $URL . '/admin/usuarios');
        } else {
            session_start();

            $_SESSION['mensaje'] = "Error al registrar el usuario ";
            $_SESSION['icono'] = 'error';
            header('Location: ' . $URL . '/admin/usuarios/create.php');
        }
    } else {
        session_start();

        $_SESSION['mensaje'] = "Las contraseñas no coinciden ";
        $_SESSION['icono'] = 'error';
        header('Location: ' . $URL . '/admin/usuarios/create.php');
    }
}
