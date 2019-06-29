<?php



include('top_header.php');


require_once("class2.php");

$obj = new happenning;

//print_r($_SESSION);



?>    
  
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
        
	
	  
	   
	    data = 'option=getlastreply&reply_id='+id;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){
		
	
		
		$('#reply_'+bidid).before(sv);
		
		
		$('#reply_'+bidid).animate({ width: "100%" }, 1000 );
		


		}})
		
	
}





	
	
	
	
	
	
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
	
	
	
	
	
	
	
    </script>

<div class="body-container">
 
 <div class="container custombg">
  
  <div class="col-lg-12 col-md-12 custom_padding"><?php include("left_nav.php"); ?>
   
   
   <div class="col-lg-8 col-sm-12 col-xs-12 col-md-12 paddingset">
   
    <div class="col-lg-12 showthis" style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:20px; margin-bottom:12px;">
     
     <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4 topmenus" id="whatshappening" onclick="location.href='get-offers.php'">stuff i want</div>
     
     <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4 topmenusselected" id="whatfolkswant" onclick="location.href='search-stuff.php'">search for stuff</div><!--stuff i'm looking for-->
     
          <!-- <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4 topmenus" onclick="location.href='mysearches.php'">my searches</div>-->

     
    
    </div>
    
    
    
    
   <!-- <div class="col-lg-10 showthis2" style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:20px; margin-bottom:12px; float:right;">
       
  
  <div class="btn-group btn-input clearfix">
                 <button type="button" class="btn btn-default dropdown-toggle form-control" data-toggle="dropdown">
                   <span data-bind="label">search for stuff</span>&nbsp;<span class="caret"></span>
                 </button>
                 <ul class="dropdown-menu" role="menu" id="mm">
                   <li><a id="whathappen" href="get-offers.php">stuff i want</a></li>
                   <li><a id="whatfolkswant" href="search-stuff.php">search for stuff</a></li>
                   <li><a id="folksoffers" href="mysearches.php">my searches</a></li>
                 </ul>
               </div>
  
  
        </div>-->
    
    <div class="borderouter" id="mainouterform" style="padding-bottom:0px;">
     
     <div class="col-lg-12" style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:5px; margin-bottom:12px;padding-left:0px;"><div id="form-content" style="margin-top:0px;margin-left:0px;  margin-right:0px;">
      
      <form method="post" name="regform" id="reg-form" autocomplete="off" style="float:right;text-align:right;width:100%;">

				

				<div class="form-group">

					<input type="text" class="form-control" style="border:none; background:transparent;-webkit-box-shadow: unset;

" name="txt_fname" id="lname" placeholder="What are you looking for?" required />

				</div>

				<div id="savesrach" style="margin-bottom: 15px;text-align: left;margin-left: 10px;"></div>

				
<div class="col-lg-2 col-xs-2 col-sm-2 col-md-2 paddingzero" style="text-align:right; padding-right:0px;"></div>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
        <div style="margin-top:15px; text-align:left;">find offers in <input type="text" name="zip" id="zip" value="<?php echo $_SESSION['zipcode']; ?>" size="7"> miles of <input type="text" name="miles" id="miles" value="00000" /></div>
      </div>
      <div class="modal-footer">
        <!--onclick="showpopup()"-->
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
       
       <input type="hidden" name="user_zip" id="user_zip" value="<?php echo $_SESSION['zipcode']; ?>">
       
       <input type="hidden" name="miles_area" id="miles_area" value="">
       
       <input type="hidden" name="empty_search" id="empty_search" value="">
       
       <input type="hidden" name="total_results" id="total_results" value="">
       
      <!-- <div id="baloon" style="display:inline-block;"><img data-toggle="modal" data-target="#myModal" src="images/baloon.png" style="cursor:pointer;" /></div>-->
       
     <!--  <a style="float:none;" tabindex="0" href="#news-items-2" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="hierarchy">select a category<div style="display:inline-block;margin-left:12px;" align="right">
         
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


</div>-->
      
      <button class="btn btn-primary searchit" style="padding-left:10px;">Search</button>
       
       </div>
			

				<!--<div class="col-lg-2 col-xs-12 col-sm-2 col-md-2" style="text-align:right; padding-right:0px; float:right;margin-bottom: 5px;">

				<div class="form-group" style="float:right">

					<button class="btn btn-primary searchit">Search</button>

				</div>

				</div>-->

			</form>
   </div>

  </div> 

 </div>

         
      <?php


       //  $arrayget = $obj->selectAll('posted_offers','*',"",'order by offer_id DESC');

