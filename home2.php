<?php



include('top_header1.php');



?>    

    

<div class="body-container">













<div class="container custombg">

        

        

        <div class="col-lg-12 col-md-12 custom_padding">

        

        <?php include("left_nav.php"); ?>

        

        

        <!--main content starts-->

        

        

        <div class="col-lg-8 col-sm-12 col-xs-12 col-md-12 paddingset">

        

        <!--border div starts here -->

        

        

        <div class="borderouter">

       

       

       <!--get offer form-->

       

      <div class="col-lg-12" style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:5px; margin-bottom:12px;"><div id="form-content" style="margin-top:0px;margin-left:0px;  margin-right:0px;">

      

      

      <form method="post" id="register-form" action="upload_file.php" enctype="multipart/form-data" autocomplete="off">

      

      <div class="form-group"><textarea style="margin-top:10px;border:none; background:transparent;-webkit-box-shadow: unset;" class="form-control" name="desc" id="desc" placeholder="What do you need?" cols="" rows=""></textarea></div>

      

      

      

      

     

      

       <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 paddingzero" style="margin-top:0px;">

      <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6 paddingzero">

       <div class="form-group">

      

      <label class="filebutton">



<span> <input type="file" id="upload_file" name="upload_file[]" onChange="preview_image();" class="required" multiple/></span>

</label>

      

      

      

      </div>

      </div>

      

       

      <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="text-align:right; padding-right:0px; float:right;">

      

      <input style="font-family:Arial, Helvetica, sans-serif; font-size:14px; cursor:pointer;"  type="submit" name="submit_image"  class="btn btn-sm btn-primary buttonred" value="get offers"/>

      

     </div>

      

      </div>

      

     </form>

        

        </div>

        

         </div>

         
 <?php

         

		/* $query = $db_con->prepare("select * from posted_offers where offer_posted_user = '".$_SESSION['user_session']."'");

  

         $query->execute();
		 
	
   

      $rowcount=$query->rowCount(PDO::FETCH_ASSOC);*/



            $q = mysqli_query($conn,"select * from posted_offers where offer_posted_user = '".$_SESSION['user_session']."'");
			
			$rowcount = mysqli_num_rows($q);
			
			
      

	  

	 if($rowcount>0)
        echo '<div class="bordersep"></div>'; 
		 
		 ?>

         

         

         <!--get offer form ends here -->

         

         

         

         <!--created offers against each user -->

         

         <div class="ajaxget">

         

         <?php

         

		

  

 

         while($array = mysqli_fetch_array($q))

  

         {

 

	  

         ?>    

      

      

      

      

           <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">

               

               

               <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">

   

       <?php

   

        /*$user = $db_con->prepare("select username,user_avatar from users where user_id = '".$array['offer_posted_user']."'");

  

        $user->execute();

   

       $row=$user->fetch(PDO::FETCH_ASSOC);*/
	   
	   
	   
	    $user = mysqli_query($conn,"select username,user_avatar from users where user_id = '".$array['offer_posted_user']."'");
			
		$row = mysqli_fetch_array($user);
	   
	   

   

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

   

        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 paddingleftright" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;margin-bottom:10px;">        

		<?php echo $array['offer_title']; ?>     

        

        </div>

        

        

        

          <?php

           

           

         /*   $userimg = $db_con->prepare("select image_name from posted_offers_images where user_id = '".$_SESSION['user_session']."' and offer_id='".$array['offer_id']."'");

          

          $userimg->execute();*/
		  
		  
		  
		$userimg = mysqli_query($conn,"select image_name from posted_offers_images where user_id = '".$_SESSION['user_session']."' and offer_id='".$array['offer_id']."'");
			
		

		  
		  
		  
		  

           

          // foreach($userimg->fetchAll(PDO::FETCH_ASSOC) as $rowimg)

          while($rowimg = mysqli_fetch_array($userimg)) 

		   {

		   

           if(file_exists($rowimg['image_name']))

           

           echo '<div style="float:left;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  /></div>';

           

		   }

           

           ?>

   

   

       </div> </div>

   

        <div class="col-lg-3 col-xs-3 col-sm-2 col-md-3" style=" text-align:right;">

   

       <div style="float:right;font-family:Arial, Helvetica, sans-serif; font-size:16px;"><span style="color:#0e1131;font-weight:bold;"><?php 

	   

	   

	   echo $array['offer_price']; 

	   

	   

	   ?></span> <span style="color:#7e7e7e;">| 

    

    

    

    <?php

  

	

	  

	  echo datediff($array['offer_posted_date']);

  

	

	

	?>

    

    

    

    </span></div>

   

     </div>

   

   

  

   

   <!--body navigation ends-->

   

   

      </div>





     <div style="margin-bottom:10px;" class="col-lg-12 col-xs-12 col-sm-12 col-md-12" id="<?php  echo $array['offer_id']; ?>">

   

     <div style="font-family: Arial,Helvetica,sans-serif; font-size: 16px; color: rgb(255, 0, 0); font-weight: bold; padding-left: 15px;"   

     class="col-lg-6 col-xs-6 col-sm-6 col-md-6"><?php

    

	

	

	/* $total_offers = $db_con->prepare("select bid_id from bids_against_offers where offer_id = '".$array['offer_id']."'");

  

     $total_offers->execute();

   

     $rowss=$total_offers->rowCount();*/

	
	
	$total_offers = mysqli_query($conn,"select bid_id from bids_against_offers where offer_id = '".$array['offer_id']."'");
			
	$rowss = mysqli_num_rows($total_offers);


	

	if($rowss>0)

	

	echo $rowss.' offers';

	

	

	

	?></div>

     

      <?php

     

	 if($rowss>0)

	 

	 {

	 

	 ?>

     

     <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="padding-right: 0px; font-weight: bold; color: red; text-align: right;"><button style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred00"  onclick="getoffers(<?php echo $array['offer_posted_user']; ?>,<?php echo $array['offer_id']; ?>,<?php echo $_SESSION['user_session']; ?>);">view offers</button></div>

  

  

   <?php

     

	 }

	 

	 ?>

     

     

      </div>



<div class="bordersep"></div>



     <?php

     

      }

	 

	 ?>    

         

         

         </div>

        

        

        <!--end created offers here -->

        

        

        </div>

        

        <!--border div ends here -->

        

        </div>

        

        

        <!--main content ends-->

        

        

      </div>



        





   

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









$(document).ready(function() 

{ 

 $('form').ajaxForm(function() 

 {

     alert("offer posted SuccessFully");

  

  

    data = 'offers_type=offerimade';

	

	$.ajax({url:"search2.php",type:'POST',data:data,success: function(sv){

		

		$('.ajaxget').nextAll('div').remove();

		

		$('#nothing').remove();

		

		$('.ajaxget').html(sv)

		

		 $('#upload_file').val('');

		 

		 

		 $('#desc').val('');

		

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

  

  

  

 // $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>");

 }

 

 

 

}







function getoffers(offer_posted_user,offer_id,logged_in_user)



{

	window.location='home3.php?offer_id='+offer_id+'&offer_posted_user='+offer_posted_user;

	

	

	

	}









</script>





















<script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>