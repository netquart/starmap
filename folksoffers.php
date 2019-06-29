<?php

require_once("class.php");

$obj = new happenning;

$perPage = 20;


$page = 1;

if(!empty($_GET["page"])) 

{
	$page = $_GET["page"];
}

$start = ($page-1)*$perPage;

if($start < 0)

 $start = 0;



$keywordchk = '';

if(!empty($_GET["keyword"])) 

{
	
	$strg = str_replace('hash','#',$_GET['keyword']);
	
	$keywordchk = " and (posted_offers.offer_title like '".$strg."' or posted_offers.offer_title like '%".$strg."%' or posted_offers.offer_title like '".$strg."%' or posted_offers.offer_title like '%".$strg."') ";


}





         

		
		 $arrayget = $obj->selectAll('posted_offers RIGHT JOIN bids_against_offers ON posted_offers.offer_id = bids_against_offers.offer_id','posted_offers.*, count(bids_against_offers.offer_id)','',' WHERE posted_offers.offer_status=1 '.$keywordchk.' GROUP BY posted_offers.offer_id order by posted_offers.offer_id DESC LIMIT '.$start.','.$perPage.'');
  
  
  
  		
		

if(empty($_GET["rowcount"])) 
{
  $_GET["rowcount"] = $obj->CountAllRows('posted_offers RIGHT JOIN bids_against_offers ON posted_offers.offer_id = bids_against_offers.offer_id','posted_offers.*, count(bids_against_offers.offer_id)','',' WHERE posted_offers.offer_status=1 '.$keywordchk.' GROUP BY posted_offers.offer_id order by posted_offers.offer_id DESC');
}

