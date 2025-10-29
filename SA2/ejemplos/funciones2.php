<?php
//Funcion suma
    function suma($a, $b) {
        return $a + $b;
    }
    echo suma(4,8).'<br>';
    $var1= 35;
    $var2= 5;
    $var3 = suma($var1, $var2);
    echo $var3 . "<br> <br>";
//Funcion saludar
    function saludar($nombre = 'usuario') {
        echo "Hola $nombre <br>";
    }
    saludar();
    saludar("Ana <br>");
//Funcion duplicar
    function duplicarMal($a) { //Este $a se podria considerar un $var2 que se multiplica pero no afecta al $var1
        $a = $a * 2;
    }
    function duplicar($a) {//Se multiplica corectamente y se devuelve el valor
        return $a * 2;
    }
    function duplicar2(&$a) {//El & hace que si modificas el $a tambien se modifica el $var1
        $a = $a * 2;
    }
    $var1 = 5;
    duplicarMal($var1);
    echo "DuplicarMal = $var1 <br>";
    $var1 = duplicar($var1);
    echo "Duplicar = $var1 <br>";
    duplicar2($var1);
    echo "Duplicar2 = $var1 <br> <br>";
//Funcion dividir
    function dividir($a, $b){
        if ($b==0){
            throw new Exception("El segundo argumento es 0");
        }
        return $a / $b;
    }
    try{
        $resul1 = dividir(5,0);
        echo "Resul 1: $resul1 <br>";
    }catch(Exception $e){
        echo "Excepcion: ". $e->getMessage()."<br>";
    }finally{
        echo "Primer finally <br>";
    }
    try{
        $resul2 = dividir(5,2);
        echo "Resul 2: $resul2 <br>";
    }catch(Exception $e){
        echo "Excepcion: ". $e->getMessage()."<br>";
    }finally{
        echo "Segundo finally <br>";
    }
