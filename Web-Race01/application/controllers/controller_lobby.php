<?php

require_once 'application/controllers/controller_database.php';
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
	if(isset($_POST['battleButton'])) {
		echo '<script>location.replace("/board");</script>';
	}
	else if(isset($_POST['avatarButton'])) {
		$heroes = new User();

		$directory = getcwd()."/assets/images/cards/";
		$filecount = 0;
		$files2 = glob( $directory ."*" );
		if($files2)
			$filecount = count($files2);
		$_SESSION['avatar'] = rand(1,$filecount);
		$heroes->updateAvatar($_SESSION['login'], $_SESSION['avatar']);

		$data = array(
			"avatar" => $_SESSION['avatar'],
			"totalGames" => $heroes->getTotalGames($_SESSION['login']),
			"totalWins" => $heroes->getTotalWins($_SESSION['login']),
			"totalLoses" => $heroes->getTotalLoses($_SESSION['login'])
		);
		$temp = new Controller_lobby;
		$temp->action_index($data);
	}
	else if(isset($_POST['logoutButton'])) {
		session_unset();
		echo '<script>location.replace("/");</script>';
	}
	else {
		$heroes = new User();
		$data = array(
			"avatar" => $_SESSION['avatar'],
			"totalGames" => $heroes->getTotalGames($_SESSION['login']),
			"totalWins" => $heroes->getTotalWins($_SESSION['login']),
			"totalLoses" => $heroes->getTotalLoses($_SESSION['login'])
		);
		$temp = new Controller_lobby;
		$temp->action_index($data);
	}
}

?>