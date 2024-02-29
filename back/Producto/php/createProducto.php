<?php
session_start();
include "../../inc/dbinfo.inc";

//Conectar con la base de datos
$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$nomP = $_POST['nomP'];
$descP = $_POST['descP'];
$precioP = $_POST['precioP'];
// $categP = $_POST['categP'];
// $publiP = $_POST['publiP'];

$query = "INSERT INTO producto (nombreP, descripcionP, precioP) VALUES ('$nomP', '$descP', '$precioP')";

$result = $connection->query($query);

if ($result === true) {
        header('Location: ../productoList.html');
        exit();
} else {
        $query = "DELETE FROM clientes WHERE nombreP = '$nomP'";
        $connection->query($query);
        echo "alert('error al crear el producto')";
}
$connection->close();
?>