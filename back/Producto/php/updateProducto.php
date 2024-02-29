<?php
session_start();
include "../../inc/dbinfo.inc";

//Conectar con la base de datos
$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$idP= $_POST['idP'];
$nomP = $_POST['nomP'];
$descP = $_POST['descP'];
$precioP = $_POST['precioP'];

// Editar cliente por email
$query = "UPDATE producto SET nombreP = '$nomP',  descripcionP = '$descP', precioP = '$precioP' WHERE idP = '$idP'";

$result = $connection->query($query);

if ($result === true) {
    // if (!empty($email)) {
        // Redirección a la página del perfil
        header('Location: ../productoList.html');
        exit();
    // } else {
    //     echo "Error: El campo de email está vacío.";
    // }
} else {
    echo "Error al editar el producto: " . $connection->error;
}

$connection->close();
?>