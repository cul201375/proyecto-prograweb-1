<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']) {
    header("location: ../../index.php");
}
include_once('../../include/functions.php');
$ingresosoClass = new Ingresos();
$resultado = array();
$resultado = $ingresosoClass->retornarListaIngresos();

ob_end_flush();
?>
<link rel="stylesheet" href="css/contenedordetalleingreso.css">
<div id="separador" style="height:25px; width: 100%;"></div>
<div class="container">
    <form class="d-flex" style="width: 100%; padding-right: 10px;">
        <input class="form-control me-2" type="search" placeholder="Buscar ingreso" aria-label="Buscar ingreso">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>
</div>
<div class="maincontenedordedetalle">
    <div class="contenedordedetalle">
        <?php
            while ($nuevafila = mysqli_fetch_array($resultado)){
            ?>
        <div class="card cartita" style="width: 23rem;">
            <div class="card-body">
                <h5 class="card-title" style="color: white;">ID</h5>
                <span id="idingreso" style="color: white;"><?php echo $nuevafila['idingreso'];?></span>
                <h5 class="card-title" style="color: white;">ARTICULO</h5>
                <span id="nombrearticulo" style="color: white;"><?php echo $nuevafila['nombre_articulo'];?></span>
                <h5 class="card-title" style="color: white;">PROVEEDOR</h5>
                <span id="nombreproveedor" style="color: white;"><?php echo $nuevafila['nombre_proveedor'];?></span>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span>FECHA DE INGRESO: <span
                            id="fecha"><?php echo $nuevafila['fecha'];?></span></span></li>
                <li class="list-group-item"><span>TIPO DE COMPROBANTE: <span
                            id="idnombreproducto"><?php echo $nuevafila['tipo_comprobante'];?></span></span></li>
                <li class="list-group-item"><span>SERIE COMPROBANTE: <span
                            id="idcantidadproducto"><?php echo $nuevafila['serie_comprobante'];?></span></span></li>
                <li class="list-group-item"><span>NUMERO COMPROBANTE: <span
                            id="idprecioproducto"><?php echo $nuevafila['num_comprobante'];?></span></span></li>
                <li class="list-group-item"><span>COSTO:<span
                            id="idnombreproducto"><?php echo $nuevafila['costo'];?></span></span></li>
                <li class="list-group-item"><span>IMPUESTO: <span
                            id="idcantidadproducto"><?php echo $nuevafila['impuesto'];?></span></span></li>
                <li class="list-group-item"><span>TOTAL: <span
                            id="idprecioproducto"><?php echo $nuevafila['total'];?></span></span></li>
            </ul>
            <div class="card-body">
                <button id="vermasdetalles" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#masdetalles"
                    onclick="Verdetalles(<?php echo $nuevafila['idingreso'];?>);">Más
                    información</button>
            </div>
        </div>
        <?php
            }
            ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="masdetalles" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="masdetalles">Más información</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item">ID: <span id="Id_Ingreso"></span></li>
                    <li class="list-group-item">ESTADO: <span id="estado"></span></li>
                    <li class="list-group-item">USUARIO QUE HIZO LA TRANSACCION: <span id="nombre_usuario"></span></li>
                    <li class="list-group-item">PROVEEDOR: <span id="nombre_proveedor"></span></li>
                    <li class="list-group-item">ID DEL ARTICULO: <span id="id_de_articulo"></span></li>
                    <li class="list-group-item">NOMBRE DEL ARTICULO: <span id="nombre_articulo"></span></li>
                    <li class="list-group-item">PRECIO DE VENTA: Q<span id="precio_de_venta"></span></li>
                </ul>
                <div style="text-align: center; padding: 5px; border: 1px solid; border-color:#cccccc;">
                    <img id="imagen" src="" class="rounded img-thumbnail" alt="imagen del producto">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>