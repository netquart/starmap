<?php

include_once 'connection.php';


// PayPal settings
$paypal_email = $_POST['payer_email'];
$return_url = 'https://wowme.deals/view-profile.php';
$cancel_url = 'https://wowme.deals/view-profile.php';
$notify_url = 'https://wowme.deals/payments.php';
$custom=$_POST['custom'];
$item_name = $_POST['offer_title'];
$item_amount = $_POST['offer_price'];

// Include Functions
include("functions.php");

// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){
	$querystring = '';
	
	// Firstly Append paypal account to querystring
	$querystring .= "?business=".urlencode($paypal_email)."&";
	
	// Append amount& currency (£) to quersytring so it cannot be edited in html
	
	//The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
	$querystring .= "item_name=".urlencode($item_name)."&";
	$querystring .= "amount=".urlencode($item_amount)."&";
	
	//loop for posted values and append to querystring
	foreach($_POST as $key => $value){
		$value = urlencode(stripslashes($value));
		$querystring .= "$key=$value&";
	}
	
	// Append paypal return addresses
	$querystring .= "return=".urlencode(stripslashes($return_url))."&";
	$querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
	$querystring .= "custom=".urlencode(stripslashes($custom))."&";
	$querystring .= "notify_url=".urlencode($notify_url);
	
	
	
	// Append querystring with custom field
	//$querystring .= "&custom=".USERID;
	
	//echo $querystring;
	
	// Redirect to paypal IPN
	header('location:https://www.paypal.com/cgi-bin/webscr'.$querystring);
	exit();
} else {
	//Database Connection
	
	
	// Response from Paypal

	// read the post from PayPal system and add 'cmd'
	$req = 'cmd=_notify-validate';
	foreach ($_POST as $key => $value) {
		$value = urlencode(stripslashes($value));
		$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);// IPN fix
		$req .= "&$key=$value";
	}
	
	// assign posted variables to local variables
	$data['item_name']			= $_POST['item_name'];
	$data['item_number'] 		= $_POST['item_number'];
	$data['payment_status'] 	= $_POST['payment_status'];
	$data['payment_amount'] 	= $_POST['mc_gross'];
	$data['payment_currency']	= $_POST['mc_currency'];
	$data['txn_id']				= $_POST['txn_id'];
	$data['receiver_email'] 	= $_POST['receiver_email'];
	$data['payer_email'] 		= $_POST['payer_email'];
	$data['custom'] 			= $_POST['custom'];
		
	// post back to PayPal system to validate
	$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
	
	$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);
	
	if (!$fp) {
		// HTTP ERROR
		
	} else {
		fputs($fp, $header . $req);
		while (!feof($fp)) {
			$res = fgets ($fp, 1024);
			if (strcmp($res, "VERIFIED") == 0) {
				
				// Used for debugging
				// 
						
				
					mail('netquart@gmail.com', 'PAYPAL POST - VERIFIED RESPONSE', print_r($post, true));
					
					
					
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////					
					
	
	  
	/*  
	  $user23 = mysqli_query($conn,"select * from bids_against_offers where offer_id = '".$_COOKIE['offer_id']."' and bid_id='".$_COOKIE['bid_id']."' ");
		 
		 
		  $row23=mysqli_fetch_array($user23);



		

$q2= "insert into `user_payments` set payment_status='verified' ,user_id ='".$_SESSION['user_session']."' , item_number ='".$_COOKIE['offer_id']."' , seller_id ='".$_COOKIE['seller_id']."',payment_amount ='".$row23['bid_price']."',posted_offer_user_id='".$_SESSION['user_session']."' , bid_id='".$_COOKIE['bid_id']."',date_of_payment='".time()."'";

	
	
	 $res = mysqli_query($conn,$q2);
	 
	 $idget = mysqli_insert_id($conn);

	//if posted offer user is choosing then it will be closed otherwise remain open
	
	
	
	$contit = mysqli_num_rows(mysqli_query($conn,"select offer_id from posted_offers where offer_posted_user='".$_COOKIE['user_id']."' and offer_id='".$_COOKIE['offer_id']."'"));
	

if($contit>0)
{
	$q23= "update `posted_offers` set offer_status='0',buyer_id ='".$_SESSION['user_session']."' where offer_id='".$_COOKIE['offer_id']."'";
	
	$res = mysqli_query($conn,$q23);
}



//// seller invoice created ///	

	

	$q_invoice= "insert into `seller_invoices` set seller_id ='".$_COOKIE['seller_id']."' , offer_id ='".$_COOKIE['offer_id']."' , invoice_amount ='".str_replace('$','',$row23['bid_price'])."',buyer_id='".$_SESSION['user_session']."',bid_id='".$_COOKIE['bid_id']."' ";

	
	$res = mysqli_query($conn,$q_invoice);

	


// update bid status to 0 if selected and payed by buyer
	
$q23= "update `bids_against_offers` set bid_status='0' where bid_id='".$_COOKIE['bid_id']."'";

	
	$res = mysqli_query($conn,$q23);				
					
					
					
					
					
					
					
					
					
					
					
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////					
					
					
					
					
					
				
					
				
				$q1 = "update `user_payments` set  txnid='".$_POST['txn_id']."',createdtime ='".$_POST['payment_date']."',address='".$_POST['address_street'].' '.$_POST['address_city'].''.$_POST['address_country_code']."',payer_id='".$_POST['payer_id']."' , payer_email='".$_POST['payer_email']."' where payment_id='".$idget."' ";						
				
					
				mysqli_query($conn,$sql);	*/
				
				
				
				
				
	
	
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
				
					
	mysqli_query($conn,$sql);				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
					
					
					if ($orderid) {
						// Payment has been made & successfully inserted into the Database
					} else {
						// Error inserting into DB
						// E-mail admin or alert user
						// mail('netquart@gmail.com', 'PAYPAL POST - INSERT INTO DB WENT WRONG', print_r($data, true));
					}
				/*} else {
					// Payment made but data has been changed
					// E-mail admin or alert user
				}*/
			
			} else if (strcmp ($res, "INVALID") == 0) {
			
			
			$q2= "INSERT INTO `user_payments` set payment_status='not verified'  ";
				
				//$stmt = $db_con->prepare($q2);
			
			
			
					
				//$stmt->execute();
				
				mysqli_query($conn,$q2);	
				
				
				// PAYMENT INVALID & INVESTIGATE MANUALY!
				// E-mail admin or alert user
				
				// Used for debugging
				@mail("smcgwilson@msn.com", "PAYPAL DEBUGGING", "Invalid Response<br />data = <pre>".print_r($post, true)."</pre>");
			}
		}
	fclose ($fp);
	}
}
?>
