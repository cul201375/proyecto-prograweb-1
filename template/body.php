<body>
    <header>
        <!--- inicio barra de navegacion-->
        <div>
            <nav class="navbar navbar-expand-md navbar-dark backgroundnavbar flex-md-nowrap ">
                <div class="container-fluid" style="flex-wrap:nowrap;">
                    <a type="button" class="navbar-toggler" data-bs-toggle="offcanvas" href="#offcanvasExample"
                        role="button">
                        <span class="navbar-toggler-icon"></span>
                    </a>
                    <div id="MenuNav" class="collapse navbar-collapse">
                        <a href="/proyecto/main.php" id="SISTEMAVENTAS"><img src="img/brand/brand.png" heigth="50"
                                width="40"></a>
                        <ul class="navbar-nav ms-3">
                            <li class="nav-item"><a class="nav-link"
                                    href="http://localhost/soporte/informacion/sobre-nosotros.php" target="_blank"
                                    rel="noopener noreferrer">Informacion</a></li>
                            <li class="nav-item"><a class="nav-link" href="https://es.wikipedia.org/wiki/Ayuda"
                                    target="_blank" rel="noopener noreferrer"> Ayuda </a></li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" role="button"
                                    data-bs-toggle="dropdown">Soporte</a>
                                <ul class="dropdown-menu dropdown-menu-dark bg-dark">
                                    <li class="dropdown-item"><a class="nav-link"
                                            href="http://localhost/soporte/manual/manual_del_sistema.html"
                                            target="_blank" rel="noopener noreferrer"> Manual </a></li>
                                    <li class="dropdown-item"><a class="nav-link"
                                            href="http://localhost/soporte/citas/precensial/cita.php" target="_blank"
                                            rel="noopener noreferrer"> Técnico prencensial </a></li>
                                    <li class="dropdown-item"><a class="nav-link"
                                            href="http://localhost/soporte/citas/remota/cita.php" target="_blank"
                                            rel="noopener noreferrer"> Técnico remoto </a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="container" style="width:100%; text-align: center; color: #ffffff;">
                        <h5 id="saludonavbar">BIENVENIDO</h5>
                    </div>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
        </div>
    </header>
    <!--- fin barra de navegacion-->
    <!--- inicio barra de navegacion offcanvas-->
    <div class="offcanvas offcanvas-start offcavas-config-perfil" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">MENU</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div id="sidebar" class="sidebaritems">
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
                        <a class="nav-link-sidebar" aria-current="page" href="#" id="OffListadoUsuarios"
                            onclick="CargarContenido('modules/usuarios/listadoUsuarios.php');"
                            data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="fas fa-users icon-sibar"></i>Usuarios
                        </a>
                    </li>
                    <li class="nav-item-sidebar">
                        <a class="nav-link-sidebar" href="#" id="OffVentas"
                            onclick="CargarContenido('modules/ventas/ListadoVentas.php');" data-bs-dismiss="offcanvas"
                            aria-label="Close">
                            <i class="far fa-chart-bar icon-sibar"></i>Ventas</a>
                    </li>
                    <li class="nav-item-sidebar">
                        <a class="nav-link-sidebar" href="#" id="OffClientes"
                            onclick="CargarContenido('modules/clientes/ListadoClientes.php');"
                            data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="far fa-address-book icon-sibar"></i>Clientes</a>
                    </li>
                    <li class="nav-item-sidebar">
                        <a class="nav-link-sidebar" href="#" id="OffRealizarIngreso"
                            onclick="CargarContenido('modules/ingresos/realizarIngreso.php');"
                            data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="fas fa-cart-plus icon-sibar"></i>Ingreso de mercadería</a>
                    </li>
                    <li class="nav-item-sidebar">
                        <a class="nav-link-sidebar" href="#" id="OffDetalleIngreso"
                            onclick="CargarContenido('modules/ingresos/listadoDetalleIngreso.php');"
                            data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="fas fa-receipt  icon-sibar"></i>Detalles de ingresos</a>
                    </li>
                    <li class="nav-item-sidebar">
                        <a class="nav-link-sidebar" onclick="CargarContenido('modules/productos/listadoProductos.php');"
                            href="#" id="OffListadoProductos" data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="fas fa-layer-group icon-sibar"></i>Productos</a>
                    </li>
                    <li class="nav-item-sidebar">
                        <a class="nav-link-sidebar"
                            onclick="CargarContenido('modules/proveedores/listadoProveedores.php');" href="#"
                            id="OffListadoProveedores" data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="fas fa-people-carry icon-sibar"></i>Proveedores</a>
                    </li>
                </ul>
            </div>
            <div>
                <button class="botoncerrarsesion" type="button">
                    <a href="modules/login/logoutController.php">
                        <i class="fas fa-sign-out-alt"></i>
                        Salir
                    </a>
                </button>
            </div>
        </div>
    </div>
    <!--- inicio barra de navegacion offcanvas-->