<?php
set_time_limit(10000);
error_reporting(0);
include 'resize.image.class.php';




function cropImage($sourcePath, $thumbSize, $destination = null) {

  $parts = explode('.', $sourcePath);
  $ext = $parts[count($parts) - 1];
  if ($ext == 'jpg' || $ext == 'jpeg') {
    $format = 'jpg';
  } else {//if($ext=='png')
    $format = 'png';
  }

  if ($format == 'jpg') {
    $sourceImage = imagecreatefromjpeg($sourcePath);
  }
  if ($format == 'png') {
    $sourceImage = imagecreatefrompng($sourcePath);
  }

  list($srcWidth, $srcHeight) = getimagesize($sourcePath);

  // calculating the part of the image to use for thumbnail
  if ($srcWidth > $srcHeight) {
    $y = 0;
    $x = ($srcWidth - $srcHeight) / 2;
    $smallestSide = $srcHeight;
  } else {
    $x = 0;
    $y = ($srcHeight - $srcWidth) / 2;
    $smallestSide = $srcWidth;
  }

  $destinationImage = imagecreatetruecolor($thumbSize, $thumbSize);
  imagecopyresampled($destinationImage, $sourceImage, 0, 0, $x, $y, $thumbSize, $thumbSize, $smallestSide, $smallestSide);

  if ($destination == null) {
    header('Content-Type: image/jpeg');
    if ($format == 'jpg') {
      imagejpeg($destinationImage, null, 100);
    }
    if ($format == 'png') {
      imagejpeg($destinationImage);
    }
    if ($destination = null) {
    }
  } else {
    if ($format == 'jpg') {
      imagejpeg($destinationImage, $destination, 100);
    }
    if ($format == 'png') {
      imagepng($destinationImage, $destination);
    }
  }
}



//cropImage($_GET['image'], '54', $_GET['image']);





$resize_image = new Resize_Image;
// Folder where the (original) images are located with trailing slash at the end
$images_dir = '';
// Image to resize
$image = $_GET['image'];
/* Some validation */
if(!@file_exists($images_dir.$image))
{
exit('The requested image does not exist.');
}
// Get the new with & height
$new_width = (int)$_GET['new_width'];
$new_height = (int)$_GET['new_height'];
$resize_image->new_width = $new_width;
$resize_image->new_height = $new_height;
$resize_image->image_to_resize = $images_dir.$image; // Full Path to the file
$resize_image->ratio = true; // Keep aspect ratio
$process = $resize_image->resize(); // Output image
?>