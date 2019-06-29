<?php



include('top_header1.php');


require_once("class2.php");

$obj = new happenning;

/*if(@is_array(getimagesize('images/offers/83/7546dd98803a587a91a6853d7090f7952124.mp4'))){
   echo 'yes';
} else {
    $image = false;
}
*/
//echo filetype('images/offers/83/7546dd98803a587a91a6853d7090f7952124.mp4') ;
//echo '-';
//echo filetype('images/offers/83/18f3dd82e812a40d68e61a0de1aa3aa11954.jpeg') ;

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
			
		
    }
	
	
	
	
	
	
	
    </script>

<div class="body-container">
 
 <div class="container custombg">
  
  <div class="col-lg-12 col-md-12 custom_padding"><?php include("left_nav.php"); ?>
   
   <div class="col-lg-8 col-sm-12 col-xs-12 col-md-12 paddingset">
    
    <div class="col-lg-12 showthis" style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:20px; margin-bottom:12px;">
     
     <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4 topmenusselected" id="whatshappening" onclick="location.href='get-offers.php'">stuff i want</div>
     
     <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4 topmenus" id="whatfolkswant" onclick="location.href='search-stuff.php'">search for stuff</div>
     
 <!-- <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4 topmenus" onclick="location.href='mysearches.php'">my searches</div>-->

     
    
    </div>
    
    
    
    
   
    
    <div class="borderouter" id="mainouterform">
     
     <div class="col-lg-12" style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:5px; margin-bottom:12px;"><div id="form-content" style="margin-top:0px;margin-left:0px;  margin-right:0px;">
      
      <form method="post" id="register-form" name="postofferform" action="" enctype="multipart/form-data" autocomplete="off">
       
       <div class="form-group" style="float:left;width:100%;"><textarea style="margin-top:10px;border:none; background:transparent;-webkit-box-shadow: unset;" class="form-control" name="desc" id="desc" placeholder="What do you need?" cols="" rows=""></textarea>
       
       </div>
       
        <div class="col-lg-12" id="video-holder" style="margin-bottom:10px;float:left;">
        
        
        
        
        
        <div id="imm_21054_1" onclick="removevideo('video1','imm_21054_1','')" style="display:none;" class="crossbutton">X</div><video id="video1" controls="controls" style="display:none; width:100px; height:100px;" ></video>
        
        
        
        
        
        </div>	
       
       <div class="col-lg-12" id="image-holder" style="margin-bottom:10px;float:left;"></div>	

       <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 paddingzero" style="margin-top:0px;padding-left:0px;padding-right:0px;">

      
      
     
      
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
        <div style="margin-top:15px; text-align:left;">find offers in <input type="text" name="zip" id="zip" value="<?php echo $_SESSION['zipcode']; ?>" size="7"> miles of <input type="text" name="miles" id="miles" value="00000" /></div>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary buttongreen" data-dismiss="modal" onclick="showpopup()">update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
      </div>
    </div>
  </div>
</div>
      

      <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="text-align:left; padding-right:0px; padding-left:0px;">
	 
    
      <div style="float:left; width:50%; text-align:left; padding-left:12px;"> 
     
     
       <label class="filebutton" style="margin-bottom: -4px; background:none;font-size: 27px; padding-right:10px;height:auto; width:auto; cursor:pointer;">
<i class="glyphicon glyphicon-facetime-video"></i>
           <span><input type="file" id="upload_file2" name="upload_file2"  /></span>

          </label>
		
          <label class="filebutton" style="margin-bottom: -4px; background:none;font-size: 27px; height:auto; width:auto;cursor:pointer;">
<i class="glyphicon glyphicon-camera"></i>
           <span><input type="file" id="upload_file" name="upload_file[]"  class="required" multiple/></span>

          </label>

       </div>
       
         
        <!-- <div id="baloon" style="display:inline-block;"><img data-toggle="modal" data-target="#myModal" src="images/baloon.png" style="cursor:pointer;" /></div>-->
         
         
       
      <!-- <a style="float:none;" tabindex="0" href="#news-items-2" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="hierarchy">select a category<div style="display:inline-block;margin-left:12px;" align="right">
         
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

