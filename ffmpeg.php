<?php


function makeMultipleTwo ($value)

	{

	$sType = gettype($value/2);

	if($sType == "integer")

	{

	return $value;

	} else {

	return ($value-1);

	}

	}





$srcFile = "/home/wowme/public_html/images/sample/20160709_155652.mp4";
$destFile = "/home/wowme/public_html/images/sample/";
$ffmpegPath = "/usr/local/bin/ffmpeg";
$flvtool2Path = "/usr/local/bin/flvtool2";



//ffmpeg -i input.mp4 -b:v 200k -c:v libx264 -vf scale=640:360 -pix_fmt yuv420p -c:a aac -strict experimental -b:a 128k -ac 2 -ar 44100 -threads 2 -f mp4 output.mp4

//ffmpeg -i cube.mp4 -acodec libvorbis -aq 5 -ac 2 -qmax 25 -threads 2 cube.webm


//exec("".$ffmpegPath." -i ".$srcFile." -acodec libvorbis -aq 5 -ac 2 -qmax 25 -threads 2 ".$destFile."output3.mp4");

//ffmpeg -i $video_from -acodec libfaac -ab 96k -vcodec libx264 -vpre slower -vpre main -level 21 -refs 2 -b 345k -bt 345k -threads 0 -s 640x360 $video_to

//exec("".$ffmpegPath." -i ".$srcFile." -acodec libfaac -ab 96k -vcodec libx264 -vpre slower -vpre main -level 21 -refs 2 -b 345k -bt 345k -threads 0 -s 320x480 ".$destFile."output3.mp4");


exec("".$ffmpegPath." -i ".$srcFile." -c:v libx264 -c:a aac -strict experimental -pix_fmt yuv420p -movflags +faststart ".$destFile."output3.mp4");

//exec("".$ffmpegPath." -i ".$srcFile." -vcodec h264 -vf scale=320:480 -acodec aac -strict -2 ".$destFile."output.mp4");


/*// Create our FFMPEG-PHP class
$ffmpegObj = new ffmpeg_movie($srcFile);
// Save our needed variables
$srcWidth = makeMultipleTwo($ffmpegObj->getFrameWidth());
$srcHeight = makeMultipleTwo($ffmpegObj->getFrameHeight());
$srcFPS = $ffmpegObj->getFrameRate();
$srcAB = intval($ffmpegObj->getAudioBitRate()/1000);
$srcAR = $ffmpegObj->getAudioSampleRate();
$srcVB = floor($ffmpegObj->getVideoBitRate()/1000); 

// Call our convert using exec() to convert to the three file types needed by HTML5
exec($ffmpegPath . " -i ". $srcFile ." -vcodec libx264 -vpre hq -vpre ipod640 -b ".$srcVB."k -bt 100k -acodec libfaac -ab " . $srcAB . "k -ac 2 -s " . $srcWidth . "x" . $srcHeight . " ".$destFile.".mp4");*/









?>