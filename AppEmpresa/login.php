<?php
    session_start();
    require_once "includes/db.php";
    require_once "includes/functions.php";


    $error = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $nombre = trim($_POST["nombre"]);
        $clave = trim($_POST["clave"]);

        if (!empty($nombre) && !empty($clave))
        {
            $stmt = $bd->prepare("SELECT * FROM usuarios WHERE Nombre = ?");
            $stmt->execute([$nombre]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($clave, $user["Clave"]))
            {
                session_regenerate_id(true);
                $_SESSION["user"] = $user;

                header("Location: dashboard.php");
                flash_set("Bienvenido, " . $_SESSION["user"]["Nombre"] . "!");
                exit;
            }
            else
            {
                $error = "Usuario o clave incorrectos.";
                header("Location: index.php");
            }
        }
        else
        {
            $error = "Usuario o clave incorrectos.";
            header("Location: index.php");
        }
    }
   