<div style="float:right; width:50%; text-align:right;">  


 <input type="hidden" id="uploadedimages" name="uploadedimages" value="">
       
       <input type="hidden" id="uploadedvideo" name="uploadedvideo" value="">
       
       <input type="hidden" id="sub_cat" name="sub_cat" value="">
       
       <input type="hidden" name="submit_images" value="get offers">
       
        <input type="hidden" name="filesize" id="filesize" value="">
       
       <input type="hidden" name="user_zip" id="user_zip" value="<?php echo $_SESSION['zipcode']; ?>">
       
       <input type="hidden" name="miles_area" id="miles_area" value="">

 <input style="font-family:Arial, Helvetica, sans-serif; font-size:14px; cursor:pointer; padding-left:10px;"  type="submit" name="submit_image"  class="btn btn-sm btn-primary buttonred submit_image" value="get offers"/>
      </div>
       
       </div>

     <!-- <div class="col-lg-2 col-xs-12 col-sm-2 col-md-2" style="text-align:right; padding-right:0px; float:right;">

      <input style="font-family:Arial, Helvetica, sans-serif; font-size:14px; cursor:pointer;"  type="submit" name="submit_image"  class="btn btn-sm btn-primary buttonred submit_image" value="get offers"/>

      </div>-->

     </div>

    </form>
   </div>

  </div> 

 </div>
 
 
 
 
 
 
 <div class="modal fade" id="myModal_progress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" style="width:300px;">
    <div class="modal-content">
     
     
      <div class="modal-footer" style="width: 100%; background: #fff; height: 106px;">
       
       <div style="text-align: center; background: #fff;"><img width="75"  src="images/LOADING.gif"></div>
       

     
      </div>
    </div>
  </div>
