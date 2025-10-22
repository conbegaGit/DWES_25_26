<?php
    function dividir($a,$b){
        if($b == 0){
            throw new Exception("El segundo argumento es 0");
        }
        return $a/$b;
    }

    try{
        $resul1 = dividir (5, 0);
        echo "Resul 1 $reul1"."<br>";
    }
    catch(Exception $e){
        echo "Excepción: ". $e->getMessage()."<br>";
    }
    finally{
        echo "Primer finally<br>";
    }

    try{
        $resul2 = dividir(5,2);
    }
    catch(Exception $e){
        echo "Excepción: ". $e->getMessage()."<br>";
    }
    finally{
        echo "Segundo finally<br>";
    }
