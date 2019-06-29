<?php

session_start();



if(!isset($_SESSION['user_session']))

{

	header("Location: login.php");

}



include_once 'connection.php';









if($_GET['seller_id'])

	{

		

		

		//// first check offer status i closed buyer can't pay

//echo "select offer_status from posted_offers where offer_id = '".$_GET['offer_id']."' and offer_status='0'";
		 
		 $chkoffer = mysqli_query($conn,"select offer_status from posted_offers where offer_id = '".$_GET['offer_id']."' and offer_status='0'");
		 
		 
		  $rows=mysqli_num_rows($chkoffer);

		

		 if($rows>0)

		 {

		 echo 'Offer already paid and closed';

		 

		 exit;

		 }
	  
	  $user23 = mysqli_query($conn,"select * from bids_against_offers where offer_id = '".$_GET['offer_id']."' and bid_id='".$_GET['bid_id']."' ");
		 
		 
		  $row23=mysqli_fetch_array($user23);



	

$q2= "insert into `user_payments` set payment_status='pending' ,user_id ='".$_SESSION['user_session']."' , item_number ='".$_GET['offer_id']."' , seller_id ='".$_GET['seller_id']."',payment_amount ='".$row23['bid_price']."',posted_offer_user_id='".$_SESSION['user_session']."' , bid_id='".$_GET['bid_id']."',date_of_payment='".time()."',date_of_payment_pending='".time()."'";

	
	 $res = mysqli_query($conn,$q2);
	 
	 $idp = mysqli_insert_id($conn);
	 
	 
	 mysqli_query($conn,"insert into temp_transactions set user_id ='".$_SESSION['user_session']."',offer_id='".$_GET['offer_id']."' , seller_id ='".$_GET['seller_id']."', bid_id='".$_GET['bid_id']."',payment_id='".$idp."' ");
	 
	 $idget = mysqli_insert_id($conn);
	 
	 
	 $q23= "update `posted_offers` set offer_status='0',buyer_id ='".$_SESSION['user_session']."' where offer_id='".$_GET['offer_id']."'";
	
	$res = mysqli_query($conn,$q23);
	 

echo 'success';
	

		}
?>