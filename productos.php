<?php

include "config/db.php";

$idProducto = $_GET["idProducto"];

$sql = $conexion->query(" select * from productos where idProducto=$idProducto");


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4b21b27482.js" crossorigin="anonymous"></script>
</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-12 col-md-8 col-lg-6">

                <div class="card shadow-sm border-0 rounded-3">

                    <div class="card-header bg-primary text-white text-center py-3">
                        <h3 class="mb-0">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Modificar Productos
                        </h3>
                    </div>

                    <div class="card-body p-4">

                        <form class="crud-form" method="POST">

                            <input type="hidden" name="idProducto" value="<?= $_GET["idProducto"] ?>">

                            <?php
                            include "controllers/modificarProducto.php";


                            while ($datos = $sql->fetchObject()) { ?>

                                <div class="mb-3">
                                    <label for="producto" class="form-label fw-semibold">Producto</label>
                                    <input type="text" id="producto" class="form-control" name="producto" value="<?= $datos->Producto ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="precio" class="form-label fw-semibold">Precio</label>
                                    <input type="text" id="precio" class="form-control" name="precio" value="<?= $datos->Precio ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="cantidad" class="form-label fw-semibold">Cantidad</label>
                                    <input type="text" id="cantidad" class="form-control" name="cantidad" value="<?= $datos->Cantidad ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="descripcion" class="form-label fw-semibold">Descripción</label>
                                    <input type="text" id="descripcion" class="form-control" name="descripcion" value="<?= $datos->Descripcion ?>">
                                </div>

                            <?php }
                            ?>

                            <div class="d-flex gap-2 mt-4">

                                <button type="submit"
                                    class="btn btn-primary flex-fill"
                                    name="btnModificar"
                                    value="1">
                                    <i class="fa-solid fa-floppy-disk"></i>
                                    Modificar Producto
                                </button>

                                <a href="crud.php" class="btn btn-secondary flex-fill">
                                    <i class="fa-solid fa-arrow-left"></i>
                                    Regresar
                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>