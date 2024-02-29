<?php 
session_start();
include "../../inc/dbinfo.inc";

//Conectar con la base de datos
$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$id= $_POST['idS'];
$name = $_POST['user'];
$email = $_POST['email'];
$passwd = $_POST['psswd'];

$hashContraseña = password_hash($passwd, PASSWORD_DEFAULT);

// Editar cliente por email
$query = "UPDATE usuario SET user = '$name', email = '$email', psswd = '$hashContraseña' WHERE id = '$id'";

$result = $connection->query($query);

if ($result === true) {
    if (!empty($email)) {
        // Redirección a la página del perfil
        header('Location: ../usuarioList.html');
        exit();
    } else {
        echo "Error: Hay un campo que está vacío.";
    }
} else {
    echo "Error al editar el usuario: " . $connection->error;
}

$connection->close();
?>