if($_GET['hashtag']!='')

$whereis=" posted_offers.hashtags LIKE '%".trim($_GET['hashtag'])."%' ";



	   $arrayget = $obj->selectAll2('posted_offers RIGHT JOIN bids_against_offers ON posted_offers.offer_id = bids_against_offers.offer_id','posted_offers.*, count(bids_against_offers.offer_id)',''.$whereis.'',' GROUP BY posted_offers.offer_id order by posted_offers.offer_id DESC ');
		 
	  ?>

         <!--created offers against each user -->

         <div class="ajaxget" id="form-content2" style="float:left;">
         
		 <?php

          foreach($arrayget as $array)

          {



         ?>    
		   
           <div id="main_<?php echo $array['offer_id']; ?>">
           
           <div class="borderouter" id="<?php echo $array['offer_id']; ?>">
           	
           <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">

            <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">

       <?php

         $obj->getuser($array['offer_posted_user']);


		 $obj->showjqueryfunctions($array['offer_id']);
		
       ?>

           </div>

          <div class="col-lg-7 col-xs-8 col-sm-9 col-md-8 ">

               <div style="float:left;  padding-right:0px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingleftset">

           <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;" id="title_<?php echo $array['offer_id']; ?>">

      <?php echo $obj->GetUserName($array['offer_posted_user']); ?>

        </div>

        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 paddingleftright" style="float: left; font-family: Tahoma,Geneva,sans-serif; font-size: 13px; color: rgb(14, 17, 49); width: 100%;margin-bottom:10px;" >        

	  <?php echo convert_links($array['offer_title']); ?>     

        </div>

      <?php $obj->getofferimages($array['offer_id'],$array['offer_posted_user']); ?>

        </div> 
        
      </div>

        <div class="col-lg-3 col-xs-3 col-sm-2 col-md-3 pddgsett" style=" text-align:right;">

       <div style="float:right;font-family:Arial, Helvetica, sans-serif; font-size:16px;"><span style="color:#0e1131;font-weight:bold;"><?php  echo $array['offer_price'];  ?></span> <span style="color:#7e7e7e;">| <?php echo datediff2($array['offer_posted_date']);?>
        
         </span>
         
       </div>
       
     </div>

   <!--body navigation ends-->
      </div>

	<div style="margin-bottom:10px; text-align:left;" class="col-lg-3 col-xs-3 col-sm-3 col-md-3">
    
     <?php 
	 
	 //$obj->hashtags($array['offer_cat'],$array['offer_title']);
	 
	 
	 $obj->hashtags($array['offer_id'],$array['offer_title']);
	 
	  ?>
    </div>	


      <div style="margin-bottom:10px; text-align:right;" class="col-lg-9 col-xs-9 col-sm-9 col-md-9">
      
    

     <?php echo $obj->buttons00search($array['offer_id'],$array['offer_posted_user']); ?>

     </div>
     
     </div>
   </div>  
     <?php
     
	
	 
	 
	  }
	 
	 ?>    
     
      </div>
    <!--end created offers here -->
  
       
   </div>
        <!--main content ends-->
  </div>

 </div>
</div>

<script type="text/javascript">

