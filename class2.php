<?php

require_once("connection.php");

error_reporting(0);

class happenning 

{

      function selectAll2($tablename,$fields,$where_clause,$orderby)
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


 function getbidimagespopup($bidid,$userid)
	  {
		  global $conn;
		  
		 // echo "select image_name from bids_against_offers_images where user_id = '".$userid."' and bid_id='".$bidid."'";
		
$userimg = mysqli_query($conn,"select image_name from bids_against_offers_images where user_id = '".$userid."' and bid_id='".$bidid."' and file_type!='video'");
           
		   echo '<div class="col-lg-12" id="image-holder__'.$bidid.'" style="margin-bottom: 10px;">';
		   

           while($rowimg=mysqli_fetch_array($userimg))

           {

           if(file_exists($rowimg['image_name']))

           {

          	 
			 $expl = explode('/',$rowimg['image_name']);
			 
			 $rand = mt_rand(1456,548923);
			 
			 
			 echo '<img id="iii'.$rand.'"  style="width"100px;height:100px;" src="'.$rowimg['image_name'].'" class="thumb-image"  />';
		   
		   	 echo "<div id=\"iii_".$rand."\" onclick=\"removeimg('iii".$rand."','iii_".$rand."','".$expl[3]."',".$bidid.")\" class=\"crossbutton\">X</div>";  
		  
		   }
		  
		  
		   }
		   
		   echo '</div>';
	  }
	 


		function selectAll($tablename,$fields,$where_clause,$orderby)
		
