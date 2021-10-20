    <div class="container-fluid contenedortotal">
        <div class = "row" >
            <nav id="sidebarMenu" class="navbar navbar-expand-md navbar-dark col-md-3 col-lg-2 d-md-block backgroundsidebar sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item-sidebar">
                            <i class="fas fa-users icon-sibar"></i>
                            <a class="nav-link-sidebar" aria-current="page" href="#"  
                            onclick="CargarContenido('modules/usuarios/listadoUsuarios.php');">
                            Usuarios
                            </a>
                        </li>
                        <li class="nav-item-sidebar">
                            <i class="fas fa-restroom icon-sibar"></i>
                            <a class="nav-link-sidebar" href="#">Realizar venta</a>
                        </li>
                        <li class="nav-item-sidebar">
                            <i class="fas fa-dollar-sign icon-sibar"></i>
                            <a class="nav-link-sidebar" href="#">Ventas</a>
                        </li>
                        <li class="nav-item-sidebar">
                            <i class="far fa-address-book icon-sibar"></i>
                            <a class="nav-link-sidebar" href="#">Clientes</a>
                        </li>
                        <li class="nav-item-sidebar">
                            <i class="far fa-address-book icon-sibar"></i>
                            <a class="nav-link-sidebar" href="#">Ingreso</a>
                        </li>
                        <li class="nav-item-sidebar">
                            <i class="far fa-address-book icon-sibar"></i>
                            <a class="nav-link-sidebar" href="#">Productos en tienda</a>
                        </li>
                    </ul>        
                </div>
            </nav>
            <main id = "contenedordepantallas" class = "col-md-9 col-lg-10 px-md-4">
                <div id = "contenedorPrincipal">   
                </div>
            </main>
            <footer class="text-center text-white footerbordertop">
                <div class="container p-1 pb-0">
                    <section class="mb-1">
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                        ><i class="fab fa-facebook-f"></i
                    ></a>

                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                        ><i class="fab fa-twitter"></i
                    ></a>

                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                        ><i class="fab fa-google"></i
                    ></a>

                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                        ><i class="fab fa-instagram"></i
                    ></a>

                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                        ><i class="fab fa-linkedin-in"></i
                    ></a>

                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                        ><i class="fab fa-github"></i
                    ></a>
                    <div class="text-center p-1">
                    © 2021 Copyright:
                        <a class="text-white" href="#" style = "text-decoration: none; hover{cursor: poiner;}">SISTEMA VENTAS by Emanuel Castillo</a>
                    </div>
                    </section>
                </div>
        </footer>
        </div>
    </div>
    <script src="js/moduloUsuarios6.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    </body>
</html>