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
  $insertarIngreo = (isset($_POST['insertarIngreso']) ? $_POST['insertarIngreso'] : '0'); 

  if ($verdetalles == 1) {

    $idingreso = (isset($_POST['idingreso'])) ? $_POST['idingreso'] : "0";
    $result = $IngresosClass -> retornarDetalleDeIngresos($idingreso);

    $datos = array();

    if($fila = mysqli_fetch_array($result)){
        $datos['idingreso'] = $fila['idingreso'];
        $datos['estado'] = ($fila['estado'] == 1) ? 'ACTIVO' : 'CADUCADO' ;
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

  if ($insertarIngreo == 1) {
    $idproveedor = (isset($_POST['idproveedor']) ? $_POST['idproveedor'] : "0");//1
    $idusuario = (isset($_POST['idusuario']) ? $_POST['idusuario'] : "0");//2
    $tipo_documento = (isset($_POST['tipo_documento']) ? $_POST['tipo_documento'] : "0");//3
    $serie_document = (isset($_POST['serie_document']) ? $_POST['serie_document'] : "0");//4
    $num_documento = (isset($_POST['num_documento']) ? $_POST['num_documento'] : "0");//5
    $costo = (isset($_POST['costo']) ? $_POST['costo'] : "0");//6
    $impuesto = (isset($_POST['impuesto']) ? $_POST['impuesto'] : "0");//7
    $total = (isset($_POST['total']) ? $_POST['total'] : "0");//8
    $cantidad = (isset($_POST['cantidad']) ? $_POST['cantidad'] : "0");//9
    $precio_venta = (isset($_POST['precio_venta']) ? $_POST['precio_venta'] : "0");//10
    $codigo = (isset($_POST['codigo']) ? $_POST['codigo'] : "0");//11
    $idcategoria = (isset($_POST['idcategoria']) ? $_POST['idcategoria'] : "0");//12
    $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : "0");//13
    $fecha = (isset($_POST['fecha']) ? $_POST['fecha'] : "0");//14
    $descripcion = (isset($_POST['descripcion']) ? $_POST['descripcion'] : "0");//15
    $nombreimagen = (isset($_POST['imagen']) ? $_POST['imagen'] : "0");//16
    $pathimagen = 'img/products/'.$nombreimagen;

    $resultado = $IngresosClass ->  realizaIngreso( $idproveedor, $idusuario, $tipo_documento, $serie_document, $num_documento, $costo, $impuesto, $total, $cantidad, $precio_venta, $codigo, $idcategoria, $nombre, $fecha, $descripcion, $pathimagen);
    $data['resultado'] = $resultado;
    echo json_encode($data);
  }


?>