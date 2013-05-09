<!DOCTYPE HTML>
<html xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimun-scale=1.0, initial-scale=1.0" />
	<!--[if lt IE 9]>
				<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

  	<link rel="stylesheet" href="css/normalize.css" />
  	<link rel="stylesheet" href="css/foundation.css" />
  	<link rel="stylesheet" href="css/fonts.css" />
  	<link rel="stylesheet" href="css/site.css" />
	<?php if($cssPage) echo '<link rel="stylesheet" type="text/css" href="css/'.$cssPage.'.css">';?>
	<script src="js/vendor/custom.modernizr.js"></script>
	<title><?php echo $title;?></title>
	
	<script>
		function fbs_click() {
			u="http://futbolunificado.com";
			t="l Torneo de Fútbol Unificado";
			i="http://futbolunificado.com/images/smallLogo.png";
			window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t)+'&i='+encodeURIComponent(i),'sharer','toolbar=0,status=0,width=626,height=436');
			return false;
		}
	</script>
	
</head>
<body <?php echo "class='".$classBody."'";?>>
	<div class="wrapper">
	<?php if(isset($ifNav)) echo '
		<nav class="top-bar">
		  <ul class="title-area">
		    <!-- Title Area -->
		    <li class="name">
		      <h1><a href="'.$backPage.'"><span class="back"></span>Volver </a></h1>
		    </li>
		  </ul>
		
		<section class="top-bar-section">
		    <ul class="left">
		      <li class="active oe-logo"><a href="#"></a></li>
		      <li class="fb-logo"><a href="http://www.facebook.com/sharer.php?s=100&p[url]=http://futbolunificado.com&p[image]=http://futbolunificado.com/images/smallLogo.png&p[title]=l Torneo de Fútbol Unificado&p[summary]=1 Campeonato de Futbol Centroamericano y del caribe de futbol unificado" target="_blank"></a></li>
			</ul>
		</section></nav>
	';?>
	