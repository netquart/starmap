<?php



include('top_header.php');

require_once("class2.php");

$obj = new happenning;

?> 

    

<div class="body-container">


  <script type="text/javascript" src="fg.menu.js"></script>
    
    <!-- required styles -->
    <link type="text/css" href="fg.menu.css" media="screen" rel="stylesheet" />
    <link type="text/css" href="theme/ui.all.css" media="screen" rel="stylesheet" />
    
       <script type="text/javascript">    
    $(function(){
    	// BUTTONS
    	$('.fg-button').hover(
    		function(){ $(this).removeClass('ui-state-default').addClass('ui-state-focus'); },
    		function(){ $(this).removeClass('ui-state-focus').addClass('ui-state-default'); }
    	);
   
		
		$('#hierarchybreadcrumb').menu({
			content: $('#hierarchybreadcrumb').next().html(),
			backLink: true
		});
		
		$('#hierarchy').menu({
			content: $('#hierarchy').next().html(),
			crumbDefaultText: ' '
		});
		
		
    });
	
	
	
	function showpopup()
	
	{
	
		var zip = document.getElementById('zip').value;
		
		var miles = document.getElementById('miles').value;
		
		
		
			document.getElementById('user_zip').value=zip;
			
			
			document.getElementById('miles_area').value=miles;
			
			//alert(document.getElementById('miles_area').value)
			
			var current = '';
			
			 current = <?php echo $_SESSION['zipcode']; ?>;
			
			if(zip!=current && current!='')
			
			document.getElementById('baloon').innerHTML='<img data-toggle="modal" data-target="#myModal" src="images/baloon_active.png" style="cursor:pointer;" />';
			
			
			//$(".modal").hide();
			
			$('#myModal').modal('hide')
			
			//document.regform.submit();
			

		
		/*if($('#desc').val()=='')

	    {

		

		alert('please enter description')

		

		$('#desc').select();

		

		return false;

		}

		else
		
		{
		

		e.preventDefault(); // Prevent Default Submission

		

		$.ajax({

			url: 'search.php',

			type: 'POST',

			data: $(this).serialize() // it will serialize the form data

		})

		.done(function(data){

				$('#form-content2').fadeIn('slow').html(data);

				

		})

		.fail(function(){

			alert('Ajax Submit Failed ...');	

		});
    
	
	  }*/
	

	
		
    }
	
	
	function loadlastreply(id,bidid)
{
        
	
	    data = 'option=getlastreply&reply_id='+id;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){
		
		//alert()
		
		$('#bids_'+bidid).before(sv);
		
		
		$('#reply_'+id).animate({ width: "100%" }, 1000 );
		


		}})
		
	
}



	function loadlastreply2(id,bidid)
{
        
	
	  
	   
	    data = 'option=getlastreply&page=2&reply_id='+id;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){
		
	
		
		$('#reply_'+bidid).append(sv);
		
		
		$('#reply_'+bidid).animate({ width: "100%" }, 1000 );
		


		}})
		
	
}


function deleteit(id)

{
    
	if(confirm('are you confirm to delete?'))
	
	{
		
	   
	  $('#mainsub_'+id).fadeOut(1000, function(){ $(this).remove();});
	   
	  
	   
	   data = 'option=deleteoffers2&offer_id='+id;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){

	
		

		}})
	   
	}
	   
	
}


function deleteit2(id)

{
    
	if(confirm('are you confirm to delete?'))
	
	{
		
	   
	  $('#mainoffer_'+id).fadeOut(1000, function(){ $(this).remove();});
	   
	  
	   
	   data = 'option=deleteoffers2&offer_id='+id;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){

	
		

		}})
	   
	}
	   
	
}
	
	
	
	function removeimg(id,id2,img,bidid)

{
	
	

var str = $("#uploadedimages__"+bidid).val();	

st = str.split(',');

arr = [];

array = arr.concat(st);


array = $.grep(array, function(value) {
  return value != img;
});


 array.toString();
 
 $("#uploadedimages__"+bidid).val(array)

//alert(array)

$("#"+id).remove();

$("#"+id2).remove();
	
}
	
	
	
	</script>






<div class="container custombg">

        

        

        <div class="col-lg-12 col-md-12 custom_padding paddingset">

        

        <?php include("left_nav.php"); ?>

        

         <div class="col-lg-8 col-sm-12 col-xs-12 col-md-12 paddingset">

    

         
