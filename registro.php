<?php
require_once "config/db.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $mensaje = "Correo electronico invalido.";

    } elseif (strlen($password) < 8) {

        $mensaje = "La contraseña debe tener al menos 8 caracteres.";

    } else {

        $consulta = $conexion->prepare(
            "SELECT userId FROM users WHERE email = ?"
        );

        $consulta->execute([$email]);

        if ($consulta->fetch()) {

            $mensaje = "Este correo ya esta registrado.";

        } else {

            $hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (email, password)
                    VALUES (?, ?)";

            $insertar = $conexion->prepare($sql);

            if ($insertar->execute([$email, $hash])) {

                header("Location: login.php?registro=exitoso");
                exit;

            } else {

                $mensaje = "Error al registrar el usuario.";

            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div class="contenedor">
        <h1>InvenTech Solutions</h1>
        <h2>Crear cuenta</h2>

        <p><?= htmlspecialchars($mensaje) ?></p>

        <form method="POST">
            <input type="email" name="email"
                placeholder="Correo electronico" required>

            <input type="password" name="password"
                placeholder="Contraseña" minlength="8" required>

            <button type="submit">Registrarse</button>
        </form>

        <p>¿Ya tienes cuenta?
            <a href="login.php">Iniciar sesion</a>
        </p>

    </div>

</body>
</html>
