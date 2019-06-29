<div class="col-lg-12 col-sm-12 col-xs-12 showhide" style="padding-top:8px; padding-bottom:0px;"><a href="whathapinng.php"><img src="images/wowmelogo_5-3.png" width="200" height="42" class="img-responsive"></a></div>

<div class="col-lg-4 col-sm-12 col-xs-12 custom_padding showhide">


        

        <div style="border:solid 1px #CCCCCC; border-radius:10px; height:auto; margin-top:13px;background: #fff none repeat scroll 0 0;">

        
<?php


//$uriget =  str_replace('/wowme/','',$_SERVER['REQUEST_URI']);

//live

$uriget =  str_replace('/','',$_SERVER['REQUEST_URI']);

global $offermade,$offercount,$trans;



?>
        

        

        <!--menu start-->

        

        

        <div class="sidebar">

          <ul class="nav nav-sidebar navcustom">

		
        <li class="active " <?php if($uriget=='whathapinng.php') echo 'style="color:red;border-bottom:none;height: 48px;"'; else echo 'style="border-bottom:none;line-height: 48px;"'; ?>><a style="<?php if($uriget=='whathapinng.php') echo 'color:red;'; ?>"  href="whathapinng.php">what's happening</a><span class="glyphicon glyphicon-chevron-right"></span></li>
        
  
  
  
  <?php

$retoffercount = countoffers();

$pdd1 ='';



if($offercount==2)

$pdd1 = 'padding-top:10px;';

?>
  
  
        

<li class="active" style=" <?php if($uriget=='get-offers.php' or $uriget=='search-stuff.php' or $uriget=='mysearches.php') echo 'color:red;border-bottom:none;height: 48px;'.$pdd1; else echo 'border-bottom:none;height: 48px;'.$pdd1; ?>"><a style=" <?php if($uriget=='get-offers.php' or $uriget=='search-stuff.php' ) echo 'color:red;'; ?><?php 



if($offercount==2) echo 'width:34%;float:left;padding:0 0 0 13px;';

else echo 'width:83.8%;';


 ?>" href="get-offers.php">get offers</a>


<?php if($offercount==2) { ?>

<div style="color: white; text-align: center; background: rgb(211, 32, 41) none repeat scroll 0px 0px; line-height: 27px; border-radius: 5px; width: 38px; float: left; margin-right: 105px; margin-top: 0px;float:left;"><?php echo $retoffercount; ?></div>

<?php
}

?>

<span class="glyphicon glyphicon-chevron-right"></span></li>







<li class="active" <?php if($uriget=='whatfolkwants.php' ) echo 'style="color:red;border-bottom:none;height: 48px;"'; else echo 'style="border-bottom:none;height: 48px;"'; ?>><a style="<?php if($uriget=='whatfolkwants.php' ) echo 'color:red;'; ?>width:85%;" href="whatfolkwants.php">make offers</a><span class="glyphicon glyphicon-chevron-right"></span></li>





<?php

$retoffers = offersmade();

$pdd ='';

if($offermade==2)

$pdd = 'padding-top:10px;';

?>



<li class="active" style=" <?php if($uriget=='make_offers_new.php?p=makeoffer' or $uriget=='offersmake_new.php' ) echo 'color:red;border-bottom:none;height: 48px;'.$pdd; else echo 'border-bottom:none;height: 48px;'.$pdd; ?>"><a style=" <?php if($uriget=='make_offers_new.php?p=makeoffer' or $uriget=='offersmake_new.php' ) echo 'color:red;'; ?><?php 



if($offermade==2) echo 'width:38%;float:left;padding:0 0 0 13px;';

else

echo 'width:83.8%;';



 ?>" href="offersmake_new.php">offers i made</a>

<?php if($offermade==2) { ?>
<div style="color: white; text-align: center; background: rgb(211, 32, 41) none repeat scroll 0px 0px; line-height: 27px; border-radius: 5px; width: 38px; float: left; margin-right: 94px; margin-top: 0px;float:left;"><?php echo $retoffers; ?></div>

<?php 

}

