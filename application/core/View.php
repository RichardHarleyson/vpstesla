<?php

namespace application\core;

class View
{
	public $path;
	public $route;
	public $layout = 'default';

	public function __construct($route){
		$this->route = $route;
		$this->path = $this->route['controller'].'/'.$this->route['action'];
	}

	public function render($title, $vars = []){
		$path = 'application/views/'.$this->path.'.php';
		extract($vars);
		if(file_exists($path)){
			ob_start();
			require $path;
			$content = ob_get_clean();
			require 'application/views/layouts/'.$this->layout.'.php';
		}else{
		echo 'View <b>'.$path.'</b> not found';
		}
	}

	public function redirect($url){
		header('location: /mvc_new'.$url);
		exit;
	}

	public static function errorCode($code){
		http_response_code($code);
		$path = 'application/views/errors/'.$code.'.php';
		if(file_exists($path)){
				require $path;
		}
		exit;
	}

	public function message($status, $message){
		exit(json_encode(['status'=> $status, 'message'=> $message]));
	}

	public function location($url){
		exit(json_encode(['url'=> $url]));
	}


}

 ?>
