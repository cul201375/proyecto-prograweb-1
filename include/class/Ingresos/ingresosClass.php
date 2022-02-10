<?php
include_once(RAIZ_APLICACION . "/functions.php");

class Ingresos
{
    function realizarIngreso()
    {
        $conexion = new Tool();
        $resultConexion = $conexion->conectar();
        return 0;
        $conexion -> desconectar($conexion);
    }

    function borrarIngreso()
    {
        $conexion = new Tool();
        $resultConexion = $conexion->conectar();
        return 0;
        $conexion -> desconectar($conexion);
    }

    function editarIngreso()
    {
        $conexion = new Tool();
        $resultConexion = $conexion->conectar();
        return 0;
        $conexion -> desconectar($conexion);
    }

    function retornarListaIngresos()
    {
        $conexion = new Tool();
        $resultConexion = $conexion->conectar();

        mysqli_query($resultConexion, "SET NAMES 'utf8'");
        mysqli_set_charset($resultConexion, "utf8");

        if(!$conexion){
            die("Conexion fallida por: ".mysqli_connect_error());
        }
        else{
            
        }
    
        $sql = "SELECT i.idingreso, i.fecha, i.tipo_comprobante, i.serie_comprobante, i.num_comprobante, i.costo, i.impuesto, i.total, a.nombre as nombre_articulo, p.nombre as nombre_proveedor
        from ingreso i JOIN detalle_ingreso d on d.idingreso = i.idingreso join articulo a on a.idarticulo = d.idarticulo join persona p on p.idpersona = i.idproveedor;";
    
        $resultado = mysqli_query($resultConexion, $sql);
        return $resultado;
        $conexion -> desconectar($conexion);
    }
    function retornarDetalleDeIngresos($idingreso)
    {
        $conexion = new Tool();
        $resultConexion = $conexion->conectar();

        mysqli_query($resultConexion, "SET NAMES 'utf8'");
        mysqli_set_charset($resultConexion, "utf8");

        if(!$conexion){
            die("Conexion fallida por: ".mysqli_connect_error());
        }
        $sql = "SELECT i.idingreso, i.estado, u.nombre as nombre_usuario, p.nombre as nombre_proveedor, a.nombre as nombre_articulo, a.precio_venta, a.idarticulo as id_de_articulo, a.imagen
        from ingreso i 
        JOIN usuarios u ON i.idusuario = u.idusuario 
        JOIN persona p ON i.idproveedor = p.idpersona
        JOIN detalle_ingreso d JOIN articulo a ON a.idarticulo = d.idarticulo
        where i.idingreso = '$idingreso' and d.idingreso = i.idingreso;";
    
        $resultado = mysqli_query($resultConexion, $sql);
        return $resultado;
        $conexion -> desconectar($conexion);
    }

    function getProveedores()
    {
        $conexion = new Tool();
        $resultConexion = $conexion->conectar();

        mysqli_query($resultConexion, "SET NAMES 'utf8'");
        mysqli_set_charset($resultConexion, "utf8");

        if(!$conexion){
            die("Conexion fallida por: ".mysqli_connect_error());
        }
    
        $sql = "SELECT idpersona, nombre FROM persona WHERE tipo_persona = 'proveedor';";
    
        $resultado = mysqli_query($resultConexion, $sql);
        return $resultado;
        $conexion -> desconectar($conexion);
    }

    function cargarImagen($new_path, $idarticulo)
    {
        $conexion = new Tool();
        $resultConexion = $conexion->conectar();
        $sql = "UPDATE articulo SET imagen = '$new_path' WHERE imagen = '$idarticulo';";
        $resultado = mysqli_query($resultConexion, $sql);
        
        if($resultado){
            
            return 1;
            $conexion -> desconectar($conexion);
        }
        else{
            return 0;
            $conexion -> desconectar($conexion);
        }
    }

    function getCategories(){
        $conexionClass = new Tool();
        $conexion = $conexionClass->conectar();

        $sql = "SELECT * from categoria;";

        return $resultado = mysqli_query($conexion, $sql);
        $conexionClass -> desconectar($conexion);
    
    }

    function realizaIngreso( $idproveedor, $idusuario, $tipo_documento, $serie_document, $num_documento, $costo, $impuesto, $total, $cantidad, $precio_venta, $codigo, $idcategoria, $nombre, $fecha, $descripcion, $pathimagen){
        $conexionClass = new Tool();
        $conexionart = $conexionClass->conectar();

        $artsql = "INSERT INTO articulo (idcategoria, codigo, nombre, precio_venta, stock, descripcion, imagen, estado)
         values ($idcategoria,'$codigo', '$nombre', $precio_venta, $cantidad, '$descripcion', '$pathimagen', 1)";
        $resultado = mysqli_query($conexionart, $artsql);
        
        $lastidart = mysqli_insert_id($conexionart);

        if($resultado == 1 && $lastidart != ""){
            $subconexion = $conexionClass->conectar();

            $sql = "INSERT INTO ingreso ( idproveedor, idusuario, tipo_comprobante, serie_comprobante, num_comprobante, fecha, costo, impuesto, total, estado) 
            VALUES ($idproveedor , $idusuario, '$tipo_documento', '$serie_document', '$num_documento', '$fecha', $costo, $impuesto, $total, 1)";

            $param = mysqli_query($subconexion,$sql);

            if($param == 1){
                $lastiding = mysqli_insert_id($subconexion);
                $newslq = "INSERT INTO detalle_ingreso (idingreso, idarticulo, cantidad, precio) VALUES ($lastiding, $lastidart, $cantidad, $precio_venta);";
                $param2 = mysqli_query($subconexion, $newslq);
                if($param2 == 1){
                    return 1;
                }
            }else{
                return 0;
            }
        }
        
    }
}
