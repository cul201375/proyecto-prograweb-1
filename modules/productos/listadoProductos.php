<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']){
  header("location: ../../index.php");
}
include_once('../../include/functions.php');
  $productosClass = new ProductosClass();
  $resultado = array();
  $resultadoRoles = array();
  $resultado = $productosClass -> getCategories();
  $nuevoresultado = $productosClass -> listadoProductos();

  ob_end_flush();
?>
<div id="separador" style="height:25px; width: 100%;"></div>
<div class="container">
    <h6>FILTRAR POR CATEGORIA<i class="fas fa-filter" style="color: #ccccccc;"></i></h6>
    <select class="form-select" aria-label="Default select example">
        <option selected>TODOS</option>
        <?php
            while ($row = mysqli_fetch_array($resultado)){
            ?>
        <option value="<?php echo $row['idcategoria'];?>"><?php echo $row['nombre'];?></option>
        <?php
            }
            ?>
    </select>
</div>
<div class="contendordeproductos">
    <?php
            while ($nuevafila = mysqli_fetch_array($nuevoresultado)){
            ?>
    <div class="card-producto">
        <div class="imagen-carta">
            <img src="<?php 
                        if($nuevafila['imagen'] == null){ echo 'img/products/noproductimage.jpg';} 
                        else {echo $nuevafila['imagen'];}?>" alt="imagen del producto" width="300" height="250" />
        </div>
        <div class="card-body">
            <div class="contenido-carta">
                <div class="opciones-carta">
                    <button type="button" class="btn btn-success " id="btnEditarUsuario" name="btnEditarUsuario">
                        <i class="far fa-image"></i></i></button>
                    <button type="button" class="btn btn-warning " id="btnEliminarUsuario" name="btnEliminarUsuario">
                        <i class="fas fa-question"></i></i></button>
                    <a href="#" class="btn btn-primary">VER MAS DETALLES</a>
                </div>
                <div class="info-carta">
                    <div>
                        <h6 id="idproducto">ID: <span><?php echo $nuevafila['idarticulo']; ?></span></h6>
                    </div>
                    <div>
                        <h6 id="categoriaproducto">CATEGORIA: <span><?php echo $nuevafila['nombrecategoria'];?></span>
                        </h6>
                    </div>
                    <div>
                        <h6 id="codigoproducto">CODIGO: <span><?php echo $nuevafila['codigo']; ?></span></h6>
                    </div>
                    <div>
                        <h6 id="nombreproducto">NOMBRE: <span><?php echo $nuevafila['nombre']; ?></span></h6>
                    </div>
                    <div>
                        <h6 id="precioproducto">PRECIO: <span>Q<?php echo $nuevafila['precio_venta']; ?></span></h6>
                    </div>
                    <div>
                        <h6 id="stockproducto">DISPONIBLES: <span><?php echo $nuevafila['stock']; ?></span></h6>
                    </div>
                    <div>
                        <h6 id="descripcionproducto">DESCRIPCION: <span><?php echo $nuevafila['descripcion']; ?></span>
                        </h6>
                    </div>
                    <div>
                        <h6 id="estadoproducto">ESTADO: <span><?php if($nuevafila['estado'] != null && $nuevafila['estado'] != 0){
                                    echo 'DISPONIBLE';
                                }
                                else{
                                    echo 'AGOTADO';
                                }
                                    ?></span></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
            }
            ?>
</div>