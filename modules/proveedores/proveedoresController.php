<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']){
    header("location: ../../index.php");
}

include_once('../../include/functions.php');

    $proveedores = new Proveedores();
    $resultado = 0;
    $respuesta = array();

    $add_proveedor = (isset($_POST['add_proveedor'])) ? $_POST['add_proveedor'] : "0";
    $eliminarProveedor = (isset($_POST['eliminar_usuario'])) ? $_POST['eliminar_usuario'] : "0";
    $edit_proveedor  = (isset($_POST['edit_proveedor'])) ? $_POST['edit_proveedor'] : "0";
    $confirm_edit_proveedor = (isset($_POST['confirm_edit_proveedor'])) ? $_POST['confirm_edit_proveedor'] : "0";

    if ($eliminarProveedor == 1){
        $person_id = (isset($_POST['idpersona'])) ? $_POST['idpersona'] : "0";
        $resultado = $proveedores -> EliminarProveedores($person_id);
        $respuesta['resultado'] = $resultado;
        echo json_encode($respuesta);
    }

    if($add_proveedor == 1){
        $tipo_persona = (isset($_POST['tipo_persona'])) ? $_POST['tipo_persona'] : "0";
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
        $nit = (isset($_POST['nit'])) ? $_POST['nit'] : "0";
        $dpi = (isset($_POST['dpi'])) ? $_POST['dpi'] : "0";
        $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : "0";
        $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "0";
        $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "0";
    
        $resultado = $proveedores -> addProveedor($tipo_persona, $nombre, $nit, $dpi, $direccion, $telefono, $correo);
        $respuesta['resultado'] = $resultado;
        echo json_encode($respuesta);
    }

    if($edit_proveedor == 1){

        $idpersona = (isset($_POST['idpersona'])) ? $_POST['idpersona'] : "0";

        $result = $proveedores -> editProveedores($idpersona);

        $data = array();

        if($fila = mysqli_fetch_array($result)){
            $data['idpersona'] = $fila['idpersona'];
            $data['tipo_persona'] = $fila['tipo_persona'];
            $data['nombre'] = $fila['nombre'];
            $data['nit'] = $fila['nit'];
            $data['dpi'] = $fila['dpi'];
            $data['direccion'] = $fila['direccion'];
            $data['telefono'] = $fila['telefono'];
            $data['correo'] = $fila['correo'];
            echo json_encode($data);
            
        }
        else{
            $data['result'] = 'error';
        }
    }

    if($confirm_edit_proveedor == 1){
        $idpersona = (isset($_POST['idpersona'])) ? $_POST['idpersona'] : "0";
        $tipo_persona = (isset($_POST['tipo_persona'])) ? $_POST['tipo_persona'] : "0";
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "0";
        $nit = (isset($_POST['nit'])) ? $_POST['nit'] : "0";
        $dpi = (isset($_POST['dpi'])) ? $_POST['dpi'] : "0";
        $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : "0";
        $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "0";
        $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "0";

        $result = $proveedores -> modificarProveedor($idpersona, $nombre, $nit, $direccion, $telefono, $correo);
        
        $newdata['resultado'] = $result;

        echo json_encode($newdata);
    }
?>