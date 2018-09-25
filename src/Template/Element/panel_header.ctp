

 <?= $this->Html->css('panel_header.css') ?>
 <!-- Content Header (Page header) -->
<section class="content-header">

    <!-- Agregp un condicional para saber que hacer -->
    <?php if($categoria == 'Empresa'):  ?>

      <h1>
        Empresas
        <small>Manejo de Empresas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Empresas</a></li>

        <li class="active"><?php echo $action ?></li>
      </ol>

      <?php endif ?>

      <?php if($categoria == 'Rodales'):  ?>

      <h1>
        Rodales
        <small>Manejo de Rodales</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tree"></i> Rodales</a></li>

        <li class="active"><?php echo $action ?></li>
      </ol>

      <?php endif ?>

      <?php if($categoria == 'Emsefor'):  ?>

      <h1>
        Emsefor
        <small>Manejo de Emsefor</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-truck"></i> Emsefor</a></li>

        <li class="active"><?php echo $action ?></li>
      </ol>

      <?php endif ?>

      <?php if($categoria == 'Maquinas'):  ?>

      <h1>
        Maquinas
        <small>Manejo de Maquinas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-truck"></i> Maquinas</a></li>

        <li class="active"><?php echo $action ?></li>
      </ol>

      <?php endif ?>

       <?php if($categoria == 'Sagpya'):  ?>

      <h1>
        Sagpya
        <small>Manejo de Sagpya</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-fw fa-file-text"></i> Sagpya</a></li>

        <li class="active"><?php echo $action ?></li>
      </ol>

      <?php endif ?>

      <?php if($categoria == 'Procedencias'):  ?>

      <h1>
        Procedencias
        <small>Manejo de Procedencias</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-fw fa-th"></i> Procedencias</a></li>

        <li class="active"><?php echo $action ?></li>
      </ol>

      <?php endif ?>

    <?php if($categoria == 'SIMNEA'):  ?>

        <h1>
            SIMNEA
            <small>Manejo de SIMNEA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-qrcode"></i> SIMNEA</a></li>

            <li class="active"><?php echo $action ?></li>
        </ol>

    <?php endif ?>

    <?php if($categoria == 'Laboral'):  ?>

        <h1>
            Categorías
            <small>Manejo de Datos Laborales</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fas fa-sitemap"></i> LABORALES</a></li>

            <li class="active"><?php echo $action ?></li>
        </ol>

    <?php endif ?>

    <?php if($categoria == 'Operarios'):  ?>

        <h1>
            Categorías
            <small>Manejo de Operarios</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fas fa-users"></i> OPERARIOS</a></li>

            <li class="active"><?php echo $action ?></li>
        </ol>

    <?php endif ?>

    <?php if($categoria == 'Insumos'):  ?>

        <h1>
            Insumos
            <small>Manejo de Precios</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fas fa-money-bill-alt"></i> INSUMOS</a></li>

            <li class="active"><?php echo $action ?></li>
        </ol>

    <?php endif ?>



</section>
