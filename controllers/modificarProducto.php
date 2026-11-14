<?php

if (!empty($_POST["btnModificar"])) {
    if (
        !empty($_POST["producto"]) &&
        !empty($_POST["precio"]) &&
        !empty($_POST["cantidad"]) &&
        !empty($_POST["descripcion"])
    ) {
        $idProducto = $_POST["idProducto"];
        $producto = $_POST["producto"];
        $precio = $_POST["precio"];
        $cantidad = $_POST["cantidad"];
        $descripcion = $_POST["descripcion"];
        $sql = $conexion->query(
            "UPDATE productos 
            SET producto='$producto', 
                precio=$precio, cantidad=$cantidad, 
                descripcion='$descripcion' 
            WHERE idProducto=$idProducto "
        );

        if ($sql->execute()) {
            header("Location: crud.php");
            exit();
        } else {
            echo "<div class='alert alert-warning'>Error al modificar producto!!</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Campos vacíos!!</div>";
    }
}
