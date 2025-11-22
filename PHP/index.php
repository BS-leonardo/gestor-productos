<?php
require_once "conexion.php";

$stmt = $pdo->query("SELECT * FROM productos");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="index.php"><h2>TechnoMarket</h2></a>
        <div>
            <a class="btn btn-warning" href="crear.php">Agregar</a>
        </div>
    </div>
</nav>

<div class="container">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Listado de Productos</h4>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>N° prod</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($productos as $prod): ?>
                            <tr>
                                <td><?= ($prod["id_producto"]) ?></td>
                                <td><?= ($prod["producto"]) ?></td>
                                <td>$<?= $prod["precio"] ?></td>
                                <td><?= ($prod["categoria"]) ?></td>
                                <td><?= $prod["stock"] ?></td>
                                <td>
                                    <a href="editar.php?id=<?= $prod["id_producto"] ?>" class="btn btn-warning btn-sm">Modificar</a>
                                </td>
                                <td>
                                    <a href="eliminar.php?id=<?= $prod["id_producto"] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que querés eliminar este producto?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if (count($productos) === 0): ?>
                            <tr>
                                <td class="text-center">No hay productos cargados.</td>
                            </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
</body>
</html>