<div class="col-lg-12 showthis" style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:20px; margin-bottom:12px;">
     
     <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4 topmenusselected" style="cursor:pointer;" onclick="location.href='make_offers_new.php?p=makeoffer'" >make offers</div>
     
     <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4 topmenus" style="cursor:pointer;" onclick="location.href='offersmake_new.php'">offers i've made</div>
     
     
<!-- <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4 topmenus" style="cursor:pointer;" onclick="location.href='mysearches2.php'">my searches</div>-->
     
     
    
    </div>
         


        <div class="borderouter">

         

           <?php

            

			if(@$_GET['offer_id']=='')

			

			{

				

				?>

         

         <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" id="setcus" >

	

		<div class="row">

		

        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" id="form-content" style="color:#7e7e7e;  font-family:Tahoma, Geneva, sans-serif; font-size:14px; margin-top:15px; margin-bottom:10px;padding-left:0px;">

      

     

			

			

			<form method="post" name="regform" id="reg-form" autocomplete="off" style="float:right;text-align:right;width:100%;">

				

				<div class="form-group">

					<input type="text" class="form-control" style="border:none; background:transparent;-webkit-box-shadow: unset;

" name="txt_fname" id="lname" placeholder="What do you want to make offers on" required />

				</div>

				<div id="savesrach" style="margin-bottom: 15px;text-align: left; padding-left:5px;"></div>

	



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
        <div style="margin-top:15px;">find offers in <input type="text" name="zip" id="zip" value="<?php echo $_SESSION['zipcode']; ?>" size="7"> miles of <input type="text" name="miles" id="miles" value="00000" /></div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary buttongreen">update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
      </div>
    </div>
  </div>
</div>
				


<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
        <div style="margin-top:15px;">you must be a <strong>premium member</strong> to make offers on #needsomethingdone and #rentsomething</div>
      </div>
      <div class="modal-footer">
        <!--onclick="showpopup()"-->
        <button type="button" class="btn btn-primary buttongreen" onClick="location.href='go-premium.php'">upgrade</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
      </div>
    </div>
  </div>
</div>



<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="text-align:right; padding-right:0px; padding-left:0px;">
	 
       <input type="hidden" id="uploadedimages" name="uploadedimages" value="">
       
       <input type="hidden" id="sub_cat" name="sub_cat" value="">
       
       <input type="hidden" name="submit_images" value="get offers">
       
       <input type="hidden" name="empty_search" id="empty_search" value="">
       
       <input type="hidden" name="user_zip" id="user_zip" value="<?php echo $_SESSION['zipcode']; ?>">
       
       <input type="hidden" name="miles_area" id="miles_area" value="">
       
       
        <input type="hidden" name="total_results" id="total_results" value="">
       
      <!-- <div id="baloon" style="display:inline-block;"><img data-toggle="modal" data-target="#myModal" src="images/baloon.png" style="cursor:pointer;" /></div>-->
       
       
      <!-- <a style="float:none;" tabindex="0" href="#news-items-2" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="hierarchy">select a category<div style="display:inline-block;margin-left:12px;" align="right">
         
         <span class="glyphicon glyphicon-chevron-down" style="color:#333333;">
         
         </span>
        
        </div></a>
<div id="news-items-2" class="hidden">


 <ul>
	  
       <li>
       
        <a href="1">sell something</a>
		
         <ul>
			
           <?php
           
		  $obj->buysomething();
		   
		   
		   ?>
		
        	
		
        </ul>
	  
       </li>
    
       <li>
       
        <a href="23">offer to do something</a>
    
    	 <ul>
			 <?php
              
			  $obj->needsomething();
			 
			 ?>
		
        </ul>
    
      </li>
    
     <li>
     
      <a href="46">rent something</a>
    
    	<ul>
			 <?php
              
			  $obj->rentsomething();
			 
			 ?>
		
        </ul>
    
     </li>
   
   </ul>


</div>-->

<button class="btn btn-primary searchit" style="padding-left:10px;">Search</button>
      
       
       </div>
			

				<!--<div class="col-lg-2 col-xs-12 col-sm-2 col-md-2" style="text-align:right; padding-right:0px; float:right;">

				<div class="form-group" style="float:right">

					

				</div>

				</div>-->

			</form>

            

            </div>

            

            </div></div>



            

       <?php } ?>     

            

            

            

            

            <?php

            

			if(@$_GET['offer_id']!='')

			

			{

				

	/// check if user is eligible for offers or not			

	
	
	 /* $sql = "select * from seller_invoices where seller_id = '".$_SESSION['user_session']."' and  	invoice_status='0' and  MONTH(created_date) = MONTH(CURRENT_DATE())";

	  



      $user_purchases = $db_con->prepare($sql);

  

      $user_purchases->execute();

   

      $rowcount=$user_purchases->rowCount(PDO::FETCH_ASSOC);*/
	  
	  
	  
	 $rowcount = rowsreturn("select * from seller_invoices where seller_id = '".$_SESSION['user_session']."' and  	invoice_status='0' and  MONTH(created_date) = MONTH(CURRENT_DATE())");

      

	  

	 if($rowcount>0 and date('d')>25 and $_SESSION['member_type']!='2')
	 
	 echo '<script>alert(\'you cant make offers until you pay for previous\');location.href=\'view-profile.php\'</script>';			
				
  
   if($_SESSION['member_type']!='2' and $_GET['check']=='yes')
	 
	 echo '<script>alert(\'only premium user can make this offer\');location.href=\'make_offers_new.php?p=makeoffer\'</script>';			
	
  
  

  //$query = "select * from posted_offers where offer_title like '%".$_POST['txt_fname']."%'";

  

 /* $query = $db_con->prepare("select * from posted_offers where offer_id = '".@$_GET['offer_id']."' ");

  

  $query->execute();

  

 

$array = $query->fetch(PDO::FETCH_ASSOC);*/


$array = singleexecute("select * from posted_offers where offer_id = '".@$_GET['offer_id']."' ");



  

 $buyer_user_offer_id = $array['offer_posted_user'];

 

	  

  ?>    

      

      

      

      

    <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">

               

               

               <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">

   

    <?php

   
/*
    $user = $db_con->prepare("select username,user_avatar from users where user_id = '".$array['offer_posted_user']."'");

  

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

        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 paddingzero" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;"><?php echo  convert_links($array['offer_title']); ?>

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

    

	

	

/*$total_offers = $db_con->prepare("select bid_id from bids_against_offers where offer_id = '".$array['offer_id']."'");

  

$total_offers->execute();

   
$rowss=$total_offers->rowCount();*/

	


$rowss = rowsreturn("select bid_id from bids_against_offers where offer_id = '".$array['offer_id']."'");	
	
	

	

	if($rowss>0)

	

	echo $rowss.' offers';

	

	

	

	?></div>

     

     

     

  

     

     

      </div>

      

      <div class="bordersep"></div>  



    <?php

	

	



				

				

				

				

				





// show all offers against this offer





/* $query_bids = $db_con->prepare("select * from bids_against_offers where offer_id = '".@$_GET['offer_id']."'");

  

  $query_bids->execute();*/

 
 $ret = executearray("select * from bids_against_offers where offer_id = '".@$_GET['offer_id']."'"); 

 

//foreach($query_bids->fetchAll(PDO::FETCH_ASSOC) as $array)

foreach($ret as $array)

{

			

			?>

            

  <!--////////////////////////////////////////////////////////////////////////////////////////////// -->         

            

   

   

<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">

               

               

               <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">   

    <?php

   

    /*$user = $db_con->prepare("select username,user_avatar from users where user_id = '".$array['user_id']."'");

  

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

   

   <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 paddingzero" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%; margin-bottom:8px;">        

   

   

   

   

   

   

   

   <?php echo convert_links($array['offer_title']); ?>     </div>

   

   

    <?php

   

  // echo "select image_name from bids_against_offers_images where user_id = '".$array['user_id']."'and bid_id='".$array['user_id']."'";

   

   /* $userimg = $db_con->prepare("select image_name from bids_against_offers_images where user_id = '".$array['user_id']."'and bid_id='".$array['bid_id']."'");

  

  $userimg->execute();

   

   foreach($userimg->fetchAll(PDO::FETCH_ASSOC) as $rowimg)*/
   
   $ret2 = executearray("select image_name from bids_against_offers_images where user_id = '".$array['user_id']."' and bid_id='".$array['bid_id']."'");
   
   
   
   foreach($ret2 as $rowimg)
   

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

              

			 

			   

			  /*  $total_replies = $db_con->prepare("select reply_id from bid_replies where offer_id = '".$array['offer_id']."' and bid_id='".$array['bid_id']."' and user_id='".$buyer_user_offer_id."'");

		  

			 $total_replies->execute();

		   

			 $ros=$total_replies->rowCount();*/

			
			$ros=rowsreturn("select reply_id from bid_replies where offer_id = '".$array['offer_id']."' and bid_id='".$array['bid_id']."' and user_id='".$buyer_user_offer_id."'");
			

			

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

 

 

 

 

/* $stmt = $db_con->prepare("select user_id from bids_against_offers where user_id='".$_SESSION['user_session']."' and offer_id='".@$_GET['offer_id']."'");

$stmt->execute();	



$total_r = $stmt->rowCount();*/


$total_r = rowsreturn("select user_id from bids_against_offers where user_id='".$_SESSION['user_session']."' and offer_id='".@$_GET['offer_id']."'");



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

                  

            

           /* $query = $db_con->prepare("select * from bid_replies where offer_id = '".@$_GET['offer_id']."' and bid_id='".$array['bid_id']."' ");

			  

			  	$query->execute();

  

 

				foreach($query->fetchAll(PDO::FETCH_ASSOC) as $array)*/
				
				$ret3 = executearray("select * from bid_replies where offer_id = '".@$_GET['offer_id']."' and bid_id='".$array['bid_id']."' ");

	            foreach($ret3 as $array)

				{

				

			  ?>    

				  

				<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">

               

               

               <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">

			   

				<?php

			   

			   

				/*$user = $db_con->prepare("select username,user_avatar from users where user_id = '".$array['user_id']."'");

			  

				$user->execute();

			   

				$row=$user->fetch(PDO::FETCH_ASSOC);*/
				
				$row=singleexecute("select username,user_avatar from users where user_id = '".$array['user_id']."'");
				

			   

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

               

               <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 paddingzero" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;margin-bottom:10px;">        		

			   <?php echo $array['reply_text']; ?>     </div>

               

               

               <?php

           
error_reporting(0);
           

            /*$userimg = $db_con->prepare("select image_name from reply_images where user_id = '".$_SESSION['user_session']."' and reply_id='".$array['reply_id']."'");

          

          $userimg->execute();

           

		   

		   

           foreach($userimg->fetchAll(PDO::FETCH_ASSOC) as $rowimg)*/
		   
		   $retg = executearray("select image_name from reply_images where user_id = '".$_SESSION['user_session']."' and reply_id='".$array['reply_id']."'");
		   
		   
		   foreach($retg as $rowimg)

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

       
       
       <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" id="form-content2" style="color:#7e7e7e;  font-family:Tahoma, Geneva, sans-serif; font-size:14px; margin-top:15px; margin-bottom:10px;padding-left: 0px;padding-right: 0px;"></div> 

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

		showpopup();

		e.preventDefault(); // Prevent Default Submission

		

		$.ajax({

			url: 'search_new_make.php',

			type: 'POST',

			data: $(this).serialize() // it will serialize the form data

		})

		.done(function(data){

		
				
				if(data=='no record found!')
				
				$("#empty_search").val('empty');
				
				
				else
				
				{
				
				
				st = data.split('#@#');
				
				
				$('#form-content2').fadeIn('slow').html(st[0]);

				//alert(st[1])
				
				$("#total_results").val(st[1]);
				
				
				$('#savesrach').html('add to my searches <button type="button" onclick="savesearch()" class="btn btn-primary" id="save_srch">save search</button>')

                
				}
			 
			 
		
				
				
				
				
				
				
				
				
				
				


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

		

	

	});

	

});



function savesearch()

{

	$("#save_srch").prop('disabled',true);
	
	var keyword = $("#lname").val();
	
	var subcat = $("#sub_cat").val();
	
	var empty_search = $("#empty_search").val();
	
	var total_results = $("#total_results").val();
	
	 data = 'option=savesearch&keyword='+keyword+'&subcat='+subcat+'&empty_search='+empty_search+'&total_results='+total_results+'&search_type=make';

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){

	    //  alert(sv)
		  
		

		}})	
	
}	



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



