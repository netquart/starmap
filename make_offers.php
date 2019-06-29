<?php



include('top_header.php');



?> 

    

<div class="body-container">









<div class="container custombg">

        

        

        <div class="col-lg-12 col-md-12 custom_padding paddingset">

        

        <?php include("left_nav.php"); ?>

        

        <div class="col-lg-8">

    

         

         

         

         

        <div class="borderouter">

         

           <?php

            

			if(@$_GET['offer_id']=='')

			

			{

				

				?>

         

         <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" id="setcus">

	

		<div class="row">

		

        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" id="form-content" style="color:#7e7e7e;  font-family:Tahoma, Geneva, sans-serif; font-size:14px; margin-top:15px; margin-bottom:10px;">

      

     

			

			

			<form method="post" id="reg-form" autocomplete="off" style="float:right;text-align:right;width:100%;">

				

				<div class="form-group">

					<input type="text" class="form-control" style="border:none; background:transparent;-webkit-box-shadow: unset;

" name="txt_fname" id="lname" placeholder="What do you want to make offers on" required />

				</div>

				

				

				

			

				

				<div class="form-group" style="float:right">

					<button class="btn btn-primary searchit">Search</button>

				</div>

				

			</form>

            

            </div>

            

            </div></div>

            

       <?php } ?>     

            

            

            

            

            <?php

            

			if(@$_GET['offer_id']!='')

			

			{

				

	/// check if user is eligible for offers or not			

	
	
	  $sql = "select * from seller_invoices where seller_id = '".$_SESSION['user_session']."' and  	invoice_status='0' and  MONTH(created_date) = MONTH(CURRENT_DATE())";

	  



      $user_purchases = $db_con->prepare($sql);

  

      $user_purchases->execute();

   

      $rowcount=$user_purchases->rowCount(PDO::FETCH_ASSOC);

      

	  

	 if($rowcount>0 and date('d')>25 and $_SESSION['member_type']!='2')
	 
	 echo '<script>alert(\'you cant make offers until you pay for previous\');location.href=\'view-profile.php\'</script>';			
				
  

  //$query = "select * from posted_offers where offer_title like '%".$_POST['txt_fname']."%'";

  

  $query = $db_con->prepare("select * from posted_offers where offer_id = '".@$_GET['offer_id']."' ");

  

  $query->execute();

  

 

$array = $query->fetch(PDO::FETCH_ASSOC);

  

 $buyer_user_offer_id = $array['offer_posted_user'];

 

	  

  ?>    

      

      

      

      

    <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">

               

               

               <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">

   

    <?php

   

    $user = $db_con->prepare("select username,user_avatar from users where user_id = '".$array['offer_posted_user']."'");

  

  $user->execute();

   

   $row=$user->fetch(PDO::FETCH_ASSOC);

   

   if(file_exists($row['user_avatar']))

   

  echo '<img class="bordrshadow" src="'.$row['user_avatar'].'" width="56" height="54"  />';
			
		else
			echo '<img src="images/desktop-makeoffers2_06.png" width="56" height="54"  />';
   
   

   

   ?>

   

   </div>

   

   

   <div class="col-lg-7 col-xs-9 col-sm-9 col-md-8 ">

               

               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">

               

               <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;">

<?php echo $row['username']; ?>

       </div>

        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 paddingzero" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;"><?php echo $array['offer_title']; ?>

        </div>

     </div>

   </div>

   <div class="col-lg-3 col-xs-2 col-sm-2 col-md-3" style=" text-align:right;">

    <div style="float:right;font-family:Arial, Helvetica, sans-serif; font-size:16px;"><span style="color:#0e1131;font-weight:bold;"><?php echo $array['offer_price']; ?></span> <span style="color:#7e7e7e;">| 

    <?php

  

		echo datediff($array['offer_posted_date']);

	

	

	?>

    

    

    

    </span></div>

   

   </div>

   

   

  

   

   <!--body navigation ends-->

   

   

      </div>





<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" id="<?php  echo $array['offer_id']; ?>">

   

    <div style="font-family: Arial,Helvetica,sans-serif; font-size: 16px; color: rgb(255, 0, 0); font-weight: bold; padding-left: 15px;" class="col-lg-6  col-md-6 col-xs-6 col-sm-6"><?php

    

	

	

	 $total_offers = $db_con->prepare("select bid_id from bids_against_offers where offer_id = '".$array['offer_id']."'");

  

  $total_offers->execute();

   

   $rowss=$total_offers->rowCount();

	

	

	if($rowss>0)

	

	echo $rowss.' offers';

	

	

	

	?></div>

     

     

     

  

     

     

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

   

 echo '<img class="bordrshadow" src="'.$row['user_avatar'].'" width="56" height="54"  />';
			
		else
			echo '<img src="images/desktop-makeoffers2_06.png" width="56" height="54"  />';
   
   

   

   ?>

   

   </div>

   

   

   <div class="col-lg-7 col-xs-9 col-sm-9 col-md-8 ">

               

               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">

               

               <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;">



   

   <?php echo $row['username']; ?>

  

   

   

   </div>

   

   <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 paddingzero" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%; margin-bottom:8px;">        

   

   

   

   

   

   

   

   <?php echo $array['offer_title']; ?>     </div>

   

   

    <?php

   

  // echo "select image_name from bids_against_offers_images where user_id = '".$array['user_id']."'and bid_id='".$array['user_id']."'";

   

    $userimg = $db_con->prepare("select image_name from bids_against_offers_images where user_id = '".$array['user_id']."'and bid_id='".$array['bid_id']."'");

  

  $userimg->execute();

   

   foreach($userimg->fetchAll(PDO::FETCH_ASSOC) as $rowimg)

   {

   

   if(file_exists($rowimg['image_name']))

   

   echo '<div style="float:left;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  /></div>';

   

   }

   

   ?>

   

   

   

   

   

   

   </div> </div>

   

   <div class="col-lg-3 col-xs-2 col-sm-2 col-md-3" style=" text-align:right;">

   

    <div style="float:right;font-family:Arial, Helvetica, sans-serif; font-size:16px;"><span style="color:#0e1131;font-weight:bold;"><?php echo $array['bid_price']; ?></span> <span style="color:#7e7e7e;">| 

    

    

    

    <?php

    



 echo datediff($array['posted_date']);

	

	

	?>

    

    

    

    

    </span></div>

   

   </div>

   

   

   

     <?php

              

			 

			   

			    $total_replies = $db_con->prepare("select reply_id from bid_replies where offer_id = '".$array['offer_id']."' and bid_id='".$array['bid_id']."' and user_id='".$buyer_user_offer_id."'");

		  

			 $total_replies->execute();

		   

			 $ros=$total_replies->rowCount();

			

			

			if($ros>1)

			 $rep = $ros.' replies';  

			elseif($ros>0)   

			 $rep = $ros.' reply';

			 else

			 $rep = 'no reply';      

			   ?>

               

               

               <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="float:left; font-family:Tahoma, Geneva, sans-serif; font-size:15px; color:#878686;width:100%; font-weight:bold;  margin-left: 0px;

    margin-top: 10px;">

   

 <div style="float:left"><?php echo $rep; ?>.  </div>

   

   </div>

   

   

  

   

   <!--body navigation ends-->

   

   

      </div>







     <div class="bordersep"></div>    

            

            

            

            

            

            

            

  <!--////////////////////////////////////////////////////////////////////////////////////////////// -->          

 

 

 

 

 

 

 <?php

 

}

 

 

 

 

 $stmt = $db_con->prepare("select user_id from bids_against_offers where user_id='".$_SESSION['user_session']."' and offer_id='".@$_GET['offer_id']."'");

