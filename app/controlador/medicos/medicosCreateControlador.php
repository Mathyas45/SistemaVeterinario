<?php
include('../../config.php');

$nombre_completo = (isset($_POST['nombre_completo']) ? $_POST['nombre_completo'] : "");
$fecha_nacimiento = (isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : "");
$genero = (isset($_POST['genero']) ? $_POST['genero'] : "");
$dni = (isset($_POST['dni']) ? $_POST['dni'] : '');
$usuario =(isset($_POST['usuario'])?$_POST['usuario']:'');
$especialidad =(isset($_POST['especialidad'])?$_POST['especialidad']:'');
$email =(isset($_POST['email'])?$_POST['email']:'');
$celular =(isset($_POST['celular'])?$_POST['celular']:'');


$insertar = $pdo->prepare('INSERT INTO tb_medicos(nombres,fecha_nacimiento,genero,dni,usuario,especialidad,email,celular) VALUES(:nombres,:fecha_nacimiento,:genero,:dni,:usuario,:especialidad,:email,:celular)');
$insertar->bindParam(':nombres',$nombre_completo);
$insertar->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$insertar->bindParam(':genero',$genero);
$insertar->bindParam(':dni',$dni);
$insertar->bindParam(':usuario',$usuario);
$insertar->bindParam(':especialidad',$especialidad);
$insertar->bindParam(':email',$email);
$insertar->bindParam(':celular',$celular);
$insertar->execute();

if($insertar == true){
    session_start();
    $_SESSION['mensaje'] = "Se creo el medico  " . $nombre_completo . " correctamente.";
    $_SESSION['icono'] = 'success';
    header('Location: ' . $URL . '/admin/medicos/index.php');
    exit();
    
}
else{
    session_start();
    $_SESSION['mensaje'] = "Error al crear el medico  " . $nombre_completo . ".";
    $_SESSION['icono'] = 'error';
    header('Location: ' . $URL . '/admin/medicos/index.php');
    exit();
}


