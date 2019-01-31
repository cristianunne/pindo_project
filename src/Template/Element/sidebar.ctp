

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php echo $this->Html->image('avatar5.png', ["alt" => 'User Image' , "class" => 'img-circle user-image']) ?>
            </div>
            <div class="pull-left info">
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
                    <li class="active">
                         <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar Empresas', ['controller' => 'Empresa', 'action' => 'add', '?' => ['Accion' => 'Agregar Empresas', 'Categoria' => 'Empresa']], ['escape' => false]) ?>
                     </li>
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
                     <li class="active">
                         <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar Rodales', ['controller' => 'Rodales', 'action' => 'add', '?' => ['Accion' => 'Agregar Rodales', 'Categoria' => 'Rodales']], ['escape' => false]) ?>
                     </li>

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
                     <li class="active">
                         <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar Emsefor', ['controller' => 'Emsefor', 'action' => 'add', '?' => ['Accion' => 'Agregar Emsefor', 'Categoria' => 'Emsefor']], ['escape' => false]) ?>
                     </li>

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
                     <li class="active">
                         <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar Maquinas', ['controller' => 'Maquinas', 'action' => 'add', '?' => ['Accion' => 'Agregar Maquinas', 'Categoria' => 'Maquinas']], ['escape' => false]) ?>
                     </li>

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
                     <li class="active">
                         <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar Sagpya', ['controller' => 'Sagpyas', 'action' => 'add', '?' => ['Accion' => 'Agregar Sagpya', 'Categoria' => 'Sagpya']], ['escape' => false]) ?>
                     </li>

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
                     <li class="active">
                         <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar Procedencias', ['controller' => 'Procedencias', 'action' => 'add', '?' => ['Accion' => 'Agregar Procedencias', 'Categoria' => 'Procedencias']], ['escape' => false]) ?>
                     </li>

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
                            <li class="active">
                                <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar Modelo', ['controller' => 'Modelos', 'action' => 'add', '?' => ['Accion' => 'Agregar Modelo', 'Categoria' => 'SIMNEA']], ['escape' => false]) ?>
                            </li>
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

            <li class="header">ADMINISTRACIÓN</li>

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
                            <li class="active">
                                <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar/Editar', ['controller' => 'Laboral', 'action' => 'add', '?' => ['Accion' => 'Agregar Datos Laborales', 'Categoria' => 'Laboral']], ['escape' => false]) ?>
                            </li>

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
                    <li class="active">
                        <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar Operarios', ['controller' => 'CatOperarios', 'action' => 'add', '?' => ['Accion' => 'Agregar Categorías de Operarios', 'Categoria' => 'Operarios']], ['escape' => false]) ?>
                    </li>

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
                    <li class="active">
                        <?= $this->Html->link('<i class="fa fa-plus"></i> Agregar/Editar', ['controller' => 'Insumos', 'action' => 'add', '?' => ['Accion' => 'Agregar Precios de Insumos', 'Categoria' => 'Insumos']], ['escape' => false]) ?>
                    </li>

                    <li class="active">
                        <?= $this->Html->link('<i class="fa fa-eye"></i> Ver Precios', ['controller' => 'Insumos', 'action' => 'index', '?' => ['Accion' => 'Ver Precios de Insumos', 'Categoria' => 'Insumos']], ['escape' => false]) ?>
                    </li>

                </ul>
            </li>


        </ul>


    </section>
<!-- /.sidebar -->
</aside>