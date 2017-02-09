<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Editar usuario</h2>
        </div>
            <!-- Formulario -->
            <?= $this->Form->create($user, ['novalidate']) ?>
            <fieldset>
                <?= $this->element('Users/fields') ?>
            </fieldset>

            <?= $this->Form->button('Modificar') ?>
            <?= $this->Form->end() ?>
        
    </div>
</div>