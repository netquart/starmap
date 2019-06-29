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


<style>

.modal-body{ width:100%; float:left;}

</style>



<div class="container custombg">

        

        

        <div class="col-lg-12 col-md-12 custom_padding paddingset">

        

        <?php include("left_nav.php"); ?>

        

        <div class="col-lg-8 ">

    

         
<div class="col-lg-12 showthis" style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:20px; margin-bottom:12px;">
     
     <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4 topmenus" style="cursor:pointer;" onclick="location.href='make_offers_new.php?p=makeoffer'" >make offers</div>
     
     <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4 topmenusselected" style="cursor:pointer;" onclick="location.href='offersmake_new.php'">offers i've made</div>
     
     
       <!--<div class="col-lg-4 col-xs-4 col-sm-4 col-md-4 topmenus" style="cursor:pointer;" onclick="location.href='mysearches2.php'">my searches</div>-->
     
    
    </div>
         

  
         
<?php
          
  
  
$q = mysqli_query($conn,"select offer_id from bids_against_offers where user_id ='".$_SESSION['user_session']."' group by offer_id ");
  
  $countg=0; 
  
  
 while($array2=mysqli_fetch_array($q))
  
 
  {
	  
	  $countg++;
	 
	 $q2 =  mysqli_query($conn,"select * from posted_offers where offer_id ='".$array2['offer_id']."'  ");
	  
	 $array = mysqli_fetch_array($q2);

      
     $stt .=  '<div class="borderouter" id="make_offer_'.$array['offer_id'].'"><div  class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;"><div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">'.$obj->getuser00($array['offer_posted_user']).'</div><div class="col-lg-7 col-xs-8 col-sm-8 col-md-8 pdright">
	 
	 
	 <div style="float:left;  padding-right:0px;" class="paddingleftset">

            <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:14px;color:#0e1131; font-weight:bold;">

        '.$obj->GetUserName($array['offer_posted_user']).'
           </div>

           

          </div>
	 
	
	 </div>
	
	
	<div class="col-lg-3 col-xs-3 col-sm-2 col-md-3 pddgsett" style=" text-align:right;">
          <div style="float:right;font-family:Arial, Helvetica, sans-serif; " class="font_sett01"><span style="color:#0e1131;font-weight:bold;">'.$array['offer_price'].'</span> <span style="color:#7e7e7e;">| '.datediff2($array['offer_posted_date']).' </span>
          
         </div>

      </div>
	 
	
	
	</div>
	 
	 
	 
	  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom:10px; padding-right:0px;">
               <div class="col-lg-2 col-xs-1 col-sm-2 col-md-2 smallset">
                     </div>
           <div class="col-lg-10 col-xs-11 col-sm-10 col-md-10 " style="margin-top: -49px;">
               
               <div style="float:left;  padding-right:0px;" class="paddingleftset">
                <div   style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:13px;color:#0e1131; font-weight:normal; width:100%;padding-left: 0px;">'.str_replace($_POST['txt_fname'],'<span style="color:red;">'.$_POST['txt_fname'].'</span>',$array['offer_title']).'  
</div>
        

        
     '.$obj->getofferimages00($array['offer_id'],$array['offer_posted_user']).'

          

   

           </div> 
           
           </div></div>
        
	 
	 
	 
	 
	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" id="'.$array['offer_id'].'"><div style="font-family: Arial,Helvetica,sans-serif; font-size: 16px; color: rgb(255, 0, 0); font-weight: bold; padding-left: 0px;" class="col-lg-5 col-xs-5 col-sm-5 col-md-5">';
	 
	 $tags = $obj->hashtags2($array['offer_id'],$array['offer_title']);
	 
	 
	$stt .= $tags.'</div><div style="font-family: Arial,Helvetica,sans-serif; font-size: 13px;  padding-left: 0px;" class="col-lg-3 col-xs-3 col-sm-3 col-md-3">'.$obj->bidscount($array['offer_id']).'</div><div  class="col-lg-4 col-xs-4 col-sm-4 col-md-4" style="padding-right: 0px; font-weight: bold; color: red; text-align: right;padding-left:0px;"><button style="font-family:Arial, Helvetica, sans-serif; font-size:14px;" type="button" class="btn btn-sm btn-primary buttonred"  onclick="makeoffer('.$array['offer_posted_user'].','.$array['offer_id'].','.$_SESSION['user_session'].',\''.$tags.'\',\'make_offer_'.$array['offer_id'].'\');">more info</button></div></div></div>';

   
	
  }
  
  echo $stt;	
  
 
 
 	  if($countg==0)
	  
	  echo '<div style="float:none;color:#333; padding:25px 10px 10px 5px;text-align:center;clear:both;">you haven\'t made any offers yet</div>';

  
  ?>  

		

	

       
       
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

			url: 'search_new.php',

			type: 'POST',

			data: $(this).serialize() // it will serialize the form data

		})

		.done(function(data){

		
				$('#form-content2').fadeIn('slow').html(data);

				


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
	
	
	
	
	/*else if(tag=='#rentsomething' || tag=='#needsomethingdone')
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





function showoffers(offer_id,offerdivid)
{
        
		
		
		
		//$('#'+btn).prop('disabled',true);
		
		
		
		
		
		data = 'option=viewoffers2&offer_id='+offer_id;

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