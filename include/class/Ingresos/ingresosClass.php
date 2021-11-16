<?php
include_once(RAIZ_APLICACION . "/functions.php");

class Ingresos
{
    function realizarIngreso()
    {
        $conexion = new Tool();
        $resultConexion = $conexion->conectar();
        return 0;
    }

    function borrarIngreso()
    {
        $conexion = new Tool();
        $resultConexion = $conexion->conectar();
        return 0;
    }

    function editarIngreso()
    {
        $conexion = new Tool();
        $resultConexion = $conexion->conectar();
        return 0;
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
        else{
            
        }
    
        $sql = "SELECT i.idingreso, i.estado, u.nombre as nombre_usuario, p.nombre as nombre_proveedor, a.nombre as nombre_articulo, a.precio_venta, a.idarticulo as id_de_articulo, a.imagen
        from ingreso i 
        JOIN usuarios u ON i.idusuario = u.idusuario 
        JOIN persona p ON i.idproveedor = p.idpersona
        JOIN detalle_ingreso d JOIN articulo a ON a.idarticulo = d.idarticulo
        where i.idingreso = '$idingreso' and d.idingreso = i.idingreso;";
    
        $resultado = mysqli_query($resultConexion, $sql);
        return $resultado;
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
        else{
            
        }
    
        $sql = "SELECT idpersona, nombre FROM persona WHERE tipo_persona = 'proveedor';";
    
        $resultado = mysqli_query($resultConexion, $sql);
        return $resultado;
    }

    function cargarImagen()
    {
        return 0;
    }
}
