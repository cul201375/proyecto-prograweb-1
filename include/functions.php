<?php
    require_once("config.php");
    if (DEBUG == "true"){
        ini_set('display_errors', 1);
    }
    else{
        ini_set("display_error", 0);
    }

    #clases de la capa de modelo de la db
    require_once("class/Conn/Tools.php");
    require_once("class/Login/loginClass.php");
    require_once("class/Usuarios/usuariosClass.php");
    require_once("class/Productos/productosClass.php");
    require_once("class/Ingresos/IngresosClass.php");
    require_once("class/Proveedores/proveedoresClass.php");
    require_once("class/Ventas/VentasClass.php");
    require_once("class/Clientes/ClientesClass.php");
?>