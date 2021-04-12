<?php

class Controller_Registration extends Controller
{
	function __construct()
	{
		$this->view = new View();
	}
	function action_index()
	{	
		$this->view->generate('registration_view.php', 'template_view.php');
	}
}

$temp = new Controller_Registration;
$temp->action_index();

?>