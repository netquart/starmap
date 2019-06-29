<?php


//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = 'clientid'; //Google client ID
$clientSecret = 'secret'; //Google client secret
$redirectURL = 'url'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to wowme.deals');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
