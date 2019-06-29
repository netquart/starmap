<?php include("top_header.php");



//error_reporting('E_ERROR');

require_once("class2.php");

$obj = new happenning;

/*$stmt = $db_con->prepare("SELECT * FROM users WHERE user_id=:uid");

$stmt->execute(array(":uid"=>$_SESSION['user_session']));

$row=$stmt->fetch(PDO::FETCH_ASSOC);
*/

$stmt = mysqli_query($conn,"SELECT * FROM users WHERE user_id='".$_SESSION['user_session']."'");	

$row=mysqli_fetch_array($stmt);



$_SESSION['member_type'] = $row['member_type'];



if($_GET['change_status']=='cancel')

{

 $res = change_subscription_status($row['subsc_id'], 'Cancel' );

//print_r($res);


            $queryup = "update users set member_type='0' where user_id =  '".$_SESSION['user_session']."'";
			 
			//$stmt = $db_con->prepare($queryup);
			
			//$stmt->execute();
			
			
			 mysqli_query($conn,$queryup);	
			
			$_SESSION['member_type']=0;

//header("Location:view-profile.php");



}

else if($_GET['change_status']=='cancel')

change_subscription_status($row['subsc_id'], 'Suspend' );


else if($_GET['change_status']=='cancel')

change_subscription_status($row['subsc_id'], 'Reactivate' );












if(@$_POST['payment_status']=='Completed' and @$_GET['pay']==false)



{

	

	

	

	 $q2= "update `user_payments` set payment_status='".$_POST['payment_status']."' , txnid='".$_POST['txn_id']."',createdtime ='".$_POST['payment_date']."',address='".$_POST['address_street'].' '.$_POST['address_city'].''.$_POST['address_country_code']."',payer_id='".$_POST['payer_id']."' , payer_email='".$_POST['payer_email']."'  where  user_id ='".$_SESSION['user_session']."' and item_number ='".$_COOKIE['offer_id']."' and seller_id ='".$_COOKIE['seller_id']."'";

				mysqli_query($conn,$q2);	



				//$stmt = $db_con->prepare($q2);

			

					

				//$stmt->execute();

	$msg='you have successfully paid';

	

	}







if(isset($_POST['btn-save']))

	{

		

		$user_email = $_POST['user_email'];

		$user_password = $_POST['password'];

		$paypalemail = $_POST['paypal_email'];

		$zipcode = $_POST['zip_code'];

		

		

		

		

		$uploadfile=$_FILES["user_avatar"]["tmp_name"];

 

 $folder="images/avatars/".$_SESSION['user_session'];

 

 if(!is_dir($folder))

 

 mkdir($folder);

 

 
 if (($_FILES["user_avatar"]["type"] == "image/gif") || ($_FILES["user_avatar"]["type"] == "image/jpeg") || ($_FILES["user_avatar"]["type"] == "image/png") || ($_FILES["user_avatar"]["type"] == 'image/pjpeg') || ($_FILES["user_avatar"]["type"] == "image/jpg"))

 

 move_uploaded_file($_FILES["user_avatar"]["tmp_name"], "$folder/".$_FILES["user_avatar"]["name"]);

 

 

 

 if($_FILES['user_avatar']['type'] == 'image/png' )

 

 $ext = '.png';

 

 if( $_FILES['user_avatar']['type'] == 'image/jpeg' )

 

  $ext = '.jpeg';

 

 if($_FILES['user_avatar']['type'] == 'image/gif')

 

  $ext = '.gif';

 

 if($_FILES['user_avatar']['type'] == 'image/jpg')

 

  $ext = '.jpg';

 			if($_FILES['user_avatar']['type'] == 'image/pjpeg')
 
            $ext = '.pjpeg'; 


 

 

 $new_name = md5(time()).$ext;

 

 rename("$folder/".$_FILES["user_avatar"]["name"],"$folder/".$new_name);

 

  $new_name = "$folder/".$new_name;

$url = $new_name;

        			$filename = compress_image($new_name, $new_name, 80);
		

		if($_POST['password']!='')
		

		$password = md5($user_password);
		

		//try

		//{	


			if($_POST['password']!='')

				

			$stmt = "update users set email_id='".$user_email."' ,pass='".$password."' ,user_avatar='".$new_name."' ,paypal_email='".$paypalemail."' ,zip_code='".$zipcode."' where user_id='".$_SESSION['user_session']."' ";

			

			else

			

			$stmt = "update users set email_id='".$user_email."' ,user_avatar='".$new_name."' ,paypal_email='".$paypalemail."' ,zip_code='".$zipcode."' where user_id='".$_SESSION['user_session']."' ";

			

			

					

				//if($stmt->execute())
				
				if(mysqli_query($conn,$stmt))

				{

					echo "updated";

				}

				else

				{

					echo "Query could not execute !";

				}
				

		//}

		//catch(PDOException $e){

		//	echo $e->getMessage();

		//}

	}





