<?php
    echo $this->Form->input('username', array('type' => 'text', 'label' => 'Username', 'required' => 'required'));
    echo $this->Form->input('password', array('label' => 'Contraseña', 'value' => ''));
    echo $this->Form->input('user_cedula', array('label' => 'Cedula'));
?>