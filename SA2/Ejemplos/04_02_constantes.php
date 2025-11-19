<?php

if(getenv(name:'Entorno') === 'produccion'){
    define (constant_name: 'DEBUG_MODE', false);
} else{
    define('DEBUG_MODE', true);
}


class MiClase {
    const TIPO_USUARIO = 'Admin';
}

?>