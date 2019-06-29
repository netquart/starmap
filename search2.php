<?php



include('header.php');

global $conn;


if( $_POST['offers_type']=='offerimade' ){
	
	
	

  
/*  $query = $db_con->prepare("select * from posted_offers where offer_posted_user = '".$_SESSION['user_session']."'");
  
  $query->execute();
  

 
 $totalget = $query->rowCount();
 
*/ 
 
 $query = mysqli_query($conn,"select * from posted_offers where offer_posted_user = '".$_SESSION['user_session']."'");
			
 $totalget = mysqli_num_rows($q);

 
 
 
 
 
 
 
 
 
 
 
 
 if($totalget==0)
 
 echo '<div id="nothing" style="float:left;"><span style="color:red">&nbsp;nothing found!</span></div>';

 
// foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $array)
  
  while($array = mysqli_fetch_array($query))
 
  {
	  
	  
	  
	  
  ?>    
      
      
      
      
       <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">
               
               
               <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">
   
    <?php
   
   /* $user = $db_con->prepare("select username,user_avatar from users where user_id = '".$array['offer_posted_user']."'");
  
  $user->execute();
   
   $row=$user->fetch(PDO::FETCH_ASSOC);*/
   
   
   
   $row = singleexecute("select username,user_avatar from users where user_id = '".$array['offer_posted_user']."'");
   
   
   
   
   
   
   
   
  if((is_file($row['user_avatar']))&&(file_exists($row['user_avatar'])))
			
		echo '<img class="bordrshadow" src="image.php?img='.$row['user_avatar'].'&amp;w=56&amp;h=54"  />';
				
		else
			echo '<img src="images/desktop-makeoffers2_06.png" width="56" height="54"  />';
   
   
   ?>
   
   </div>
   
   
               
               <div class="col-lg-7 col-xs-9 col-sm-9 col-md-8 ">
               
               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">
               
               <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;">
   
   <?php echo $row['username']; ?>
  
   
   
   </div>
   
   <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="float: left;padding-left:0px; padding-right:0px; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%; margin-bottom:10px;">        <?php echo convert_links($array['offer_title']); ?>     </div>
   
   
   
   
           
          <?php
           
           
          /*  $userimg = $db_con->prepare("select image_name from posted_offers_images where user_id = '".$_SESSION['user_session']."' and offer_id='".$array['offer_id']."'");
          
          $userimg->execute();*/
		  
		  
		  
		  $ret = executearray("select image_name from posted_offers_images where user_id = '".$_SESSION['user_session']."' and offer_id='".$array['offer_id']."'");
		  
		  
		  
		  
           
           //foreach($userimg->fetchAll(PDO::FETCH_ASSOC) as $rowimg)
		   
		   foreach($ret as $rowimg)
           
		   {
		   
           if(file_exists($rowimg['image_name']))
           
           echo '<div style="float:left;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  /></div>';
           
		   }
           
           ?>

   
   
   </div> </div>
   
    <div class="col-lg-3 col-xs-2 col-sm-2 col-md-3" style=" text-align:right;">
   
    <div style="float:right;font-family:Arial, Helvetica, sans-serif; font-size:16px;"><span style="color:#0e1131;font-weight:bold;"><?php echo $array['offer_price']; ?></span> <span style="color:#7e7e7e;">|  <?php
    
echo datediff($array['offer_posted_date']);
	
	
	?></span></div>
   
   </div>
   
   
  
   
   <!--body navigation ends-->
   
   
      </div>


<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" id="<?php  echo $array['offer_id']; ?>">
   
    <div style="font-family: Arial,Helvetica,sans-serif; font-size: 16px; color: rgb(255, 0, 0); font-weight: bold; padding-left: 15px;" class="col-lg-6 col-xs-6 col-sm-6 col-md-6"><?php
    
	
	
	 /*$total_offers = $db_con->prepare("select bid_id from bids_against_offers where offer_id = '".$array['offer_id']."'");
  
  $total_offers->execute();
   
   $rowss=$total_offers->rowCount();*/
   
   
   $rowss = rowsreturn("select bid_id from bids_against_offers where offer_id = '".$array['offer_id']."'");
   
	
	
	if($rowss>0)
	
	echo $rowss.' offers';
	
	
	
	?></div>
     
     <?php
     
	 if($rowss>0)
	 
	 {
	 
	 ?>
     
     <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="padding-right: 0px; font-weight: bold; color: red; text-align: right;"><button style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred"  onclick="getoffers(<?php echo $array['offer_posted_user']; ?>,<?php echo $array['offer_id']; ?>,<?php echo $_SESSION['user_session']; ?>);">view offers</button></div>
     <?php
     
	 }
	 
	 ?>
     
      </div>

    <?php
	
	
  }
	
	
}



