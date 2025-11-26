<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'root';
$contraseña = '';

try {
    $bd = new PDO($cadena_conexion, $usuario, $contraseña);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<h3>Bienvenid@ a la base de datos del pirata, " . htmlspecialchars($_SESSION['usuario']) . "</h3>";
    echo '<p><a href="logout.php">Cerrar Sesión</a></p>'; // Enlace de Logout

    // --- Tabla Empleados ---
    $consulta = $bd->query("SELECT * FROM empleados");

    echo "<h4 style='color: #0077ffff;'>Empleados</h4>";
    echo "<table border='1' cellpadding='5' style='background-color: #5cffceff; color: black;' >";
    echo "<tr><th>CODEMP</th><th>Nombre</th><th>Apellido 1</th><th>Departamento</th></tr>";

    foreach ($consulta as $fila) {
        echo "<tr style='background-color: #53a3ffff; color: black; font-color:'> 
                <td>{$fila['CodEmple']}</td>
                <td>{$fila['Nombre']}</td>
                <td>{$fila['Apellido1']}</td>
                <td>{$fila['Departamento']}</td>
              </tr>";
    }
    echo "</table>"; 
    
    // --- Tabla Departamentos ---
    $consulta = $bd->query("SELECT * FROM departamentos");

    echo "<h4 style='color: #ff5100ff;'>Departamentos</h4>";
    echo "<table border='1' cellpadding='5' style='background-color: #ff593cff; color: white;' >";
    echo "<tr><th>CodDept</th><th>Nombre</th><th>Jefe</th><th>Presupuesto</th><th>Ciudad</th></tr>";

    foreach ($consulta as $fila) {
        echo "<tr style='background-color: #fd8c69ff; color: white;' >
                <td>{$fila['CodDept']}</td>
                <td>{$fila['Nombre']}</td>
                <td>{$fila['Jefe']}</td>
                <td>{$fila['Presupuesto']}</td>
                <td>{$fila['Ciudad']}</td>
              </tr>";
    }
    echo "</table>"; 
    
    // --- Tabla Usuarios ---
    $consulta = $bd->query("SELECT * FROM usuarios");

    echo "<h4>Usuarios</h4>";
    echo "<table border='1' cellpadding='5' style='background-color: #070707ff; color: white;' >";
    echo "<tr><th>Codigo</th><th>Nombre</th><th>Clave</th><th>Rol</th></tr>";

    foreach ($consulta as $fila) {
        echo "<tr style='background-color: #666666ff; color: white;' >
                <td>{$fila['Codigo']}</td>
                <td>{$fila['Nombre']}</td>
                <td>{$fila['Clave']}</td> 
                <td>{$fila['Rol']}</td>
              </tr>";
    }
    echo "</table>"; 

} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
}