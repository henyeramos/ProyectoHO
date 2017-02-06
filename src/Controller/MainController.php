<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Main Controller
 *
 * @property \App\Model\Table\MainTable $Main
 */
class MainController extends AppController
{
	public function index()
	{
		$this->render();
	}
}
