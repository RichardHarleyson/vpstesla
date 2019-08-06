<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\db;

class Main_Controller extends Controller
{
	public function indexAction(){		
		$this->view->render('VPSTESLA');
	}


}

 ?>
