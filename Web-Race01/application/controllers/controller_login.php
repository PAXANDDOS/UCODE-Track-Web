<?php

require_once 'application/controllers/controller_database.php';
class Controller_Login extends Controller
{
	function __construct()
	{
		$this->view = new View();
	}
	function action_index($data)
	{	
		$this->view->generate('login_view.php', 'template_view.php', $data);
	}
}

function login($class, $data, $username, $password) {
	$heroes = new User();
	if(!$heroes->findUsername($username)) {
		$data = array(
			"error" => 'No such user registered!'
		);
		$class->action_index($data);
		return;
	}
	if(!$heroes->checkPass($username, $password)) {
		$data = array(
			"error" => 'Wrong password!'
		);
		$class->action_index($data);
		return;
	}

	$_SESSION['login'] = $username;
	$_SESSION['avatar'] = $heroes->getAvatar($username);
	echo '<script>location.replace("/lobby");</script>';
}

if(isset($_SESSION['login'])) {
	echo '<script>location.replace("/lobby");</script>';
}
else {
	$class = new Controller_Login;
	$data = null;
	
	if(isset($_POST['log'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		login($class, $data, $username, $password);
	}
	else
		$class->action_index($data);
}

?>