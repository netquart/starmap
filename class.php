<?php
require_once("connection.php");
error_reporting("E_ERROR");
ini_set('max_execution_time', 0);

include_once 'user_agent.php';

class happenning 
{
	
	function selectAll($tablename,$fields,$where_clause,$orderby)
	{
		global $conn;
/*		if(sizeof($fields)>0 and $fields!='*')
			$fields = implode(',',$fields);
		elseif($fields=='*')

		$fields='*';*/
		if($where_clause!='')
			$where_clause =' where '.$where_clause;
		// echo $query = "select ".$fields." from ".$tablename." ".$where_clause." ".$orderby." ";
		
		//echo '<br />';
		
		$query = "select ".$fields." from ".$tablename." ".$where_clause." ".$orderby." ";
		$query = mysqli_query($conn,$query);
		$returnarray = '';
		while($array=mysqli_fetch_array($query))
		{
			$returnarray[] = $array;
		}
		return $returnarray;
	}
	
	
	function selectAll2($tablename,$fields,$where_clause,$orderby)
	{
		global $conn;
		if(sizeof($fields)>0 and $fields!='*')
			$fields = implode(',',$fields);
		elseif($fields=='*')

		$fields='*';
		if($where_clause!='')
			$where_clause =' where '.$where_clause;
		// echo $query = "select ".$fields." from ".$tablename." ".$where_clause." ".$orderby." ";
		
		//echo '<br />';
		
		$query = "select ".$fields." from ".$tablename." ".$where_clause." ".$orderby." ";
		
		//if($tablename=='posted_offers_images')
		//echo $query;
		
		
		$query = mysqli_query($conn,$query);
		$returnarray = '';
		while($array=mysqli_fetch_array($query))
		{
			$returnarray[] = $array;
		}
		return $returnarray;
	}
	
	
		
	function CountAllRows($tablename,$fields,$where_clause,$orderby)
	{
		global $conn;
		if(sizeof($fields)>0 and $fields!='*')
		$fields = implode(',',$fields);
		elseif($fields=='*')
		$fields='*';
		if($where_clause!='')
			$where_clause =' where '.$where_clause;
		$query = "select ".$fields." from ".$tablename." ".$where_clause." ".$orderby." ";
		$query = mysqli_query($conn,$query);
		$rows = mysqli_num_rows($query);
		return $rows;
	}

	function selectOne($tablename,$fields,$where_clause,$orderby)
	{
		global $conn;
		if(sizeof($fields)>0 and $fields!='*')
			$fields = implode(',',$fields);
		elseif($fields=='*')
		
		$fields='*';
		if($where_clause!='')
			$where_clause =' where '.$where_clause;
		$query = "select ".$fields." from ".$tablename." ".$where_clause." ".$orderby." ";
		$query = mysqli_query($conn,$query);
		$returnarray=@mysqli_fetch_array($query);
		return $returnarray;
	}

	function getuser($userid)
	{
		global $conn;
		$fields = array('username','user_avatar');
		$row = $this->selectOne('users',$fields,"user_id = '".$userid."'",'');
		
		if((is_file($row['user_avatar']))&&(file_exists($row['user_avatar'])))
		
		echo '<img class="bordrshadow" src="'.$row['user_avatar'].'" width="56" height="54"  />';
			
		//echo '<img class="bordrshadow" src="image.php?img='.$row['user_avatar'].'&amp;w=56&amp;h=54" width="56" height="54"  />';
			
			
			
			
		else
			echo '<img src="images/desktop-makeoffers2_06.png" width="56" height="54"  />';	
			
			
			
			/* echo '<img class="bordrshadow" src="'.$row['user_avatar'].'" width="56" height="54"  />';
			
		else
			echo '<img src="images/desktop-makeoffers2_06.png" width="56" height="54"  />';*/
   	}
	
	function getuser2($userid)
	{
		global $conn;
		$fields = array('username','user_avatar');
		$row = $this->selectOne('users',$fields,"user_id = '".$userid."'",'');
		
		//if(file_exists($row['user_avatar']))
		
		if((is_file($row['user_avatar']))&&(file_exists($row['user_avatar'])))
		
		echo '<img class="bordrshadow" src="'.$row['user_avatar'].'" width="56" height="54"  />';
			
		//echo '<img class="bordrshadow" src="image.php?img='.$row['user_avatar'].'&amp;w=56&amp;h=54" width="46" height="44"  />';
		
			// echo '<img class="bordrshadow" src="'.$row['user_avatar'].'" width="56" height="54"  />';
			
		else
		
		echo '<img src="images/desktop-makeoffers2_06.png" width="46" height="44"  />';
		
   	}	
	
  /* function getofferimages($offerid,$userid)
   
	{
		global $conn;
		
		$fields = array('image_name','file_type');
		
		$arrayimg = $this->selectAll2('posted_offers_images',$fields,"offer_id='".$offerid."' and user_id='".$userid."' and file_type='image' ",'');
		
		
		 $sizeget = sizeof($arrayimg);	
		 
		   $strng = '';
		   
		    $strng2 = '';
		 	
           foreach($arrayimg as $rowimg)

           

		   {


            if((is_file($rowimg['image_name']))&&(file_exists($rowimg['image_name'])))
			{
           		
				if($sizeget>1)
				{
				$strng .='<div style="float:left;width:50%; padding:2px;">';
				
				
					
				   
			
					$strng .= '<img src="'.$rowimg['image_name'].'" class="img-responsive"  />';
				
				
				
				
				$strng .= '</div>';
				}
				else
				{
					
					$strng .= '<div style="float:left;">';
					
					
				
			
					$strng .= '<img src="'.$rowimg['image_name'].'" class="img-responsive"  />';
			
				
				
				$strng .= '</div>';
				}
				
				
				
				
				
			}
           
		   
		  
		   

		   }
		   
		   echo '<div style="float:left;">'.$strng2.'</div>'.$strng;
		


	}*/
	
	
	
