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
  $resultado = $productosClass -> listadoProductos();
  $nuevoresultado = $productosClass -> listadoProductos();

  ob_end_flush();
?>
  <div class = "container">
    <h1 style = "text-align: center; color: #3ebe54; font-weight: bold;">PRODUCTOS EN TIENDA</h1>
  </div>
    <div class = "contendordeproductos">
    <?php
            while ($nuevafila = mysqli_fetch_array($nuevoresultado)){
            ?>
            <div class="card-producto">
                <div class="imagen-carta">
                    <img src="<?php 
                        if($nuevafila['imagen'] == null){ echo 'img/products/noproductimage.jpg';} 
                        else {echo $nuevafila['imagen'];}?>" alt="imagen del producto"  width = "300" height = "250"
                    />
                </div>
                <div class="card-body">
                    <div class = "contenido-carta" >
                        <div class = "opciones-carta">
                            <button type="button" class="btn btn-warning " id = "btnEditarUsuario" name = "btnEditarUsuario"><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-danger " id = "btnEliminarUsuario" name = "btnEliminarUsuario"><i class="fas fa-user-minus"></i></button>
                            <a href="#" class="btn btn-primary">VER MAS DETALLES</a>
                        </div>
                        <div class = "info-carta">
                            <div>
                                <h6 id="titulodeproducto">ID_ARTICULO: <span><?php echo $nuevafila['idarticulo']; ?></span></h6>
                            </div>
                            <div>
                                <h6 id="titulodeproducto">CATEGORIA: <span><?php echo $nuevafila['idcategoria'];?></span></h6>
                            </div>
                            <div>
                                <h6 id="titulodeproducto">CODIGO: <span><?php echo $nuevafila['codigo']; ?></span></h6>
                            </div>
                            <div>
                                <h6 id="titulodeproducto">CODIGO: <span><?php echo $nuevafila['nombre']; ?></span></h6>
                            </div>
                            <div>
                                <h6 id="titulodeproducto">PRECIO: <span><?php echo $nuevafila['precio_venta']; ?></span></h6>
                            </div>
                            <div>
                                <h6 id="titulodeproducto">STOCK: <span><?php echo $nuevafila['stock']; ?></span></h6>
                            </div>
                            <div>
                                <h6 id="titulodeproducto">DESCRIPCION: <span><?php echo $nuevafila['descripcion']; ?></span></h6>
                            </div>
                            <div>
                                <h6 id="titulodeproducto">ESTADO: <span><?php echo $nuevafila['estado']; ?></span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
    </div>
       