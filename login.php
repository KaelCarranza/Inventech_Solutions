<?php
session_start();
require_once "config/db.php";

$mensaje = "";

if (isset($_GET["registro"]) && $_GET["registro"] == "exitoso") {
    $mensaje = "Registro exitoso. Inicia sesion.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = ?";

    $consulta = $conexion->prepare($sql);
    $consulta->execute([$email]);

    $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($password, $usuario["password"])) {

        session_regenerate_id(true);

        $_SESSION["userId"] = $usuario["userId"];
        $_SESSION["email"] = $usuario["email"];
        $_SESSION["role"] = $usuario["role"];

        $actualizar = $conexion->prepare(
            "UPDATE users SET loginStatus = 1 WHERE userId = ?"
        );

        $actualizar->execute([$usuario["userId"]]);

        header("Location: dashboard.php");
        exit;

    } else {

        $mensaje = "Correo o contraseña incorrectos.";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="contenedor">

    <h1>InvenTech Solutions</h1>
    <h2>Iniciar sesion</h2>

    <?= htmlspecialchars($mensaje) ?></p>

    <form method="POST">

        <input type="email" name="email"
               placeholder="Correo electronico" required>

        <input type="password" name="password"
               placeholder="Contraseña" required>

        <button type="submit">Ingresar</button>

    </form>

    <p>¿No tienes cuenta?
        <a href="registro.php">Registrarse</a>
    </p>

    </div>
</body>
</html>