$(document).ready(function() {	




$('#reg-form').submit(function(e){

		showpopup();

		e.preventDefault(); // Prevent Default Submission

		

		$.ajax({

			url: 'search_new_getoffers2.php',

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
	
	
	
	
	
	
	
	
	


$("#register-form").on('submit',(function(e) {
		
		if(validatefirst())
		{
		
		e.preventDefault();
		$.ajax({
        	url: "ajax.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			beforeSend : function()
			{
				//$("#preview").fadeOut();
				//$("#err").fadeOut();
			},
			success: function(data)
		    {
				if(data=='invalid')
				{
					// invalid file format.
					//$("#err").html("Invalid File !").fadeIn();
				}
				else
				{
					//alert(data)
					// view uploaded file.
					//$("#preview").html(data).fadeIn();
					$("#register-form")[0].reset();	
					
					$("#image-holder").html('');
					
					$("#image-holder").html('<span style="color:red"></span>');
					
					$("#sub_cat").val('');
					
					$("#uploadedimages").val('');
					
					
					
					$("#hierarchy").text('what best describes what you want?');
					
					
					
					loadlastoffer(data);
					
				}
		    },
		  	error: function(e) 
	    	{
				//$("#err").html(e).fadeIn();
				
				alert('error')
	    	} 	        
	   });
	   
	}
	
	else
	
	return false;
	   
	}));



function loadlastoffer(id)
{

	
	    data = 'option=getlastoffer&offer_id='+id;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){
		
		//alert()
		
		$('#mainouterform').after(sv);
		
		
		$('#main_'+id).animate({ width: "100%" }, 1000 );
		


		}})
		
	
}



	   

function validatefirst()

{

	  var counter = 0;
	  
	 

	   if($('#desc').val()=='')

	   {
		alert('please enter description')

		$('#desc').select();
		
		counter=1;

		return false;

		}
		
		var str = $('#desc').val();
	
	    var res = str.split("$");
	    
		
		
		if(res.length==1)
		
		{
		
		   alert('don\'t forget how much you are willing to pay in the following format: $0 or $0.00');
		 // location.reload();
		   counter=1;
		  
		   return false;
	
			
		}
		
		else
		{
			
			if(res.length>1)
			
			var res2 = res[1].split(" "); 
			
			
			
			if(res2[0]=='')
			{
			  alert('don\'t forget how much you are willing to pay in the following format: $0 or $0.00');
			  //location.reload();
			  counter=1;
			  
			  return false;
			  
			}
		
		}
		
		
		
		if(counter==0)
		return true;
		
		
		
	
}




$("#upload_file").on('change', function () {

     //Get count of selected files
     var countFiles = $(this)[0].files.length;
	 
	 
	 
	 if(countFiles>4)

   {

	 alert('not more than 4 images')

	 $('#upload_file').val('');

	 $('#upload_file').select();

	  return false

	 }
	 
	 else
	 
	 {
	 
	 

     var imgPath = $(this)[0].value;
	 
	
	 
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     
	

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
        
		 if (typeof (FileReader) != "undefined") {

			 
              $.each(this.files, function() {
               
			    readURL(this);
			   
			   
               
				 
                 
				 
             })
			 
			 

         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
	 
  }
	 
 });
 
 
 
 
 
});
 
 
 function readURL(file)
 
 {

		 var image_holder = $("#image-holder");
     
	 image_holder.empty();
		
		
		
		  var reader = new FileReader();
                 
				 reader.onload = function (e) 
				 
				 {
                      var picFile = e.target;
					  
					
					 
					 var vv = Math.floor((Math.random() * 100) + 1); 
					
					 $("<img />", {
                         "src": e.target.result,
                             "class": "thumb-image",
							  "width": "100",
							  "height": "100",
							  "id": "imm"+vv+""
                     }
					 
					 
					 ).appendTo(image_holder);
					 
					 
					  $("<div id='imm_"+ vv +"' onclick=\"removeimg('imm"+ vv +"','imm_"+ vv +"','"+file.name+"')\" class='crossbutton'>X</div>").appendTo(image_holder);
                
				
				   latestval = $("#uploadedimages").val();
				   
				   if(latestval=='')
				   
				   $("#uploadedimages").val(file.name)
				   
				   else if(file.name!='')
				   
				   $("#uploadedimages").val(latestval+','+file.name)
				
				 }
				 
				 reader.readAsDataURL(file);
				 
				//var filenameis = $(this)[0].files[i].name;
			
				
					
                 image_holder.show();
			 
	 
}
 
 


function parseData(entries){
  for (var i=0; i<entries.length; i++) {
    reader.onloadend = (function(file) {
      return function(evt) {
        createListItem(evt, file)
      };
    })(entries[i]);
    reader.readAsText(entries[i]);
  }
}





function removeimg(id,id2,img)

{

var str = $("#uploadedimages").val();	

st = str.split(',');

arr = [];

array = arr.concat(st);


array = $.grep(array, function(value) {
  return value != img;
});


 array.toString();
 
 $("#uploadedimages").val(array)

//alert(array)

$("#"+id).remove();

$("#"+id2).remove();
	
}



function getoffers(offer_posted_user,offer_id,logged_in_user)

{

	window.location='home3.php?offer_id='+offer_id+'&offer_posted_user='+offer_posted_user;

}


function showoffers(offerid,btn)
{
        
		
		
		
		$('#'+btn).prop('disabled',true);
		
		
		$('#'+offerid).append('<div class="bordersep"></div><div id="additional'+offerid+'"></div>');
		
		
		data = 'option=viewoffers&offer_id='+offerid;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){

		
		var find = 'class="borderouter"';
		
		var re = new RegExp(find, 'g');

		str = sv.replace(re, '');
			
		
		$('#additional'+offerid).html(str);
		
		
		$('#additional'+offerid).animate({ width: "100%" }, 1000 );
		


		}})
		
		
		
		
	
}


