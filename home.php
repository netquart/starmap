<?php

include('top_header1.php');

?> 
    
<div class="body-container mobileset2">

<div class="container">
    <div class='alert alert-success'>
		<button class='close' data-dismiss='alert'>&times;</button>
			<strong>Hello '<?php echo $row['username']; ?></strong>  <?php if(@$_GET['utype']=='social') echo 'your account is created and your login details are sent on your email id for future login usage'; else echo 'Welcome to the members page.'; ?>
    </div>
</div>

<div class="container custombg">
        
        
        <div class="col-lg-12 col-md-12 custom_padding">
        
        <?php include("left_nav.php"); ?>
        
        <div class="col-lg-8 col-sm-12 col-xs-12 ">
        
         <div style="border:solid 1px #CCCCCC; border-radius:6px; height:auto; margin-top:13px; background:#FFF; float:left; padding-bottom:20px;width:100%; text-align:center">
       
        <div style="float:left;"><a href="get-offers.php"><img src="images/desktopmain_01.png" style="width:100%;"  class="mainimg"></a></div>
       
        <div style="float:left;"><a href="make_offers_new.php?p=makeoffer"><img src="images/desktopmain_02.png" style="width:100%;"  class="mainimg"></a></div>
        
        
         </div>
        
        </div>
        
        
        
        </div>
        
        
      </div>

        


   
</div>





<div class="mobileset">

<img src="images/mobile_main.png" style="width:100%;" usemap="#Map" class="img-responsive" border="0">
<map name="Map" id="Map">
  
  
 
  
   <area shape="rect" coords="18,382,617,493" title="what happening" href="whathapinng.php" />
  <area shape="rect" coords="17,508,630,621" title="my account" href="view-profile.php" />
  <area shape="rect" coords="24,92,244,345" href="get-offers.php" title="get offer" />
  <area shape="rect" coords="344,75,620,355" href="make_offers_new.php?p=makeoffer" title="make offer" />
  <area shape="rect" coords="22,637,624,747" href="go-premium.php" alt="go premium" title="go premium" />
  <area shape="rect" coords="21,760,617,875" href="make-money.php" alt="make money" title="make money" />
  <area shape="rect" coords="10,1019,621,1119" href="logout.php" title="signout" alt="signout" />
  
  
  
</map>

</div>


<script type="text/javascript">
$(document).ready(function() {	


$('.stuffneed').click(function(){
	
	data = 'offers_type=offerimade';
	
	$.ajax({url:"search2.php",type:'POST',data:data,success: function(sv){
		
		$('.ajaxget').nextAll('div').remove();
		
		$('.ajaxget').after(sv);
		
		
		
		}})
	
	
	
	
	
	
	});
	
	
	
	
	
	
	$('.stuffmade').click(function(){
	
	data = 'offers_type=stuffmade';
	
	$.ajax({url:"search2.php",type:'POST',data:data,success: function(sv){
		
		$('.ajaxget').nextAll('div').remove();
		
		$('.ajaxget').after(sv);
		
		
		}})
	
	
	});
	
	
	




});

$(document).ready(function(e) {
    $('img[usemap]').rwdImageMaps();
});



</script>


<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>