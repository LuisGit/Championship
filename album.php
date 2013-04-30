<?php
//Header
	$cssPage ='album';
	$title = 'Alb&#250;m';
	$classBody="album";
	$ifNav="yes";
	$backPage="index.php";
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
		echo '<li><img src="'.$data->picture.'" /></li>';
	}
?>
</ul>
</div>
<?php
	include('includes/footer.php');
?>