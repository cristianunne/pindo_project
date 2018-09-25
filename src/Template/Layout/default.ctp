<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'PINDO S.A.';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('font-awesome/css/font-awesome.min.css') ?>
    <?= $this->Html->css('bower_components/Ionicons/css/ionicons.min.css') ?>
    <?= $this->Html->css('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>
    <?= $this->Html->css('dist/css/AdminLTE.min.css') ?>
    <?= $this->Html->css('dist/css/skins/_all-skins.min.css') ?>
    <?= $this->Html->css('bower_components/morris.js/morris.css') ?>
    <?= $this->Html->css('bower_components/jvectormap/jquery-jvectormap.css') ?>
    <?= $this->Html->css('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>
    <?= $this->Html->css('bower_components/bootstrap-daterangepicker/daterangepicker.css') ?>
    <?= $this->Html->css('bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>
    
    
    
    <?= $this->Html->script('jquery-3.1.1.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>



    <?= $this->Html->script('bower_components/moment/min/moment.min.js') ?>
    <?= $this->Html->script('bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>
    <?= $this->Html->script('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>
    <?= $this->Html->script('bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>
    <?= $this->Html->script('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>
    <?= $this->Html->script('bower_components/fastclick/lib/fastclick.js') ?>
    <?= $this->Html->script('bower_components/fastclick/lib/fastclick.js') ?>
    <?= $this->Html->script('adminlte.min.js') ?>
    <?= $this->Html->script('datatables.net/js/jquery.dataTables.min.js') ?>
    <?= $this->Html->script('datatables.net-bs/js/dataTables.bootstrap.min.js') ?>

    <?= $this->Html->script('svg-with-js/js/fontawesome-all.js') ?>

  
    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body id="body">

    <div class="wrapper">
        
        <?= $this->fetch('content') ?>
         
    </div>
    <footer>
    </footer>
    
    
</body>
</html>
