<?php

require_once("class2.php");

global $conn;

$data = $_POST['image'];


list($type, $data) = explode(';', $data);

list(, $data)      = explode(',', $data);


$data = base64_decode($data);

$imageName = time().'.png';


$folder="images/avatars/".$_SESSION['user_session'];

 

 if(!is_dir($folder))

 

 mkdir($folder);



file_put_contents('images/avatars/'.$_SESSION['user_session'].'/'.$imageName, $data);

mysqli_query($conn,"update users set user_avatar='".'images/avatars/'.$_SESSION['user_session'].'/'.$imageName."' where user_id='".$_SESSION['user_session']."'");


echo 'done';

?>