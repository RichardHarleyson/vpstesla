<?php

namespace application\controllers;

use application\core\Controller;

class Account_Controller extends Controller
{

	// Метод подключния кастомных стилей
	public function before(){
		$this->view->layout = 'custom';
	}

	public function loginAction(){
		// $this->view->redirect('/');
		if(!empty($_POST)){
			// debug($_POST);
			// $this->view->message('error', 'error text');
			$this->view->location('/');
		}
		$this->view->render('Login Page');
	}

	public function registerAction(){
		$this->view->render('Registration Page');
	}

}

 ?>
