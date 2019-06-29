<?php include("top_header.php");



error_reporting('E_ERROR');



$stmt = $db_con->prepare("SELECT * FROM users WHERE user_id=:uid");

$stmt->execute(array(":uid"=>$_SESSION['user_session']));

$row=$stmt->fetch(PDO::FETCH_ASSOC);




$_SESSION['member_type'] = $row['member_type'];



if($_GET['change_status']=='cancel')

{

 $res = change_subscription_status($row['subsc_id'], 'Cancel' );

//print_r($res);


            $queryup = "update users set member_type='0' where user_id =  '".$_SESSION['user_session']."'";
			 
			$stmt = $db_con->prepare($queryup);
			
			$stmt->execute();
			
			$_SESSION['member_type']=0;

//header("Location:view-profile.php");



}

else if($_GET['change_status']=='cancel')

change_subscription_status($row['subsc_id'], 'Suspend' );


else if($_GET['change_status']=='cancel')

change_subscription_status($row['subsc_id'], 'Reactivate' );













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

 

 

 

 move_uploaded_file($_FILES["user_avatar"]["tmp_name"], "$folder/".$_FILES["user_avatar"]["name"]);

 

 

 

 if($_FILES['user_avatar']['type'] == 'image/png' )

 

 $ext = '.png';

 

 if( $_FILES['user_avatar']['type'] == 'image/jpeg' )

 

  $ext = '.jpeg';

 

 if($_FILES['user_avatar']['type'] == 'image/gif')

 

  $ext = '.gif';

 

 if($_FILES['user_avatar']['type'] == 'image/jpg')

 

  $ext = '.jpg';

 

 

 

 $new_name = md5(time()).$ext;

 

 rename("$folder/".$_FILES["user_avatar"]["name"],"$folder/".$new_name);

 

  $new_name = "$folder/".$new_name;



		

		

		

		

		

		

		if($_POST['password']!='')

		

		

		

		$password = md5($user_password);

		

		

		

		

		try

		{	

		

			

			

			if($_POST['password']!='')

				

			$stmt = $db_con->prepare("update users set email_id='".$user_email."' ,pass='".$password."' ,user_avatar='".$new_name."' ,paypal_email='".$paypalemail."' ,zip_code='".$zipcode."' where user_id='".$_SESSION['user_session']."' ");

			

			else

			

			$stmt = $db_con->prepare("update users set email_id='".$user_email."' ,user_avatar='".$new_name."' ,paypal_email='".$paypalemail."' ,zip_code='".$zipcode."' where user_id='".$_SESSION['user_session']."' ");

			

			

					

				if($stmt->execute())

				{

					echo "updated";

				}

				else

				{

					echo "Query could not execute !";

				}

			

		

			

				

		}

		catch(PDOException $e){

			echo $e->getMessage();

		}

	}





/// check user offers are purchased or not 

      

	  $sql = "select * from seller_invoices where seller_id = '".$_SESSION['user_session']."' and  	invoice_status='0' and  MONTH(created_date) = MONTH(CURRENT_DATE())";

	  



      $user_purchases = $db_con->prepare($sql);

  

      $user_purchases->execute();

   

      $rowcount=$user_purchases->rowCount(PDO::FETCH_ASSOC);

      

	  

	 if($rowcount>0)

	 

	 {

		/// calculate fees for current month by 11.9% of sales 

	    

		$total_amount = 0;

		$inv = '';

		foreach($user_purchases->fetchAll(PDO::FETCH_ASSOC) as $array)

		
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

        <div class="col-lg-12" style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:20px; margin-bottom:12px;">
     
      <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4 topmenus" id="whatshappening" onclick="location.href='view-profile.php'">general</div>
     
     <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4 topmenusselected" id="whatfolkswant" onclick="location.href='notifications.php'">notifications</div>
     
           <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4 topmenus" onclick="location.href='mysearches.php'">transactions</div>

     
    
    </div>

        

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
        
           <div class="form-group">

            <input type="text" class="form-control" style="width:85%; float:left; height:36px;" placeholder="add keywords separated by commas"  value="" name="keywords" id="keywords_buying" /><button type="button" style="float:left; margin-left:10px;" class="btn btn-primary buttongreen" onclick="addkeywordbuy()">add</button>

        </div>
        
        
         <div class="form-group">
         <textarea name="user_keywords_buying" style="width:100%; float:left; height:150px; border-radius:10px;margin-bottom: 10px;
border: 2px solid #ccc;
background-color: #f3f3f3;
font-family: Myriad Pro;
color: #7e7e7e;
font-size: 14px;
font-weight: bold; " id="user_keywords_buying" cols="" rows="" readonly="readonly"><?php echo $row['user_keywords_buying']; ?></textarea>
         </div>
          
        
      </div>
      
      
       <div id="selling_panel" style="display:none;">
        
           <div class="form-group">

            <input type="text" class="form-control" style="width:85%; float:left; height:36px;" placeholder="add keywords separated by commas"  value="" name="keywords" id="keywords_selling" /><button type="button" style="float:left; margin-left:10px;" class="btn btn-primary buttongreen" onclick="addkeywordsell()">add</button>

        </div>
        
        
         <div class="form-group">
         <textarea name="user_keywords_selling" style="width:100%; float:left; height:150px; border-radius:10px;margin-bottom: 10px;
border: 2px solid #ccc;
background-color: #f3f3f3;
font-family: Myriad Pro;
color: #7e7e7e;
font-size: 14px;
font-weight: bold; " id="user_keywords_selling" cols="" rows="" readonly="readonly"><?php echo $row['user_keywords_selling']; ?></textarea>
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
		
		var user_keywords_selling = $("#user_keywords_selling").val();
		
		var user_keywords_buying = $("#user_keywords_buying").val();
		
		
		
		
		data = 'option=update_user_details&id='+id+'&alerts_email='+alerts_email+'&alerts_sms='+alerts_sms+'&cellphone='+cellphone+'&mobile_provider='+mobile_provider+'&user_keywords_selling='+user_keywords_selling+'&user_keywords_buying='+user_keywords_buying;

	    $.ajax({url:"ajax.php",type:'GET',data:data,success: function(sv){

		
		alert('details updated successfully!');
		


		}})
			
	
}





function addkeywordbuy()

{
    
	
	var oldval = $("#user_keywords_buying").val();
	
	
	if(oldval!='')
	
	$("#user_keywords_buying").val(oldval+','+$("#keywords_buying").val())
	
	else
	
	$("#user_keywords_buying").val($("#keywords_buying").val())
	
	
}


function addkeywordsell()

{
    
	
	var oldval = $("#user_keywords_selling").val();
	
	if(oldval!='')
	
	
	$("#user_keywords_selling").val(oldval+','+$("#keywords_selling").val())
	
	else
	
		$("#user_keywords_selling").val($("#keywords_selling").val())

	
}


function showbuy(div)

{

if(div=='buying_panel')

{
$("#"+div).css('display','block')	

$("#selling_panel").css('display','none')	

$("#buydiv").addClass('buttonred')

$("#selldiv").removeClass('buttonred')

}
else if(div=='selling_panel')

{
$("#"+div).css('display','block')	

$("#buying_panel").css('display','none')

$("#selldiv").addClass('buttonred')

$("#buydiv").removeClass('buttonred')	
}


}


</script>







<script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>