?>

<span class="glyphicon glyphicon-chevron-right"></span></li>





<li class="active" <?php if($uriget=='mysearches2.php') echo 'style="color:red;border-bottom:none;height: 48px;"'; else echo 'style="border-bottom:none;height: 48px;"'; ?>><a style="<?php if($uriget=='mysearches2.php') echo 'color:red;'; ?>" href="mysearches2.php">my searches</a><!--<div style="color: white; text-align: center; background: rgb(211, 32, 41) none repeat scroll 0px 0px; line-height: 27px; border-radius: 5px; width: 38px; float: left; margin-right: 92px; margin-top: 0px;float:left;">&nbsp;<?php //usersearches(); ?></div>--><span class="glyphicon glyphicon-chevron-right"></span></li>








<?php

$rettrans = usertransactions();

$pdd2 ='';

if($trans==2)

$pdd2 = 'padding-top:10px;';

?>





            <li class="" style=" <?php if( $uriget=='transactions.php' or $uriget=='transactions_selling.php') echo 'color:red;height: 48px;border-bottom:none;'.$pdd2; else echo 'height: 48px;border-bottom:none;'.$pdd2; ?>"><a style=" <?php if( $uriget=='transactions.php' or $uriget=='transactions_selling.php') echo 'color:red;'; ?>
            
            <?php 



if($trans==2) echo 'width:40%;float:left;padding:0 0 0 13px;';

else echo 'width:83.8%;';



 ?>
            
            " href="transactions.php">transactions</a>
            
            
  <?php if($trans==2) { ?>          

<div style="color: white; text-align: center; background: rgb(211, 32, 41) none repeat scroll 0px 0px; line-height: 27px; border-radius: 5px; width: 38px; float: left; margin-right: 92px; margin-top: 0px;float:left;"><?php echo $rettrans; ?></div>
<?php
  }
?>

<span class="glyphicon glyphicon-chevron-right"></span></li>

   
   
   
<?php


if($_SESSION['member_type']=='0' or $_SESSION['member_type']=='')
{

if($uriget=='go-premium.php')

echo '<li style="color:red;height: 62px;border-top: 1px solid #ccc;padding-top: 10px;"><a style="color:red;" href="go-premium.php">go premium</a><span class="glyphicon glyphicon-chevron-right"></span></li>';


else

echo '<li style="height: 62px;border-top: 1px solid #ccc;padding-top: 10px;"><a style="" href="go-premium.php">go premium</a><span class="glyphicon glyphicon-chevron-right"></span></li>';

}
?>
           

            

            <li <?php if($uriget=='make-money.php') echo 'style="color:red;height: 62px;padding-top: 10px;"'; else echo 'style="height: 62px;padding-top: 10px;"'; ?>><a style="<?php if($uriget=='make-money.php') echo 'color:red;'; ?>" href="make-money.php">make money</a><span class="glyphicon glyphicon-chevron-right"></span></li>

           

            <li class="" <?php if($uriget=='view-profile.php' or $uriget=='notifications.php' ) echo 'style="color:red;border-bottom:none;height: 48px;"'; else echo 'style="border-bottom:none;height: 48px;"'; ?>><a style="<?php if($uriget=='view-profile.php' or $uriget=='notifications.php' )echo 'color:red;border-bottom:none;'; else echo 'border-bottom:none;'; ?>" href="view-profile.php">my account</a><span class="glyphicon glyphicon-chevron-right"></span></li>
            
            
            
            <li class="" style="border-bottom:none;height: 48px;"><a style="" href="logout.php">signout</a><span class="glyphicon glyphicon-chevron-right"></span></li>

           


             <li style="border-bottom:none;height: 48px;"><a style="border-bottom:none;"  href="#">help</a><span class="glyphicon glyphicon-chevron-right"></span></li>

          </ul>

         

        </div>

        

        

        <!--menu ends-->

        

        </div>

        

        </div>
        
    <?php
    
	
	
	
	?>    
        
  				<nav class="navbar navbar-default navbar-static-top showhide3" style=" 
  
    box-shadow: none;
   ">
      <div class="container">
      
           


