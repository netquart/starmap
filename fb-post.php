<?php
if(!session_id()){
    session_start();
}



include ("connection.php");



// added in v4.0.0
require_once __DIR__ . '/Facebook/autoload.php';

// Include required libraries
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

/*
 * Configuration and setup Facebook SDK
 */
$appId         = 'appid'; //Facebook App ID
$appSecret     = 'secret'; //Facebook App Secret
$redirectURL   = 'redirecturl'; //Callback URL


//$fbPermissions = array('publish_actions'); //Facebook permission

$fbPermissions = array('publish_actions', 'manage_pages', 'email', 'publish_pages','publish_stream');



/*$fb = new Facebook(array(
    'app_id' => $appId,
    'app_secret' => $appSecret,
    'default_graph_version' => 'v2.2',
));*/


/*$fb = new Facebook(array(
                    'appId'  =>  $appId,
                    'secret' =>  $appSecret,
            ));
$fbPermissions = array(
                        'scope'=>'publish_stream,manage_pages,publish_pages'

                );
*/				
/*$loginUrl = $fb->getLoginUrl($fbPermissions); // Use this to request them to login in then when they are do the following you will need them to return to your app

$fb = new Facebook(array(
    'app_id' => $appId,
    'app_secret' => $appSecret,
    'default_graph_version' => 'v2.2',
));*/


/*$fb = new Facebook(array(
                    'appId'  => $appId,
                    'secret' =>  $appSecret,
            ));*/
			
$fb = new Facebook(array(
    'app_id' => $appId,
    'app_secret' => $appSecret,
    'default_graph_version' => 'v2.2',
));

// Get redirect login helper
$helper = $fb->getRedirectLoginHelper();

// Try to get access token
try {
    if(isset($_SESSION['facebook_access_token'])){
        $accessToken = $_SESSION['facebook_access_token'];
    }else{
        $accessToken = $helper->getAccessToken();
    }
} catch(FacebookResponseException $e) {
     echo 'Graph returned an error: ' . $e->getMessage();
      exit;
} catch(FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
}
?>
