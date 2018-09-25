<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Crear Usuario</h2>
        </div>

    
        <div class="row">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <?php
                    echo $this->Form->input('firstname');
                    echo $this->Form->input('lastname');
                    echo $this->Form->input('email');
                    echo $this->Form->input('password');
                  
                ?>
            </fieldset>
            <?= $this->Form->button(__('Crear Usuario'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>



