<?php
session_start();
require_once "../includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";

require_login();
$Nombre=$Clave='';
$Rol=0;

if (is_post()){
    $Nombre = trim($_POST['Nombre']);
    $Clave = trim($_POST['Clave']);
$hash= password_hash($Clave,PASSWORD_DEFAULT );
    $Rol = intval($_POST['Rol']);
    
   $stmt = $db-> prepare("INSERT INTO usuarios(Nombre, Clave, Rol) VALUES (?, ?, ?)");
    $stmt-> execute([$Nombre, $hash, $Rol ]);
 flash_set("Usuario creado");
    redirect(" listar.php");
    exit;
}

require_once "../includes/header.php";
?>
<h2>Crear Usuario</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($Nombre) ?>"required></label>
    <label>Clave<br><input type="text" name="Clave" value="<?= e($Clave) ?>"required></label>
    <label>Rol <br>
    <select name="Departamento" required>
        <option value="0">usurio</option>
        <option value="1">administracion</option>
        
    </select>
</label>


    <div class="actions"><button type="submit">Crear</button><a class="btn" href="listar.php">Cancelar</a></div>
</form>
<?php require_once "../includes/footer.php";