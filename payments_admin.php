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
   
	 
	 
	 
	 @mail('smcgwilson@msn.com', 'PAYPAL POST - VERIFIED RESPONSE', print_r($_POST, true),$headers);

	 
	 if($_POST['custom']!='' and $_POST['txn_type']=='subscr_payment')
	 {
		 $explod = explode('#',$_POST['custom']);
		 
		 if($explod[0]=='premium')
		 $utype = 2;
		 else
		 $utype  = 1;
		 
		 
/// first check txn_id duplication		 
		 
		 $querytxn = "slect txn_id from user_subscription_details where txn_id='".$_POST['txn_id']."'";
		 
		// $ex = $db_con->prepare($querytxn);
		 
		 
		$ex = mysqli_query($conn,$querytxn);	
		 
		 
		 if(mysqli_num_rows($ex)==0)
		 
		 {
			 if($_POST['txn_id']!='')
			 
			{
			 
			$query = "insert into user_subscriptions set user_id='".$explod[1]."',user_type='".$utype."'";
			 
			//$stmt = $db_con->prepare($query);
			
			//$stmt->execute();
			
			$res = mysqli_query($conn,$query);	
			
			$id = mysqli_insert_id($conn);
			
			//$id = $db_con->lastInsertId();	
			
			
			
			// add information into subscription details page
			
			$query_deails = "insert into user_subscription_details set subscription_id='".$id."',subscr_id='".$_POST['subscr_id']."',full_name='".$_POST['address_name']."',mc_currency='".$_POST['mc_currency']."',address='".$_POST['address_street'].' '.$_POST['address_city'].' '.$_POST['address_state'].' '.$_POST['address_country']."',payer_email='".$_POST['payer_email']."',payer_id='".$_POST['payer_id']."',subscr_date='".$_POST['subscr_date'].$_POST['payment_date']."',address_zip='".$_POST['address_zip']."',subscription_period='".$_POST['period3']."',ipn_track_id='".$_POST['ipn_track_id']."',member_ship_type ='".$explod[0]."',txn_id='".$_POST['txn_id']."'";
			
			//$stmt = $db_con->prepare($query_deails);
			
			//$stmt->execute();
			
			$res = mysqli_query($conn,$query_deails);	
			
			
			$queryup = "update users set member_type='".$utype."',subsc_id='".$_POST['subscr_id']."' where user_id =  '".$explod[1]."'";
			 
			//$stmt = $db_con->prepare($queryup);
			
			//$stmt->execute();
			
			$res = mysqli_query($conn,$queryup);
			
			
			header("Location:go-premium.php?pay=1&utype=".$explod[1]."");
		   
		  }
		
		}
	
	}
	 
	 else if($_POST['txn_type']=='web_accept')
	 
	 {
		 
		  $explod = explode('#',$_POST['custom']);
		 
		 
				
		$q2= "insert into `free_member_payments` set  txnid='".$_POST['txn_id']."',createdtime ='".$_POST['payment_date']."',address='".$_POST['address_street'].' '.$_POST['address_city'].''.$_POST['address_country_code']."',payer_id='".$_POST['payer_id']."' , payer_email='".$_POST['payer_email']."'  ,  user_id ='".$explod[0]."' ,payment_status='verified',amount_paid='".$_POST['payment_gross']."'";
		
		
		//$stmt = $db_con->prepare($q2);
							
		
		//$stmt->execute();
		
		$res = mysqli_query($conn,$q2);
						
						
						/// update invoices table
						
		if($explod[1]!='')				
		{				
		 
		 $q23= "update seller_invoices set invoice_status=1 where invoice_id IN(".base64_decode($explod[1]).")";
		
		// $stmt = $db_con->prepare($q23);
							
		
		//$stmt->execute();
		
		$res = mysqli_query($conn,$q23);
						
		$_SESSION['invoices'] = '';
		}
		
		header("Location:view-profile.php?pay=1");
	
	 }
	
			 
	 
}

else if(!$verified)

{
	
	
	 if($_POST['custom']!='')
	 {}
	 
	 else
	 
	 {
	
	
	$q2= "insert into `free_member_payments` set  txnid='".$_POST['txn_id']."',createdtime ='".$_POST['payment_date']."',address='".$_POST['address_street'].' '.$_POST['address_city'].''.$_POST['address_country_code']."',payer_id='".$_POST['payer_id']."' , payer_email='".$_POST['payer_email']."'  ,  user_id ='".$_POST['custom']."' ,payment_status='not verified',amount_paid='".$_POST['payment_fee']."'";
		
		
		//$stmt = $db_con->prepare($q2);
							
		
		//$stmt->execute();
		
		$res = mysqli_query($conn,$q2);
	
	 }
	
	
	@mail("smcgwilson@msn.com", "PAYPAL DEBUGGING", "Invalid Response<br />data = <pre>".print_r($_POST, true)."</pre>",$headers);
	
	
	header("Location:view-profile.php?pay=0");
	
	}



		



// Reply with an empty 200 response to indicate to paypal the IPN was received correctly.

header("HTTP/1.1 200 OK");				

