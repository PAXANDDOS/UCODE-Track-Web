<?php

class Controller_404 extends Controller
{
	function __construct()
	{
		$this->view = new View();
	}
	function action_index($data)
	{	
		$this->view->generate('404_view.php', 'template_view.php', $data);
	}
}

$data = null;
$temp = new Controller_404;
$temp->action_index($data);

?>