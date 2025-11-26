<?php
$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try{
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*
    Le dice a php: 1.Si ocurre un error en la base de datos
    2. PDO No debe devolver un false silencioso, sino
    lanzar una excepción (PDOException).
    Si NO lo ponemos, un error como una consulta mal escrita o una tabla que no existe simplmente devuelve
    false y no te dice por qué ha fallado, lo que dificulta mucho depurar.
    */
    echo "<h3>Conexión establecida correctamente </h3>";
    $consulta = $bd -> query("SELECT * FROM empleados");

    echo "<h4>Empleados:</h4>";
    echo "<table border = '1' cellpadding = '5'>";
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
}catch(PDOException $e){
    echo 'Error con la base de datos: '. $e->getMessage();
}
?>

<?php
$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$empleado = 'root';
$clave = '';
try{
    $bd = new PDO($cadena_conexion, $empleado, $clave);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*
    Le dice a php: 1.Si ocurre un error en la base de datos
    2. PDO No debe devolver un false silencioso, sino
    lanzar una excepción (PDOException).
    Si NO lo ponemos, un error como una consulta mal escrita o una tabla que no existe simplmente devuelve
    false y no te dice por qué ha fallado, lo que dificulta mucho depurar.
    */
    echo "<h3>Conexión establecida correctamente </h3>";
    $consulta = $bd -> query("SELECT * FROM departamentos");

    echo "<h4>Departamentos:</h4>";
    echo "<table border = '1' cellpadding = '5'>";
    echo "<tr><th>CODDEPT</th><th>Nombre</th><th>Jefe</th><th>Presupuesto</th><th>Ciudad</th></tr>";

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
}catch(PDOException $e){
    echo 'Error con la base de datos: '. $e->getMessage();
}
?>

<?php
$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$departamento = 'root';
$clave = '';
try{
    $bd = new PDO($cadena_conexion, $departamento, $clave);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*
    Le dice a php: 1.Si ocurre un error en la base de datos
    2. PDO No debe devolver un false silencioso, sino
    lanzar una excepción (PDOException).
    Si NO lo ponemos, un error como una consulta mal escrita o una tabla que no existe simplmente devuelve
    false y no te dice por qué ha fallado, lo que dificulta mucho depurar.
    */
    echo "<h3>Conexión establecida correctamente </h3>";
    $consulta = $bd -> query("SELECT * FROM usuarios");

    echo "<h4>Usuarios:</h4>";
    echo "<table border = '1' cellpadding = '5'>";
    echo "<tr><th>CODIGO</th><th>Nombre</th><th>Clave</th><th>Rol</th></tr>";

    foreach ($consulta as $fila){
        echo "<tr>
                <td>{$fila['Codigo']}</td>
                <td>{$fila['Nombre']}</td>
                <td>{$fila['Clave']}</td>
                <td>{$fila['Rol']}</td>
            </tr>";
            
    }
    echo "</table>";
}catch(PDOException $e){
    echo 'Error con la base de datos: '. $e->getMessage();
}

