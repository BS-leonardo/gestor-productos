<?php
require_once "conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $producto  = trim($_POST["producto"]);
    $precio    = trim($_POST["precio"]);
    $categoria = trim($_POST["categoria"]);
    $stock     = trim($_POST["stock"]);

    if ($producto === "" || $precio === "" || $categoria === "" || $stock === "") {
        $mensaje = "Todos los campos son obligatorios.";
    } else {

        $sql = "INSERT INTO productos (producto, precio, categoria, stock) VALUES (:producto, :precio, :categoria, :stock)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":producto", $producto);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":categoria", $categoria);
        $stmt->bindParam(":stock", $stock);

        if ($stmt->execute()) {
            header("Location: index.php?mensaje=creado");
            exit;
        } else {
            $mensaje = "Error al guardar el producto.";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="index.php"><h4>TechnoMarket</h4></a>
    </div>
</nav>

<div class="container">
    <div class="card shadow col-md-6">
        <div class="card-header bg-primary text-white">
            <h4>Agregar Producto</h4>
        </div>

        <div class="card-body">

            <?php if ($mensaje): ?>
                <div class="alert alert-danger"><?= $mensaje ?></div>
            <?php endif; ?>

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">producto</label>
                    <input type="text" name="producto" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="number" name="precio" class="form-control" min="1" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Categoría</label>
                    <input type="text" name="categoria" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" min="0" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Guardar</button>
                <a href="index.php" class="btn btn-warning mt-2 w-100">Volver</a>

            </form>
        </div>
    </div>
</div>
</body>
</html>