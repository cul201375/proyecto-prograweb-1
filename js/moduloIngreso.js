function Verdetalles(id) {
    parametros = {
        idingreso: id,
        verdetalles: 1
    }
    id_ingreso = document.querySelector("#Id_Ingreso");
    estado = document.querySelector("#estado");
    nombre_usuario = document.querySelector("#nombre_usuario");
    nombre_proveedor = document.querySelector("#nombre_proveedor");
    nombre_articulo = document.querySelector("#nombre_articulo");
    precio_de_venta = document.querySelector("#precio_de_venta");
    id_de_articulo = document.querySelector("#id_de_articulo");
    $.ajax({
        type: 'POST',
        data: parametros,
        url: 'modules/ingresos/IngresosController.php',
        dataType: 'json',
        success: function (datos) {
            id_ingreso.textContent = datos['idingreso'];
            estado.textContent = datos['estado'];
            nombre_usuario.textContent = datos['nombre_usuario'];
            nombre_proveedor.textContent = datos['nombre_proveedor'];
            nombre_articulo.textContent = datos['nombre_articulo'];
            precio_de_venta.textContent = datos['precio_venta'];
            id_de_articulo.textContent = datos['id_de_articulo'];
            $('#imagen').attr('src', datos['imagen']);
        }
    });
};

$('#bntConfirmarIngreso').on('click', function(){


/*obtener todas las variables para realizar el ingreso*/


});