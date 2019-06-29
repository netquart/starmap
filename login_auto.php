<?php

session_start();

include_once 'dbconfig.php';

$exp = 

$stmt = $db_con->prepare("SELECT * FROM users WHERE user_id='".$_GET['id']."'");

$stmt->execute();

$row=$stmt->fetch(PDO::FETCH_ASSOC);


if($_GET['id']!='')
{

$_SESSION['user_session'] = $row['user_id'];

$_SESSION['member_type'] = $row['member_type'];

header("Location:view-profile.php");

}

?>