$stmt->execute();	



$total_r = $stmt->rowCount();



if($total_r==0)

 {

 

 

 ?>

            

            

            

           

           <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:15px; margin-bottom:10px;"><div id="form-content" style="margin-top:20px;margin-left:20px;  margin-right:10px;">

      

      

      <form method="post" id="register-form" action="upload_file.php"  enctype="multipart/form-data" autocomplete="off">

      

      <div class="form-group" style="float:left;width:100%;"><textarea style="margin-top:10px;border:none; background:transparent;-webkit-box-shadow: unset;" class="form-control" name="desc" id="desc" placeholder="What do you want to offer?" cols="" rows=""></textarea></div>

      

      

      

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

        <input style="font-family:Arial, Helvetica, sans-serif; font-size:14px;"  type="submit" name="submit_image2"  class="btn btn-sm btn-primary buttonred" value="make offers"/>

     </div>

   </div>

      

      

     </form>

        

        

         </div>

         </div>  

           

     <?php

     

 }

 

 else

 

 {

	 ?>

     

     

     

     <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->              <?php    

                  

            

            $query = $db_con->prepare("select * from bid_replies where offer_id = '".@$_GET['offer_id']."' and bid_id='".$array['bid_id']."' ");

			  

			  	$query->execute();

  

 

				foreach($query->fetchAll(PDO::FETCH_ASSOC) as $array)

	            

				{

				

			  ?>    

				  

				<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">

               

               

               <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">

			   

				<?php

			   

			   

				$user = $db_con->prepare("select username,user_avatar from users where user_id = '".$array['user_id']."'");

			  

				$user->execute();

			   

				$row=$user->fetch(PDO::FETCH_ASSOC);

			   

				if(file_exists($row['user_avatar']))

			   

			 echo '<img class="bordrshadow" src="'.$row['user_avatar'].'" width="56" height="54"  />';
			
		else
			echo '<img src="images/desktop-makeoffers2_06.png" width="56" height="54"  />';
   
			   

			   

			   ?>

			   

			   </div>

   

   

              <div class="col-lg-7 col-xs-9 col-sm-9 col-md-8 ">

               

               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">

               

               <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;">



               <?php echo $row['username']; ?>

               

               </div>

               

               <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 paddingzero" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;margin-bottom:10px;">        		

			   <?php echo $array['reply_text']; ?>     </div>

               

               

               <?php

           

           

            $userimg = $db_con->prepare("select image_name from reply_images where user_id = '".$_SESSION['user_session']."' and reply_id='".$array['reply_id']."'");

          

          $userimg->execute();

           

		   error_reporting(0);

		   

           foreach($userimg->fetchAll(PDO::FETCH_ASSOC) as $rowimg)

           {

           if(file_exists($rowimg['image_name']))

           

           echo '<div style="float:left;"><img src="'.$rowimg['image_name'].'" class="img-responsive"  /></div>';

           

		   }

           

           ?>

               

               

               </div> </div>

               

               <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" style=" text-align:right;">

               

                <div style="float:right;font-family:Arial, Helvetica, sans-serif; font-size:16px;">

    

    

    

    			<?php

  

			echo datediff($array['reply_date']);

  

	

	

				?>

    

    

    

    			</span></div>

   

   				</div>

                

                

   

   				<!--body navigation ends-->

   

   

      		</div>





<div class="bordersep"></div>  



                  

               <?php } ?>   

                  

            

  <!--////////////////////////////////////////////////////////////////////////////////////////////// -->          

     

   <div class="col-lg-12" style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:0px;float:left;margin-bottom: 10px;

margin-left: 5px;"><div id="form-content" style="margin-top:0px;margin-left:0px;  margin-right:10px;">

      

      

      <form method="post" id="register-form" action="upload_file.php"  enctype="multipart/form-data" autocomplete="off">

      

      <div class="form-group" style="float:left;width:100%;"><textarea style=" padding-left:0px;margin-top:10px;border:none; background:transparent;-webkit-box-shadow: unset;

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

        <input type="hidden" name="offerid" value="<?php echo @$_GET['offer_id']; ?>">

      

       <input type="hidden" name="bid_id" value="<?php echo $array['bid_id']; ?>">

      

       <input style="font-family:Arial, Helvetica, sans-serif; font-size:14px;"  type="submit" name="submit_image3"  class="btn btn-sm btn-primary buttonred" value="reply"/>

     </div>

   </div>

      

     </form>

        

        

         </div>

       </div> 

    

     

     

     <?php

	 

	 

	 }

 

	 

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



