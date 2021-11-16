<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']){
  header("location: ../../index.php");
}
include_once('../../include/functions.php');
  ob_end_flush();

  $IngresosClass = new Ingresos();

  $verdetalles = (isset($_POST['verdetalles']) ? $_POST['verdetalles'] : '0'); 

  if ($verdetalles == 1) {

    $idingreso = (isset($_POST['idingreso'])) ? $_POST['idingreso'] : "0";
    $result = $IngresosClass -> retornarDetalleDeIngresos($idingreso);

    $datos = array();

    if($fila = mysqli_fetch_array($result)){
        $datos['idingreso'] = $fila['idingreso'];
        $datos['estado'] = $fila['estado'];
        $datos['nombre_usuario'] = $fila['nombre_usuario'];
        $datos['nombre_proveedor'] = $fila['nombre_proveedor'];
        $datos['nombre_articulo'] = $fila['nombre_articulo'];
        $datos['precio_venta'] = $fila['precio_venta'];
        $datos['id_de_articulo'] = $fila['id_de_articulo'];
        $datos['imagen'] = $fila['imagen'];
        echo json_encode($datos);
    }
    else{
        $datos['result'] = 'error';
    }

  }
  
?>