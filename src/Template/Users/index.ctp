<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Registros</h2>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id_user', 'ID') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('username', 'Usuario') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('user_cedula', 'Cedula') ?></th>
                        <th scope="col" class="actions"><?= __('Acciones') ?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id_user) ?></td>
                        <td><?= h($user->username) ?></td>
                        <td><?= $this->Number->format($user->user_cedula, ['locale' => 'es_ES']) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id_user], ['class' => 'btn btn-sm btn-info']) ?>
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id_user], ['class' => 'btn btn-sm btn-info']) ?>
                            <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $user->id_user], ['confirm' => __('Esta seguro que desea eliminar al usuario bajo el numero de cedula {0}?', $user->user_cedula), 'class' => 'btn btn-sm btn-danger']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('Primera')) ?>
                <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
                <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
                <?= $this->Paginator->last(__('Ultima') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} en total')]) ?></p>
        </div>

    </div>
</div>