/// check user offers are purchased or not 

      

	  $sql = "select * from seller_invoices where seller_id = '".$_SESSION['user_session']."' and  	invoice_status='0' and  MONTH(created_date) = MONTH(CURRENT_DATE())";

	  



     // $user_purchases = $db_con->prepare($sql);

  

     // $user_purchases->execute();

   

    //  $rowcount=$user_purchases->rowCount(PDO::FETCH_ASSOC);

     $user_purchases = mysqli_query($conn,$sql);	

     $rowcount = mysqli_num_rows($user_purchases);

	  

	 if($rowcount>0)

	 

	 {

		/// calculate fees for current month by 11.9% of sales 

	    

		$total_amount = 0;

		$inv = '';

		//foreach($user_purchases->fetchAll(PDO::FETCH_ASSOC) as $array)
        
		while($array = mysqli_fetch_array($user_purchases))
		
		{
		
		$total_amount +=$array['invoice_amount']; 
        
		$inv[]  = $array['invoice_id'];
		
		}
		
		if($_SESSION['member_type']==0)
		
		$percentcharge = 11.9;
		
		elseif($_SESSION['member_type']==1)
		
		$percentcharge = 5.9;

		
		
		 $calcpercentage = $total_amount*$percentcharge/100;

		 
		 $_SESSION['invoices'] = implode(',',$inv);

	}






 ?>

  
 
    

<div class="body-container">













<div class="container custombg">

        

        

        <div class="col-lg-12 col-md-12 custom_padding">

        

        <?php include("left_nav.php"); ?>

        

        

        <!--main content starts-->

        

        

        <div class="col-lg-8 col-sm-12 col-xs-12 col-md-12 paddingset">

        

        <!--border div starts here -->

        <div class="col-lg-12 showthis" style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:20px; margin-bottom:12px;">
     
      <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4 topmenus" id="whatshappening" onclick="location.href='view-profile.php'">general</div>
     
     <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4 topmenusselected" id="whatfolkswant" onclick="location.href='notifications.php'">notifications</div>
     
           <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4 topmenus" onclick="location.href='transactions.php'">transactions</div>

     
    
    </div>
    
    
     <!-- <div class="col-lg-10 showthis2" style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:20px; margin-bottom:12px; float:right;">
       
  
  <div class="btn-group btn-input clearfix">
                 <button type="button" class="btn btn-default dropdown-toggle form-control" data-toggle="dropdown">
                   <span data-bind="label">notifications</span>&nbsp;<span class="caret"></span>
                 </button>
                 <ul class="dropdown-menu" role="menu" id="mm">
                   <li><a id="whathappen" href="view-profile.php">general</a></li>
                   <li><a id="whatfolkswant" href="notifications.php">notifications</a></li>
                   <li><a id="folksoffers" href="transactions.php">transactions</a></li>
                 </ul>
               </div>
  
  
        </div>     -->
    
    
    
    
    
    
    

  <script type="text/javascript" src="fg.menu3.js"></script>
 
 
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
		
		$('#hierarchy2').menu({
			content: $('#hierarchy2').next().html(),
			crumbDefaultText: ' '
		});
		
		
    });
	
	</script>      

        <div class="borderouter">

       

       <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin-top:15px;">
		
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin-top:15px;font-size:16px;">
        
          <span style="color:#F00;">get notified</span> about what you want and what others want, too.
        
        </div>
      
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin-top:15px;font-size:16px;">my notifications for 
            
         <button type="button" class="btn btn-primary buttonred" id="buydiv" data-dismiss="modal" onclick="showbuy('buying_panel')">buying</button> 
              
         and <button type="button" class="btn btn-primary" id="selldiv" data-dismiss="modal" onclick="showbuy('selling_panel')">selling</button>
              
        </div>
       

        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin-top:15px;font-size:16px;">
        
         <div class="form-group">

          <form class="form-signin" method="post" id="register-form2" style="padding: 0px 0px 0px;" name="register" enctype="multipart/form-data">

           <div id="buying_panel" style="display:block;">
        
        <input type="hidden" id="sub_cat" name="sub_cat" value="">
        
        <input type="hidden" id="selectedfield1" name="selectedfield1" value="">
        <input type="hidden" id="selectedfield2" name="selectedfield2" value="">
        
         <input type="hidden" id="buysell" name="buysell" value="">
        
          <div class="form-group">

            <input type="text" class="form-control" style="width:100%; float:left; height:36px;" placeholder="add keywords separated by commas"  value="" name="keywords" id="keywords_buying" />

        </div>
        
        <div class="form-group">
          
             <a onclick="callfuncs(1)"  tabindex="0" href="#news-items-2" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="hierarchy">select a category<div style="display:inline-block;margin-left:12px;" align="right">
         
         <span class="glyphicon glyphicon-chevron-down" style="color:#333333;">
         
         </span>
        
        </div></a>
