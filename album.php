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
	<ul class="small-block-grid-3 large-block-grid-4">
<?php

	$rawAlbumData = file_get_contents('https://graph.facebook.com/147672652062673/photos');
	//Interpret data with JSON
	$photoData = json_decode($rawAlbumData);
	$index=0;
	foreach($photoData->data as $data){
		
		echo '<li><a href="#" data-reveal-id="myModal'.$index.'"><img src="'.$data->source.'" /></a></li>';
		echo '<li id="myModal'.$index.'" class="small reveal-modal"><img src="'.$data->source.'" /><a class="close-reveal-modal">&#215;</a></li>';
		$index++;
	}
?>
	</ul>
</div>
<?php
	include('includes/footer.php');
?>