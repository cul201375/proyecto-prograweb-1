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
                        <i class="fas fa-users icon-sibar"></i>Usuarios
                    </a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" href="#" id="Ventas"
                        onclick="CargarContenido('modules/ventas/ListadoVentas.php');">
                        <i class="far fa-chart-bar icon-sibar"></i>Ventas</a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" href="#" id="Clientes"
                        onclick="CargarContenido('modules/clientes/ListadoClientes.php');">
                        <i class="far fa-address-book icon-sibar"></i>Clientes</a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" href="#" id="RealizarIngreso"
                        onclick="CargarContenido('modules/ingresos/realizarIngreso.php');">
                        <i class="fas fa-cart-plus icon-sibar"></i>Ingreso de mercadería</a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" href="#" id="DetalleIngreso"
                        onclick="CargarContenido('modules/ingresos/listadoDetalleIngreso.php');">
                        <i class="fas fa-receipt  icon-sibar"></i>Detalles de ingresos</a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" onclick="CargarContenido('modules/productos/listadoProductos.php');"
                        href="#" id="ListadoProductos">
                        <i class="fas fa-layer-group icon-sibar"></i>Productos</a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" onclick="CargarContenido('modules/proveedores/listadoProveedores.php');"
                        href="#" id="ListadoProveedores">
                        <i class="fas fa-people-carry icon-sibar"></i>Proveedores</a>
                </li>
            </ul>
            <div style="text-align:center;">
                <button class="botoncerrarsesion" type="button">
                    <a href="modules/login/logoutController.php" style="font-size: 20px;">
                        <i class="fas fa-sign-out-alt" style="font-size: 25px;"></i>
                        Salir
                    </a>
                </button>
            </div>
        </div>
        <main id="contenedordepantallas" class="col-md-9 col-lg-10 px-md-4">
            <div id="contenedorPrincipal">
                <div
                    style="height:700px; width: 100%; text-align: center; flex-direction: column; display: flex; justify-content: center; align-items: center; min-width: 400px;overflow-x: auto;">
                    <img src="img/brand/seflogo.png" alt="brand" width="300" height="300">
                    <a href="http://localhost/soporte/informacion/sobre-nosotros.php" target="_blank"
                        rel="noopener noreferrer" style="color: red;">Contáctanos</a>
                </div>
            </div>
        </main>