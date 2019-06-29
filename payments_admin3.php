<?php

session_start();

include_once 'connection.php';



require('ipn-class.php');

/*use PaypalIPN;*/

$ipn = new PaypalIPN();

// Use the sandbox endpoint during testing.

$ipn->useSandbox();

$verified = $ipn->verifyIPN();




$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

if ($verified or $_POST['payment_status']=='Completed') {
	
	
	
	
	
	 $user = mysqli_query($conn,"select * from temp_transactions where temp_id = '".$_POST['custom']."'");
	  
     $row=mysqli_fetch_array($user);
	
	
	
	  $user23 = mysqli_query($conn,"select * from bids_against_offers where offer_id = '".$row['offer_id']."' and bid_id='".$row['bid_id']."' ");
		 
		 
	  $row23=mysqli_fetch_array($user23);
	
	
	
	  $contit = mysqli_num_rows(mysqli_query($conn,"select offer_id from posted_offers where offer_posted_user='".$row['user_id']."' and offer_id='".$row['offer_id']."'"));
	

if($contit>0)
{
	$q23= "update `posted_offers` set offer_status='0',buyer_id ='".$row['user_id']."' where offer_id='".$row['offer_id']."'";
	
	$res = mysqli_query($conn,$q23);
}



//// seller invoice created ///	

	

	$q_invoice= "insert into `seller_invoices` set seller_id ='".$row['seller_id']."' , offer_id ='".$row['offer_id']."' , invoice_amount ='".str_replace('$','',$row23['bid_price'])."',buyer_id='".$row['user_id']."',bid_id='".$row['bid_id']."' ";

	
	$res = mysqli_query($conn,$q_invoice);

	


// update bid status to 0 if selected and payed by buyer
	
    $q23= "update `bids_against_offers` set bid_status='0' where bid_id='".$row['bid_id']."'";

	
	$res = mysqli_query($conn,$q23);
	
	
	
	$q1 = "update `user_payments` set  txnid='".$_POST['txn_id']."',createdtime ='".$_POST['payment_date']."',address='".$_POST['address_street'].' '.$_POST['address_city'].''.$_POST['address_country_code']."',payer_id='".$_POST['payer_id']."' , payer_email='".$_POST['payer_email']."',payment_status='verified' where payment_id='".$row['payment_id']."' ";						
				
					
	mysqli_query($conn,$q1);	
	
	}

else if(!$verified)

{
	
	
		header("Location:transactions.php");
	
}



		



// Reply with an empty 200 response to indicate to paypal the IPN was received correctly.

header("HTTP/1.1 200 OK");				

