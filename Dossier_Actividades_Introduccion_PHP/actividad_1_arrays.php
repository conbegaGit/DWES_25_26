<?php
    $paises_capitales= array(
        "Marruecos" => "Rabat",
        "Nigeria" => "Abuya",
        "Japón" => "Tokyo",
        "Alemania" => "Berlín",
        "Samoa" => "Apia",
    );
    echo "Ordenar por Claves: ". "<br>";
    
    ksort($paises_capitales);
    print_r($paises_capitales);

    echo "<br>";
    echo "<br>";

    echo "Ordenar por valores: ". "<br>";
    
    asort($paises_capitales);
    print_r($paises_capitales);
    echo "<br>";

    $capitales=array("Rabat", "Abuya", "Tokyo", "Berlín", "Apia");
    echo "<br>";
    echo "Valores de las capitales indexadas numéricamente: ". "<br>";
    array_values($paises_capitales);
    print_r($capitales);   
    echo"<br>";
    echo "<br>";
    echo "¿Francia existe?";
    echo "<br>";
    if(array_key_exists("Francia", $paises_capitales)){
        echo "Francia existe en el array";
    }else{
        echo "Francia no existe en el array";
    }