<script type="text/javascript">

$(document).ready(function() {	

	

	// submit form using $.ajax() method

	

	$('#reg-form').submit(function(e){

		

		e.preventDefault(); // Prevent Default Submission

		

		$.ajax({

			url: 'search.php',

			type: 'POST',

			data: $(this).serialize() // it will serialize the form data

		})

		.done(function(data){

			$('#form-content').fadeOut('slow', function(){

				

				$('#form-content').fadeIn('slow').html(data);

				

				//$('#txt').fadeOut('slow')

				

				$('#setcus').css('padding-left','0px')

				

				$('#setcus').css('padding-right','0px')

				

				

			});

		})

		.fail(function(){

			alert('Ajax Submit Failed ...');	

		});

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





 <?php if(@$_GET['offer_id']!='') { ?> 



$(document).ready(function() 

{ 

 $('form').ajaxForm(function(data) 

 {

	

	if(data=='already')

	

	 alert('you can\'t add more than one offer');



else

{	 

  alert("offer posted SuccessFully");

  



  

window.location='make_offers_new.php?p=makeoffer&offer_id=<?php echo @$_GET['offer_id']; ?>&offer_posted_user=<?php echo @$_GET['offer_posted_user']; ?>';



}



  

 }); 

});

<?php } ?>







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

  

  

  

  //$('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>");

 }

 

 

 

}















function makeoffer(offer_posted_user,offer_id,logged_in_user)



{
    
	var paypal_email = '<?php echo $_SESSION['paypal_email']; ?>';
	
	if(paypal_email=='0' || paypal_email=='')
	
	{
	
		alert('please enter paypal email id before you can make offer so buyer can pay you')
		
		window.location='view-profile.php';
		
		
	}
	
	
	else
	
	
	window.location='make_offers_new.php?p=makeoffer&offer_id='+offer_id+'&offer_posted_user='+offer_posted_user;

	

	

	

	}

















</script>





































<script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>