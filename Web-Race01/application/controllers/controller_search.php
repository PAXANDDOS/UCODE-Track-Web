<?php

class Controller_search extends Controller
{
	function __construct()
	{
		$this->view = new View();
	}
	function action_index($data)
	{	
		$this->view->generate('search_view.php', 'template_view.php', $data);
	}
}

if(!isset($_SESSION['login'])) {
	echo '<script>location.replace("/login");</script>';
}
else {
	if(isset($_POST['cancelSearch'])){
		/* Отменить поиск */
		echo '<script>location.replace("/lobby");</script>';
	}
	else {
		$data = null;
		$temp = new Controller_search;
		$temp->action_index($data);
	}
}

?>