	  function getofferimages($offerid,$userid)
	   
	   {
		  global $conn;
		  		  
		   $fields = array('image_name','file_type');
		  
		  $arrayimg = $this->selectAll('posted_offers_images',' image_name,file_type ',"offer_id='".$offerid."' ",'');

          
		   $sizeget = sizeof($arrayimg);	
		
		
		
		   $strng = '';
		   
		    $strng2 = '';
		   		
			
           foreach($arrayimg as $rowimg)

           

		   {

		 

           //if(file_exists($rowimg['image_name']))
		   
		 //echo mime_content_type($rowimg['image_name']);

            if((is_file($rowimg['image_name']))&&(file_exists($rowimg['image_name'])))
			{
           		
				if($sizeget>1)
				{
				$strng .='<div style="float:left;width:50%; padding:2px;">';
				
				if(mime_content_type($rowimg['image_name'])=='video/3gpp' or mime_content_type($rowimg['image_name'])=='video/mp3' or mime_content_type($rowimg['image_name'])=='video/mp4' or mime_content_type($rowimg['image_name'])=='video/3gpp' or mime_content_type($rowimg['image_name'])=='audio/mpeg' or mime_content_type($rowimg['image_name'])=='audio/x-flv' or mime_content_type($rowimg['image_name'])=='video/mov' or mime_content_type($rowimg['image_name'])=='video/Mp4' or mime_content_type($rowimg['image_name'])=='video/quicktime' or $rowimg['file_type']=='video' ){
					
					$strng2 .= '<video class="img-responsive"  controls="controls" preload="metadata" >
  <source src="'.$rowimg['image_name'].'#t=0.8" type="'.mime_content_type($rowimg['image_name']).'">

</video> ';
					
				   
				} 
				
				else {
					$strng .= '<img src="'.$rowimg['image_name'].'" class="img-responsive"  />';
				}
				
				
				
				$strng .= '</div>';
				}
				else
				{
					
					$strng .= '<div style="float:left;">';
					
					
				
				if(mime_content_type($rowimg['image_name'])=='video/3gpp' or mime_content_type($rowimg['image_name'])=='video/mp3' or mime_content_type($rowimg['image_name'])=='video/mp4' or mime_content_type($rowimg['image_name'])=='video/3gp' or mime_content_type($rowimg['image_name'])=='audio/mpeg' or mime_content_type($rowimg['image_name'])=='audio/x-flv' or mime_content_type($rowimg['image_name'])=='video/mov' or mime_content_type($rowimg['image_name'])=='video/Mp4' or mime_content_type($rowimg['image_name'])=='video/quicktime' or $rowimg['file_type']=='video'){
					
					$strng .= '<video class="img-responsive"  controls="controls" preload="metadata">
  <source src="'.$rowimg['image_name'].'#t=0.8" type="'.mime_content_type($rowimg['image_name']).'"></video> ';
					
				   
				} 
				
				else {
					$strng .= '<img src="'.$rowimg['image_name'].'" class="img-responsive"  />';
				}
				
				
				
				$strng .= '</div>';
				}
				
				
				
				
				
			}
           
		   
		  
		   

		   }
		   
		   echo '<div style="float:left;">'.$strng2.'</div>'.$strng;
		   
  
		   
	   }
	 


function isImage($path)
{
    $a = getimagesize($path);
    $image_type = $a[2];

    if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
    {
        return true;
    }
    return false;
}
	   

	
	 function getofferimages3($offerid,$userid)
	   
	   {
		  global $conn;
		
		$q = mysqli_fetch_array(mysqli_query($conn,"select image_name from posted_offers_images where offer_id='".$offerid."' and user_id='".$userid."'"));
		
		$imgname = 'images/No_image.png';
		
		
		
		if($this->isImage($q['image_name']))
		
		return $q['image_name'];  
		
		else
		
		return $imgname;
		
		
		
		
		  
	   }
	
	
	
	  function getofferimages2($offerid,$userid)
	   
	   {
		  global $conn;
		  		  
		   $fields = array('image_name','file_type');
		  
		  $arrayimg = $this->selectAll('posted_offers_images',' image_name,file_type ',"offer_id='".$offerid."' ",'');

          
		   $sizeget = sizeof($arrayimg);	
		
		
		
		   $strng = '';
		   
		  
		   		
			
           foreach($arrayimg as $rowimg)

           

		   {

		     
		

         
		   
		    if((is_file($rowimg['image_name']))&&(file_exists($rowimg['image_name'])))
			{
           		
				if($sizeget>1)
				{
				
				
			
					$strng .= '<div style="float:left;width:50%;padding:2px;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  />';
				
				
				
				
				$strng .= '</div>';
				}
				else
				{
					
					$strng .= '<div style="float:left;">';
					
					
				
					$strng .= '<img src="'.$rowimg['image_name'].'" class="img-responsive"  />';
				
				
				
				$strng .= '</div>';
				}
				
				
				
				
				
			}
           
		   
		  
		   return $strng;


		   
  
		   
	       }
	
	
	
	
	   }
	
	
	
	
	

	function getbids()
	{
		
	}
	   
	function bidimages()
	{
		
	}

	function bidscount($offerid)
	{
		global $conn;
		$total_offers = mysqli_query($conn,"select bid_id from bids_against_offers where offer_id = '".$offerid."'");
		$rowss=mysqli_num_rows($total_offers);
		if($rowss>0)
			return $rowss.' offers';
		else
			return false;
	}
	
	
	
	

	function makeoffer($offerid,$offerposteduser)
	{
		global $conn;
		// first check offer is closed or open
		$total = mysqli_num_rows(mysqli_query($conn,"select offer_status from posted_offers where offer_status=1 and offer_id='".$offerid."'"));
/*		if($total==0)
			echo '<div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="padding-right: 0px; font-weight: bold; color: red; text-align: right;"><span class="glyphicon glyphicon-triangle-top"></span>&nbsp;closed</div>';
		else*/ 
		if($total>0)
		{
			echo '<div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="padding-right: 0px; font-weight: bold; color: red; text-align: right;"><button style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred00"  onclick="location.href=\'make_offers_new.php?p=makeoffer&offer_id='.$offerid.'&offer_posted_user='.$offerposteduser.'\';">make an offer</button></div>';
		}
	}
	  
