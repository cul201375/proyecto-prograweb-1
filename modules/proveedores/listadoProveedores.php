<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']){
  header("location: ../../index.php");
}
include_once('../../include/functions.php');
  $proveedoresClass = new Proveedores();
  $resultado = array();
  $resultadoRoles = array();
  $resultado = $proveedoresClass -> ObtenerProveedores();

  ob_end_flush();
?>
<div id="separador" style="height:25px; width: 100%;"></div>
<div id="container">
    <form class="d-flex" style="width: 100%; padding-right: 10px;">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>
</div>
<div id="separador" style="height:25px; width: 100%;"></div>
<div class="container">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" id="btnNuevoProveedor" name="btnNuevoProveedor" class="btn btn-primary"
            data-bs-toggle="modal" data-bs-target="#addNuevoProveedor"> AÑADIR NUEVO PROVEEDOR</button>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr style="text-align: center; justify-content: center;">
                    <th scope="col">ID</th>
                    <th scope="col">TIPO PERSONA</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">NIT</th>
                    <th scope="col">DPI</th>
                    <th scope="col">DIRECCION</th>
                    <th scope="col">TELEFONO</th>
                    <th scope="col">CORREO</th>
                    <th scope="col">EDITAR</th>
                    <th scope="col">ELIMINAR</th>
                </tr>
            </thead>
            <tbody>

                <?php
                   while ($fila = mysqli_fetch_array($resultado)){
                  ?>
                <tr style="text-align: center; justify-content: center;">
                    <td><?php echo $fila['idpersona']; ?></td>
                    <td><?php echo $fila['tipo_persona'];?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['nit']; ?></td>
                    <td><?php echo $fila['dpi']; ?></td>
                    <td><?php echo $fila['direccion']; ?></td>
                    <td><?php echo $fila['telefono']; ?></td>
                    <td><?php echo $fila['correo']; ?></td>
                    <td>
                        <button type="button" class="btn btn-warning " id="btnEditarPorveedor" name="btnEditarPorveedor"
                            onclick="editarProveedor(<?php echo $fila['idpersona'];?>);" data-bs-toggle="modal"
                            data-bs-target="#editProveedor">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger " id="btnEliminarProveedor"
                            name="btnEliminarProveedor" onclick="eliminarProveedor(<?php echo $fila['idpersona'];?>);">
                            <i class="fas fa-backspace"></i>
                        </button>
                    </td>
                </tr>
                <?php
                   }
                  ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal  añadir proveedor-->
<div class="modal fade" id="addNuevoProveedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNuevoProveedor">AÑADE A UN NUEVO PROVEEDOR</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="tipo_persona" placeholder="tipo_persona"
                        value="proveedor" disabled>
                    <label for="nombre">TIPO</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre" placeholder="nombre">
                    <label for="nombre">Nombre del proveedor</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nit" placeholder="nit">
                    <label for="nit">NIT</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="dpi" placeholder="dpi" value="N/A" disabled>
                    <label for="dpi">DPI</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="direccion" placeholder="direccion">
                    <label for="direccion">Dirección</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="telefono" placeholder="telefono">
                    <label for="telefono">Teléfono</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="correo" placeholder="correo">
                    <label for="correo">Correo</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="btnAddProveedor">Añadir</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  editar proveedor-->
<div class="modal fade" id="editProveedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProveedor">EDITA AL PROVEEDOR</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="editid" placeholder="ID" disabled>
                    <label for="ID">ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="edittipo_persona" placeholder="tipo_persona"
                        value="proveedor" disabled>
                    <label for="tipo_persona">TIPO</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="editnombre" placeholder="nombre">
                    <label for="nombre">Nombre del proveedor</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="editnit" placeholder="nit">
                    <label for="nit">NIT</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="editdpi" placeholder="dpi" value="N/A" disabled>
                    <label for="dpi">DPI</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="editdireccion" placeholder="direccion">
                    <label for="direccion">Dirección</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="edittelefono" placeholder="telefono">
                    <label for="telefono">Teléfono</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="editcorreo" placeholder="correo">
                    <label for="correo">Correo</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="btnConfirmEdit">Confirmar</button>
            </div>
        </div>
    </div>
</div>
<script src="js/muduloProveedores.js"></script>