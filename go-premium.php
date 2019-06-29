<?php include("top_header.php");




?>





  

    

<div class="body-container">






<div class="container custombg">

        

        

        <div class="col-lg-12 col-md-12 custom_padding">

        

        <?php include("left_nav.php"); ?>

        

        

        <!--main content starts-->

        

        

        <div class="col-lg-8 col-sm-12 col-xs-12 col-md-12 paddingset">

        

        <!--border div starts here -->

        

        

        <div class="borderouter">

       

     	<div class="col-lg-9 col-sm-9 col-xs-8 col-md-9" style="margin-top:25px;">

        

          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">

          <span style="font-size:16px; color:#F00;font-weight:bold;">Free</span>

          </div>

          

          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">

           <ul style="padding-left:10px;">

             

             <li style="color:#000000">we charge 11.9% of the selling price.</li>

             <li style="color:#000000">earn $0.50 every month for each person you refer that becomes a basic or premium member.</li>

          

          

           </ul>

          </div>

          

        

        </div>

        

        

       

        

         <div class="col-lg-3 col-sm-3 col-xs-4 col-md-3" style="margin-top:25px; text-align:right; padding-left:0px;">

          

          <span style="font-size:16px; color:#666;font-weight:bold;">FREE</span>

        

        

        </div>



        

         <div class="bordersep"></div>  

         

         

         

         

         <div class="col-lg-9 col-sm-9 col-xs-8 col-md-9" style="margin-top:25px;">

        

          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">

          <span style="font-size:16px; color:#F00;font-weight:bold;">basic</span>

          </div>

          

          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">

           <ul style="padding-left:10px;">

             

             <li style="color:#000000">we charge 5.9% of the selling price.</li>

             <li style="color:#000000">earn $1 every month for each person you refer that becomes a basic or premium member.</li>

          

          

           </ul>

          </div>

          

        

        </div>

        

        

       

        

         <div class="col-lg-3 col-sm-3 col-xs-4 col-md-3" style="margin-top:25px; text-align:right;padding-left:0px;">

          

          <span style="font-size:16px; color:#666;font-weight:bold;">$11.97/mo</span>

        

        

         

            <button type="button" class="btn btn-default buttonred" name="btn-save" id="paynow" style="height: 32px;

padding-top: 3px;

width: 100px;

margin-top: 20px;">

    		sign me up!

			</button> 

        </div>  

        

      



         

         

         

         

         <div class="bordersep"></div>  

         

         

         

         

         <div class="col-lg-9 col-sm-9 col-xs-8 col-md-9" style="margin-top:25px;">

        

          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">

          <span style="font-size:16px; color:#F00;font-weight:bold;">premium</span>

          </div>

          

          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">

           <ul style="padding-left:10px;">

             

             <li style="color:#000000">we charge NO fees.</li>

             <li style="color:#000000">refer that becomes a basic member, and $2 every month for each person you refer that becomes a premium member.</li>

          

          

           </ul>

          </div>

          

        

        </div>

        

        

       

        

         <div class="col-lg-3 col-sm-3 col-xs-4 col-md-3" style="margin-top:25px; text-align:right;padding-left:0px;">

          

          <span style="font-size:16px; color:#666;font-weight:bold;">$22.97/mo</span>

        

        

         

            <button type="submit" class="btn btn-default buttonred" name="btn-save" id="paynow2" style="height: 32px;

padding-top: 3px;

width: 100px;

margin-top: 20px;">

    		sign me up!

			</button> 

       

        

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

		

		

		//document.paypal_form.submit();

		
        
		window.open('subscription-basic.php','_blank');
		

		});

		

		

		$('#paynow2').click(function(){

		
		
		
		window.open('subscription.php','_blank');

		//document.paypal_form_premium.submit();

		

		

		});

	

	

});



</script>









<script src="https://wowme.deals/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
