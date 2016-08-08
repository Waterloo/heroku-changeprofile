<?php

  require( __DIR__.'/facebook_start.php' );
  require( __DIR__.'/cred.php' );
 
  $helper = $fb->getRedirectLoginHelper();
 
  $permissions = ['email', 'user_posts','publish_actions']; // optional
  
  $loginUrl    = $helper->getLoginUrl($callback_url, $permissions);

  ?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Show your support for Net Neutralty </title>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <img src=<?php echo $bg_path?> class="bg">
    <div class="container">
      <div class="row">
        
        <div class="header">
       
		  <h1 id="fb-welcome"></h1>
		  
          <img class="profile" id="fbprofile" src="images/nopic.jpg"/>
        </div>
        <div class="content">
        <br/>
        <p>Show your support for Arshavir by updating your facebook picture. </p>       
          <a class="button button-primary" id="btnlogin"  > Log in to Facebook </a> 
		  <p/>
		  <a class="button button-primary" id="btnchangeprofile" style="visibility:hidden"  > Change profile </a> 
       
	 
       </div>
       

      </div>
    </div>
	


	<script type="text/javascript" src="js/jquery.js"></script>
	
<script>
var FB
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1144848292205064',
      xfbml   : false,  // disable xfbml improves the page load time
    	version : 'v2.2', // use version 2.4
		status  : true, // Check for user login status right away
	  cookie: true // This is important, it's not enabled by default

    });

    // ADD ADDITIONAL FACEBOOK CODE HERE
  };
  // Place following code after FB.init call.

  

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   
   
   
  function sendUserInformation(){
	
	
		
		
		
		FB.api('/me?fields=first_name', function(data) {
		  var welcomeBlock = document.getElementById('fb-welcome');
		  welcomeBlock.innerHTML = 'Hello, ' + data.first_name + '!';
		  
		  FB.api(
				"/me/picture",
				function (response) {
				  if (response && !response.error) {
					/* handle the result */
					
					
					 document.getElementById('fbprofile').setAttribute("src",response.data.url)
					
					  
					    
	   
					 
					
				  }else{
					 
					 
				  }
				}
			);

		 
		  //Set profile picture now 
		  
		  
		});
		

}

	function onLogin(response) {
	  if (response.status == 'connected') {
		  
		  
		   document.getElementById('btnlogin').style.visibility="hidden"
				//	  document.getElementById('btnchangeprofile').style.visibility="visible"
					  
		  $.get( "jslogin.php?inte="+Math.random(), function( data ) {
						
				  document.location="overlay.php"
				});
	
	  }else{
		  
		   
					//  document.getElementById('btnchangeprofile').style.visibility="hidden"
					  document.getElementById('btnlogin').style.visibility="visible"
	  }
	}


	
    function authenticate() {
		if(!FB)
			return;
		
		
			FB.getLoginStatus(function(response) {
			  // Check login status on load, and if the user is
			  // already logged in, go directly to the welcome message.
			  if (response.status == 'connected') {
				onLogin(response);
			  } else {
				// Otherwise, show Login dialog first.
				FB.login(function(response) {
				  onLogin(response);
				}, {scope: 'email,user_photos,publish_actions'});
			  }
			});
	}
	
	
	function setcookie(){
  
			  
		
		}
	

	
$(function() {
  
  	 authenticate();

	//document.getElementById("btnchangeprofile").addEventListener("click", changeprofile);
	document.getElementById("btnlogin").addEventListener("click", authenticate);
  
	  
	
  });	
  
</script>

	
	
	

  </body>
</html>
