<?php
ob_start();
session_start();
if (!$_SESSION['user_id']){
    header("location: ../../index.php");
}

include_once('../../include/functions.php');

    $usuariosClass = new usuariosClass();
    $resultado = 0;
    $respuesta = array();

    $crearUsuario = (isset($_POST['crear_usuario'])) ? $_POST['crear_usuario'] : "0";
    $eliminarUsuario = (isset($_POST['eliminar_usuario'])) ? $_POST['eliminar_usuario'] : "0";
    $editar_usuario = (isset($_POST['editar_usuario'])) ? $_POST['editar_usuario'] : "0";
    $confirmar_edit_usuario = (isset($_POST['confirmar_modificacion'])) ? $_POST['confirmar_modificacion'] : "0";
    
    if($crearUsuario == 1){
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
        $apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : "0";
        $edad = (isset($_POST['edad'])) ? $_POST['edad'] : "0";
        $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "0";
        $clave = (isset($_POST['clave'])) ? $_POST['clave'] : "0";
        $dpi = (isset($_POST['dpi'])) ? $_POST['dpi'] : "0";
        $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "0";
        $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "0";
        $role_id = (isset($_POST['role_id'])) ? $_POST['role_id'] : "0";
    
    
        $resultado = $usuariosClass -> createUser($nombre, $apellido, $edad, $usuario, $clave, $dpi, $correo, $telefono, $role_id);
        $respuesta['resultado'] = $resultado;
        echo json_encode($respuesta);
    }

    if ($eliminarUsuario == 1){
        $user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : "0";
        $resultado = $usuariosClass -> deleteUser($user_id);
        $respuesta['resultado'] = $resultado;
        echo json_encode($respuesta);
    }
    
    if($editar_usuario == 1){
        $user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : "0";
        $result = $usuariosClass -> cargarUsuario($user_id);

        $data[] = array(

            "id" =>$result[0]['id'],
            "nombre" =>$result[0]['nombre'],
            "apellido" =>$result[0]['apellido'],
            "edad" =>$result[0]['edad'],
            "usuario" =>$result[0]['usuario'],
            "clave" =>$result[0]['clave'],
            "dpi" =>$result[0]['dpi'],
            "correo" =>$result[0]['correo'],
            "telefono" =>$result[0]['telefono'],
            "id_rol" =>$result[0]['id_rol'],
            "nombre_rol" =>$result[0]['nombre_rol'],
            "estado"=>$result[0]['estado']
        );
        echo json_encode($data);
    }

    if($confirmar_edit_usuario == 1){
        $id = (isset($_POST['id'])) ? $_POST['id'] : "0";
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
        $apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : "0";
        $edad = (isset($_POST['edad'])) ? $_POST['edad'] : "0";
        $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "0";
        $clave = (isset($_POST['clave'])) ? $_POST['clave'] : "0";
        $dpi = (isset($_POST['dpi'])) ? $_POST['dpi'] : "0";
        $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "0";
        $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "0";
        $role_id = (isset($_POST['role_id'])) ? $_POST['role_id'] : "0";
        $estado = (isset($_POST['estado'])) ? $_POST['estado'] : "0";
    
    
    
        $resultado = $usuariosClass -> modificarUsuario($id, $nombre, $apellido, $edad, $usuario, $clave, $dpi, $correo, $telefono, $estado , $role_id);
        $respuestaconfirmarcambios['resultado'] = $resultado;
        echo json_encode($respuestaconfirmarcambios);
    }


ob_end_flush();
?>