</div>
 
 
 
 
 
 
 
 
 
 
 

         
      <?php


         $arrayget = $obj->selectAll('posted_offers','*'," offer_posted_user = '".$_SESSION['user_session']."' ",'order by offer_id DESC');

	    
		 
	  ?>

         <!--created offers against each user -->

         <div class="ajaxget">
         
		 <?php
		 
		 $countg=0;

          foreach($arrayget as $array)

          {

        $countg++;

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

           <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:16px;color:#0e1131; font-weight:bold;" >

      <?php echo $obj->GetUserName($array['offer_posted_user']); ?>

        </div>

      

        </div> 
        
      </div>

        <div class="col-lg-3 col-xs-3 col-sm-2 col-md-3" style=" text-align:right;">

       <div style="float:right;font-family:Arial, Helvetica, sans-serif; "  class="font_sett01"><span style="color:#0e1131;font-weight:bold;" id="priceset_<?php echo $array['offer_id'] ?>"><?php  echo $array['offer_price'];  ?></span> <span style="color:#7e7e7e;">| <?php echo datediff2($array['offer_posted_date']);?>
        
         </span>
         
       </div>
       
     </div>

   <!--body navigation ends-->
      </div>
      
      
      <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom:10px; padding-right:0px;">
               <div class="col-lg-2 col-xs-1 col-sm-2 col-md-2 smallset">
                     </div>
           <div class="col-lg-10 col-xs-11 col-sm-10 col-md-10 " style="margin-top: -49px;">
               
               <div style="float:left;  padding-right:0px;" class="paddingleftset">
                <div id="title_<?php echo $array['offer_id'] ?>" style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:13px;color:#0e1131; font-weight:normal; width:100%;padding-left: 0px;"><?php 
				
				
				//if(!empty($_GET["keyword"])) 
				
				   echo convert_links($array['offer_title']);
				
				//else
				
				//echo $array['offer_title'];
				
				
				 ?>     
</div>
        

         <div id="offer_images___<?php echo $array['offer_id']; ?>" style="float:left;">
      <?php $obj->getofferimages($array['offer_id'],$array['offer_posted_user']); ?>
</div> 
          

   

           </div> 
           
           </div></div>
        
      

	<div style="margin-bottom:10px; text-align:left;" class="col-lg-3 col-xs-3 col-sm-3 col-md-3">
    
     <?php $obj->hashtags($array['offer_id'],$array['offer_title']); ?>
    </div>	


      <div style="margin-bottom:10px; text-align:right;" class="col-lg-9 col-xs-9 col-sm-9 col-md-9">
      
     <?php 
	 
	 // first check if there is no offer against this posted offer
	 
	 
	 $qr = mysqli_query($conn,"select bid_id from bids_against_offers where offer_id='".$array['offer_id']."'");
	 
	 $trows = mysqli_num_rows($qr);
	 
	 if($trows==0)
	 
	 $obj->buttonsmakeoffers2edit($array['offer_id']);

     $obj->buttons($array['offer_id'],$array['offer_posted_user']);
   
    
	 if($trows==0)
	 
	 {
	
	?>
     
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////-->
     
     <div class="modal fade" id="myModal_<?php echo $array['offer_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  
  <form id="myfrmis_<?php echo $array['offer_id']; ?>" method="post">
  
    <div class="modal-content">
     
      <div class="modal-body">
        <div style="margin-top:15px;">
        
        
        <div class="form-group" style="float:left;width:100%;"><textarea style="margin-top:10px;border:none; background:transparent;-webkit-box-shadow: unset;" class="form-control" onkeyup="callto(this.value,<?php echo $array['offer_id']; ?>)" name="desc" id="desc__<?php echo $array['offer_id']; ?>" cols="" rows=""><?php echo $array['offer_title']; ?></textarea>
       
       </div>
        
        
        <?php
        
		$obj->getofferimagespopup($array['offer_id']);
		
		?>
        
        
        <div class="form-group">
		
        
          
          
          
           <!--  <label class="filebutton" style="margin-bottom: -4px; background:none; padding-right:10px;" >
<i class="glyphicon glyphicon-facetime-video"></i>
           <span><input type="file" id="upload_file2_<?php echo $array['offer_id']; ?>" name="upload_file2"  /></span>

          </label>-->
		
          <label class="filebutton" style="margin-bottom: -4px; background:none;">
<i class="glyphicon glyphicon-camera"></i>
           <span><input type="file" id="uploadfile_<?php echo $array['offer_id']; ?>" name="upload_file[]"  class="required" multiple/></span>

          </label>
          

         </div>
        
        </div>
      </div>
      <div class="modal-footer">
       
        
        <input type="hidden" id="uploadedimages__<?php echo $array['offer_id']; ?>" name="uploadedimages" value="<?php echo $obj->offerimagenames($array['offer_id']); ?>">
        
        <input type="hidden" name="offerid" value="<?php echo $array['offer_id']; ?>">
       
        
        <input type="hidden" name="option" value="postofferupdate">
        
        <input type="hidden" id="desc321__<?php echo $array['offer_id']; ?>" value="">
        
        <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
        
        <button type="submit" class="btn btn-primary buttongreen">update</button>
        
      </div>
    </div>
    
    
    </form>
    
    
    
      <script>
	
	$("#uploadfile_<?php echo $array['offer_id']; ?>").on('change', function () {

     //Get count of selected files
	 
     var countFiles = $(this)[0].files.length;
	 
	 if(countFiles>4)

   {

	 alert('not more than 4 images')

	 $('#uploadfile_<?php echo $array['offer_id']; ?>').val('');

	 $('#uploadfile_<?php echo $array['offer_id']; ?>').select();

	  return false

   }
	 
	 else
	 
	 {

     var imgPath = $(this)[0].value;
	 
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
	    
		 if (typeof (FileReader) != "undefined") {

              $.each(this.files, function() {
				
				readURL__<?php echo $array['offer_id']; ?>(this);
			   
             })
			 

         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
	 
  }
	 
 });
 
 
 
  function readURL__<?php echo $array['offer_id']; ?>(file)
 
 {

		 var image_holder = $("#image-holder__<?php echo $array['offer_id']; ?>");
     
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
					 
					 
					  $("<div id='imm_"+ vv +"' onclick=\"removeimg__<?php echo $array['offer_id']; ?>('imm"+ vv +"','imm_"+ vv +"','"+file.name+"')\" class='crossbutton'>X</div>").appendTo(image_holder);
                
				
				   latestval = $("#uploadedimages__<?php echo $array['offer_id']; ?>").val();
				   
				   if(latestval=='')
				   
				   $("#uploadedimages__<?php echo $array['offer_id']; ?>").val(file.name)
				   
				   else if(file.name!='')
				   
				   $("#uploadedimages__<?php echo $array['offer_id']; ?>").val(latestval+','+file.name)
				
				 }
				 
				 reader.readAsDataURL(file);
				 
				//var filenameis = $(this)[0].files[i].name;
					
                 image_holder.show();
	 
}
 
 
 function removeimg__<?php echo $array['offer_id']; ?>(id,id2,img)

{

var str = $("#uploadedimages__<?php echo $array['offer_id']; ?>").val();	

st = str.split(',');

arr = [];

array = arr.concat(st);

array = $.grep(array, function(value) {
  return value != img;
});


 array.toString();
 
 $("#uploadedimages__<?php echo $array['offer_id']; ?>").val(array)

//alert(array)

$("#"+id).remove();

$("#"+id2).remove();
	
}
 
 
 $("#myfrmis_<?php echo $array['offer_id']; ?>").on('submit',(function(e) {
		
		if(validatefirst__<?php echo $array['offer_id']; ?>())
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
				
			},
			success: function(data)
		    {
				if(data=='invalid')
				{
					
				}
				else
				{
					
					$("#myfrmis_<?php echo $array['offer_id']; ?>")[0].reset();	
					
					$("#image-holder__<?php echo $array['offer_id']; ?>").html('');
					
					//$("#image-holder__<?php echo $array['offer_id']; ?>").html('<span style="color:red"></span>');
					
					$("#uploadedimages__<?php echo $array['offer_id']; ?>").val('');
					
					
					if($("#desc321__<?php echo $array['offer_id']; ?>").val()!='')
					
					$("#title_<?php echo $array['offer_id']; ?>").text($("#desc321__<?php echo $array['offer_id']; ?>").val());
					
					var res = data.split("#");
					
					$("#priceset_<?php echo $array['offer_id']; ?>").text('$'+res[0]);
					
					var pic = res[1].split(",");
					
					var img_string = '';
					
					//alert(pic.length)
					
					//alert(res[1])
					
					if(pic.length>0 && res[1]!='')
					
					{
					
						for(var i=0;i<pic.length;i++)
						
						{
						
							img_string = img_string+'<img class="img-responsive" src="'+pic[i]+'" />';	
							
						}
						
						$("#offer_images___<?php echo $array['offer_id']; ?>").html(img_string);
					
					}
						
					
					
					
					
		//$("#offer_images___<?php echo $array['offer_id']; ?>").text($("#image-holder__<?php echo $array['offer_id']; ?>").text());
					
					
					
					$('#myModal_<?php echo $array['offer_id']; ?>').modal('hide')
				}
		    },
		  	error: function(e) 
	    	{
				
				
				alert('error')
	    	} 	        
	   });
	   
	}
	
	else
	{
	  
	  e.preventDefault();
	  
	  return false;
	
	}
	   
	}));
 
 
 function validatefirst__<?php echo $array['offer_id']; ?>()

