<?php


//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '922846045697-uknrdtobi66djph5lrvehcs6ot1lc3cd.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'Xbpmx2qo2dLiVbZmYZ-fRQFY'; //Google client secret
$redirectURL = 'https://wowme.deals/index3.php'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to wowme.deals');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>