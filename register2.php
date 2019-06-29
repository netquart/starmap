<?php
	
	session_start();

if(!isset($_SESSION['user_session']))
{
	header("Location: login.php");
}

include_once 'dbconfig.php';


	if($_POST)
	{
		
		$user_email = $_POST['user_email'];
		$user_password = $_POST['password'];
		$paypalemail = $_POST['paypal_email'];
		$zipcode = $_POST['zip_code'];
		
		
		
		
		$uploadfile=$_FILES["user_avatar"]["tmp_name"];
 
 $folder="images/avatars/".$_SESSION['user_session'];
 
 if(!is_dir($folder))
 
 mkdir($folder);
 
  if (($_FILES["user_avatar"]["type"] == "image/gif") || ($_FILES["user_avatar"]["type"] == "image/jpeg") || ($_FILES["user_avatar"]["type"] == "image/png") || ($_FILES["user_avatar"]["type"] == 'image/pjpeg') || ($_FILES["user_avatar"]["type"] == "image/jpg"))

 
 move_uploaded_file($_FILES["user_avatar"]["tmp_name"], "$folder/".$_FILES["user_avatar"]["name"]);
 
 
 
 if($_FILES['upload_file']['type'][$i] == 'image/png' )
 
 $ext = '.png';
 
 if( $_FILES['upload_file']['type'][$i] == 'image/jpeg' )
 
  $ext = '.jpeg';
 
 if($_FILES['upload_file']['type'][$i] == 'image/gif')
 
  $ext = '.gif';
 
 if($_FILES['upload_file']['type'][$i] == 'image/jpg')
 
  $ext = '.jpg';
 
 			 if($_FILES['upload_file']['type'][$i] == 'image/pjpeg')
 
            $ext = '.pjpeg'; 

 
 
 $new_name = md5(time()).$ext;
 
 rename("$folder/".$_FILES["user_avatar"]["name"][$i],"$folder/".$new_name);
 
  $new_name = "$folder/".$new_name;

		
	$url = $new_name;

        			$filename = compress_image($new_name, $new_name, 80);	
		
		
		
		
		
		
		
		
		$password = md5($user_password);
		
		try
		{	
		
			
			
			
				
			$stmt = $db_con->prepare("update users set email_id='".$user_email."' ,pass='".$password."' ,user_avatar='".$new_name."' ,paypal_email='".$paypalemail."' ,zip_code='".$zipcode."' ");
			
			
			
					
				if($stmt->execute())
				{
					echo "updated";
				}
				else
				{
					echo "Query could not execute !";
				}
			
		
			
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>