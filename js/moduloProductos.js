function vender(id, codigo, precio_de_venta) {
  const tiempo = Date.now();
  var impuesto = precio_de_venta * 0.12;
  $("#vndId").val(id);
  $("#vndCodigo").val(codigo);
  $("#vndTotal").val(precio_de_venta);
  $("#vndImpuesto").val(impuesto);

  var hoy = new Date(tiempo);
  var fecha = hoy.toISOString();
  $("#vndFecha").val(fecha);
}

$("#btnConfirmEditarUsuario").on("click", function () {
  var vndId = $("#vndId").val();
  var vndCodigo = $("#vndCodigo").val();
  var vndCantidad = $("#vndCantidad").val();
  var vndNombre = $("#vndNombre").val();
  var vndDireccion = $("#vndDireccion").val();
  var vndDpi = $("#vndDpi").val();
  var vndNit = $("#vndNit").val();
  var vndCorreo = $("#vndCorreo").val();
  var vndTelefono = $("#vndTelefono").val();
  var vndTipoDoc = $("#vndTipoDoc").val();
  var vndSerieDoc = $("#vndSerieDoc").val();
  var vndNumDoc = $("#vndNumDoc").val();
  var vndFecha = $("#vndFecha").val();
  var vndImpuesto = $("#vndImpuesto").val();
  var vndTotal = $("#vndTotal").val();
  var vndIdUsuario = $("#vndIdUsuario").val();
  console.log(
    vndId +
      " " +
      vndCodigo +
      " " +
      vndCantidad +
      " " +
      vndNombre +
      " " +
      vndDireccion +
      " " +
      vndDpi +
      " " +
      vndNit +
      " " +
      vndCorreo +
      " " +
      vndTelefono +
      " " +
      vndTipoDoc +
      " " +
      vndSerieDoc +
      " " +
      vndNumDoc +
      " " +
      vndFecha +
      " " +
      vndImpuesto +
      " " +
      vndTotal +
      " " +
      vndIdUsuario +
      " "
  );

  $.ajax({
    type: "post",
    data:
      "realizar_venta=1&idarticulo=" +
      vndId +
      "&codigo=" +
      vndCodigo +
      "&cantidad=" +
      vndCantidad +
      "&nombre=" +
      vndNombre +
      "&direccion=" +
      vndDireccion +
      "&dpi=" +
      vndDpi +
      "&nit=" +
      vndNit +
      "&correo=" +
      vndCorreo +
      "&telefono=" +
      vndTelefono +
      "&tipo_documento=" +
      vndTipoDoc +
      "&serie_documento=" +
      vndSerieDoc +
      "&num_documento=" +
      vndNumDoc +
      "&fecha=" +
      vndFecha +
      "&impuesto=" +
      vndImpuesto +
      "&total=" +
      vndTotal +
      "&idusuario=" +
      vndIdUsuario,
    url: "modules/ventas/VentasController.php",
    dataType: "json",
    success: function (data) {
      var result = data.resultado;
      if (result === 1) {
        swal("Buen trabajo!", "Venta resgistrada exitosamente", "success");
        CargarContenido("modules/productos/listadoProductos.php");
      } else {
        swal(":(", "Parece que algo salio mal. Intenta nuevamente!", "warning");
      }
    },
  });
});
