<?php

if (!empty($_POST["btnEliminar"])) {
    if (!empty($_POST["idProducto"])) {
        $idProducto = $_POST["idProducto"];
        $sql = $conexion->prepare(
            "DELETE FROM productos WHERE idProducto = :idProducto"
        );

        if ($sql->execute(["idProducto" => $idProducto])) {
            echo '<div class="alert alert-success">
                    Producto Eliminado correctamente
                  </div>';
        } else {
            echo "<div class='alert alert-danger'>Error al eliminar producto!!</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Producto no válido!!</div>";
    }
}
