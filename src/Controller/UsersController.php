<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
	public function isAuthorized($user)
	{
		if (isset($user['isAdmin']) and $user['isAdmin'] === 0) {
			if (in_array($this->request->action, ['home', 'logout'])) {
				return true;
			}			
		}

		return parent::isAuthorized($user);
	}

	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}

	public function login()
	{	
		
		if ($this->request->is('POST'))
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

	public function index()
	{
		$users = $this->paginate($this->Users);
		$this->set('users', $users);
	}

	public function home()
	{
		$this->render();
	}

	public function add()
	{
		//Para crear una nueva entidad, Persona es el nombre de la tabla
		$users = $this->Users->newEntity();

		//Validacion por POST, el request ayuda a manejar toda la peticion enviando los datos atraves del formulario hacia la accion add
		if ($this->request->is('post')) 
		{
			//Este debug se utiliza para verificar que los datos se estan enviando correctamente desde el formulario
			//debug($this->request->data);

			//Para validar correctamente los datos
			$users = $this->Users->patchEntity($users, $this->request->data);

			//$this->Persona->save($users) es el que se encarga de registrar en la base de datos
			if ($this->Users->save($users)) 
			{
				//Lanzar mensaje de exito
				$this->Flash->success('Registro exitoso.');
				return $this->redirect(['controller' => 'Users', 'action' => 'add']);
			}
			else
			{
				//Lanzar mensaje de rror
				$this->Flash->success('Ha ocurrido un error durante el registro. Intente de nuevo.');
			}
		}

		//Para mandar la nueva entidad para crear el formulario
		$this->set(compact('users'));
	}

	public function prohibido()
	{
		$this->render();
	}
}
