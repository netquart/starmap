<?php

require_once 'dbconfig.php';



 $query = $db_con->prepare("update users set user_status='1',member_type='0' where user_id='".base64_decode($_GET['id'])."'");

              

$query->execute();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>verify user</title>
</head>

<body onLoad="callfunc();">

<div align="center" style="margin-top:20px; font-size:20px; color:#00F">email verified redirecting you..... </div>
  
  <script>
  
  function callfunc()
  {
	  
	  setTimeout(goto(),'3000')
	  
	  }
	  
function goto()

{
	location.href='login.php';
	}	  
	  
  
  </script>
  
</body>
</html>