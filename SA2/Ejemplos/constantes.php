<?php
/*Las constantes no se declaran con el $*/

//Ejemplo: definir una constante basada en el entorno
    if (getenv ('ENTORNO') === 'produccion'){
        define ('DEBUG_MODE', false);
    }
    else{
        define ('DEBUG_MODE', true);
    }

    class MiClase{
        // Correcto: constante de clase
        const TIPO_USUARIO = 'Admin';

        //¡ERROR! No puedes usar define() aquí.
        //define('OTRA_COSA', 'valor');
    }

?>