

<?= $this->Html->css('login.css') ?>


<div class="container" id="container">
	<div class="row">
	    
	    <?= $this->Flash->render('auth') ?>
        <?= $this->Flash->render() ?>
	    
	
		    
		
		
		<?= $this->Form->create(null, ['class' => 'form-signin mg-btm']) ?>
    	    <h3 class="heading-desc">Iniciar Sesión</h3>
	
		    <div class="main">	
        
			    <?= $this->Form->input('email', ['class' => 'form-control', 'placeholder' => 'Correo Electrónico', 'label' => false, 'required']) ?>
             
                <?= $this->Form->input('password', ['class' => 'form-control', 'placeholder' => 'Contraseña', 'label' => false, 'required']) ?>
	
		        <span class="clearfix"></span>	
            </div>
            
            
		<div class="login-footer">
		<div class="row">
                        <div class="col-xs-6 col-md-6">
                            <div class="left-section">
                            	<?= $this->Html->link("Registrarse", ['controller' => 'Users', 'action' => 'add']) ?>
								
							</div>
                        </div>
                        <div class="col-xs-6 col-md-6 pull-right">
                            <?= $this->Form->button('Acceder', ['class' => 'btn btn-large btn-success btn-block']) ?>
                            
                        </div>
                    </div>
		
		</div>
      <?= $this->Form->end() ?>
	</div>
</div>