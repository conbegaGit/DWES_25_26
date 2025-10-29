<?php
$paises_capitales = array(
    "España" => "Madrid",
    "Francia" => "París",
    "Reino Unido" => "Londres",
    "Alemania" => "Berlín",
    "Italia" => "Roma"
);
$paises = $paises_capitales;
ksort($paises);
echo "<h1>Ordenado por país (ksort)</h1>";
print_r($paises);
echo "<br>";
echo "<br>";
$capital = $paises_capitales; 
asort($capital);
echo "<h1>Ordenado por capital (asort)</h1>";
print_r($capital);
echo "<br>";
echo "<br>";
$capitales = array_values($paises_capitales);
echo "<h1>Array de capitales (array_values)</h1>";
print_r($capitales);
echo "<br>";
echo "<br>";
$paises_claves = array_keys($paises_capitales);
echo "<h1>Array de países (array_keys)</h1>";
print_r($paises_claves);
echo "<br>";
echo "<br>";
echo "<h1>Verificación de existencia de la clave 'Francia'</h1>";
if (array_key_exists("Francia", $paises_capitales)) {
    echo "La clave 'Francia' existe en \$paises_capitales y su capital es: " . $paises_capitales["Francia"] . ".";
} else {
    echo "La clave 'Francia' NO existe en \$paises_capitales.";
}

?>