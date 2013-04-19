<?php
//Header
	$cssPage ='album';
	$title = 'Alb&#250;m';
	$classBody="album";
	$ifNav="yes";
	include('includes/header.php');
	
	$FBid = 'phraseit.cr';
	
	//Get the contents of a Facebook page
	$FBpage = file_get_contents('https://graph.facebook.com/'.$FBid.'/albums');
	//Interpret data with JSON
	$photoData = json_decode($FBpage);
?>


	  	<div class="row">
        
        <ul class="large-block-grid-4">
				
		<? foreach ( $photoData->data as $data )
		{
		echo '<li><a href="'.$data->link.'" target="_blank"><img class="shadow" src="https://graph.facebook.com/'.$data->id.'/picture/" width=70 /></a>';
		echo '<br />'.$data->name.'</li>';
		}
	
	?> </ul>
				
		</div>

<?php
	include('includes/footer.php');
?>