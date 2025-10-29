<?php
/*Como en Java se utiliza el const para declarar una constante aunque
hay una pequeña excepcion que es el defien como en el siguiente ejemplo
    if(getenv('ENTORNO') === 'produccion'){
        define('DEBUG_MODE', fase);
    } else{
        define('DEBUG_MODE', true);
    }

En clases igual como en Java
    */
class MiClase{
    // Correcto: constante de clase
    const Tipo_Usuario = 'Admin';
}
?>