	function hashtags2($catid,$title)
	{
		global $conn;
		if(!empty($catid))
		{
			$exp = explode('_',$catid);
			$array = mysqli_fetch_array(mysqli_query($conn,"select cat_title from categories where cat_id='".$exp[0]."'"));
			if($array['cat_title']=='buy something')
				return '#buysomething';
			elseif($array['cat_title']=='need something done')
				return '#needsomethingdone';
			elseif($array['cat_title']=='rent something')
				return '#rentsomething';
		}
	}
	  
	   function makeofferhappen($offerid,$offerposteduser)
	   {
		global $conn;
		  
		  // first check offer is closed or open
		  
		  $ress = mysqli_query($conn,"select offer_status,offer_cat,offer_title,offer_posted_user from posted_offers where offer_status=1 and offer_id='".$offerid."'");
		  
		  $arry = mysqli_fetch_array($ress);
		  
		  
		  $total = mysqli_num_rows($ress);
		 /* if($total==0)
		  
		  echo '<div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="padding-right: 0px; font-weight: bold; color: red; text-align: right;"><span class="glyphicon glyphicon-triangle-top"></span>&nbsp;closed</div>';
		  
		   else*/ 
		   
		   if($total>0 and $arry['offer_posted_user']!=$_SESSION['user_session'])
	 
	 		{
     
  /*  echo '<div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="padding-right: 0px; font-weight: bold; color: red; text-align: right;"><button style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred00"  onclick="location.href=\'make_offers_new.php?p=makeoffer&offer_id='.$offerid.'&offer_posted_user='.$offerposteduser.'\';">make an offer</button></div>';*/
	
	$tags = $this->hashtags2($arry['offer_cat'],$arry['offer_title']);
	
	
	/// check user already set payment options
	
	
	
	
	global $conn;
	
	$arrg1 = mysqli_fetch_array(mysqli_query($conn,"select * from posted_offers where offer_id='".trim($offerid)."'"));
	
	
	
	
	
	
	
	
	$qrchk = mysqli_query($conn,"select acceptted_methods,shipping_methods,pickup_methods,price_shipping,shipping_methods_dummy from bids_against_offers where user_id='".$_SESSION['user_session']."' order by bid_id DESC limit 1");
	
	
	if(mysqli_num_rows($qrchk)>0)
	{
		$arrgetit = mysqli_fetch_array($qrchk);
		
		$arrgateway = array();
		
		$arrgateway = explode(',',$arrgetit['acceptted_methods']);
		
		
		if(in_array('paypal / online credit & debit cards',$arrgateway))
		
		$paychk = 'checked="checked"';
		
		
		if(in_array('facebook payments',$arrgateway))
		
		$facbk = 'checked="checked"';
		
		
		
		if(in_array('check',$arrgateway))
		
		$checque = 'checked="checked"';
		
		
		
		
		
		
		if(in_array('money order',$arrgateway))
		
		$morder = 'checked="checked"';
		
		
		
		
		
		
		if(in_array('check',$arrgateway))
		
		$checque = 'checked="checked"';
		
		
		
		if(in_array('cash',$arrgateway))
		
		$cash = 'checked="checked"';
		
		
		if(in_array('in-store credit & debit cards',$arrgateway))
		
		$iscd = 'checked="checked"';
		
		
		$shipping_methods_dummy = array();
		
		$shipping_methods_dummy = explode(',',$arrgetit['shipping_methods_dummy']);
		
		
		if(in_array('ship',$shipping_methods_dummy))
		
		$ship = 'checked="checked"';
		
		
		

		
		
		if($arrgetit['pickup_methods']=='pickup')
		
		$pickup = 'checked="checked"';
				

		
	}
	//data-toggle="modal" data-target="#myModal_'.$offerid.'"
	
	//href="https://plus.google.com/share?url=https://wowme.deals/gshare.php?id=1_1"
	
	//href="https://twitter.com/intent/tweet?url=https://wowme.deals/gshare.php?id='.$offerid.'_'.$_SESSION['user_session'].'&text='.$arrg1['offer_title'].'" 
	
	
	//href="https://www.facebook.com/sharer/sharer.php?u=https://wowme.deals/gshare.php?id='.$offerid.'_'.$_SESSION['user_session'].'" 
	
	/* onclick="javascript:window.open(this.href,
  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;"*/
  
  
  
  /* <a  target="_blank" class="fa fa-twitter"
  href="https://twitter.com/intent/tweet?text='.str_replace(' ','%20',$arrg1['offer_title']).'&url=https://wowme.deals/gshare.php?id='.$offerid.'_'.$_SESSION['user_session'].'&hashtags=wowme,make-offers">

</a>*/





/*  <a class="fa fa-google-plus g-interactivepost" 
  data-contenturl="https://wowme.deals/gshare.php?id='.$offerid.'_'.$_SESSION['user_session'].'"
  data-contentdeeplinkid="https://wowme.deals/refer/Sean+Wilson"
  data-clientid="392623087115-b0nfhm3gjkvn05k5f9gd3efjv90sh76u.apps.googleusercontent.com"
  data-cookiepolicy="single_host_origin"
  data-prefilltext="wowme.deals make offers ('.$arrg1['offer_title'].')"
  data-calltoactionlabel="CREATE"
  data-calltoactionurl="https://plus.google.com/pages/create"
  data-calltoactiondeeplinkid="https://wowme.deals/" style="font-size:24px;" 
  
   onclick="javascript:window.open(\'https://wowme.deals/gshare.php?id='.$offerid.'_'.$_SESSION['user_session'].'"\',
  \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;"
  
  
    ></a>*/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/* <button class="fa fa-google-plus" style="font-size:24px;background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;color: gray;"  
	 
	 
	 data-toggle="modal" data-target="#product_view_google_'.$offerid.'"
	 
	 
	 
	 ></button> 
	 
	
	

 <button class="fa fa-twitter" style="font-size:24px;background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;color: gray;"  
	 
	 
	 data-toggle="modal" data-target="#product_view_twitter_'.$offerid.'"
	 
	 
	 
	 ></button>  
	 
	 
	  <button class="fa fa-facebook" style="font-size:24px;background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;color: gray;"  
	 
	 
	 data-toggle="modal" data-target="#product_view_'.$offerid.'"
	 
	 
	 
	 ></button> 
	 
	 
	 */
	 
	 
	 $ua = new UserAgent();
	 
	 $fb_url = 'http://www.facebook.com';

//if site is accessed from mobile, then redirect to the mobile site.
if($ua->is_mobile()){
	
	 $fb_url = 'https://m.facebook.com';
   
}
  
  
	 echo '<div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="padding-right: 0px; font-weight: bold; color: red; text-align: right;">
	 
	 
	
	 
	 <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="padding-right: 0px;padding-left: 0px;  font-weight: bold; color: red; text-align: right;float:right;">
	 
	 <button style="float:right;font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred00"    onclick="makeoffer('.$offerposteduser.','.$offerid.','.$_SESSION['user_session'].',\''.$tags.'\',\'myModal_'.$offerid.'\');">make an offer</button></div>
	 
	
	  <div class="col-lg-3 col-xs-3 col-sm-3 col-md-3 floatingpoint" style="padding-right: 0px;padding-left: 0px; ">
	 
	
	 
	
	
	
	
	
	
	<div class="btn-group" style="background:none;border:none;">
  <button type="button" class="dropdown-toggle  " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;border-shadow:none;">
   
    <span style="font-size:18px;cursor:pointer;color:gray;" class=\'glyphicon glyphicon-share-alt\' ></span>
   
  </button>
  <ul class="dropdown-menu" style="margin: 5px 0 0 -90px;left: 37px;min-width: 118px;">
   
    <li style="padding-left:3px;padding-bottom:0px;float: left;">
	
	
	 
	 
	 
	 
	  <a  target="_blank"
	 
	
	
	href="'.$fb_url.'/sharer/sharer.php?s=100&amp;p[url]=https://wowme.deals/gshare.php?id='.$offerid.'_'.$_SESSION['user_session'].'&amp;p[images][0]=https://wowme.deals/'.$this->getofferimages3($offerid,$arrg1['offer_posted_user']).'&amp;p[title]=wowme.deals make offers title&amp;p[summary]='.str_replace(' ','%20',$arrg1['offer_title']).'" class="fa fa-facebook" style="color:gray;font-size:24px;padding: 5px 7px;"></a>
	 
	 
	 
	 
	 
	 
	 
	 
    
    
    </li>
   
    <li style="padding-left:3px;float: left;">
	
	
	 
	 <a style="color: gray;font-size:24px;padding: 5px 7px;" target="_blank" class="fa fa-twitter"
  href="https://twitter.com/intent/tweet?text='.str_replace(' ','%20',$arrg1['offer_title']).'&url=https://wowme.deals/gshare.php?id='.$offerid.'_'.$_SESSION['user_session'].'">

</a>
	



	 
	 
	 
	 
	 
	 
	 
	 
	 
	
	
	 </li>
	 
	 
	 
	 
	  <li style="padding-left:3px;padding-bottom:0px;float: left;">
	
    
  
    
	
	
	 <a class="fa fa-google-plus g-interactivepost" 
  data-contenturl="https://wowme.deals/gshare.php?id='.$offerid.'_'.$_SESSION['user_session'].'"
  data-contentdeeplinkid="https://wowme.deals/refer/Sean+Wilson"
  data-clientid="392623087115-b0nfhm3gjkvn05k5f9gd3efjv90sh76u.apps.googleusercontent.com"
  data-cookiepolicy="single_host_origin"
  data-prefilltext="wowme.deals make offers ('.$arrg1['offer_title'].')"
  data-calltoactionlabel="CREATE"
  data-calltoactionurl="https://plus.google.com/pages/create"
  data-calltoactiondeeplinkid="https://wowme.deals/" style="font-size:24px;color:gray;padding: 5px 7px;" 
  
 
  
  
    ></a>
	
	
	
	
	
	
	
	
    
    </li>
	 
	 
	 
	 
	 
	 
	 
	 
	 
  </ul>
</div>
	
	 
	 </div>
	 
  
  </div>
 
 
 <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="product_view_'.$offerid.'">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Share on Your Timeline</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 product_img">
                        '.$this->getofferimages2($offerid,$arrg1['offer_posted_user']).'
                    </div>
                    <div class="col-md-6 product_content">
                        
                        <p>'.$arrg1['offer_title'].'</p>
                      
                        
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                           
                            <a  target="_blank"
	 
	
	
	href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=https://wowme.deals/gshare.php?id='.$offerid.'_'.$_SESSION['user_session'].'&amp;p[images][0]=https://wowme.deals/'.$this->getofferimages3($offerid,$arrg1['offer_posted_user']).'&amp;p[title]=wowme.deals make offers title&amp;p[summary]='.str_replace(' ','%20',$arrg1['offer_title']).'" class="btn btn-primary" style="background-color:#006;"> share</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	  
	  
	  
	  
	  
	  
	  <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="product_view_twitter_'.$offerid.'">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Share on Your Timeline</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 product_img">
                        '.$this->getofferimages2($offerid,$arrg1['offer_posted_user']).'
                    </div>
                    <div class="col-md-6 product_content">
                        
                        <p>'.$arrg1['offer_title'].'</p>
                      
                        
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                           
                            <a  target="_blank"
	 
	
	
	href="https://twitter.com/intent/tweet?text='.str_replace(' ','%20',$arrg1['offer_title']).'&url=https://wowme.deals/gshare.php?id='.$offerid.'_'.$_SESSION['user_session'].'&hashtags=wowme,make-offers" class="btn btn-primary" style="background-color:#006;"> share</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




	  
	    <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="product_view_google_'.$offerid.'">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Share on Your Timeline</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 product_img">
                        '.$this->getofferimages2($offerid,$arrg1['offer_posted_user']).'
                    </div>
                    <div class="col-md-6 product_content">
                        
                        <p>'.$arrg1['offer_title'].'</p>
                      
                        
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                           
                          
						  
						    <a target="_blank" class="g-interactivepost btn btn-primary" 
  data-contenturl="https://wowme.deals/gshare.php?id='.$offerid.'_'.$_SESSION['user_session'].'"
  data-contentdeeplinkid="https://wowme.deals/refer/Sean+Wilson"
  data-clientid="392623087115-b0nfhm3gjkvn05k5f9gd3efjv90sh76u.apps.googleusercontent.com"
  data-cookiepolicy="single_host_origin"
  data-prefilltext="wowme.deals make offers ('.$arrg1['offer_title'].')"
  data-calltoactionlabel="CREATE"
  data-calltoactionurl="https://plus.google.com/pages/create"
  data-calltoactiondeeplinkid="https://wowme.deals/" >share</a>
	
	
	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

	  
	  
	  
	  
	  
	  
	  
	  
  
  
  <div class="modal fade" id="myModal_'.$offerid.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
  
  <form id="myfrmis_'.$offerid.'" method="post">
  
    <div class="modal-content">
     
      <div class="modal-body" style="float:left;">
        <div style="margin-top:15px;">
        
        
        <div class="form-group" style="float:left;width:100%;"><textarea style="margin-top:10px;border:none; background:transparent;-webkit-box-shadow: unset;" class="form-control" name="desc" id="desc__'.$offerid.'" placeholder="describe what you\'re offering, including the price (for example $5)" cols="" rows=""></textarea>
       
       </div>
        
        <div class="col-lg-12" id="image-holder__'.$offerid.'" style="margin-bottom: 10px;"></div>        
        
		 <div class="col-lg-12" id="video-holder__'.$offerid.'" style="margin-bottom:10px;float:left;">
		 
		 <div id="imm_21054_1__'.$offerid.'" onclick="removevideo_'.$offerid.'(\'video1__'.$offerid.'\',\'imm_21054_1__'.$offerid.'\',\'\')" style="display:none;" class="crossbutton">X</div><video id="video1__'.$offerid.'" controls="controls" style="display:none; width:100px; height:100px;" ></video>
       </div>
		 
		 <div style="float:left; width:100%; text-align:left; padding-left:12px;"> 
		 
		 
		  <label class="filebutton" style="margin-bottom: -4px; background:none;font-size: 27px; padding-right:10px;height:auto; width:auto; cursor:pointer;">
<i class="glyphicon glyphicon-facetime-video"></i>
           <span><input type="file" id="upload_file2_'.$offerid.'" name="upload_file2"  /></span>

          </label>
		
          <label class="filebutton" style="margin-bottom: -4px; background:none;font-size: 27px; height:auto; width:auto;cursor:pointer;">
<i class="glyphicon glyphicon-camera"></i>
           <span><input id="uploadfile_'.$offerid.'" name="upload_file[]" class="required" multiple="" type="file"></span>

          </label>
		 
		 </div>
		 
		 <input type="hidden" id="uploadedvideo_'.$offerid.'" name="uploadedvideo" value="">
		 
		 
		 <div class="bordersep"></div>
		 
		 <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="padding-right:0px">
		 
		 <div style="float: left;margin-top: 10px;width: 56px;">I accept</div> 
		
		<div class="checkbox" style="width: 250px;float:left;">
          <label style="padding-left:0px;">
           <input name="has_paypal" id="has_paypal_'.$offerid.'" 
		   
		   onclick="chkpaypal(\''.$_SESSION['paypal_email'].'\',\'has_paypal_'.$offerid.'\')" type="checkbox" value="paypal / online credit & debit cards"  '. $paychk .' /> 
            <span class="cr"><i class="cr-icon glyphicon glyphicon-arrow-right"></i></span>
            paypal / online credit & debit cards
          </label>
        </div>
		 
		  <div style="float:left;width:54px;margin-top:5px;"><button type="button" class="btn btn-default" style="padding: 2px 11px;" onclick="location.href=\'view-profile.php\'">edit</button></div> 
		  
		   <div class="checkbox" style="float: left;margin-left: 7px;margin-top: 9px;width: 68px;">
          <label style="padding-left:0px;">
           <input name="has_check" type="checkbox" value="check" '.$checque.' />
            <span class="cr"><i class="cr-icon glyphicon glyphicon-arrow-right"></i></span>
           check
          </label>
        </div>
		  
		  <div class="checkbox" style="float: left; margin-top: 9px;width: 111px;">
          <label style="padding-left:0px;">
           <input name="has_morder" type="checkbox" value="money order" '.$morder.' />
            <span class="cr"><i class="cr-icon glyphicon glyphicon-arrow-right"></i></span>
           money order
          </label>
        </div>
		 
		 </div> 
		 
		  <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="margin-top:10px">
		
		
		  <div class="checkbox" style="width: 165px;float:left;margin-top:-3px;">
          <label style="padding-left:0px;">
          <input name="facbk" type="checkbox" value="facebook payments" '.$facbk.' />
            <span class="cr"><i class="cr-icon glyphicon glyphicon-arrow-right"></i></span>
          facebook payments
          </label>
        </div>
		
		
		   <div class="checkbox" style=" float: left;margin-top: -3px;width: 68px;">
          <label style="padding-left:0px;">
          <input name="has_cash" type="checkbox" value="cash" '.$cash.' />
            <span class="cr"><i class="cr-icon glyphicon glyphicon-arrow-right"></i></span>
           cash
          </label>
        </div>
		
		
		 <div class="checkbox" style="width: 207px;float:left;">
          <label style="padding-left:0px;">
          <input name="has_cdebit" type="checkbox" value="in-store credit & debit cards" '.$iscd.' />
            <span class="cr"><i class="cr-icon glyphicon glyphicon-arrow-right"></i></span>
          in-store credit & debit cards
          </label>
        </div>

		 </div>
		 
		  <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="margin-top: 25px;">
		  
		  <div  style="float:left;margin-top: 3px;">
		  
		   <div class="checkbox" style="width: 90px;float:left;margin-top: 5px;">
          <label style="padding-left:0px;">
          <input name="has_ship" type="checkbox" value="ship" '.$ship.' />
            <span class="cr"><i class="cr-icon glyphicon glyphicon-arrow-right"></i></span>
          ships via 
          </label>
        </div>';
		  
		  
		//  print_r($shipping_methods_dummy);
		   
		  
		  ?><select id="shipment" name="shipment">
		  <option value="">select carrier</option>
		  <option value="USPS" <?php if(in_array('USPS',$shipping_methods_dummy)) echo 'selected'; ?>>USPS</option>
		  <option value="UPS" <?php if(in_array('UPS',$shipping_methods_dummy)) echo 'selected'; ?>>UPS</option>
		  <option value="Fedex" <?php if(in_array('Fedex',$shipping_methods_dummy)) echo 'selected'; ?>>Fedex</option>
		  </select> in 
		  
		  <select id="bdays" name="bdays">
		  <option value=""># of business days</option>
		  <option value="1 business day" <?php if(in_array('1 business day',$shipping_methods_dummy)) echo 'selected'; ?>>1 business day</option>
		  <option value="1-3 business days" <?php if(in_array('1-3 business days',$shipping_methods_dummy)) echo 'selected'; ?>>1-3 business days</option>
		  <option value="3-5 business days" <?php if(in_array('3-5 business days',$shipping_methods_dummy)) echo 'selected'; ?>>3-5 business days</option>
		  <option value="7 business days" <?php if(in_array('7 business days',$shipping_methods_dummy)) echo 'selected'; ?>>7 business days</option>
		  <option value="7-10 business days" <?php if(in_array('7-10 business days',$shipping_methods_dummy)) echo 'selected'; ?>>7-10 business days</option>
		  <option value="14 business days" <?php if(in_array('14 business days',$shipping_methods_dummy)) echo 'selected'; ?>>14 business days</option>
		  </select>
		  for $ <input type="text" name="price_shipping" size="3" value="<?php echo $arrgetit['price_shipping']; ?>" />
		  
		  </div>
		  
		   <div  style="float:left;">
		  
		   <select id="tracking" name="tracking" style="margin-top:5px;">
		  <option value="">select tracking options</option>
		  <option value="with tracking" <?php if(in_array('with tracking',$shipping_methods_dummy)) echo 'selected'; ?>>with tracking</option>
		  <option value="without tracking" <?php if(in_array('without tracking',$shipping_methods_dummy)) echo 'selected'; ?>>without tracking</option>
		
		  </select>
		 
         
         <?php 
		  echo '</div>
		  
		  </div>
		  
		 <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="margin-top:10px;">
		 
		 
		 <div class="checkbox" style="width: 90px;float:left;">
          <label style="padding-left:0px;">
          <input name="pickup" type="checkbox" value="pickup" '.$pickup.' />
            <span class="cr"><i class="cr-icon glyphicon glyphicon-arrow-right"></i></span>
          pickup
          </label>
        </div>
	 
		 </div> 
		 
		  <div id="showhidethis_'.$offerid.'" style="display:none;" class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="margin-top:10px;">
		  <img width="75" src="images/LOADING.gif">
		  </div>
        
        </div>
      </div>
	  
      <div class="modal-footer" style="border-top:none;">
        <input id="uploadedimages__'.$offerid.'" name="uploadedimages" value="" type="hidden">
        
        <input name="buyer_price" id="buyer_price__'.$offerid.'" value="" type="hidden">
        
        <input name="option" value="postofferpopup" type="hidden">
        
        <input name="oldbidid" value="'.$offerid.'" type="hidden">
		
		<input name="offerid" value="'.$offerid.'" type="hidden">
        
        <button type="submit" class="btn btn-primary buttongreen">make your offer</button>
		
		<button type="button" class="btn btn-default" data-dismiss="modal" style="padding: 2px 11px;">cancel</button>
        
      </div>
    </div>
    
    </form>
    
      <script>
	  
	  $("#upload_file2_'.$offerid.'").on(\'change\', function () {
		
		
		';
		
		?>
        
        
         $("#video-holder__<?php echo $offerid; ?>").html('<div id="imm_21054_1__<?php echo $offerid; ?>" onclick="removevideo_<?php echo $offerid; ?>(\'video1__<?php echo $offerid; ?>\',\'imm_21054_1__<?php echo $offerid; ?>\',\'\')" style="display:none;" class="crossbutton">X</div><video id="video1__<?php echo $offerid; ?>" controls="controls" style="display:none; width:100px; height:100px;" ></video>');
         
         <?php
		
	
	echo '$("#video1__'.$offerid.'").css(\'display\',\'block\');	
	
	$("#imm_21054_1__'.$offerid.'").css(\'display\',\'block\');	
	
	var $video = $(\'#video1__'.$offerid.'\');

	$video.prop(\'src\', URL.createObjectURL($(\'#upload_file2_'.$offerid.'\').get(0).files[0]));

	//$video.get(0).play();
	
	$("#uploadedvideo_'.$offerid.'").val($(\'#upload_file2_'.$offerid.'\').get(0).files[0].name)
	
	 
 });
	  
	  
	  function removevideo_'.$offerid.'(id,id2,img)

{

 $("#uploadedvideo_'.$offerid.'").val(\'\');	


$("#"+id).remove();

$("#"+id2).remove();
	
}
	
	$("#uploadfile_'.$offerid.'").on(\'change\', function () {
     //Get count of selected files
     var countFiles = $(this)[0].files.length;
	 
	 if(countFiles>4)
   {
	 alert(\'not more than 4 images\')
	 $(\'#uploadfile_'.$offerid.'\').val(\'\');
	 $(\'#uploadfile_'.$offerid.'\').select();
	  return false
	 }
	 
	 else
	 
	 {
     var imgPath = $(this)[0].value;
	 
     var extn = imgPath.substring(imgPath.lastIndexOf(\'.\') + 1).toLowerCase();
     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
	    
		 if (typeof (FileReader) != "undefined") {
              $.each(this.files, function() {
				
				readURL__'.$offerid.'(this);
			   
             })
			 
         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
	 
  }
	 
 });
 
  function readURL__'.$offerid.'(file)
 
 {
		 var image_holder = $("#image-holder__'.$offerid.'");
     
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
					 
					 
					  $("<div id=\'imm_"+ vv +"\' onclick=\"removeimg__'.$offerid.'(\'imm"+ vv +"\',\'imm_"+ vv +"\',\'"+file.name+"\')\" class=\'crossbutton\'>X</div>").appendTo(image_holder);
                
				
				   latestval = $("#uploadedimages__'.$offerid.'").val();
				   
				   if(latestval==\'\')
				   
				   $("#uploadedimages__'.$offerid.'").val(file.name)
				   
				   else if(file.name!=\'\')
				   
				   $("#uploadedimages__'.$offerid.'").val(latestval+\',\'+file.name)
				
				 }
				 
				 reader.readAsDataURL(file);
				 
				//var filenameis = $(this)[0].files[i].name;
					
                 image_holder.show();
	 
}
 
 
 function removeimg__'.$offerid.'(id,id2,img)
{
var str = $("#uploadedimages__'.$offerid.'").val();	
st = str.split(\',\');
arr = [];
array = arr.concat(st);
array = $.grep(array, function(value) {
  return value != img;
});

 array.toString();
 
 $("#uploadedimages__'.$offerid.'").val(array)
//alert(array)
$("#"+id).remove();
$("#"+id2).remove();
	
}
 
 
 $("#myfrmis_'.$offerid.'").on(\'submit\',(function(e) {
		
		if(validatefirst__'.$offerid.'())
		{
			
			$(\'#showhidethis_'.$offerid.'\').css(\'display\',\'block\');
		
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
				
				//$(\'#myModal_'.$offerid.'\').html(\'<img width="75" src="images/LOADING.gif">\')
				
				
			},
			success: function(data)
		    {
				if(data==\'invalid\')
				{
					
				}
				else
				{
					//alert(data)
					// view uploaded file.
					//$("#preview").html(data).fadeIn();
					$("#myfrmis_'.$offerid.'")[0].reset();	
					
					$("#image-holder__'.$offerid.'").html(\'\');
					
					$("#image-holder__'.$offerid.'").html(\'<span style="color:red"></span>\');
					
					
					$("#uploadedimages__'.$offerid.'").val(\'\');
					
					loadlastoffer00(data,\''.$offerid.'\');
					
				}
		    },
		  	error: function(e) 
	    	{
				
				
				alert(\'error\')
	    	} 	        
	   });
	   
	}
	
	else
	{
	  
	  e.preventDefault();
	  
	  return false;
	
	}
	   
	}));
 
 
 function validatefirst__'.$offerid.'()
{
	  var counter = 0;
	  
	 
	   if($(\'#desc__'.$offerid.'\').val()==\'\')
	   {
		alert(\'please enter description\')
		$(\'#desc__'.$offerid.'\').select();
		
		counter=1;
		return false;
		}
		
		var str = $(\'#desc__'.$offerid.'\').val();
	
	    var res = str.split("$");
	    
		
		
		if(res.length==1)
		
		{
			
			counter=1;
			
			alert(\'please dont forget to include the price in your offer (for example $5)\');

		return false;
			
		}
		
		else if(res.length==1)
		
		{
		
		   $(\'#buyer_price__'.$offerid.'\').val(\'$20\');
	
			
		}
		
		else
		{
			
			if(res.length>1)
			
			var res2 = res[1].split(" "); 
			
			
			
			if(res2[0]==\'\')
			{
			  
			  $(\'#buyer_price__'.$offerid.'\').val(\'$20\');
			  
			  
			}
		
		}
		
		
		
		if(counter==0)
		return true;
		
}
 
 
	
	</script>
    
    
    
    
    
    
  </div>
</div>
	</div> 
	 
	 
	 
	 
	 
	 ';
     
	 		}
	
		   
	  }
  
	  
	  
	  
	   function viewoffers($offerid,$offerposteduser)
	   {
		   global $conn;
		  
		
		   
		   if($this->bidscount($offerid))
	 
	 		{
     
    echo ' <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="padding-right: 0px; font-weight: bold; color: red; text-align: right;"><button style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred00"  onclick="getoffers('.$offerposteduser.','.$offerid.','.$_SESSION['user_session'].');">view offers</button></div>';
     
	 		}
	
		   
	  }
	  
	  
	/*  function getbidimages($bidid,$userid)
	  {
		  global $conn;
		  
		  
		
$userimg = mysqli_query($conn,"select image_name from bids_against_offers_images where user_id = '".$userid."' and bid_id='".$bidid."'");
           
           while($rowimg=mysqli_fetch_array($userimg))
		   {
		  
           
           //if(file_exists($rowimg['image_name']))
		   
		   if((is_file($rowimg['image_name']))&&(file_exists($rowimg['image_name'])))
           
           echo '<div style="float:left;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  /></div>';  
		   
		   }
		  
	  }*/
	  
	  
	  /*   function getbidimages($bidid,$userid)
	   
	   {
		  global $conn;
		  		  
		 $userimg = mysqli_query($conn,"select image_name from bids_against_offers_images where bid_id='".$bidid."' and edited=0");
           
		   
		   $sizeget = mysqli_num_rows($userimg);

           while($rowimg=mysqli_fetch_array($userimg))

           {

         
		   
		    if((is_file($rowimg['image_name']))&&(file_exists($rowimg['image_name'])))
		   


           
			{
           		
				if($sizeget>1)
				{
				$strng .='<div style="float:left;width:50%; padding:2px;">';
				
				if(mime_content_type($rowimg['image_name'])=='video/3gpp' or mime_content_type($rowimg['image_name'])=='video/mp3' or mime_content_type($rowimg['image_name'])=='video/mp4' or mime_content_type($rowimg['image_name'])=='video/3gpp' or mime_content_type($rowimg['image_name'])=='audio/mpeg' or mime_content_type($rowimg['image_name'])=='audio/x-flv' or mime_content_type($rowimg['image_name'])=='video/mov' or mime_content_type($rowimg['image_name'])=='video/Mp4' or mime_content_type($rowimg['image_name'])=='video/quicktime' or $rowimg['file_type']=='video' ){
					
					$strng2 .= '<video class="img-responsive"  controls="controls" preload="metadata" >
  <source src="'.$rowimg['image_name'].'#t=0.8" type="'.mime_content_type($rowimg['image_name']).'">

</video> ';
					
				   
				} 
				
				else {
					$strng .= '<img src="'.$rowimg['image_name'].'" class="img-responsive"  />';
				}
				
				
				
				$strng .= '</div>';
				}
				else
				{
					
					$strng .= '<div style="float:left;">';
					
					
				
				if(mime_content_type($rowimg['image_name'])=='video/3gpp' or mime_content_type($rowimg['image_name'])=='video/mp3' or mime_content_type($rowimg['image_name'])=='video/mp4' or mime_content_type($rowimg['image_name'])=='video/3gp' or mime_content_type($rowimg['image_name'])=='audio/mpeg' or mime_content_type($rowimg['image_name'])=='audio/x-flv' or mime_content_type($rowimg['image_name'])=='video/mov' or mime_content_type($rowimg['image_name'])=='video/Mp4' or mime_content_type($rowimg['image_name'])=='video/quicktime' or $rowimg['file_type']=='video'){
					
					$strng .= '<video class="img-responsive"  controls="controls" preload="metadata">
  <source src="'.$rowimg['image_name'].'#t=0.8" type="'.mime_content_type($rowimg['image_name']).'"></video> ';
					
				   
				} 
				
				else {
					$strng .= '<img src="'.$rowimg['image_name'].'" class="img-responsive"  />';
				}
				
				
				
				$strng .= '</div>';
				}
				
				
				
				
				
			}
           
		   
		  
		   

		   }
		   
		   echo '<div style="float:left;">'.$strng2.'</div>'.$strng;
		   
  
		   
	   }*/
	   
	   
	   
	     function getbidimages($bidid,$userid)
	   
	   {
		  global $conn;
		  
		 
		  		  
		 $userimg = mysqli_query($conn,"select image_name from bids_against_offers_images where bid_id='".$bidid."' and edited=0 and file_type='image' ");
           
		   
		  $sizeget = mysqli_num_rows($userimg);

           while($rowimg=mysqli_fetch_array($userimg))
           {

         
		   
		    if((is_file($rowimg['image_name']))&&(file_exists($rowimg['image_name'])))
			{
           		
				if($sizeget>1)
				{
				
				
			
					$strng .= '<div style="float:left;width:50%;padding:2px;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  />';
				
				
				
				
				$strng .= '</div>';
				}
				else
				{
					
					$strng .= '<div style="float:left;">';
					
					
				
					$strng .= '<img src="'.$rowimg['image_name'].'" class="img-responsive"  />';
				
				
				
				$strng .= '</div>';
				}
				
				
				
				
				
			}
           
		   
		  
		   

		   }
		   
		   
		  $userimg = mysqli_query($conn,"select image_name from bids_against_offers_images where bid_id='".$bidid."' and edited=0 and file_type='video'  ");  
		   
		$rowimg=mysqli_fetch_array($userimg);   
		   
		  
		  
		  
		  if(mime_content_type($rowimg['image_name'])=='video/3gpp' or mime_content_type($rowimg['image_name'])=='video/mp3' or mime_content_type($rowimg['image_name'])=='video/mp4' or mime_content_type($rowimg['image_name'])=='video/3gp' or mime_content_type($rowimg['image_name'])=='audio/mpeg' or mime_content_type($rowimg['image_name'])=='audio/x-flv' or mime_content_type($rowimg['image_name'])=='video/mov' or mime_content_type($rowimg['image_name'])=='video/Mp4' or mime_content_type($rowimg['image_name'])=='video/quicktime' or $rowimg['file_type']=='video')
					
					$strng2 .= '<video class="img-responsive"  controls="controls" preload="metadata">
  <source src="'.$rowimg['image_name'].'#t=0.8" type="'.mime_content_type($rowimg['image_name']).'"></video> '; 
		   
		   
		    echo '<div style="float:left;">'.$strng2.'</div>';
		   
		   echo '<div style="float:left;">'.$strng.'</div>';
		   
  
		   
	   }
	  
	  
	  
	  
	  function GetUserName($userid)
	  {
		  global $conn;
		
		$name = mysqli_fetch_array(mysqli_query($conn,"select username from users where user_id='".$userid."'"))  ;
		
		return $name['username'];
		  
	  }
	  
	  
	
	
}

/*function datediff2($startdate)
{
	
	$time2 = time();
	
	$time1 = $startdate;
	
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
	
	
	
	
	}*/
	
	
	
	
function datediff2($startdate)
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

else if($date_diff<60)

$final = 'new';

return $final;
	
	
	
	}
	
	
	
	
	
	function datediff3($startdate)
{
	
	 $time2 = time();
	
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
	
	
	
	
	
	
	
	
	
	


?>