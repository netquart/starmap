<?php

require 'SimpleImage.php';


try {
  // Create a new SimpleImage object
  $image = new \claviska\SimpleImage();

  // Manipulate it
  $image
    ->fromFile($_GET['img'])              // load parrot.jpg
    ->autoOrient()                        // adjust orientation based on exif data
    ->bestFit($_GET['w'], $_GET['h'])                   // proportinoally resize to fit inside a 250x400 box
    ->flip('x')                           // flip horizontally
          // tint dark green
            // add a 5 pixel black border
  // add a watermark image
    ->toScreen();                         // output to the screen

} catch(Exception $err) {
  // Handle errors
  echo $err->getMessage();
}