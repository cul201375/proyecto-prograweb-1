<?php
session_start();
if (!$_SESSION['idusuario']){
    header("location: index.php");
}

include 'template/head.php';
include 'template/body.php';
include 'template/content.php';
include 'template/footer.php';

?>