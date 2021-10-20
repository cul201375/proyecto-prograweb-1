$("#btnAgregarUsuario").on("click", function () {
  var nombre = $("#nombre").val();
  var apellido = $("#apellido").val();
  var edad = $("#edad").val();
  var usuario = $("#usuario").val();
  var clave = $("#clave").val();
  var dpi = $("#dpi").val();
  var correo = $("#correo").val();
  var telefono = $("#telefono").val();
  var rol = $("#role_id").val();

  if (
    nombre == "" ||
    apellido == "" ||
    edad == "" ||
    usuario == "" ||
    clave == "" ||
    dpi == "" ||
    correo == "" ||
    telefono == "" ||
    rol == ""
  ) {
    alert("Todos los campos son obligatorios");
    return false;
  }

  $.ajax({
    type: "POST",
    data:
      "crear_usuario=1&nombre=" +
      nombre +
      "&apellido=" +
      apellido +
      "&edad=" +
      edad +
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
      rol,
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
    data: "eliminar_usuario=1&user_id=" + id,
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
  parametros = {
    editar_usuario: 1,
    user_id: id,
  };
  $.ajax({
    type: "POST",
    data: parametros,
    url: "modules/usuarios/usuariosController.php",
    dataType: "json",
    beforeSend: function(){},
    success: function (respuesta) {
      //datos = toString(respuesta);
      datos = respuesta;
      console.log(datos);
      if (datos.length > 0) {
        $('#idUsuario').val(datos[0]['id']);
        $('#editNombre').val(datos[0]['nombre']);
        $('#editApellido').val(datos[0]['apellido']);
        $('#editEdad').val(datos[0]['edad']);
        $('#editUsuario').val(datos[0]['usuario']);
        $('#editClave').val(datos[0]['clave']);
        $('#editDpi').val(datos[0]['dpi']);
        $('#editCorreo').val(datos[0]['correo']);
        $('#editTelefono').val(datos[0]['telefono']);
        $('#editrol_id').val(datos[0]['role_id']);
        $('#editRole_id').val(datos[0]['nombre_rol']);
        $('#editEstado').val(datos[0]['estado']);
      }
      else{
          console.log('error');
          alert('error al eliminar el usuario');
      }
    },
  });
}

$("#btnConfirmEditarUsuario").on("click", function () {
  let id = $("#idUsuario").val();
  let nombre = $("#editNombre").val();
  let apellido = $("#editApellido").val();
  let edad = $("#editEdad").val();
  let usuario = $("#editUsuario").val();
  let clave = $("#editClave").val();
  let dpi = $("#editDpi").val();
  let correo = $("#editCorreo").val();
  let telefono = $("#editTelefono").val();
  let rol = $("#editarrolseleccion").val();
  let estado = $('#editEstado').val();

  if (
    id == "" ||
    nombre == "" ||
    apellido == "" ||
    edad == "" ||
    usuario == "" ||
    clave == "" ||
    dpi == "" ||
    correo == "" ||
    telefono == "" ||
    rol == "" ||
    estado == ""
  ) {
    alert("Todos los campos son obligatorios");
    return false;
  }

  $.ajax({
    type: "POST",
    data:
      "confirmar_modificacion=1&id="+
      id +
      "&nombre=" +
      nombre +
      "&apellido=" +
      apellido +
      "&edad=" +
      edad +
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
      "&estado=" + 
      estado,
    url: "modules/usuarios/usuariosController.php",
    dataType: "json",
    success: function (data) {
      var resultado = data.resultado;
      if (resultado == 1) {
        $("#fromEditarUsuario").modal("hide");
        $("body").removeClass("modal-open");
        $(".modal-backdrop").remove();
        alert("Usuario editado exitosamente");
        CargarContenido("modules/usuarios/listadoUsuarios.php");
      } else {
        alert("No se pudo editar el usuario");
      }
    },
  });
});