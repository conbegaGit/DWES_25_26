<?php
$paises_capitales = array(
    "España" => "Madrid",
    "Francia" => "París",
    "Italia" => "Roma",
    "Alemania" => "Berlín",
    "Portugal" => "Lisboa"
);

echo " Países en orden alfabético :<br>";
ksort($paises_capitales);
foreach ($paises_capitales as $pais => $capital) {
    echo " - La capital de $pais es $capital.<br>";
}

echo "<br>";
echo "Capitales en orden alfabético :<br>";
asort($paises_capitales);
foreach ($paises_capitales as $pais => $capital) {
    echo "- La capital de $pais es $capital.<br>";
}

echo "<br>";
echo "Capitales :<br>";
$capitales = array_values($paises_capitales);
foreach ($capitales as $capital) {
    echo $capital . "<br>";
}

echo "<br>";
echo "Países :<br>";
$paises_nombres = array_keys($paises_capitales);
foreach ($paises_nombres as $pais) {
    echo $pais . "<br>";
}

echo "<br>";
if (array_key_exists("Francia", $paises_capitales)) {
    echo "La clave 'Francia' existe en el array .<br>";
} else {
    echo "La clave 'Francia' no existe en el array.<br>";
}