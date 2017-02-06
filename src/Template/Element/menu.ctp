<nav class="navbar navbar-inverse nav-users">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapsed-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?= $this->Html->link('Home', ['controller' => 'Users', 'action' => 'home'], ['class' => 'navbar-brand']); ?>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><?= $this->Html->link('Listar personas', ['controller' => 'Persona', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link('Listar usuarios', ['controller' => 'Users', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link('Registrar persona', ['controller' => 'Persona', 'action' => 'add']); ?></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><?= $this->Html->link('Salir', array('controller' => 'Users', 'action' => 'logout')); ?></li>
                </ul>
            </div>
        </div>
</nav>