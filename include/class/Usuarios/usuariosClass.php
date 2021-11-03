<?php
    include_once(RAIZ_APLICACION."/functions.php");

    class usuariosClass{
        function listadoUsuarios(){
            $conexionClass = new Tool();
            $conexion = $conexionClass->conectar();
            
            mysqli_query($conexion, "SET NAMES 'utf8'");
            mysqli_set_charset($conexion, "utf8");

            if(!$conexion){
                die("Conexion fallida por: ".mysqli_connect_error());
            }
            else{
                
            }
        
            $sql = "SELECT a.imgprofile, a.idusuario, a.nombre, a.edad, a.dpi, a.direccion, a.telefono, a.correo,  a.usuario, a.clave, a.estado, b.nombre as nombre_rol from usuarios a, rol b WHERE a.idrol = b.idrol;";
        
            return $resultado = mysqli_query($conexion, $sql);
        }

        function getRoles(){
            $conexionClass = new Tool();
            $conexion = $conexionClass -> conectar();

            $sql = "SELECT idrol, nombre, estado FROM rol";

            $resultado = mysqli_query($conexion, $sql);
            $conexionClass -> desconectar($conexion);
            return $resultado;

        }

        function createUser($nombre, $edad, $direccion, $usuario, $clave, $dpi, $correo, $telefono, $role_id){
            $conexionClass = new Tool();
            $conexion = $conexionClass -> conectar();

            $sql = "insert into usuarios (idrol, nombre, edad, direccion, usuario, clave, dpi, correo, telefono, estado) 
            values ($role_id,'$nombre', $edad, '$direccion', '$usuario','$clave', '$dpi', 
            '$correo', '$telefono', 1);";

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

        
        function deleteUser($user_id){
            $conexionClass = new Tool();
            $conexion = $conexionClass -> conectar();

            $sql = "DELETE FROM sistemaventas.usuarios WHERE idusuario = $user_id";

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

        function cargarUsuario($user_id){

            $conexionClass = new Tool();
            $conexion = $conexionClass -> conectar();

            $sql = "SELECT a.imgprofile, a.idusuario, a.nombre, a.edad, a.direccion, a.usuario, a.clave, a.dpi, a.correo, a.telefono, b.idrol as id_rol, b.nombre as nombre_rol, a.estado from usuarios a, rol b WHERE a.idrol = b.idrol AND a.idusuario = '$user_id';";
            
            $resultado = mysqli_query($conexion, $sql);
            $conexionClass -> desconectar($conexion);

            return $resultado;
        }

        function modificarUsuario($user_id, $nombre, $edad, $direccion, $correo, $telefono, $role_id, $estado){
            $conexionClass = new Tool();
            $conexion = $conexionClass -> conectar();

            $sql = "UPDATE sistemaventas.usuarios SET 
                nombre = '$nombre', 
                edad = $edad, 
                direccion = '$direccion',
                correo = '$correo', 
                telefono = '$telefono', 
                estado = $estado, 
                idrol = $role_id 
                where idusuario = $user_id;";

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