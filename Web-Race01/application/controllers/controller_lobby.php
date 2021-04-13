<?php

class Controller_lobby extends Controller
{
	function __construct()
	{
		$this->view = new View();
	}
	function action_index($data)
	{	
		$this->view->generate('lobby_view.php', 'template_view.php', $data);
	}
}

if(!isset($_SESSION['login'])) {
	echo '<script>location.replace("/login");</script>';
}
else {
	$data = null;
	$temp = new Controller_lobby;
	$temp->action_index($data);
	if(isset($_POST['battleButton'])) {
		echo '<script>location.replace("/board");</script>';
	}
	else if(isset($_POST['avatarButton']))
		echo 'avatarButton';
	else if(isset($_POST['logoutButton'])) {
		session_unset();
		echo '<script>location.replace("/");</script>';
	}
}

?>