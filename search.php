<?php



include('header.php');



if( $_POST ){
	
	$fname = $_POST['txt_fname'];
	




	?>
    
    
  
      
  <?php
  
  
  //$query = "select * from posted_offers where offer_title like '%".$_POST['txt_fname']."%'";
  
  $query = $db_con->prepare("select * from posted_offers where offer_title like '%".$_POST['txt_fname']."%'");
  
  $query->execute();
  
 // $result = mysqli_query($query);
 
 foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $array)
  
 
  {
	  
	  
	  
	  
  ?>    
      
      
      
      
       <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px; padding-left:0px; padding-right:0px;">
               
               
               <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">
   
    <?php
   
    $user = $db_con->prepare("select username,user_avatar from users where user_id = '".$array['offer_posted_user']."'");
  
  $user->execute();
   
   $row=$user->fetch(PDO::FETCH_ASSOC);
   
  if((is_file($row['user_avatar']))&&(file_exists($row['user_avatar'])))
			
		echo '<img class="bordrshadow" src="image.php?img='.$row['user_avatar'].'&amp;w=56&amp;h=54"  />';
					
		else
			echo '<img src="images/desktop-makeoffers2_06.png" width="56" height="54"  />';
     
   
   ?>
   
   </div>
   
   
 <div class="col-lg-7 col-xs-8 col-sm-9 col-md-8 ">
               
               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">
               
               <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;">
                  
   <?php echo $row['username']; ?>
  
   
   
   </div>
   
   <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 " style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%; padding-left:0px;">        <?php echo str_replace($_POST['txt_fname'],'<span style="color:red;">'.$_POST['txt_fname'].'</span>',$array['offer_title']); ?>     </div>
   
   
   
   
   
   
   
   </div> </div>
   
   <div class="col-lg-3 col-xs-3 col-sm-2 col-md-3" style=" text-align:right;">
   
    <div style="float:right;font-family:Arial, Helvetica, sans-serif; font-size:16px;"><span style="color:#0e1131;font-weight:bold;"><?php echo $array['offer_price']; ?></span> <span style="color:#7e7e7e;">| 
    
    
    
    <?php
   echo datediff($array['offer_posted_date']);
	
	?>
    
    
    
    </span></div>
   
   </div>
   
   
  
   
   <!--body navigation ends-->
   
   
      </div>


<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" id="<?php  echo $array['offer_id']; ?>">
   
    <div style="font-family: Arial,Helvetica,sans-serif; font-size: 16px; color: rgb(255, 0, 0); font-weight: bold; padding-left: 0px;" class="col-lg-6 col-xs-6 col-sm-6 col-md-6"><?php
    
	
	
	 $total_offers = $db_con->prepare("select bid_id from bids_against_offers where offer_id = '".$array['offer_id']."'");
  
  $total_offers->execute();
   
   $rowss=$total_offers->rowCount();
	
	
	if($rowss>0)
	
	echo $rowss.' offers';
	
	
	
	?></div>
     
     
     
     <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="padding-right: 0px; font-weight: bold; color: red; text-align: right;"><button style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred"  onclick="makeoffer(<?php echo $array['offer_posted_user']; ?>,<?php echo $array['offer_id']; ?>,<?php echo $_SESSION['user_session']; ?>);">make an offer</button></div>
     
     
      </div>
      
      <div class="bordersep"></div>  

    <?php
	
	
  }
	
	
}