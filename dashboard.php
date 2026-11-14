<?php
session_start();

if (!isset($_SESSION["userId"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InvenTech Solutions</title>

    <link rel="stylesheet" href="css/inicio.css?v=5">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

    <header class="header">

        <div class="marca">
            <div class="logo-icono">
                <i class="fa-solid fa-cube"></i>
            </div>

            <div class="logo-texto">
                <h2>InvenTech</h2>
                <span>SOLUTIONS</span>
            </div>
        </div>

        <nav class="nav">
            <a href="dashboard.php" class="activo">Inicio</a>
            <a href="listaProductos.php">Productos</a>
            <a href="pedidos.php">Mis pedidos</a>
            <a href="crud.php">Administrador</a>
        </nav>

        <form class="buscador" action="products.php" method="GET">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" name="buscar"
                placeholder="Buscar productos...">
        </form>

        <div class="opciones">

            <a href="#" class="notificaciones">
                <p>✉︎</p>
            </a>

            <div class="usuario">

                <div class="avatar">
                    <img src="img/user.png" alt="Avatar de usuario">
                </div>

                <div class="usuario-info">
                    <strong>
                        <?= htmlspecialchars($_SESSION["email"]) ?>
                    </strong>
                    <small>
                        <?= htmlspecialchars($_SESSION["role"]) ?>
                    </small>
                </div>

                <a href="logout.php" title="Cerrar sesión">
                    <i class="fa-solid fa-chevron-down"></i>
                </a>

            </div>

            <a href="cart.php" class="carrito">
                <img src="img/cart.png" alt="Carrito de compras">
            </a>

        </div>

    </header>
    <br><br>
    <h1>Bienvenido a InvenTech Solutions</h1>
    <br>
    <p>Sistema en construcción. Por favor, navega a través de las secciones disponibles.</p>
    <div class="contenedor">
        <div class="tarjeta">
            <img src="img/tarjetaVideo.jpeg" alt="Imagen de tarjeta de video" class="imagen-principal">
            <p>
                <strong>Tarjeta de Video</strong><br>
                Descripción: Tarjeta gráfica de alto rendimiento para juegos y diseño.<br>
                Precio: ₡250.000<br>
            <div>
                <div>
</body>

</html>