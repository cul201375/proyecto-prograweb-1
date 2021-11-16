<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']){
  header("location: ../../index.php");
}
include_once('../../include/functions.php');
  $usuariosClass = new usuariosClass();
  $resultado = array();
  $resultadoRoles = array();
  $resultado = $usuariosClass -> listadoUsuarios();
  $resultadoRoles = $usuariosClass -> getRoles();
  $nuevoresultado = $usuariosClass -> getRoles();

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
        <button type="button" class="btn btn-success " id="btnNuevoUsuario" name="btnNuevoUsuario"
            data-bs-toggle="modal" data-bs-target="#formNuevoUsuario">
            Nuevo Usuario
        </button>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr style="text-align: center; justify-content: center;">
                    <th scope="col">FOTO</th>
                    <th scope="col">ID</th>

                    <th scope="col">Nombre</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Username</th>
                    <th scope="col">Clave</th>
                    <th scope="col">Dpi</th>
                    <th scope="col">Email</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Estado</th>
                    <th scope="col">EDITAR</th>
                    <th scope="col">ELIMINAR</th>
                </tr>
            </thead>
            <tbody>

                <?php
                   while ($fila = mysqli_fetch_array($resultado)){
                  ?>
                <tr style="text-align: center; justify-content: center;">
                    <td><img src="<?php 
                        if($fila['imgprofile'] == null){ echo 'img/usersprofiles/nouser.png';} 
                        else {echo $fila['imgprofile'];}?>" alt="userprofile" width="80" height="80">
                    </td>
                    <td><?php echo $fila['idusuario']; ?></td>
                    <td><?php echo $fila['nombre'];?></td>
                    <td><?php echo $fila['edad']; ?></td>
                    <td><?php echo $fila['usuario']; ?></td>
                    <td><?php echo $fila['clave']; ?></td>
                    <td><?php echo $fila['dpi']; ?></td>
                    <td><?php echo $fila['correo']; ?></td>
                    <td><?php echo $fila['telefono']; ?></td>
                    <td><?php echo $fila['nombre_rol']; ?></td>
                    <td><?php echo $fila['estado']; ?></td>
                    <td><button type="button" class="btn btn-warning " id="btnEditarUsuario" name="btnEditarUsuario"
                            onclick="editarUsuarios(<?php echo $fila['idusuario'];?>);" data-bs-toggle="modal"
                            data-bs-target="#fromEditarUsuario"><i class="fas fa-edit"></i></button></td>
                    <td><button type="button" class="btn btn-danger " id="btnEliminarUsuario" name="btnEliminarUsuario"
                            onclick="eliminarUsuario(<?php echo $fila['idusuario'];?>);"><i
                                class="fas fa-user-minus"></i></button></td>
                </tr>
                <?php
                   }
                  ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal ag nuevo usuario -->
<div class="modal fade" id="formNuevoUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="formNuevoUsuario">Nuevo Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre" placeholder="Aqui va tu nombre">
                    <label for="nombre">Nombre Completo</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="edad" placeholder="Aqui va tu edad">
                    <label for="edad">Edad</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="direccion" placeholder="Aqui va tu direccion">
                    <label for="direccion">Direccion</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="usuario" placeholder="Aqui va tu usuario">
                    <label for="usuario">Usuario</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="clave" placeholder="Aqui va tu clave">
                    <label for="clave">Clave</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="dpi" placeholder="Aqui va tu DPI">
                    <label for="dpi">DPI</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="correo" placeholder="Aqui va tu correo">
                    <label for="correo">Correo</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="telefono" placeholder="Aqui va tu correo">
                    <label for="telefono">Teléfono</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="role_id" aria-label="Default select example">
                        <?php
            while ($row = mysqli_fetch_array($resultadoRoles)){
            ?>
                        <option value="<?php echo $row['idrol'];?>"><?php echo $row['nombre'];?></option>
                        <?php
            }
            ?>
                    </select>
                    <label for="role_id">Selecceiona un rol</label>
                </div>
            </div>

            <div class="mb-3" style="text-align:center;">
                <label for="formFileSm" class="form-label">Elige una foto</label>
                <input class="form-control form-control-sm" id="userPic" type="file">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnAgregarUsuario">Agregar Usuario</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal edit nuevo usuario -->

<div class="modal fade" id="fromEditarUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="fromEditarUsuario">Modifica los campos que quieres editar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" id="idUsuario" placeholder="Disabled input"
                        aria-label="Disabled input example" disabled>
                    <label for="idUsuario">ID</label>
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
                    <input type="text" class="form-control" id="editUsuario" disabled>
                    <label for="editUsuario">Usuario</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="editClave" disabled>
                    <label for="editClave">Clave</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="editDpi" disabled>
                    <label for="editDpi">Dpi</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="editCorreo">
                    <label for="editCorreo">Correo</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="editTelefono">
                    <label for="editTelefono">Teléfono</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="editrol_id">
                        <option id="editRole_id" value="none" selected disabled hidden></option>
                        <?php
                while ($nuevafila = mysqli_fetch_array($nuevoresultado)){
                ?>
                        <option value="<?php echo $nuevafila['idrol'];?>"><?php echo $nuevafila['nombre'];?></option>
                        <?php
                }
                ?>
                    </select>
                    <label for="editrol_id">Agrega un nuevo rol</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="editEstado">
                    <label for="editEstado">Estado elija 1 o 0</label>
                </div>

                <div class="mb-3" style="text-align:center;">
                    <img id="viewedituserprofile" src="" alt="userprofile" width="80" height="80"><img />
                    <label for="formFileSm" class="form-label">Elige una foto</label>
                    <input class="selecctordefoto" style="font-size: x-small" id="editFoto" type="file">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnConfirmEditarUsuario">Guardar cambios</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>
</div>