<div class="col-lg-2 col-sm-4" style="float:left;margin-top: 3px;">      
      
      
<div class="dropdown" style="padding-top: 10px;">
  <div class="dropdown-toggle" style="cursor:pointer"  data-toggle="dropdown" data-hover="dropdown">
   <img src="images/menu-small.png" style="width: 48px;
padding:9px 5px 10px;">
  </div>
  
  
  
  
  <ul class="dropdown-menu">          
  
   <li class=" " <?php if($uriget=='whathapinng.php') echo 'style="color:red;padding-left: 10px;padding-top: 7px;width: 232px;line-height: 35px;"'; else echo 'style="padding-left: 10px;padding-top: 7px;width: 232px;line-height: 35px;"'; ?>><a 
   
  style="<?php if($uriget=='whathapinng.php') echo 'color:red;'; ?>" 
   
    href="whathapinng.php">what's happening</a>
    
   
    
    
    <span class="glyphicon glyphicon-chevron-right"></span></li>

<li class="" <?php if($uriget=='get-offers.php' or $uriget=='search-stuff.php' or $uriget=='mysearches.php') echo 'style="color:red;padding-left: 10px;padding-top: 7px;line-height: 35px;"'; else echo 'style="padding-left: 10px;padding-top: 7px;line-height: 35px;"'; ?>><a style="<?php if($uriget=='get-offers.php' or $uriget=='search-stuff.php' or $uriget=='mysearches.php') echo 'color:red;'; ?>width: 39%;" href="get-offers.php">get offers</a>

 <div style="color: white; text-align: center; float: left; background: rgb(211, 32, 41) none repeat scroll 0px 0px; width: 38px; line-height: 27px; border-radius: 5px; margin-right: 69px; margin-top: 5px;"><?php echo countoffers(); ?></div>

<span class="glyphicon glyphicon-chevron-right"></span></li>


<li class="" <?php if($uriget=='whatfolkwants.php' ) echo 'style="color:red;padding-left: 10px;padding-top: 7px;line-height: 35px;"'; else echo 'style="padding-left: 10px;padding-top: 7px;line-height: 35px;"'; ?>><a style="<?php if($uriget=='whatfolkwants.php') echo 'color:red;'; ?>" href="whatfolkwants.php">make offers</a><span class="glyphicon glyphicon-chevron-right"></span></li>


<li class="" <?php if($uriget=='make_offers_new.php?p=makeoffer' or $uriget=='offersmake_new.php' ) echo 'style="color:red;padding-left: 10px;padding-top: 7px;line-height: 35px;"'; else echo 'style="padding-left: 10px;padding-top: 7px;line-height: 35px;"'; ?>>



<a style="<?php if($uriget=='make_offers_new.php?p=makeoffer' or $uriget=='offersmake_new.php' ) echo 'color:red;'; ?>width: 48%;" href="offersmake_new.php">offers i made</a>


<div style="color: white; text-align: center; float: left; background: rgb(211, 32, 41) none repeat scroll 0px 0px; width: 38px; line-height: 27px; border-radius: 5px; margin-right: 51px; margin-top: 5px;"><?php echo offersmade(); ?></div><span class="glyphicon glyphicon-chevron-right"></span></li>




         <li class="" <?php if($uriget=='mysearches2.php') echo 'style="color:red;padding-left: 10px;padding-top: 7px;line-height: 35px;"'; else echo 'style="padding-left: 10px;padding-top: 7px;line-height: 35px;"'; ?>>
         
         
         <a style="<?php if($uriget=='mysearches2.php') echo 'color:red;'; ?>width:47%;" href="mysearches2.php">my searches</a>
         
         <div style="color: white; text-align: center; float: left; background: rgb(211, 32, 41) none repeat scroll 0px 0px; width: 38px; line-height: 27px; border-radius: 5px; margin-right: 51px; margin-top: 5px;"><?php //usersearches(); ?></div>
         
         
         <span class="glyphicon glyphicon-chevron-right"></span></li>





