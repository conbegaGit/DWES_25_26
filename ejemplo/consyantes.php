<?php
// definir constante basada en el entorno
if (getenv ('entorno')=== 'produccion'){
    define ('debug_mode', false);

}else{
    define ('debug_mode', true);
}
class MiClase{
    //correcto constante de clase
const tipo_usurio='admin';
}
?>