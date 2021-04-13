<?php

require_once 'application/controllers/controller_database.php';
class Controller_Registration extends Controller
{
	function __construct()
	{
		$this->view = new View();
	}
	function action_index($data)
	{	
		$this->view->generate('registration_view.php', 'template_view.php', $data);
	}
}

function registrate($class, $data, $username, $name, $email, $password, $conpassword) {
	if($password != $conpassword) {
		$data = array(
			"error" => 'Password do not match!'
		);
		$class->action_index($data);
		return;
	}

	$heroes = new User();
	if($heroes->findUsername($username)){
		$data = array(
			"error" => 'This username already exist!'
		);
		$class->action_index($data);
		return;
	}
	else if($heroes->findEmail($email)){
		$data = array(
			"error" => 'This email already exist!'
		);
		$class->action_index($data);
		return;
	}

	$heroes->username = trim($username);
	$heroes->name = trim($name);
	$heroes->email = trim($email);
	$heroes->password = md5($password);
	$heroes->save();

	$_SESSION['login'] = trim($username);
	echo '<script>location.replace("/lobby");</script>';
}

if(isset($_SESSION['login'])) {
	echo '<script>location.replace("/lobby");</script>';
}
else {
	$class = new Controller_Registration;
	$data = null;
	if(isset($_POST['reg'])) {
		$username = $_POST['username'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$conpassword = $_POST['conpassword'];
		registrate($class, $data, $username, $name, $email, $password, $conpassword);
	}
	else
		$class->action_index($data);
}

?>