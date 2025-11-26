<?php
$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try {
    //CONEXION CON PDO
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXEPTION);

    echo "<h3> Conexión establecida correctamente</h3>";
    
    echo "<h4>Empleados:</h4>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>CODEMP</th><th>Nombre</th><th>Apellido 1</th><th>Departamento</th>"

    foreach ($consulta as $fila) {
        echo "<tr>
                <td>($fila['CodEmple']}</td>
                <td>($fila['Nombre']}</td>
                <td>($fila['Apellido 1']}</td>
                <td>($fila['Departamento']} €</td>
                </tr>";

    }
    echo "</table>";

}

    catch (PDOException $e){
        echo "Error de conexion " . $e -> getMessage();
    }