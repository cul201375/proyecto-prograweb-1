function elimnarProveedor(id) {
    $.ajax({
      type: "POST",
      data: "eliminar_proveedor=1&idpersona=" + id,
      url: "modules/proveedores/proveedoresController.php",
      dataType: "json",
      success: function (data) {
        var resultado = data.resultado;
        if (resultado === 1) {
          swal("Cuidado!", "Eliminaste un usuario!", "warning");
          CargarContenido("modules/usuarios/listadoProveedores.php");
        } else {
          alert("No se pudo eliminar el usuario seleccionado");
        }
      },
    });
  }

  $("#btnAddProveedor").on("click", function () {
    var tipo = $("#tipo_persona").val();
    var nombre = $("#nombre").val();
    var nit = $("#nit").val();
    var dpi = $("#dpi").val();
    var direccion = $("#direccion").val();
    var telefono = $("#telefono").val();
    var correo = $("#correo").val();
 
  
    if (
        tipo == "" ||
        nombre == "" ||
        nit == "" ||
        dpi == "" ||
        direccion == "" ||
        telefono == "" ||
        correo == "" 
    ) {
      swal("ERROR", "TODOS LOS CAMPOS SON OBLIGATORIOS", "error");
      return false;
    }
  
    $.ajax({
      type: "POST",
      data:
        "add_proveedor=1&tipo_persona=" +
        tipo +
        "&nombre=" +
        nombre +
        "&nit=" +
        nit +
        "&dpi=" +
        dpi +
        "&direccion=" +
        direccion +
        "&telefono=" +
        telefono +
        "&correo=" +
        correo,
      url: "modules/proveedores/proveedoresController.php",
      dataType: "json",
      success: function (data) {
        var resultado = data.resultado;
        if (resultado === 1) {
          $("#addNuevoProveedor").modal("hide");
          $("body").removeClass("modal-open");
          $(".modal-backdrop").remove();
          CargarContenido("modules/proveedores/listadoProveedores.php");
          swal("Buen trabajo!", "Proveedor creado exitosamente", "success");
        } else {
          swal("ADVERTENCIA", "NO SE PUDO AGREGAR EL PROVEEDOR", "warning");
        }
      },
    });
  });
  
  
function editarProveedor(id) { 
  parametros = {
    edit_proveedor: 1,
    idpersona: id,
  };
  $.ajax({
    type: "POST",
    data: parametros,
    url: "modules/proveedores/proveedoresController.php",
    dataType: "json",
    success: function (data) {
          $('#editid').val(data['idpersona']);
          $('#edittipo_persona').val(data['tipo_persona']);
          $('#editnombre').val(data['nombre']);
          $('#editnit').val(data['nit']);
          $('#editdpi').val(data['dpi']);
          $('#editdireccion').val(data['direccion']);
          $('#edittelefono').val(data['telefono']);
          $('#editcorreo').val(data['correo']);
    },
  });
}


$("#btnConfirmEdit").on("click", function () {

  let idpersona = $("#editid").val();
  let tipo = $("#edittipo_persona").val();
  let nombre = $("#editnombre").val();
  let nit = $("#editnit").val();
  let dpi = $("#editdpi").val();
  let direccion = $("#editdireccion").val();
  let telefono = $("#edittelefono").val();
  let correo = $("#editcorreo").val();

  if (
    idpersona == "" ||
    tipo == "" ||
    nombre == "" ||
    nit == "" ||
    dpi == "" ||
    direccion == "" ||
    telefono == "" ||
    correo == "" 

  ) 
  {
    alert("Todos los campos son obligatorios");
    return false;
  }

  $.ajax({
    type: "POST",
    data:
      "confirm_edit_proveedor=1&idpersona=" + 
      idpersona +
      "&tipo_persona=" +
      tipo +
      "&nombre=" +
      nombre +
      "&nit=" +
      nit +
      "&dpi=" +
      dpi +
      "&direccion=" +
      direccion +
      "&telefono=" +
      telefono +
      "&correo=" +
      correo,
    url: "modules/proveedores/proveedoresController.php",
    dataType: "json",
    success: function (newdata) {
      var nuevoresultado = newdata.resultado;
      if (nuevoresultado === 1) {
        $("#fromEditarUsuario").modal("hide");
        $("body").removeClass("modal-open");
        $(".modal-backdrop").remove();
        swal("Buen trabajo!", "Editaste un proveedor correctamente!", "success");
        CargarContenido("modules/proveedores/listadoProveedores.php");
      } else {
        swal("ADVERTENCIA", "NO SE PUDO ACTUALIZAR EL PROVEEDOR", "warning");
      }
    },
  });
});

function addProveedor_from_ingreso(){
  var tipo = $("#listDetalle_listDetalle_tipo_persona").val();
  var nombre = $("#listDetalle_nombre").val();
  var nit = $("#listDetalle_nit").val();
  var dpi = $("#listDetalle_dpi").val();
  var direccion = $("#listDetalle_direccion").val();
  var telefono = $("#listDetalle_telefono").val();
  var correo = $("#listDetalle_correo").val();


  if (
      tipo == "" ||
      nombre == "" ||
      nit == "" ||
      dpi == "" ||
      direccion == "" ||
      telefono == "" ||
      correo == "" 
  ) {
    swal("ERROR", "TODOS LOS CAMPOS SON OBLIGATORIOS", "error");
    return false;
  }

  $.ajax({
    type: "POST",
    data:
      "add_proveedor=1&tipo_persona=" +
      tipo +
      "&nombre=" +
      nombre +
      "&nit=" +
      nit +
      "&dpi=" +
      dpi +
      "&direccion=" +
      direccion +
      "&telefono=" +
      telefono +
      "&correo=" +
      correo,
    url: "modules/proveedores/proveedoresController.php",
    dataType: "json",
    success: function (data) {
      var resultado = data.resultado;
      if (resultado === 1) {
        $("#addNuevoProveedor").modal("hide");
        $("body").removeClass("modal-open");
        $(".modal-backdrop").remove();
        CargarContenido("modules/proveedores/realizarIngreso.php");
        swal("Buen trabajo!", "Proveedor creado exitosamente", "success");
      } else {
        swal("ADVERTENCIA", "NO SE PUDO AGREGAR EL PROVEEDOR", "warning");
      }
    },
  });
}