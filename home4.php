<?php

include('top_header.php');

?> 
    
    
<div class="body-container">






<div class="container custombg">
        
        
        <div class="col-lg-12 col-md-12 custom_padding">
        
        <?php include("left_nav.php"); ?>
        
        
        <!--main content starts-->
        
        
        <div class="col-lg-8 col-sm-12 col-xs-12 paddingset">
        
        <!--border div starts here -->
        
         <div class="borderouter">
        
        
        
					 <?php
                    
                    if( $_GET['offers_type']=='offerimade' ){
                
                
              
              $query = $db_con->prepare("select * from posted_offers where offer_posted_user = '".$_SESSION['user_session']."'");
              
              $query->execute();
              
             // $result = mysqli_query($query);
             
             $totalget = $query->rowCount();
             
             if($totalget==0)
             
             echo '<div id="nothing" style="float:left;"><span style="color:red">&nbsp;nothing found!</span></div>';
            
             
             foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $array)
              
             
              {
                  
                  
                  
                  
              ?>    
                  
                  
                  
                  
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">
               
               
               <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">
               
                <?php
               
                $user = $db_con->prepare("select username,user_avatar from users where user_id = '".$array['offer_posted_user']."'");
              
              $user->execute();
               
               $row=$user->fetch(PDO::FETCH_ASSOC);
               
               if(file_exists($row['user_avatar']))
               
               echo '<img src="'.$row['user_avatar'].'" width="56" height="54" />';
               
               else
               
               echo '<img src="images/desktop-makeoffers2_06.png" width="56" height="54" />';
               
               
               ?>
               
               </div>
               
               
               <div class="col-lg-7 col-xs-8 col-sm-9 col-md-8 ">
               
               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">
               
               <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;">
               
               <?php echo $row['username']; ?>
              
               
               
               </div>
               
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="float: left;padding-left:0px; padding-right:0px; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;margin-bottom:10px;">        <?php echo $array['offer_title']; ?>     
               
               
               </div>
               
               
               
               <?php
                       
                       
                        $userimg = $db_con->prepare("select image_name from posted_offers_images where user_id = '".$_SESSION['user_session']."' and offer_id='".$array['offer_id']."'");
                      
                      $userimg->execute();
                       
                       foreach($userimg->fetchAll(PDO::FETCH_ASSOC) as $rowimg)
                       
                       {
                       
                       if(file_exists($rowimg['image_name']))
                       
                       echo '<div style="float:left;"><img src="'.$rowimg['image_name'].'"  class="img-responsive"  /></div>';
                       
                       }
                       
                       ?>
               
               </div> </div>
               
               <div class="col-lg-3 col-xs-3 col-sm-2 col-md-3" style=" text-align:right;">
               
                <div style="float:right;font-family:Arial, Helvetica, sans-serif; font-size:16px;"><span style="color:#0e1131;font-weight:bold;"><?php echo $array['offer_price']; ?></span> <span style="color:#7e7e7e;">|  <?php
                
           
          echo datediff($array['offer_posted_date']);
                
                ?></span></div>
               
               </div>
               
               
              
               
               <!--body navigation ends-->
               
               
                  </div>
            
            
            <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" id="<?php  echo $array['offer_id']; ?>" style="margin-bottom:20px;">
               
                <div style="font-family: Arial,Helvetica,sans-serif; font-size: 16px; color: rgb(255, 0, 0); font-weight: bold; padding-left: 15px;" class="col-lg-6 col-xs-6 col-sm-6 col-md-6"><?php
                
                
                
                 $total_offers = $db_con->prepare("select bid_id from bids_against_offers where offer_id = '".$array['offer_id']."'");
              
              $total_offers->execute();
               
               $rowss=$total_offers->rowCount();
                
                
                if($rowss>0)
                
                echo $rowss.' offers';
                
                
                
                ?></div>
                 
                 <?php
                 
                 if($rowss>0)
                 
                 {
                 
                 ?>
                 
                 <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="padding-right: 0px; font-weight: bold; color: red; text-align: right;"><button style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred"  onclick="getoffers(<?php echo $array['offer_posted_user']; ?>,<?php echo $array['offer_id']; ?>,<?php echo $_SESSION['user_session']; ?>);">view offers</button>
                 </div>
                 <?php
                 
                 }
                 
                 ?>
                 
                  </div>
                  
                 <div class="bordersep"></div>   
            
                <?php
                
                
              }
                
                
            }
            
            
            
            if( $_GET['offers_type']=='stuffmade' ){
                
                
                
            
            
          
  
  
	  $query = $db_con->prepare("select * from bids_against_offers where user_id = '".$_SESSION['user_session']."'");
	 
	  $query->execute();
	 
	  $totalrows = $query->rowCount();
	 
	 
	 
	 if($totalrows==0)
	 
	 echo '<div id="nothing" style="float:left; padding-top:20px; padding-left:20px;color:red;"><span style="color:red">&nbsp;nothing found!</span></div>';
	 
	 
	 
	  
	  
	 
	 
	 foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $array)
	  
	 
	  {
	  
	  
	  $posted_offer_id[] = $array['offer_id'];
	  
	  $counter=0;
	  
	 
	  
	  $counter = count(array_keys($posted_offer_id, $array['offer_id']));
	  
	 
	  
	 // echo $array['offer_id'].',<br />';
	  
	 // echo $counter.'::';
	  
	 // print_r($posted_offer_id);
	  
	 // echo '<br />';
	  
	 if($counter==1)
	 
	 {
	
	
	       $query_offr = $db_con->prepare("select * from posted_offers where offer_id = '".$array['offer_id']."' ");
  
          $query_offr->execute();
 
          $arrayoffr = $query_offr->fetch(PDO::FETCH_ASSOC);
          
		  
		  ?>
          
          
          <div class="col-lg-12" style="padding-bottom: 15px; padding-top: 15px;">
   
   
  <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">
   
    <?php
   
    $user = $db_con->prepare("select username,user_avatar from users where user_id = '".$arrayoffr['offer_posted_user']."'");
  
    $user->execute();
   
   $row=$user->fetch(PDO::FETCH_ASSOC);
   
   if(file_exists($row['user_avatar']))
   
   echo '<img src="'.$row['user_avatar'].'" width="56" height="54" />';
   
   else
   
   echo '<img src="images/desktop-makeoffers2_06.png" width="56" height="54" />';
   
   
   ?>
   
   </div>
   
   
    <div class="col-lg-7 col-xs-8 col-sm-9 col-md-8 ">
               
               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">
                
     
     
      <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;"><?php echo $row['username']; ?>
       </div>
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 paddingzero" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;"><?php echo $arrayoffr['offer_title']; ?>
        </div>
     </div>
   </div>
    <div class="col-lg-3 col-xs-3 col-sm-2 col-md-3" style=" text-align:right;">
    <div style="float:right;font-family:Arial, Helvetica, sans-serif; font-size:16px;"><span style="color:#0e1131;font-weight:bold;"><?php echo $arrayoffr['offer_price']; ?></span> <span style="color:#7e7e7e;">| 
    <?php
  
		echo datediff($arrayoffr['offer_posted_date']);
	
	
	?>
    
    
    
    </span></div>
   
   </div>
   
   
  
   
   <!--body navigation ends-->
   
   
      </div>


<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" id="<?php  echo $arrayoffr['offer_id']; ?>">
   
    <div style="font-family: Arial,Helvetica,sans-serif; font-size: 16px; color: rgb(255, 0, 0); font-weight: bold; padding-left: 15px;" class="col-lg-6  col-md-6 col-xs-6 col-sm-6"><?php
    
	
	
	 $total_offers = $db_con->prepare("select bid_id from bids_against_offers where offer_id = '".$arrayoffr['offer_id']."'");
  
    $total_offers->execute();
   
   $rowss=$total_offers->rowCount();
	
	
	if($rowss>0)
	
	echo $rowss.' offers';
	
	
	
	?></div>
     
     
     
  
     
     
      </div>
      
      <div class="bordersep"></div>  

          
          
          <?php
		  
		 
		 
	 }
	  
  ?>    
      
      
      
      
     <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">
               
               
               <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">
   
			<?php
           
            $user = $db_con->prepare("select username,user_avatar from users where user_id = '".$array['user_id']."'");
          
          $user->execute();
           
           $row=$user->fetch(PDO::FETCH_ASSOC);
           
           if(file_exists($row['user_avatar']))
           
           echo '<img src="'.$row['user_avatar'].'" width="56" height="54" />';
           
           else
           
           echo '<img src="images/desktop-makeoffers2_06.png" width="56" height="54" />';
           
           
           ?>
   
        </div>
   
   
      <div class="col-lg-7 col-xs-8 col-sm-9 col-md-8 ">
       <div style="float:left;">
        <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;padding-left:0px; padding-right:0px;" class="col-lg-12 col-xs-12 col-sm-12 col-md-12"><?php echo $row['username']; ?>
        </div>
   
        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-left:0px; padding-right:0px;float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;margin-bottom:10px;"><?php echo $array['offer_title']; ?></div>
        </div>
        <div style="float:left; "><?php $userimg = $db_con->prepare("select image_name from bids_against_offers_images where user_id = '".$array['user_id']."'and bid_id='".$array['bid_id']."'");$userimg->execute();
						   foreach($userimg->fetchAll(PDO::FETCH_ASSOC) as $rowimg)
						   {
						   if(file_exists($rowimg['image_name']))
						   
						   echo '<div style="float:left;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  /></div>';
						   
						   }
						   
						   ?>
        </div>
       </div>
      <div class="col-lg-3 col-xs-3 col-sm-2 col-md-3" style=" text-align:right;">
      <div style="float:right;font-family:Arial, Helvetica, sans-serif; font-size:16px;"><span style="color:#0e1131;font-weight:bold;"><?php echo $array['bid_price']; ?></span> <span style="color:#7e7e7e;">|  <?php
    
			
			
			echo datediff($array['posted_date']);
				
				
				?></span>
                
         </div>
	    </div>
			   
			   
				<?php
              
			
			   
			    $total_replies = $db_con->prepare("select reply_id from bid_replies where offer_id = '".$array['offer_id']."' and bid_id='".$array['bid_id']."' and user_id!='".$_SESSION['user_session']."'");
		  
			 $total_replies->execute();
		   
			 $ros=$total_replies->rowCount();
			
			
			if($ros>1)
			 $rep = $ros.' replies';  
			elseif($ros>0)   
			 $rep = $ros.' reply';
			 else
			 $rep = 'no reply';      
			   ?>
               
               
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="float:left; font-family:Tahoma, Geneva, sans-serif; font-size:15px; color:#878686;width:100%; font-weight:bold;  margin-left: 13px;margin-top: 10px;">
        <div style="float:left"><?php echo $rep; ?>.  
        </div>
   
   </div>
  </div>
      
     
    
     <div class="bordersep"></div>   
     
    
     
     
      
<?php
   
		  $query_replies = $db_con->prepare("select * from bid_replies where bid_id = '".$array['bid_id']."' and offer_id= '".$array['offer_id']."'");
		  
		  $query_replies->execute();
		  
		  
		  $countrows = $query_replies->rowCount();
		 
		 $countrows0=$countrows;
		  
		if( $countrows>0)
		
		{
	
		
		
				 
		 foreach ($query_replies->fetchAll(PDO::FETCH_ASSOC) as $arrayreplies)
		  
		 
		  {
			  
			  $countrows0--;
			  
			?>
            
            
			<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">
               
               
               <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">
                   
                    <?php
                   
                    $user = $db_con->prepare("select username,user_avatar from users where user_id = '".$arrayreplies['user_id']."' ");
                  
                  $user->execute();
                   
                   $row = $user->fetch(PDO::FETCH_ASSOC);
                  
                   
                   if(file_exists($row['user_avatar']))
                   
                   echo '<img src="'.$row['user_avatar'].'" width="56" height="54" />';
                   
                   else
                   
                   echo '<img src="images/desktop-makeoffers2_06.png" width="56" height="54" />';
                  
                  
                   
                   ?>
                   
                   </div>
                   
                   
                    <div class="col-lg-7 col-xs-8 col-sm-9 col-md-8 ">
                   
                   <div style="float:left;" >
                   
                   <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold; padding-left:0px; padding-right:0px;">
                   
                   <?php echo $row['username']; ?>
                  
                   
                   
                   </div>
                   
                   <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-left:0px; padding-right:0px;float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;margin-bottom:10px;">         <?php
                   
                  
                   
                   echo $arrayreplies['reply_text'];
                   
                   ?>     </div>
                   
                   
                   </div>
                   
                   
                   
                    <div style="float:left; ">
                   
                   <?php
                   
                 
                   
                    $userimg = $db_con->prepare("select image_name from reply_images where user_id = '".$arrayreplies['user_id']."'and reply_id='".$arrayreplies['reply_id']."'");
                  
                  $userimg->execute();
                   
                   foreach($userimg->fetchAll(PDO::FETCH_ASSOC) as $rowimg)
                   {
                   if(file_exists($rowimg['image_name']))
                   
                   echo '<div style="float:left;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  /></div>';
                   
                   }
                   
                   ?>
                   
                   </div>
                   
                   
                   
                   
                   
                   
                    </div>
                   
                   <div class="col-lg-3 col-xs-3 col-sm-2 col-md-2" style=" text-align:right;">
                   
                    <div style="float:right;font-family:Arial, Helvetica, sans-serif; font-size:16px;"><span style="color:#7e7e7e;">  <?php
                    
                  
             echo datediff($arrayreplies['reply_date']);
                
                    
                    ?></span></div>
                   
                   </div>
                   
   
   
               
            </div>  
            
            <?php
            
			
			
			if($countrows0>0)
			
			echo '<div class="bordersep"></div> ';
			
			?>
      
      
      
      
      
      
      
            
               
   
   <?php
   
     }
	 
	 
	 
	 
		}
   
  
   ?>
   <!--body navigation ends-->
   
   
      <?php
      
	  if($ros>0)
   
   {
   ?>
   
  
             <div class="col-lg-12" style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:0px;float:left;margin-bottom: 10px;
margin-left: 5px;"><div id="form-content" style="margin-top:0px;margin-left:0px;  margin-right:10px;">
      
      
      <form method="post" id="register-form" action="upload_file.php"  enctype="multipart/form-data" autocomplete="off">
      
      <div class="form-group"><textarea style=" padding-left:0px;margin-top:10px;border:none; background:transparent;-webkit-box-shadow: unset;
" class="form-control" name="desc" id="desc" placeholder="what's going on ?" cols="" rows=""></textarea></div>
      
      
        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 paddingzero" style="margin-top:0px;padding-right: 0px;">
      <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6 paddingzero">
       <div class="form-group">
        <label class="filebutton">
         <span><input type="file" id="upload_file" name="upload_file[]" onChange="preview_image();" class="required" multiple/></span>
        </label>
       </div>
      </div>
      <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="text-align:right; padding-right:0px; float:right;">
        <input type="hidden" name="offerid" value="<?php echo $array['offer_id']; ?>">
      
       <input type="hidden" name="bid_id" value="<?php echo $array['bid_id']; ?>">
      
       <input style="font-family:Arial, Helvetica, sans-serif; font-size:14px;"  type="submit" name="submit_image5"  class="btn btn-sm btn-primary " value="reply"/>
     </div>
   </div>
      
     </form>
        
        
         </div>
       </div> 
   
   <div class="bordersep"></div> 
   <?php
   
   }
   ?>
     
     
<?php
		

	
  }
	
	
}
        
        ?>
        
      <!--  </div>
        
       
        
        </div>
        
        
     
        
        
      </div>-->

        


   