if( $_POST['offers_type']=='stuffmade' ){
	
	
	




	?>
    
    
  
      
  <?php
  
  
  
/*  $query = $db_con->prepare("select * from bids_against_offers where user_id = '".$_SESSION['user_session']."'");
  
  $query->execute();
 
  $totalget = $query->rowCount();
*/  
  
  
  
  $totalget = rowsreturn("select * from bids_against_offers where user_id = '".$_SESSION['user_session']."'");
  
  
  $totalgetret = executearray("select * from bids_against_offers where user_id = '".$_SESSION['user_session']."'");
  
  
 
 if($totalget==0)
 
 echo '<div id="nothing" style="float:left;"><span style="color:red">&nbsp;nothing found!</span></div>';
 
// foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $array)
  foreach ($totalgetret as $array)
 
  {
	  
	  
	  
	  
  ?>    
      
      
      
      
       <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">
               
               
               <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">
   
    <?php
   
   /* $user = $db_con->prepare("select username,user_avatar from users where user_id = '".$array['user_id']."'");
  
  $user->execute();
   
   $row=$user->fetch(PDO::FETCH_ASSOC);*/
   
   
   
   
      $row = singleexecute("select username,user_avatar from users where user_id = '".$array['user_id']."'");

   
   
   
   
   
   
   
  if((is_file($row['user_avatar']))&&(file_exists($row['user_avatar'])))
			
		echo '<img class="bordrshadow" src="image.php?img='.$row['user_avatar'].'&amp;w=56&amp;h=54"  />';
					
		else
			echo '<img src="images/desktop-makeoffers2_06.png" width="56" height="54"  />';
   
   
   ?>
   
   </div>
   
   
                
               <div class="col-lg-7 col-xs-9 col-sm-9 col-md-8 ">
               
               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">
               
               <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;">
   
   <?php echo $row['username']; ?>
  
   
   
   </div>
   
   <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;padding-left:0px; padding-right:0px;">         <?php
   
   /* $offer = $db_con->prepare("select offer_title from posted_offers where offer_id = '".$array['offer_id']."'");
  
  $offer->execute();
   
   $row2=$offer->fetch(PDO::FETCH_ASSOC);*/
   
   
   
    $row2 = singleexecute("select offer_title from posted_offers where offer_id = '".$array['offer_id']."'");
   
   
   
   
   
   echo $row2['offer_title'];
   
  // echo convert_links($row2['offer_title']);
   
   
   
   ?>     </div>
   
   
   </div>
   
   
   
    <div style="float:left; ">
   
   <?php
   
  // echo "select image_name from bids_against_offers_images where user_id = '".$array['user_id']."'and bid_id='".$array['user_id']."'";
   
   /* $userimg = $db_con->prepare("select image_name from bids_against_offers_images where user_id = '".$array['user_id']."'and bid_id='".$array['bid_id']."'");
  
  $userimg->execute();
   
   $rowimg=$userimg->fetch(PDO::FETCH_ASSOC);*/
   
   
   
   
   $rowimg = singleexecute("select image_name from bids_against_offers_images where user_id = '".$array['user_id']."'and bid_id='".$array['bid_id']."'");
   
   
   
   
   
   
   if(file_exists($rowimg['image_name']))
   
   echo '<div style="float:left;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  /></div>';
   
  
   
   ?>
   
   </div>
   
   
   
   
   
   
    </div>
   
   <div class="col-lg-3 col-xs-2 col-sm-2 col-md-3" style=" text-align:right;">
   
    <div style="float:right;font-family:Arial, Helvetica, sans-serif; font-size:16px;"><span style="color:#0e1131;font-weight:bold;color:#d32028;"><?php echo $array['bid_price']; ?></span> <span style="color:#7e7e7e;">|  <?php
   echo datediff($array['posted_date']);
	
	
	?></span></div>
   
   </div>
   
   
  
   
   <!--body navigation ends-->
   
   
      </div>



    <?php
	
	
  }
	
	
}