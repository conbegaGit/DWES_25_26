<?php

//Conexion a la DB
$cadena_conexion = 'mysql:dbname=empresa;host=localhost;charset=utf8';
$usuario = 'root';
$clave = '';

try{
    //Conexion con PDO
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Le dice a php que capture el error en el catch

    echo "<h3> Conexion establecida correctamente </h3>";

    $consulta = $bd->query("SELECT * FROM empleados");

    echo "<h4>Empleados</h4>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>CODEMP</th><th>Nombre</th><th>Apellido1</th><th>Departamento</th></tr>";

    foreach($consulta as $fila){
        echo "<tr>
            <td> {$fila['CodEmple']} </td>
            <td> {$fila['Nombre']} </td>
            <td> {$fila['Apellido1']} </td>
            <td> {$fila['Departamento']} </td>
        </tr>";
    }
    echo "</table>";

    $consulta = $bd->query("SELECT * FROM usuarios");

    echo "<h4>Usuarios</h4>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Codigo</th><th>Nombre</th><th>Clave</th><th>Rol</th></tr>";

    foreach($consulta as $fila){
        echo "<tr>
            <td> {$fila['Codigo']} </td>
            <td> {$fila['Nombre']} </td>
            <td> {$fila['Clave']} </td>
            <td> {$fila['Rol']} </td>
        </tr>";
    }
    echo "</table>";

    $consulta = $bd->query("SELECT * FROM departamentos");

    echo "<h4>Departamentos</h4>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>CodDept</th><th>Nombre</th><th>Jefe</th><th>Presupuesto</th><th>Ciudad</th></tr>";

    foreach($consulta as $fila){
        echo "<tr>
            <td> {$fila['CodDept']} </td>
            <td> {$fila['Nombre']} </td>
            <td> {$fila['Jefe']} </td>
            <td> {$fila['Presupuesto']} </td>
            <td> {$fila['Ciudad']} </td>
        </tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
}