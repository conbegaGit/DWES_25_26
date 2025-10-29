<?php
    //Excepciones como mandar y recibirla
    function dividir($a, $b){
        if($b == 0){
            throw new Exception("El segundo argumento es 0");
        }
        return $a / $b;
    }

    try{
        $resul1 = dividir(5, 0);
        echo "Resul 1 $result1" . '<br>';
    }catch(Exception $e){
        echo "Exception: " . $e->getMessage() . '<br>';
    }finally{
        echo "Primer finally <br>";
    }

    try{
        $resul2 = dividir(5, 2);
        echo "Resul2 $resul2" . "<br>";
    }catch(Exception $e){
        echo "Exception: " . $e->getMessage() . "<br>";
    }finally{
        echo "Segundo finally <br>";
    }