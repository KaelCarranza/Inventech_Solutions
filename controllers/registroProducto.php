<?php

if (!empty($_POST["btnInsertar"])) {
    if (
        !empty($_POST["producto"]) &&
        !empty($_POST["precio"]) &&
        !empty($_POST["cantidad"]) &&
        !empty($_POST["descripcion"])
    ) {
        $producto = $_POST["producto"];
        $precio = $_POST["precio"];
        $cantidad = $_POST["cantidad"];
        $descripcion = $_POST["descripcion"];

        $sql = $conexion->query(
            "INSERT INTO productos(producto,precio,cantidad,descripcion)
             VALUES('$producto','$precio','$cantidad','$descripcion')"
        );

        if ($sql) {
            echo '<div class="alert alert-success">
                    Producto registrado correctamente
                  </div>';
        } else {
            echo "<div class='alert alert-danger'>
                    Error al ingresar producto!
                  </div>";
        }
    } else {
        echo "<div class='alert alert-warning'>
                Campos vacíos!!
              </div>";
    }
}

?>
