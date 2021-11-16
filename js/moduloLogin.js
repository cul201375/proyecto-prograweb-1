$('#btnLogin').on('click', function () {
    var user = $("#user").val();
    var password = $("#clave").val();
    console.log(user + password);
    $.ajax({
        type: 'POST',
        data: 'user='+user+'&clave='+password,
        url: 'modules/login/loginController.php',
        dataType: 'json',
        success: function (data) {
          result = data.resultado;
          if(result === 0){
            swal("ERROR", "CREDENCIALES INVALIDAS", "error");
          }
          else
          {
            window.location.href = "/proyecto/main.php";
          }
          },
    });
});