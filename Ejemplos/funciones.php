<?php

//Función para sumar
function suma($a, $b)
{
    return $a + $b;
}
echo suma(4, 8).'<br>';
$var1 = 35;
$var2 = 5;
$var3 = suma($var1, $var2);
echo $var3.'<br>';

//Función Saludar

function saludar($nombre ='usuario')
{
    echo "Hola $nombre <br>";
}

saludar();
saludar("Ana");

//Función duplicar
function duplicarMal($a)
{
    $a = $a * 2;
}
function duplicar($a)
{
    return $a * 2;
}
function duplicar2(&$a)
{
    $a = $a * 2;
}
$var4 = 5;
duplicarMal($var4);
echo "$var4 <br>";

$var4 = duplicar($var4);

echo "$var4 <br>";
duplicar2($var4);

echo "$var4 <br>";