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
                        <button type="button" class="btn btn-success " id="btnEditarUsuario" name="btnEditarUsuario">
                            <i class="far fa-image"></i></button>
                        <button type="button" class="btn btn-warning " id="btnEliminarUsuario"
                            name="btnEliminarUsuario">
                            <i class="fas fa-question"></i></button>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#formVenderProducto">Realizar Venta</a>
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
                    <input type="number" class="form-control" id="editNombre" disabled>
                    <label for="editNombre">ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="editNombre" disabled>
                    <label for="editNombre">Codigo de producto</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="editNombre">
                    <label for="editNombre">Cantidad</label>
                </div>
                <div class="form-floating mb-3">
                    <span>cliente</span>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="editNombre">
                    <label for="editNombre">Nombre</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="editEdad">
                    <label for="editEdad">Edad</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="editDireccion">
                    <label for="editDireccion">Direccion</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="editDpi">
                    <label for="editDpi">Dpi</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="editDpi">
                    <label for="editDpi">Nit</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="editCorreo">
                    <label for="editCorreo">Correo</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="editTelefono">
                    <label for="editTelefono">Teléfono</label>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btnConfirmEditarUsuario">Realizar venta</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>
</div>