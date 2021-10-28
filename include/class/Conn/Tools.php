<?php 
    class Tool{
        function conectar(){
            
            $conexion = mysqli_connect(SERVER, USER, PASS, DB);

            if($conexion){
                
            }
            else{
                echo 'Ha sucedio un error inesperado debido al siguiente <br>'.myslql1_connect_error();
            }
            mysqli_query($conexion, "SET NAME 'utf8'");
            mysqli_set_charset($conexion, "utf8");
            return $conexion;
        }
        function desconectar($conexion){
            $close = mysqli_close($conexion);
            if($close){
                
            }else{
                echo 'ha sucedido un error tratando de desconectarse <br>';
            }
            return $close;
        }

        function conectarftp(){
            $conn_id = ftp_connect(SERVERFTP);

            $login_result = ftp_login($conn_id, USERFTP, PASSFTP);

            if((!$login_result) || (!$conn_id)){
                return 0;
                exit;
            }
            else{
                ftp_pasv ($conn_id, true);
                ftp_chdir($cid, "img/usersprofiles");
                return $conn_id;
            }
        }
    }

?>