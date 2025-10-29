<?php

$nombre = "Juan";
$edad = 0;
$email = null;
$lista = [];

$variables = ["nombre", "edad", "saldo", "email", "lista"];

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Variable</th><th>isset()</th><th>empty()</th><th>is_null()</th></tr>";

foreach ($variables as $var) {
    echo "<tr>";
    echo "<td>\$$var</td>";
    echo "<td>" . (isset($$var) ? 'true' : 'false') . "</td>";
    echo "<td>" . (empty($$var) ? 'true' : 'false') . "</td>";
    echo "<td>" . (is_null($$var) ? 'true' : 'false') . "</td>";
    echo "</tr>";
}
echo "</table>";


