<?php

session_start();

if (isset($_SESSION["userId"])) {

    require_once "config/db.php";

    $sql = "UPDATE users
            SET loginStatus = 0
            WHERE userId = ?";

    $consulta = $conexion->prepare($sql);
    $consulta->execute([$_SESSION["userId"]]);

}

$_SESSION = [];

session_destroy();

header("Location: login.php");
exit;

?>
