<?php
$paisesCapitales = array(
    "España" => "Madrid",
    "Alemania" => "Berlin",
    "Portugal" => "Lisboa",
    "Paises_bajos" => "Amsterdam",
    "Belgica" => "Bruselas",
);
ksort($paisesCapitales);
echo "Array ordenado alfabeticamente por clave <br>";
print_r($paisesCapitales);

echo "<br> <br>"; //Un espacio bonito

$paisesCapitalesPorValor = $paisesCapitales;
sort($paisesCapitalesPorValor);
echo "Array ordenado alfabeticamente por valor <br>";
print_r($paisesCapitalesPorValor);

echo "<br> <br>";//Un espacio bonito
$capitales = array_values($paisesCapitales);
$paises_claves = array_keys ($paisesCapitales);

echo "Array de capitales <br>";
print_r($capitales);

echo "<br> <br>"; //Un espacio bonito

echo "Array de paises <br>";
print_r($paises_claves);

echo "<br> <br>"; //Un espacio bonito

if(array_key_exists("Francia", $paisesCapitales)){
    echo "Francia existe";
}else{
    echo "Francia no existe";
}


