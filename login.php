<?php



session_start();



//$_SESSION['user_session'] = 2;



if(isset($_SESSION['user_session'])!="")

{

	header("Location: whathapinng.php");

}



include_once 'gpConfig.php';



if(isset($_GET['code'])){

	$gClient->authenticate($_GET['code']);

	$_SESSION['token'] = $gClient->getAccessToken();

	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));

}



if (isset($_SESSION['token'])) {

	$gClient->setAccessToken($_SESSION['token']);

}







$authUrl = $gClient->createAuthUrl();


if (!isset($_SESSION['token2']))
{
    $token = md5(uniqid(rand(), TRUE));
    
	$_SESSION['token2'] = $token;
}

else
$token = $_SESSION['token2'];





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Login Form</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 

<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>

<script type="text/javascript" src="validation.min.js"></script>

<link href="style.css" rel="stylesheet" type="text/css" media="screen">

<script type="text/javascript" src="script.js"></script>



<link rel="stylesheet" href="bootstrap/css/style.css" >



</head>



<body>

    



































<div class="container">

        

        

        <div style="margin-top:20px;" class="col-lg-12 custom_padding">

        

        <div class="col-lg-6 custom_padding showhide" style="background:#cb0000;min-height:690px;height:auto;">

        

        

        

        </div>

        

        <div style="background:#ffffff;height:auto;min-height:690px;" class="col-lg-6 col-md-12 col-sm-12 custom_padding">

        

         <div class="col-lg-12 col-md-12 col-sm-12" style="text-align:center; padding-bottom:15px;padding-top:15px;">Login with</div>

         

         <div class="col-lg-12 col-md-12 col-sm-12" style="text-align:center; padding-bottom:15px;" align="center">

         

         <div style="display:inline-block; text-align:center; width:100%; display: flex;

  justify-content: center;" align="center">

         

         <div class="col-lg-3">

         

         <!--<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">

</fb:login-button>-->

         <!--id="loginBtn"-->

         <a href="fbconfig.php"><img  style="cursor:pointer"  src="images/fb.png"></a></div>

         

         <div class="col-lg-3"><a href="<?php echo filter_var($authUrl, FILTER_SANITIZE_URL); ?>"><img  src="images/gg.png"></a></div>

         

         <div class="col-lg-3"><a href="twitter_login.php"><img id="connect" style="cursor:pointer" src="images/tw.png"></a></div>

         

         </div>

         

         </div>

         

         <div class="col-lg-12 col-md-12 col-sm-12" style="text-align:center; padding-bottom:10px;padding-top:10px;">or</div>

        

        

     

        

        

        

        <div class="col-lg-12 col-md-12 col-sm-12" 

         

 align="center">

         

        



     <div class="signin-form">



	

     

        

       <form class="form-signin" method="post" id="login-form" name="signin">

      

      

        

        <div id="error">

        <!-- error will be shown here ! -->

        </div>

        

        <div class="form-group">

        <input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />

        <span id="check-e"></span>

        </div>

        

        <div class="form-group">

        <input type="password" class="form-control" placeholder="Password" name="password" id="password" />

        </div>

       

     

        

        <div class="form-group">

            <button type="submit" class="btn btn-default buttonred" name="btn-login" id="btn-login">

    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In

			</button> 
            
            
            <input type="hidden" name="token2" id="token2" value="<?php echo $token; ?>"/>


        </div>  

        

      

      

      </form>



    </div>

    



<div class="signin-form">



	

     

        

       <form class="form-signin" method="post" id="register-form" name="register">

      

        <h2 class="form-signin-heading">Sign Up</h2>

        

        <div id="error">

        <!-- error will be showen here ! -->

        </div>

        

        <div class="form-group">

        <input type="text" class="form-control" placeholder="Username" name="user_name" id="user_name" />

        </div>

        

        <div class="form-group">

        <input type="email" class="form-control" placeholder="Email address" name="user_email" id="user_email" />

        <span id="check-e"></span>

        </div>

        

        <div class="form-group">

        <input type="password" class="form-control" placeholder="Password" name="password" id="password2" />

        </div>

        

        <div class="form-group">

        <input type="password" class="form-control" placeholder="Retype Password" name="cpassword" id="cpassword" />

        </div>
        
          <div class="form-group">

        <input type="text" class="form-control" placeholder="zip code" name="zipcode" id="zipcode" />

        </div>

     

        

        <div class="form-group">

            <button type="submit" class="btn btn-default buttonred" name="btn-save" id="btn-submit">

    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account

			</button> 

        </div>  

       <input type="hidden" name="token2" id="token2" value="<?php echo $token; ?>"/>

      </form>



   

    

</div>



      

      

      

     

   



        

        </div>

        

        

        

        

        

        

      </div>

  



</div></div>








<div id="response"></div>

<script>


