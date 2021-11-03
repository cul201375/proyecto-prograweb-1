<?php
    include_once(RAIZ_APLICACION."/functions.php");
    class ProductosClass{
        function listadoProductos(){
            $conexionClass = new Tool();
            $conexion = $conexionClass->conectar();
            
            mysqli_query($conexion, "SET NAMES 'utf8'");
            mysqli_set_charset($conexion, "utf8");

            if(!$conexion){
                die("Conexion fallida por: ".mysqli_connect_error());
            }
            else{
                
            }
        
            $sql = "SELECT a.idarticulo, a.idcategoria, a.codigo, a.nombre, a.precio_venta, a.stock, a.descripcion, a.imagen, a.estado, b.nombre AS nombrecategoria, b.idcategoria FROM articulo a, categoria b WHERE a.idcategoria = b.idcategoria;";
        
            return $resultado = mysqli_query($conexion, $sql);
        }

        function getCategories(){
            $conexionClass = new Tool();
            $conexion = $conexionClass->conectar();
        }
    }
?>