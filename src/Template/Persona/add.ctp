<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Registrar persona</h2>
        </div>
            <!-- Formulario -->
            <?= $this->Form->create($users) ?>
            <fieldset>
                <?php
                    echo $this->Form->input('per_cedula', array('type' => 'text', 'label' => 'Cedula', 'required' => 'required'));
                    echo $this->Form->input('per_nombre', array('label' => 'Nombre'));
                    echo $this->Form->input('per_apellido', array('label' => 'Apellido'));
                    ?><hr>
                    <?php 
                    echo $this->Form->input('users.username', array('label' => 'Usuario'));
                    echo $this->Form->input('users.password', array('label' => 'Contraseña'));
                    ?>             
            </fieldset>

            <?= $this->Form->button('Registrar') ?>
            <?= $this->Form->end() ?>
        
    </div>
</div>