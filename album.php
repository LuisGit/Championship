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
	<ul class="small-block-grid-4 large-block-grid-5">
<?php

	$rawAlbumData = file_get_contents('https://graph.facebook.com/'.$FBAlbumId.'/photos');
	//Interpret data with JSON
	$photoData = json_decode($rawAlbumData);
	$index=0;
	foreach($photoData->data as $data){
		
		echo '<li><a href="#" data-reveal-id="myModal'.$index.'"><img src="'.$data->picture.'" /></a></li>';
		echo '<li id="myModal'.$index.'" class="reveal-modal"><img src="'.$data->picture.'" /></li>';
		$index++;
	}
?>
	</ul>
</div>
<?php
	include('includes/footer.php');
?>