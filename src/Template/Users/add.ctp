
<?= $this->Html->css('add.css') ?>

<div class="container">
			<div class="row main">
				<div class="main-login main-center">
				<h5>Información de registro</h5>
				
		
				    <?= $this->Form->create($user, ['novalidate']) ?>
					
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Nombre/s</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									 <?= $this->Form->input('firstname', ['class' => 'form-control', 'placeholder' => 'Nombre/s', 'label' => false, 'required']) ?>
									
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Apellido/s</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									 <?= $this->Form->input('lastname', ['class' => 'form-control', 'placeholder' => 'Apellido/s', 'label' => false, 'required']) ?>
									
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<?= $this->Form->input('email', ['value' => '', 'class' => 'form-control', 'placeholder' => 'Email', 'label' => false, 'required']) ?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Contraseña</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<?= $this->Form->input('password', ['value' => '', 'class' => 'form-control', 'placeholder' => 'password', 'label' => false, 'required']) ?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirme su Contraseña</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
										<?= $this->Form->input('password', ['value' => '', 'class' => 'form-control', 'placeholder' => 'password', 'label' => false, 'required', 'id' => 'pass_2', 'onchange' => 'myFunction()']) ?>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<?= $this->Form->button('Acceder', ['class' => 'btn btn-large btn-success btn-block', 'disabled' => 'disabled', 'id' => 'boton_submit']) ?>
						</div>
						
					 <?= $this->Form->end() ?>
				</div>
			</div>
		</div>


 <?= $this->Html->script('password_val.js') ?>