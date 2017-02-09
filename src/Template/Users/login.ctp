<div class = "container">
            <div class="wrapper">
                <?= $this->Flash->render('auth'); ?>
                <?= $this->Form->create(null, ['class' => 'form-signin']) ?>

                    <div class="row text-center bol"><i class="glyphicon glyphicon-stop"></i></div>
                    <h3 class="form-signin-heading img-responsive text-center">
                        <img id="logo" src="img/inv.png" alt=""/>
                        <div class="caption">
                          <p>Proyecto HR</p>
                          <p class="subtitulo">Control de Inventario</p>
                        </div>
                    </h3>
                    <hr class="spartan">
                    <!-- Campo Username -->
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <?= $this->Form->input('username', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Username', 'required', 'label' => false));?>                        
                    </div>
					
					<!-- Campo de contraseña -->
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1">
                            <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <?= $this->Form->input('password', array('type' => 'password', 'class' => 'form-control', 'placeholder' => 'Contraseña', 'required', 'label' => false));?>

                    </div>
                    <?= $this->Form->button('Ingresar', ['class' => 'btn btn-lg btn-primary btn-block']) ?>

                    <?= $this->Form->end(); ?>
                </form>     
            </div>
</div>