function makeoffer(offer_posted_user,offer_id,logged_in_user,tag,offerdivid)



{
	var paypal_email = '<?php echo $_SESSION['paypal_email']; ?>';
	
	if(paypal_email=='0' || paypal_email=='')
	
	{
	
		alert('please enter paypal email id before you can make offer so buyer can pay you')
		
		window.location='view-profile.php';
		
		
	}
	
	
	
	
/*	else if(tag=='#rentsomething' || tag=='#needsomethingdone')
    {
	   
	   var premium=<?php //echo $_SESSION['member_type'] ?>;
	   
	   if(premium=='2')
	   
	   showoffers(offer_id,offerdivid);
	   
	  // window.location='make_offers_new.php?p=makeoffer&offer_id='+offer_id+'&offer_posted_user='+offer_posted_user+'&check=yes';
	   
	   else
	   
	   $('#myModal3').modal('show')
	   
		
	} */
	 

	else
	
	showoffers(offer_id,offerdivid);
	
	//window.location='make_offers_new.php?p=makeoffer&offer_id='+offer_id+'&offer_posted_user='+offer_posted_user;
	

	}


function moreinfo(offer_posted_user,offer_id,logged_in_user,tag,offerdivid)



{
	
	
	/*if(tag=='#rentsomething' || tag=='#needsomethingdone')
    {
	   
	   var premium=<?php //echo $_SESSION['member_type'] ?>;
	   
	   if(premium=='2')
	   
	   showoffers(offer_id,offerdivid);
	   
	   else
	   
	   $('#myModal3').modal('show')
	   
		
	} 
	 

	else*/
	
	showinfo(offer_id,offerdivid);
	

	}



