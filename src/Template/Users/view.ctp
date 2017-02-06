<div class="well">
	<h2></h2>
	<br>

	<dl>
		<dt>Usuario</dt>
		<dd>
			<?= $user->username ?>
			&nbsp;
		</dd>
	</dl>
	<br>

	<dl>
		<dt>Administrador</dt>
		<dd>
			<?= $user->isAdmin ? 'Si' : 'No' ?>
		</dd>
	</dl>
	<br>

</div>