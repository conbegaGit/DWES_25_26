<?php
session_start();
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../includes/header.php";

$id = intval($_GET['id'] ?? 0);
$stmt = $bd->prepare("SELECT * FROM usuarios WHERE Codigo = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    flash_set("Usuario no encontrado");
    header("Location: listar.php");
    exit();
}

$codigo = $user['Codigo'];
$nombre = $user['Nombre'];
$clave = $user['Clave'];
$rol = $user['Rol'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = trim($_POST['Codigo'] ?? '');
    $nombre = trim($_POST['Nombre'] ?? '');
    $clave = trim($_POST['Clave'] ?? '');
    $rol = intval($_POST['Rol'] );

    if ($nombre && $clave && isset($_POST['Rol'])) {
        $stmt = $bd->prepare("UPDATE usuarios SET Nombre=?, Clave=?, Rol=? WHERE Codigo=?");
        $stmt->execute([$nombre, $clave, $rol, $codigo]);
        flash_set("Usuario actualizado");
        header("Location: listar.php");
        exit;
    }
}
?>