$pages  = ceil($_GET["rowcount"]/$perPage);


		
  $j=0;
  		

 

         foreach($arrayget as $array)

  

         {

 if($j==0)
 
 echo '<input type="hidden" class="pagenum" value="'.$page.'" /><input type="hidden" class="total-page" value="'.$pages.'" />';

$j++;
	  

         ?> 
         
         
         
          <div class="borderouter">

      
            

           <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">
               

            <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset"><?php $obj->getuser($array['offer_posted_user']); ?>

            </div>

   

          <div class="col-lg-7 col-xs-8 col-sm-8 col-md-8 pdright">

            <div style="float:left;  padding-right:0px;" class="paddingleftset">

            <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:14px;color:#0e1131; font-weight:bold;">

           <?php echo $obj->GetUserName($array['offer_posted_user']); ?>

           </div>

           

          </div> 
        </div>
         <div class="col-lg-3 col-xs-3 col-sm-2 col-md-3 pddgsett" style=" text-align:right;">
          <div style="float:right;font-family:Arial, Helvetica, sans-serif;"  class="font_sett01"><span style="color:#0e1131;font-weight:bold;"><?php  echo $array['offer_price']; ?></span> <span style="color:#7e7e7e;">| <?php echo datediff2($array['offer_posted_date']);?> </span>
          
         </div>

      </div>

    </div>
    
    
    
    
    
    
    
   
   
   
   
    <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;margin-top:-64px;">

               

               

               <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">

          
   

           </div>

           

           

           <div class="col-lg-10 col-xs-11 col-sm-10 col-md-10 " >

               

               <div style="float:left;  padding-right:0px;" class="paddingleftset">

               

           <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:13px;color:rgb(14, 17, 49); font-weight:normal;width:100%;padding-left: 2px;">

           

           

        	<?php   
			
			
			    if(!empty($_GET["keyword"])) 
				
				echo convert_links($array['offer_title']);
				
				else
				
				echo $array['offer_title'];
				
				
				?>     

         </div>

        <?php  $obj->getofferimages($array['offer_id'],$array['offer_posted_user']); ?>
           

          

           

          

   

           </div> </div></div> 
    
    
    
    
    
    
    
  
  <div style="margin-bottom:10px;" class="col-lg-12 col-xs-12 col-sm-12 col-md-12" id="<?php  echo $array['offer_id']; ?>">
   
   <div style="font-family: Arial,Helvetica,sans-serif; font-size: 14px; color: #7e7e7e; padding-left: 15px;"   

     class="col-lg-6 col-xs-6 col-sm-6 col-md-6"><?php echo $obj->bidscount($array['offer_id']);?></div>

     <?php //$obj->makeoffer($array['offer_id'],$array['offer_posted_user']);?>

   </div>
   
   
  



    		<?php



			// show all offers against this offer

			

			

			

		

			  
			
			
			
			$arrayoffers = $obj->selectAll('bids_against_offers','*'," offer_id = '".$array['offer_id']."' ",'order by bid_id DESC ');
			 
			 
			
			 
			
			 


			 $totals = sizeof($arrayoffers);
			
			$k=0;

			foreach($arrayoffers as $arrayoffers)

			

			{

			if($k==0)
			
			echo ' <div class="bordersep"></div>';
			
			$k++;
			
			?>

            

          <!--////////////////////////////////////////////////////////////////////////////////////////////// -->         

           

          <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;">

               

               

               <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">

            <?php

           



			$obj->getuser($arrayoffers['user_id']);
           

           ?>

   

           </div>

           

           

           <div class="col-lg-7 col-xs-8 col-sm-8 col-md-8 ">

               

               <div style="float:left;  padding-right:0px;" class="paddingleftset">

               

               <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:14px;color:#0e1131; font-weight:bold;">

           

           

           <?php echo $obj->GetUserName($arrayoffers['user_id']); ?>

           

           </div>

           

          

   

           </div> </div>

           

           <div class="col-lg-3 col-xs-3 col-sm-3 col-md-3 pddgsett" style=" text-align:right;">

           

            <div style="float:right;font-family:Arial, Helvetica, sans-serif; "  class="font_sett01"><span style="color:#0e1131;font-weight:bold;color:#d32028;"><?php echo $arrayoffers['bid_price']; ?></span> <span style="color:#7e7e7e;">| 

            

            <?php

  echo datediff2($arrayoffers['posted_date']);

	

			?>

                </span></div>

               

               </div>
               
               
               
               
               
              
              
           
               
               
               
       
       
        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 15px; padding-top: 15px;margin-top:-49px;">

               

               

               <div class="col-lg-2 col-xs-1 col-sm-1 col-md-2 smallset">

          
   

           </div>

           

           

           <div class="col-lg-10 col-xs-11 col-sm-10 col-md-10 " style="padding-left:0px; padding-right:0px;">

               

               <div style="float:left;  padding-right:0px;" class="paddingleftset">

               

           <div style="float:left;font-family:Arial, Helvetica, sans-serif; font-size:13px;color:rgb(14, 17, 49); font-weight:normal;width:100%;padding-left:2px; ">

           

           

           <?php  
		   
		  // echo $arrayoffers['offer_title']; 
		   
		  echo convert_links($arrayoffers['offer_title']); 
		   
		   
		   ?>     
</div>
        
        <div style="float:left; padding-left:2px;">

        <?php   $obj->getbidimages($arrayoffers['bid_id'],$arrayoffers['user_id']); ?>

           

           

           
</div>
          

   

           </div> </div></div>

           

          
               

           
                       
               
               
               
               
               
               
               
               

               

               

               <?php

              

			 

			   

			  $ros = $obj->CountAllRows('bid_replies','*'," offer_id = '".$arrayoffers['offer_id']."' and bid_id='".$arrayoffers['bid_id']."' and user_id='".$array['user_id']."' ",'');

			

			

			if($ros>1)

			 $rep = $ros.' replies';  

			elseif($ros>0)   

			 $rep = $ros.' reply';

			 else

			 $rep = 'no reply';      

			   ?>

               

               

               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingzero" style=" font-family:Tahoma, Geneva, sans-serif; font-size:15px; color:#878686;width:100%; font-weight:bold;  padding-left:0px;

    margin-top: 20px;" >

   

 <div  class="col-xs-4 col-sm-4 col-md-4 col-lg-4 paddingzero"><?php //echo $rep; ?>  </div>

   


   <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingzero payments" style="color: #7f7f7f;
   
    font-size: 13px;
    font-weight: normal; padding-right:0px;padding-left:0px;
    "><ul><?php 
  
  if(!empty(trim($arrayoffers['acceptted_methods'])))
 
  {
	  
  echo '<li>accepts '.str_replace(',',', ',$arrayoffers['acceptted_methods']);
  
  echo '</li>';
  
  }
  
  if(!empty(trim($arrayoffers['shipping_methods'])))
  
  {
  
  echo '<li>'.$arrayoffers['shipping_methods'];
  
  echo '</li>';
 
  }
  
  
  if(!empty(trim($arrayoffers['pickup_methods'])))
  
  {
  
  echo '<li>'.$arrayoffers['pickup_methods'].'</li>';
  
  }

  
  
  
   ?>  </ul></div>

  

   

    <div style="float:right; font-family:Tahoma, Geneva, sans-serif; font-size:15px; color:#878686; font-weight:bold;  margin-left: 13px;margin-top: 10px; text-align:right; padding-right:0px;" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

     <?php
   
   global $conn;
   
   /// first check the posted user because offer posted user can accept it only
   
   $getuid = mysqli_fetch_array(mysqli_query($conn,"select offer_posted_user from posted_offers where offer_id='".$arrayoffers['offer_id']."'"));
   
   
  /* if($array['offer_status']==1 and $getuid['offer_posted_user']==$_SESSION['user_session'])
   {*/
	   
	   
	 if($arrayoffers['user_id']!=$_SESSION['user_session'])
   {   
	   
	    $getp = mysqli_fetch_array(mysqli_query($conn,"select bid_price from bids_against_offers where bid_id='".$arrayoffers['bid_id']."'"));  
		  
		  
		
	   
	   
	   
	   
   ?>

<input onclick="paypal('<?php echo $arrayoffers['user_id'] ?>','<?php echo $_SESSION['user_session'] ?>','<?php echo $arrayoffers['offer_id'] ?>','<?php echo  $arrayoffers['bid_id'];  ?>','<?php echo  $getp['bid_price'];  ?>')" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;"  type="button"   class="btn btn-sm btn-primary buttonred00" value="I'll take it"/>

   <?php
   
   }
   
 // }
   
   ?>

   </div>

   

    </div>

               

             

               

               

               <!--body navigation ends-->

               

                  

                  

                  

                  </div>

                  

                 

                  

          

          

          <?php

$totals--;

   if($totals>0)
   
   echo '<div class="bordersep"></div> ';


			
				

				

                  

         

    }

	 

     ?>
   
   
   

   </div>

 
  <?php

     

  }
  
  if(empty($_GET["page"]))
		
		$page_num = 1;
		
		else
		
		$page_num = $_GET["page"];
		
		
		echo '<input type="hidden" name="rowcount" id="rowcount" value="'.$_GET["rowcount"].'">
		
		
		 <input type="hidden" name="empty_search" id="empty_search" value="">
		 
		 
		<input type="hidden" name="page_num" id="page_num" value="'.$page_num.'">';
	 
?>    


