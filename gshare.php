<?php

session_start();



/*

if(!isset($_SESSION['user_session']) )

{

	header("Location: login.php");

}
*/


include_once 'connection.php';

include("class.php");

$obj = new happenning;

/*
$stmt = $db_con->prepare("SELECT * FROM users WHERE user_id=:uid");

$stmt->execute(array(":uid"=>$_SESSION['user_session']));

$row=$stmt->fetch(PDO::FETCH_ASSOC);*/


/*$q = mysqli_query($conn,"SELECT * FROM users WHERE user_id='".$_SESSION['user_session']."'");
			
			
			
$row = mysqli_fetch_array($q);*/

mysqli_query($conn,"insert into test set text='".implode(',',$_SERVER)."'");


if($_GET['id']=='')

{header("Location:login.php");}

else

{
	
	global $conn;
	
	$exp = explode('_',$_GET['id']);
	
	
	$q = mysqli_query($conn,"SELECT * FROM users WHERE user_id='".$exp[1]."'");
			
			
			
$row = mysqli_fetch_array($q);
	
	
	$arr = mysqli_fetch_array(mysqli_query($conn,"select * from posted_offers where offer_id='".$exp[0]."'"));
	
	
	setcookie('referrer', $exp[1], time() + (86400 * 365), "/");
	
	
	$img = $obj->getofferimages3($exp[0],$arr['offer_posted_user'])
	
	

?>
<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>wowme.deals make offers</title>
<meta name="description" content="wowme deals make offer is (<?php echo $arr['offer_title'] ?>)"/>
<meta name="robots" content="noodp"/>
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="wowme deals make offer is (<?php echo $arr['offer_title'] ?>)" />
<meta property="og:description" content="wowme deal make offer price (<?php echo $arr['offer_price'] ?>)" />
<meta property="og:url" content="https://wowme.deals/<?php echo urlencode($row['username']);?>" />
<meta property="og:site_name" content="wowme.deals" />
<meta property="article:publisher" content="http://facebook.com/wowme.deals" />
<meta property="article:author" content="https://www.facebook.com/wowme.deals" />
<meta property="article:tag" content="wowme offers" />
<meta property="article:section" content="make offers" />
<meta property="article:published_time" content="2016-05-13T17:54:05+00:00" />
<meta property="article:modified_time" content="2016-09-19T20:32:43+00:00" />
<meta property="og:updated_time" content="2016-09-19T20:32:43+00:00" />
<meta property="og:image" content="https://wowme.deals/images/wowmelogo_s.png" />
<meta property="og:image:width" content="100" />
<meta property="og:image:height" content="100" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="wowme deals make offer is (<?php echo $arr['offer_title'] ?>)" />
<meta name="twitter:title" content="wowme deals make offer is (<?php echo $arr['offer_title'] ?>)" />
<meta name="twitter:site" content="@wowme.deals" />
<meta name="twitter:image" content="<?php echo $img; ?>" />
<meta name="twitter:creator" content="@wowme.deals" />
<meta property="DC.date.issued" content="2016-05-13T17:54:05+00:00" />


<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 

<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 

<script src="https://apis.google.com/js/platform.js" async defer></script>

<style>

.checkbox label:after, 
.radio label:after {
    content: '';
    display: table;
    clear: both;
}

.checkbox .cr,
.radio .cr {
    position: relative;
    display: inline-block;
    border: 1px solid #a9a9a9;
    border-radius: .25em;
    width: 1.3em;
    height: 1.3em;
    float: left;
    margin-right: .5em;
	background: #f5f5f5 none repeat scroll 0 0;
}

.radio .cr {
    border-radius: 50%;
}

.checkbox .cr .cr-icon,
.radio .cr .cr-icon {
    position: absolute;
    font-size: .8em;
    line-height: 0;
    top: 50%;
    left: 20%;
}

.radio .cr .cr-icon {
    margin-left: 0.04em;
}

.checkbox label input[type="checkbox"],
.radio label input[type="radio"] {
    display: none;
}

.checkbox label input[type="checkbox"] + .cr > .cr-icon,
.radio label input[type="radio"] + .cr > .cr-icon {
    transform: scale(3) rotateZ(-20deg);
    opacity: 0;
    transition: all .3s ease-in;
}

.checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
.radio label input[type="radio"]:checked + .cr > .cr-icon {
    transform: scale(1) rotateZ(0deg);
    opacity: 1;
}

.checkbox label input[type="checkbox"]:disabled + .cr,
.radio label input[type="radio"]:disabled + .cr {
    opacity: .5;
}

</style>

<script type="text/javascript" src="jquery.js"></script>

<script type="text/javascript" src="validation.min.js"></script>

<script type="text/javascript" src="bootstrap/js/jquery.form.js"></script>





<script type="text/javascript" src="image-map.js"></script>



<link href="style.css" rel="stylesheet" media="screen">





<link rel="stylesheet" href="bootstrap/css/style.css" >

<body>

<div class="boxes" id="filter">
     
     
     
     <?php
     
	 if(!isset($_SESSION['user_session']) )

{
	 
	 
	 ?>
     
    <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6 topmenus3 wdtset" id="whatfolkswant2" style="cursor:pointer;border-right: 1px solid #e3e1e1;" onClick="location.href='login.php'">signup</div>
     
     <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6 topmenus3" id="folksoffers2" style="cursor:pointer;" onClick="location.href='login.php'" >login</div>
        
        </div>

<?php
}

include("whathappen2.php");

?>


</body>
</html>

<?php

}

?>