<li class="" <?php if($uriget=='transactions.php' or $uriget=='transactions_selling.php'  or $uriget=='transactions_buying.php')echo 'style="color:red;border-bottom: 1px solid #ccc;line-height: 35px;padding-left: 10px;"'; else echo 'style="border-bottom: 1px solid #ccc;padding-left: 10px;padding-top: 7px;line-height: 35px;"'; ?>><a style="<?php if($uriget=='transactions.php' or $uriget=='transactions_selling.php'  or $uriget=='transactions_buying.php') echo 'color:red;'; ?>width:47%;" href="transactions.php">transactions</a>

 <div style="color: white; text-align: center; float: left; background: rgb(211, 32, 41) none repeat scroll 0px 0px; width: 38px; line-height: 27px; border-radius: 5px; margin-right: 51px; margin-top: 5px;"><?php echo usertransactions(); ?></div>


<span class="glyphicon glyphicon-chevron-right"></span></li>
   
<?php


if($_SESSION['member_type']=='0' or $_SESSION['member_type']=='')
{

if($uriget=='go-premium.php')

echo '<li style="color:red;border-bottom: 1px solid #ccc;padding-left: 10px;padding-top: 7px;line-height: 35px;"><a style="color:red;" href="go-premium.php">go premium</a><span class="glyphicon glyphicon-chevron-right"></span></li>';


else

echo '<li style="border-bottom: 1px solid #ccc; padding-left: 10px;padding-top: 7px;line-height: 35px;"><a style=""  href="go-premium.php">go premium</a><span class="glyphicon glyphicon-chevron-right"></span></li>';

}
?>
           

            

            <li <?php if($uriget=='make-money.php') echo 'style="color:red;border-bottom: 1px solid #ccc;padding-left: 10px;padding-top: 7px;line-height: 35px;"'; else echo 'style="border-bottom: 1px solid #ccc;padding-left: 10px;padding-top: 7px;line-height: 35px;"';  ?>><a style="<?php if($uriget=='make-money.php') echo 'color:red;'; ?>" href="make-money.php">make money</a><span class="glyphicon glyphicon-chevron-right"></span></li>

           

            <li class="" <?php if($uriget=='view-profile.php' or $uriget=='notifications.php' ) echo 'style="color:red;padding-left: 10px;padding-top: 7px;line-height: 35px;"'; else echo 'style="padding-left: 10px;padding-top: 7px;line-height: 35px;"'; ?>><a style="<?php if($uriget=='view-profile.php' or $uriget=='notifications.php' ) echo 'color:red;'; ?>" href="view-profile.php">my account</a><span class="glyphicon glyphicon-chevron-right"></span></li>
            
            
            
            <li class="" style="padding-left: 10px;padding-top: 7px;line-height: 35px;"><a style=""  href="logout.php">signout</a><span class="glyphicon glyphicon-chevron-right"></span></li>

           


             <li style="padding-left: 10px;padding-top: 7px;line-height: 35px;"><a  style=""  href="#">help</a><span class="glyphicon glyphicon-chevron-right"></span></li>
          </ul>
          

        </div><!--/.nav-collapse -->
        
        
        
        
        
     
        
        
        
        
        
        </div>
        
        
        
        
        
        
        
        
            <div class="col-lg-10 showthis2" style="color:#7e7e7e; font-family:Tahoma, Geneva, sans-serif; font-size:14px;margin-top:20px; margin-bottom:12px; float:right;">
       
  
  <div class="btn-group btn-input clearfix">
                
                
                 <?php
               
			   /*$uriget=='get-offers.php' or*/
			   if( $uriget=='search-stuff.php' or $uriget=='mysearches.php')
			   
			   {
				   
				    if($uriget=='get-offers.php' )
					
					$selectedis = 'get offers';
					
					elseif($uriget=='search-stuff.php' )
				   
				
				 $selectedis = 'search for stuff';
				  
				  elseif($uriget=='mysearches.php')
				   
				
				  $selectedis = 'my searches';
				  
				  
				  echo '<button type="button" class="btn btn-default dropdown-toggle form-control" data-toggle="dropdown">
                   <span data-bind="label">'.$selectedis.'</span>&nbsp;<span class="caret"></span>
                 </button>
				  
				  
				  <ul class="dropdown-menu" role="menu" id="mm">
                   <li><a id="whathappen" href="get-offers.php">get offers</a></li>
                   <li><a id="whatfolkswant" href="search-stuff.php">search for stuff</a></li>
                   <li><a id="folksoffers" href="mysearches.php">my searches</a></li>
                 </ul>';   
				
				
			   }/*or $uriget=='mysearches2.php'*/    /*or $uriget=='offersmake_new.php'*/
			   
			   else  if($uriget=='make_offers_new.php?p=makeoffer' )
			   
			   {
				   
				   $selectedis = 'make offers';
				   
				    if($uriget=='make_offers_new.php?p=makeoffer' )
					
					$selectedis = 'make offers';
					
					elseif($uriget=='offersmake_new.php' )
				   
				
				 $selectedis = 'offers i\'ve made';
				  
				  elseif($uriget=='mysearches2.php')
				   
				
				  $selectedis = 'my searches';
				  
				  
				  echo ' <button type="button" class="btn btn-default dropdown-toggle form-control" data-toggle="dropdown">
                   <span data-bind="label">'.$selectedis.'</span>&nbsp;<span class="caret"></span>
                 </button>
                 <ul class="dropdown-menu" role="menu" id="mm">
                   <li><a id="whathappen" href="make_offers_new.php?p=makeoffer">make offers</a></li>
                   <li><a id="whatfolkswant" href="offersmake_new.php">offers i\'ve made</a></li>
                   <li><a id="folksoffers" href="mysearches2.php">my searches</a></li>
                 </ul>';   
				
				
			   }
			   /*or $uriget=='notifications.php' or $uriget=='transactions.php' or $uriget=='transactions_selling.php'*/
			  /*  else  if($uriget=='view-profile.php' )
			   
			   {
				   
				    $selectedis = 'general';
					
					if($uriget=='general.php' )
					
					$selectedis = 'general';
					
					elseif($uriget=='notifications.php' )
				   
				
				 $selectedis = 'notifications';
				  
				  elseif($uriget=='transactions.php' or $uriget=='transactions_selling.php')
				   
				
				  $selectedis = 'transactions';
				  
				  
				  echo ' <button type="button" class="btn btn-default dropdown-toggle form-control" data-toggle="dropdown">
                   <span data-bind="label">'.$selectedis.'</span>&nbsp;<span class="caret"></span>
                 </button>
                 <ul class="dropdown-menu" role="menu" id="mm">
                   <li><a id="whathappen" href="view-profile.php">general</a></li>
                   
                   <li><a id="folksoffers" href="transactions.php">transactions</a></li>
                 </ul>';   
				
				
			   }*/
			   
			   /* else  if($uriget=='whathapinng.php')
			   
			   {
				   
				   
				  
				  
				  echo ' <button type="button" class="btn btn-default dropdown-toggle form-control" data-toggle="dropdown">
                   <span data-bind="label">what’s happening</span>&nbsp;<span class="caret"></span>
                 </button>
                 <ul class="dropdown-menu" role="menu" id="mm">
                   <li><a id="" href="#">what’s happening</a></li>
                   <li><a id="" href="#">what folks want</a></li>
                   <li><a id="" href="#">what folks are offering</a></li>
                 </ul>';   
				
				
			   }*/
			   
			   
				   
			   
			   ?> 
                 
               </div>
  
  
        </div>
        
      </div>
    </nav>
    
    <?php 
	
	
	
	?>