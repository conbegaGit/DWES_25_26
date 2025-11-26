<?php
    $cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
    $usuario = 'root';
    $clave= '';

    try{
        $bd = new PDO ($cadena_conexion, $usuario, $clave);
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*
        Le dice a PHP que :
        1. Si ocurre un error en la base de datos.
        2. PDO NO debe devolver un false silencioso.
        3. Sino lanza una excepción (PDOException).
        Si no lo ponemos, un error como una consulta mal escrita i una tabla
        que no existe simplemente devuelve un false y no te dice por qué 
        ha fallado, lo que dificulta mucho depurar.
        */
        echo "<h3>✔ Conexión establecida correctamente</h3>";

        //Consulta a la table de Empleados
        $consulta = $bd->query("SELECT * FROM empleados");

        echo "<h4>Empleados</h4>";
        echo "<table border='1' cellpadding='5' style ='border-collapse:collapse; background-color:pink'>";
        echo "<tr style ='background-color:red'><th>CODEMP</th><th>Nombre</th><th>Apellido 1</th><th>Departamento</th></tr>";

        foreach ($consulta as $fila) {
            echo "<tr>
                    <td>{$fila['CodEmple']}</td>
                    <td>{$fila['Nombre']}</td>
                    <td>{$fila['Apellido1']}</td>
                    <td>{$fila['Departamento']}</td>
                </tr>";

        }

        echo "</table>";

        $consulta = $bd->query("SELECT * FROM departamentos");

        echo "<h4>Departamentos</h4>";
        echo "<table border='1' cellpadding='5' style ='border-collapse:collapse; background-color:#ADD8E6'>";
        echo "<tr style ='background-color:#00FFFF'><th>CODEPT</th><th>Nombre</th><th>Jefe</th><th>Presupuesto</th><th>Ciudad</th></tr>";

        foreach ($consulta as $fila) {
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

        echo "<h4>Usuarios</h4>";
        echo "<table border='1' cellpadding='5' style ='border-collapse:collapse; background-color:#bdecb6'>";
        echo "<tr style ='background-color:green'><th>Codigo</th><th>Nombre</th><th>Clave</th><th>Rol</th></tr>";

        foreach ($consulta as $fila) {
            echo "<tr>
                    <td>{$fila['Codigo']}</td>
                    <td>{$fila['Nombre']}</td>
                    <td>{$fila['Clave']}</td>
                    <td>{$fila['Rol']}</td>

                </tr>";

        }

        echo "</table>";

        echo "<br>";
        echo "Gracias por confiar en Francisco José Montesinos Silvero";
    }
    catch (PDOException $e){
        echo 'Error con la base de datos: '.$e->getMessage();
    }