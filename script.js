/*
Author: Pradeep Khodke
URL: http://www.codingcage.com/
*/

$('document').ready(function()
{ 
     /* validation */
	 $("#login-form").validate({
      rules:
	  {
			password: {
			required: true,
			},
			user_email: {
            required: true,
            email: true
            },
	   },
       messages:
	   {
            password:{
                      required: "please enter your password"
                     },
            user_email: "please enter your email address",
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* login submit */
	   function submitForm()
	   {		
			var data = $("#login-form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : 'login_process.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success :  function(response)
			   {						
					response = response.trim();
					
					if(response=="ok"){
									
						$("#btn-login").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
						setTimeout(' window.location.href = "whathapinng.php"; ',1000);
					}
					else{
						
						
									
						$("#error").fadeIn(1000, function(){						
				$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
											$("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
									});
					}
			  }
			});
				return false;
		}
	   /* login submit */
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
});


$('document').ready(function()
{ 
     /* validation */
	 $("#register-form").validate({
      rules:
	  {
			user_name: {
		    required: true,
			minlength: 3
			},
			password: {
			required: true,
			minlength: 8,
			maxlength: 15
			},
			cpassword: {
			required: true,
			equalTo: '#password2'
			},
			user_email: {
            required: true,
            email: true
            },
			
			zipcode: {
            required: true
            
            },
			
			
	   },
       messages:
	   {
            user_name: "please enter user name",
            password:{
                      required: "please provide a password",
                      minlength: "password at least have 8 characters"
                     },
            user_email: "please enter a valid email address",
			cpassword:{
						required: "please retype your password",
						equalTo: "password doesn't match !"
					  }
       },
	   submitHandler: submitForm2	
       });  
	   /* validation */
	   
	   /* form submit */
	   function submitForm2()
	   {		
				var data = $("#register-form").serialize();
				
				$.ajax({
				
				type : 'POST',
				url  : 'register.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
											$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry email/username already taken !</div>');
											
											$("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');
										
									});
																				
								}
								else if(data=="user created successfully!")
								{
									
									$("#btn-submit").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing Up ...');
									
									setTimeout(successfunc,1000);
									
									//setTimeout('$(".form-signin2").fadeOut(500, function(){ $(".signin-form").load("success.php"); }); ',5000);
									
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');
											
									$("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');
										
									});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
	   
	   
	 

});

function successfunc()
{
	
	$("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Account created');
	
	window.location='whathapinng.php';
	
	}
	
	
	
	
	
	
	
function postagain()

{
	 
	 /* validation */
	 $("#register-form2").validate({
      rules:
	  {
			
			password: {
			required: true,
			minlength: 8,
			maxlength: 15
			},
			cpassword: {
			required: true,
			equalTo: '#password2'
			},
			user_email: {
            required: true,
            email: true
            },
			paypal_email: {
		    required: true,
			email: true
			},
			
	   },
       messages:
	   {
            user_name: "please enter user name",
            password:{
                      required: "please provide a password",
                      minlength: "password at least have 8 characters"
                     },
            user_email: "please enter a valid email address",
			
			 paypal_email: "please enter a valid paypal email address",
			 
			cpassword:{
						required: "please retype your password",
						equalTo: "password doesn't match !"
					  },
					  
					  
					  
       },
	   submitHandler: submitForm3	
       });  
	   /* validation */
	   
	   /* form submit */
	   function submitForm3()
	   {		
				var data = $("#register-form2").serialize();
				
				$.ajax({
				
				type : 'POST',
				url  : 'register2.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
											$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry email already taken !</div>');
											
											$("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; update');
										
									});
																				
								}
								else if(data=="registered")
								{
									
									$("#btn-submit").html('<img src="btn-ajax-loader.gif" /> &nbsp; updating ...');
									
									setTimeout(successfunc2,2000);
									
									//setTimeout('$(".form-signin2").fadeOut(500, function(){ $(".signin-form").load("success.php"); }); ',5000);
									
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');
											
									$("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Update');
										
									});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
	   
	   

}


function successfunc2()
{
	
	$("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; details updated');
	
	}
	
	
	
/*$('document').ready(function()
{ 	



$('#btn-submit').click(function (event) {
    event.preventDefault()
   var file = $('#user_avatar').get(0).files[0];
   var formData = new FormData();
   formData.append('file', file);
   $.ajax({
       url: 'register3.php',
       //Ajax events
       beforeSend: function (e) {
         //alert('Are you sure you want to upload document.');
       },
       success: function (e) {
         
		 alert(e)
		 alert('Upload completed');
		 
		 postagain();
		 
		 return false;
		 
       },
       error: function (e) {
         alert('error ' + e.message);
       },
       // Form data
       data: formData,
       type: 'POST',
       //Options to tell jQuery not to process data or worry about content-type.
       cache: false,
       contentType: false,
       processData: false
    });
	
    return false;
});

});
	*/
	
	
	
	
	
	