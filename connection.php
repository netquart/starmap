<?php
$host="localhost";
$uname="root";
$pass="";
$database = "custom_offers";	

global $conn;

$conn=mysqli_connect($host,$uname,$pass) or die("Database Connection Failed");
$selectdb=mysqli_select_db($conn,$database) or die("Database could not be selected");	
//$result=mysqli_select_db($conn,$database)
//or die("database cannot be selected <br>");

session_cache_expire(0);
@session_start();
set_time_limit(0);






function singleexecute($q)

{

		global $conn;
		
		$q = mysqli_query($conn,$q);
		
		$row = mysqli_fetch_array($q);
		
		return $row;
		
		
		
	
}


function executearray($q)

{

		global $conn;
		
		$q = mysqli_query($conn,$q);
		
		$array = array();
		
		while($row = mysqli_fetch_array($q))
		
		$array[] = $row;
		
		
		
		return $array;
		
		
		
	
}

function rowsreturn($q)

{

		global $conn;
		
		$q = mysqli_query($conn,$q);
		
		$row = mysqli_num_rows($q);
		
		return $row;
		
		
		
	
	
}



function compress_image($source_url, $destination_url, $quality) {

		$info = getimagesize($source_url);

    		if ($info['mime'] == 'image/jpeg')
        			$image = imagecreatefromjpeg($source_url);

    		elseif ($info['mime'] == 'image/gif')
        			$image = imagecreatefromgif($source_url);

   		elseif ($info['mime'] == 'image/png')
        			$image = imagecreatefrompng($source_url);

    		imagejpeg($image, $destination_url, $quality);
		return $destination_url;
	}
	
	
	
	
	
	
	
	function gethashtags($msg)
{
  // Match the hashtags
  preg_match_all('/(^|[^a-z0-9_])#([a-z0-9_]+)/i', $msg, $matchedHashtags);
  $hashtag = '';
  // For each hashtag, strip all characters but alnum
  if(!empty($matchedHashtags[0])) {
	  foreach($matchedHashtags[0] as $match) {
		  $hashtag .= preg_replace("/[^a-z0-9]+/i", "", $match).',';
	  }
  }
    //to remove last comma in a string
	return rtrim($hashtag, ',');
}

function convert_links($message)
{
	$parsedMessage = preg_replace(array('/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))/', '/(^|[^a-z0-9_])@([a-z0-9_]+)/i', '/(^|[^a-z0-9_])#([a-z0-9_]+)/i'), array('<a href="$1" target="_blank" rel="nofollow">$1</a>', '$1<a href="">@$2</a>', '$1<a href="whathapinng.php?keyword='.str_replace('#','hash','$2').'&type=whatshappening">#$2</a>'), $message);
	return $parsedMessage;
}

/*function convert_links2($message)
{
	$parsedMessage = preg_replace(array('/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))/', '/(^|[^a-z0-9_])@([a-z0-9_]+)/i', '/(^|[^a-z0-9_])#([a-z0-9_]+)/i'), array('<a href="$1" target="_blank"  rel="nofollow">$1</a>', '$1<a href="">@$2</a>', '$1<span class="menuItem"><a href="$2" id="searchit3">#$2</a></span>'), $message);
	return $parsedMessage;
}*/
	
	function convert_links2($message)

