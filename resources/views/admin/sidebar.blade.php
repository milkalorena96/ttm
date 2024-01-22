
<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <!-- Sidenav Menu Heading (Cuenta)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <div class="sidenav-menu-heading d-sm-none">Cuenta</div>
                <!-- Sidenav Link (Messages)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i data-feather="mail"></i></div>
                    Mensajes
                    <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                </a>
                <!-- Sidenav Menu Heading (admin)-->
                <div class="sidenav-menu-heading">Administacion</div>
                <!-- Sidenav Link (Blogs)-->
                <li class="nav-item">
                    <a class="nav-link" href="/admin/categoria">
                        <div class="nav-link-icon"><i data-feather="book"></i></div>
                        Lugares por Categoria
                    </a>
                </li>
                <!-- Sidenav Accordion (Lugares turisticos)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                    <div class="nav-link-icon"><i data-feather="home"></i></div>
                    Restaurant y Hoteles
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseDashboards" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/hotel">Hoteles</a>
                            <a class="nav-link" href="/admin/restaurante">Restaurantes</a>
                        </li>
                    </nav>
                </div>
                <!-- Sidenav Link (Carrusel)-->
                <li class="nav-item">
                    <a class="nav-link" href="/admin/carrusel">
                        <div class="nav-link-icon"><i data-feather="grid"></i></div>
                        Carrusel
                    </a>
                </li>
                <!-- Sidenav Link (Blogs)-->
                <li class="nav-item">
                    <a class="nav-link" href="/admin/post">
                        <div class="nav-link-icon"><i data-feather="book"></i></div>
                        Blog
                    </a>
                </li>
                <!-- Sidenav Link (Correo)-->
                <li class="nav-item">
                    <a class="nav-link" href="/admin/correo">
                        <div class="nav-link-icon"><i data-feather="mail"></i></div>
                        Correo
                    </a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Sidenav Heading (Configuracion)-->
                <div class="sidenav-menu-heading">Configuraciones</div>

                <!-- Sidenav Link (usuario)-->
                <li class="nav-item">
                    <a class="nav-link" href="/admin/user">
                        <div class="nav-link-icon"><i data-feather="user"></i></div>
                        Usuario
                    </a>
                </li>
                <!-- Sidenav Link (configuracion)-->
                <li class="nav-item">
                    <a class="nav-link" href="/admin/configuracion">
                        <div class="nav-link-icon"><i data-feather="tool"></i></div>
                        Configuracion
                    </a>
                </li>
            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Conectado como:</div>
                <div class="sidenav-footer-title">{{Auth::user()->name}}</div>
            </div>
        </div>
    </nav>
</div>    
    