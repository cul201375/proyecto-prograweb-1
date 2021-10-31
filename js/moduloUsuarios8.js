$("#btnAgregarUsuario").on("click", function () {
  var nombre = $("#nombre").val();
  var edad = $("#edad").val();
  var direccion = $("#direccion").val();
  var usuario = $("#usuario").val();
  var clave = $("#clave").val();
  var dpi = $("#dpi").val();
  var correo = $("#correo").val();
  var telefono = $("#telefono").val();
  var rol = $("#role_id").val();
  //Obtengo el fichero que va a ser subido
  var dato_archivo = $('#userPic').prop("files")[0];
  //Creo un dato de formulario para pasarlo en el ajax
  var form_data = new FormData();
  //Añado los datos del fichero que voy a subir
  //En el lado del servidor puede obtener el archivo a traves de $_FILES["file"]
  form_data.append("file", dato_archivo);
  //Realizo el ajax

  if (
    nombre == "" ||
    edad == "" ||
    direccion == "" ||
    usuario == "" ||
    clave == "" ||
    dpi == "" ||
    correo == "" ||
    telefono == "" ||
    rol == "" ||
    dato_archivo == null
  ) {
    alert("Todos los campos son obligatorios");
    return false;
  }

  $.ajax({
    type: "POST",
    data:
      "crear_usuario=1&nombre=" +
      nombre +
      "&edad=" +
      edad +
      "&direccion=" +
      direccion +
      "&usuario=" +
      usuario +
      "&clave=" +
      clave +
      "&dpi=" +
      dpi +
      "&correo=" +
      correo +
      "&telefono=" +
      telefono +
      "&role_id=" +
      rol +
      "form_data="+
      form_data,
    url: "modules/usuarios/usuariosController.php",
    dataType: "json",
    success: function (data) {
      var resultado = data.resultado;
      if (resultado === 1) {
        $("#formNuevoUsuario").modal("hide");
        $("body").removeClass("modal-open");
        $(".modal-backdrop").remove();
        alert("Usuario creado exitosamente");
        CargarContenido("modules/usuarios/listadoUsuarios.php");
      } else {
        alert("No se pudo crear el usuario");
      }
    },
  });
});

function eliminarUsuario(id) {
  $.ajax({
    type: "POST",
    data: "eliminar_usuario=1&idusuario=" + id,
    url: "modules/usuarios/usuariosController.php",
    dataType: "json",
    success: function (data) {
      var resultado = data.resultado;
      if (resultado === 1) {
        alert("Usuario eliminado exitosamente");
        CargarContenido("modules/usuarios/listadoUsuarios.php");
      } else {
        alert("No se pudo eliminar el usuario seleccionado");
      }
    },
  });
}

function editarUsuarios(id) {
  var foto =  new Image();  
  parametros = {
    editar_usuario: 1,
    idusuario: id,
  };
  $.ajax({
    type: "POST",
    data: parametros,
    url: "modules/usuarios/usuariosController.php",
    dataType: "json",
    success: function (datos) {
          $('#idUsuario').val(datos['idusuario']);
          $('#editNombre').val(datos['nombre']);
          $('#editEdad').val(datos['edad']);
          $('#editDireccion').val(datos['direccion']);
          $('#editUsuario').val(datos['usuario']);
          $('#editClave').val(datos['clave']);
          $('#editDpi').val(datos['dpi']);
          $('#editCorreo').val(datos['correo']);
          $('#editTelefono').val(datos['telefono']);
          $('#editrol_id').val(datos['role_id']);
          $('#editRole_id').val(datos['nombre_rol']);
          $('#editEstado').val(datos['estado']);
          if (datos['imgprofile'] == null){
            $('#viewedituserprofile').attr('src', 'img/usersprofiles/nouser.png');
          }else{
            $('#viewedituserprofile').attr('src', datos['imgprofile']);
          }          
    },
  });
}

$("#btnConfirmEditarUsuario").on("click", function () {

  let idusuario = $("#idUsuario").val();
  let nombre = $("#editNombre").val();
  let edad = $("#editEdad").val();
  let direccion = $("#editDireccion").val();
  let usuario = $("#editUsuario").val();
  let clave = $("#editClave").val();
  let dpi = $("#editDpi").val();
  let correo = $("#editCorreo").val();
  let telefono = $("#editTelefono").val();
  let estado = $("#editEstado").val();
  let idrol = $("#editrol_id").val();
  let img = $("#editFoto").val();

  if (
    idusuario == "" ||
    nombre == "" ||
    edad == null ||
    direccion == "" ||
    usuario == "" ||
    clave == "" ||
    dpi == "" ||
    correo == "" ||
    telefono == "" ||
    estado == null ||
    idrol == null ||
    img == null
  ) 
  {
    alert("Todos los campos son obligatorios");
    return false;
  }

  $.ajax({
    type: "POST",
    data:
      "confirmar_edit_usuario=1&idusuario=" + 
      idusuario +
      "&nombre=" +
      nombre +
      "&edad=" +
      edad +
      "&direccion=" +
      direccion +
      "&usuario=" +
      usuario +
      "&clave=" +
      clave +
      "&dpi=" +
      dpi +
      "&correo=" +
      correo +
      "&telefono=" +
      telefono +
      "&role_id=" +
      idrol + "&estado="+
      estado,
    url: "modules/usuarios/usuariosController.php",
    dataType: "json",
    success: function (newdata) {
      var nuevoresultado = newdata.resultado;
      if (nuevoresultado === 1) {
        $("#fromEditarUsuario").modal("hide");
        $("body").removeClass("modal-open");
        $(".modal-backdrop").remove();
        alert("Usuario editado exitosamente");
        CargarContenido("modules/usuarios/listadoUsuarios.php");
      } else {
        alert("No se pudo crear el usuario");
      }
    },
  });
});