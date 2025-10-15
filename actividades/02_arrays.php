<?php
$fruta = array(
    "manzanas",
    "coco",
    "mango",
    "ciruela",
    "platano",
);
echo "la primera fruta es: $fruta[0]";
echo "<br>";
echo "la ultima fruta es:" . $fruta[count ($fruta)-1];
echo "<br>";
$fruta[]="uva";
echo "LISTA: <br>";
foreach($fruta as $nombre_fruta){
    echo " $nombre_fruta";
    echo ",";
}

echo ".";