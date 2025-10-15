<?php
// declaración
$arr1 = [
    0=>111,
    1=>222,
    2=>333,
];
$arr2 = array(
  "1111A"=> "César",
  "1112B"=> "kanye",
  "1113C" => "zésar", 
);
print_r($arr2 );
echo "<br>";
//como se recorren
foreach($arr2 as $nombre){
    echo "$nombre <br>";
}
foreach($arr2 as $codigo => $nombre){
    echo "Código: $codigo Nombre: $nombre <br>";
}
echo "<br>". "pos 0:" . $arr1[0] . "<br>";
$arr2 ["1113C"]= "bob";
print_r($arr2);