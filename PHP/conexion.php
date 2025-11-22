<?php
$host = "localhost";
$bd = "mercado";
$usuario = "root";
$contraseña = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$bd;charset=utf8", $usuario, $contraseña);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    die("Error de conexión: " . $error->getMessage());
}