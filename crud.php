<?php
include "config/db.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

    <script src="https://kit.fontawesome.com/4b21b27482.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid mt-4">

        <h2 class="text-center mb-4">CRUD de Productos</h2>
        <?php
        include "controllers/registroProducto.php";
        include "controllers/eliminarProducto.php";
        ?>

        <div class="row g-4">

            <div class="col-12 col-md-4">

                <form class="crud-form border rounded p-4 shadow-sm" method="POST">

                    <h4 class="text-center mb-4">Formulario</h4>

                    <div class="mb-3">
                        <label for="producto" class="form-label">Producto</label>
                        <input type="text" class="form-control"
                            id="producto" name="producto">
                    </div>

                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control"
                            id="precio" name="precio" step="0.01">
                    </div>

                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control"
                            id="cantidad" name="cantidad">
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control"
                            id="descripcion" name="descripcion">
                    </div>


                    <button type="submit" class="btn btn-primary w-100" name="btnInsertar" value="1">
                        Insertar Producto
                    </button>

                </form>

            </div>

            <div class="col-12 col-md-8">

                <div class="table-responsive">

                    <table class="table table-striped table-hover table-bordered align-middle">

                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sql = $conexion->query(" select * from productos ");
                            while ($datos = $sql->fetchObject()) { ?>
                                <tr>
                                    <td><?= $datos->idProducto ?></td>
                                    <td><?= $datos->Producto ?></td>
                                    <td><?= $datos->Precio ?></td>
                                    <td><?= $datos->Cantidad ?></td>
                                    <td><?= $datos->Descripcion ?></td>
                                    <td>
                                        <a href="productos.php?idProducto=<?= $datos->idProducto ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form method="POST" class="d-inline">
                                            <input type="hidden" name="idProducto" value="<?= $datos->idProducto ?>">
                                            <button type="submit" class="btn btn-small btn-danger" name="btnEliminar" value="1">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>