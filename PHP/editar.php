<?php
require_once "conexion.php";

if (!isset($_GET["id"])) {
    die("ID de producto inválido.");
}

$id = $_GET["id"];
$stmt = $pdo->prepare("SELECT * FROM productos WHERE id_producto = ?");
$stmt->execute([$id]);
$producto = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["producto"];
    $precio = $_POST["precio"];
    $categoria = $_POST["categoria"];
    $stock = $_POST["stock"];
    $actualizar = $pdo->prepare(" UPDATE productos SET producto = ?, precio = ?, categoria = ?, stock = ? WHERE id_producto = ?");
    $actualizar->execute([$nombre, $precio, $categoria, $stock, $id]);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand"><h2>TechnoMarket</h2></a>
        <a class="btn btn-warning" href="index.php">Volver</a>
    </div>
</nav>
<div class="container">
    <div class="card shadow col-md-6 mx-auto">
        <div class="card-header bg-primary text-white">
            <h4 class="m-0">Modificar Producto</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Producto</label>
                    <input type="text" name="producto" class="form-control" required value="<?= ($producto['producto']) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="number" name="precio" class="form-control" required value="<?= $producto['precio'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Categoría</label>
                    <input type="text" name="categoria" class="form-control" required value="<?= ($producto['categoria']) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" required value="<?= $producto['stock'] ?>">
                </div>
                <button class="btn btn-warning w-100">Guardar cambios</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>