function showinfo(offer_id,offerdivid)
{
		
		
		data = 'option=viewoffersinfo&offer_id='+offer_id+'&offerdivid='+offerdivid;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){

		if(sv=='no data')
		
		{alert('no offers!')}
		
		else
		
		{
		
		$('#'+offerdivid).append('<div id="additional'+offer_id+'"></div>');
		
		
		$('#additional'+offer_id).html(sv);
		
		
		$('#additional'+offer_id).animate({ width: "100%" }, 1000 );
		
		}

		}})
		
		
		
		
	
}



function showoffers(offer_id,offerdivid)
{
		
		
		data = 'option=viewoffers2&offer_id='+offer_id+'&offerdivid='+offerdivid;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){

		if(sv=='no data')
		
		{alert('no offers!')}
		
		else
		
		{
		
		$('#'+offerdivid).append('<div id="additional'+offer_id+'"></div>');
		
		
		$('#additional'+offer_id).html(sv);
		
		
		$('#additional'+offer_id).animate({ width: "100%" }, 1000 );
		
		}

		}})
		
		
		
		
	
}


function loadlastoffer(id,divid)
{

	   // alert(id)
		
		//alert(divid)
		
	    data = 'option=getlastoffer2&offer_id='+id;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){
		
		//alert(sv)
		
		$("#"+divid).after(sv);
		
		
		$('#mainoffer_'+id).animate({ width: "100%" }, 1000 );
		


		}})
		
	
}

