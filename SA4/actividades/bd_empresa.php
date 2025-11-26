<?php
$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1;charset=utf8';
$usuario = 'root';
$clave= '';
try{
    $bd = new PDO($cadena_conexion, $usuario,$clave);
    $bd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h3> Conexión establecida correctamente</h3>";
  //acceso a empleados
    $consulta = $bd -> query("SELECT * FROM empleados");

    echo "<h4> Empleados </h4>";
    echo "<table border= '1' cellpadding ='5'>";
    echo "<tr><th> CODEMP</th><th>Nombre</th><th>Apellido1</th><th>Departamento</th></tr>";


    foreach ($consulta as $fila){
        echo "<tr>
                <td> {$fila['CodEmple']}</td>
                <td> {$fila['Nombre']}</td>
                <td> {$fila['Apellido1']}</td>
                <td> {$fila['Departamento']}</td>
              </tr>";
    }
    echo "</table>";
    //acceso departamentos
     $consulta = $bd -> query("SELECT * FROM departamentos");

    echo "<h4> departamentos </h4>";
    echo "<table border= '1' cellpadding ='5'>";
    echo "<tr><th> CODDEPT</th><th>Nombre</th><th>Jefe</th><th>Presupuesto</th><th>Ciudad</th></tr>";


    foreach ($consulta as $fila){
        echo "<tr>
                <td> {$fila['CodDept']}</td>
                <td> {$fila['Nombre']}</td>
                <td> {$fila['Jefe']}</td>
                <td> {$fila['Presupuesto']}</td>
                <td> {$fila['Ciudad']}</td>
              </tr>";
    }
    echo "</table>";
     //acceso usuarios
     $consulta = $bd -> query("SELECT * FROM usuarios");

    echo "<h4> usuarios </h4>";
    echo "<table border= '1' cellpadding ='5'>";
    echo "<tr><th> Codigo</th><th>Nombre</th><th>Clave</th><th>Rol</th></tr>";


    foreach ($consulta as $fila){
        echo "<tr>
                <td> {$fila['Codigo']}</td>
                <td> {$fila['Nombre']}</td>
                <td> {$fila['Clave']}</td>
                <td> {$fila['Rol']}</td>
                
              </tr>";
    }
    echo "</table>";
}catch (PDOException $e){
    echo 'ha habido un error'. $e -> getMessage();
}