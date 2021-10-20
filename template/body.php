<body>
    <header>
        <!--- inicio barra de navegacion-->
        <div>
            <nav class = "navbar navbar-expand-md navbar-dark backgroundnavbar flex-md-nowrap " >
                <div class = "container-fluid">
                    <button type="button" class="navbar-toggler" data-bs-toggle = "collapse" data-bs-target = "#sidebarMenu">
                        <span class = "navbar-toggler-icon"></span>
                    </button>
                    <a href = "#" class="navbar-brand">SISETEMA VENTAS</a>
                    <button type="button" class="navbar-toggler" data-bs-toggle = "collapse" data-bs-target = "#MenuNav">
                        <span class = "navbar-toggler-icon"></span>
                    </button>
                    <div id = "MenuNav" class="collapse navbar-collapse" >
                        <ul class="navbar-nav ms-3">
                            <li class="nav-item"><a class="nav-link" href="#"> Catalogo </a></li>
                            <li class="nav-item"><a class="nav-link" href="#"> Informacion </a></li>
                            <li class="nav-item"><a class="nav-link" href="#"> Ayuda </a></li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"> Soporte </a>
                                <ul class="dropdown-menu dropdown-menu-dark bg-dark">
                                    <li class="dropdown-item"><a class="nav-link" href="#"> Manual </a></li>
                                    <li class="dropdown-item"><a class="nav-link" href="#"> Técnico prencensial </a></li>
                                    <li class="dropdown-item"><a class="nav-link" href="#"> Técnico remoto </a></li>
                                </ul>    
                            </li>
                        </ul>
                        <form class="d-flex" style = "width: 100%; padding-right: 10px;">
                            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                        <button class = "botoncerrarsesion" type="button"><a href="modules/login/logoutController.php"> Cerrar Sesión</a></button>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--- fin barra de navegacion-->
    
