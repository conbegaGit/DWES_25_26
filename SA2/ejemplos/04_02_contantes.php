<?php
define("PI", 3.1416);
const IVA = 0.21;

echo PI, " ", 

//Ejemplo: Definir una constante basada en el entorno.
if  (getenv('ENTORNO') == 'produccion'){
    define('DEBUG_MODE', false)
} else {
    define('DEBUG_MODE', true)
}

class MiClase{
    // Correcto: contante de clase
    const TIPO_USUARIO = 'Admin';
    // ERROR No puedes usar define() aquí.
    // define('OTRA_COSA', 'VALOR');
}
?>