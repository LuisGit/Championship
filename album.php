<?php
	require 'src/facebook.php';
	
	// Create our Application instance (replace this with your appId and secret).
	$facebook = new Facebook(array(
			'appId'  => '167574096737934',
			'secret' => 'e1d29c634bb1a9701c69d31e7ff097aa',
	));
	$FBid = '10151379786557121';
	$access_token = $facebook->getAccessToken();
	$graph_url= "https://graph.facebook.com/". $FBid ."/photos?"
			. "access_token=" .$access_token;

//Header
	$cssPage ='album';
	$title = 'Alb&#250;m';
	$classBody="album";
	$ifNav="yes";
	$backPage="index.php";
	include('includes/header.php');
	
	
	
	
	
?>
<div class="row">
	<ul class="small-block-grid-3 large-block-grid-4">
<?php

	$rawAlbumData = file_get_contents($graph_url);
	//Interpret data with JSON
	$photoData = json_decode($rawAlbumData);
	$index=0;
	foreach($photoData->data[0]->images as $data){
		
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