{

	  var counter = 0;
	  
	 

	   if($('#desc__<?php echo $array['offer_id']; ?>').val()=='')

	   {
		alert('please enter description')

		$('#desc__<?php echo $array['offer_id']; ?>').select();
		
		counter=1;

		return false;

		}
		
		var str = $('#desc__<?php echo $array['offer_id']; ?>').val();
	
	    var res = str.split("$");
	    
		
		
		if(res.length==1)
		
		{
			
			counter=1;
			
			alert('please don\'t forget to include the price in your offer (for example $5)');

		return false;
			
		}
		
		else if(res.length==1)
		
		{
		
		   $('#buyer_price__<?php echo $array['offer_id']; ?>').val('<?php echo $array['offer_price']; ?>');
	
			
		}
		
		else
		{
			
			if(res.length>1)
			
			var res2 = res[1].split(" "); 
			
			
			
			if(res2[0]=='')
			{
			  
			  $('#buyer_price__<?php echo $array['offer_id']; ?>').val('<?php echo $array['offer_price']; ?>');
			  
			  
			}
		
		}
		
		
		
		if(counter==0)
		return true;
		
		
		
	
}
 
 
	
	</script>
    
    
    
    
    
    
  </div>
</div>
     
     
     
     
     
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////-->    
   
   <?php
   
	 }
   
   ?>  

     </div>
     
     </div>
   </div>  
     <?php
     
	
	 
	 
	  }
	  
	  if($countg==0)
	  
	  echo '<div style="float:none;color:#333; padding:25px 10px 10px 5px;text-align:center;clear:both;">you haven\'t posted anything you want yet</div>';
	 
	 
	 
	 ?>    
     
      </div>
    <!--end created offers here -->
  
       
   </div>
        <!--main content ends-->
  </div>

 </div>
