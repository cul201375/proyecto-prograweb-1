<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']){
  header("location: ../../index.php");
}
include_once('../../include/functions.php');
  ob_end_flush();

  $VentasClass = new ventasClass();
  $data = array();

  $realizar_venta = (isset($_POST['realizar_venta']) ? $_POST['realizar_venta'] : '0'); 

  if ($realizar_venta == 1) {
      $idarticulo = (isset($_POST['idarticulo'])) ? $_POST['idarticulo'] : "";
      $codigo = (isset($_POST['codigo'])) ? $_POST['codigo'] : "" ;
      $cantidad = (isset($_POST['cantidad'])) ? $_POST['cantidad'] : "";
      $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "" ;
      $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : "";
      $dpi = (isset($_POST['dpi'])) ? $_POST['dpi'] : "" ;
      $nit = (isset($_POST['nit'])) ? $_POST['nit'] : "" ;
      $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "";
      $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "";
      $tipo_documento = (isset($_POST['tipo_documento'])) ? $_POST['tipo_documento'] : "";
      $serie_documento = (isset($_POST['serie_documento'])) ? $_POST['serie_documento'] : "";
      $num_documento = (isset($_POST['num_documento'])) ? $_POST['num_documento'] : "";
      $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : "";
      $impuesto = (isset($_POST['impuesto'])) ? $_POST['impuesto'] : "";
      $total = (isset($_POST['total'])) ? $_POST['total'] : "";
      $idusuario = (isset($_POST['idusuario'])) ? $_POST['idusuario'] : "";

      echo $idarticulo.$cantidad.$nombre.$direccion.$dpi.$nit.$correo.$telefono.$tipo_documento.$serie_documento.$num_documento.$fecha.$impuesto.$total.$idusuario;
      $resultado = $ventasClass -> registrarVenta($idarticulo, $cantidad, $nombre, $direccion, $dpi, $nit, $correo, $telefono, $tipo_documento, $serie_documento, $num_documento, $fecha, $impuesto, $total, $idusuario);

      $data['resultado'] = $resultado;

      echo json_encode($data);
  }
  
?>