<?php
$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'root';
$clave= '';
try{
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*
    Se le dice a PHP que: 
    1.Si ocurre un error en la base de datos
    2. PDO NO debe devolver un false silencioso
    3. Sino lanza una excepcion
    Si no lo ponemos, un error cmo una consulta mal escrita y una tabla que no existe simplemente devuelve y no
    te dice pq ha fallado, lo que dificulta  mucho depurar
    */
    echo"<h3> Conexión establecida correctamente";

    //consulta de la tabla de empleados
    $consulta = $bd->query("SELECT * FROM empleados");

    echo "<h4>Empleados</h4>";
    echo "<table border= '1' cellpadding= '5'>";
    echo "<tr><th>CODEMP</th><th>Nombre</th><th>Apellido 1</th><th>Departamento</th></tr>";

    foreach ($consulta as $fila){
        echo "<tr>
            <td>{$fila['CodEmple']}</td>
            <td>{$fila['Nombre']}</td>
            <td>{$fila['Apellido1']}</td>
            <td>{$fila['Departamento']}</td>
            </tr>";
    }
    echo "</table>";

    //consulta de la tabla de departamentos
    $consulta = $bd->query("SELECT * FROM departamentos");

    echo "<h4>Departamentos</h4>";
    echo "<table border= '1' cellpadding= '5'>";
    echo "<tr><th>CodDept</th><th>Nombre</th><th>Jefe</th><th>Presupuesto</th><th>Ciudad</th></tr>";

    foreach ($consulta as $fila){
        echo "<tr>
            <td>{$fila['CodDept']}</td>
            <td>{$fila['Nombre']}</td>
            <td>{$fila['Jefe']}</td>
            <td>{$fila['Presupuesto']}</td>
            <td>{$fila['Ciudad']}</td>
            </tr>";
    }

    echo "</table>";

    //consulta de la tabla de usuarios
    $consulta = $bd->query("SELECT * FROM usuarios");

    echo "<h4>usuarios</h4>";
    echo "<table border= '1' cellpadding= '5'>";
    echo "<tr><th>Codigo</th><th>Nombre</th><th>Clave</th><th>Rol</th></tr>";

    foreach ($consulta as $fila){
        echo "<tr>
            <td>{$fila['Codigo']}</td>
            <td>{$fila['Nombre']}</td>
            <td>{$fila['Clave']}</td>
            <td>{$fila['Rol']}</td>
            </tr>";
    }
}catch (PDOException $e){
    echo 'Eerror con la base de datos: '. $e->getMessage();
}