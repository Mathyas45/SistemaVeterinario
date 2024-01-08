<?php
include('../../config.php');



$nombre_completo = $_POST['nombre_completo'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_verify = $_POST['password_verify'];
$cargo = 'CLIENTE';

//verificar dupicado
$contador = 0;
$sql  = "SELECT * FROM tb_usuarios where email ='$email' ";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario) {
    $contador = $contador + 1;
}

if ($contador > 0) {
    session_start();

    $_SESSION['mensaje'] = "El usuario con este correo ya existe " . $email;
    $_SESSION['icono'] = 'error';


    header('Location: ' . $URL . '/login/registro.php');
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

        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Se registró de manera correcta";
            $_SESSION['icono'] = 'success';

            //loguearse luego de registrarse
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
            }

            $hash = $password_tabla;
            if (($contador > 0)  && (password_verify($password, $hash))) {
                // echo "bienvenido al sistema";
                session_start();
                $_SESSION['sesion_email'] = $email;
                header('Location: ' . $URL . '/reservas.php');
            } else {
                // echo "error en los datos";
                header('Location: ' . $URL . '/login/registro.php');
            }

            // fin del logueo
        } else {
            session_start();

            $_SESSION['mensaje'] = "Error al registrarse ";
            $_SESSION['icono'] = 'error';
            header('Location: ' . $URL . '/login/registro.php');
        }
    } else {
        session_start();

        $_SESSION['mensaje'] = "Las contraseñas no coinciden ";
        $_SESSION['icono'] = 'error';
        header('Location: ' . $URL . '/login/registro.php');
    }
}