/*


function getUserData() {

	FB.api('/me', function(response) {

		

		alert(response.length)

		

		for(var i=0;i<response.length;i++)

		alert(response[i])

		

		document.getElementById('response').innerHTML = 'Hello ' + response.email;

	});

}

 

window.fbAsyncInit = function() {

	//SDK loaded, initialize it

	FB.init({

		appId      : '540529686144427',

		xfbml      : true,

		version    : 'v2.7'

	});

 

	//check user session and refresh it

	FB.getLoginStatus(function(response) {

		if (response.status === 'connected') {


		FB.api('/me?fields=id,email,name', function(data) {

        

		

		

		//console.log( data.email ) // it will not be null ;)

    })

			

		} else {

			//user is not authorized

		}

	});

};

 

//load the JavaScript SDK

(function(d, s, id){

	var js, fjs = d.getElementsByTagName(s)[0];

	if (d.getElementById(id)) {return;}

	js = d.createElement(s); js.id = id;

	js.src = "//connect.facebook.com/en_US/sdk.js";

	fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));

 

//add event listener to login button

document.getElementById('loginBtn').addEventListener('click', function() {

	//do the login

    if( navigator.userAgent.match('CriOS') )
   
    window.open('https://www.facebook.com/dialog/oauth?client_id=540529686144427&redirect_uri='+ document.location.href +'&scope=email,public_profile', '', null);
   
   else
   
   FB.login(function(response) {

		if (response.authResponse) {


		FB.api('/me?fields=id,email,name', function(data) {

		

		 window.location='validatefb.php?name='+data.name+'&email='+data.email;

    })


		}


	}, {scope: 'email,public_profile', return_scopes: true});
	
	
	

}, false);




*/




</script>










<!--<div id="fb-root" style="float:left; width:1px;"></div>-->



<!--<script src="http://connect.facebook.net/en_US/all.js"></script>-->


<?php


//print_r($_SESSION);

//if()

?>
<script>


<?php


//if()

?>


/*function getUserData() {

	FB.api('/me', function(response) {

		

		alert(response.length)

		

		for(var i=0;i<response.length;i++)

		alert(response[i])

		

		document.getElementById('response').innerHTML = 'Hello ' + response.email;

	});

}

 

window.fbAsyncInit = function() 

{

	//SDK loaded, initialize it

	FB.init({

		appId      : '540529686144427',

		xfbml      : true,

		version    : 'v2.7'

	});

 

	//check user session and refresh it

	FB.getLoginStatus(function(response) 
	
	{

		if (response.status === 'connected') 
		
		{
			

		   FB.api('/me?fields=id,email,name', function(data) {

           })

		}
		
		else 
		
		{


		}
		
		
		

	});

};

 
  //alert(window.location.hash);
 

//load the JavaScript SDK

(function(d, s, id){

	var js, fjs = d.getElementsByTagName(s)[0];

	if (d.getElementById(id)) {return;}

	js = d.createElement(s); js.id = id;

	js.src = "//connect.facebook.com/en_US/sdk.js";

	fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));


document.getElementById('loginBtn').addEventListener('click', function() {
	
	
	
	var uri = encodeURI('https://wowme.deals/login.php');

    FB.getLoginStatus(function(response) {
   
    if (response.authResponse) {
		FB.api('/me?fields=id,email,name', function(data) {

		 window.location='https://wowme.deals/validatefb.php?name='+data.name+'&email='+data.email;

    })

		} else {
        window.location = encodeURI("https://www.facebook.com/dialog/oauth?client_id=540529686144427&redirect_uri="+uri+"&response_type=token");
    }

  }, {scope: 'email,public_profile', return_scopes: true});


	
	
	
	

}, false);
*/


/*function gotoagain()

{


	var uri = encodeURI('https://wowme.deals/home.php');
FB.getLoginStatus(function(response) {
   
    if (response.authResponse) {

		FB.api('/me?fields=id,email,name', function(data) {

		 window.location='https://wowme.deals/validatefb.php?name='+data.name+'&email='+data.email;

    })

		} else {
        window.location = encodeURI("https://www.facebook.com/dialog/oauth?client_id=540529686144427&redirect_uri="+uri+"&response_type=token");
    }

  }, {scope: 'email,public_profile', return_scopes: true});

	
	
}*/



/*document.getElementById('loginBtn').addEventListener('click', function() {
	
	FB.login(function(response) {

		if (response.authResponse) {

		FB.api('/me?fields=id,email,name', function(data) {

		 window.location='https://wowme.deals/validatefb.php?name='+data.name+'&email='+data.email;

    })

		}

	}, {scope: 'email,public_profile', return_scopes: true});

}, false);*/


/*var uri = encodeURI('http://example.com');
FB.getLoginStatus(function(response) {
    if (response.status === 'connected') {
        window.location.href=uri;
    } else {
        window.location = encodeURI("https://www.facebook.com/dialog/oauth?client_id=YOUR_APP_ID&redirect_uri="+uri+"&response_type=token");
    }
});*/

</script>



    

<script src="bootstrap/js/bootstrap.min.js"></script>



</body>

</html>