<?php
session_start();

if(!isset($_SESSION['user_session']))
{
	header("Location: login.php");
}

include_once 'connection.php';
?>