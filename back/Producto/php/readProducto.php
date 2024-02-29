<?php
session_start();
include "../../inc/dbinfo.inc";

//Conectar con la base de datos
$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$query='SELECT * FROM producto';

$result = $connection->query($query);

// Verificar la conexión
if ($connection->connect_error) {
    die("Conexión fallida: " . $connection->connect_error);
}else{
    if($result->num_rows > 0) {
        echo json_encode($result->fetch_all(MYSQLI_ASSOC));
    }
}

$connection->close();
?>