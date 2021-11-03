<body>
    <header>
        <!--- inicio barra de navegacion-->
        <div>
            <nav class="navbar navbar-expand-md navbar-dark backgroundnavbar flex-md-nowrap ">
                <div class="container-fluid">
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#sidebar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a href="/proyecto/main.php" id = "SISTEMAVENTAS"><img src="img/brand/brand.png" heigth="50" width="40"></a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="MenuNav" class="collapse navbar-collapse">
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
                        <div class="container" style="width: 60%; text-align: center; color: #ffffff;">
                            <h5 id = "saludonavbar">BIENVENIDO</h5>
                        </div>
                        <button class="botoncerrarsesion" type="button">
                            <a href="modules/login/logoutController.php" style = "font-size: 20px;">
                                <i class="fas fa-sign-out-alt" style="font-size: 25px;"></i>
                                Salir
                            </a>
                        </button>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--- fin barra de navegacion-->