<div id="news-items-2" class="hidden">

 <ul>
	  
       <li>
       
        <a href="1">buy something</a>
		
         <ul>
			
           <?php
           
		  $obj->buysomething();
		   
		   
		   ?>
		
        	
		
        </ul>
	  
       </li>
    
       <li>
       
        <a href="23">need something done</a>
    
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


</div>
          
          
           

              
<button type="button" style="float:left; margin-left:10px;" class="btn btn-primary buttongreen" onclick="addkeywordbuy()">add</button>

        </div>
        
        
         <div class="form-group">
          
          <div  style="width:100%; float:left; min-height:150px; border-radius:5px;margin-bottom: 10px;border: 2px solid #ccc;
background-color: #f3f3f3;font-family: Myriad Pro;color: #7e7e7e;font-size: 14px;font-weight: bold; padding:10px; " id="user_keywords_buying" >


        
        
          <?php
         
		 
		// $query_plus = $db_con->prepare("select * from user_keywords where uid = '".$_SESSION['user_session']."' and  buy_get  ='buy' ");
			  
		 //$query_plus->execute();
			  
			 
			//foreach($query_plus->fetchAll(PDO::FETCH_ASSOC) as $array)
			
			
			$query_plus = "select * from user_keywords where uid = '".$_SESSION['user_session']."' and  buy_get  ='buy' ";
			  
		// $query_plus->execute();
		 
		 $res = mysqli_query($conn,$query_plus);
			  
			 
			//foreach($query_plus->fetchAll(PDO::FETCH_ASSOC) as $array)
			
			while($array  = mysqli_fetch_array($res))
			
			
			
			
			
			
			
			
			{
		 
		      
			  $rand = mt_rand(2000,10000);
		 
		 
		 echo '<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="border-bottom:solid 1px #ccc; margin-bottom:10px;" id="kywrdbuy_'.$rand.'"><div class="col-lg-7 col-sm-7 col-md-7 col-xs-7" id="kywrds_'.$rand.'">'.$array['keyword'].'</div><div class="col-lg-5 col-sm-5 col-md-5 col-xs-5" style="float:right;text-align:right;"><button type="button" style=" margin-left:10px;" class="btn btn-primary buttonred" data-toggle="modal" data-target="#myModal_'.$array['keyword_id'].'">edit</button>&nbsp;<button type="button" style=" margin-left:10px;" class="btn btn-primary" onclick="deletenow(\'kywrdbuy_'.$rand.'\','.$array['keyword_id'].')">delete</button></div>
		 
		 
		 
		 
		 <div class="modal fade" id="myModal_'.$array['keyword_id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
         <div style="margin-top:15px;"><div class="form-group"><input class="form-control" type="text" name="zip" id="keywordss_'.$array['keyword_id'].'" value="'.$array['keyword'].'" ></div></div>
      </div>
      <div class="modal-footer">
        
       <button type="button" class="btn btn-primary buttongreen" data-dismiss="modal" onclick="updateval(\'keywordss_'.$array['keyword_id'].'\',\'kywrds_'.$rand.'\','.$array['keyword_id'].')">update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
      </div>
    </div>
  </div>
</div>
		 
		 
		 
		 
		 
		 </div>';
		 
		 
			}
		 
		 ?>

          </div>


         </div>
          
        
      </div>
      
      
       <div id="selling_panel" style="display:none;">
        
        
         <div class="form-group">

            <input type="text" class="form-control" style="width:100%; float:left; height:36px;" placeholder="add keywords separated by commas"  value="" name="keywords" id="keywords_selling" />

        </div>
        
        
        
        
           <div class="form-group">
          
             <a onclick="callfuncs(2)"  tabindex="0" href="#news-items-2" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="hierarchy2">what best describes what you want?  <div style="display:inline-block;margin-left:12px;" align="right">
         
         <span class="glyphicon glyphicon-chevron-down" style="color:#333333;">
         
         </span>
        
        </div></a>
