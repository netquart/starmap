<?php
	
	require_once 'connection.php';

   global $conn;
   
   
   
    function rand_string($length) {
      $str="";
      $chars = "subinsblogabcdefghijklmanopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      $size = strlen($chars);
      for($i = 0;$i < $length;$i++) {
       $str .= $chars[rand(0,$size-1)];
      }
      return $str; /* http://subinsb.com/php-generate-random-string */
     }
   
   
   
   
   
   
   

	if($_POST)
	{
		$user_name = $_POST['user_name'];
		$user_email = $_POST['user_email'];
		$user_password = $_POST['password'];
		$joining_date =date('Y-m-d H:i:s');
		$zipcode = $_POST['zipcode'];
		
		$password = md5($user_password);
		
		if (isset($_COOKIE['referrer'])){	//If the referrer cookie is set
			$referred_by=explode(';',$_COOKIE['referrer']); //explode to capture second level (possible future use?)
			if ($referred_by[0] == '')		//if this is empty for some strange reason?
				$referred_by[0] = NULL;
			if ($referred_by[1] == '')		//if there is no second referrer
				$referred_by[1] = NULL;
		}
		else {
			$referred_by[0]=NULL;			// otherwise set referrers to null.
			$referred_by[1]=NULL;
		}
		
		if(isset($_POST['token2']))
	
	$token = $_POST['token2'];
	
	else
	
	$token = false;
		
			
		
			/*$stmt = $db_con->prepare("SELECT * FROM users WHERE email_id=:email");
			$stmt->execute(array(":email"=>$user_email));
			$count = $stmt->rowCount();*/
			
			
			$q = mysqli_query($conn,"SELECT * FROM users WHERE email_id='".$user_email."' or username='".trim($user_name)."' ");
			
			$count = mysqli_num_rows($q);
			
			$row = mysqli_fetch_array($q);
			
			
			
			
			
			if($count==0){
				$res = mysqli_query($conn,"insert into users set username='".addslashes($user_name)."',email_id='".addslashes($user_email)."',pass='".$password."',created_date='".$joining_date."',referred_by='".addslashes($referred_by[0])."',zip_code='".addslashes($zipcode)."',referrer='".addslashes($referred_by[1])."'");
					
				if($res)
				{
					$id = mysqli_insert_id($conn);
					$q = mysqli_query($conn,"SELECT * FROM users WHERE user_id='".$id."'");
					$row = mysqli_fetch_array($q);
					
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
//     $session_logout = 4500; //it means 15 minutes. 
     $session_logout = 43200; //it means 12 hours. 

					/*$str  = '<a target="_blank" href="https://wowme.deals/activate.php?id='.base64_encode($id).'">Click here to activate your account</a>';
					
					
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			
			mail($user_email,'Login details for wowme.deals site','<div>Hi,</div><br /><br /><div>Please check your login details for wowme.deals site</div><br /><br /><div>username : '.$user_email.'</div><br /><div>password : <i>hidden</i></div><br />Please activate your account before login '.$str.'<br /><a href="https://wowme.deals/login.php">click to go to site</div>',$headers);*/
					
					
					//echo "user created and verification mail sent please verify account to login!";
					
					echo "user created successfully!";
					
					
				}
				else
				{
					echo "Query could not execute !";
				}
			
			}
			else{
				
				echo "1"; //  not available
			}
				
		
	}

?>