function loadlastofferempty(id,divid)
{

	   // alert(id)
		
		//alert(divid)
		
	    data = 'option=getlastoffer2&offer_id='+id;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){
		
		//alert(sv)
		
		$("#"+divid).before(sv);
		
		
		$('#mainoffer_'+id).animate({ width: "100%" }, 1000 );
		


		}})
		
	
}


function loadlastoffer00(id,divid)
{

	   // alert(id)
		
		//alert(divid)
		
	    data = 'option=getlastoffer2&offer_id='+id;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){
		
		//alert(sv)
		
		$("#mainsub_"+divid).after(sv);
		
		
		$('#mainsub_'+id).animate({ width: "100%" }, 1000 );
		
       $('#myModal_'+divid).modal('hide')
	   
	   
	   $("#makedisable__"+divid).html('<span style="color:#ccc;">offer updated</span>')
		
		
		 $("#user__"+divid).css('color','#ccc');
		 
		 $("#title__"+divid).css('color','#ccc');
		 
		 $("#datetime__"+divid).css('color','#ccc');
		 
		 $("#datetime2__"+divid).css('color','#ccc');
		
		}})
		
	
}



function loadlastoffer001(id,divid)
{

	   // alert(id)
		
		//alert(divid)
		
	    data = 'option=getlastoffer2&offer_id='+id;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){
		
		//alert(sv)
		
		$("#mainoffer_"+divid).after(sv);
		
		
		$('#mainoffer_'+id).animate({ width: "100%" }, 1000 );
		
       $('#myModal_'+divid).modal('hide')
	   
	   
	   $("#makedisable__"+divid).html('<span style="color:#ccc;">offer updated</span>')
		
		
		 $("#user__"+divid).css('color','#ccc');
		 
		 $("#title__"+divid).css('color','#ccc');
		 
		 $("#datetime__"+divid).css('color','#ccc');
		 
		 $("#datetime2__"+divid).css('color','#ccc');
		 
		
		}})
		
	
}






function showbidreplies(offerid,userid,bidid,btn)

{
        //$('#'+btn).prop('disabled',true);
		
		$('#mainsub_'+bidid).append('<div id="additional0_'+bidid+'"></div>');
	
		data = 'option=viewcomments&offer_id='+offerid+'&userid='+userid+'&bidid='+bidid+'&page=2';

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){

		$('#additional0_'+bidid).html(sv);
		
		$('#additional0_'+bidid).animate({ width: "100%" }, 3000 );

		//$('#bids_'+bidid).after(sv);

		}})
	
		
	
}




</script>



<script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>