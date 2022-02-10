<?php
include_once(RAIZ_APLICACION . "/functions.php");

class Clientes
{
 function registrarCliente($nombre, $direccion, $dpi, $nit, $correo, $telefono){
     $conexionClass = new Tool();
     $conexion = $conexionClass -> conectar();
     mysqli_query($conexion, "SET NAMES 'utf8'");
     mysqli_set_charset($conexion, "utf8");

     $slq = "INSERT INTO persona (tipo_persona, nombre, nit, dpi, direccion, telefono, correo) VALUES ('cliente', '$nombre', '$nit', '$dpi', '$direccion', '$telefono', '$correo');";

     $ifsqlexito = mysqli_query($conexion, $slq);

     if ($ifsqlexito == 1) {
        $lastid = mysqli_insert_id($conexion);
        return $lastid;
     } else {
         return 0;
     }
 }
 function historialVentas(){

 }
}
?>