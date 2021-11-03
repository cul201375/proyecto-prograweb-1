<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']){
    header("location: ../../index.php");
}

include_once('../../include/functions.php');

    $usuariosClass = new usuariosClass();
    $resultado = 0;
    $respuesta = array();

    $crearUsuario = (isset($_POST['crear_usuario'])) ? $_POST['crear_usuario'] : "0";
    $eliminarUsuario = (isset($_POST['eliminar_usuario'])) ? $_POST['eliminar_usuario'] : "0";
    $editar_usuario = (isset($_POST['editar_usuario'])) ? $_POST['editar_usuario'] : "0";
    $confirmar_edit_usuario = (isset($_POST['confirmar_edit_usuario'])) ? $_POST['confirmar_edit_usuario'] : "0";

    if($crearUsuario == 1){
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
        $edad = (isset($_POST['edad'])) ? $_POST['edad'] : "0";
        $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : "0";
        $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "0";
        $clave = (isset($_POST['clave'])) ? $_POST['clave'] : "0";
        $dpi = (isset($_POST['dpi'])) ? $_POST['dpi'] : "0";
        $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "0";
        $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "0";
        $role_id = (isset($_POST['role_id'])) ? $_POST['role_id'] : "0";
    
        $resultado = $usuariosClass -> createUser($nombre, $edad, $direccion, $usuario, $clave, $dpi, $correo, $telefono, $role_id);
        $respuesta['resultado'] = $resultado;
        echo json_encode($respuesta);
    }

    if ($eliminarUsuario == 1){
        $user_id = (isset($_POST['idusuario'])) ? $_POST['idusuario'] : "0";
        $resultado = $usuariosClass -> deleteUser($user_id);
        $respuesta['resultado'] = $resultado;
        echo json_encode($respuesta);
    }
    
    if($editar_usuario == 1){

        $user_id = (isset($_POST['idusuario'])) ? $_POST['idusuario'] : "0";

        $result = $usuariosClass -> cargarUsuario($user_id);

        $data = array();

        if($fila = mysqli_fetch_array($result)){
            $data['idusuario'] = $fila['idusuario'];
            $data['nombre'] = $fila['nombre'];
            $data['edad'] = $fila['edad'];
            $data['direccion'] = $fila['direccion'];
            $data['usuario'] = $fila['usuario'];
            $data['clave'] = $fila['clave'];
            $data['dpi'] = $fila['dpi'];
            $data['correo'] = $fila['correo'];
            $data['telefono'] = $fila['telefono'];
            $data['id_rol'] = $fila['id_rol'];
            $data['nombre_rol'] = $fila['nombre_rol'];
            $data['estado']= $fila['estado'];
            $data['imgprofile']= $fila['imgprofile'];
            echo json_encode($data);
        }
        else{
            $data['result'] = 'error';
        }
    }

    if($confirmar_edit_usuario == 1){
        $user_id = (isset($_POST['idusuario'])) ? $_POST['idusuario'] : "0";
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
        $edad = (isset($_POST['edad'])) ? $_POST['edad'] : "0";
        $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : "0";
        $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "0";
        $clave = (isset($_POST['clave'])) ? $_POST['clave'] : "0";
        $dpi = (isset($_POST['dpi'])) ? $_POST['dpi'] : "0";
        $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "0";
        $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "0";
        $role_id = (isset($_POST['role_id'])) ? $_POST['role_id'] : "0";
        $estado = (isset($_POST['estado'])) ? $_POST['estado'] : "0";
    
    
    
        $result = $usuariosClass -> modificarUsuario($user_id, $nombre, $edad, $direccion, $correo, $telefono, $role_id, $estado);
        
        $newdata['resultado'] = $result;

        echo json_encode($newdata);
    }

ob_end_flush();
?>