<div id="news-items-2" class="hidden">


 
 <ul>
	  
       <li>
       
        <a href="1">buy something</a>
		
         <ul>
			
           <?php
           
		  $obj->buysomething();
		   
		   
		   ?>
		
        	
		
        </ul>
	  
       </li>
    
       <li>
       
        <a href="23">need something done</a>
    
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


</div>
          
          
           

              
<button type="button" style="float:left; margin-left:10px;" class="btn btn-primary buttongreen" onclick="addkeywordsell()">add</button>

        </div>
        
        
         <div class="form-group">
         <div  style="width:100%; float:left; min-height:150px; border-radius:5px;margin-bottom: 10px;border: 2px solid #ccc;background-color: #f3f3f3;font-family: Myriad Pro;color: #7e7e7e;font-size: 14px;font-weight: bold; padding:10px; " id="user_keywords_selling">
         
         
         <?php
         
		/* 
		 $query_plus = $db_con->prepare("select * from user_keywords where uid = '".$_SESSION['user_session']."' and  buy_get  ='sell' ");
			  
		 $query_plus->execute();
			  
			 
			foreach($query_plus->fetchAll(PDO::FETCH_ASSOC) as $array)*/
			
			
			
			
			$query_plus = "select * from user_keywords where uid = '".$_SESSION['user_session']."' and  buy_get  ='sell' ";
			  
		// $query_plus->execute();
		 
		 $res = mysqli_query($conn,$query_plus);
			  
			 
			//foreach($query_plus->fetchAll(PDO::FETCH_ASSOC) as $array)
			
			while($array  = mysqli_fetch_array($res))
			
			
			
			
			
			{
		 
		      
			  $rand = mt_rand(2000,10000);
		 
		 
		 echo '<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="border-bottom:solid 1px #ccc; margin-bottom:10px;" id="kywrdsell_'.$rand.'"><div class="col-lg-7 col-sm-7 col-md-7 col-xs-7" id="kywrds_'.$rand.'">'.$array['keyword'].'</div><div class="col-lg-5 col-sm-5 col-md-5 col-xs-5" style="float:right;text-align:right;"><button type="button" style=" margin-left:10px;" class="btn btn-primary buttonred" data-toggle="modal" data-target="#myModal_'.$array['keyword_id'].'">edit</button>&nbsp;<button type="button" style=" margin-left:10px;" class="btn btn-primary" onclick="deletenow(\'kywrdsell_'.$rand.'\','.$array['keyword_id'].')">delete</button></div>
		 
		 
		 
		 
		 
		<div class="modal fade" id="myModal_'.$array['keyword_id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
         <div style="margin-top:15px;"><div class="form-group"><input class="form-control" type="text" name="zip" id="keywordss_'.$array['keyword_id'].'" value="'.$array['keyword'].'" ></div></div>
      </div>
      <div class="modal-footer">
        
       <button type="button" class="btn btn-primary buttongreen" data-dismiss="modal" onclick="updateval(\'keywordss_'.$array['keyword_id'].'\',\'kywrds_'.$rand.'\','.$array['keyword_id'].')">update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
      </div>
    </div>
  </div>
</div>
		 
		 
		 
		 
		 
		 </div>';
		 
		 
			}
		 
		 ?>
         
         
         
         </div>
         
         </div>
          
          
          
        
      </div>





       

       <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin-top:15px;font-size:16px;">
       
       get alerts on the go!     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="alerts_email" id="alerts_email"  type="checkbox" value="emails" <?php if($row['alerts_email']==1) echo 'checked'; ?> /> email me &nbsp;&nbsp; <input name="alerts_sms" id="alerts_sms" <?php if($row['alerts_sms']==1) echo 'checked'; ?> type="checkbox" style=" border-radius:3px;margin-bottom: 10px;border: 2px solid #ccc;background-color: #f3f3f3;" value="sms" /> text me
       
       </div>



      <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin-top:15px;font-size:16px;">
      
       <div class="form-group">

            <input type="text" class="form-control" style="width:39%; float:left; height:36px;" placeholder="cell phone number"  value="<?php echo $row['cellphone'] ?>" name="cellphone" id="cellphone" /><input type="text" class="form-control" style="margin-left:10px;width:39%; float:left; height:36px;" placeholder="select mobile provider"  value="<?php echo $row['mobile_provider'] ?>" name="mobile_provider" id="mobile_provider" />&nbsp;<button type="button" style="float:left; margin-left:10px;" class="btn btn-primary buttongreen" onclick="update_info(<?php echo $_SESSION['user_session'] ?>);">update</button>

        </div>
      
      
      
      </div>


  </form>

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





