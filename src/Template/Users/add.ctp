<?= $this->element('menu'); ?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Registrar usuario</h2>
        </div>
            <!-- Formulario -->
            <?= $this->Form->create($users) ?>
            <fieldset>
                <?php
                    echo $this->Form->input('username', array('type' => 'text', 'label' => 'Username', 'required' => 'required'));
                    echo $this->Form->input('password', array('label' => 'Contraseña'));
                    echo $this->Form->input('isAdmin', ['type' => 'checkbox'], array('label' => 'isAdmin'));
                    echo $this->Form->input('per_cedula', array('label' => 'Cedula'));
                ?>
            </fieldset>

            <?= $this->Form->button('Registrar') ?>
            <?= $this->Form->end() ?>
        
    </div>
</div>