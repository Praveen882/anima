<?php
	session_start();
	if(isset($_POST['logout']))
	{
		unset($_SESSION['admin']);
		header('Location: ./login.php');
	}

?>