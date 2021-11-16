<?php

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="css/Login6.css">
    <link rel="shortcut icon" href="img/brand/brand.png" />
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="titulo">
                <img src="img/brand/brand.png" heigth="100" width="120">
                <span>SISTEMA VENTAS</span>
            </div>
            <div class="formulario">
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input id="user" type="text" placeholder="Usuario">
                </div>
                <div class="row">
                    <i class="fas fa-key"></i>
                    <input id="clave" type="password" placeholder="Contraseña">
                </div>
                <div class="forgPass">
                    <a class="forgPasslink" href="#">¿Olvidaste tu contraseña?</a>
                </div>
                <div class="row">
                    <button id="btnLogin" class="buttonsumintlogin" type="submit">ACEPTAR</button>
                </div>
                <div class="singUp">
                    <span>¿Aun no tienes cuenta? <a class="singUplink" href="#">Registrate aquí</a></span>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="js/moduloLogin.js"></script>

</html>