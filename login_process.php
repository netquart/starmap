<?php
//error_reporting(0);
	session_start();
	
	global $conn;
	
	require_once 'connection.php';
    
	
	if(isset($_POST['token2']))
	
	$token = $_POST['token2'];
	
	else
	
	$token = false;
	
	



	if(isset($_POST['btn-login']) and $token==$_SESSION['token2'])
	{
		//$user_name = $_POST['user_name'];
		$user_email = trim($_POST['user_email']);
		$user_password = trim(mysqli_real_escape_string($conn, $_POST['password']));
		
		$password = md5($user_password);
			
		
			/*$stmt = $db_con->prepare("SELECT * FROM users WHERE email_id=:email");
			$stmt->execute(array(":email"=>$user_email));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$count = $stmt->rowCount();*/
			
			
			$q = mysqli_query($conn,"SELECT * FROM users WHERE email_id='".$user_email."'");
			
			$count = mysqli_num_rows($q);
			
			$row = mysqli_fetch_array($q);
			
			if($row['pass']==$password){
				
				/*if($row['user_status']==0)
				
				{
				
				  echo 'you are currently inactive please verify your email first.';	
					
				}
				
				else
				{*/
				
			// log in
				
				$_SESSION['user_session'] = $row['user_id'];
				
				$_SESSION['member_type'] = $row['member_type'];
				
				if(empty($row['zip_code']))
				
				 $_SESSION['zipcode'] = 0;
				
				else
				
				$_SESSION['zipcode'] = $row['zip_code'];
				
				
				if(empty($row['paypal_email']))
				
				 $_SESSION['paypal_email'] = 0;
				
				else
				
				$_SESSION['paypal_email'] = $row['paypal_email'];
				
				$_SESSION['first_time_buyer'] = $row['first_time_buyer'];



				
				
     $_SESSION['login_time'] = time(); //got the login time for user in second
     $session_logout = 4500; //it means 15 minutes. 
				
				
				
				/*}*/
				
					
				
				echo "ok"; 
				
			}
			
		
		
			
			else{
				
				echo "email or password does not exist."; // wrong details 
			}
				
		
		
	}
	
	else
	
	echo 'invalid token! please refresh to login again';

?>