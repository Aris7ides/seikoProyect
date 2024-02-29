<?php 
session_start();
include "../../inc/dbinfo.inc";

//Conectar con la base de datos
$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$name = $_POST['user'];
$email = $_POST['email'];
$passwd = $_POST['psswd'];

$hashContraseña = password_hash($passwd, PASSWORD_DEFAULT);

$query = "INSERT INTO usuario (user, email, psswd) VALUES ('$name', '$email', '$hashContraseña')";

$result = $connection->query($query);

if ($result === true) {
        header('Location: ../usuarioList.html');
        exit();
} else {
        $query = "DELETE FROM usuario WHERE email = '$email'";
        $connection->query($query);
        echo "alert('error al crear el usuario')";
}
$connection->close();
?>