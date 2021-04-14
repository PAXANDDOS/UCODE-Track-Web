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

if(!isset($_SESSION['login'])) {
	echo '<script>location.replace("/login");</script>';
}
else {
	$data = array(
		"username" => $_SESSION['login'],
		"avatar" => $_SESSION['avatar'],
		"enemyUsername" => 'Bababoy', // Сюда юзернейм врага
		"enemyAvatar" => 6	// Сюда номер аватара врага	
	);
	$temp = new Controller_board;
	$temp->action_index($data);
}

?>