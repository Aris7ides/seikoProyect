<?php 
session_start();
include "../../inc/dbinfo.inc";

//Conectar con la base de datos
$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

//Variable recibida desde el js
$idUsuario = $_POST['idToDelete'];

//Query para eliminar al cliente
$query = "DELETE FROM usuario WHERE id = '$idUsuario'";

$result = $connection->query($query);

if ($result === true) {
    //Redirección a la página de usuarios (recargarla)
    header('Location: ../usuarioList.html');
    exit();
} else {
    echo "alert('Error al eliminar el usuario')";
}

$connection->close();
?>