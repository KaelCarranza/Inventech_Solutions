<?php
$host = "localhost";
$bd = "tienda_inventech";
$usuario = "root";
$password = "";

try {
    $conexion = new PDO(
        "mysql:host=$host;dbname=$bd;charset=utf8mb4",
        $usuario,
        $password
    );
    $conexion->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

}catch (PDOException $e) {
    die("Error de conexion: " . $e->getMessage());
}
?>