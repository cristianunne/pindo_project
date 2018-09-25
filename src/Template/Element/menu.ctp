<nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <?= $this->Html->link('Usuarios', ['controller' => 'Users', 'action' => 'index'], ['class' => 'navbar-brand']) ?>
          
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          
          <?php if(isset($current_user)): ?>
            <?php if($current_user['role'] == 'admin'):  ?>
              <ul class="nav navbar-nav">
                <li><?= $this->Html->link('Listar usuarios', ['controller' => 'Users', 'action' => 'index']) ?></li>
                <li><li><?= $this->Html->link('Agregar usuarios', ['controller' => 'Users', 'action' => 'add']) ?></li></li>
                <li><a href="#contact">Contact</a></li>
              </ul>
            <?php endif; ?>
              <ul class="nav navbar-nav navbar-right">
                <li>
                  <?= $this->Html->link('Salir', ['controller' => 'Users', 'action' => 'logout']) ?>
                  
                </li>
              </ul>

          
          <?php else: ?>
          
            <ul class="nav navbar-nav navbar-right">
            <li>
              <?= $this->Html->link('Registrarse', ['controller' => 'Users', 'action' => 'add']) ?>
              
            </li>
          </ul>
          <?php endif; ?>
          
        </div><!--/.nav-collapse -->
      </div>
</nav>