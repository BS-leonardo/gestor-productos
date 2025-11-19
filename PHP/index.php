<?php
// Conexión a la BD
require_once "conexion.php";

$stmt = $pdo->query("SELECT * FROM productos");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="index.php" >TechnoMarket</a>
        <div>
            <a class="btn btn-warning" href="crear.php">Agregar</a>
        </div>
    </div>
</nav>

<div class="container">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="m-0">Listado de Productos</h4>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped text-center align-middle">
                    <thead>
                        <tr>
                            <th>n°prod</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $p): ?>
                            <tr>
                                <td><?= $p["id_producto"] ?></td>
                                <td><?= htmlspecialchars($p["producto"]) ?></td>
                                <td>$<?= $p["precio"] ?></td>
                                <td><?= htmlspecialchars($p["categoria"]) ?></td>
                                <td><?= $p["stock"] ?></td>
                                <td>
                                    <a href="editar.php?id=<?= $p["id_producto"] ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="eliminar.php?id=<?= $p["id_producto"] ?>" 
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('¿Seguro que querés eliminar este producto?');">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if (count($productos) === 0): ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">No hay productos cargados.</td>
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
