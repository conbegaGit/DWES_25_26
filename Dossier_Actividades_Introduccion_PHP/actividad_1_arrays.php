<?php
$paises_capitales = array(
    "España" => "Madrid",
    "Francia" => "París",
    "Italia" => "Roma",
    "Alemania" => "Berlín",
    "Portugal" => "Lisboa"
);
// 1. Ordena el array alfabéticamente por el nombre del país (la clave) e imprime el resultado
echo " Países en orden alfabético :<br>";
ksort($paises_capitales);
foreach ($paises_capitales as $pais => $capital) {
    echo " - La capital de $pais es $capital.<br>";
}

// 2. Ordena el array alfabéticamente por el nombre de la capital (el valor) e imprime el resultado.
echo "<br>";
echo "Capitales en orden alfabético :<br>";
asort($paises_capitales);
foreach ($paises_capitales as $pais => $capital) {
    echo "- La capital de $pais es $capital.<br>";
}

// 3. Crea un nuevo array llamado $capitales que contenga solo los valores (las capitales) del array original e imprímelo
echo "<br>";
echo "Capitales :<br>";
$capitales = array_values($paises_capitales);
foreach ($capitales as $capital) {
    echo $capital . "<br>";
}

// 4. Crea un nuevo array llamado $paises_claves que contenga solo las claves (los países) del array original e imprímelo
echo "<br>";
echo "Países :<br>";
$paises_nombres = array_keys($paises_capitales);
foreach ($paises_nombres as $pais) {
    echo $pais . "<br>";
}

// 5. Verifica si la clave "Francia" existe en $paises_capitales y muestra un mensaje indicando si existe o no.
echo "<br>";
if (array_key_exists("Francia", $paises_capitales)) {
    echo "La clave 'Francia' existe en el array .<br>";
} else {
    echo "La clave 'Francia' no existe en el array.<br>";
}