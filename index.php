<?php
//Header
	$cssPage ='home';
	$title = 'Pagina Principal';
	$classBody="home";
	include('includes/header.php');
?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=188899581122255";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div class="row">
	  <div class="columns large-6"><h1><a href="#"><img src="images/main_logo.png" alt="olimpiadas especiales logo" /></a></h1></div>
	  <div class="large-6 columns">
	  	<div class="row">
			<ul class="side-nav">
			  <li class="active blueB"><a href="seleccionRonda.php" class="button radius">Ver el Torneo</a></li>
			  <li class="redB"><a href="album.php" class="button radius">Ver las Fotos</a></li>			  
			  <li class="social-media">
			  	<div class="small-4 columns"><a href="acercade.php"><img src="images/OE_logo.png" alt="sobre olimpiadas especiales" /></a></div>
			  	<div class="small-4 columns"><div class="fb-like" data-href="http://www.olimpiadasespeciales.cr/" data-send="false" data-layout="button_count" data-width="20" data-show-faces="true"></div></div>
			  </li>
			</ul>		
		</div>
	  </div>
	</div>
	<footer>
		<div id="decor" class="row">
		  <div class="small-2 large-2 columns text-right"><img src="images/dec_left_bar.png" alt="separator"/></div>
		  <div class="small-10 large-11 columns"></div>
		  <div class="small-2 large-2 columns text-left"><img src="images/dec_right_bar.png" alt="separator"/></div>
		</div>
		<div class="row">
		  <div class="small-centered columns"><p>I Torneo Centro Americano y del Caribe de Futbol Unificado de Olimpiadas Especiales<br />Costa Rica 2013</p></div>
		</div>
	</footer>
<?php
	include('includes/footer.php');
?>