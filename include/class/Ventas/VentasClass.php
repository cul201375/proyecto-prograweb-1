<?php
include_once(RAIZ_APLICACION . "/functions.php");

class ventasClass {
 function registrarVenta($idarticulo, $cantidad, $nombre, $direccion, $dpi, $nit, $correo, $telefono, $tipo_documento, $serie_documento, $num_documento, $fecha, $impuesto, $total, $idusuario){
     $conexionClass = new Tool();
     $conexion = $conexionClass -> conectar();
     mysqli_query($conexion, "SET NAMES 'utf8'");
     mysqli_set_charset($conexion, "utf8");

     $clientesClass  = new Clientes();
     $restulClient = $clientesClass -> registrarCliente($nombre, $direccion, $dpi, $nit, $correo, $telefono);

     if($restulClient != null && $restulClient != 0){
         $sql = "INSERT INTO venta (idcliente, idusuario, tipo_comprobante, serie_comprobante, num_comprobante, fecha, impuesto, total, estado)
         VALUES ($restulClient, $idusuario, '$tipo_documento', '$serie_documento', '$num_documento', '$fecha', '$impuesto', '$total', 1);";

         $resultVenta = mysqli_query($conexion, $sql);
         if($resultVenta == 1){
            $lastid = mysqli_insert_id($conexion);
             $sql2 = "INSERT INTO detalle_venta (idventa, idarticulo, cantidad, precio, descuento) values ($lastid, $idarticulo, $cantidad, $total, $impuesto);";
             $finalresult = mysqli_query($conexion, $sql2);
             if ($finalresult == 1) {
                 return 1;
             } else {
                 return 0;
             }
         }
     }
     else{
         return 0;
     }
 }
 function historialVentas(){

 }
}
?>