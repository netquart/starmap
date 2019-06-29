<?php
define("APPID","540529686144427");
define("SECRET","b0fea5bfe5e4cc06351872e653de4cc1");

require 'facebook/facebook.php';

$facebook = new Facebook(array(
  'appId'  => APPID,
  'secret' => SECRET,
));


?>