<script>



$(document).ready(function(e) {

    

	

	$('#paynow').click(function(){

		
<?php if(date('d')<25) echo 'alert(\'your invoice isn’t due until the 25th of the month\')'; else echo 'if(confirm(\'you are going to pay are you confirm?\'))

document.paypal_form.submit();
else
return false;'; ?>
		

		

		

		});

	
	
	$('#btn-cancel').click(function(){

		

		

		if(confirm('you are sure you want to cancel subscription?'))

		

		location.href='view-profile.php?change_status=cancel';

		

		else

		

		return false;

		

		});
		
		
		
/*if(screen.width<870)
{

var padd = $(".padlft").attr('padding-left').valueOf();

$(".padlft").attr('padding-left',	
	
	
}	
*/
	

});


function update_info(id)

{      
      var 	alerts_email =0;
	  
	   var 	alerts_sms = 0;

	   
	   if($("#alerts_email").prop('checked'))
	   
	   
	    	alerts_email = 1;
	   
		
		if($("#alerts_sms").prop('checked'))
	   
	    	alerts_sms = 1;
		
		var cellphone = $("#cellphone").val();
		
		var mobile_provider= $("#mobile_provider").val();
		
		
		
		
		
		data = 'option=update_user_details&id='+id+'&alerts_email='+alerts_email+'&alerts_sms='+alerts_sms+'&cellphone='+cellphone;

	    $.ajax({url:"ajax.php",type:'GET',data:data,success: function(sv){

		
		alert('details updated successfully!');
		


		}})
			
	
}

function updateval(value,divid,id)

{
	
	
		var keyword = $("#"+value).val();
		
		
		data = 'option=update_keywords&id='+id+'&keyword='+keyword;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){


		
		$("#"+divid).text(keyword);
		
		$('#myModal_'+id).modal('hide')
		

		}})
	
}



function addkeywordbuy()

{
  var oldval=  $("#keywords_buying").val();
  
  
  var idis = Math.floor((Math.random()*10000) + 1);
	
	
	
	
	
	    var uid = <?php echo $_SESSION['user_session'] ?>;
		
		var keyword= $("#keywords_buying").val();
		
		var offer_id_plus_category= $("#sub_cat").val();
		
		var buy_get = 'buy';
		
		
		
	data = 'option=addkeywords&uid='+uid+'&keyword='+keyword+'&offer_id_plus_category='+offer_id_plus_category+'&buy_get='+buy_get;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){


		
		/*$("#user_keywords_buying").append('<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="border-bottom:solid 1px #ccc; margin-bottom:10px;" id="kywrdbuy_'+idis+'"><div class="col-lg-7 col-sm-7 col-md-7 col-xs-7">'+oldval+'</div><div class="col-lg-5 col-sm-5 col-md-5 col-xs-5" style="float:right; text-align:right;"><button type="button" style="margin-left:10px;" class="btn btn-primary buttonred" onclick="addkeywordbuy(onclick="editbutton(\'kywrdbuy_'+idis+'\')")">edit</button>&nbsp;<button type="button" style=" margin-left:10px;" class="btn btn-primary" onclick="deletenow(\'kywrdbuy_'+idis+'\','+sv+')">delete</button></div></div>');*/
	
		
		
		
$("#user_keywords_buying").append('<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="border-bottom:solid 1px #ccc; margin-bottom:10px;" id="kywrdbuy_'+idis+'"><div class="col-lg-7 col-sm-7 col-md-7 col-xs-7" id="kywrds_'+idis+'">'+oldval+'</div><div class="col-lg-5 col-sm-5 col-md-5 col-xs-5" style="float:right;text-align:right;"><button type="button" style=" margin-left:10px;" class="btn btn-primary buttonred" data-toggle="modal" data-target="#myModal_'+sv+'">edit</button>&nbsp;<button type="button" style=" margin-left:10px;" class="btn btn-primary" onclick="deletenow(\'kywrdbuy_'+idis+'\','+sv+')">delete</button></div><div class="modal fade" id="myModal_'+sv+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-body"><div style="margin-top:15px;"><div class="form-group"><input class="form-control" type="text" name="zip" id="keywordss_'+sv+'" value="'+oldval+'" ></div></div></div><div class="modal-footer"><button type="button" class="btn btn-primary buttongreen" data-dismiss="modal" onclick="updateval(\'keywordss_'+sv+'\',\'kywrds_'+idis+'\','+sv+')">update</button><button type="button" class="btn btn-default" data-dismiss="modal">cancel</button></div></div></div></div></div>');


		}})
	
	
	
	
	
	
}


