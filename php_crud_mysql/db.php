<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_crud'
);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
