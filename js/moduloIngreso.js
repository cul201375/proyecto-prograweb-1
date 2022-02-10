
function calcularImpuesto() {
    var costo = $('#rlz_ing_costo').val();
    if (costo != 0) {

        var imp = costo * 0.12;
        var impuesto_round = imp.toFixed(2);

        var sumtotal = costo - imp;
        var sumtotal_round = sumtotal.toFixed(2);

        $('#rlz_ing_impuesto').val(impuesto_round);
        $('#rlz_ing_total').val(sumtotal_round);
    }
    if (costo == 0) {
        $('#rlz_ing_impuesto').val("");
        $('#rlz_ing_total').val("");
    }
}

/*obtener todas las variables para realizar el ingreso*/
$('#bntConfirmarIngreso').on('click', function () {
    var idproveedor = $('#rlz_ing_idproveedor').val();
    var idusuario = $('#rlz_ing_idusuario').val();
    var tipo_documento = $('#rlz_ing_tipo_documento').val();
    var serie_documento = $('#rlz_ing_serie_documento').val();
    var num_documento = $('#rlz_ing_num_documento').val();
    var costo = $('#rlz_ing_costo').val();
    var impuesto = $('#rlz_ing_impuesto').val();
    var total = $('#rlz_ing_total').val();
    var cantidad = $('#rlz_ing_cantidad').val();
    var precio_venta = $('#rlz_ing_precio_venta').val();
    var codigo = $('#rlz_ing_codigo').val();
    var idcategoria = $('#rlz_ing_idcategoria').val();
    var nombre = $('#rlz_ing_nombre').val();
    var fecha = $('#rlz_ing_fecha').val();
    var descripcion = $('#rlz_ing_descripcion').val();
    var file_data = $('#archivo').prop("files")[0];
    var form_data = new FormData();
    form_data.append('archivo', file_data);

    if (idproveedor == "" ||
        idusuario == "" ||
        tipo_documento == "" ||
        serie_documento == "" ||
        num_documento == "" ||
        costo == "" ||
        impuesto == "" ||
        total == "" ||
        cantidad == "" ||
        precio_venta == "" ||
        codigo == "" ||
        idcategoria == "" ||
        nombre == "" ||
        fecha == "" ||
        descripcion == "" ||
        file_data == null) {
        swal("ADVERTANCIA", "Todos los campos son obligatorios", "warning");
        return false;
    }

    var imagen = file_data.name;

    $.ajax({
        type: 'POST',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        url: 'modules/ingresos/upImgProduct.php',
        dataType: 'json',
        complete: function () {
            completarInsert(idproveedor, idusuario, tipo_documento, serie_documento, num_documento, costo, impuesto, total, cantidad, precio_venta, codigo, idcategoria, nombre, fecha, descripcion, imagen);
        }
    });
});


function completarInsert(idproveedor, idusuario, tipo_documento, serie_documento, num_documento, costo, impuesto, total, cantidad, precio_venta, codigo, idcategoria, nombre, fecha, descripcion, imagen) {
    console.log(idproveedor, idusuario, tipo_documento, serie_documento, num_documento, costo, impuesto, total, cantidad, precio_venta, codigo, idcategoria, nombre, fecha, descripcion, imagen);
    $.ajax({
        type: 'POST',
        data: "insertarIngreso=1" +
            "&idproveedor=" + idproveedor +
            "&idusuario=" + idusuario +
            "&tipo_documento=" + tipo_documento +
            "&serie_document=" + serie_documento +
            "&num_documento=" + num_documento +
            "&costo=" + costo +
            "&impuesto=" + impuesto +
            "&total=" + total +
            "&cantidad=" + cantidad +
            "&precio_venta=" + precio_venta +
            "&codigo=" + codigo +
            "&idcategoria=" + idcategoria +
            "&nombre=" + nombre +
            "&fecha=" + fecha +
            "&descripcion=" + descripcion +
            "&imagen=" + imagen,
        url: 'modules/ingresos/ingresosController.php',
        dataType: 'json',
        success: function (data) {
            result = data.resultado;
            if(result === 1){
                swal("Buen trabajo!", "Se hizo el ingreso correctamente!", "success");
            }else{
                swal(":(", "Parece que algo salio mal. Intenta nuevamente!", "warning");
            }
        }
    });
}


