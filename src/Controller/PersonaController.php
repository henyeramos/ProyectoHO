<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CIndex Controller
 *
 * @property \App\Model\Table\CIndexTable $CIndex
 */
class PersonaController extends AppController
{
	public function login()
	{
		if ($this->request->is('post'))
		{
			$user = $this->Auth->identify();

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

	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}

	public function home()
	{
		$this->render();
	}


	public function index()
	{
		//Limite de registros a mostrar
		$this->paginate = array(
		  'limit' => 3
		);

		//Paginacion
		$users = $this->paginate($this->Persona);
		$this->set('persona', $users);
	}

	public function view($name)
	{
		echo 'Aqui es donde iria el diseño de la vista, '.$name;
		exit();
	}

	public function add()
	{
		//Para crear una nueva entidad, Persona es el nombre de la tabla
		$users = $this->Persona->newEntity();

		//Validacion por POST, el request ayuda a manejar toda la peticion enviando los datos atraves del formulario hacia la accion add
		if ($this->request->is('post')) 
		{
			//Este debug se utiliza para verificar que los datos se estan enviando correctamente desde el formulario
			//debug($this->request->data);

			//Para validar correctamente los datos
			$users = $this->Persona->patchEntity($users, $this->request->data, [
                'associated' => [
                    'Users'
                ]
            ]);

			//$this->Persona->save($users) es el que se encarga de registrar en la base de datos
			if ($this->Persona->save($users, array('deep' => true))) 
			{
				//Lanzar mensaje de exito
				$this->Flash->success('Registro exitoso.');
				return $this->redirect(['controller' => 'Persona', 'action' => 'index']);
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
}
