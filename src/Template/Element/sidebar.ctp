

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php echo $this->Html->image('avatar5.png', ["alt" => 'User Image' , "class" => 'img-circle user-image']) ?>
            </div>
            <div class="pull-left" id="info_user" style="padding: 5px 5px 5px 15px;line-height: 1;position: absolute;left: 55px; color: #ffffff;">
                <p> <?= $current_user['firstname']. " ". $current_user['lastname']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> En Línea</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->

        <ul class="sidebar-menu" data-widget="tree">

            <li class="header">ACCIONES</li>

            <li>

                  <?= $this->Html->link('<i class="fas fa-tachometer-alt"></i> Inicio', ['controller' => 'Index', 'action' => 'index'], [ 'escape' => false]) ?>
            </li>

            <li id="li_Empresa" class="treeview">
                <a href="#">
                    <i class="fa fa-home"></i> <span>Empresas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <?php

                        $session = $this->request->session();
                        $datos_sitio = $session->read('Auth.User.role');

                        if($datos_sitio === 'admin') {
                            ?>

                            <li class="active">
                                <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar Empresas', ['controller' => 'Empresa', 'action' => 'add', '?' => ['Accion' => 'Agregar Empresas', 'Categoria' => 'Empresa']], ['escape' => false]) ?>
                            </li>

                            <?php
                        }
                    ?>


                    <li class="active">
                         <?= $this->Html->link('<i class="fa fa-eye"></i> Ver Empresas', ['controller' => 'Empresa', 'action' => 'index', '?' => ['Accion' => 'Ver Empresas', 'Categoria' => 'Empresa']], ['escape' => false]) ?>
                     </li>
                </ul>

            </li>

             <li id="li_Rodales" class="treeview">
                <a href="#">
                    <i class="fa fa-tree"></i> <span>Rodales</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <?php

                        $session = $this->request->session();
                        $datos_sitio = $session->read('Auth.User.role');

                        if($datos_sitio === 'admin') {
                            ?>

                            <li class="active">
                                <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar Rodales', ['controller' => 'Rodales', 'action' => 'add', '?' => ['Accion' => 'Agregar Rodales', 'Categoria' => 'Rodales']], ['escape' => false]) ?>
                            </li>

                            <?php
                        }
                    ?>


                    <li class="active">
                         <?= $this->Html->link('<i class="fa fa-eye"></i> Ver Rodales', ['controller' => 'Rodales', 'action' => 'index', '?' => ['Accion' => 'Ver Rodales', 'Categoria' => 'Rodales']], ['escape' => false]) ?>
                     </li>

                </ul>

            </li>

            <li id="li_Emsefor" class="treeview">
                <a href="#">
                    <i class="fa fa-truck"></i> <span>Emsefor</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <?php

                        $session = $this->request->session();
                        $datos_sitio = $session->read('Auth.User.role');

                        if($datos_sitio === 'admin') {
                            ?>
                            <li class="active">
                                <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar Emsefor', ['controller' => 'Emsefor', 'action' => 'add', '?' => ['Accion' => 'Agregar Emsefor', 'Categoria' => 'Emsefor']], ['escape' => false]) ?>
                            </li>

                            <?php
                        }
                    ?>


                      <li class="active">
                         <?= $this->Html->link('<i class="fa fa-eye"></i> Ver Emsefor', ['controller' => 'Emsefor', 'action' => 'index', '?' => ['Accion' => 'Ver Emsefor', 'Categoria' => 'Emsefor']], ['escape' => false]) ?>
                     </li>

                </ul>

            </li>

            <li id="li_Maquinas" class="treeview">
                <a href="#">
                    <i class="fab fa-android"></i> <span>Maquinas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php
                        $session = $this->request->session();
                        $datos_sitio = $session->read('Auth.User.role');
                        if($datos_sitio === 'admin') {
                            ?>
                            <li class="active">
                                <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar Maquinas', ['controller' => 'Maquinas', 'action' => 'add', '?' => ['Accion' => 'Agregar Maquinas', 'Categoria' => 'Maquinas']], ['escape' => false]) ?>
                            </li>
                            <?php
                        }
                    ?>


                      <li class="active">
                         <?= $this->Html->link('<i class="fa fa-eye"></i> Ver Maquinas', ['controller' => 'Maquinas', 'action' => 'index', '?' => ['Accion' => 'Ver Maquinas', 'Categoria' => 'Maquinas']], ['escape' => false]) ?>
                     </li>

                </ul>

            </li>

             <li id="li_Sagpya" class="treeview">
                <a href="#">
                    <i class="fas fa-file-alt"></i> <span>Sagpya</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php
                        $session = $this->request->session();
                        $datos_sitio = $session->read('Auth.User.role');
                        if($datos_sitio === 'admin') {
                            ?>
                            <li class="active">
                                <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar Sagpya', ['controller' => 'Sagpyas', 'action' => 'add', '?' => ['Accion' => 'Agregar Sagpya', 'Categoria' => 'Sagpya']], ['escape' => false]) ?>
                            </li>
                            <?php
                        }
                    ?>


                      <li class="active">
                         <?= $this->Html->link('<i class="fa fa-eye"></i> Ver Sagpya', ['controller' => 'Sagpyas', 'action' => 'index', '?' => ['Accion' => 'Ver Sagpya', 'Categoria' => 'Sagpya']], ['escape' => false]) ?>
                     </li>

                </ul>

            </li>

            <li id="li_Procedencias" class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-th"></i> <span>Procedencias</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <?php
                        $session = $this->request->session();
                        $datos_sitio = $session->read('Auth.User.role');
                        if($datos_sitio === 'admin') {
                            ?>
                            <li class="active">
                                <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar Procedencias', ['controller' => 'Procedencias', 'action' => 'add', '?' => ['Accion' => 'Agregar Procedencias', 'Categoria' => 'Procedencias']], ['escape' => false]) ?>
                            </li>
                            <?php
                        }
                    ?>


                      <li class="active">
                         <?= $this->Html->link('<i class="fa fa-eye"></i> Ver Procedencias', ['controller' => 'Procedencias', 'action' => 'index', '?' => ['Accion' => 'Ver Procedencias', 'Categoria' => 'Procedencias']], ['escape' => false]) ?>
                     </li>

                </ul>

            </li>

            <li class="header">RELEVAMIENTOS</li>

            <li id="li_Procedencias" class="treeview">
                <a href="#">
                    <i class="fa fa-tree"></i> <span>Relevamientos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="active">
                        <?= $this->Html->link('<i class="fa fa-eye"></i> Ver Relevamientos', ['controller' => 'Relevamientos', 'action' => 'index', '?' => ['Accion' => 'Ver Relevamientos', 'Categoria' => 'Relevamientos']], ['escape' => false]) ?>
                    </li>

                </ul>

            </li>



            <li class="header">SIMULADORES</li>
             <li>

                  <?= $this->Html->link('<i class="fa fa-puzzle-piece"></i> Flor-Excel', ['controller' => 'Florexcel', 'action' => 'index', '?' =>
                      ['Accion' => 'Agregar Modelo', 'Categoria' => 'Florexcel']], [ 'escape' => false]) ?>
             </li>

            <li id="li_SIMNEA" class="treeview">
                <a href="#">
                    <i class="fa fa-qrcode"></i> <span>SIMNEA</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li class="active" >
                        <a href="#">
                            <i class="fas fa-superscript"></i> <span>Modelos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul>

                            <?php
                                $session = $this->request->session();
                                $datos_sitio = $session->read('Auth.User.role');
                                if($datos_sitio === 'admin') {
                                    ?>
                                    <li class="active">
                                        <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar Modelo', ['controller' => 'Modelos', 'action' => 'add', '?' => ['Accion' => 'Agregar Modelo', 'Categoria' => 'SIMNEA']], ['escape' => false]) ?>
                                    </li>
                                    <?php
                                }
                            ?>

                            <li class="active">
                                <?= $this->Html->link('<i class="fa fa-eye"></i> Ver Modelos', ['controller' => 'Modelos', 'action' => 'index', '?' => ['Accion' => 'Ver Modelos', 'Categoria' => 'SIMNEA']], ['escape' => false]) ?>
                            </li>
                        </ul>

                    </li>
                    <li class="active" >
                        <a href="#">
                            <i class="fas fa-calculator"></i> <span>Simular</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul>
                            <li class="active">
                                <?= $this->Html->link('<i class="fas fa-tasks"></i> Simular', ['controller' => 'Simnea', 'action' => 'simular', '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']], ['escape' => false]) ?>
                            </li>

                        </ul>

                    </li>

                    <li class="active" >
                        <a href="#">
                            <i class="fas fa-calculator"></i> <span>Resultados de Simulación</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul>
                            <li class="active">
                                <?= $this->Html->link('<i class="fab fa-adversal"></i> Resultados', ['controller' => 'Simulaciones', 'action' => 'index', '?' => ['Accion' => 'Ver Simulaciones', 'Categoria' => 'SIMNEA']], ['escape' => false]) ?>
                            </li>

                        </ul>

                    </li>

                </ul>


            </li>

            <li class="header">CONFIG. GENERALES</li>

            <li id="li_Laboral" class="treeview">
                <a href="#">
                    <i class="fas fa-dollar-sign"></i> <span>Laboral</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">

                    <li class="active" >
                        <a href="#">
                            <i class="fas fa-sitemap"></i> <span>Datos Laborales</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul>
                            <?php
                                $session = $this->request->session();
                                $datos_sitio = $session->read('Auth.User.role');
                                if($datos_sitio === 'admin') {
                                    ?>
                                    <li class="active">
                                        <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar/Editar', ['controller' => 'Laboral', 'action' => 'add', '?' => ['Accion' => 'Agregar Datos Laborales', 'Categoria' => 'Laboral']], ['escape' => false]) ?>
                                    </li>
                                    <?php
                                }
                            ?>


                            <li class="active">
                                <?= $this->Html->link('<i class="fa fa-eye"></i> Ver Datos Laborales', ['controller' => 'Laboral', 'action' => 'index', '?' => ['Accion' => 'Ver Datos Laborales', 'Categoria' => 'Laboral']], ['escape' => false]) ?>
                            </li>
                        </ul>

                    </li>




                </ul>
            </li>

            <li id="li_Operarios" class="treeview">
                <a href="#">
                    <i class="fas fa-users"></i> <span>Categorías de Operarios</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">

                    <?php
                        $session = $this->request->session();
                        $datos_sitio = $session->read('Auth.User.role');
                        if($datos_sitio === 'admin') {
                            ?>
                            <li class="active">
                                <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar Operarios', ['controller' => 'CatOperarios', 'action' => 'add', '?' => ['Accion' => 'Agregar Categorías de Operarios', 'Categoria' => 'Operarios']], ['escape' => false]) ?>
                            </li>
                            <?php
                        }
                    ?>


                    <li class="active">
                        <?= $this->Html->link('<i class="fa fa-eye"></i> Ver Operarios', ['controller' => 'CatOperarios', 'action' => 'index', '?' => ['Accion' => 'Ver Categorias de Operarios', 'Categoria' => 'Operarios']], ['escape' => false]) ?>
                    </li>

                </ul>
            </li>

            <li id="li_Insumos" class="treeview">
                <a href="#">
                    <i class="fas fa-money-bill-alt"></i> <span>Precios de Insumos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">

                    <?php
                        $session = $this->request->session();
                        $datos_sitio = $session->read('Auth.User.role');
                        if($datos_sitio === 'admin') {
                            ?>
                            <li class="active">
                                <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar/Editar', ['controller' => 'Insumos', 'action' => 'add', '?' => ['Accion' => 'Agregar Precios de Insumos', 'Categoria' => 'Insumos']], ['escape' => false]) ?>
                            </li>
                            <?php
                        }
                    ?>


                    <li class="active">
                        <?= $this->Html->link('<i class="fa fa-eye"></i> Ver Precios', ['controller' => 'Insumos', 'action' => 'index', '?' => ['Accion' => 'Ver Precios de Insumos', 'Categoria' => 'Insumos']], ['escape' => false]) ?>
                    </li>

                </ul>
            </li>


            <li class="header">ADMINISTRACION</li>

            <li id="li_Administracion" class="treeview">
                <a href="#">
                    <i class="fas fa-money-bill-alt"></i> <span>Filtro de Rodales</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li class="active">
                        <?= $this->Html->link('<i class="fa fa-eye"></i> Ver', ['controller' => 'Administracion', 'action' => 'index', '?' => ['Accion' => 'Filtro de Rodales', 'Categoria' => 'Administracion']], ['escape' => false]) ?>
                    </li>

                    <?php
                        $session = $this->request->session();
                        $datos_sitio = $session->read('Auth.User.role');
                        if($datos_sitio === 'admin') {
                            ?>
                            <li class="active">
                                <?= $this->Html->link('<i class="fa fa-fw fa-cog"></i> Configuración', ['controller' => 'Administracion', 'action' => 'config', '?' => ['Accion' => 'Filtro de Rodales', 'Categoria' => 'Administracion']], ['escape' => false]) ?>
                            </li>
                            <?php
                        }
                    ?>


                </ul>


            </li>


            <!--Recupero las cookies y verifico que el rol sea ADMIN-->
            <?php

                $session = $this->request->session();
                $datos_sitio = $session->read('Auth.User.role');

                if($datos_sitio === 'admin') {
                    ?>

                    <li class="header">USUARIOS</li>

                    <li id="li_Usuarios">

                        <?= $this->Html->link('<i class="fa fa-users"></i> Ver Usuarios', ['controller' => 'AdministracionUsuarios', 'action' => 'index', '?' =>
                            ['Accion' => 'Administrar Usuarios', 'Categoria' => 'AdministracionUsuarios']], ['escape' => false]) ?>
                    </li>

                    <?php
                }
            ?>

            <!--Recupero las cookies y verifico que el rol sea ADMIN-->
            <?php

                $session = $this->request->session();
                $datos_sitio = $session->read('Auth.User.role');

                if($datos_sitio === 'admin') {
                    ?>

                    <li id="li_Mapa" class="treeview">
                        <a href="#">
                            <i class="fa fa-map"></i> <span>Mapa</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>

                        <ul class="treeview-menu">

                            <?php
                                $session = $this->request->session();
                                $datos_sitio = $session->read('Auth.User.role');
                                if($datos_sitio === 'admin') {
                                    ?>
                                    <li class="active">
                                        <?= $this->Html->link('<i class="fa fa-eye"></i> Ver Configuraciones', ['controller' => 'MapConfig', 'action' => 'index', '?' => ['Accion' => 'Ver Configuraciones de Mapa',
                                            'Categoria' => 'Mapa']], ['escape' => false]) ?>
                                    </li>
                                    <?php
                                }
                            ?>


                            <li class="active">
                                <?= $this->Html->link('<i class="fa fa-edit"></i> Editar Configuraciones', ['controller' => 'MapConfig', 'action' => 'add', '?' => ['Accion' => 'Editar Configuraciones de Mapa',
                                    'Categoria' => 'Mapa']], ['escape' => false]) ?>
                            </li>

                            <li class="active">
                                <?= $this->Html->link('<i class="fas fa-dot-circle"></i> Capas Base', ['controller' => 'Capasbase', 'action' => 'index', '?' => ['Accion' => 'Ver Capas Base',
                                    'Categoria' => 'Mapa']], ['escape' => false]) ?>
                            </li>

                            <li class="active" >
                                <a href="#">
                                    <i class="fas fa-chess-board"></i></i> <span>Layers</span>
                                    <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                                </a>
                                <ul>


                                    <li class="active">
                                        <?= $this->Html->link('<i class="fa fa-eye"></i> Ver Configuración', ['controller' => 'Layersconfigstyle', 'action' => 'index', '?' => ['Accion' => 'Agregar Modelo', 'Categoria' => 'SIMNEA']], ['escape' => false]) ?>
                                    </li>

                                </ul>

                            </li>



                        </ul>
                    </li>


                    <?php
                }
            ?>



        </ul>


    </section>
<!-- /.sidebar -->
</aside>