<?php
//ejemplo: de dfinir nuna constante basada en el entorno
if (getenv("Entorno") === "produccion") {
    define ("DEBUG_MODE" , false);
} else {
    define ("DEBUG_MODE" , true);
} 
class MiClase {
    //Correcto: constante de clase
    const TIPO_USUARIO = "Admin";

    //¡ERROR! No puedes usar define () aqui
    // define ("OTRA_COSA" , "valor");
}
?>