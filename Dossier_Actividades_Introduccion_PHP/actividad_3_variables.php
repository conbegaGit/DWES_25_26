<?php
$nombre = "Juan"; 
$edad = 0; 
$saldo = 0; // Inicializado
$email = null; 
$lista = array(); 

echo "<h1>Verificación de estado de las variables</h1>";
echo "<h2>Variable nombre: '$nombre'</h2>";
echo "<br>";
echo "<h3>isset". "=" . isset($nombre)."</h3>";
echo "<br>";
echo "<h3>empty". "=" . empty($nombre)."</h3>";
echo "<br>";
echo "<h3>is_null". "=" . is_null($nombre)."</h3>";
echo "<br>";

echo "<h2>Variable edad: '$edad'</h2>";
echo "<br>";
echo "<h3>isset". "=" . isset($edad)."</h3>";
echo "<br>";
echo "<h3>empty". "=" . empty($edad)."</h3>";
echo "<br>";
echo "<h3>is_null". "=" . is_null($edad)."</h3>";
echo "<br>";

echo "<h2>Variable saldo: '$saldo'</h2>";
echo "<br>";
echo "<h3>isset". "=" . isset($saldo)."</h3>";
echo "<br>";
echo "<h3>empty". "=" . empty($saldo)."</h3>";
echo "<br>";
echo "<h3>is_null". "=" . is_null($saldo)."</h3>";
echo "<br>";


echo "<h2>Variable email: '$email'</h2>";
echo "<br>";
echo "<h3>isset". "=" . isset($email)."</h3>";
echo "<br>";
echo "<h3>empty". "=" . empty($email)."</h3>";
echo "<br>";
echo "<h3>is_null". "=" . is_null($email)."</h3>";
echo "<br>";

echo "<h2>Variable lista: (array vacio)</h2>";
echo "<br>";
echo "<h3>isset". "=" . isset($lista)."</h3>";
echo "<br>";
echo "<h3>empty". "=" . empty($lista)."</h3>";
echo "<br>";
echo "<h3>is_null". "=" . is_null($lista)."</h3>";
echo "<br>";