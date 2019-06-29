<?php

include('top_header.php');

?> 
    
    
<div class="body-container">

<div class="container custombg">
        
        
        <div class="col-lg-12 col-md-12  custom_padding">
        
        <?php include("left_nav.php"); ?>
        
        <div class="col-lg-8 col-sm-12 col-xs-12 paddingset">
        
         <div class="borderouter">
       
         <?php
            
			if(@$_GET['offer_id']!='')
			
			{
  
			  	$query = $db_con->prepare("select * from posted_offers where offer_id = '".@$_GET['offer_id']."'");
			  
			  	$query->execute();
  
 
				$array = $query->fetch(PDO::FETCH_ASSOC);
				
				$posteduser  = $array['offer_posted_user'];
	  
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
   
   
               <div class="col-lg-7 col-xs-8 col-sm-8 col-md-8 ">
               
               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">
               
               <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;">
               
               <?php echo $row['username']; ?>
               
               </div>
               
               <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;padding-left:0px; padding-right:0px;">        		
			   <?php echo $array['offer_title']; ?>     </div>
               
               
               </div> </div>
               
               <div class="col-lg-3 col-xs-3 col-sm-3 col-md-3" style=" text-align:right;">
               
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
            
            
            <div style="font-family: Arial,Helvetica,sans-serif; font-size: 16px; color: rgb(255, 0, 0); font-weight: bold; padding-left: 0px; text-align:right; float:right;" class="col-lg-6 col-xs-6 col-sm-6 col-md-6">
            
            <?php if($array['offer_status']==0) echo '<span class="glyphicon glyphicon-triangle-top"></span>&nbsp;closed'; ?>
            
            </div>
            
            
            
     
      		</div>


<div class="bordersep"></div>

    		<?php

			// show all offers against this offer
			
			
			
			$query_bids = $db_con->prepare("select * from bids_against_offers where offer_id = '".@$_GET['offer_id']."'");
			  
			$query_bids->execute();
			  
			 
			foreach($query_bids->fetchAll(PDO::FETCH_ASSOC) as $array)
			
			{
			
			?>
            
          <!--////////////////////////////////////////////////////////////////////////////////////////////// -->         
           
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
               
               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">
               
               <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;">
           
           
           <?php echo $row['username']; ?>
           
           </div>
           
           <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;padding-left:0px; padding-right:0px;margin-bottom:10px;">        
		   <?php echo $array['offer_title']; ?>     </div>
           
            <?php
           
           
            $userimg = $db_con->prepare("select image_name from bids_against_offers_images where user_id = '".$array['user_id']."' and bid_id='".$array['bid_id']."'");
          
          $userimg->execute();
           
           $rowimg=$userimg->fetch(PDO::FETCH_ASSOC);
           
           if(file_exists($rowimg['image_name']))
           
           echo '<div style="float:left;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  /></div>';
           
         
           
           ?>
   
           </div> </div>
           
           <div class="col-lg-3 col-xs-3 col-sm-3 col-md-3" style=" text-align:right;">
           
            <div style="float:right;font-family:Arial, Helvetica, sans-serif; font-size:16px;"><span style="color:#0e1131;font-weight:bold;color:#d32028;"><?php echo $array['bid_price']; ?></span> <span style="color:#7e7e7e;">| 
            
            <?php
  echo datediff($array['posted_date']);
	
			?>
                </span></div>
               
               </div>
               
               
               <?php
              
			 
			   
			    $total_replies = $db_con->prepare("select reply_id from bid_replies where offer_id = '".$array['offer_id']."' and bid_id='".$array['bid_id']."' and user_id='".$array['user_id']."'");
		  
			 $total_replies->execute();
		   
			 $ros=$total_replies->rowCount();
			
			
			if($ros>1)
			 $rep = $ros.' replies';  
			elseif($ros>0)   
			 $rep = $ros.' reply';
			 else
			 $rep = 'no reply';      
			   ?>
               
               
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingzero" style=" font-family:Tahoma, Geneva, sans-serif; font-size:15px; color:#878686;width:100%; font-weight:bold;  margin-left: 13px;
    margin-top: 20px;" >
   
 <div  class="col-xs-4 col-sm-4 col-md-4 col-lg-4 paddingzero"><?php echo $rep; ?>.  </div>
   
  
  
   
    <div style="float:right; font-family:Tahoma, Geneva, sans-serif; font-size:15px; color:#878686; font-weight:bold;  margin-left: 13px;margin-top: 10px; text-align:right; padding-right:0px;" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
   
<input onclick="paypal('<?php echo $array['user_id'] ?>','<?php echo $_SESSION['user_session'] ?>','<?php echo $array['offer_id'] ?>','<?php echo  $array['bid_id'];  ?>')" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;"  type="button"   class="btn btn-sm btn-primary buttonred00" value="You wow'd me I'll take it"/>
   
   </div>
   
    </div>
               
             
               
               
               <!--body navigation ends-->
               
                  
                  
                  
                  </div>
                  
      <div class="bordersep"></div>            
                  
          
          
          <?php

			// show all offers against this offer
			
			
			
			$query_bids_replies = $db_con->prepare("select * from bid_replies where offer_id = '".@$_GET['offer_id']."' and bid_id='".$array['bid_id']."'");
			  
			$query_bids_replies->execute();
			  
			 
			foreach($query_bids_replies->fetchAll(PDO::FETCH_ASSOC) as $arrayreplies)
			
			{
			
			?>
            
          <!--////////////////////////////////////////////////////////////////////////////////////////////// -->         
<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">
               
               
               <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">           
            <?php
           
            $user = $db_con->prepare("select username,user_avatar from users where user_id = '".$arrayreplies['user_id']."'");
          
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
           
           <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;padding-left:0px; padding-right:0px;margin-bottom:10px;">        
		   <?php echo $arrayreplies['reply_text']; ?>     </div>
           
            <?php
           
           
            $userimg = $db_con->prepare("select image_name from reply_images where user_id = '".$arrayreplies['user_id']."' and reply_id='".$arrayreplies['reply_id']."'");
          
          $userimg->execute();
           
           foreach($userimg->fetchAll(PDO::FETCH_ASSOC) as $rowimg)
           
          { if(file_exists($rowimg['image_name']))
           
           echo '<div style="float:left;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  /></div>';
           
		  }
           
           ?>
   
           </div> </div>
           
           <div class="col-lg-3 col-xs-3 col-sm-3 col-md-3" style=" text-align:right;">
           
            
            
            <?php
  
			
			  
			  
			  echo datediff($arrayreplies['reply_date']);
	
			?>
                </span></div>
               
               </div>
               
               
              
               
               
               <div class="bordersep"></div> 
               
             
                  
                  
                 
                  
                <?php
                
			}
				
				?>  
                  
             <!--////////////////////////////////////////////////////////////////////////////////////////////// -->         
               
                
               
                 <?php
               
			   
			   if($posteduser==$_SESSION['user_session'])
			   
			   echo '<div style="float:left;margin-top: 10px;" class="col-lg-12 col-xs-12 col-sm-12 col-md-12"><input style="font-family:Arial, Helvetica, sans-serif; font-size:14px;"  type="button"  onclick="showform(\'my_'.$array['bid_id'].'\',\''.$array['bid_id'].'\',\''.$array['offer_id'].'\')"  class="btn btn-sm btn-primary buttonred00" value="Reply"/></div>';
			   
			   ?>
           
               
               
               
               
                  
                  <div id="form-content " class="my_<?php echo $array['bid_id']; ?>"  style="margin-top:20px;margin-left:20px;margin-right:10px;">
                 
                  <div  style="margin-top:20px;margin-right:10px;display:none;">
                
                 <div  class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:15px;">What's going on ?</div><form method="post" id="register-form" action="upload_file.php"  enctype="multipart/form-data" autocomplete="off"><div class="form-group"><textarea style="margin-top:10px;" class="form-control" name="desc" id="desc" placeholder="Enter offer" cols="" rows=""></textarea></div>
                 
     <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 paddingzero" style="margin-top:30px;padding-right: 0px;">
      <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6 paddingzero">
       <div class="form-group">
        <label class="filebutton">
         <span><input type="file" id="upload_file" name="upload_file[]" onChange="preview_image();" class="required" multiple/></span>
        </label>
       </div>
      </div>
      <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="text-align:right; padding-right:0px; float:right;">
        <input type="hidden" name="offerid" value="<?php echo @$_GET['offer_id']; ?>">
        <input type="hidden" name="bid_id" value="<?php echo $array['bid_id']; ?>">
        <input style="font-family:Arial, Helvetica, sans-serif; font-size:14px;"  type="submit" name="submit_image3"  class="btn btn-sm btn-primary buttonred" value="Post"/>
     </div>
   </div>
            
                 </form>
                 
              
                  </div>
                   
                  
               </div>   
                 
                 
                  
                  
                  
                   <?php
     
    }
     
     ?>
                  
                
                 </div>
    
    
    
             
          <?php
         
             
             }
             
             ?>     
        
         </div>
         
         </div>
        
        </div>
        
        </div>
        
      </div>
   
