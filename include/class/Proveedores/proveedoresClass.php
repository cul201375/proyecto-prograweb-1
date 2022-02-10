<?php
include_once(RAIZ_APLICACION . "/functions.php");

class Proveedores{

    function ObtenerProveedores(){
        $conexion = new Tool();
        $resultConexion = $conexion->conectar();

        $sql = "SELECT * FROM persona WHERE tipo_persona = 'proveedor';";

        mysqli_query($resultConexion, "SET NAMES 'utf8'");
        mysqli_set_charset($resultConexion, "utf8");

        $resultado = mysqli_query($resultConexion, $sql);
        return $resultado;
    }
    function EliminarProveedores($idpersona){
        $conexionClass = new Tool();
        $conexion = $conexionClass -> conectar();

        $sql = "DELETE FROM sistemaventas.persona WHERE idpersona = $idpersona";

        $resultado = mysqli_query($conexion, $sql);

        if($resultado){
            $conexionClass -> desconectar($conexion);
            return 1;
        }
        else{
            $conexionClass -> desconectar($conexion);
            return 0;
        }
    }

    function addProveedor($tipo_persona, $nombre, $nit, $dpi, $direccion, $telefono, $correo){
        $conexionClass = new Tool();
        $conexion = $conexionClass -> conectar();

        $sql = "INSERT into persona (tipo_persona, nombre, nit, dpi, direccion, telefono, correo) 
        values ('$tipo_persona','$nombre', '$nit', '$dpi', '$direccion','$telefono', '$correo');";

        $resultado = mysqli_query($conexion, $sql);
        if($resultado){
            $conexionClass -> desconectar($conexion);
            return 1;
        }
        else{
            $conexionClass -> desconectar($conexion);
            return 0;
        }
    }

    function editProveedores($idpersona){
        $conexionClass = new Tool();
        $conexion = $conexionClass -> conectar();

        $sql = "SELECT * from persona where idpersona ='$idpersona';";

        mysqli_query($conexion, "SET NAMES 'utf8'");
        mysqli_set_charset($conexion, "utf8");

        $resultado = mysqli_query($conexion, $sql);
        return $resultado;
        $conexionClass -> desconectar($conexion);
    }
    
    function modificarProveedor($idpersona, $nombre, $nit, $direccion, $telefono, $correo){
        $conexionClass = new Tool();
        $conexion = $conexionClass -> conectar();

        $sql = "UPDATE sistemaventas.persona SET 
                nombre = '$nombre', 
                nit = '$nit', 
                direccion = '$direccion', 
                telefono = '$telefono', 
                correo ='$correo' 
                where idpersona = $idpersona;";

            $resultado = mysqli_query($conexion, $sql);

            if($resultado){
                $conexionClass -> desconectar($conexion);
                return 1;
            }
            else{
                $conexionClass -> desconectar($conexion);
                return 0;
            }
    }


}
?>