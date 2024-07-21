<?php

define('APP_NAME', 'SISTEMA ODONTOLÓGICO');
define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('PASSWORD', '');
define('BD', 'sistemaodontologico');


$servidor = "mysql:dbname=" . BD . ";host=" . SERVIDOR;
try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    // echo "Conexión exitosa con la base de datos";
} catch (PDOException $e) {
    echo "Error no se pudo conectar a la base de datos";
}


$URL = "http://localhost/sistemadeveterinaria/";

// Establecer la zona horaria para Perú
date_default_timezone_set('America/Lima');
$fyh_creacion = date('Y-m-d H:i:s');
