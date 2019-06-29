<?php

require_once("class2.php");

$obj = new happenning;

global $conn;

ini_set('max_execution_time', 0);


if(@$_POST['submit_images']=='get offers')

@$_REQUEST['option'] = 'getoffers';




switch($_REQUEST['option']){
	
	
	case "updateit":
	
	mysqli_query($conn,"update users set first_time_buyer=1 where user_id='".$_SESSION['user_session']."'");
	
	$_SESSION['first_time_buyer']=1;


	break;
    
	
	
	case "replies":
	
	
	if(empty($_POST['desc']))
	{echo 'error';exit;}
	
	
	$stmt = mysqli_query($conn,"insert into bid_replies set bid_id='".$_POST['bid_id']."',user_id='".$_SESSION['user_session']."' , offer_id='".$_POST['offer_id']."',reply_text='".addslashes($_POST['desc'])."' , reply_date='".time()."' ");
	

$id = mysqli_insert_id($conn);	

if(count($_FILES["upload_file"]["name"])>0)	

{	
	
for($i=0;$i<count($_FILES["upload_file"]["name"]);$i++)
{
 $uploadfile=$_FILES["upload_file"]["tmp_name"][$i];
 
 $folder="images/replies/".$id;
 
 if(!is_dir($folder))
 
 mkdir($folder);
 
  if (($_FILES["upload_file"]["type"][$i] == "image/gif") || ($_FILES["upload_file"]["type"][$i] == "image/jpeg") || ($_FILES["upload_file"]["type"][$i] == "image/png") || ($_FILES["upload_file"]["type"][$i] == 'image/pjpeg') || ($_FILES["upload_file"]["type"][$i] == "image/jpg"))

 
 move_uploaded_file($_FILES["upload_file"]["tmp_name"][$i], "$folder/".$_FILES["upload_file"]["name"][$i]);
 
 
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

  
 
 
 
 
 $new_name = md5(time()).mt_rand(1000,30000).$ext;
 
 rename("$folder/".$_FILES["upload_file"]["name"][$i],"$folder/".$new_name);
 
  $new_name = "$folder/".$new_name;
  

                    $url = $new_name;

        			$filename = compress_image($new_name, $new_name, 80);
        			
  
  
  if(file_exists($new_name) and is_file($new_name))
 
 
 $stmt2 = mysqli_query($conn,"insert into reply_images set reply_id='".$id."',image_name='".$new_name."' , user_id='".$_SESSION['user_session']."'"); 
 
  }

}
	
	
	
	echo $id;
	
	
	
	
	
	
    break;
	
	
	
	






case "repliespost":
	
	
	if(empty($_POST['desc']))
	{echo 'error';exit;}
	
	
	$stmt = mysqli_query($conn,"insert into bid_replies set bid_id='".$_POST['bid_id']."',user_id='".$_SESSION['user_session']."' , offer_id='".$_POST['offer_id']."',reply_text='".addslashes($_POST['desc'])."' , reply_date='".time()."' ");
	

$id = mysqli_insert_id($conn);	

if(count($_FILES["upload_file"]["name"])>0)	

{	
	
for($i=0;$i<count($_FILES["upload_file"]["name"]);$i++)
{
 $uploadfile=$_FILES["upload_file"]["tmp_name"][$i];
 
 $folder="images/replies/".$id;
 
 if(!is_dir($folder))
 
 mkdir($folder);
 
  if (($_FILES["upload_file"]["type"][$i] == "image/gif") || ($_FILES["upload_file"]["type"][$i] == "image/jpeg") || ($_FILES["upload_file"]["type"][$i] == "image/png") || ($_FILES["upload_file"]["type"][$i] == 'image/pjpeg') || ($_FILES["upload_file"]["type"][$i] == "image/jpg"))

 
 move_uploaded_file($_FILES["upload_file"]["tmp_name"][$i], "$folder/".$_FILES["upload_file"]["name"][$i]);
 
 
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

  
 
 
 
 
 $new_name = md5(time()).mt_rand(1000,30000).$ext;
 
 rename("$folder/".$_FILES["upload_file"]["name"][$i],"$folder/".$new_name);
 
  $new_name = "$folder/".$new_name;
  

                    $url = $new_name;

        			$filename = compress_image($new_name, $new_name, 80);
        			
  
  
  if(file_exists($new_name) and is_file($new_name))
 
 
 $stmt2 = mysqli_query($conn,"insert into reply_images set reply_id='".$id."',image_name='".$new_name."' , user_id='".$_SESSION['user_session']."'"); 
 
  }

}
	
	header("Location:".$_POST['pageis'].".php");
	
	//echo $id;
	
	
	
	
	
	
    break;	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	case "savesearch":
	
	
	
	$keywords = $_REQUEST['keyword'];
	
	
	$exp1 = explode('$',$keywords);
	
	$exp1 = explode(' ',$exp1[1]);

	$rep = '$'.$exp1[0];
	
	
	if($_REQUEST['empty_search']=='')
	
	$addsearch = " , empty_search='1' ";
	
	
		

	
	
mysqli_query($conn,"insert into user_saved_searches set keywords='".addslashes(str_replace($rep,'',$keywords))."',category='".$_REQUEST['subcat']."' , userid='".$_SESSION['user_session']."',amount='$".$exp1[0]."' ".$addsearch." , total_results = '".$_REQUEST['total_results']."' , search_type='".$_REQUEST['search_type']."' ");
	
	
	
	break;
	
	
	
	
	
	case "savesearchspecial":
	
	
	
	$keywords = $_REQUEST['keyword'];
	
	
	$exp1 = explode('$',$keywords);
	
	$exp1 = explode(' ',$exp1[1]);

	$rep = '$'.$exp1[0];
	
	
	if($_REQUEST['empty_search']=='')
	
	$addsearch = " , empty_search='1' ";
	
	
		

	
	
mysqli_query($conn,"insert into user_saved_searches set keywords='".addslashes(str_replace($rep,'',$keywords))."', userid='".$_SESSION['user_session']."',amount='$".$exp1[0]."' ".$addsearch." , total_results = '".str_replace('undefined','0',$_REQUEST['total_results'])."' , search_type='".$_REQUEST['search_type']."' ");
	
	
	
	break;
	
	
	
	
	
	
	
	
	
	
	
	
	case "update_user_details":
	
	
	
	mysqli_query($conn,"update users set alerts_email='".$_REQUEST['alerts_email']."',alerts_sms='".$_REQUEST['alerts_sms']."' , cellphone='".$_REQUEST['cellphone']."',mobile_provider='".$_REQUEST['mobile_provider']."'  where user_id='".$_REQUEST['id']."' ");
	
	
	
	
	break;
	
	case "addkeywords":
	
	
		$res = mysqli_query($conn,"insert into user_keywords set uid='".$_REQUEST['uid']."',keyword='".$_REQUEST['keyword']."' , offer_id_plus_category='".$_REQUEST['offer_id_plus_category']."',buy_get='".$_REQUEST['buy_get']."'  ");
       
	   
	  echo $id = mysqli_insert_id($conn);
	   
	  
	
	break;
	
	
	case "update_keywords":
	
	mysqli_query($conn,"update user_keywords set keyword='".addslashes($_REQUEST['keyword'])."' where keyword_id='".$_REQUEST['id']."'");
	
	break;
	
	
	
	
	case "deletekeyword":
	
	
		mysqli_query($conn,"delete from user_keywords where keyword_id='".$_REQUEST['id']."'  ");
       
	   
	
	break;
	
	
	
	
	
	
	
	
	case "updatetotal":
	
	
	
	
	$ky = base64_decode($_REQUEST['keywords']);
	
		$ext = explode(' ',base64_decode($_REQUEST['keywords']));
	
	$srch = '';
	
	for($i=0;$i<sizeof($ext);$i++)
	
	{
	
		if($i==0)
		
		$srch .="offer_title like '%".$ext[$i]."%'";
		
		else
		
		$srch .=" or offer_title like '%".$ext[$i]."%'";
		
		
	}
	
	if($srch!='')
	
	$srch .=" or offer_price = '$".base64_decode($_REQUEST['price'])."'";

	
	    $cat = $_REQUEST['sub_cat'];

    $setcat = '';

    if(!empty($cat))
	
	$setcat = " or offer_cat like '".$cat."'   ";

	
	
	
	
	
	
	
	
	  $arrayget = $obj->selectAll('posted_offers','*'," ".$srch."  ".$setcat."  ",'order by offer_id DESC');
  
  
      $rowstotal = $obj->CountAllRows('posted_offers','*'," ".$srch."  ".$setcat."  ",'order by offer_id DESC');
	  
	  mysqli_query($conn,"update user_saved_searches set total_results='".$rowstotal."' where save_id='".$_REQUEST['total']."' ");
	  
 
  $st ='<div id="srchmain_'.$_REQUEST['total'].'">';
  
  
 foreach($arrayget as $array)

          {



$st .= ' <div id="main_'.$array['offer_id'].'"><div class="borderouter" id="'.$array['offer_id'].'"><div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;"><div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">'.$obj->getuser00($array['offer_posted_user']).$obj->showjqueryfunctions00($array['offer_id']).'</div><div class="col-lg-7 col-xs-8 col-sm-9 col-md-8 "><div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset"><div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;" id="title_'.$array['offer_id'].'">'.$obj->GetUserName($array['offer_posted_user']).'</div><div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 paddingleftright" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;margin-bottom:10px;" >';




if(sizeof($ext)>1)

{
	$st .=str_replace($ext[0],'<span style="color:red;">'.$ext[0].'</span>',str_replace($ext[1],'<span style="color:red;">'.$ext[2].'</span>',str_replace($ext[3],'<span style="color:red;">'.$ext[4].'</span>',str_replace($ext[5],'<span style="color:red;">'.$ext[6].'</span>',$array['offer_title']))));

	
}
else

$st .=str_replace($ky,'<span style="color:red;">'.$ky.'</span>',$array['offer_title']);



$st .='</div>'.$obj->getofferimages00($array['offer_id'],$array['offer_posted_user']).'
</div></div><div class="col-lg-3 col-xs-3 col-sm-2 col-md-3 pddgsett" style=" text-align:right;"><div style="float:right;font-family:Arial, Helvetica, sans-serif; "  class="font_sett01"><span style="color:#0e1131;font-weight:bold;">'.$array['offer_price'].'</span> <span style="color:#7e7e7e;">| '.datediff2($array['offer_posted_date']).'</span></div></div></div><div style="margin-bottom:10px; text-align:left;" class="col-lg-3 col-xs-3 col-sm-3 col-md-3">'.$obj->hashtags00($array['offer_id'],convert_links($array['offer_title'])).'</div><div style="margin-bottom:10px; text-align:right;" class="col-lg-9 col-xs-9 col-sm-9 col-md-9">
'.$obj->buttons00search($array['offer_id'],$array['offer_posted_user']).'
</div></div></div>';
     
	/*'.$obj->buttons00($array['offer_id'],$array['offer_posted_user']).'*/
	 
	 
	  }	
	


echo $st.'</div>';



	
	
	
	
	break;
	
	
	case "deletesearch":
	
	mysqli_query($conn,"delete from user_saved_searches  where save_id='".$_REQUEST['id']."' ");

	
	break;
	
	
	
	case "updatesearchval":
	
	mysqli_query($conn,"update user_saved_searches set keywords='".addslashes($_REQUEST['keyword'])."',amount= '".addslashes($_REQUEST['amount1'])."' ,amount2= '".addslashes($_REQUEST['amount2'])."' ,category= '".addslashes($_REQUEST['sub_cat'])."'   where save_id='".$_REQUEST['id']."' ");
	
	break;
	
	
	
	case "postoffer":
	
	
	if(empty($_POST['desc']))
	{echo 'error';exit;}
	
	$price = explode('$',$_POST['desc']);

	$price = explode(' ',$price[1]);
	
	if($_POST['buyer_price']=='')
	
	$price  = '$'.$price[0];

	else
	
	$price  = $_POST['buyer_price'];

    $exp = explode(',',$_POST['uploadedimages']);
   
  
   
   $price_clean = preg_replace('/[^A-Za-z0-9\-]/', '', $price);
   
   
   $expf = explode('$',$price_clean);

   if(sizeof($expf)==1)

   $price_clean = '$'.$price_clean; 
   

$stmt = mysqli_query($conn,"insert into bids_against_offers set offer_title='".addslashes($_POST['desc'])."',user_id='".$_SESSION['user_session']."' , posted_date='".time()."',bid_price='".$price_clean."',offer_id='".$_POST['offerid']."'");


$id = mysqli_insert_id($conn);	




if(count($_FILES["upload_file"]["name"])>0)	

{
	
	for($i=0;$i<count($_FILES["upload_file"]["name"]);$i++)
	{
	 
	 
	      if(in_array($_FILES["upload_file"]["name"][$i],$exp))
	        
		  {
			 
			 $uploadfile=$_FILES["upload_file"]["tmp_name"][$i];
			 
			 //exit;
			 
			 $uploadfile=$_FILES["upload_file"]["tmp_name"][$i];
			 
			 $folder="images/bids/".$id;
			 
			 if(!is_dir($folder))
			 
			 mkdir($folder);
			 
			  if (($_FILES["upload_file"]["type"][$i] == "image/gif") || ($_FILES["upload_file"]["type"][$i] == "image/jpeg") || ($_FILES["upload_file"]["type"][$i] == "image/png") || ($_FILES["upload_file"]["type"][$i] == 'image/pjpeg') || ($_FILES["upload_file"]["type"][$i] == "image/jpg"))
			 
			 move_uploaded_file($_FILES["upload_file"]["tmp_name"][$i], "$folder/".$_FILES["upload_file"]["name"][$i]);
			 
			 
			 
			$path = $_FILES['upload_file']['name'][$i];
            
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			 
			
			  
			  
			  if($ext=='')
			  
			  {}
			  
			  else
			  
			  {
				  
			  $new_name = md5(time()).mt_rand(1000,5000).$ext;	  
			 
			  rename("$folder/".$_FILES["upload_file"]["name"][$i],"$folder/".$new_name);
			 
			  $new_name = "$folder/".$new_name;
			  
			  
			  $url = $new_name;

        	  $filename = compress_image($new_name, $new_name, 80);
			 
			 
			 unlink("$folder/".$_FILES["upload_file"]["name"][$i]);
			 
			 
			  if(file_exists($new_name) and is_file($new_name))
			 
			 
			 $stmt2 = mysqli_query($conn,"insert into bids_against_offers_images set bid_id='".$id."',image_name='".$new_name."' , user_id='".$_SESSION['user_session']."'");
			 
			
			 
			  }
	
	 
		}
	 
	 
	 
	 
	}

}
	
	echo $id;
	
	
	break;
	
	
	
	case "postofferpopup":
	
	
	if(empty($_POST['desc']))
	{echo 'error';exit;}
	
	

    $exp = explode(',',$_POST['uploadedimages']);

	
	$price = $obj->getprice($_POST['desc'],$_POST['buyer_price'],$_POST['offerid']);
	
   
   
mysqli_query($conn,"update bids_against_offers set bid_edit='1' where  bid_id='".$_REQUEST['oldbidid']."'");

$acceptted_methods = array();

if($_POST['has_paypal']!='')

$acceptted_methods[]='paypal / online credit & debit cards'; 

if($_POST['has_check']!='')

$acceptted_methods[]='check'; 

if($_POST['has_morder']!='')

$acceptted_methods[]='money order'; 

if($_POST['has_cash']!='')

$acceptted_methods[]='cash'; 

if($_POST['has_cdebit']!='')

$acceptted_methods[]='in-store credit & debit cards'; 


if($_POST['facbk']!='')

$acceptted_methods[]='facebook payments'; 




$shipping = '';

$shipping_methods_dummy = array();

if($_POST['has_ship']!='')
{
$shipping .= 'ships via ';

$shipping_methods_dummy[]  = $_POST['has_ship'];
}
if($_POST['shipment']!='')
{
  $shipping .= $_POST['shipment'];
  
  $shipping_methods_dummy[]  = $_POST['shipment'];
  
}
if($_POST['bdays']!='')
{
$shipping .= ' in '.$_POST['bdays'];

$shipping_methods_dummy[]  = $_POST['bdays'];

}
if($_POST['price_shipping']!='')
{
$shipping .= ' for $'.$_POST['price_shipping'];


}
if($_POST['tracking']!='')
{
$shipping .= ' '.$_POST['tracking'];

$shipping_methods_dummy[]  = $_POST['tracking'];

}

if($_POST['pickup']!='')
{
$pickup_methods = $_POST['pickup'];

$shipping_methods_dummy[]  = $_POST['pickup_methods'];
}


$price_clean = preg_replace('/[^A-Za-z0-9\-]/', '', $price);


$addg = explode('$',$price_clean);

if(sizeof($addg)==1)

$price_clean = '$'.$price_clean;



$stmt = mysqli_query($conn,"insert into bids_against_offers set offer_title='".addslashes($_POST['desc'])."',user_id='".$_SESSION['user_session']."' , posted_date='".time()."',bid_price='".$price_clean."',offer_id='".$_POST['offerid']."', pickup_methods='".$pickup_methods."' , acceptted_methods='".implode(',',$acceptted_methods)."',shipping_methods='".$shipping."',shipping_methods_dummy='".implode(',',$shipping_methods_dummy)."',price_shipping='".$_POST['price_shipping']."' ");


$id = mysqli_insert_id($conn);	




if(count($_FILES["upload_file"]["name"])>0)	

{
	
	for($i=0;$i<count($_FILES["upload_file"]["name"]);$i++)
	{
	 
	 
	      if(in_array($_FILES["upload_file"]["name"][$i],$exp))
	        
		  {
			 
			 $uploadfile=$_FILES["upload_file"]["tmp_name"][$i];
			 
			 //exit;
			 
			 $uploadfile=$_FILES["upload_file"]["tmp_name"][$i];
			 
			 $folder="images/bids/".$id;
			 
			 if(!is_dir($folder))
			 
			 mkdir($folder);
			 
			  if (($_FILES["upload_file"]["type"][$i] == "image/gif") || ($_FILES["upload_file"]["type"][$i] == "image/jpeg") || ($_FILES["upload_file"]["type"][$i] == "image/png") || ($_FILES["upload_file"]["type"][$i] == 'image/pjpeg') || ($_FILES["upload_file"]["type"][$i] == "image/jpg"))
			 
			 move_uploaded_file($_FILES["upload_file"]["tmp_name"][$i], "$folder/".$_FILES["upload_file"]["name"][$i]);
			 
			 
			 
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

			 else
			 
			 $ext = ''; 
			 
			 
			  if($ext=='')
			  
			  {}
			  
			  else
			  
			  {
			 
			 
			  $new_name = md5(time()).mt_rand(1000,5000).$ext;
			 
			  rename("$folder/".$_FILES["upload_file"]["name"][$i],"$folder/".$new_name);
			 
			  $new_name = "$folder/".$new_name;
			  
			  $url = $new_name;

        	  $filename = compress_image($new_name, $new_name, 80);
			 
			 
			  unlink("$folder/".$_FILES["upload_file"]["name"][$i]);
			 
			 
			  if(file_exists($new_name) and is_file($new_name))
			 
			 
			 $stmt2 = mysqli_query($conn,"insert into bids_against_offers_images set bid_id='".$id."',image_name='".$new_name."' , user_id='".$_SESSION['user_session']."'");
			 
			 
			 
			  }
	
	 
		}
	 
	 
	 
	 
	}

}



if(sizeof($exp)>0)

{

	$oldbidid = $_POST['oldbidid'];	
	
	
	
	        $folder="images/bids/".$oldbidid;
			
			$folder2="images/bids/".$id;
			 
			 if(!is_dir($folder2))
			 
			 mkdir($folder2);
			 
			 for($i=0;$i<sizeof($exp);$i++)
			 
			 {
			
				copy($folder.'/'.$exp[$i],$folder2.'/'.$exp[$i]);
				
				 $stmt2 = mysqli_query($conn,"insert into bids_against_offers_images set bid_id='".$id."',image_name='".$folder2.'/'.$exp[$i]."' , user_id='".$_SESSION['user_session']."'");
				
				 
			 }
			 
			 
	
}






   if($_POST['uploadedvideo']!='')
	        
		  {
			 
			
			 
			 $uploadfile=$_FILES["upload_file2"]["tmp_name"];
			 
			 
			 $folder="images/bids/".$id;
			 
			 if(!is_dir($folder))
			 
			 mkdir($folder);
			 
			 
			  if (($_FILES["upload_file2"]["type"] == 'video/mp4') || ($_FILES["upload_file2"]["type"] == 'video/mp3')  || ($_FILES["upload_file2"]["type"] == 'audio/mpeg') || ($_FILES["upload_file2"]["type"] == 'video/3gpp') || ($_FILES["upload_file2"]["type"] == 'video/x-flv') || ($_FILES["upload_file2"]["type"] == 'video/mkv') || ($_FILES["upload_file2"]["type"] == 'video/mov') || ($_FILES["upload_file2"]["type"] == 'video/quicktime') )
			 
			 
			 move_uploaded_file($_FILES["upload_file2"]["tmp_name"], "$folder/".$_FILES["upload_file2"]["name"]);
			 
			 
			 
			
			  
			   if($_FILES['upload_file2']['type'] == 'video/mp3')
			 
			  $ext = '.mp3';
			  
			  if($_FILES['upload_file2']['type'] == 'video/mp4')
			 
			  $ext = '.mp4';
			  
			   if($_FILES['upload_file2']['type'] == 'video/Mp4')
			 
			  $ext = '.Mp4';
			  
			  
			  if($_FILES['upload_file2']['type']== 'audio/mpeg')
			 
			  $ext = '.mpeg';
			  
			  if($_FILES['upload_file2']['type'] == 'video/3gpp')
			 
			  $ext = '.3gpp';
			  
			  
			 if($_FILES['upload_file2']['type'] == 'video/x-flv')
			 
			  $ext = '.flv';
			  
			   if($_FILES['upload_file2']['type'] == 'video/mkv')
			 
			  $ext = '.mkv';
			  
			  
			  if($_FILES['upload_file2']['type'] == 'video/mov')
			 
			  $ext = '.mov';

			  
			 if($_FILES['upload_file2']['type'] == 'video/quicktime')
			 
			  $ext = '.mov';
			 
			 
			

			 
			 
			  $new_name = md5(time()).mt_rand(1000,5000).$ext;
			 
			  rename("$folder/".$_FILES["upload_file2"]["name"],"$folder/".$new_name);
			 
			  $new_name = "$folder/".$new_name;
			  
			  $url = $new_name;

        	 // echo $new_name;	
			 
			 
			 // video conversion
			 
			 
			    $srcFile = "/home/wowme/public_html/".$new_name;
				$destFile = "/home/wowme/public_html/".$folder."/";
				$ffmpegPath = "/usr/local/bin/ffmpeg";
				$flvtool2Path = "/usr/local/bin/flvtool2";
                
				$unique_name  =  md5(time()).mt_rand(1000,5000);
				

exec("".$ffmpegPath." -i ".$srcFile." -vcodec h264 -vf scale=320:480 -acodec aac -strict -2 ".$destFile.$unique_name.".mp4");
			 

			 if(file_exists($destFile.$unique_name.'.mp4') and is_file($destFile.$unique_name.'.mp4'))
			{ 
			 $save_file = $destFile.$unique_name.'.mp4';
			
			 unlink($new_name);			
			
			}
			 else
			 
			 $save_file = $new_name;
			 
			 // ends here
			 
			 
			  if(file_exists(str_replace('/home/wowme/public_html/','',$save_file)) and is_file(str_replace('/home/wowme/public_html/','',$save_file)))
			 
			  $stmt2 = mysqli_query($conn,"insert into bids_against_offers_images set bid_id='".$id."',image_name='".str_replace('/home/wowme/public_html/','',$save_file)."' , user_id='".$_SESSION['user_session']."',file_type='video'");
			 
			
			
			// after insert then update the older one which was edited   			 
	
	  $stmt2 = mysqli_query($conn,"update bids_against_offers_images set edited=1 where bid_id='".$_REQUEST['oldbidid']."' and  user_id='".$_SESSION['user_session']."' and file_type='video'");
		}

	
	echo $id;
	
	
	break;
	
	
	
/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/	
	
	case "postofferupdate":
	
	
	if(empty($_POST['desc']))
	{echo 'error';exit;}
	
	

    $exp = explode(',',$_POST['uploadedimages']);

	
	$price = explode('$',$_POST['desc']);

	$price = explode(' ',$price[1]);

    $exp = explode(',',$_POST['uploadedimages']);
   
    $message = strip_tags(trim($_POST['desc']));
    
	$hashtag = gethashtags($message);


$stmt = mysqli_query($conn,"update posted_offers set offer_title='".addslashes($_POST['desc'])."',offer_posted_user='".$_SESSION['user_session']."' , offer_posted_date='".time()."',offer_price='$".$price[0]."',offer_cat ='".$_POST['sub_cat']."',hashtags='".$hashtag."' where offer_id='".$_POST['offerid']."'");

	


if(count($_FILES["upload_file"]["name"])>0 and $_FILES["upload_file"]["name"][0]!='')	

{
	
	mysqli_query($conn,"delete from posted_offers_images where user_id='".$_SESSION['user_session']."' and offer_id='".$_POST['offerid']."'");
	
	$imgg_name = '';
	
	for($i=0;$i<count($_FILES["upload_file"]["name"]);$i++)
	{
	 
	 
	      if(in_array($_FILES["upload_file"]["name"][$i],$exp))
	        
		  {
			 
			 $uploadfile=$_FILES["upload_file"]["tmp_name"][$i];
			 
			 //exit;
			 
			 $uploadfile=$_FILES["upload_file"]["tmp_name"][$i];
			 
			 $folder="images/offers/".$_POST['offerid'];
			 
			 if(!is_dir($folder))
			 
			 mkdir($folder);
			 
			  if (($_FILES["upload_file"]["type"][$i] == "image/gif") || ($_FILES["upload_file"]["type"][$i] == "image/jpeg") || ($_FILES["upload_file"]["type"][$i] == "image/png") || ($_FILES["upload_file"]["type"][$i] == 'image/pjpeg') || ($_FILES["upload_file"]["type"][$i] == "image/jpg"))
			 
			 move_uploaded_file($_FILES["upload_file"]["tmp_name"][$i], "$folder/".$_FILES["upload_file"]["name"][$i]);
			 
			 
			 
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

			 
			 
			 
			  $new_name = md5(time()).mt_rand(1000,5000).$ext;
			 
			  rename("$folder/".$_FILES["upload_file"]["name"][$i],"$folder/".$new_name);
			 
			  $new_name = "$folder/".$new_name;
			  
			  $url = $new_name;

        	  $filename = compress_image($new_name, $new_name, 80);
			 
			 
			 
			  if(file_exists($new_name) and is_file($new_name))
			 
			 
			 $stmt2 = mysqli_query($conn,"insert into posted_offers_images set user_id='".$_SESSION['user_session']."' , offer_id='".$_POST['offerid']."',image_name='".$new_name."' ");
	
	
	$imgg_name[] = $new_name;
	 
		}
	 
	 
	 
	 
	}

}



echo $price[0].'#'.implode(',',$imgg_name);

	
	break;
	
/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/	
	
	
	
	
	
	case "getlastreply":
	
	
	$q = mysqli_query($conn,"select * from bid_replies where  user_id = '".$_SESSION['user_session']."' and reply_id='".$_POST['reply_id']."' ");
      

	      $arrayget = mysqli_fetch_array($q);
		  
		 
	if($_POST['page']=='2')
	
	$outborder = '';
	
	else
	$outborder = ' class="borderouter" ';
	


         ?>    
		   
           <div id="reply_<?php echo $arrayget['reply_id']; ?>">
           
           <div  <?php echo $outborder; ?> id="repl_<?php echo $arrayget['reply_id']; ?>">
           	
           <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">

            <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">

       <?php

         $obj->getuser($arrayget['user_id']);

       ?>

           </div>

          <div class="col-lg-7 col-xs-8 col-sm-9 col-md-8 ">

               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">

           <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;">

      <?php echo $obj->GetUserName($arrayget['user_id']); ?>

        </div>

        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 paddingleftright" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;margin-bottom:10px;">        

	  <?php echo $arrayget['reply_text']; ?>     

        </div>

      <?php $obj->reply_images('',$arrayget['user_id'],$arrayget['reply_id']); ?>

        </div> 
        
      </div>

        <div class="col-lg-3 col-xs-3 col-sm-2 col-md-3 pddgsett" style=" text-align:right;">

       <div style="float:right;font-family:Arial, Helvetica, sans-serif; "  class="font_sett01"><?php echo datediff2($arrayget['reply_date']);?>
        
         </span>
         
       </div>
       
     </div>

   <!--body navigation ends-->
      </div>

      <div style="margin-bottom:10px; text-align:right;" class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      
    

     <?php //$obj->buttons($arrayget['offer_id'],$arrayget['offer_posted_user']); ?>

     </div>
     
     </div>
   </div>  
     <?php
	
	
	break;
	
	case "getoffers":
	
	global $conn;
	
	
	
	
	 //echo $_FILES["upload_file2"]["type"];exit;
	
		
	
	
	
	$price = explode('$',$_POST['desc']);

	$price = explode(' ',$price[1]);

    $exp = explode(',',$_POST['uploadedimages']);
	
	
   
    $message = strip_tags(trim($_POST['desc']));
    
	$hashtag = gethashtags($message);
	
	$price_clean = preg_replace('/[^A-Za-z0-9\-]/', '', $price[0]);


$stmt = mysqli_query($conn,"insert into posted_offers set offer_title='".addslashes($_POST['desc'])."',offer_posted_user='".$_SESSION['user_session']."' , offer_posted_date='".time()."',offer_price='$".$price_clean."',offer_cat ='".$_POST['sub_cat']."',hashtags='".$hashtag."'");


$id = mysqli_insert_id($conn);	




if(count($_FILES["upload_file"]["name"])>0)	

{
	
	for($i=0;$i<count($_FILES["upload_file"]["name"]);$i++)
	{
	 
	 
	      if(in_array($_FILES["upload_file"]["name"][$i],$exp))
	        
		  {
			 
			 $uploadfile=$_FILES["upload_file"]["tmp_name"][$i];
			 
			 //exit;
			 
			 $uploadfile=$_FILES["upload_file"]["tmp_name"][$i];
			 
			 $folder="images/offers/".$id;
			 
			 if(!is_dir($folder))
			 
			 mkdir($folder);
			 
			 
			  if (($_FILES["upload_file"]["type"][$i] == "image/gif") || ($_FILES["upload_file"]["type"][$i] == "image/jpeg") || ($_FILES["upload_file"]["type"][$i] == "image/png") || ($_FILES["upload_file"]["type"][$i] == 'image/pjpeg') || ($_FILES["upload_file"]["type"][$i] == "image/jpg") || ($_FILES["upload_file"]["type"][$i] == 'video/mp4') || ($_FILES["upload_file"]["type"][$i] == 'video/mp3')  || ($_FILES["upload_file"]["type"][$i] == 'audio/mpeg') || ($_FILES["upload_file"]["type"][$i] == 'video/3gpp') || ($_FILES["upload_file"]["type"][$i] == 'video/quicktime'))
			 
			 
			 move_uploaded_file($_FILES["upload_file"]["tmp_name"][$i], "$folder/".$_FILES["upload_file"]["name"][$i]);
			 
			 
			 
			 if($_FILES['upload_file']['type'][$i] == 'image/png' )
			 
			 $ext = '.png';
			 
			 if( $_FILES['upload_file']['type'][$i] == 'image/jpeg' )
			 
			  $ext = '.jpeg';
			 
			 if($_FILES['upload_file']['type'][$i] == 'image/gif')
			 
			  $ext = '.gif';
			 
			 if($_FILES['upload_file']['type'][$i] == 'image/jpg')
			 
			  $ext = '.jpg';
			  
			   if($_FILES['upload_file']['type'][$i] == 'video/mp3')
			 
			  $ext = '.mp3';
			  
			  if($_FILES['upload_file']['type'][$i] == 'video/mp4')
			 
			  $ext = '.mp4';
			  
			  if($_FILES['upload_file']['type'][$i] == 'audio/mpeg')
			 
			  $ext = '.mpeg';
			  
			  if($_FILES['upload_file']['type'][$i] == 'video/3gpp')
			 
			  $ext = '.3gpp';
			  
			  
			 
			 
			 if($_FILES['upload_file']['type'][$i] == 'image/pjpeg')
 
            $ext = '.pjpeg'; 

			 
			 
			  $new_name = md5(time()).mt_rand(1000,5000).$ext;
			 
			  rename("$folder/".$_FILES["upload_file"]["name"][$i],"$folder/".$new_name);
			 
			  $new_name = "$folder/".$new_name;
			  
			  $url = $new_name;

        	  $filename = compress_image($new_name, $new_name, 80);
			 
			 
			  if(file_exists($filename) and is_file($filename))
			 
			 
			 $stmt2 = mysqli_query($conn,"insert into posted_offers_images set offer_id='".$id."',image_name='".$filename."' , user_id='".$_SESSION['user_session']."',file_type='image'");
	
	 
		}
	 
	 
	 
	 
	}

}

//echo $_POST['uploadedvideo'];





	      if($_POST['uploadedvideo']!='')
	        
		  {
			 
			
			 
			 $uploadfile=$_FILES["upload_file2"]["tmp_name"];
			 
			 
			 $folder="images/offers/".$id;
			 
			 if(!is_dir($folder))
			 
			 mkdir($folder);
			 
			 
			  if (($_FILES["upload_file2"]["type"] == 'video/mp4') || ($_FILES["upload_file2"]["type"] == 'video/mp3')  || ($_FILES["upload_file2"]["type"] == 'audio/mpeg') || ($_FILES["upload_file2"]["type"] == 'video/3gpp') || ($_FILES["upload_file2"]["type"] == 'video/x-flv') || ($_FILES["upload_file2"]["type"] == 'video/mkv') || ($_FILES["upload_file2"]["type"] == 'video/mov') || ($_FILES["upload_file2"]["type"] == 'video/quicktime') )
			 
			 
			 move_uploaded_file($_FILES["upload_file2"]["tmp_name"], "$folder/".$_FILES["upload_file2"]["name"]);
			 
			 
			 
			
			  
			   if($_FILES['upload_file2']['type'] == 'video/mp3')
			 
			  $ext = '.mp3';
			  
			  if($_FILES['upload_file2']['type'] == 'video/mp4')
			 
			  $ext = '.mp4';
			  
			   if($_FILES['upload_file2']['type'] == 'video/Mp4')
			 
			  $ext = '.Mp4';
			  
			  
			  if($_FILES['upload_file2']['type']== 'audio/mpeg')
			 
			  $ext = '.mpeg';
			  
			  if($_FILES['upload_file2']['type'] == 'video/3gpp')
			 
			  $ext = '.3gpp';
			  
			  
			 if($_FILES['upload_file2']['type'] == 'video/x-flv')
			 
			  $ext = '.flv';
			  
			   if($_FILES['upload_file2']['type'] == 'video/mkv')
			 
			  $ext = '.mkv';
			  
			  
			  if($_FILES['upload_file2']['type'] == 'video/mov')
			 
			  $ext = '.mov';

			  
			    if($_FILES['upload_file2']['type'] == 'video/quicktime')
			 
			  $ext = '.mov';
			 
			 
			

			 
			 
			  $new_name = md5(time()).mt_rand(1000,5000).$ext;
			 
			  rename("$folder/".$_FILES["upload_file2"]["name"],"$folder/".$new_name);
			 
			  $new_name = "$folder/".$new_name;
			  
			  $url = $new_name;

        	 // echo $new_name;	
			 
			 
			 // video conversion
			 
			 
			    $srcFile = "/home/wowme/public_html/".$new_name;
				$destFile = "/home/wowme/public_html/".$folder."/";
				$ffmpegPath = "/usr/local/bin/ffmpeg";
				$flvtool2Path = "/usr/local/bin/flvtool2";
                
				$unique_name  =  md5(time()).mt_rand(1000,5000);
				

exec("".$ffmpegPath." -i ".$srcFile." -vcodec h264 -vf scale=320:480 -acodec aac -strict -2 ".$destFile.$unique_name.".mp4");
			 

			 if(file_exists($destFile.$unique_name.'.mp4') and is_file($destFile.$unique_name.'.mp4'))
			{ 
			 $save_file = $destFile.$unique_name.'.mp4';
			
			 unlink($new_name);			
			
			}
			 else
			 
			 $save_file = $new_name;
			 
			 // ends here
			 
			 
			 
			 
			if(file_exists(str_replace('/home/wowme/public_html/','',$save_file)) and is_file(str_replace('/home/wowme/public_html/','',$save_file)))
			 
			 $stmt2 = mysqli_query($conn,"insert into posted_offers_images set offer_id='".$id."',image_name='".str_replace('/home/wowme/public_html/','',$save_file)."' , user_id='".$_SESSION['user_session']."',file_type='video'");
			 
			 
			 
			   			 
	
	 
		}
	 



	
	echo $id;
	
	
	
	
	break;
	
	
	case "getlastoffer":
	

    
		$q = mysqli_query($conn,"select * from posted_offers where  offer_posted_user = '".$_SESSION['user_session']."' and offer_id='".$_POST['offer_id']."' ");
      

	      $arrayget = mysqli_fetch_array($q);
		  
		 
		 
	  ?>

         <!--created offers against each user -->

         <div class="ajaxget">
         
		 <?php

        


         ?>    
		   
           <div id="main_<?php echo $arrayget['offer_id']; ?>">
           
           <div class="borderouter" id="<?php echo $arrayget['offer_id']; ?>">
           	
           <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">

            <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">

       <?php

         $obj->getuser($arrayget['offer_posted_user']);

       ?>

           </div>

          <div class="col-lg-7 col-xs-8 col-sm-9 col-md-8 ">

               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">

           <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;">

      <?php echo $obj->GetUserName($arrayget['offer_posted_user']); ?>

        </div>

     

        </div> 
        
      </div>

        <div class="col-lg-3 col-xs-3 col-sm-2 col-md-3 pddgsett" style=" text-align:right;">

       <div style="float:right;font-family:Arial, Helvetica, sans-serif; "  class="font_sett01"><span style="color:#0e1131;font-weight:bold;"><?php  echo $arrayget['offer_price'];  ?></span> <span style="color:#7e7e7e;">| <?php echo datediff2($arrayget['offer_posted_date']);?>
        
         </span>
         
       </div>
       
     </div>

   <!--body navigation ends-->
      </div>
      
      
      
      
      
        
        
        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom:10px; padding-right:0px;">
               <div class="col-lg-2 col-xs-1 col-sm-2 col-md-2 smallset">
                     </div>
           <div class="col-lg-10 col-xs-11 col-sm-10 col-md-10 " style="margin-top: -49px;">
               
               <div style="float:left;  padding-right:0px;" class="paddingleftset">
                <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:13px;color:#0e1131; font-weight:normal; width:100%;padding-left: 0px;"><?php 
				
				
				//if(!empty($_GET["keyword"])) 
				
				  echo convert_links($arrayget['offer_title']);
				
				//else
				
				//echo $array['offer_title'];
				
				
				 ?>     
</div>
        

        <?php $obj->getofferimages($arrayget['offer_id'],$arrayget['offer_posted_user']); ?>    
          

   

           </div> 
           
           </div></div>
        
        
        
        
        
        
        
        
        

     
      
      
      
      

     <div style="margin-bottom:10px; text-align:left;" class="col-lg-3 col-xs-3 col-sm-3 col-md-3">
    
     <?php $obj->hashtags($arrayget['offer_id'],$arrayget['offer_title']); ?>
    </div>	


      <div style="margin-bottom:10px; text-align:right;" class="col-lg-9 col-xs-9 col-sm-9 col-md-9">
      
    

     <?php $obj->buttons($arrayget['offer_id'],$arrayget['offer_posted_user']); ?>

     </div>
     
     </div>
   </div>  
     <?php
     
	
	
	
	
	break;
	
	
	
	case "deleteoffers":
	
	$offer_id = $_REQUEST['offer_id'];
	
	$obj->deleterecords('posted_offers'," offer_id='".$offer_id."'");
	
	$obj->deleterecords('bids_against_offers'," offer_id='".$offer_id."'");
	
	$obj->deleterecords('bid_replies'," offer_id='".$offer_id."'");
	
	unlink("images/offers/".$offer_id);
	
	
	break;
	
	
	case "deleteoffers2":
	
	$offer_id = $_REQUEST['offer_id'];
	
	$obj->deleterecords('bids_against_offers'," bid_id='".$offer_id."'");
	
	$obj->deleterecords('bid_replies'," bid_id='".$offer_id."'");
	
	unlink("images/bids/".$offer_id);
	
	
	break;
	
	
	case "getlastoffer2":
    
 
    $q = mysqli_query($conn,"select * from bids_against_offers where  bid_id = '".$_REQUEST['offer_id']."' ");
      

	$array = mysqli_fetch_array($q);
		 
	  $name = mysqli_fetch_array(mysqli_query($conn,"select offer_price from posted_offers where offer_id='".$array['offer_id']."'"));
	
	   //echo "select offer_price from posted_offers where offer_id='".$array['offer_id']."'"; 
		 
	  ?>

      
		   <div  id="mainoffer_<?php echo $_REQUEST['offer_id']; ?>">
          
           	
           <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">

            <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">

       <?php

         $obj->getuser($array['user_id']);

       ?>

           </div>

          <div class="col-lg-7 col-xs-8 col-sm-9 col-md-8 ">

               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">

           <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;" id="user__<?php echo $array['bid_id']; ?>">

      <?php echo $obj->GetUserName($array['user_id']); ?>

        </div>

       

     

        </div> 
        
      </div>

        <div class="col-lg-3 col-xs-3 col-sm-2 col-md-3 pddgsett" style=" text-align:right;">

       <div style="float:right;font-family:Arial, Helvetica, sans-serif; "  class="font_sett01"><span style="color:#0e1131;font-weight:bold;" id="datetime__<?php echo $array['bid_id']; ?>"><?php  echo $array['bid_price'];  ?></span> <span style="color:#7e7e7e;" id="datetime2__<?php echo $array['bid_id']; ?>">| <?php echo datediff2($array['posted_date']);?>
        
         </span>
         
       </div>
       
     </div>

   <!--body navigation ends-->
      </div>
      
      
      
      
      
      
      <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom:10px; padding-right:0px;">
               <div class="col-lg-2 col-xs-1 col-sm-2 col-md-2 smallset">
                     </div>
           <div class="col-lg-10 col-xs-11 col-sm-10 col-md-10 " style="margin-top: -49px;">
               
               <div style="float:left;  padding-right:0px;" class="paddingleftset">
                <div id="title__<?php echo $array['bid_id']; ?>" style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:13px;color:#0e1131; font-weight:normal; width:100%;padding-left: 0px;"><?php 
				
				
				
				
				 echo convert_links($array['offer_title']);
				
				
				
				
				 ?>     
</div>
        

        
      <?php 
 
 $obj->getbidimages($_REQUEST['offer_id'],$array['user_id']);
 
 
 ?>

          

   

           </div> 
           
           </div></div>
           
      
      
      
      
      
      
      
      
      

      <div style="margin-bottom:10px; text-align:right;" class="col-lg-12 col-xs-12 col-sm-12 col-md-12" id="makedisable__<?php echo $array['bid_id']; ?>">
      
    

     <?php $obj->buttonsmakeoffersedit2($_REQUEST['offer_id'],$array['user_id'],$array['bid_id']); ?>

     </div>
     
     
     
     <div class="modal fade" id="myModal_<?php echo $array['bid_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  
  <form id="myfrmis_<?php echo $array['bid_id']; ?>" method="post">
  
    <div class="modal-content">
     
      <div class="modal-body">
        <div style="margin-top:15px;">
        
        
        <div class="form-group" style="float:left;width:100%;"><textarea style="margin-top:10px;border:none; background:transparent;-webkit-box-shadow: unset;" class="form-control" name="desc" id="desc__<?php echo $array['bid_id']; ?>" placeholder="describe what you're offering, including the price (for example $5)" cols="" rows=""></textarea>
       
       </div>
        
        
        <?php
        
		$obj->getbidimagespopup($array['bid_id'],$array['user_id']);
		
		?>
        
        
        <div class="form-group">
		
          <label class="filebutton">

           <span><input type="file" id="uploadfile_<?php echo $array['bid_id']; ?>" name="upload_file[]"  class="required" multiple/></span>

          </label>

         </div>
         
          <div id="showhidethis_<?php echo $array['bid_id']; ?>" style="display:none;margin-top:10px;">
		  <img width="75" src="images/LOADING.gif">
		  </div>
        
        </div>
      </div>
      <div class="modal-footer">
       
        
        <input type="hidden" id="uploadedimages__<?php echo $array['bid_id']; ?>" name="uploadedimages" value="<?php echo $obj->imagenames($array['bid_id'],$array['user_id']); ?>">
        
        <input type="hidden" name="offerid" value="<?php echo $array['offer_id']; ?>">
       
        <input type="hidden" name="buyer_price" id="buyer_price__<?php echo $array['bid_id']; ?>" value="">
        
        <input type="hidden" name="option" value="postofferpopup">
        
        
        <input type="hidden" name="oldbidid" value="<?php echo $array['bid_id']; ?>">
        
        
        <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
        
        <button type="submit" class="btn btn-primary buttongreen">update</button>
        
      </div>
    </div>
    
    
    </form>
    
    
    
      <script>
	
	$("#uploadfile_<?php echo $array['bid_id']; ?>").on('change', function () {

     //Get count of selected files
     var countFiles = $(this)[0].files.length;
	 
	 if(countFiles>4)

   {

	 alert('not more than 4 images')

	 $('#uploadfile_<?php echo $array['bid_id']; ?>').val('');

	 $('#uploadfile_<?php echo $array['bid_id']; ?>').select();

	  return false

	 }
	 
	 else
	 
	 {

     var imgPath = $(this)[0].value;
	 
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
	    
		 if (typeof (FileReader) != "undefined") {

              $.each(this.files, function() {
				
				readURL__<?php echo $array['bid_id']; ?>(this);
			   
             })
			 

         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
	 
  }
	 
 });
 
 
 
  function readURL__<?php echo $array['bid_id']; ?>(file)
 
 {

		 var image_holder = $("#image-holder__<?php echo $array['bid_id']; ?>");
     
	 image_holder.empty();
		
		  var reader = new FileReader();
                 
				 reader.onload = function (e) 
				 
				 {
                      var picFile = e.target;
					
					 var vv = Math.floor((Math.random() * 100) + 1); 
					
					 $("<img />", {
                         "src": e.target.result,
                             "class": "thumb-image",
							  "width": "100",
							  "height": "100",
							  "id": "imm"+vv+""
                     }
					 
					 ).appendTo(image_holder);
					 
					 
					  $("<div id='imm_"+ vv +"' onclick=\"removeimg__<?php echo $array['bid_id']; ?>('imm"+ vv +"','imm_"+ vv +"','"+file.name+"')\" class='crossbutton'>X</div>").appendTo(image_holder);
                
				
				   latestval = $("#uploadedimages__<?php echo $array['bid_id']; ?>").val();
				   
				   if(latestval=='')
				   
				   $("#uploadedimages__<?php echo $array['bid_id']; ?>").val(file.name)
				   
				   else if(file.name!='')
				   
				   $("#uploadedimages__<?php echo $array['bid_id']; ?>").val(latestval+','+file.name)
				
				 }
				 
				 reader.readAsDataURL(file);
				 
				//var filenameis = $(this)[0].files[i].name;
					
                 image_holder.show();
	 
}
 
 
 function removeimg__<?php echo $array['bid_id']; ?>(id,id2,img)

{

var str = $("#uploadedimages__<?php echo $array['bid_id']; ?>").val();	

st = str.split(',');

arr = [];

array = arr.concat(st);

array = $.grep(array, function(value) {
  return value != img;
});


 array.toString();
 
 $("#uploadedimages__<?php echo $array['bid_id']; ?>").val(array)

//alert(array)

$("#"+id).remove();

$("#"+id2).remove();
	
}
 
 
 $("#myfrmis_<?php echo $array['bid_id']; ?>").on('submit',(function(e) {
		
		if(validatefirst__<?php echo $array['bid_id']; ?>())
		{
			
		$('#showhidethis_<?php echo $array['bid_id']; ?>').css('display','block');
		
		e.preventDefault();
		$.ajax({
        	url: "ajax.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			beforeSend : function()
			{
				
				//$('#myModal_<?php echo $array['bid_id']; ?>').html('<img width="75" src="images/LOADING.gif">')
				
				
				
			},
			success: function(data)
		    {
				if(data=='invalid')
				{
					
				}
				else
				{
					//alert(data)
					// view uploaded file.
					//$("#preview").html(data).fadeIn();
					$("#myfrmis_<?php echo $array['bid_id']; ?>")[0].reset();	
					
					$("#image-holder__<?php echo $array['bid_id']; ?>").html('');
					
					$("#image-holder__<?php echo $array['bid_id']; ?>").html('<span style="color:red"></span>');
					
					
					$("#uploadedimages__<?php echo $array['bid_id']; ?>").val('');
					
					loadlastoffer001(data,'<?php echo $array['bid_id']; ?>');
					
				}
		    },
		  	error: function(e) 
	    	{
				
				
				alert('error')
	    	} 	        
	   });
	   
	}
	
	else
	{
	  
	  e.preventDefault();
	  
	  return false;
	
	}
	   
	}));
 
 
 function validatefirst__<?php echo $array['bid_id']; ?>()

{

	  var counter = 0;
	  
	 

	   if($('#desc__<?php echo $array['bid_id']; ?>').val()=='')

	   {
		alert('please enter description')

		$('#desc__<?php echo $array['bid_id']; ?>').select();
		
		counter=1;

		return false;

		}
		
		var str = $('#desc__<?php echo $array['bid_id']; ?>').val();
	
	    var res = str.split("$");
	    
		
		if(res.length==1)
		
		{
			
			counter=1;
			
			alert('please don\'t forget to include the price in your offer (for example $5)');

		return false;
			
		}
		
		
		else if(res.length==1)
		
		{
		
		   $('#buyer_price__<?php echo $array['bid_id']; ?>').val('<?php echo $name['offer_price']; ?>');
	
			
		}
		
		else
		{
			
			if(res.length>1)
			
			var res2 = res[1].split(" "); 
			
			
			
			if(res2[0]=='')
			{
			  
			  $('#buyer_price__<?php echo $array['bid_id']; ?>').val('<?php echo $name['offer_price']; ?>');
			  
			  
			}
		
		}
		
		
		
		if(counter==0)
		return true;
		
		
		
	
}
 
 
	
	</script>
    
    
    
    
    
    
  </div>
</div>
     
     </div>
  
   
    
    
    <?php
	   
   
    break;
	
	
	case "getlastoffer2happen":
    
 
    $q = mysqli_query($conn,"select * from bids_against_offers where  bid_id = '".$_REQUEST['offer_id']."' ");
      

	$array = mysqli_fetch_array($q);
		 
		
	    
		 
	  ?>

      
		   <div  id="mainoffer_<?php echo $_REQUEST['offer_id']; ?>">
          
           	
           <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">

            <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">

       <?php

         $obj->getuser($array['user_id']);

       ?>

           </div>

          <div class="col-lg-7 col-xs-8 col-sm-9 col-md-8 ">

               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">

           <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;" id="user__<?php echo $array['bid_id']; ?>">

      <?php echo $obj->GetUserName($array['user_id']); ?>

        </div>

       

     

        </div> 
        
      </div>

        <div class="col-lg-3 col-xs-3 col-sm-2 col-md-3 pddgsett" style=" text-align:right;">

       <div style="float:right;font-family:Arial, Helvetica, sans-serif; "  class="font_sett01"><span style="color:#0e1131;font-weight:bold;" id="datetime__<?php echo $array['bid_id']; ?>"><?php  echo $array['bid_price'];  ?></span> <span style="color:#7e7e7e;" id="datetime2__<?php echo $array['bid_id']; ?>">| <?php echo datediff2($array['posted_date']);?>
        
         </span>
         
       </div>
       
     </div>

   <!--body navigation ends-->
      </div>
      
      
      
      
      
      
      
      
      
      
      
        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom:10px; padding-right:0px;">
               <div class="col-lg-2 col-xs-1 col-sm-2 col-md-2 smallset">
                     </div>
           <div class="col-lg-10 col-xs-11 col-sm-10 col-md-10 " style="margin-top: -49px;">
               
               <div style="float:left;  padding-right:0px;" class="paddingleftset">
                <div id="title__<?php echo $array['bid_id']; ?>"  style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:13px;color:#0e1131; font-weight:normal; width:100%;padding-left: 0px;"><?php 
				
				
				//if(!empty($_GET["keyword"])) 
				
				   echo $array['offer_title'];    
				
				//else
				
				//echo $array['offer_title'];
				
				
				 ?>     
</div>
        

        
      <?php $obj->getbidimages($_REQUEST['offer_id'],$array['user_id']);?>

          

   

           </div> 
           
           </div></div>
        
        
      
      
      
      
      
      
      

      <div style="margin-bottom:10px; text-align:right; padding-left:0px;" class="col-lg-12 col-xs-12 col-sm-12 col-md-12" id="makedisable__<?php echo $array['bid_id']; ?>">
      
    
    
    
    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingzero payments" style="color: #7f7f7f;
  padding-left:0px;
    font-size: 13px;
    font-weight: normal;
    text-align:left;"><ul><?php 
  
  if(!empty(trim($array['acceptted_methods'])))
 
  {
	  
 echo '<li>accepts '.str_replace(',',', ',$array['acceptted_methods']);
  
  echo '</li>';
  
  }
  
  if(!empty(trim($array['shipping_methods'])))
  
  {
  
  echo '<li>'.$array['shipping_methods'];
  
  echo '</li>';
 
  }
  
  
  if(!empty(trim($array['pickup_methods'])))
  
  {
  
  echo '<li>'.$array['pickup_methods'].'</li>';
  
  }

  
  
  
   ?> </ul> </div>
    
    
    
    <div style="float:right; font-family:Tahoma, Geneva, sans-serif; font-size:15px; color:#878686; font-weight:bold;  margin-left: 13px;margin-top: 10px; text-align:right; " class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
    
    
    

     <?php $obj->buttonsmakeoffersedit2happen($_REQUEST['offer_id'],$array['user_id'],$array['bid_id']); ?>

</div>

     </div>
     
     
     
     <div class="modal fade" id="myModal_<?php echo $array['bid_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  
  <form id="myfrmis_<?php echo $array['bid_id']; ?>" method="post">
  
    <div class="modal-content">
     
      <div class="modal-body">
        <div style="margin-top:15px;">
        
        
        <div class="form-group" style="float:left;width:100%;"><textarea style="margin-top:10px;border:none; background:transparent;-webkit-box-shadow: unset;" class="form-control" name="desc" id="desc__<?php echo $array['bid_id']; ?>" placeholder="describe what you're offering, including the price (for example $5)" cols="" rows=""></textarea>
       
       </div>
        
        
        <?php
        
		$obj->getbidimagespopup($array['bid_id'],$array['user_id']);
		
		?>
        
        
        <div class="form-group">
		
          <label class="filebutton">

           <span><input type="file" id="uploadfile_<?php echo $array['bid_id']; ?>" name="upload_file[]"  class="required" multiple/></span>

          </label>

         </div>
         
          <div id="showhidethis_<?php echo $array['bid_id']; ?>" style="display:none;margin-top:10px;">
		  <img width="75" src="images/LOADING.gif">
		  </div>
        
        </div>
      </div>
      <div class="modal-footer">
       
        
        <input type="hidden" id="uploadedimages__<?php echo $array['bid_id']; ?>" name="uploadedimages" value="<?php echo $obj->imagenames($array['bid_id'],$array['user_id']); ?>">
        
        <input type="hidden" name="offerid" value="<?php echo $_REQUEST['offer_id']; ?>">
       
        <input type="hidden" name="buyer_price" id="buyer_price__<?php echo $array['bid_id']; ?>" value="">
        
        <input type="hidden" name="option" value="postofferpopup">
        
        
        <input type="hidden" name="oldbidid" value="<?php echo $array['bid_id']; ?>">
        
        
        <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
        
        <button type="submit" class="btn btn-primary buttongreen">update</button>
        
      </div>
    </div>
    
    
    </form>
    
    
    
      <script>
	
	$("#uploadfile_<?php echo $array['bid_id']; ?>").on('change', function () {

     //Get count of selected files
     var countFiles = $(this)[0].files.length;
	 
	 if(countFiles>4)

   {

	 alert('not more than 4 images')

	 $('#uploadfile_<?php echo $array['bid_id']; ?>').val('');

	 $('#uploadfile_<?php echo $array['bid_id']; ?>').select();

	  return false

	 }
	 
	 else
	 
	 {

     var imgPath = $(this)[0].value;
	 
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
	    
		 if (typeof (FileReader) != "undefined") {

              $.each(this.files, function() {
				
				readURL__<?php echo $array['bid_id']; ?>(this);
			   
             })
			 

         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
	 
  }
	 
 });
 
 
 
  function readURL__<?php echo $array['bid_id']; ?>(file)
 
 {

		 var image_holder = $("#image-holder__<?php echo $array['bid_id']; ?>");
     
	 image_holder.empty();
		
		  var reader = new FileReader();
                 
				 reader.onload = function (e) 
				 
				 {
                      var picFile = e.target;
					
					 var vv = Math.floor((Math.random() * 100) + 1); 
					
					 $("<img />", {
                         "src": e.target.result,
                             "class": "thumb-image",
							  "width": "100",
							  "height": "100",
							  "id": "imm"+vv+""
                     }
					 
					 ).appendTo(image_holder);
					 
					 
					  $("<div id='imm_"+ vv +"' onclick=\"removeimg__<?php echo $array['bid_id']; ?>('imm"+ vv +"','imm_"+ vv +"','"+file.name+"')\" class='crossbutton'>X</div>").appendTo(image_holder);
                
				
				   latestval = $("#uploadedimages__<?php echo $array['bid_id']; ?>").val();
				   
				   if(latestval=='')
				   
				   $("#uploadedimages__<?php echo $array['bid_id']; ?>").val(file.name)
				   
				   else if(file.name!='')
				   
				   $("#uploadedimages__<?php echo $array['bid_id']; ?>").val(latestval+','+file.name)
				
				 }
				 
				 reader.readAsDataURL(file);
				 
				//var filenameis = $(this)[0].files[i].name;
					
                 image_holder.show();
	 
}
 
 
 function removeimg__<?php echo $array['bid_id']; ?>(id,id2,img)

{

var str = $("#uploadedimages__<?php echo $array['bid_id']; ?>").val();	

st = str.split(',');

arr = [];

array = arr.concat(st);

array = $.grep(array, function(value) {
  return value != img;
});


 array.toString();
 
 $("#uploadedimages__<?php echo $array['bid_id']; ?>").val(array)

//alert(array)

$("#"+id).remove();

$("#"+id2).remove();
	
}
 
 
 $("#myfrmis_<?php echo $array['bid_id']; ?>").on('submit',(function(e) {
		
		if(validatefirst__<?php echo $array['bid_id']; ?>())
		{
			
		$('#showhidethis_<?php echo $array['bid_id']; ?>').css('display','block');
		
		e.preventDefault();
		$.ajax({
        	url: "ajax.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			beforeSend : function()
			{
				
				//$('#myModal_<?php echo $array['bid_id']; ?>').html('<img width="75" src="images/LOADING.gif">')
				
			},
			success: function(data)
		    {
				if(data=='invalid')
				{
					
				}
				else
				{
					//alert(data)
					// view uploaded file.
					//$("#preview").html(data).fadeIn();
					$("#myfrmis_<?php echo $array['bid_id']; ?>")[0].reset();	
					
					$("#image-holder__<?php echo $array['bid_id']; ?>").html('');
					
					$("#image-holder__<?php echo $array['bid_id']; ?>").html('<span style="color:red"></span>');
					
					
					$("#uploadedimages__<?php echo $array['bid_id']; ?>").val('');
					
					loadlastoffer001(data,'<?php echo $array['bid_id']; ?>');
					
				}
		    },
		  	error: function(e) 
	    	{
				
				
				alert('error')
	    	} 	        
	   });
	   
	}
	
	else
	{
	  
	  e.preventDefault();
	  
	  return false;
	
	}
	   
	}));
 
 
 function validatefirst__<?php echo $array['bid_id']; ?>()

{

	  var counter = 0;
	  
	 

	   if($('#desc__<?php echo $array['bid_id']; ?>').val()=='')

	   {
		alert('please enter description')

		$('#desc__<?php echo $array['bid_id']; ?>').select();
		
		counter=1;

		return false;

		}
		
		var str = $('#desc__<?php echo $array['bid_id']; ?>').val();
	
	    var res = str.split("$");
	    
		
		
		
		if(res.length==1)
		
		{
			
			counter=1;
			
			alert('please don\'t forget to include the price in your offer (for example $5)');

		return false;
			
		}
		
		else if(res.length==1)
		
		{
		
		   $('#buyer_price__<?php echo $array['bid_id']; ?>').val('<?php echo $name['offer_price']; ?>');
	
			
		}
		
		else
		{
			
			if(res.length>1)
			
			var res2 = res[1].split(" "); 
			
			
			
			if(res2[0]=='')
			{
			  
			  $('#buyer_price__<?php echo $array['bid_id']; ?>').val('<?php echo $name['offer_price']; ?>');
			  
			  
			}
		
		}
		
		
		
		if(counter==0)
		return true;
		
		
		
	
}
 
 
	
	</script>
    
    
    
    
    
    
  </div>
</div>
     
     </div>
  
   
    
    
    <?php
	   
   
    break;

	
	
	case "viewoffers":
    

	
         $arrayget = $obj->selectAll('bids_against_offers','*'," offer_id = '".$_POST['offer_id']."' ",' order by bid_id DESC ');

	  
		mysqli_query($conn,"update bids_against_offers set bid_visited=1 where offer_id = '".$_POST['offer_id']."' ");
		 
	  ?>

         <!--created offers against each user -->

         <div class="ajaxget">
         
		 <?php

          foreach($arrayget as $array)

          {


         ?>    
		   <div  id="mainsub_<?php echo $array['bid_id']; ?>" style="float:left;width:100%;">
           <div class="borderouter" id="bids_<?php echo $array['bid_id']; ?>">
           	
           <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">

            <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">

       <?php

         $obj->getuser($array['user_id']);

       ?>

           </div>

          <div class="col-lg-7 col-xs-8 col-sm-9 col-md-8 ">

               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">

           <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;">

      <?php echo $obj->GetUserName($array['user_id']); ?>

        </div>

        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 paddingleftright" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;margin-bottom:10px;">        

	  <?php echo convert_links($array['offer_title']); ?>     

        </div>


     

        </div> 
        
      </div>

        <div class="col-lg-3 col-xs-3 col-sm-2 col-md-3 pddgsett" style=" text-align:right;">

       <div style="float:right;font-family:Arial, Helvetica, sans-serif; "  class="font_sett01"><span style="color:#0e1131;font-weight:bold;"><?php  echo $array['bid_price'];  ?></span> <span style="color:#7e7e7e;">| <?php echo datediff2($array['posted_date']);?>
        
         </span>
         
       </div>
       
     </div>

   <!--body navigation ends-->
      </div>
      
      <div class="col-lg-2 col-xs-2 col-sm-2 col-md-2"></div>
      
      <div class="col-lg-10 col-xs-10 col-sm-10 col-md-10">

            <div style="float:left;  padding-right:0px;margin-bottom: 10px;
    margin-top: -23px;">

     
      <?php $obj->getbidimages($array['bid_id'],$array['user_id']);?> 
      
     </div> 

      <div style="margin-bottom:10px; text-align:right;" class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      
    

     <?php $obj->buttonsbids($array['offer_id'],$array['user_id'],$array['bid_id']); ?>

     </div>
     
     </div>
    </div> 
     <?php
     
	  }
	 
   
    break;
	
	
	case "viewoffers2":
        
		
		$fields =array('offer_id'); 
		
		$rowsret = $obj->CountAllRows('bids_against_offers',$fields," offer_id = '".$_REQUEST['offer_id']."' ",'');
		
		mysqli_query($conn,"update bid_replies set visited=1 where offer_id = '".$_REQUEST['offer_id']."' ");
		
		
    if($rowsret>0)
	
	{


  $arrayget = $obj->selectAll('bids_against_offers','*'," offer_id = '".$_REQUEST['offer_id']."' ",'order by bid_id DESC');



  $name = mysqli_fetch_array(mysqli_query($conn,"select offer_price from posted_offers where offer_id='".$_REQUEST['offer_id']."'"));



         foreach((array)$arrayget as $array)

          {
		
		 $lastidis = 'mainsub_'.$array['bid_id'];	

         ?>    
		   <div  id="mainsub_<?php echo $array['bid_id']; ?>" style="float:left;width:100%;">
         
           	
           <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px; ">

            <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">

       <?php

         $obj->getuser($array['user_id']);

       ?>

           </div>

          <div class="col-lg-7 col-xs-8 col-sm-9 col-md-8 ">

               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">

           <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;" id="user__<?php echo $array['bid_id']; ?>">

      <?php echo $obj->GetUserName($array['user_id']); ?>
      
      

        </div>
        
       

     
     

        </div> 
        
      </div>

        <div class="col-lg-3 col-xs-3 col-sm-2 col-md-3 pddgsett" style=" text-align:right;">

       <div style="float:right;font-family:Arial, Helvetica, sans-serif; "  class="font_sett01"><span style="color:#0e1131;font-weight:bold;" id="datetime2__<?php echo $array['bid_id']; ?>"><?php  echo $array['bid_price'];  ?></span> <span style="color:#7e7e7e;" id="datetime__<?php echo $array['bid_id']; ?>">| <?php echo datediff2($array['posted_date']);?>
        
         </span>
         
       </div>
       
     </div>

   <!--body navigation ends-->
      </div>
      
      
      
      
       
        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom:10px; padding-right:0px;">
               <div class="col-lg-2 col-xs-1 col-sm-2 col-md-2 smallset">
                     </div>
           <div class="col-lg-10 col-xs-11 col-sm-10 col-md-10 " style="margin-top: -49px;">
               
               <div style="float:left;  padding-right:0px;" class="paddingleftset">
                <div id="title__<?php echo $array['bid_id']; ?>"  style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:13px;color:#0e1131; font-weight:normal; width:100%;padding-left: 0px;"><?php 
				
				
				
				
				  echo convert_links($array['offer_title']);
				
				
				
				
				 ?>     
</div>
        

        
      <?php 
 
 
 //$obj->getvideoimages($array['bid_id'],$array['user_id']);
 
 $obj->getbidimages($array['bid_id'],$array['user_id']);
 
 
 ?>

          

   

           </div> 
           
           </div></div>
        
        
        
        
        
       
      
      
      
      
      
      
      
      
      
      
      
      


<?php if($array['user_id']==$_SESSION['user_session']) { ?>
     
     
 
  <div style="margin-bottom:10px; text-align:right;" class="col-lg-12 col-xs-12 col-sm-12 col-md-12" id="makedisable__<?php echo $array['bid_id']; ?>">
      
    

     <?php $obj->buttonsmakeoffersedit($_REQUEST['offer_id'],$array['user_id'],$array['bid_id']); ?>

     </div>
     
     
     <div class="modal fade" id="myModal_<?php echo $array['bid_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  
  <form id="myfrmis_<?php echo $array['bid_id']; ?>" method="post">
  
    <div class="modal-content">
     
      <div class="modal-body">
        <div style="margin-top:15px;">
        
        
        <div class="form-group" style="float:left;width:100%;"><textarea style="margin-top:10px;border:none; background:transparent;-webkit-box-shadow: unset;" class="form-control" name="desc" id="desc__<?php echo $array['bid_id']; ?>" placeholder="describe what you're offering, including the price (for example $5)" cols="" rows=""></textarea>
       
       </div>
        
        
        <?php
        
		$obj->getbidimagespopup($array['bid_id'],$array['user_id']);
		
		$vdname =  $obj->videonames($array['bid_id'],$array['user_id']);
			 
		if(!empty($vdname))	 
			
		{
		
		?>
        
        <div class="col-lg-12" id="video-holder__<?php echo $array['bid_id']; ?>" style="margin-bottom:10px;float:left;">
		 
		 <div id="imm_21054_1__<?php echo $array['bid_id']; ?>" onclick="removevideo_<?php echo $array['bid_id']; ?>('video1__<?php echo $array['bid_id']; ?>','imm_21054_1__<?php echo $array['bid_id']; ?>','')" style="display:block;" class="crossbutton">X</div><video class="img-responsive" id="video1__<?php echo $array['bid_id']; ?>" controls="controls" style="display:block; width:100px; height:100px;"  preload="metadata" >
         
         
  <source src="<?php echo $vdname; ?>#t=0.8" type="video/mp4"></source>


         
         </video>
       </div>
     
         <?php
         
		}
		 ?>
         
         
          <div style="float:left; width:100%; text-align:left; padding-left:12px;"> 
		 
		 
		  <label class="filebutton" style="margin-bottom: -4px; background:none;font-size: 27px; padding-right:10px;height:auto; width:auto; cursor:pointer;">
<i class="glyphicon glyphicon-facetime-video"></i>
           <span><input type="file" id="upload_file2_<?php echo $array['bid_id']; ?>" name="upload_file2"  /></span>

          </label>
		
          <label class="filebutton" style="margin-bottom: -4px; background:none;font-size: 27px; height:auto; width:auto;cursor:pointer;">
<i class="glyphicon glyphicon-camera"></i>
           <span><input id="uploadfile_<?php echo $array['bid_id']; ?>" name="upload_file[]" class="required" multiple="" type="file"></span>

          </label>
		 
		 </div>
         
         
         
         
         
          <div id="showhidethis_<?php echo $array['bid_id']; ?>" style="display:none;margin-top:10px;">
		  <img width="75" src="images/LOADING.gif">
		  </div>
         
         
         
         
         
         
        
        </div>
      </div>
      <div class="modal-footer">
       
       
       <input type="hidden" id="uploadedvideo_<?php echo $array['bid_id']; ?>" name="uploadedvideo" value="<?php echo $vdname; ?>">
        
        <input type="hidden" id="uploadedimages__<?php echo $array['bid_id']; ?>" name="uploadedimages" value="<?php echo $obj->imagenames($array['bid_id'],$array['user_id']); ?>">
        
        <input type="hidden" name="offerid" value="<?php echo $_REQUEST['offer_id']; ?>">
       
        <input type="hidden" name="buyer_price" id="buyer_price__<?php echo $array['bid_id']; ?>" value="">
        
        <input type="hidden" name="option" value="postofferpopup">
        
        
        <input type="hidden" name="oldbidid" value="<?php echo $array['bid_id']; ?>">
        
        
        <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
        
        <button type="submit" class="btn btn-primary buttongreen">update</button>
        
      </div>
    </div>
    
    
    </form>
    
    
    
      <script>
	  
	  
	  
	  
	  $("#upload_file2_<?php echo $array['bid_id']; ?>").on('change', function () {
		
		
		
		
        
        
         $("#video-holder__<?php echo $array['bid_id']; ?>").html('<div id="imm_21054_1__<?php echo $array['bid_id']; ?>" onclick="removevideo_<?php echo $array['bid_id']; ?>(\'video1__<?php echo $array['bid_id']; ?>\',\'imm_21054_1__<?php echo $array['bid_id']; ?>\',\'\')" style="display:none;" class="crossbutton">X</div><video id="video1__<?php echo $array['bid_id']; ?>" controls="controls" style="display:none; width:100px; height:100px;" ></video>');
         
         
         <?php
		 
		 
		 
		
	
	echo '$("#video1__'.$array['bid_id'].'").css(\'display\',\'block\');	
	
	$("#imm_21054_1__'.$array['bid_id'].'").css(\'display\',\'block\');	
	
	var $video = $(\'#video1__'.$array['bid_id'].'\');

	$video.prop(\'src\', URL.createObjectURL($(\'#upload_file2_'.$array['bid_id'].'\').get(0).files[0]));

	//$video.get(0).play();
	
	$("#uploadedvideo_'.$array['bid_id'].'").val($(\'#upload_file2_'.$array['bid_id'].'\').get(0).files[0].name)
	
	
	
	
	

 
	 
 });
	  
	  
	
	  
	  
	  function removevideo_'.$array['bid_id'].'(id,id2,img)

{

 $("#uploadedvideo_'.$array['bid_id'].'").val(\'\');	


$("#"+id).remove();

$("#"+id2).remove();
	
}';
	?>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	
	$("#uploadfile_<?php echo $array['bid_id']; ?>").on('change', function () {

     //Get count of selected files
     var countFiles = $(this)[0].files.length;
	 
	 if(countFiles>4)

   {

	 alert('not more than 4 images')

	 $('#uploadfile_<?php echo $array['bid_id']; ?>').val('');

	 $('#uploadfile_<?php echo $array['bid_id']; ?>').select();

	  return false

	 }
	 
	 else
	 
	 {

     var imgPath = $(this)[0].value;
	 
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
	    
		 if (typeof (FileReader) != "undefined") {

              $.each(this.files, function() {
				
				readURL__<?php echo $array['bid_id']; ?>(this);
			   
             })
			 

         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
	 
  }
	 
 });
 
 
 
  function readURL__<?php echo $array['bid_id']; ?>(file)
 
 {

		 var image_holder = $("#image-holder__<?php echo $array['bid_id']; ?>");
     
	 image_holder.empty();
		
		  var reader = new FileReader();
                 
				 reader.onload = function (e) 
				 
				 {
                      var picFile = e.target;
					
					 var vv = Math.floor((Math.random() * 100) + 1); 
					
					 $("<img />", {
                         "src": e.target.result,
                             "class": "thumb-image",
							  "width": "100",
							  "height": "100",
							  "id": "imm"+vv+""
                     }
					 
					 ).appendTo(image_holder);
					 
					 
					  $("<div id='imm_"+ vv +"' onclick=\"removeimg__<?php echo $array['bid_id']; ?>('imm"+ vv +"','imm_"+ vv +"','"+file.name+"')\" class='crossbutton'>X</div>").appendTo(image_holder);
                
				
				   latestval = $("#uploadedimages__<?php echo $array['bid_id']; ?>").val();
				   
				   if(latestval=='')
				   
				   $("#uploadedimages__<?php echo $array['bid_id']; ?>").val(file.name)
				   
				   else if(file.name!='')
				   
				   $("#uploadedimages__<?php echo $array['bid_id']; ?>").val(latestval+','+file.name)
				
				 }
				 
				 reader.readAsDataURL(file);
				 
				//var filenameis = $(this)[0].files[i].name;
					
                 image_holder.show();
	 
}
 
 
 function removeimg__<?php echo $array['bid_id']; ?>(id,id2,img)

{

var str = $("#uploadedimages__<?php echo $array['bid_id']; ?>").val();	

st = str.split(',');

arr = [];

array = arr.concat(st);

array = $.grep(array, function(value) {
  return value != img;
});


 array.toString();
 
 $("#uploadedimages__<?php echo $array['bid_id']; ?>").val(array)

//alert(array)

$("#"+id).remove();

$("#"+id2).remove();
	
}
 
 
 $("#myfrmis_<?php echo $array['bid_id']; ?>").on('submit',(function(e) {
		
		if(validatefirst__<?php echo $array['bid_id']; ?>())
		{
		
		$('#showhidethis_<?php echo $array['bid_id']; ?>').css('display','block');
		
		e.preventDefault();
		$.ajax({
        	url: "ajax.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			beforeSend : function()
			{
				
				// $('#myModal_<?php echo $array['bid_id']; ?>').modal('hide')
				
				//$('#myModal_<?php echo $array['bid_id']; ?>').html('<img width="75" src="images/LOADING.gif">')
				
			},
			success: function(data)
		    {
				if(data=='invalid')
				{
					
				}
				else
				{
					//alert(data)
					// view uploaded file.
					//$("#preview").html(data).fadeIn();
					$("#myfrmis_<?php echo $array['bid_id']; ?>")[0].reset();	
					
					$("#image-holder__<?php echo $array['bid_id']; ?>").html('');
					
					$("#image-holder__<?php echo $array['bid_id']; ?>").html('<span style="color:red"></span>');
					
					
					$("#uploadedimages__<?php echo $array['bid_id']; ?>").val('');
					
					//$('#myModal_<?php echo $array['bid_id']; ?>').html('')
					
					loadlastoffer00(data,'<?php echo $array['bid_id']; ?>');
					
				}
		    },
		  	error: function(e) 
	    	{
				
				
				alert('error')
	    	} 	        
	   });
	   
	}
	
	else
	{
	  
	  e.preventDefault();
	  
	  return false;
	
	}
	   
	}));
 
 
 function validatefirst__<?php echo $array['bid_id']; ?>()

{

	  var counter = 0;
	  
	 

	   if($('#desc__<?php echo $array['bid_id']; ?>').val()=='')

	   {
		alert('please enter description')

		$('#desc__<?php echo $array['bid_id']; ?>').select();
		
		counter=1;

		return false;

		}
		
		var str = $('#desc__<?php echo $array['bid_id']; ?>').val();
	
	    var res = str.split("$");
	    
		
		if(res.length==1)
		
		{
			
			counter=1;
			
			alert('please don\'t forget to include the price in your offer (for example $5)');

		return false;
			
		}
		
		
		else if(res.length==1)
		
		{
		
		   $('#buyer_price__<?php echo $array['bid_id']; ?>').val('<?php echo $name['offer_price']; ?>');
	
			
		}
		
		else
		{
			
			if(res.length>1)
			
			var res2 = res[1].split(" "); 
			
			
			
			if(res2[0]=='')
			{
			  
			  $('#buyer_price__<?php echo $array['bid_id']; ?>').val('<?php echo $name['offer_price']; ?>');
			  
			  
			}
		
		}
		
		
		
		if(counter==0)
		return true;
		
		
		
	
}
 
 
	
	</script>
    
    
    
    
    
    
  </div>
</div>
     
     
     
     
     
     
     
     <?php
     
}
	 ?>
     
     </div>
  
    
    
    <div class="bordersep"></div>  
    
     <?php
     
	  }
	  
	  
	
	  
	  
	  
	 }
	

	 
	  
	  
	 
	 ?>    
     
    
    
    
    
    
    
    <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:5px; margin-bottom:12px;"><div id="form-content" style="margin-top:0px;margin-left:0px;  margin-right:0px;">
      
      <form method="post" id="register-form_<?php echo $_REQUEST['offer_id']; ?>" name="postofferform" action="" enctype="multipart/form-data" autocomplete="off">
       
       <div class="form-group" style=" float:left;width:100%;"><textarea style="margin-top:10px;border:none; background:transparent;-webkit-box-shadow: unset;" class="form-control" name="desc" id="desc_<?php echo $_REQUEST['offer_id']; ?>" placeholder="make an offer to <?php echo $obj->GetBuyerName($_REQUEST['offer_id']); ?>" cols="" rows=""></textarea>
       
       </div>
       
       <div class="col-lg-12" id="image-holder_<?php echo $_REQUEST['offer_id']; ?>" style="margin-bottom:10px;"></div>	

       <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 paddingzero" style="margin-top:0px;">

        <div class="col-lg-1 col-xs-2 col-sm-1 col-md-1 " style="padding-left:0px;">

         <div class="form-group">
		
          <label class="filebutton">

           <span><input type="file" id="upload_file_<?php echo $_REQUEST['offer_id']; ?>" name="upload_file[]"  class="required" multiple/></span>

          </label>

         </div>

      </div>

      <div class="col-lg-8 col-xs-7 col-sm-8 col-md-8" style="text-align:right; padding-right:0px; padding-left:0px;">
	 
       <input type="hidden" id="uploadedimages_<?php echo $_REQUEST['offer_id']; ?>" name="uploadedimages" value="">
       
       <input type="hidden" name="option" value="postoffer">
       
       <input type="hidden" name="offerid" value="<?php echo $_REQUEST['offer_id']; ?>">
       
      <input type="hidden" name="buyer_price" id="buyer_price_<?php echo $_REQUEST['offer_id']; ?>" value="">
       
       </div>

      <div class="col-lg-2 col-xs-3 col-sm-2 col-md-2" style="text-align:right; padding-right:0px; float:right; padding-left:0px;">

      <input style="font-family:Arial, Helvetica, sans-serif; font-size:14px; cursor:pointer;"  type="submit" name="submit_image"  class="btn btn-sm btn-primary buttonred submit_image" value="make offer"/>

      </div>

     </div>

    </form>
   </div>

  </div>
    
    <script>
	
	$("#upload_file_<?php echo $_REQUEST['offer_id']; ?>").on('change', function () {

     //Get count of selected files
     var countFiles = $(this)[0].files.length;
	 
	 if(countFiles>4)

   {

	 alert('not more than 4 images')

	 $('#upload_file_<?php echo $_REQUEST['offer_id']; ?>').val('');

	 $('#upload_file_<?php echo $_REQUEST['offer_id']; ?>').select();

	  return false

	 }
	 
	 else
	 
	 {

     var imgPath = $(this)[0].value;
	 
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
	    
		 if (typeof (FileReader) != "undefined") {

              $.each(this.files, function() {
				
				readURL_<?php echo $_REQUEST['offer_id']; ?>(this);
			   
             })
			 

         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
	 
  }
	 
 });
 
 
 
  function readURL_<?php echo $_REQUEST['offer_id']; ?>(file)
 
 {

		 var image_holder = $("#image-holder_<?php echo $_REQUEST['offer_id']; ?>");
     
	 image_holder.empty();
		
		  var reader = new FileReader();
                 
				 reader.onload = function (e) 
				 
				 {
                      var picFile = e.target;
					
					 var vv = Math.floor((Math.random() * 100) + 1); 
					
					 $("<img />", {
                         "src": e.target.result,
                             "class": "thumb-image",
							  "width": "100",
							  "height": "100",
							  "id": "imm"+vv+""
                     }
					 
					 ).appendTo(image_holder);
					 
					 
					  $("<div id='imm_"+ vv +"' onclick=\"removeimg_<?php echo $_REQUEST['offer_id']; ?>('imm"+ vv +"','imm_"+ vv +"','"+file.name+"')\" class='crossbutton'>X</div>").appendTo(image_holder);
                
				
				   latestval = $("#uploadedimages_<?php echo $_REQUEST['offer_id']; ?>").val();
				   
				   if(latestval=='')
				   
				   $("#uploadedimages_<?php echo $_REQUEST['offer_id']; ?>").val(file.name)
				   
				   else if(file.name!='')
				   
				   $("#uploadedimages_<?php echo $_REQUEST['offer_id']; ?>").val(latestval+','+file.name)
				
				 }
				 
				 reader.readAsDataURL(file);
				 
				//var filenameis = $(this)[0].files[i].name;
					
                 image_holder.show();
	 
}
 
 
 function removeimg_<?php echo $_REQUEST['offer_id']; ?>(id,id2,img)

{

var str = $("#uploadedimages_<?php echo $_REQUEST['offer_id']; ?>").val();	

st = str.split(',');

arr = [];

array = arr.concat(st);

array = $.grep(array, function(value) {
  return value != img;
});


 array.toString();
 
 $("#uploadedimages_<?php echo $_REQUEST['offer_id']; ?>").val(array)

//alert(array)

$("#"+id).remove();

$("#"+id2).remove();
	
}
 
 
 $("#register-form_<?php echo $_REQUEST['offer_id']; ?>").on('submit',(function(e) {
		
		if(validatefirst_<?php echo $_REQUEST['offer_id']; ?>())
		{
		
		e.preventDefault();
		$.ajax({
        	url: "ajax.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			beforeSend : function()
			{
				//$("#preview").fadeOut();
				//$("#err").fadeOut();
			},
			success: function(data)
		    {
				if(data=='invalid')
				{
					// invalid file format.
					//$("#err").html("Invalid File !").fadeIn();
				}
				else
				{
					//alert(data)
					// view uploaded file.
					//$("#preview").html(data).fadeIn();
					$("#register-form_<?php echo $_REQUEST['offer_id']; ?>")[0].reset();	
					
					$("#image-holder_<?php echo $_REQUEST['offer_id']; ?>").html('');
					
					$("#image-holder_<?php echo $_REQUEST['offer_id']; ?>").html('<span style="color:red"></span>');
					
					
					$("#uploadedimages_<?php echo $_REQUEST['offer_id']; ?>").val('');
					
					
					
					
					
					
					
					
					<?php
					
					if(empty($lastidis))
					
					{
					?>
					
					loadlastofferempty(data,'<?php  echo 'additional'.$_REQUEST['offer_id'];//echo $_REQUEST['offerdivid'];  ?>');
					
					<?php
					
					}
					
					else
					
					{
					
					?>
					
					//alert(data)
					
					loadlastoffer(data,'<?php  echo $lastidis; ?>');
					
					<?php
						
					}
					
					?>
					
					
				}
		    },
		  	error: function(e) 
	    	{
				
				
				alert('error')
	    	} 	        
	   });
	   
	}
	
	else
	{
	  
	  e.preventDefault();
	  
	  return false;
	
	}
	   
	}));
 
 
 function validatefirst_<?php echo $_REQUEST['offer_id']; ?>()

{

	  var counter = 0;
	  
	 

	   if($('#desc_<?php echo $_REQUEST['offer_id']; ?>').val()=='')

	   {
		alert('please enter description')

		$('#desc_<?php echo $_REQUEST['offer_id']; ?>').select();
		
		counter=1;

		return false;

		}
		
		var str = $('#desc_<?php echo $_REQUEST['offer_id']; ?>').val();
	
	    var res = str.split("$");
	    
		
		
		if(res.length==1)
		
		{
			
			counter=1;
			
			alert('please don\'t forget to include the price in your offer (for example $5)');

		return false;
			
		}
		
		
		
		else if(res.length==1)
		
		{
		
		   $('#buyer_price_<?php echo $_REQUEST['offer_id']; ?>').val('<?php echo $name['offer_price']; ?>');
	
			
		}
		
		else
		{
			
			if(res.length>1)
			
			var res2 = res[1].split(" "); 
			
			
			
			if(res2[0]=='')
			{
			  
			  $('#buyer_price_<?php echo $_REQUEST['offer_id']; ?>').val('<?php echo $name['offer_price']; ?>');
			  
			  
			}
		
		}
		
		
		
		if(counter==0)
		return true;
		
		
		
	
}
 
 
	
	</script>
    
    
    <?php
	
	
	   
   
    break;
	
	
	
	
	case "viewcomments":

	// show all offers against this offer
			
			
			 $arrayget = $obj->selectAll('bid_replies','*'," offer_id = '".$_POST['offer_id']."' and bid_id='".$_POST['bidid']."'  ",'order by reply_id DESC');
			 
			 /*and user_id='".$_REQUEST['userid']."'*/
			 
			 
			 $counter = sizeof($arrayget); 
			 
			foreach((array)$arrayget as $arrayreplies)
			
			{
				
				
				mysqli_query($conn,"update bid_replies set visited_offers=1 where reply_id='".$arrayreplies['reply_id']."'");
				
				$bordersets = '';
				
				if($_REQUEST['page']=='2')
				
				{}
				
				else
				
				$bordersets = ' class="borderouter" ';
			
			?>
            
            <div <?php echo $bordersets; ?> id="reply_<?php echo $arrayreplies['reply_id']; ?>">
            
          <!--////////////////////////////////////////////////////////////////////////////////////////////// -->         
<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">
               
               
               <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">           
            <?php
           
         
		   
		    $obj->getuser($arrayreplies['user_id']);
		   
           ?>
   
           </div>
           
           
           <div class="col-lg-7 col-xs-8 col-sm-9 col-md-8 ">
               
               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">
               
               <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;">

           
           
           <?php echo $obj->GetUserName($arrayreplies['user_id']); ?>
           
           </div>
           
           <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;padding-left:0px; padding-right:0px;margin-bottom:10px;">        
		   <?php echo $arrayreplies['reply_text']; ?>     </div>
           
            <?php
           
          
		  
		  
		  
		  $obj->reply_images($arrayreplies['offer_id'],$arrayreplies['user_id'],$arrayreplies['reply_id']);
           
           ?>
   
           </div> </div>
           
           <div class="col-lg-3 col-xs-3 col-sm-3 col-md-3" style=" text-align:right;">
           
            
            
            <?php
  
			
			  
			  
			  echo datediff2($arrayreplies['reply_date']);
	
			?>
                </span></div>
               
               </div>
               
               </div>
              
              
               
             
               
             
                  
                  
                 
                  
                <?php
            
			 --$counter;
			 
			 
			 
			 if($counter==0)
			 
			 {
			 
			 echo '
			 
			 <div class="bordersep"></div> 
			 
			 <div class="col-lg-12 " style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:15px;margin-bottom:12px;"><form method="post" id="register-form_'.$_POST['bidid'].'" name="register-form_'.$_POST['bidid'].'" action="ajax.php" enctype="multipart/form-data" autocomplete="off"><div class="form-group" style="float:left;width:100%;"><textarea style="margin-top:0px;border:none; background:transparent;-webkit-box-shadow: unset;" class="form-control" name="desc" id="desc" placeholder="reply to buyer" cols="" rows=""></textarea></div><div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 " style="margin-top:0px;padding-right: 0px;"><div class="col-lg-6 col-xs-6 col-sm-6 col-md-6 paddingzero"><div class="form-group"><label class="filebutton"><span><input id="upload_file" name="upload_file[]" class="required" multiple="" type="file"></span></label></div></div><div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="text-align:right; padding-right:0px; float:right;"><input style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" name="submit_image4" class="btn btn-sm btn-primary" id="replycomments" value="reply" type="submit"><input name="prevs" id="prevs" value="" type="hidden"></div></div><input name="bid_id" value="'.$_POST['bidid'].'" type="hidden"><input name="offer_id" value="'.$_POST['offer_id'].'" type="hidden"><input name="offerposteduser" value="'.$_SESSION['user_session'].'" type="hidden"><input name="option" value="replies" type="hidden"></form></div></div>';
			 
			 
			 
			 
			
		
		echo "<script>
		
		$(document).ready(function() {	
		
		
		$(document).on(\"submit\", \"#register-form_".$_REQUEST['bidid']."\", function (e) {
		
	
		
		
		e.preventDefault();
		
		$.ajax({
        	url: \"ajax.php\",
			type: \"POST\",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			beforeSend : function()
			{
				
			},
			success: function(data)
		    {
				if(data=='invalid')
				{
					
				}
				else
				{
					
					$(\"#register-form_".$_REQUEST['bidid']."\")[0].reset();	
					
					
					
					
				
					
					if(data=='error')
					alert('please enter description first!')
					
					else
					
					loadlastreply2(data,".$arrayreplies['reply_id'].")
					
					$(\"#register-form_".$_REQUEST['bidid']."\").resetForm();
					
				
					
				}
		    },
		  	error: function(e) 
	    	{
				
				
				alert('error')
	    	} 	        
	   });
		
	

	   
	});
	
	});
	
	</script>
	
	
	";	
	
			 }
			 
			 else
			 
			 echo '</div>';
			 
			    
			}
				
			





	
	
	break;
	
	
	
	
		case "viewcommentstransactions":

	// show all offers against this offer
			
			
			 $arrayget = $obj->selectAll('bid_replies','*'," offer_id = '".$_REQUEST['offer_id']."' and bid_id='".$_REQUEST['bidid']."'  ",'order by reply_id DESC');
			 
			 /*and user_id='".$_REQUEST['userid']."'*/
			 
			 
			 $counter = sizeof($arrayget); 
			 
			foreach((array)$arrayget as $arrayreplies)
			
			{
				
				
				mysqli_query($conn,"update bid_replies set viewed=1 where reply_id='".$arrayreplies['reply_id']."'");
				
				
				$bordersets = '';
				
				if($_REQUEST['page']=='2')
				
				{}
				
				else
				
				$bordersets = ' class="borderouter" ';
			
			?>
            
            <div <?php //echo $bordersets; ?> id="reply_<?php echo $arrayreplies['reply_id']; ?>">
            
          <!--////////////////////////////////////////////////////////////////////////////////////////////// -->         
<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">
               
               
               <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">           
            <?php
           
         
		   
		    $obj->getuser($arrayreplies['user_id']);
		   
           ?>
   
           </div>
           
           
           <div class="col-lg-7 col-xs-8 col-sm-9 col-md-8 ">
               
               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">
               
               <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;">

           
           
           <?php echo $obj->GetUserName($arrayreplies['user_id']); ?>
           
           </div>
           
           <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;padding-left:0px; padding-right:0px;margin-bottom:10px;">        
		   <?php echo $arrayreplies['reply_text']; ?>     </div>
           
            <?php
           
          
		  
		  
		  
		  $obj->reply_images($arrayreplies['offer_id'],$arrayreplies['user_id'],$arrayreplies['reply_id']);
           
           ?>
   
           </div> </div>
           
           <div class="col-lg-3 col-xs-3 col-sm-3 col-md-3 pddgsett" style=" text-align:right;">
           
            
            
            <?php
  
			
			  
			  
			  echo datediff2($arrayreplies['reply_date']);
	
			?>
                </span></div>
               
               </div>
               
               </div>
              
              
               
             
               
             
                  
                  
                 
                  
                <?php
            
			 --$counter;
			 
			 
			 
			 if($counter==0)
			 
			 {
			 
			 echo '
			 
			 <div class="bordersep"></div> 
			 
			 <div class="col-lg-12 " style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:15px;margin-bottom:12px;"><form method="post" id="register-form_'.$_REQUEST['bidid'].'" name="register-form_'.$_REQUEST['bidid'].'" action="ajax.php" enctype="multipart/form-data" autocomplete="off"><div class="form-group" style="float:left;width:100%;"><textarea style="margin-top:0px;border:none; background:transparent;-webkit-box-shadow: unset;" class="form-control" name="desc" id="desc" placeholder="reply to buyer" cols="" rows=""></textarea></div><div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 " style="margin-top:0px;padding-right: 0px;"><div class="col-lg-6 col-xs-6 col-sm-6 col-md-6 paddingzero"><div class="form-group"><label class="filebutton"><span><input id="upload_file" name="upload_file[]" class="required" multiple="" type="file"></span></label></div></div><div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="text-align:right; padding-right:0px; float:right;"><input style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" name="submit_image4" class="btn btn-sm btn-primary" id="replycomments" value="reply" type="submit"><input name="prevs" id="prevs" value="" type="hidden"></div></div><input name="bid_id" value="'.$_REQUEST['bidid'].'" type="hidden"><input name="offer_id" value="'.$_REQUEST['offer_id'].'" type="hidden"><input name="offerposteduser" value="'.$_SESSION['user_session'].'" type="hidden"><input name="option" value="replies" type="hidden"></form></div></div>';
			 
			 
			 
			 
			
		
		echo "<script>
		
		$(document).ready(function() {	
		
		
		$(document).on(\"submit\", \"#register-form_".$_REQUEST['bidid']."\", function (e) {
		
	
		
		
		e.preventDefault();
		
		$.ajax({
        	url: \"ajax.php\",
			type: \"POST\",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			beforeSend : function()
			{
				
			},
			success: function(data)
		    {
				if(data=='invalid')
				{
					
				}
				else
				{
					
					$(\"#register-form_".$_REQUEST['bidid']."\")[0].reset();	
					
					
					
					
				
					
					if(data=='error')
					alert('please enter description first!')
					
					else
					
					loadlastreply2(data,".$arrayreplies['reply_id'].")
					
					$(\"#register-form_".$_REQUEST['bidid']."\").resetForm();
					
				
					
				}
		    },
		  	error: function(e) 
	    	{
				
				
				alert('error')
	    	} 	        
	   });
		
	

	   
	});
	
	});
	
	</script>
	
	
	";	
	
			 }
			 
			 else
			 
			 echo '</div>';
			 
			    
			}
				
			





	
	
	break;
	
	
	
	
	
	
	case "viewoffersinfo":
        
		
		$fields =array('offer_id'); 
		
		$rowsret = $obj->CountAllRows('bids_against_offers',$fields," offer_id = '".$_REQUEST['offer_id']."' ",'');
		
    if($rowsret>0)
	
	{


         $arrayget = $obj->selectAll('bids_against_offers','*'," offer_id = '".$_REQUEST['offer_id']."' ",'order by bid_id DESC');



  $name = mysqli_fetch_array(mysqli_query($conn,"select offer_price from posted_offers where offer_id='".$_REQUEST['offer_id']."'"));



         foreach((array)$arrayget as $array)

          {
		
		 $lastidis = 'mainsub_'.$array['bid_id'];	

         ?>    
		   <div  id="mainsub_<?php echo $array['bid_id']; ?>" style="float:left;width:100%;">
         
           	
           <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px; padding-left:0px; padding-right:0px;">

            <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">

       <?php

         $obj->getuser($array['user_id']);

       ?>

           </div>

          <div class="col-lg-7 col-xs-8 col-sm-9 col-md-8 ">

               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">

           <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;" id="user__<?php echo $array['bid_id']; ?>">

      <?php echo $obj->GetUserName($array['user_id']); ?>
      
      

        </div>
        
       

        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 paddingleftright" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;margin-bottom:10px;" id="title__<?php echo $array['bid_id']; ?>">        

	  <?php echo convert_links($array['offer_title']); ?>     

        </div>

 <?php $obj->getbidimages($array['bid_id'],$array['user_id']);?>
     

        </div> 
        
      </div>

        <div class="col-lg-3 col-xs-3 col-sm-2 col-md-3 pddgsett" style=" text-align:right;">

       <div style="float:right;font-family:Arial, Helvetica, sans-serif; "  class="font_sett01"><span style="color:#0e1131;font-weight:bold;" id="datetime2__<?php echo $array['bid_id']; ?>"><?php  echo $array['bid_price'];  ?></span> <span style="color:#7e7e7e;" id="datetime__<?php echo $array['bid_id']; ?>">| <?php echo datediff2($array['posted_date']);?>
        
         </span>
         
       </div>
       
     </div>

   <!--body navigation ends-->
      </div>


<?php if($array['user_id']==$_SESSION['user_session']) { ?>
     
     
 
  <div style="margin-bottom:10px; text-align:right;" class="col-lg-12 col-xs-12 col-sm-12 col-md-12" id="makedisable__<?php echo $array['bid_id']; ?>">
      
    

     <?php $obj->buttonsmakeoffersedit2($_REQUEST['offer_id'],$array['user_id'],$array['bid_id']); ?>

     </div>
     
     
     <div class="modal fade" id="myModal_<?php echo $array['bid_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  
  <form id="myfrmis_<?php echo $array['bid_id']; ?>" method="post">
  
    <div class="modal-content">
     
      <div class="modal-body">
        <div style="margin-top:15px;">
        
        
        <div class="form-group" style="float:left;width:100%;"><textarea style="margin-top:10px;border:none; background:transparent;-webkit-box-shadow: unset;" class="form-control" name="desc" id="desc__<?php echo $array['bid_id']; ?>" placeholder="describe what you're offering, including the price (for example $5)" cols="" rows=""></textarea>
       
       </div>
        
        
        <?php
        
		$obj->getbidimagespopup($array['bid_id'],$array['user_id']);
		
		?>
        
        
        <div class="form-group">
		
          <label class="filebutton">

           <span><input type="file" id="uploadfile_<?php echo $array['bid_id']; ?>" name="upload_file[]"  class="required" multiple/></span>

          </label>

         </div>
         
          <div id="showhidethis_<?php echo $array['bid_id']; ?>" style="display:none;margin-top:10px;">
		  <img width="75" src="images/LOADING.gif">
		  </div>
        
        </div>
      </div>
      <div class="modal-footer">
       
        
        <input type="hidden" id="uploadedimages__<?php echo $array['bid_id']; ?>" name="uploadedimages" value="<?php echo $obj->imagenames($array['bid_id'],$array['user_id']); ?>">
        
        <input type="hidden" name="offerid" value="<?php echo $_REQUEST['offer_id']; ?>">
       
        <input type="hidden" name="buyer_price" id="buyer_price__<?php echo $array['bid_id']; ?>" value="">
        
        <input type="hidden" name="option" value="postofferpopup">
        
        
        <input type="hidden" name="oldbidid" value="<?php echo $array['bid_id']; ?>">
        
        
        <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
        
        <button type="submit" class="btn btn-primary buttongreen">update</button>
        
      </div>
    </div>
    
    
    </form>
    
    
    
      <script>
	
	$("#uploadfile_<?php echo $array['bid_id']; ?>").on('change', function () {

     //Get count of selected files
     var countFiles = $(this)[0].files.length;
	 
	 if(countFiles>4)

   {

	 alert('not more than 4 images')

	 $('#uploadfile_<?php echo $array['bid_id']; ?>').val('');

	 $('#uploadfile_<?php echo $array['bid_id']; ?>').select();

	  return false

	 }
	 
	 else
	 
	 {

     var imgPath = $(this)[0].value;
	 
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
	    
		 if (typeof (FileReader) != "undefined") {

              $.each(this.files, function() {
				
				readURL__<?php echo $array['bid_id']; ?>(this);
			   
             })
			 

         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
	 
  }
	 
 });
 
 
 
  function readURL__<?php echo $array['bid_id']; ?>(file)
 
 {

		 var image_holder = $("#image-holder__<?php echo $array['bid_id']; ?>");
     
	 image_holder.empty();
		
		  var reader = new FileReader();
                 
				 reader.onload = function (e) 
				 
				 {
                      var picFile = e.target;
					
					 var vv = Math.floor((Math.random() * 100) + 1); 
					
					 $("<img />", {
                         "src": e.target.result,
                             "class": "thumb-image",
							  "width": "100",
							  "height": "100",
							  "id": "imm"+vv+""
                     }
					 
					 ).appendTo(image_holder);
					 
					 
					  $("<div id='imm_"+ vv +"' onclick=\"removeimg__<?php echo $array['bid_id']; ?>('imm"+ vv +"','imm_"+ vv +"','"+file.name+"')\" class='crossbutton'>X</div>").appendTo(image_holder);
                
				
				   latestval = $("#uploadedimages__<?php echo $array['bid_id']; ?>").val();
				   
				   if(latestval=='')
				   
				   $("#uploadedimages__<?php echo $array['bid_id']; ?>").val(file.name)
				   
				   else if(file.name!='')
				   
				   $("#uploadedimages__<?php echo $array['bid_id']; ?>").val(latestval+','+file.name)
				
				 }
				 
				 reader.readAsDataURL(file);
				 
				//var filenameis = $(this)[0].files[i].name;
					
                 image_holder.show();
	 
}
 
 
 function removeimg__<?php echo $array['bid_id']; ?>(id,id2,img)

{

var str = $("#uploadedimages__<?php echo $array['bid_id']; ?>").val();	

st = str.split(',');

arr = [];

array = arr.concat(st);

array = $.grep(array, function(value) {
  return value != img;
});


 array.toString();
 
 $("#uploadedimages__<?php echo $array['bid_id']; ?>").val(array)

//alert(array)

$("#"+id).remove();

$("#"+id2).remove();
	
}
 
 
 $("#myfrmis_<?php echo $array['bid_id']; ?>").on('submit',(function(e) {
		
		if(validatefirst__<?php echo $array['bid_id']; ?>())
		{
			
		$('#showhidethis_<?php echo $array['bid_id']; ?>').css('display','block');
		
		e.preventDefault();
		$.ajax({
        	url: "ajax.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			beforeSend : function()
			{
				
				//$('#myModal_<?php echo $array['bid_id']; ?>').html('<img width="75" src="images/LOADING.gif">')
				
			},
			success: function(data)
		    {
				if(data=='invalid')
				{
					
				}
				else
				{
					//alert(data)
					// view uploaded file.
					//$("#preview").html(data).fadeIn();
					$("#myfrmis_<?php echo $array['bid_id']; ?>")[0].reset();	
					
					$("#image-holder__<?php echo $array['bid_id']; ?>").html('');
					
					$("#image-holder__<?php echo $array['bid_id']; ?>").html('<span style="color:red"></span>');
					
					
					$("#uploadedimages__<?php echo $array['bid_id']; ?>").val('');
					
					//alert(data)
					
					loadlastoffer00(data,'<?php echo $array['bid_id']; ?>');
					
				}
		    },
		  	error: function(e) 
	    	{
				
				
				alert('error')
	    	} 	        
	   });
	   
	}
	
	else
	{
	  
	  e.preventDefault();
	  
	  return false;
	
	}
	   
	}));
 
 
 function validatefirst__<?php echo $array['bid_id']; ?>()

{

	  var counter = 0;
	  
	 

	   if($('#desc__<?php echo $array['bid_id']; ?>').val()=='')

	   {
		alert('please enter description')

		$('#desc__<?php echo $array['bid_id']; ?>').select();
		
		counter=1;

		return false;

		}
		
		var str = $('#desc__<?php echo $array['bid_id']; ?>').val();
	
	    var res = str.split("$");
	    
		
		if(res.length==1)
		
		{
			
			counter=1;
			
			alert('please don\'t forget to include the price in your offer (for example $5)');

		return false;
			
		}
		
		
		else if(res.length==1)
		
		{
		
		   $('#buyer_price__<?php echo $array['bid_id']; ?>').val('<?php echo $name['offer_price']; ?>');
	
			
		}
		
		else
		{
			
			if(res.length>1)
			
			var res2 = res[1].split(" "); 
			
			
			
			if(res2[0]=='')
			{
			  
			  $('#buyer_price__<?php echo $array['bid_id']; ?>').val('<?php echo $name['offer_price']; ?>');
			  
			  
			}
		
		}
		
		
		
		if(counter==0)
		return true;
		
		
		
	
}
 
 
	
	</script>
    
    
    
    
    
    
  </div>
</div>
     
     
     
     
     
     
     
     <?php
     
}
	 ?>
     
     </div>
  
    
    
    <div class="bordersep"></div>  
    
     <?php
     
	  }
	  
	  
	
	  
	  
	  
	 }
	

   
    break;
	
	
	
	
	
	
	
	
	
	
	
	


}

?>