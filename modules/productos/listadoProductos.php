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
<link rel="stylesheet" href="css/contenedordeproductos.css">
<div id="separador" style="height:25px; width: 100%;"></div>
<div class="container">
    <h6>FILTRAR POR CATEGORIA<i class="fas fa-filter" style="color: #cccccc;"></i></h6>
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
<div id="separador" style="height:25px; width: 100%;"></div>
<div style="width: 100%; text-align: end;">
    <button type="button" class="btn btn-success " id="btnAddCategori" name="btnAddCategori">
        <i class="fas fa-plus"></i> Añadir categoría</button>
</div>
<div class="maincontendordeproductos">
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
                        <div>
                            <button type="button" class="btn btn-danger " id="btnElimarProducto"
                                name="btnElimarProducto" data-bs-toggle="modal" data-bs-target="#eliminarArticulo">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-success " id="btnAddProducto" name="btnAddProducto"
                                data-bs-toggle="modal" data-bs-target="#addMasStock">
                                <i class="fas fa-plus"></i></button>
                        </div>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formVenderProducto"
                            onclick="vender(<?php echo $nuevafila['idarticulo']; ?> , '<?php echo $nuevafila['codigo'];?>', '<?php echo $nuevafila['precio_venta']?>');">Realizar
                            Venta</button>
                    </div>
                    <div class="info-carta">
                        <div>
                            <h6 id="idproducto">ID: <span><?php echo $nuevafila['idarticulo']; ?></span></h6>
                        </div>
                        <div>
                            <h6 id="categoriaproducto">CATEGORIA:
                                <span><?php echo $nuevafila['nombrecategoria'];?></span>
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
                            <h6 id="descripcionproducto">DESCRIPCION:
                                <span><?php echo $nuevafila['descripcion']; ?></span>
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
</div>

<!-- Modal vender producto -->

<div class="modal fade" id="formVenderProducto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="formVenderProducto">Ingresa los datos de venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="form-floating mb-3">
                    <span>producto</span>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="vndId" disabled>
                    <label for="editNombre">ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="vndCodigo" disabled>
                    <label for="editNombre">Codigo de producto</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="vndCantidad">
                    <label for="editNombre">Cantidad a vender</label>
                </div>
                <div class="form-floating mb-3">
                    <span>cliente</span>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="vndNombre">
                    <label for="editNombre">Nombre</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="vndDireccion">
                    <label for="editDireccion">Direccion</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="vndDpi">
                    <label for="editDpi">Dpi</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="vndNit">
                    <label for="editDpi">Nit</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="vndCorreo">
                    <label for="editCorreo">Correo</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="vndTelefono">
                    <label for="editTelefono">Teléfono</label>
                </div>
                <div class="form-floating mb-3">
                    <span>facturacion</span>
                </div>
                <div class="mb-3">
                    <label for="vndTipoDoc" class="form-label">Tipo de documento</label>
                    <input type="text" class="form-control" id="vndTipoDoc" aria-describedby="vndTipoDoc">
                </div>
                <div class="mb-3">
                    <label for="vndSerieDoc" class="form-label">Serie del documento</label>
                    <input type="text" class="form-control" id="vndSerieDoc">
                </div>
                <div class="mb-3">
                    <label for="vndNumDoc" class="form-label">Numero del documento</label>
                    <input type="text" class="form-control" id="vndNumDoc" aria-describedby="vndNumDoc">
                </div>
                <div class="mb-3">
                    <label for="vndFecha" class="form-label">fecha</label>
                    <input type="text" class="form-control" id="vndFecha" disabled>
                </div>
                <div class="mb-3">
                    <label for="vndImpuesto" class="form-label">Impuesto</label>
                    <input type="text" class="form-control" id="vndImpuesto" aria-describedby="vndImpuesto" disabled>
                </div>
                <div class="mb-3">
                    <label for="vndTotal" class="form-label">Total</label>
                    <input type="text" class="form-control" id="vndTotal" disabled>
                </div>
                <div class="mb-3">
                    <label for="vndIdUsuario" class="form-label">ID USUARIO</label>
                    <input type="text" class="form-control" id="vndIdUsuario" aria-describedby="vndIdUsuario"
                        value="<?php echo $_SESSION['idusuario'];?>" disabled>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btnConfirmEditarUsuario">Realizar venta</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal añadir mas al stock -->
<div class="modal fade" id="addMasStock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">AÑADIR MAS PRODUCTO AL STOCK</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><i class="fas fa-info"></i> Ten en cuenta que se sumara un nuevo ingreso</p>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">CANTIDAD</label>
                    <input type="number" class="form-control" id="idIngFromProducto" aria-describedby="emailHelp">
                    <div id="idIngFromProducto" class="form-text">Coloca la cantidad de ingreso del mismo producto.
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CERRAR</button>
                <button type="button" class="btn btn-success">ACEPTAR</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal eliminar producto -->

<div class="modal fade" id="eliminarArticulo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarArticuloLabel">Elimina un articulo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="elimarArt" class="form-label">CANTIDADA A ELIMINAR</label>
                    <input type="number" class="form-control" id="elimarArt" aria-describedby="eliminar un articulo">
                    <div class="form-text"><i class="fas fa-info"></i> Este articulo sera restado del stock</div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="eliminarTodos">
                    <label class="form-check-label" for="eliminarTodos">ELIMINAR TODOS</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CERRAR</button>
                <button type="button" class="btn btn-success">ACEPTAR</button>
            </div>
        </div>
    </div>
</div>

<script src="js/moduloProductos.js"></script>