</div>

</div>
</div>


</div>

</div>



<script type="text/javascript">
$(document).ready(function() {	


$('.stuffneed').click(function(){
	
	data = 'offers_type=offerimade';
	
	$.ajax({url:"search2.php",type:'POST',data:data,success: function(sv){
		
		$('.ajaxget').nextAll('div').remove();
		
		$('#nothing').remove();
		
		$('.ajaxget').html(sv)
		
		
		
		}})
	
	
	
	
	
	
	});
	
	
	
	
	

	
	
	
	
	
	
	$('.stuffmade').click(function(){
	
	data = 'offers_type=stuffmade';
	
	$.ajax({url:"search2.php",type:'POST',data:data,success: function(sv){
		
		$('.ajaxget').nextAll('div').remove();
		
		$('#nothing').remove();
		
		$('.ajaxget').after(sv);
		
		
		}})
	
	
	});
	
	
	
	
	
	$('.buttonred').click(function(){
	
	
	if($('#desc').val()=='')
	{
		
		alert('please enter description')
		
		$('#desc').select();
		
		return false;
		
		
		
		
		}
		
		
		/*if($('#upload_file').val()=='')
	{
		
		alert('please add image')
		
		$('#upload_file').select();
		
		return false;
		
		
		
		
		}*/
	
	
	});
	
	




});




/*$(document).ready(function() 
{ 
 $('form').ajaxForm(function() 
 {
     alert("offer posted SuccessFully");
  
  
    data = 'offers_type=offerimade';
	
	$.ajax({url:"search2.php",type:'POST',data:data,success: function(sv){
		
		$('.ajaxget').nextAll('div').remove();
		
		$('#nothing').remove();
		
		$('.ajaxget').html(sv)
		
		
		
		}})
	
  
  
  
  
 }); 
});

function preview_image() 
{
 var total_file=document.getElementById("upload_file").files.length;
 
 if(total_file>4)
 
 {
	 alert('not more than 4 images')
	 
	 $('#upload_file').val('');
	 
	 $('#upload_file').select();
	 
	  return false
	 }
 

 
 for(var i=0;i<total_file;i++)
 {
  
  
  
  $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>");
 }
 
 
 
}
*/


function getoffers(offer_posted_user,offer_id,logged_in_user)

{
	window.location='home3.php?offer_id='+offer_id+'&offer_posted_user='+offer_posted_user;
	
	
	
	}




</script>










<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>