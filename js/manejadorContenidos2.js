function CargarContenido(form){
    var formulario = form;

    $.ajax({
        type: "POST",
        url: formulario,
        success: function (a){
            $('#contenedorPrincipal').html(a);
        }
    });
}
$('#ListadoUsuarios').on('click', function (){
    document.getElementById('saludonavbar').innerHTML='USUARIOS';
});
$('#ListadoProductos').on('click', function (){
    document.getElementById('saludonavbar').innerHTML='PRODUCTOS';
});
$('#RealizarIngreso').on('click', function (){
    document.getElementById('saludonavbar').innerHTML='REALIZAR INGRESO';
});
$('#Clientes').on('click', function (){
    document.getElementById('saludonavbar').innerHTML='LISTADO DE CLIENTES';
});

$('#DetalleIngreso').on('click', function (){
    document.getElementById('saludonavbar').innerHTML='HISTORIAL DE INGRESO';
});

$('#Ventas').on('click', function (){
    document.getElementById('saludonavbar').innerHTML='VENTAS';
});

$('#ListadoProveedores').on('click', function (){
    document.getElementById('saludonavbar').innerHTML='PROVEEDORES';
});
$('#OffListadoUsuarios').on('click', function (){
    document.getElementById('saludonavbar').innerHTML='USUARIOS';
});
$('#OffListadoProductos').on('click', function (){
    document.getElementById('saludonavbar').innerHTML='PRODUCTOS';
});
$('#OffRealizarIngreso').on('click', function (){
    document.getElementById('saludonavbar').innerHTML='REALIZAR INGRESO';
});
$('#OffClientes').on('click', function (){
    document.getElementById('saludonavbar').innerHTML='LISTADO DE CLIENTES';
});

$('#OffDetalleIngreso').on('click', function (){
    document.getElementById('saludonavbar').innerHTML='HISTORIAL DE INGRESO';
});

$('#OffVentas').on('click', function (){
    document.getElementById('saludonavbar').innerHTML='VENTAS';
});

$('#OffListadoProveedores').on('click', function (){
    document.getElementById('saludonavbar').innerHTML='PROVEEDORES';
});


