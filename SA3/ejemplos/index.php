<?php 
if (isset($_COOKIE["usuario"])) {
    //si ya hay cooke, dirige a la bienvenida
    //es decir, la segunda vez que entras en index.php. La cookie ya existe y muestra el formulario
    //directamente se dirige a bienvenida.php
    header("Location: bienvenida.php");
    echo "En index.php. La cookie 'usuario' ya existe. Redirige a bienvenida.php";
    exit();
}
?>




<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>
<body>
    <h1> ¡Bienvenido a nuestra web!</h1>
    <p> Introduce tu nombre para continuar:</p>

    <form method="post" action="bienevenida.php">
        <input type="text" name="nombre" >
        <!-- Si añadimos el atributo required, nunca pasará por -->
        <input type="submit" value="Entrar">
        <!--LISTA DE COLORES-->    
        <label for="colores">Elige un color favorito:</label>
        <input list="colors" name="colores" id="colores">
        <datalist id="colors">
            <option value="Azul">
            <option value="Verde">
            <option value="Rojo">
        </datalist>
    </form>
</body>
</html>