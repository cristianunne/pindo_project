
<?= $this->Html->css('login') ?>



<div class="container">
			<div class="row main">
			    
			    <?= $this->Flash->render('auth') ?>
				<div class="main-login main-center">
				<h2>Inicio de Sessión</h2>
					<?= $this->Form->create(); ?>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Correo Electrónico</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<?= $this->Form->input('email', ['class' => 'form-control', 'placeholder' => 'Correo Electrónico', 'label' => false, 'required' ]) ?>
								</div>
							</div>
						</div>


						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Contraseña</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<?= $this->Form->input('password', ['class' => 'form-control', 'placeholder' => 'Contraseña', 'label' => false, 'required' ]) ?>
								</div>
							</div>
						</div>


						<div class="form-group ">
						    <?= $this->Form->button('Acceder', ['class' => 'btn btn-primary btn-lg btn-block login-button']) ?>
						    <!-- <$this->Html->link('Registrase', ['controller' => 'Users', 'action' => 'add'], ['class' => 'btn btn-danger btn-lg btn-block login-button']) ?>-->
						</div>
					<?= $this->Form->end() ?>
				</div>
			</div>
</div>