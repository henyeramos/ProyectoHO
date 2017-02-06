<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Login Controller
 *
 * @property \App\Model\Table\LoginTable $Login
 */
class LoginController extends AppController
{

	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}

	public function login()
	{	
		$this->loadModel('Users');
		
		if ($this->request->is('post'))
		{
			//identify verifica los datos que ingreso el usuario
			$user = $this->Auth->identify();

			//Condicional para verificar si los datos ingresados son corretos
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			else
			{
				$this->Flash->error('Datos invalidos, por favor intente de nuevo', ['key' => 'auth']);
			}
		}
	}
}
