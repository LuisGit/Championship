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
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div class="row">
	  <div class="columns large-6"><h1><a href="#" class="button circle">LOGO TITULAR</a></h1></div>
	  <div class="large-6 columns">
	  	<div class="row">
			<ul class="side-nav">
			  <li class="active"><a href="seleccionRonda.php" class="button round">ver torneo</a></li>
			  <li><a href="#" class="button round">ver fotos</a></li>
			  <li><a class="txt" href="#">sobre olimpiadas especiales</a></li>
			  <li><div class="fb-follow" data-href="https://www.facebook.com/zurb" data-layout="button_count" data-show-faces="false" data-width="450"></div></li>
			</ul>		
		</div>
	  </div>
	</div>
<?php
	include('includes/footer.php');
?>