</div>

<div class="modal fade" id="myModal33" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
        <div style="margin-top:15px;"><div style="position:relative;height:0;padding-bottom:75.0%"><iframe src="https://www.youtube.com/embed/KaSSlFolNDA?ecver=2" width="480" height="360" frameborder="0" style="position:absolute;width:100%;height:100%;left:0" allowfullscreen></iframe></div></div>
      </div>
      <div class="modal-footer">
        <!--onclick="showpopup()" data-dismiss="modal" -->
        did you watch the video? <input name="watch" type="checkbox" value="yes" onclick="update_it();" /> Yes
        <div style="display:none;" id="showclose"><button type="button" class="btn btn-default" onclick="gotopaypal()" >click to pay</button></div>
      </div>
    </div>
  </div>
</div>

<input type="hidden" name="paypal_values" id="paypal_values" value="">
<script type="text/javascript">

$(document).ready(function() {	


$("#register-form").on('submit',(function(e) {
		
		if(validatefirst())
		{
			
			
		$("#myModal_progress").modal('show');
		
		
		
		
		
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
				
				//alert(data)
				
				if(data=='invalid')
				{
					// invalid file format.
					//$("#err").html("Invalid File !").fadeIn();
				}
				
				else if(data=='no')
				
				alert('sorry you can only upload videos that are 500 mb or less')
				
				else
				{
					//alert(data)
					// view uploaded file.
					//$("#preview").html(data).fadeIn();
					
					if(data=='')
					
					{
						
						alert('error in posting please try again')
						
						}
						
					else
					
					{	
					
					$("#register-form")[0].reset();	
					
					$("#image-holder").html('');
					
					$("#video-holder").html('');
					
					//$("#image-holder").html('<span style="color:red">form submitted successfully!</span>');
					
					$("#sub_cat").val('');
					
					$("#uploadedimages").val('');
					
					$("#uploadedvideo").val('');
					
					
					$("#hierarchy").text('what best describes what you want?');
					
					//alert(data)
					
					
					
					loadlastoffer(data.trim());
					
					}
					
					
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
	
	
	
  $('#upload_file2').on('change', function(evt) {
	  //evt.preventDefault();
	  
	  //alert(this.files[0].size)
	  
	 $("#filesize").val(this.files[0].size); 
   
  });




function loadlastoffer(id)
{

	
	    data = 'option=getlastoffer&offer_id='+id;
		
		//alert(data)

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){
		
		//alert()
		
		$('#mainouterform').after(sv);
		
		
		$('#main_'+id).animate({ width: "100%" }, 1000 );
		
		//window.location='get-offers.php';
		
		$("#myModal_progress").modal('hide')

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
		  
		   counter=1;
		   
		   //location.reload();
		  
		   return false;
	
			
		}
		
		else
		{
			
			if(res.length>1)
			
			var res2 = res[1].split(" "); 
			
			
			
			if(res2[0]=='')
			{
			  alert('don\'t forget how much you are willing to pay in the following format: $0 or $0.00');
			  
			  counter=1;
			  
			 // location.reload();
			  
			  return false;
			  
			}
		
		}
		
		if($("#filesize").val()>52428800)
		{
		
			alert('your file size is greater than 50 mb')
			
			counter=1;
			
			
			
			
			
			$("#video-holder").html('');
					
				
					
			$("#uploadedvideo").val('');
			
			return false;
			
		}
		
		
		if(counter==0)
		return true;
		
		
		
	
}




$("#upload_file").on('change', function () {

     //Get count of selected files
     var countFiles = $(this)[0].files.length;
	 
	 
	 
	 if(countFiles>4)

   {

	 alert('not more than 4 images/videos')

	 $('#upload_file').val('');

	 $('#upload_file').select();

	  return false

	 }
	 
	 else
	 
	 {
	 
	 

     var imgPath = $(this)[0].value;
	 
	
	
	var keys = Object.keys($(this)[0].files);
	
	var arr = new Array();

    for (var i = 0; i < keys.length; i++) {
    
	 arr[i] = $(this)[0].files[keys[i]].name;
	
	
	
    }
	
	
	var k=0;
	
	 
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     
	
	

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg" || extn=='ogg' || extn=='mp4' || extn=='mp3' || extn=='wave' || extn=='3gp' || extn=='mkv' || extn=='flv') {
        
		 if (typeof (FileReader) != "undefined") {

			 
              $.each(this.files, function() {
               
			    readURL(this,extn,arr,k);
			   
			   
               
				k++; 
                 
				 
             })
			 
			 

         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
	 
  }
	 
 });
 
 
 
 
 
 
 
 
 
 
 
 
 
 /* /  //////////////////////////////////////////  for video management ////////////////////////////////////////////////////////*/
	
	
	$("#upload_file2").on('change', function () {
		
		
		
		$("#video-holder").html('<div id="imm_21054_1" onclick="removevideo(\'video1\',\'imm_21054_1\',\'\')" style="display:none;" class="crossbutton">X</div><video id="video1" controls="controls" style="display:none; width:100px; height:100px;" ></video>');
		
		
		
		
		
	
	$("#video1").css('display','block');	
	
	$("#imm_21054_1").css('display','block');	
	
	var $video = $('#video1');

	$video.prop('src', URL.createObjectURL($('#upload_file2').get(0).files[0]));

	//$video.get(0).play();
	
	$("#uploadedvideo").val($('#upload_file2').get(0).files[0].name)
	
	
	
	
	

 
	 
 });
 
	
	function getThubmnail(original, scale) {
  var canvas = document.createElement("canvas");

  canvas.width = original.width * scale;
  canvas.height = original.height * scale;

  canvas.getContext("2d").drawImage(original, 0, 0, canvas.width, canvas.height);

  return canvas
}
	
 
});







 
 
 function readURL(file,extn,arr,k)
 
 {
        
		 
		 var image_holder = $("#image-holder");
     
	 image_holder.empty();
		
		
		
		  var reader = new FileReader();
                 
				 reader.onload = function (e) 
				 
				 {
                      var picFile = e.target;
					  
					
					 
					 var vv = Math.floor((Math.random() * 100) + 1); 
					
					
					var m = arr[k].substring(arr[k].lastIndexOf('.') + 1).toLowerCase();
					
					
					
					
					if(m=='mp3' || m=='mp4' || m=='3gp' || m=='mpeg' || m=='mkv' || m=='flv' )
					
					{
						
						
						/* <video width="320" height="240" autoplay>
  <source src="movie.mp4" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
</video> */

						
						
						 $("<video controls width='100' height='100' id='imm"+vv+"' class='thumb-image'><source src='"+e.target.result+"' type='video/"+m+"'></video>", {
							
								 "class": "thumb-image",
								  "width": "100",
								  "height": "100",
								  "id": "imm"+vv+""
						 }
						 
						  ).appendTo(image_holder);
						
					}
					
					
					else
					
					{
					
					
						 $("<img />", {
							 "src": e.target.result,
								 "class": "thumb-image",
								  "width": "100",
								  "height": "100",
								  "id": "imm"+vv+""
						 }
						 
						  ).appendTo(image_holder);
					 
					 
					}
					 
					 
					 
					 
					 
					 
					 
					 
					 
					
					 
					 
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
 
 
 
  
 function readURL2(file,extn)
 
 {
        
		 
		 var image_holder = $("#video-holder");
     
	 image_holder.empty();
		
		
		
		  var reader = new FileReader();
                 
				 reader.onload = function (e) 
				 
				 {
                    
					  
					
					
					 var picFile = e.target;
					  
					
					 
					 var vv = Math.floor((Math.random() * 100) + 1); 
					
				
						
					
						
						
						 $("<video controls width='100' height='100' id='imm"+vv+"' class='thumb-image'><source src='"+e.target.result+"' type='video/"+extn+"'></video>", {
							
								 "class": "thumb-image",
								  "width": "100",
								  "height": "100",
								  "id": "imm"+vv+""
						 }
						 
						  ).appendTo(image_holder);
						
				
				
					 
					 
					 
					// alert(extn)
					 
					
					 
					 
					 
					 
					 
					
					 
					 
					  $("<div id='imm_"+ vv +"' onclick=\"removeimg('imm"+ vv +"','imm_"+ vv +"','"+file.name+"')\" class='crossbutton'>X</div>").appendTo(image_holder);
                
				
				   latestval = $("#uploadedvideo").val();
				   
				   if(latestval=='')
				   
				   $("#uploadedvideo").val(file.name)
				   
				   else if(file.name!='')
				   
				   $("#uploadedvideo").val(latestval+','+file.name)
				
				 }
				 
				 reader.readAsDataURL(file);
				 
				//var filenameis = $(this)[0].files[i].name;
			
				// alert(file.name)
				 
				// alert($("#uploadedvideo").val())
				 
					
                 image_holder.show();
				 
				// alert($("#video-holder").text())
			 
	 
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


function removevideo(id,id2,img)

{

 $("#uploadedvideo").val('');	


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
		
		//alert(data)

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
    
	if(confirm('confirm you really want to delete this? This cannot be undone.?'))
	
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


		$('#bids_'+bidid).append('<div id="bidsform_'+bidid+'" style="margin-top:5px;margin-right:10px;display:block;"><div  class="col-lg-12 " style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:15px;margin-bottom:12px;"><form method="post" id="register-form'+bidid+'" name="register-form'+bidid+'" action="ajax.php"  enctype="multipart/form-data" autocomplete="off"><div class="form-group" style="float:left;width:100%;"><textarea style="margin-top:0px;border:none; background:transparent;-webkit-box-shadow: unset;" class="form-control" name="desc" id="desc" placeholder="reply to '+$.trim(innertext)+'" cols="" rows=""></textarea></div><div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 " style="margin-top:0px;padding-right: 0px;"><div class="col-lg-6 col-xs-6 col-sm-6 col-md-6 paddingzero"><div class="form-group"><label class="filebutton"><span><input type="file" id="upload_file"  name="upload_file[]"  class="required" multiple/></span></label></div></div><div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="text-align:right; padding-right:0px; float:right;"><input style="font-family:Arial, Helvetica, sans-serif; font-size:14px;"  type="submit" name="submit_image4"  class="btn btn-sm btn-primary" id="replycomments" value="reply"/><input type="hidden" name="prevs" id="prevs" value=""></div></div>'+str+'</form></div></div>')
		
		
		$('#btn_reply_'+bidid).prop('disabled',true);
		
	
}


	
	function gotopaypal()
{
	
	 $('#myModal33').modal('hide')
	
	window.location = document.getElementById('paypal_values').value;

   

}
	
	
	
	


function paypal(seller_id,user_id,offer_id,bid_id,amount)

{

	

	//if(confirm('you agree you are purchasing this item and willing to pay '+amount+' ?'))

	

	//window.location = 'gotopaypal.php?seller_id='+seller_id+'&user_id='+user_id+'&offer_id='+offer_id+'&bid_id='+bid_id;


var show = <?php echo $_SESSION['first_time_buyer'] ?>;
		
	if(show==0)
	{
	
	$('#myModal33').modal('show')
	
	document.getElementById('paypal_values').value = 'gotopaypal.php?seller_id='+seller_id+'&user_id='+user_id+'&offer_id='+offer_id+'&bid_id='+bid_id;
	
	}
	else
	
	window.location = 'gotopaypal.php?seller_id='+seller_id+'&user_id='+user_id+'&offer_id='+offer_id+'&bid_id='+bid_id;

	

	}
	
	
	
	function loadlastoffer00(id,divid)
{

	   // alert(id)
		
		//alert(divid)
		
	    data = 'option=getlastoffer2&offer_id='+id;

	    $.ajax({url:"ajax.php",type:'POST',data:data,success: function(sv){
		
		//alert(sv)
		
		//$("#main_"+divid).after(sv);
		
		
		//$('#mainsub_'+id).animate({ width: "100%" }, 1000 );
		
       //$('#myModal_'+divid).modal('hide')
	   
	   
	  // $("#makedisable__"+divid).html('<span style="color:#ccc;">offer updated</span>')
		
		
		// $("#user__"+divid).css('color','#ccc');
		 
		// $("#title__"+divid).css('color','#ccc');
		 
		// $("#datetime__"+divid).css('color','#ccc');
		 
		
		}})
		
	
}
	
	
	
	function callto(vals,id)
	
	{
	  
	 
	  document.getElementById('desc321__'+id).value=vals;
	
	 // alert(document.getElementById('desc321__'+id).value)
		
	}
	


</script>

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>