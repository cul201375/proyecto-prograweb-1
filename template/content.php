
    <div class="container-fluid contenedortotal">
        <div class = "row" >
            <div id = "sidebar" class="sidebaritems active col-md-3 col-lg-2 d-md-block position-sticky pt-3 collapse">
                    <div id = "profileuser">
                        <div id="userpic">
                            <img src="<?php 
                            if( $_SESSION['perfilusuario'] == null){ echo 'img/usersprofiles/nouser.png';} 
                            else {echo $_SESSION['perfilusuario'];}?>" 
                            alt = "profileuser" width = "150" heigth = "150">
                        </div>
                        <div id="username">
                            <span id = "idsaludo">Bienvenido <br><?php echo $_SESSION['nombre'];?></span>
                        </div>
                    </div>
                    <ul class="sidebarlist">
                        <li class="nav-item-sidebar">
                            <a class="nav-link-sidebar" aria-current="page" href="#"  
                            onclick="CargarContenido('modules/usuarios/listadoUsuarios.php');">
                            <i class="fas fa-users icon-sibar"></i>
                            Usuarios
                            </a>
                        </li>
                        <li class="nav-item-sidebar">
                            <a class="nav-link-sidebar" href="#">
                            <i class="fas fa-restroom icon-sibar"></i>Realizar venta</a>
                        </li>
                        <li class="nav-item-sidebar">
                            <a class="nav-link-sidebar" href="#">
                            <i class="fas fa-dollar-sign icon-sibar"></i>
                            Ventas</a>
                        </li>
                        <li class="nav-item-sidebar">
                            <a class="nav-link-sidebar" href="#">
                            <i class="far fa-address-book icon-sibar"></i>
                            Clientes</a>
                        </li>
                        <li class="nav-item-sidebar">
                            <a class="nav-link-sidebar" href="#">
                            <i class="fas fa-cart-plus icon-sibar"></i>
                            Ingreso</a>
                        </li>
                        <li class="nav-item-sidebar">
                            <a class="nav-link-sidebar" href="#">
                            <i class="fas fa-layer-group icon-sibar"></i>
                            Productos en tienda</a>
                        </li>
                    </ul>        
                </div>      
            <main id = "contenedordepantallas" class = "col-md-9 col-lg-10 px-md-4">
                <div id = "contenedorPrincipal">   
                </div>
            </main>