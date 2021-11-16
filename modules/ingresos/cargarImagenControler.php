<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']){
  header("location: ../../index.php");
}
include_once('../../include/functions.php');
  ob_end_flush();

  $prueba = (isset($_POST['imgproducto']) ? $_POST['imgproducto'] : "0");

  echo $prueba;
?>