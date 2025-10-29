<?php
    $nombre = "Juan";
    $edad = 0;
    $saldo; //No definida
    $email = null;
    $lista = array();

    echo "Estado de las variables";
    echo "<table border='1'>";
    echo "<tr>
            <th>Variable</th>
            <th>isset()</th>
            <th>empty()</th>
            <th>is_null()</th>
        </tr>";

    //Función auxiliar para mostrar true/false como texto
    function mostrar($valor) {
        return $valor ? "true" : "false";
    }

    //nombre
    echo "<tr>
            <td>nombre</td>
            <td>" . mostrar(isset($nombre)) . "</td>
            <td>" . mostrar(empty($nombre)) . "</td>
            <td>" . mostrar(is_null($nombre)) . "</td>
        </tr>";

    //edad
    echo "<tr>
            <td>edad</td>
            <td>" . mostrar(isset($edad)) . "</td>
            <td>" . mostrar(empty($edad)) . "</td>
            <td>" . mostrar(is_null($edad)) . "</td>
        </tr>";

    //saldo
    echo "<tr>
            <td>saldo</td>
            <td>" . mostrar(isset($saldo)) . "</td>
            <td>" . mostrar(empty($saldo)) . "</td>
            <td>" . mostrar(is_null($saldo)) . "</td>
          </tr>";

    //email
    echo "<tr>
            <td>email</td>
            <td>" . mostrar(isset($email)) . "</td>
            <td>" . mostrar(empty($email)) . "</td>
            <td>" . mostrar(is_null($email)) . "</td>
          </tr>";

    //lista
    echo "<tr>
            <td>lista</td>
            <td>" . mostrar(isset($lista)) . "</td>
            <td>" . mostrar(empty($lista)) . "</td>
            <td>" . mostrar(is_null($lista)) . "</td>
        </tr>";

    echo "</table>";