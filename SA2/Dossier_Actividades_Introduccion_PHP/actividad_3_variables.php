<?php
    /* 
    Tareas: Define las siguientes variables: 

        $nombre = "Juan"; 
        $edad = 0; 
        $saldo; // No definida 
        $email = null; 
        $lista = array(); 

        (Asume que $saldo solo se declara sin asignación inicial en el entorno de pruebas, lo que para isset() la trataría como no definida). 
        Para cada una de las siguientes variables ($nombre, $edad, $saldo, $email, $lista), aplica y muestra el resultado de: 
        isset() 
        empty() 
        is_null() 

        Crea una tabla en el resultado para organizar la información. 
    */

        $nombre = "Juan"; 
        $edad = 0; 
        $email = null; 
        $lista = array();

        echo " Variable | Valor | isset | empty | is_null | <br>";

        $isset=isset($nombre);
        $empty=empty($nombre);
        $null=is_null($nombre);

        echo " nombre | $nombre | $isset | $empty | $null | <br>";

        $isset=isset($edad);
        $empty=empty($edad);
        $null=is_null($edad);

        echo " edad | $edad | $isset | $empty | $null | <br>";

        $isset=isset($email);
        $empty=empty($email);
        $null=is_null($email);

        echo " email | $email | $isset | $empty | $null | <br>";

        $isset=isset($lista);
        $empty=empty($lista);
        $null=is_null($lista);

        echo " Array |   | $isset | $empty | $null | <br>";

        