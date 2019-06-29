<?php

session_start();

$exp = explode('#',$_POST['custom']);



unset($_SESSION['user_session']);
	
	if(session_destroy())
	{
		header("Location: login_auto.php?id=".$exp[1]);
	}




?>