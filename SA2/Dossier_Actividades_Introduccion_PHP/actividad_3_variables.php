<?php

$nombre = "Juan";
$edad = 0;
$email = null;
$lista = array();
// $saldo se asume declarado sin valor (indefinido para isset)

echo "<table border='1' cellpadding='5'>
<tr>
    <th>Variable</th>
    <th>isset()</th>
    <th>empty()</th>
    <th>is_null()</th>
</tr>";

function evaluarVariable($nombreVar, &$varRef) {
    echo "<tr>";
    echo "<td>\$$nombreVar</td>";
    echo "<td>" . (isset($varRef) ? "true" : "false") . "</td>";
    echo "<td>" . (empty($varRef) ? "true" : "false") . "</td>";
    echo "<td>" . (is_null($varRef) ? "true" : "false") . "</td>";
    echo "</tr>";
}

evaluarVariable("nombre", $nombre);
evaluarVariable("edad", $edad);

// saldo (no definido)
echo "<tr>";
echo "<td>\$saldo</td>";
echo "<td>" . (isset($saldo) ? "true" : "false") . "</td>";
echo "<td>" . (empty($saldo) ? "true" : "false") . "</td>";
echo "</tr>";

evaluarVariable("email", $email);
evaluarVariable("lista", $lista);

echo "</table>";

?>

