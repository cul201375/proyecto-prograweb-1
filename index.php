<?php

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content ="ie=edge">
        <title>Inicio de Sesion</title>
        <link rel="stylesheet" href="css/Login4.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class = "container">
            <div class = "wrapper">
                <div class = "titulo">
                    <span>SISTEMA VENTAS</span>
                </div>
                <form action="modules/login/loginController.php" method="POST">
                    <div>
                        <div class = "row">
                            <i class = "fas fa-user"></i>
                            <input  id="user" name="user" type="text" placeholder = "Usuario">
                        </div>
                        <div class = "row">
                            <i class="fas fa-key"></i>
                            <input  id="clave" name="clave" type="password" placeholder = "Contraseña">
                        </div>
                        <div class = "forgPass">
                            <a class ="forgPasslink" href="#">¿Olvidaste tu contraseña?</a>
                        </div>
                        <div class = "row">
                            <button class = "buttonsumintlogin" type="submit">ACEPTAR</button>
                        </div>
                        <div class = "singUp">
                            <p>¿Aun no tienes cuenta? <a class = "singUplink" href="#">Registrate aquí</a></p>
                        </div>
                    </div>
                </form>
            </div>    
        </div>
    </body>
</html>