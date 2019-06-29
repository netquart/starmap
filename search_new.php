<?php



require_once("class2.php");

$obj = new happenning;



if( $_POST ){
	
	$fname = $_POST['txt_fname'];
	
	
	$price = explode('$',$_POST['txt_fname']);
	
	
	
	if(sizeof($price)>2)
	
	{
		
		$range = explode(' ',$price[2]);
		
		
		
		$priceset = " or offer_price BETWEEN '$".str_replace('-','',$price[1])."' AND '$".$range[0]."' ";
		
		
		}
	
    else
    {
	  
	  $price = explode(' ',$price[1]);
	  
	  if($price[0]=='' or $price[0]==' ')
	  
	  $priceset ="";
	  
	  else
	  
	  $priceset = " or offer_price='$".$price[0]."'";
	   
	  
	}
    
	
	
	
   
 
	
	
	
	
	
	
	
    $cat = $_POST['sub_cat'];

    $setcat = '';

    if(!empty($cat))
	
	$setcat = " or offer_cat like '".$cat."'   ";


	?>
    
    
  
      
  <?php
  
  
  
 
  
  
  
  $arrayget = $obj->selectAll('posted_offers','*'," offer_title like '%".$_POST['txt_fname']."%' ".$priceset." ".$setcat."  ",'order by offer_id DESC');
  
  
  
 $fields  = array('offer_id');
  
 $countr = $obj->CountAllRows('posted_offers',$fields," offer_title like '%".$_POST['txt_fname']."%' ".$priceset." ".$setcat."  ",'');
    
  
  if($countr>0)
  
  {
  
  
  
  
  
 foreach ($arrayget as $array)
  
 
  {
	  
	  
	  
	  

      
     $stt .=  '<div class="borderouter" id="make_offer_'.$array['offer_id'].'"><div  class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px; padding-left:0px; padding-right:0px;"><div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">'.$obj->getuser00($array['offer_posted_user']).'</div><div class="col-lg-7 col-xs-8 col-sm-9 col-md-8 "><div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset"><div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;">'.$obj->GetUserName($array['offer_posted_user']).'</div><div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 " style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%; padding-left:0px;">'.str_replace($_POST['txt_fname'],'<span style="color:red;">'.$_POST['txt_fname'].'</span>',$array['offer_title']).'</div> '.$obj->getofferimages00($array['offer_id'],$array['offer_posted_user']).'</div></div><div class="col-lg-3 col-xs-3 col-sm-2 col-md-3" style=" text-align:right;"><div style="float:right;font-family:Arial, Helvetica, sans-serif; font-size:16px;"><span style="color:#0e1131;font-weight:bold;">'.$array['offer_price'].'</span> <span style="color:#7e7e7e;">| '.datediff2($array['offer_posted_date']).'</span></div></div></div><div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" id="'.$array['offer_id'].'"><div style="font-family: Arial,Helvetica,sans-serif; font-size: 16px; color: rgb(255, 0, 0); font-weight: bold; padding-left: 0px;" class="col-lg-5 col-xs-5 col-sm-5 col-md-5">';
	 
	 $tags = $obj->hashtags2($array['offer_id'],$array['offer_title']);
	 
	 
	$stt .= $tags.'</div><div style="font-family: Arial,Helvetica,sans-serif; font-size: 16px; color: rgb(255, 0, 0); font-weight: bold; padding-left: 0px;" class="col-lg-3 col-xs-3 col-sm-3 col-md-3">'.$obj->bidscount($array['offer_id']).'</div><div  class="col-lg-4 col-xs-4 col-sm-4 col-md-4" style="padding-right: 0px; font-weight: bold; color: red; text-align: right;"><button style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred"  onclick="makeoffer('.$array['offer_posted_user'].','.$array['offer_id'].','.$_SESSION['user_session'].',\''.$tags.'\',\'make_offer_'.$array['offer_id'].'\');">make an offer</button></div></div></div>';

   
	
  }
  
  echo $stt.'#@#'.$countr;	
  
  }
  
  else
  
  echo 'no record found!';


	
}