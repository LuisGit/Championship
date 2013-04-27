<!DOCTYPE HTML>
<html>
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
	<title><?php echo $title;?></title>
</head>
<body <?php echo "class='".$classBody."'";?>>
	<?php if(isset($ifNav)) echo '
		<nav class="top-bar">
		  <ul class="title-area">
		    <!-- Title Area -->
		    <li class="name">
		      <h1><a href="index.php">&#8249; Menu </a></h1>
		    </li>
		  </ul>
		</nav>
	';?>
		