<?php



require_once("class2.php");

$obj = new happenning;



if( $_POST ){
	
	$fname = $_POST['txt_fname'];
	
    $cat = $_POST['sub_cat'];

    $setcat = '';

    if(!empty($cat))
	
	$setcat = " or offer_cat like '".$cat."'   ";


	$ext = explode(' ',$_POST['txt_fname']);
	
	$srch = '';
	
	for($i=0;$i<sizeof($ext);$i++)
	
	{
	
		if($i==0)
		
		$srch .="offer_title like '%".$ext[$i]."%'";
		
		else
		
		$srch .=" or offer_title like '%".$ext[$i]."%'";
		
		
	}
	
	
	$exp1 = explode('$',$_POST['txt_fname']);
	
	$exp1 = explode(' ',$exp1[1]);
	
	if(sizeof($exp1)>1)
	
	$srch .=" or offer_price = '$".$exp1[0]."'";
	
	
	
	

	?>
    
    
  
      
  <?php
  
  
  
 
  
  
  
  $arrayget = $obj->selectAll('posted_offers','*'," ".$srch."  ".$setcat."  ",'order by offer_id DESC');
  
  $fields  = array('offer_id');
  
  $countr = $obj->CountAllRows('posted_offers',$fields," ".$srch."  ".$setcat."  ",'');
  
  
  if($countr>0)
  
  {
  
  
  
 foreach($arrayget as $array)

          {



$st .= ' <div id="main_'.$array['offer_id'].'"><div class="borderouter" id="'.$array['offer_id'].'"><div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;"><div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">'.$obj->getuser00($array['offer_posted_user']).$obj->showjqueryfunctions00($array['offer_id']).'</div><div class="col-lg-7 col-xs-8 col-sm-9 col-md-8 "><div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset"><div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;" id="title_'.$array['offer_id'].'">'.$obj->GetUserName($array['offer_posted_user']).'</div><div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 paddingleftright" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;margin-bottom:10px;" >'.convert_links($array['offer_title']).'</div>'.$obj->getofferimages00($array['offer_id'],$array['offer_posted_user']).'
</div></div><div class="col-lg-3 col-xs-3 col-sm-2 col-md-3" style=" text-align:right;"><div style="float:right;font-family:Arial, Helvetica, sans-serif; font-size:16px;"><span style="color:#0e1131;font-weight:bold;">'.$array['offer_price'].'</span> <span style="color:#7e7e7e;">| '.datediff2($array['offer_posted_date']).'</span></div></div></div><div style="margin-bottom:10px; text-align:left;" class="col-lg-3 col-xs-3 col-sm-3 col-md-3">'.$obj->hashtags00($array['offer_id'],$array['offer_title']).'</div><div style="margin-bottom:10px; text-align:right;" class="col-lg-9 col-xs-9 col-sm-9 col-md-9">'.$obj->buttons00($array['offer_id'],$array['offer_posted_user']).'</div></div></div>';
     
	
	 
	 
	  }	
	  
	  
	  
	echo $st .='#@#'.$countr;  
	
}

else

echo 'no record found!';



}



//echo json_encode($retVal);