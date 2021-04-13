<?php

require_once 'application/controllers/controller_database.php';
class Controller_Reminder extends Controller
{
	function __construct()
	{
		$this->view = new View();
	}
	function action_index($data)
	{	
		$this->view->generate('reminder_view.php', 'template_view.php', $data);
	}
}

function remind($class, $data, $email)
{
	$heroes = new User();
	if(!$heroes->findEmail($email)) {
		$data = array(
			"error" => 'No such user registered!'
		);
		$class->action_index($data);
		return;
	}

	$heroes->email = $email;
	$heroes->renew();
	$data = array(
		"action" => 'New password was sent to '.$email.'!'
	);
	$class->action_index($data);
}

if(isset($_SESSION['login'])) {
	echo '<script>location.replace("/lobby");</script>';
}
else {
	$class = new Controller_Reminder;
	$data = null;

	if(isset($_POST['rem'])) {
		$email = $_POST['email'];
		remind($class, $data, $email);
	}
	else
		$class->action_index($data);
}

?>