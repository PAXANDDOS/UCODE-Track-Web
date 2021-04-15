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
	if(isset($_POST['cancelSearch'])){
		/* Отменить поиск */
		echo '<script>location.replace("/lobby");</script>';
	}
	$data = array(
		"username" => $_SESSION['login'],
		"avatar" => $_SESSION['avatar'],
		"enemyUsername" => 'Bababoy', // Сюда юзернейм врага
		"enemyAvatar" => 6	// Сюда номер аватара врага	
	);
	setcookie('login', $_SESSION['login'], time() + (10), "/");
	setcookie('avatar', $_SESSION['avatar'], time() + (10), "/");
	$temp = new Controller_board;
	$temp->action_index($data);
}

?>