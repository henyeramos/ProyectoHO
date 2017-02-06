<?= $this->element('menu'); ?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Registros</h2>
        </div>

        <div class="table-responsive">
        	<table class="table table-striped table-hover">
        		<thead>
        			<tr>
        				<th scope="col"><?= $this->Paginator->sort('per_cedula', 'Cedula') ?></th>
		                <th scope="col"><?= $this->Paginator->sort('per_nombre', 'Nombre') ?></th>
		                <th scope="col"><?= $this->Paginator->sort('per_apellido', 'Apellido') ?></th>
		                <th>Acciones</th>
        			</tr>
        		</thead>

        		<tbody>
		            <?php foreach ($persona as $persona): ?>
		            <tr>
		                <td><?= $this->Number->format($persona->per_cedula, ['locale' => 'es_ES']) ?></td>
		                <td><?= h($persona->per_nombre) ?></td>
		                <td><?= h($persona->per_apellido) ?></td>
		                <td class="actions">
		                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $persona->per_cedula], ['class' => 'btn btn-sm btn-info']) ?>
		                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $persona->per_cedula], ['class' => 'btn btn-sm btn-info']) ?>
		                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $persona->per_cedula], ['class' => 'btn btn-sm btn-danger'], ['confirm' => __('Esta seguro que desea eliminar el registro # {0}?', $persona->per_cedula)]) ?>
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