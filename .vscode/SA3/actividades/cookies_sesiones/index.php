<!DOCTYPE html>
    <html lang = "es">
        <head>
            <meta charset = "UTF-8">
            <title>Accede a tu portal personal</title>
            
        </head>
        <body>
            <h1>Accede a tu portal personal</h1>
            <form method="post" action="login.php">
                <h4>Usuario:</h4>
                <input type="text" name="user" required>
                <br><br>
                <h4>Contraseña:</h4>
                <input type="password" name="contraseña" required>
                <br><br>
                
               <label>Recordar mi nombre:</label> 
               <input type="checkbox" name="recordar">
                <br><br>
                <input type="submit" name="entrar">
            </form>


        </body>
    </html>