<?php
session_start();
include "../../inc/dbinfo.inc";

//Conectar con la base de datos
$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

//Variable recibida desde el js
$idProducto = $_POST['idToDelete'];

//Query para eliminar al cliente
$query = "DELETE FROM producto WHERE idP = '$idProducto'";

$result = $connection->query($query);

if ($result === true) {
    //Redirección a la página de clientes (recargarla)
    header('Location: ../productoList.html');
    exit();
} else {
    echo "alert('Error al eliminar el usuario')";
}

$connection->close();
?>