function addkeywordsell()

{
    
	
 var oldval=  $("#keywords_selling").val();
 
  var idis = Math.floor((Math.random()*10000) + 1);
	
	
	
	
	
	
	
	 var uid = <?php echo $_SESSION['user_session'] ?>;
		
		var keyword= $("#keywords_selling").val();
		
		var offer_id_plus_category= $("#sub_cat").val();
		
		var buy_get = 'sell';
		
		
		
		data = 'option=addkeywords&uid='+uid+'&keyword='+keyword+'&offer_id_plus_category='+offer_id_plus_category+'&buy_get='+buy_get;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){

		
		/*$("#user_keywords_selling").append('<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="border-bottom:solid 1px #ccc; margin-bottom:10px;" id="kywrdsell_'+idis+'"><div class="col-lg-7 col-sm-7 col-md-7 col-xs-7">'+oldval+'</div><div class="col-lg-5 col-sm-5 col-md-5 col-xs-5" style="float:right;text-align:right;"><button type="button" style=" margin-left:10px;" class="btn btn-primary buttonred" onclick="editbutton(\'kywrdsell_'+idis+'\')">edit</button>&nbsp;<button type="button" style=" margin-left:10px;" class="btn btn-primary" onclick="deletenow(\'kywrdsell_'+idis+'\','+sv+')">delete</button></div></div>');*/
		
		
$("#user_keywords_selling").append('<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="border-bottom:solid 1px #ccc; margin-bottom:10px;" id="kywrdsell_'+idis+'"><div class="col-lg-7 col-sm-7 col-md-7 col-xs-7" id="kywrds_'+idis+'">'+oldval+'</div><div class="col-lg-5 col-sm-5 col-md-5 col-xs-5" style="float:right;text-align:right;"><button type="button" style=" margin-left:10px;" class="btn btn-primary buttonred" data-toggle="modal" data-target="#myModal_'+sv+'">edit</button>&nbsp;<button type="button" style=" margin-left:10px;" class="btn btn-primary" onclick="deletenow(\'kywrdsell_'+idis+'\','+sv+')">delete</button></div><div class="modal fade" id="myModal_'+sv+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-body"><div style="margin-top:15px;"><div class="form-group"><input class="form-control" type="text" name="zip" id="keywordss_'+sv+'" value="'+oldval+'" ></div></div></div><div class="modal-footer"><button type="button" class="btn btn-primary buttongreen" data-dismiss="modal" onclick="updateval(\'keywordss_'+sv+'\',\'kywrds_'+idis+'\','+sv+')">update</button><button type="button" class="btn btn-default" data-dismiss="modal">cancel</button></div></div></div></div></div>');

		}})
	
	
	
	
	
	
	
	
}

function deletenow(id,keywordid)

{
	
	if(confirm('are you confirm to delete?'))
	
	{
	
	$('#'+id).fadeOut(1000, function(){ $(this).remove();});
	   
	   
	   data = 'option=deletekeyword&id='+keywordid;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){

	
		

		}})
	
	}
	
}


function showbuy(div)

{

if(div=='buying_panel')

{
$("#"+div).css('display','block')	

$("#selling_panel").css('display','none')	

$("#buydiv").addClass('buttonred')

$("#selldiv").removeClass('buttonred')

$("#buysell").val('buy')

}
else if(div=='selling_panel')

{
$("#"+div).css('display','block')	

$("#buying_panel").css('display','none')

$("#selldiv").addClass('buttonred')

$("#buydiv").removeClass('buttonred')

$("#buysell").val('sell')
	
}


}


function callfuncs(val)

{

if(val==1)
{
document.getElementById('selectedfield1').value=1;
document.getElementById('selectedfield2').value='';
}

if(val==2)
{
document.getElementById('selectedfield1').value='';
document.getElementById('selectedfield2').value=1;
}


}


</script>







<script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>