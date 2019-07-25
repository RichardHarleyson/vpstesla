<?php

namespace application\core;

use application\core\View;

abstract class Controller
{
	public $route;
	public $view;
	public $acl;

	public function __construct($route)
	{
		$this->route = $route;
		// Проверка прав доступа
		// $_SESSION['admin'] = 1;
		// debug($this->checkAcl());
		if($this->checkAcl() == false){
			View::errorCode(403);
		}
		$this->view = new View($route);
		$this->model = $this->loadModel($route['controller']);
		// Для использования кастомных стилей
		// $this->before();
	}

	public function loadModel($name){
		$path = 'application\models\\'.ucfirst($name);
		if(class_exists($path)){
			return new $path;
		}else{
			echo 'No model <b>'.$name.'</b> found';
		}
	}

	public function checkAcl(){
		$this->acl = require 'application/config/access.php';
		if ($this->isAcl('all')){
			return true;
		}elseif (isset($_SESSION['admin']) and $this->isAcl('admin')){
			return true;
		}
		return false;
	}

	public function isAcl($key){
		return in_array($this->route['action'], $this->acl[$key]);
	}

}

 ?>