		{
			global $conn;
		  			
			if(sizeof($fields)>0 and $fields!='*')
			
			$fields = implode(',',$fields);
			
			elseif($fields=='*')
			
			$fields='*';
			
			if($where_clause!='' and !empty($where_clause))
			{
			
			 $where_clause =' where '.$where_clause;
			 
			 if($tablename=='posted_offers')
			 
			 $where_clause .=' and offer_status=1 ';
			 
			
			}
			
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
		
		
		function buysomething()
		
		{
			
			global $conn;
			
			 $q = mysqli_query($conn,"select * from categories where cat_parent=1");
		   
		   while($array  = mysqli_fetch_array($q))
		   
		   {
			
				echo  '<a href="1_'.$array['cat_id'].'">'.$array['cat_title'].'</a>'; 
			   
			}
			
	  }
	  
	
			function needsomething()
		
		{
			
			global $conn;
			
			 $q = mysqli_query($conn,"select * from categories where cat_parent=23");
		   
		   while($array  = mysqli_fetch_array($q))
		   
		   {
			
				echo  '<a href="23_'.$array['cat_id'].'">'.$array['cat_title'].'</a>'; 
			   
			}
			
	  }
	  
	  
	  function rentsomething()
		
		{
			
			global $conn;
			
			 $q = mysqli_query($conn,"select * from categories where cat_parent=46");
		   
		   while($array  = mysqli_fetch_array($q))
		   
		   {
			
				echo  '<a href="46_'.$array['cat_id'].'">'.$array['cat_title'].'</a>'; 
			   
			}
			
	  }
  
	  
		
	
	function categoryname($id)
	
	{
	
	   global $conn;
	   
	   $exp = explode('_',$id);
		
	   $array = mysqli_fetch_array(mysqli_query($conn,"select cat_title from categories where cat_id='".$exp[1]."'"));
		
	   return $array['cat_title'];

	   
	   
	    	
		
	}
	
	
	
	function hashtags($catid,$title)
	
	{
		global $conn;
		
		$array = mysqli_fetch_array(mysqli_query($conn,"select hashtags from posted_offers where offer_id='".$catid."'"));
		
		
		echo gethashtags($message);
		
		/*if(!empty($catid))
		{
		
		$exp = explode('_',$catid);
		
		
		
		$array = mysqli_fetch_array(mysqli_query($conn,"select cat_title from categories where cat_id='".$exp[0]."'"));
		
		if($array['cat_title']=='buy something')
		
		echo '#buysomething';
		
		elseif($array['cat_title']=='need something done')
		
		echo '#needsomethingdone';
		
		elseif($array['cat_title']=='rent something')
		
		echo '#rentsomething';

		
		
		}*/
		
	}
	
	
	
		function hashtags00($catid,$title)
	
	{
		global $conn;
		
		/*if(!empty($catid))
		{
		
		$exp = explode('_',$catid);
		
		
		
		$array = mysqli_fetch_array(mysqli_query($conn,"select cat_title from categories where cat_id='".$exp[0]."'"));
		
		if($array['cat_title']=='buy something')
		
		$val =  '#buysomething';
		
		elseif($array['cat_title']=='need something done')
		
		$val = '#needsomethingdone';
		
		elseif($array['cat_title']=='rent something')
		
		$val = '#rentsomething';

		
		
		}*/
		
		$array = mysqli_fetch_array(mysqli_query($conn,"select hashtags from posted_offers where offer_id='".$catid."'"));
		
		
		$val = gethashtags($message);
		
		return $val;
		
	}

	
	
	
	function hashtags2($catid,$title)
	
	{
		global $conn;
		
		/*if(!empty($catid))
		{
		
		$exp = explode('_',$catid);
		
		
		
		$array = mysqli_fetch_array(mysqli_query($conn,"select cat_title from categories where cat_id='".$exp[0]."'"));
		
		if($array['cat_title']=='buy something')
		
		return '#buysomething';
		
		elseif($array['cat_title']=='need something done')
		
		return '#needsomethingdone';
		
		elseif($array['cat_title']=='rent something')
		
		return '#rentsomething';

		
		
		}*/
		
				$array = mysqli_fetch_array(mysqli_query($conn,"select hashtags from posted_offers where offer_id='".$catid."'"));
		
		
		$val = gethashtags($message);
		
		return $val;

		
	}
	
	
	function viewbutton($id,$total,$keywords,$price,$category)
	
	{
	
	    	if($total>0)
			{
			
			//$view = 'view ('.$total.')';
			
			$view = 'view';
			
			
			$keywords = base64_encode($keywords);
			
			$price = base64_encode($price);
			
			echo '<button id="btn_'.$id.'" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred00" onclick="updatetotal('.$id.',\''.$keywords.'\',\''.$price.'\',\''.$category.'\')">'.$view.'</button>';
			
			}
			
			else
			
			echo 'no results';
			
			
		
	}
	
	
		function viewbutton002($id,$total,$keywords,$price,$category,$type)
	
	{
	
	    	if($total>0)
			{
			
			//$view = 'view ('.$total.')';
			
			$view = 'view';
			
			
			$keywords = base64_encode($keywords);
			
			$price = base64_encode($price);
			
			echo '<button id="btn_'.$id.'" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred00" onclick="updatetotal('.$id.',\''.$keywords.'\',\''.$price.'\',\''.$category.'\',\''.$type.'\')">'.$view.'</button>';
			
			}
			
			else
			
			echo 'no results';
			
			
		
	}
	
	
	
	function editdelbutton($id)
	
	{
		
		global $conn;
	
		echo '
        <button data-toggle="modal" data-target="#myModalsrch_'.$id.'" id="btn_14" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;display:inline-block;" type="button" class="btn btn-sm btn-primary buttongreen" onclick="call2('.$id.')">edit</button>
         
          &nbsp;<button id="btn_14" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;display:inline-block;" type="button" class="btn btn-sm btn-primary" onclick="deletesearch('.$id.')">delete</button> ';	
		
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

       $row = $this->selectOne('users','*'," user_id = '".$userid."' ",'');

   

      if((is_file($row['user_avatar']))&&(file_exists($row['user_avatar'])))
			
	  echo '<img class="bordrshadow" src="'.$row['user_avatar'].'" width="56" height="54"  />';
	
		//echo '<img class="bordrshadow" src="image.php?img='.$row['user_avatar'].'&amp;w=56&amp;h=54" width="56" height="54"  />';
					
		else
			echo '<img src="images/desktop-makeoffers2_06.png" width="56" height="54"  />';
   
			
		}
		
		
			function getuser00($userid)
		
		{
			global $conn;
			
	   $fields = array('username','user_avatar');

       $row = $this->selectOne('users',$fields,"user_id = '".$userid."'",'');

   

      if((is_file($row['user_avatar']))&&(file_exists($row['user_avatar'])))
		
		
		return '<img class="bordrshadow" src="'.$row['user_avatar'].'" width="56" height="54"  />';
			
		//return '<img class="bordrshadow" src="image.php?img='.$row['user_avatar'].'&amp;w=56&amp;h=54" width="56" height="54"   />';
					
		else
			return '<img src="images/desktop-makeoffers2_06.png" width="56" height="54"  />';
   
			
		}


	
	   function getofferimages($offerid,$userid)
	   
	   {
		  global $conn;
		  		  
		   $fields = array('image_name','file_type');
		  
		  $arrayimg = $this->selectAll('posted_offers_images',$fields,"offer_id='".$offerid."' ",'');

          
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
	   
	   
	   
	    /*  function getofferimages00($offerid,$userid)
	   
	   {
		  global $conn;
		  		  
		   $fields = array('image_name');
		  
		  $arrayimg = $this->selectAll('posted_offers_images',$fields,"offer_id='".$offerid."' and user_id='".$userid."' ",'');

           $sizeget = sizeof($arrayimg);	

           foreach($arrayimg as $rowimg)

           

		   {

		   

          // if(file_exists($rowimg['image_name']))
           
		    if((is_file($rowimg['image_name']))&&(file_exists($rowimg['image_name'])))
           {

           //$val .= '<div style="float:left;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  /></div>';


           	if($sizeget>1)
				
				 $val .= '<div style="float:left;width:50%; padding:2px;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  /></div>';
				
				else
				
				 $val .= '<div style="float:left;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  /></div>';
			
		   }

		   }
  			
			return $val;
		   
	   }
	   
	   */
	   
	   
	   
	   
	     function getofferimages00($offerid,$userid)
	   
	   {
		  global $conn;
		  		  
		   $fields = array('image_name','file_type');
		  
		  $arrayimg = $this->selectAll('posted_offers_images',$fields,"offer_id='".$offerid."' ",'');

          
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
				$strng .='';
				
				if(mime_content_type($rowimg['image_name'])=='video/3gpp' or mime_content_type($rowimg['image_name'])=='video/mp3' or mime_content_type($rowimg['image_name'])=='video/mp4' or mime_content_type($rowimg['image_name'])=='video/3gpp' or mime_content_type($rowimg['image_name'])=='audio/mpeg' or mime_content_type($rowimg['image_name'])=='audio/x-flv' or mime_content_type($rowimg['image_name'])=='video/mov' or mime_content_type($rowimg['image_name'])=='video/Mp4' or mime_content_type($rowimg['image_name'])=='video/quicktime' or $rowimg['file_type']=='video' ){
					
					$strng2 .= '<div style="float:left; padding:2px;"><video class="img-responsive"  controls="controls" preload="metadata" >
  <source src="'.$rowimg['image_name'].'#t=0.8" type="'.mime_content_type($rowimg['image_name']).'">

</video> ';
					
				   
				} 
				
				else {
					$strng .= '<div style="float:left;width:50%; padding:2px;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  />';
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
		   
		   return '<div style="float:left;">'.$strng2.'</div>'.$strng;
		   
  
		   
	   }
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	 
	   
	   
	   
	     function reply_images($offerid,$userid,$reply_id)
	   
	   {
		   global $conn;
		  		  
		   $fields = array('image_name');
		  
		  $arrayimg = $this->selectAll('reply_images',$fields,"reply_id='".$reply_id."' and user_id='".$userid."' ",'');

           $sizeget = sizeof($arrayimg);	

           foreach($arrayimg as $rowimg)
		  
		   {

           //if(file_exists($rowimg['image_name']))
           
		
           
		   
		   
		    if((is_file($rowimg['image_name']))&&(file_exists($rowimg['image_name'])))
           {



           	if($sizeget>1)
				
				 $val .= '<div style="float:left;width:50%; padding:2px;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  /></div>';
				
				else
				
				 $val .= '<div style="float:left;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  /></div>';
			
		   }
		   

		   }
		   
		   echo $val;
  
		   
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
	   
	   
	   	   function madeoffercheck($offerid)
	   
	   {
		   global $conn;
		   
         $total_offers = mysqli_query($conn,"select bid_id from bids_against_offers where offer_id = '".$offerid."' and user_id='".$_SESSION['user_session']."'");
   
         $rowss=mysqli_num_rows($total_offers);

	     if($rowss>0)

	     return ' | you made an offer';
		 
		 else
		 
		 return false;
		   
	   }

	   
	   
	   
	   function makeoffer($offerid,$offerposteduser)

	   {
		   global $conn;
		  
		  // first check offer is closed or open
		  
		  $total = mysqli_num_rows(mysqli_query($conn,"select offer_status from posted_offers where offer_status=1 and offer_id='".$offerid."'"));
		
		   
		   if($total>0)
	 

	 		{

     

    echo '<div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="padding-right: 0px; font-weight: bold; color: red; text-align: right;"><button style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred00"  onclick="location.href=\'make_offers_new.php?p=makeoffer&offer_id='.$offerid.'&offer_posted_user='.$offerposteduser.'\';">make an offer</button></div>';
     

	 		}
	
		   
	  }
	  
	  
	  function buttons($offerid,$offerposteduser)
	  
	  {
		
		  global $conn;
		  
		  $fields = array('bid_id');
		  
		  $countrows = $this->CountAllRows('bids_against_offers',$fields," offer_id='".$offerid."' ",'');
		  
		  // get ids for bids and their replies
		 
		/* $idstore = '';
		  
		 $array = $this->selectAll('bids_against_offers',$fields," offer_id='".$offerid."' ",'');
		 
		 $i=0;
		
		 foreach($array as $arr)
		 
		 {   
		 
		 	 if($i==0)
		     
			 $idstore .= 'bids_'.$arr['bid_id'];
			 
			 else
			 
			 $idstore .= ',bids_'.$arr['bid_id'];
			 
			 $i++;
			 
		 }
		 
		 
		  $i=0;
		  
		   $fields = array('reply_id');
		  
		  $array = $this->selectAll('bid_replies',$fields," offer_id='".$offerid."' and bid_id='".."' ",'');
		
		 foreach($array as $arr)
		 
		 {   
		 
		 	 if($i==0)
		     
			 $idstore .=$arr['bid_id'];
			 
			 else
			 
			 $idstore .= ','.$arr['bid_id'];
			 
			 $i++;
			 
		 }
		 */
		 
		 
		  
		  if($countrows>0)
		  
		  {
			
			  echo '<button id="btn_'.$offerid.'" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred00" onclick="showoffers('.$offerid.',\'btn_'.$offerid.'\')">view offers ('.$countrows.')</button>';
			  
			  
			 
			  
		  }
		  
		   echo '&nbsp;<button onclick="deleteit('.$offerid.')" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary" >delete</button>';  
		  
		    
		  
	  }
	  
	  
	  
	    function buttonstransaction($offerid,$bidid,$offerposteduser)
	  
	  {
		
		  
			
			
			  global $conn;
		  
		  $fields = array('reply_id');
		  
		       $countrows = $this->CountAllRows('bid_replies',$fields," offer_id='".$offerid."'  and bid_id ='".$bidid."' and viewed=0 ",'');
		  
		  if($countrows>0)
		  
		  {
			
			  echo '<button id="bttn_'.$bidid.'" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttongreen" onclick="showbidreplies('.$offerid.','.$offerposteduser.','.$bidid.',\'bttn_'.$bidid.'\')">view comments ('.$countrows.')</button>&nbsp;';  
			  
		  }
		  
		  else
		  
		  echo '
		  
		  
		  <button id="btn_reply_'.$bidid.'" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary" onclick="showform('.$offerid.','.$bidid.','.$offerposteduser.');">contact seller</button>&nbsp;';
		  
		  
		 
			
			
			
			
			
			
			
			
			
			
			
			
			
		  
	  }
	  
	  
	    function buttonstransaction2($offerid,$bidid,$offerposteduser)
	  
	  {
		
		  
			
			
			  global $conn;
		  
		  $fields = array('reply_id');
		  
		       $countrows = $this->CountAllRows('bid_replies',$fields," offer_id='".$offerid."'  and bid_id ='".$bidid."' and viewed=0 ",'');
		  
		  if($countrows>0)
		  
		  {
			
			  echo '<button id="bttn_'.$bidid.'" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttongreen" onclick="showbidreplies('.$offerid.','.$offerposteduser.','.$bidid.',\'bttn_'.$bidid.'\')">view comments ('.$countrows.')</button>&nbsp;';  
			  
		  }
		  
		  else
		  
		  echo '
		  
		  
		  <button id="btn_reply_'.$bidid.'" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary" onclick="showform('.$offerid.','.$bidid.','.$offerposteduser.');">contact buyer</button>&nbsp;';
		  
		  
		 
			
			
			
			
			
			
			
			
			
			
			
			
			
		  
	  }
	



	  function buttons00($offerid,$offerposteduser)
	  
	  {
		
		  global $conn;
		  
		  $fields = array('bid_id');
		  
		  $countrows = $this->CountAllRows('bids_against_offers',$fields," offer_id='".$offerid."' ",'');
		  
		  // get ids for bids and their replies
		 

		 
		 
		  
		  if($countrows>0)
		  
		  {
			
			  $val .=  '<button id="btn_'.$offerid.'" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred00" onclick="showoffers('.$offerid.',\'btn_'.$offerid.'\')">view offers ('.$countrows.')</button>';
			  
			  
			 
			  
		  }
		  
		   $val .= '&nbsp;<button onclick="deleteit('.$offerid.')" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary" >delete</button>';  
		
		
		return $val;  
		    
		  
	  }
	  
	    function buttons00search($offerid,$offerposteduser)
	  
	  {
		
		  global $conn;
		  
		  $fields = array('bid_id');
		  
		  $countrows = $this->CountAllRows('bids_against_offers',$fields," offer_id='".$offerid."' ",'');
		  
		  // get ids for bids and their replies
		 

		 
		 
		  
		  if($countrows>0)
		  
		  {
			
			  $val .=  '<button id="btn_'.$offerid.'" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred00" onclick="showoffers('.$offerid.',\'btn_'.$offerid.'\')">view offers ('.$countrows.')</button>';
			  
			  
			 
			  
		  }
		  
		  if($_SESSION['user_session']==$offerposteduser)
		  
		   $val .= '&nbsp;<button onclick="deleteit('.$offerid.')" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary" >delete</button>';  
		
		
		return $val;  
		    
		  
	  }

	  
	  
	  function buttonsbids($offerid,$offerposteduser,$bidid)
	  
	  {
		
		  global $conn;
		  
		  $fields = array('reply_id');
		  
		       $countrows = $this->CountAllRows('bid_replies',$fields," offer_id='".$offerid."'  and bid_id ='".$bidid."' ",'');
		  
		  if($countrows>0)
		  
		  {
			
			  echo '<button id="bttn_'.$bidid.'" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttongreen" onclick="showbidreplies('.$offerid.','.$offerposteduser.','.$bidid.',\'bttn_'.$bidid.'\')">view comments ('.$countrows.')</button>&nbsp;';  
			  
		  }
		  
		  else
		  
		  echo '
		  
		  
		  <button id="btn_reply_'.$bidid.'" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary" onclick="showform('.$offerid.','.$bidid.','.$offerposteduser.');">reply</button>&nbsp;';
		  
		  
		   $getuid = mysqli_fetch_array(mysqli_query($conn,"select offer_posted_user from posted_offers where offer_id='".$offerid."'"));
   
   
   if($getuid['offer_posted_user']==$_SESSION['user_session'])
   {
		
		
		 $getp = mysqli_fetch_array(mysqli_query($conn,"select bid_price from bids_against_offers where bid_id='".$bidid."'"));  
		  
		  
		  echo '<button style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred00" onclick="paypal('.$offerposteduser.','.$_SESSION['user_session'].','.$offerid.','.$bidid.',\''.$getp['bid_price'].'\')" >i\'ll take it!</button>';
		  
   }
		
		  
	  }
	  
	  
	  
	  
	 	  function buttonsmakeoffers($offerid,$offerposteduser,$bidid)
	  
	  {
		
		  global $conn;
		  
		  $fields = array('reply_id');
		  
		  $countrows = $this->CountAllRows('bid_replies',$fields," offer_id='".$offerid."'  and bid_id ='".$bidid."' ",'');
		  
		  
		  
		  
		  echo '<button id="btn_reply_'.$bidid.'" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary" onclick="deleteit('.$bidid.');">delete</button>&nbsp;';
		  
		  
		  
		  
		  
		  if($countrows>0)
		  
		  {
			
			  echo '<button id="bttn_'.$bidid.'" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttongreen" onclick="showbidreplies('.$offerid.','.$offerposteduser.','.$bidid.',\'bttn_'.$bidid.'\')">view comments ('.$countrows.')</button>&nbsp;';  
			  
		  }
		  
		
		  
		  
		  
		  echo '<button style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred00" onclick="paypal('.$offerposteduser.','.$_SESSION['user_session'].','.$offerid.','.$bidid.')" >edit offer</button>';
		  
		 
		
		  
	  }
	  
	  
	  
  function buttonsmakeoffersedit($offerid,$offerposteduser,$bidid)
	  
	  {
		
		  global $conn;
		  
		  $fields = array('reply_id');
		  
		  $countrows = $this->CountAllRows('bid_replies',$fields," offer_id='".$offerid."'  and bid_id ='".$bidid."' ",'');
		  
		  
		 // echo "select bid_id from bids_against_offers where bid_id ='".$bidid."' and bid_edit='1'";
		  
		  
		  if(mysqli_num_rows(mysqli_query($conn,"select bid_id from bids_against_offers where bid_id ='".$bidid."' and bid_edit='1'"))>0)
		  
		  {
		  
		  echo 'offer updated';
		  
		  }
		  
		  else
		  
		  {
			  
			  echo '<button id="btn_reply_'.$bidid.'" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary" onclick="deleteit('.$bidid.');">delete</button>&nbsp;';
			  
			  
			  
			  
			  
			  if($countrows>0)
			  
			  {
				
				  echo '<button id="bttn_'.$bidid.'" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttongreen" onclick="showbidreplies('.$offerid.','.$offerposteduser.','.$bidid.',\'bttn_'.$bidid.'\')">view comments ('.$countrows.')</button>&nbsp;';  
				  
			  }
			  
			
			  
			  
			  
			  echo '<button style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred00" data-toggle="modal" data-target="#myModal_'.$bidid.'" >edit offer</button>';
		  
		  
		  }
		  
		 
		  
		  
		
		  
	  }
	  
	  
	   function buttonsmakeoffers2edit($offerid)
	  
	  {
		
		  global $conn;
		  
		 
			
			
			  
			  
			  echo '<button style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred00" data-toggle="modal" data-target="#myModal_'.$offerid.'" >edit offer</button>';
		  
		  
		
		  
		 
		  
		  
		
		  
	  }
	  
	  
	  
	  function getprice($desc,$buyer_price,$offerid)
	  
	  {
		  
	global $conn;
		
	$price = explode('$',$desc);

	$price = explode(' ',$price[1]);
	
	//print_r($price);
	
	if(empty($price[0]))
	
	{
		
		
		$exp = explode('.',$desc);
		
		//echo '<br>';
		
		//print_r($price);
		
		//echo '<br>';
		
		//echo 'size:'.sizeof($exp);

		if(sizeof($exp)>1)
		
		$price = filter_var($exp[0], FILTER_SANITIZE_NUMBER_INT);

		if(empty($price))
		
		$price = filter_var($desc, FILTER_SANITIZE_NUMBER_INT);
		
		//echo '<br>';
		
		//echo $price;
		
		//echo '<br>';
		
		
	}
	
	else
	
	$price  = '$'.$price[0];
	
	
	
	if($_POST['buyer_price']!='' and $price=='')
	
	$price  = $_POST['buyer_price'];

	
	if(is_array($price))
	
	$price = $price[0];
	
	
	//echo $price;
	
	if(empty($price))
	
	{
	
	$res = mysqli_fetch_array(mysqli_query($conn,"select offer_price from posted_offers where offer_id='".$offerid."'"));
	
	$price = $res['offer_price'];
		
	} 
	
	
	
	
	return $price;
	
	
	 
		  
		  
	  }
	  
	  
	  
	function buttonsmakeoffersedit2($offerid,$offerposteduser,$bidid)
	  
	  {
		
		  global $conn;
		  
		  $fields = array('reply_id');
		  
		  $countrows = $this->CountAllRows('bid_replies',$fields," offer_id='".$offerid."'  and bid_id ='".$bidid."' ",'');
		  
		  
		  
		   if(mysqli_num_rows(mysqli_query($conn,"select bid_id from bids_against_offers where bid_id ='".$bidid."' and bid_edit='1'"))>0)
		  
		  {
		  
		  echo 'offer updated';
		  
		  }
		  
		  else
		  
		  {
		  
		  
		  echo '<button id="btn_reply_'.$bidid.'" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary" onclick="deleteit2('.$bidid.');">delete</button>&nbsp;';
		  
		  
		  
		  
		  
		  if($countrows>0)
		  
		  {
			
			  echo '<button id="bttn_'.$bidid.'" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttongreen" onclick="showbidreplies('.$offerid.','.$offerposteduser.','.$bidid.',\'bttn_'.$bidid.'\')">view comments ('.$countrows.')</button>&nbsp;';  
			  
		  }
		  
		
		  
		  
		  
		  echo '<button style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred00" data-toggle="modal" data-target="#myModal_'.$bidid.'" >edit offer</button>';
		  
		  }
		
		  
	  }  
	  
	  
	  
	  function buttonsmakeoffersedit2happen($offerid,$offerposteduser,$bidid)
	  
	  {
		
		  global $conn;
		  
		  $fields = array('reply_id');
		  
		  $countrows = $this->CountAllRows('bid_replies',$fields," offer_id='".$offerid."'  and bid_id ='".$bidid."' ",'');
		  
		  
		  
		  
		  echo '<button id="btn_reply_'.$bidid.'" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary" onclick="deleteit2('.$bidid.');">delete</button>&nbsp;';
		  
		  
		  
		  
		 /* 
		  if($countrows>0)
		  
		  {
			
			  echo '<button id="bttn_'.$bidid.'" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttongreen" onclick="showbidreplies('.$offerid.','.$offerposteduser.','.$bidid.',\'bttn_'.$bidid.'\')">view comments ('.$countrows.')</button>&nbsp;';  
			  
		  }*/
		  
		
		  
		  
		  
		 // echo '<button style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred00" data-toggle="modal" data-target="#myModal_'.$bidid.'" >edit offer</button>';
		  
		 
		
		  
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
		  
		 // echo "select image_name from bids_against_offers_images where user_id = '".$userid."' and bid_id='".$bidid."'";
		
$userimg = mysqli_query($conn,"select image_name from bids_against_offers_images where bid_id='".$bidid."'");
           

           while($rowimg=mysqli_fetch_array($userimg))

           {

          // if(file_exists($rowimg['image_name']))
		   
		    if((is_file($rowimg['image_name']))&&(file_exists($rowimg['image_name'])))

           

           echo '<div style="float:left;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  /></div>';  
		  
		   }
	  }
	  */
	  
	  
	  
	  
	     function getvideoimages($bidid,$userid)
	   
	   {
		  global $conn;
		  		  
		 $userimg = mysqli_query($conn,"select image_name from bids_against_offers_images where bid_id='".$bidid."' and edited=0 and file_type='video'");
           
		   
		   $sizeget = mysqli_num_rows($userimg);
		   
		   $strng2 = '';
		   
		   $strng = '';

           while($rowimg=mysqli_fetch_array($userimg))
           {

         
		   
		    if((is_file($rowimg['image_name']))&&(file_exists($rowimg['image_name'])))
			{
           		
				if($sizeget>1)
				{
				
				
				if(mime_content_type($rowimg['image_name'])=='video/3gpp' or mime_content_type($rowimg['image_name'])=='video/mp3' or mime_content_type($rowimg['image_name'])=='video/mp4' or mime_content_type($rowimg['image_name'])=='video/3gpp' or mime_content_type($rowimg['image_name'])=='audio/mpeg' or mime_content_type($rowimg['image_name'])=='audio/x-flv' or mime_content_type($rowimg['image_name'])=='video/mov' or mime_content_type($rowimg['image_name'])=='video/Mp4' or mime_content_type($rowimg['image_name'])=='video/mp4' or mime_content_type($rowimg['image_name'])=='video/quicktime' or $rowimg['file_type']=='video' ){
					
					$strng2 .= '<div style="float:left;padding:2px;"><video class="img-responsive"  controls="controls" preload="metadata" >
  <source src="'.$rowimg['image_name'].'#t=0.8" type="'.mime_content_type($rowimg['image_name']).'">

</video> ';
					
				   
				} 
				
				/*else {
					$strng .= '<div style="float:left;width:50%;padding:2px;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  />';
				}*/
				
				
				
				$strng2 .= '</div>';
				}
				else
				{
					
					$strng .= '<div style="float:left;">';
					
					
				
				if(mime_content_type($rowimg['image_name'])=='video/3gpp' or mime_content_type($rowimg['image_name'])=='video/mp3' or mime_content_type($rowimg['image_name'])=='video/mp4' or mime_content_type($rowimg['image_name'])=='video/3gp' or mime_content_type($rowimg['image_name'])=='audio/mpeg' or mime_content_type($rowimg['image_name'])=='audio/x-flv' or mime_content_type($rowimg['image_name'])=='video/mov' or mime_content_type($rowimg['image_name'])=='video/Mp4' or mime_content_type($rowimg['image_name'])=='video/quicktime' or $rowimg['file_type']=='video'){
					
					$strng .= '<video class="img-responsive"  controls="controls" preload="metadata">
  <source src="'.$rowimg['image_name'].'#t=0.8" type="'.mime_content_type($rowimg['image_name']).'"></video> ';
					
				   
				} 
				
				/*else {
					$strng .= '<img src="'.$rowimg['image_name'].'" class="img-responsive"  />';
				}*/
				
				
				
				$strng .= '</div>';
				}
				
				
				
				
				
			}
           
		   
		  
		   

		   }
		   
		   echo '<div style="float:left;">'.$strng2.'</div>'.$strng;
		   
  
		   
	   }
	  
	  
	  
	  
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
	  
	  
	  
	  
	  
	  
	   function getofferimagespopup($offerid)
	  {
		  global $conn;
		  
		 // echo "select image_name from bids_against_offers_images where user_id = '".$userid."' and bid_id='".$bidid."'";
		
$userimg = mysqli_query($conn,"select  image_name  from posted_offers_images where user_id = '".$_SESSION['user_session']."' and     offer_id='".$offerid."'");
           
		   echo '<div class="col-lg-12" id="image-holder__'.$offerid.'" style="margin-bottom: 10px;">';
		   

           while($rowimg=mysqli_fetch_array($userimg))

           {

           if(file_exists($rowimg['image_name']))

           {

          	 
			 $expl = explode('/',$rowimg['image_name']);
			 
			 $rand = mt_rand(1456,548923);
			
			
			if(mime_content_type($rowimg['image_name'])=='video/3gpp' or mime_content_type($rowimg['image_name'])=='video/mp3' or mime_content_type($rowimg['image_name'])=='video/mp4' or mime_content_type($rowimg['image_name'])=='video/3gpp' or mime_content_type($rowimg['image_name'])=='audio/mpeg')
					
					echo  '<video class="thumb-image"  id="iii'.$rand.'"  style="width"100px;height:100px;" controls >
  <source src="'.$rowimg['image_name'].'" type="'.mime_content_type($rowimg['image_name']).'">

</video> ';
			
			 else 
			 
			 echo '<img id="iii'.$rand.'"  style="width"100px;height:100px;" src="'.$rowimg['image_name'].'" class="thumb-image"  />';
		   
		   	 echo "<div id=\"iii_".$rand."\" onclick=\"removeimg('iii".$rand."','iii_".$rand."','".$expl[3]."',".$bidid.")\" class=\"crossbutton\">X</div>";  
		  
		   }
		  
		  
		   }
		   
		   echo '</div>';
	  }
	 
	  
	  
	  
	  
	  
	  
	  function imagenames($bidid,$userid)
	  {
		  global $conn;
		  
		
$userimg = mysqli_query($conn,"select image_name from bids_against_offers_images where user_id = '".$userid."' and bid_id='".$bidid."'");
           
		   $name = array();
		   
		  

           while($rowimg=mysqli_fetch_array($userimg))

           {

           if(file_exists($rowimg['image_name']))

           {

          	 
			 $expl = explode('/',$rowimg['image_name']);
			 
			 $name[] = $expl[3];
			 
			 
			
		  
		   }
		  
		  
		   }
		   
		   return implode(',',$name);
		   
		  
	  }
	  
	  function videonames($bidid,$userid)
	  {
		  global $conn;
		  
		
$userimg = mysqli_query($conn,"select image_name from bids_against_offers_images where user_id = '".$userid."' and bid_id='".$bidid."' and file_type='video'");
           
		 
		   
		  

           $rowimg=mysqli_fetch_array($userimg);

          
		   
		   return $rowimg['image_name'];
		   
		  
	  }
	  
	    function offerimagenames($offerid)
	  {
		  global $conn;
		  
		
$userimg = mysqli_query($conn,"select image_name from posted_offers_images where user_id = '".$_SESSION['user_session']."' and offer_id='".$offerid."'");
           
		   $name = array();
		   
		  

           while($rowimg=mysqli_fetch_array($userimg))

           {

           if(file_exists($rowimg['image_name']))

           {

          	 
			 $expl = explode('/',$rowimg['image_name']);
			 
			 $name[] = $expl[3];
			 
			 
			
		  
		   }
		  
		  
		   }
		   
		   return implode(',',$name);
		   
		  
	  }
	  
	  
	  
	  function GetUserName($userid)
	  {
		  global $conn;
		
		$name = mysqli_fetch_array(mysqli_query($conn,"select username from users where user_id='".$userid."'"))  ;
		
		return $name['username'];
		  
	  }
	  

	  
	  function GetBuyerName($offerid)
	  {
		  global $conn;
		
		$name = mysqli_fetch_array(mysqli_query($conn,"select offer_posted_user from posted_offers where offer_id='".$offerid."'"))  ;
		
		$name = mysqli_fetch_array(mysqli_query($conn,"select username from users where user_id='".$name['offer_posted_user']."'"))  ;
		
		return $name['username'];
		  
	  }
	  
	



function deleterecords($tablename,$where_clause)

{

	        global $conn;
		  			
			echo $query = "delete from ".$tablename." where ".$where_clause."  ";
			
			mysqli_query($conn,$query);	
	
}


/*function isparent()

{

	
	
	
}



function BuiltMenu($id,$str)
{
	
	
	if($id)
	
	$array = $this->selectAll('categories',$fields," cat_parent='".$id."' ",' order by cat_id ASC ');
	  

	
	else
	
	{
	  
	  
	  
	  $array = $this->selectAll('categories',$fields,"  ",' order by cat_id ASC ');
	  
	
	  
	}
	
	foreach($array as $arr)
	
	{
		
		$str .='<li><a href="#">'.$arr['cat_title'].'</a>';
		
		if($this->CountAllRows('categories',''," cat_parent='".$arr['cat_parent']."' ",'')>0)
		
		{
		
		$str .='<ul>';
		
		$this->BuiltMenu($arr['cat_parent'],$str);
		
		}
		
		else
		
		{
			
			$str .='</li></ul>';
				
			
	    }
		
		
	}
		
	
}*/



function showjqueryfunctions($offerid)
{

	global $conn;
	
	$q = mysqli_query($conn,"select bid_id,user_id from bids_against_offers where offer_id='".$offerid."'");
	
	if(mysqli_num_rows($q)) 	
	
	{
		
	
	while($array = mysqli_fetch_array($q))
	{
	   
	   
	   $fields = array('reply_id');
		  
		       $countrows = $this->CountAllRows('bid_replies',$fields," offer_id='".$offerid."' and user_id='".$array['user_id']."' and bid_id ='".$array['bid_id']."' ",'');
		  
		  if($countrows==0)
		  
		  {
	   
	   
		echo "
		
		<script>
		
		$(document).ready(function() {	
		
		
		$(document).on(\"submit\", \"#register-form".$array['bid_id']."\", function (e) {
		
		
		
		
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
					
					$(\"#register-form".$array['bid_id']."\")[0].reset();	
					
					
					
					
				
					
					if(data=='error')
					alert('please enter description first!')
					
					else
					
					loadlastreply(data,".$array['bid_id'].")
					
					$(\"#register-form".$array['bid_id']."\").resetForm();
					
				
					
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
	
	}
		
		
  }
	
}

function showjqueryfunctions00($offerid)
{

	global $conn;
	
	$q = mysqli_query($conn,"select bid_id,user_id from bids_against_offers where offer_id='".$offerid."'");
	
	if(mysqli_num_rows($q)) 	
	
	{
		
	
	while($array = mysqli_fetch_array($q))
	{
	   
	   
	   $fields = array('reply_id');
		  
		       $countrows = $this->CountAllRows('bid_replies',$fields," offer_id='".$offerid."' and user_id='".$array['user_id']."' and bid_id ='".$array['bid_id']."' ",'');
		  
		  if($countrows==0)
		  
		  {
	   
	   
		$val .= "
		
		<script>
		
		$(document).ready(function() {	
		
		
		$(document).on(\"submit\", \"#register-form".$array['bid_id']."\", function (e) {
		
		
		
		
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
					
					$(\"#register-form".$array['bid_id']."\")[0].reset();	
					
					
					
					
				
					
					if(data=='error')
					alert('please enter description first!')
					
					else
					
					loadlastreply(data,".$array['bid_id'].")
					
					$(\"#register-form".$array['bid_id']."\").resetForm();
					
				
					
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
	
	}
		
		
  }
  
  return $val;
	
}







}

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
elseif($date_diff<60 )
{
 
 $final = 'new';
 
}

return $final;
	
	
	
	}




?>