{
	$parsedMessage = preg_replace(array('/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))/', '/(^|[^a-z0-9_])@([a-z0-9_]+)/i', '/(^|[^a-z0-9_])#([a-z0-9_]+)/i'), array('<a href="$1" target="_blank" rel="nofollow">$1</a>', '$1<a href="">@$2</a>', '$1<a href="whathapinng.php?keyword='.str_replace('#','hash','$2').'&type=whatshappening">#$2</a>'), $message);
	
	return $parsedMessage;
	
}
	
	function countoffers()
	{
	
		global $conn,$offercount;
		
		
		
		$query = mysqli_query($conn,"select offer_id from posted_offers where offer_posted_user='".$_SESSION['user_session']."' and offer_status=1");	
		
		while($array = mysqli_fetch_array($query))
		
		$arr[] = $array['offer_id'];
		
		
		$query2 = mysqli_query($conn,"select bid_id from bids_against_offers where offer_id IN(".implode(',',$arr).") and bid_visited=0 ");
		
		$total_rows = mysqli_num_rows($query2);
		
		while($array2 = mysqli_fetch_array($query2))
		
		$arr2[] = $array2['bid_id'];

		
		
        $query3 = mysqli_query($conn,"select bid_id from bid_replies where bid_id IN(".implode(',',$arr2).") and user_id!='".$_SESSION['user_session']."'");
		
		$total_rows2 = mysqli_num_rows($query3);
		
		
		
		// just for replies
		
		
		
		$query4 = mysqli_query($conn,"select bid_id from bids_against_offers where offer_id IN(".implode(',',$arr).") ");
		
		while($array3 = mysqli_fetch_array($query4))
		
		$arr3[] = $array3['bid_id'];
		
		$query5= mysqli_query($conn,"select bid_id from bid_replies where bid_id IN(".implode(',',$arr3).") and visited_offers=0 and user_id!='".$_SESSION['user_session']."'");
		
		$total_rows4 = mysqli_num_rows($query5);

		// ends here
		
		
		$total_rows3 = $total_rows2+$total_rows+$total_rows4;
		
		if($total_rows3>99)
		
		$total_rows3 = '+99';
		
		//$total_rows3 = '+99';
		
		 if(empty($total_rows3) or $total_rows3==0)
	     $total_rows3 = ''; 
		 
		 if($total_rows3!='')
		
		  $offercount = 2;
		
		 
		
		return $total_rows3;
		
	}
	
	function offersmade()
	{
	
		global $conn,$offermade;
		
		$q = mysqli_query($conn,"select bid_id from bids_against_offers where user_id ='".$_SESSION['user_session']."' ");
		
		
		while($array = mysqli_fetch_array($q))
		
		$arr[] = $array['bid_id'];
		
		
	    $query3 = mysqli_query($conn,"select bid_id from bid_replies where bid_id IN(".implode(',',$arr).") and visited=0");
		
		$total_rows3 = mysqli_num_rows($query3);

         if(empty($total_rows3) or $total_rows3==0)
	     $total_rows3 = ''; 
		 
		 if($total_rows3>99)
		
		$total_rows3 = '+99';
		
		//$total_rows3 ='as';
		
		if($total_rows3!='')
		
		$offermade = 2;
		
		return $total_rows3;
		
		
	}
	
	function usersearches()
	{
	
		global $conn;
		
		$q = mysqli_query($conn,"SELECT sum(total_results) FROM `user_saved_searches` WHERE userid='".$_SESSION['user_session']."' ");
	
		
		$res =  mysqli_fetch_array($q);
		
		$total_rows3 = $res[0];
		
		
		if($total_rows3>99)
		
		$total_rows3 = '+99';
		
		 if(empty($total_rows3) or $total_rows3==0)
	     $total_rows3 = ''; 
		 
		 echo $total_rows3;
		
	}
	
	function usertransactions()
	{
	
		global $conn,$trans;
		
		$q = mysqli_query($conn,"SELECT payment_id FROM `user_payments` WHERE (user_id = '".$_SESSION['user_session']."' or seller_id = '".$_SESSION['user_session']."') and payment_status='verified' and visited=0 ");
	    
		$res =  mysqli_num_rows($q);
		
		$total_rows3 = $res;
		
		if($total_rows3>99)
		
		$total_rows3 = '+99';
		
		//$total_rows3 = '+99';
		
		 if(empty($total_rows3) or $total_rows3==0 )
	     $total_rows3 = ''; 
		 
		 if($total_rows3!='')
		 $trans = 2;

		return $total_rows3;
		
	}
	
	

?>