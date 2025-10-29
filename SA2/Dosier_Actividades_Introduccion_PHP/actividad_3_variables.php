<?php
$nombre = "Juan";
$edad = 0;
$saldo;
$email = null;
$lista = array();

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>Variable</th>
        <th>Valor / Estado</th>
        <th>isset()</th>
        <th>empty()</th>
        <th>is_null()</th>
      </tr>";

function mostrar($nombreVar, $valor, $definida = true) {
    echo "<tr>";
    echo "<td>\$$nombreVar</td>";

    if (!$definida) {
        echo "<td>No definida</td>";
    } else {
        if (is_array($valor)) {
            echo "<td>array(" . count($valor) . ")</td>";
        } elseif (is_null($valor)) {
            echo "<td>null</td>";
        } elseif ($valor === "") {
            echo "<td>cadena vacía</td>";
        } else {
            echo "<td>$valor</td>";
        }
    }

    echo "<td>" . (isset($valor) ? "true" : "false") . "</td>";
    echo "<td>" . (empty($valor) ? "true" : "false") . "</td>";

    if ($definida) {
        echo "<td>" . (is_null($valor) ? "true" : "false") . "</td>";
    } else {
        echo "<td>variable no definida</td>";
    }

    echo "</tr>";
}

mostrar("nombre", $nombre);
mostrar("edad", $edad);
mostrar("saldo", null, false);
mostrar("email", $email);
mostrar("lista", $lista);

echo "</table>";