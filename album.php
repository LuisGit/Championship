<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
//Header
	$cssPage ='album';
	$title = 'Alb&#250;m';
	$classBody="album";
	$ifNav="yes";
	include('includes/header.php');
	
	$FBid = 'phraseit.cr';
	$FBAlbumId='147672652062673';
	
	//Get the contents of a Facebook page
	$FBpage = file_get_contents('https://graph.facebook.com/'.$FBid.'/albums');
	
	//Interpret data with JSON
	$photoData = json_decode($FBpage);
	
?>
<div class="row">
<ul id="display-inline-block"> 
<?php

	$rawAlbumData = file_get_contents('https://graph.facebook.com/'.$FBAlbumId.'/photos');
	//Interpret data with JSON
	$photoData = json_decode($rawAlbumData);

	foreach($photoData->data as $data){
		echo '<li><img src="'.$data->picture.'" width=170 border=0 /></li>';
	}
?>
</ul>
</div>
<?php
	include('includes/footer.php');
?>

</body>
</html>