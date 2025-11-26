<?php
$cadena_conexion = "mysql:dbname=empresa;host=localhost";
$usuario = "root";
$clave = "";
try{
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h3>Conexión exitosa a la base de datos</h3>";

    $consulta = $bd->query("SELECT * FROM empleados");
    echo "<h4>Empleados:</h4>";
    echo "<table border='1' cell padding='5'>";
    echo "<tr><th>CODEMP</th><th>NOMBRE</th><th>APELLIDO 1</th><th>APELLIDO 2</th><th>DEPARTAMENTO</th></tr>";
    // Accedo a la tabla empleados y muestro sus datos jeje       
    foreach($consulta as $fila){
        echo "<tr>
            <td>{$fila['CodEmple']}</td>
            <td>{$fila['Nombre']}</td>
            <td>{$fila['Apellido1']}</td>
            <td>{$fila['Apellido2']}</td>
            <td>{$fila['Departamento']}</td>
        </tr>";
    }
    echo "</table>";


    $consulta = $bd->query("SELECT * FROM departamentos");
    echo "<h4>Departamentos:</h4>";
    echo "<table border='1' cell padding='5'>";
    echo "<tr><th>CODDEPT</th><th>NOMBRE</th><th>JEFE</th><th>PRESUPUESTO</th><th>CIUDAD</th></tr>";
    //Accedo a la tabla departamentos y muestro sus datos jeje
    foreach($consulta as $fila){
        echo "<tr>
            <td>{$fila['CodDept']}</td>
            <td>{$fila['Nombre']}</td>
            <td>{$fila['Jefe']}</td>
            <td>{$fila['Presupuesto']}</td>
            <td>{$fila['Ciudad']}</td>
        </tr>";
    }
    echo "</table>";

    $consulta = $bd->query("SELECT * FROM usuarios");
    echo "<h4>Usuarios:</h4>";
    echo "<table border='1' cell padding='5'>";
    echo "<tr><th>CODIGO</th><th>NOMBRE</th><th>CLAVE</th><th>ROL</th></tr>";
    //Accedo a la tabla usuarios y muestro sus datos jeje   
    foreach($consulta as $fila){
        echo "<tr>
            <td>{$fila['Codigo']}</td>
            <td>{$fila['Nombre']}</td>
            <td>{$fila['Clave']}</td>
            <td>{$fila['Rol']}</td>
        </tr>";
    }
    echo "</table>";



} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit();
}