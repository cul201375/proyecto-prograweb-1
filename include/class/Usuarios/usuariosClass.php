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

        function createUser($nombre, $edad, $direccion, $usuario, $clave, $dpi, $correo, $telefono, $role_id, $form_data){
            $conexionClass = new Tool();
            $conexion = $conexionClass -> conectar();
            $conexionftp = $conexionClass ->conectarftp();

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

            $local = $_FILES["file"]["name"];
            $remoto = $_FILES["archivo"]["tmp_name"];
            $tama = $_FILES["archivo"]["size"];
            $ruta = "/img/usersprofiles/" . $local;
            if($conexionftp!=0){
                if (ftp_put($conexionftp, $local, $remoto)) {
                    if (is_uploaded_file($remoto)){
                        // copiamos el archivo temporal, del directorio de temporales de nuestro servidor a la ruta que creamos
                        copy($remoto, $ruta);		
                    }
                    // Sino se pudo subir el temporal
                    else {
                        echo "no se pudo subir el archivo " . $local;
                    }
                    echo "successfully uploaded $local\n";
                    exit;
                } else {
                    echo "There was a problem while uploading $local\n";
                    exit;
                    }
                // close the connection
                ftp_close($conexionftp);
            }
            else{
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
        function upimgprofile($file_temp, $file, $remote_file){
            $conexion = new Tool();
            $conexionftp = $conexion -> conectarftp();

            if($conexionftp!=0){
                if (ftp_put($conexionftp, $remote_file, $file, FTP_ASCII)) {
                    echo "successfully uploaded $file\n";
                    exit;
                } else {
                    echo "There was a problem while uploading $file\n";
                    exit;
                    }
                // close the connection
                ftp_close($conexionftp);
            }
            else{
                return 0;
            }
        }
    }
?>