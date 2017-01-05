<?php
	session_start();
	unset($_SESSION['authed']);

	if(session_destroy())
	{
		header("Location: login.php");
	}
?>
