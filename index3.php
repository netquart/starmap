<?php
//Include GP config file && User class
include_once 'gpConfig.php';
//include_once 'User.php';

include_once 'connection.php';

if(isset($_GET['code'])){
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	//Get user profile data from google
	$gpUserProfile = $google_oauthV2->userinfo->get();
	
	//Initialize User class
	//$user = new User();
	
	//Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'gender'        => $gpUserProfile['gender'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        'link'          => $gpUserProfile['link']
    );
   // $userData = $user->checkUser($gpUserData);
	
	//Storing user data into session
	
	
	        global $conn;
	
	       // $stmt = $db_con->prepare("SELECT * FROM users WHERE email_id='".$gpUserData['email']."'");
			
			$q = mysqli_query($conn,"SELECT * FROM users WHERE email_id='".$gpUserData['email']."'");
			
			//$stmt->execute(array(":email"=>$user_email));
			
			//$count = $stmt->rowCount();
			
			$count = mysqli_num_rows($q);
			
			if($count==0)
			
			{
				
			 $temp_pass = base64_encode($gpUserData['first_name']);
						
			
			// $user = $db_con->prepare("insert into users set username='".$gpUserData['first_name']."',email_id='".$gpUserData['email']."',pass='".md5($temp_pass)."',created_date='".date('Y-m-d')."',user_status='1' ");
		  
				//$user->execute();
				
				//$id = $db_con->lastInsertId();	
				
				
				$q1 = mysqli_query($conn,"insert into users set username='".$gpUserData['first_name']."',email_id='".$gpUserData['email']."',pass='".md5($temp_pass)."',created_date='".date('Y-m-d')."',user_status='1' ");
				
				$id = mysqli_insert_id($conn);
				
				
				
				$qq = mysqli_query($conn,"SELECT * FROM users WHERE user_id='".$id."'");
				
				$row2 = mysqli_fetch_array($qq);
				
				 $_SESSION['user_session'] = $id;
	
	             $_SESSION['member_type'] = $row2['member_type'];
				
	            
				if(empty($row2['zip_code']))
				
				 $_SESSION['zipcode'] = 0;
				
				else
				
				$_SESSION['zipcode'] = $row2['zip_code'];
				
				
				if(empty($row2['paypal_email']))
				
				 $_SESSION['paypal_email'] = 0;
				
				else
				
				$_SESSION['paypal_email'] = $row2['paypal_email'];

				
				$_SESSION['first_time_buyer'] = $row2['first_time_buyer'];
				
				
				 $_SESSION['login_time'] = time(); //got the login time for user in second
     $session_logout = 4500; //it means 15 minutes. 
			
			
			if(file_exists($gpUserProfile['picture']))
			
			{
				$folder="images/avatars/".$id;
		 
				if(!is_dir($folder))
		 
				mkdir($folder);
				
				copy($gpUserProfile['picture'],$folder.'/avatar.png');
				
				//$user = $db_con->prepare("update users set user_avatar='".$folder.'/avatar.png'."' where user_id='".$id."' ");
		  
				//$user->execute();
				
				mysqli_query($conn,"update users set user_avatar='".$folder.'/avatar.png'."' where user_id='".$id."' ");
				
				
			}
			
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			
			mail($gpUserData['email'],'Login details for wowme.deals site','<div>Hi,</div><br /><br /><div>Please check your login details for wowme.deals site next time you can just login without using google login</div><br /><br /><div>username : '.$gpUserData['email'].'</div><br /><div>password : '.$temp_pass.'</div><br /><a href="https://wowme.deals/login.php">click to go to site</div>',$headers);
	
	  }
	  
	  else
	  
	  {
		
		$row=mysqli_fetch_array($q);
		
		$id = $row['user_id'];  
		
		 $_SESSION['user_session'] = $id;
	
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
		
	  }
	
	
	


	
	header('Location:whathapinng.php');
	
	
} else {
	$authUrl = $gClient->createAuthUrl();
	$output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/glogin.png" alt=""/></a>';
}
?>
