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
