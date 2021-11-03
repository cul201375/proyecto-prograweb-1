<div class="container-fluid contenedortotal">
    <div class="row">
        <div id="sidebar" class="sidebaritems active col-md-3 col-lg-2 d-md-block position-sticky pt-3 collapse">
            <div id="profileuser">
                <div id="userpic">
                    <img src="<?php 
                            if( $_SESSION['perfilusuario'] == null){ echo 'img/usersprofiles/nouser.png';} 
                            else {echo $_SESSION['perfilusuario'];}?>" alt="profileuser" width="150" heigth="150">
                </div>
                <div id="username">
                    <span id="idsaludo"><?php echo $_SESSION['nombre'];?></span>
                </div>
            </div>
            <ul class="sidebarlist">
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" aria-current="page" href="#" id="ListadoUsuarios"
                        onclick="CargarContenido('modules/usuarios/listadoUsuarios.php');">
                        <i class="fas fa-users icon-sibar"></i>
                        Usuarios
                    </a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" href="#" id="">
                        <i class="fas fa-chart-line icon-sibar"></i>Realizar venta</a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" href="#" id="">
                        <i class="fas fa-dollar-sign icon-sibar"></i>
                        Ventas</a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" href="#" id="">
                        <i class="far fa-address-book icon-sibar"></i>
                        Clientes</a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" href="#" id="">
                        <i class="fas fa-cart-plus icon-sibar"></i>
                        Ingreso de mercadería</a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" onclick="CargarContenido('modules/productos/listadoProductos.php');"
                        href="#" id="ListadoProductos">
                        <i class="fas fa-layer-group icon-sibar"></i>
                        Productos en tienda</a>
                </li>
            </ul>
        </div>
        <main id="contenedordepantallas" class="col-md-9 col-lg-10 px-md-4">
            <div id="contenedorPrincipal">
                <div id="separador"
                    style="height:700px; width: 100%; text-align: center; flex-direction: column; display: flex; justify-content: center; align-items: center;">
                    <img src="img/brand/seflogo.png" alt="brand">
                    <a href="http://localhost/soporte/informacion/sobre-nosotros.php" target="_blank"
                        rel="noopener noreferrer" style="color: red;">Contáctanos</a>
                </div>
            </div>
        </main>