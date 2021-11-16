<?php
ob_start();
session_start();

include_once('../../include/functions.php');
$usuario = (isset($_POST['user'])) ? $_POST['user'] : "0";
$clave = (isset($_POST['clave'])) ? $_POST['clave'] : "0";

$loginClass = new loginClass();

$resultado = $loginClass -> valida_login($usuario, $clave);

if($fila = mysqli_fetch_array($resultado)){
    $_SESSION['idusuario']= $fila["idusuario"];
    $_SESSION['idrol']= $fila["idrol"];
    $_SESSION['nombre']= $fila["nombre"];
    $_SESSION['user']= $fila["usuario"];
    $_SESSION['email_usuario']= $fila["correo"];
    $_SESSION['perfilusuario'] = $fila['imgprofile'];

    $result = 1;

    $newdata['resultado'] = $result;

    echo json_encode($newdata);
   //header("location: ../../main.php");
}
else{
    $result = 0;

    $newdata['resultado'] = $result;

    echo json_encode($newdata);
    //echo "<script>alert('CREDENCIALES INVALIDAS'); history.back();</script>";
    //exit(-1);
}

ob_end_flush();
?>
