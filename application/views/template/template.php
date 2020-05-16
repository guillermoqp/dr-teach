<!DOCTYPE html>
<html lang="es_ES">
    <!-- header: Importa CSS, JS de Plantilla Base-->
    <?php $this->load->view("template/include/header"); ?>
    <body class="page-loading">
        <!-- preloader: Carga de la Pagina  -->
        <?php $this->load->view("template/include/preloader"); ?>
        <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
            <div id="sidebar-alt">
                <div class="sidebar-scroll">
                    <div class="sidebar-content">Notificaciones
                    <?php print($this->config->item("codigoSistema")) ?></div>
                </div>
            </div>
            <div id="sidebar">
                <div class="sidebar-scroll">
                    <div class="sidebar-content">
                    	<!-- Datos del Usuario -->
                        <?php $this->load->view("template/include/menuSuperior"); ?>
                        <!-- menu -->
                        <?php $this->load->view("template/include/menu"); ?>
                    </div>
                </div>
            </div>
            <!-- Contenido Principal  -->
            <div id="main-container">
                <header class="navbar navbar-default">
                    <!-- Configuraciones de la Vista -->
                    <?php $this->load->view("template/include/configTemplate"); ?>
                    <!-- Configuraciones del Usuario en session  -->
                    <?php $this->load->view("template/include/configUser"); ?>
                </header>
                <div id="page-content">
                    <!-- breadcrumb : Datos de la Navegacion -->
                	<?php $this->load->view("template/include/breadcrumb"); ?>
                	<!-- Vistas Dinamicas : Vistas de Cada Controlador -->
                    <?php if (isset($view)){ $this->load->view($view); } ?>
                </div>
                <!-- footer : Datos de Aplicacion -->
                <?php $this->load->view("template/include/footer"); ?>
            </div>
        </div>
        <!-- to-top : Ir arriba -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>
        <!-- scriptsFooter: Importa JS de Plantilla Base y Funcionalidades -->
        <?php $this->load->view("template/include/scriptsFooter"); ?>
    </body>
</html>