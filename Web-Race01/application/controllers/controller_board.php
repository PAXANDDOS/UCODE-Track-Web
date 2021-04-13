<?php

class Controller_board extends Controller
{
	function __construct()
	{
		$this->view = new View();
	}
	function action_index($data)
	{	
		$this->view->generate('board_view.php', 'template_view.php', $data);
	}
}

$data = null;
$temp = new Controller_board;
$temp->action_index($data);

?>