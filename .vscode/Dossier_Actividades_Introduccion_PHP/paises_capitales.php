<?php
$paises_capitales= array(
    "España" => "Madrid",
    "Mozambique" => "Maputo",
    "Canada" => "Otawa",
    "Bosnia y Herzegovina" => "Sarajevo",
    "Hundría" => "Budapest"
);

ksort($paises_capitales);
echo "<br> Tarea 1: <br>";
print_r( $paises_capitales);
asort($paises_capitales);
echo "<br> Tarea 2: <br>";
print_r( $paises_capitales);

echo "<br> Tarea 3: <br>";
print_r( $paises_capitales );
$paises_claves=array("Madrid", "Maputo", "Otawa", "Sarajevo", "Budapest");
array_values($paises_capitales);
echo "<br> Tarea 4: <br>";
array_keys($paises_capitales);
print_r( $paises_capitales );
if (array_key_exists('Mozambique', $paises_capitales)){
     echo "Mozambique esta dentro del Array <br>";
} else{
    echo "no existe ese pais <br>";
}