</div>

</div>
</div>


</div>

</div>



<script type="text/javascript">
/*$(document).ready(function() {	


	
	
	$('.buttonred').click(function(){
	
	
	
	if($('#desc').val()=='')
	{
		
		alert('please enter description')
		
		$('#desc').select();
		
		return false;
		
		
		
		
		}
		
		
		if($('#upload_file').val()=='')
	{
		
		alert('please add image')
		
		$('#upload_file').select();
		
		return false;
		
		
		
		
		}
	
	
	});
	
	
	
	 $('form').ajaxForm(function() 
 {
  
  alert("offer posted SuccessFully");
  
  location.reload();
  
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
	window.location='make_offers_new.php?p=makeoffer&offer_id='+offer_id+'&offer_posted_user='+offer_posted_user;
	
	
	
	}
	
	
	function showform(id,bid_id,offer_id)
	
	{
		
		
		var classname  = '.'+id;
		
		//$(classname).html('sdfsd')
		
		//alert($(classname).html())
		
		
		
		
		
		var str  = '<input type="hidden" name="bid_id" value="'+bid_id+'"><input type="hidden" name="offer_id" value="'+offer_id+'">';
		
		
$(classname).html('<div  style="margin-top:5px;margin-right:10px;display:block;"><div  class="col-lg-12 paddingzero" style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:15px;margin-bottom:12px;"><form method="post" id="register-form" action="upload_file.php"  enctype="multipart/form-data" autocomplete="off" ><div class="form-group"><textarea style="margin-top:0px;border:none; background:transparent;-webkit-box-shadow: unset;" class="form-control" name="desc" id="desc" placeholder="What\'s going on ?" cols="" rows=""></textarea></div><div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 paddingzero" style="margin-top:0px;padding-right: 0px;"><div class="col-lg-6 col-xs-6 col-sm-6 col-md-6 paddingzero"><div class="form-group"><label class="filebutton"><span><input type="file" id="upload_file" name="upload_file[]" onChange="preview_image();" class="required" multiple/></span></label></div></div><div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="text-align:right; padding-right:0px; float:right;"><input style="font-family:Arial, Helvetica, sans-serif; font-size:14px;"  type="submit" name="submit_image4"  class="btn btn-sm btn-primary buttonred" value="Post"/><input type="hidden" name="prevs" id="prevs" value=""></div></div>'+str+'</form></div></div>')
		
		
		if(document.getElementById('prevs').value!='')
		
		$(document.getElementById('prevs').value).html('');
		
		
		
		$('#prevs').val(classname); 
		
		//var str = $('#prevs').val();
		
		//str = str.replace(".", "");
		
		//$('#prevs').val(str)
		
		
  }
  
  function validateit()
  
  {
	  
	  if($('#desc').val()=='')
	{
		
		alert('please enter description')
		
		$('#desc').select();
		
		return false;
		
		
		
		
		}
	  
	  
	  }

function paypal(seller_id,user_id,offer_id,bid_id)
{
	
	if(confirm('you agree you are purchasing this item?'))
	
	window.location = 'gotopaypal.php?seller_id='+seller_id+'&user_id='+user_id+'&offer_id='+offer_id+'&bid_id='+bid_id;
	
	}


</script>


<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>