<?php
	$db_host = "localhost";
	$db_name = "db";
	$db_user = "root";
	$db_pass = "";
	
	try{
		
		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}


/*function datediff($startdate)

{
	
	$time2 = strtotime(date('Y-m-d h:m:s'));
	
	$time1 = strtotime($startdate);
	
	$diff = $time2-$time1;
	
	$minutes = $diff/60;
	
	
	 $minutes = round($minutes, 0, PHP_ROUND_HALF_DOWN);
	
	if($minutes<0)
	
	$minutes = round($minutes, 0, PHP_ROUND_HALF_UP);
	
	
	$minutes = str_replace('-','',$minutes);
	
	if($minutes<60)
	{
	
	
	
	return $minutes.'m';
	
	}
	
	
	else
	
	{
		$hours  = $minutes/60;
		
		$hours = round($hours, 0, PHP_ROUND_HALF_DOWN);
		
		
		if($hours<0)
		
		return $minutes.'m';
		
		else
		
		return $hours.'h';
		
		}
	
	
	
	
	}
	*/
	

function datediff($startdate)
{
	
	
	$current = time();

  $olddate = $startdate;


$date_diff = $current-$olddate;

if($date_diff>60 and $date_diff<3600)
{
 $timecount = $date_diff/60;
 
 $exp = explode('.',$timecount);
 
 $final = $exp[0].'m';
 
}

else if($date_diff>3600 and $date_diff<86400)

{
 
 
 
 $timecount = $date_diff/3600;
 
 $exp = explode('.',$timecount);
 
 $final = $exp[0].'h';
 
}

else if($date_diff>86400 and $date_diff<2592000)

{
	
 
 $timecount = $date_diff/86400;
 
 $exp = explode('.',$timecount);
 
 $final = $exp[0].'d';
 
}

else if($date_diff>2592000 and $date_diff<31536000)

{
	
 
 $timecount = $date_diff/2592000;
 
 $exp = explode('.',$timecount);
 
 $final = $exp[0].'M';
 
}

else if($date_diff>31536000)

{
 
 
 $timecount = $date_diff/31536000;
 
 $exp = explode('.',$timecount);
 
 $final = $exp[0].'yr';
 
}
elseif($date_diff<60 )
{
 
 $final = 'new';
 
}

return $final;
	
	
	
	}

	
	
	function change_subscription_status( $profile_id, $action ) {
 
    $api_request = 'USER=' . urlencode( 'user' )
                .  '&PWD=' . urlencode( 'pwd' )
                .  '&SIGNATURE=' . urlencode( 'signature' )
                .  '&VERSION=76.0'
                .  '&METHOD=ManageRecurringPaymentsProfileStatus'
                .  '&PROFILEID=' . urlencode( $profile_id )
                .  '&ACTION=' . urlencode( $action )
                .  '&NOTE=' . urlencode( 'Profile cancelled at store' );
 
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, 'https://api-3t.paypal.com/nvp' ); // For live transactions, change to 'https://api-3t.paypal.com/nvp'  https://api-3t.sandbox.paypal.com/nvp
    curl_setopt( $ch, CURLOPT_VERBOSE, 1 );
 
    // Uncomment these to turn off server and peer verification
    // curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
    // curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, FALSE );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt( $ch, CURLOPT_POST, 1 );
 
    // Set the API parameters for this transaction
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $api_request );
 
    // Request response from PayPal
    $response = curl_exec( $ch );
 
    // If no response was received from PayPal there is no point parsing the response
    if( ! $response )
        die( 'Calling PayPal to change_subscription_status failed: ' . curl_error( $ch ) . '(' . curl_errno( $ch ) . ')' );
 
    curl_close( $ch );
 
    // An associative array is more usable than a parameter string
    parse_str( $response, $parsed_response );
 
    return $parsed_response;
}

	



?>
