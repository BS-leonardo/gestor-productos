<?php
require_once "conexion.php";

if (!isset($_GET['id'])) {
    die("ID de producto no especificado.");
}

$id = intval($_GET['id']);

$stmt = $pdo->prepare("DELETE FROM productos WHERE id_producto = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
?>