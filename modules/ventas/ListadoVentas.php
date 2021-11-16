<?php
ob_start();
session_start();
if (!$_SESSION['idusuario']){
  header("location: ../../index.php");
}
include_once('../../include/functions.php');

  ob_end_flush();
?>
<link rel="stylesheet" href="css/contenedordeventas.css">
<div id="separador" style="height:25px; width: 100%;"></div>
<div class="maincontenedorventas">
    <div class="contenedorventas">
        <div style="display: flex; justify-content: space-between; flex-wrap:wrap;">
            <div class="infoleft-ventas">
                <div class="componente">
                    <div style="text-align: center;">
                        <H4>MOTIVACION PARA VENTAS</H4>
                    </div>
                    <iframe width="600" height="400" src="https://www.youtube.com/embed/2Iuuq5BtJmk"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <div class="componente">
                    <div style="text-align: center;">
                        <H4>METAS DE VENTA</H4>
                    </div>
                    <img src="https://www-cms.pipedriveassets.com/blog-assets/objetivos-de-ventas-tratos-cerrados.jpg"
                       width="600" height="400" class="img-fluid" alt="grafica de ventas">
                </div>
            </div>
            <div class="inforigth-ventas">
                <div class="componente historialventas">
                    <div style="text-align: center;">
                        <H4>HISTORIAL DE VENTAS</H4>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="componente" style="text-align: center;">
                    <H4>RENDIMIENTO DE VENTAS</H4>
                    <img src="https://www.forcemanager.com/wp-content/uploads/blog_Como_hacer_un_reporte_de_ventas6.png"
                        class="img-fluid" alt="grafica de ventas">
                </div>
            </div>
        </div>
    </div>
</div>