function showbidreplies(offerid,userid,bidid,btn)

{
        $('#'+btn).prop('disabled',true);
		
		$('#bids_'+bidid).after('<div id="additional_'+bidid+'"></div>');
	
		data = 'option=viewcomments&offer_id='+offerid+'&userid='+userid+'&bidid='+bidid;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){

		$('#additional_'+bidid).html(sv);
		
		$('#additional_'+bidid).animate({ width: "100%" }, 3000 );

		//$('#bids_'+bidid).after(sv);

		}})
	
		
	
}

function deleteit(id)

{
    
	if(confirm('are you confirm to delete?'))
	
	{
		
	   
	  $('#main_'+id).fadeOut(1000, function(){ $(this).remove();});
	   
	   
	   data = 'option=deleteoffers&offer_id='+id;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){

	
		

		}})
	   
	}
	   
	
}

function showform(offerid,bidid,offerposteduser)

{

       var innertext = $("#title_"+offerid).text();
	   
	  
				
		
		var str  = '<input type="hidden" name="bid_id" value="'+bidid+'"><input type="hidden" name="offer_id" value="'+offerid+'"><input type="hidden" name="offerposteduser" value="'+offerposteduser+'"><input type="hidden" name="option" value="replies">';


		$('#bids_'+bidid).append('<div id="bidsform_'+bidid+'" style="margin-top:5px;margin-right:10px;display:block;"><div  class="col-lg-12 " style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:15px;margin-bottom:12px;"><form method="post" id="register-form'+bidid+'" name="register-form'+bidid+'" action="ajax.php"  enctype="multipart/form-data" autocomplete="off"><div class="form-group" style="float:left;width:100%;"><textarea style="margin-top:0px;border:none; background:transparent;-webkit-box-shadow: unset;" class="form-control" name="desc" id="desc" placeholder="reply to '+$.trim(innertext)+'" cols="" rows=""></textarea></div><div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 " style="margin-top:0px;padding-right: 0px;"><div class="col-lg-6 col-xs-6 col-sm-6 col-md-6 paddingzero"><div class="form-group"><label class="filebutton"><span><input type="file" id="upload_file" name="upload_file[]"  class="required" multiple/></span></label></div></div><div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="text-align:right; padding-right:0px; float:right;"><input style="font-family:Arial, Helvetica, sans-serif; font-size:14px;"  type="submit" name="submit_image4"  class="btn btn-sm btn-primary" id="replycomments" value="reply"/><input type="hidden" name="prevs" id="prevs" value=""></div></div>'+str+'</form></div></div>')
		
		
		$('#btn_reply_'+bidid).prop('disabled',true);
		
	
}


	
	
	
	
	
	


function paypal(seller_id,user_id,offer_id,bid_id,amount)

{

	

	if(confirm('you agree you are purchasing this item and willing to pay '+amount+' ?'))

	

	window.location = 'gotopaypal.php?seller_id='+seller_id+'&user_id='+user_id+'&offer_id='+offer_id+'&bid_id='+bid_id;

	

	}
	
	
function savesearch()

{

	$("#save_srch").prop('disabled',true);
	
	var keyword = $("#lname").val();
	
	var subcat = $("#sub_cat").val();
	
	var empty_search = $("#empty_search").val();
	
	var total_results = $("#total_results").val();
	
	 data = 'option=savesearch&keyword='+keyword+'&subcat='+subcat+'&empty_search='+empty_search+'&total_results='+total_results+'&search_type=get';

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){

	      
		  
		

		}})	
	
}	
	
	
	
	

	
	
	

</script>

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>