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

		 
		 $chkoffer = mysqli_query($conn,"select offer_status from posted_offers where offer_id = '".$_GET['offer_id']."' and offer_status='0'");
		 
		 
		  $rows=mysqli_num_rows($chkoffer);

		

		 if($rows>0)

		 {

		 echo '<div style="font-size:16px;color:red; padding-top:20px; width:100%;text-align:center;">Offer already paid and closed <a href="javascript:history.go(-1)">click to go back</a>';

		 

		 exit;

		 }

		
		

		

		

		if(@$_COOKIE['seller_id']) 

		

		setcookie("seller_id", "", time() - (86400 * 30));

		

		if(@$_COOKIE['offer_id']) 

		

		setcookie("offer_id", "", time() - (86400 * 30));



	    if(@$_COOKIE['bid_id']) 

		

		setcookie("bid_id", "", time() - (86400 * 30));
		
		
		if(@$_COOKIE['user_id']) 

		

		setcookie("user_id", "", time() - (86400 * 30));

		

		setcookie('user_id', $_GET['user_id'], time() + (86400 * 30), "/");


		setcookie('seller_id', $_GET['seller_id'], time() + (86400 * 30), "/"); 

		

		setcookie('offer_id', $_GET['offer_id'], time() + (86400 * 30), "/"); 

		

		setcookie('bid_id', $_GET['bid_id'], time() + (86400 * 30), "/"); 



	  
	  
	  $user23 = mysqli_query($conn,"select * from bids_against_offers where offer_id = '".$_GET['offer_id']."' and bid_id='".$_GET['bid_id']."' ");
		 
		 
		  $row23=mysqli_fetch_array($user23);



	

$q2= "insert into `user_payments` set payment_status='pending' ,user_id ='".$_SESSION['user_session']."' , item_number ='".$_GET['offer_id']."' , seller_id ='".$_GET['seller_id']."',payment_amount ='".$row23['bid_price']."',posted_offer_user_id='".$_SESSION['user_session']."' , bid_id='".$_GET['bid_id']."',date_of_payment='".time()."'";

	
	 $res = mysqli_query($conn,$q2);
	 
	 $idp = mysqli_insert_id($conn);
	 
	 
	 mysqli_query($conn,"insert into temp_transactions set user_id ='".$_SESSION['user_session']."',offer_id='".$_GET['offer_id']."' , seller_id ='".$_GET['seller_id']."', bid_id='".$_GET['bid_id']."',payment_id='".$idp."' ");
	 
	 $idget = mysqli_insert_id($conn);
	 

	//if posted offer user is choosing then it will be closed otherwise remain open
	
	/*	
	
	$contit = mysqli_num_rows(mysqli_query($conn,"select offer_id from posted_offers where offer_posted_user='".$_GET['user_id']."' and offer_id='".$_GET['offer_id']."'"));
	

if($contit>0)
{
	$q23= "update `posted_offers` set offer_status='0',buyer_id ='".$_SESSION['user_session']."' where offer_id='".$_GET['offer_id']."'";
	
	$res = mysqli_query($conn,$q23);
}



//// seller invoice created ///	

	

	$q_invoice= "insert into `seller_invoices` set seller_id ='".$_GET['seller_id']."' , offer_id ='".$_GET['offer_id']."' , invoice_amount ='".str_replace('$','',$row23['bid_price'])."',buyer_id='".$_SESSION['user_session']."',bid_id='".$_GET['bid_id']."' ";

	
	$res = mysqli_query($conn,$q_invoice);

	


// update bid status to 0 if selected and payed by buyer
	
$q23= "update `bids_against_offers` set bid_status='0' where bid_id='".$_GET['bid_id']."'";

	
	$res = mysqli_query($conn,$q23);*/


		}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>paypal</title>





</head>



<body>



redirecting to paypal...



 <?php

	  
      $user = mysqli_query($conn,"select * from users where user_id = '".$_GET['seller_id']."'");
	  
      $row=mysqli_fetch_array($user);

	  $user = mysqli_query($conn,"select * from users where user_id = '".$_GET['user_id']."'");
	  
      $row2=mysqli_fetch_array($user);
	 ?>



<form name = "paypal_form" id="paypal_form" action = "https://www.paypal.com/cgi-bin/webscr" method = "post" >

<input type="hidden" name="cmd" value="_xclick">

<input type = "hidden" name = "business" value = "<?php echo $row['paypal_email']; ?>">


<input type = "hidden" name = "item_name" value = "<?php echo $row23['offer_title']; ?>">


<input type="hidden" name="amount" value="<?php echo str_replace('$','',$row23['bid_price']); ?>" / >



<input type="hidden" name="currency_code" value="USD">

<input type = "hidden" name = "cancel_return" value = "https://wowme.deals/view-profile.php">

<input type = "hidden" name = "return" value = "https://wowme.deals/transactions_buying.php">



<input type = "hidden" name = "notify_url" value = "https://wowme.deals/payments_admin3.php">


<input type="hidden" name="custom" value="<?php echo $idget; ?>">

<input type="hidden" name="rm" value="2">



</form>



<script>



onload  = submitfunc();





function submitfunc()



{

	document.paypal_form.action = 'https://www.paypal.com/cgi-bin/webscr';

	

	document.paypal_form.submit();

	

}


</script>  















    <!--<form class="paypal" name="paypal_form" action="payments.php" method="post" id="paypal_form">

		<input type="hidden" name="cmd" value="_xclick" />

		<input type="hidden" name="no_note" value="1" />

		<input type="hidden" name="lc" value="US" />

		<input type="hidden" name="currency_code" value="USD" />

		<input type="hidden" name="rm" value="2">

		<input type="hidden" name="first_name" value="<?php /*echo $row2['username']; ?>"  />

		<input type="hidden" name="custom" value="<?php echo $_SESSION['user_session']; ?>"  />

		<input type="hidden" name="payer_email" value="<?php echo $row['paypal_email']; ?>"  />

		<input type="hidden" name="item_number" value="<?php echo $_GET['offer_id']; ?>" / >


        <input type="hidden" name="offer_title" value="<?php echo $row23['offer_title']; ?>" / >


        <input type="hidden" name="offer_price" value="<?php echo str_replace('$','',$row23['bid_price']);*/ ?>" / >


	</form>





<script>



onload  = submitfunc();





function submitfunc()



{

	document.paypal_form.action = 'https://wowme.deals/payments.php';

	

	document.paypal_form.submit();

	

	

	}









</script>    -->  





</body>

</html>





