<?php

class Controller_Reminder extends Controller
{
	function __construct()
	{
		$this->view = new View();
	}
	function action_index()
	{	
		$this->view->generate('reminder_view.php', 'template_view.php');
	}
}

$temp = new Controller_Reminder;
$temp->action_index();

?>