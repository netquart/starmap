<?php
session_start();

include ("connection.php");



// added in v4.0.0
require_once 'fblogin/autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '540529686144427','b0fea5bfe5e4cc06351872e653de4cc1' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('https://wowme.deals/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me?fields=name,email' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	     $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	     $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
	/* ---- Session Variables -----*/
	   // $_SESSION['FBID'] = $fbid;           
        //$_SESSION['FULLNAME'] = $fbfullname;
	   // $_SESSION['EMAIL'] =  $femail;
    /* ---- header location after session ----*/
	
	//echo "SELECT * FROM users WHERE email_id='".$femail."'";
	
	
	
	        $stmt = mysqli_query($conn,"SELECT * FROM users WHERE email_id='".$femail."'");
			
			 $count = mysqli_num_rows($stmt);
			
			//exit;
			
			
			if($count==0)
			
			{
				
			 $temp_pass = base64_encode($fbfullname);
						
			
			 $user = mysqli_query($conn,"insert into users set username='".$fbfullname."',email_id='".$femail."',pass='".md5($temp_pass)."',created_date='".date('Y-m-d')."',user_status='1' ");
		  
				
				
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
			
			
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			
			mail($femail,'Login details for wowme.deals site','<div>Hi,</div><br /><br /><div>Please check your login details for wowme.deals site next time you can just login without using facebook login</div><br /><br /><div>username : '.$femail.'</div><br /><div>password : '.$temp_pass.'</div><br /><a href="https://wowme.deals/login.php">click to go to site</div>',$headers);
	
	
	header('Location:whathapinng.php');
	
	  }
	  
	  else
	  
	  {
		
		$row = mysqli_fetch_array($stmt);
		
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




		header('Location:whathapinng.php');
		
	  }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
 // header("Location: index.php");
} else {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>