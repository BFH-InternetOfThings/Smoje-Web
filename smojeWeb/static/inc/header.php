<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<meta name='robots' content='noindex,follow' />
<link rel="alternate" type="application/rss+xml" title="Smoje &raquo; Details Kommentar-Feed" href="details.phpfeed/" />
<link rel='stylesheet' id='bootstrap.style-css'  href='css/bootstrap.min.css?ver=3.3.0' type='text/css' media='all' />
<link rel='stylesheet' id='style-css'  href='css/style.css?ver=4.0' type='text/css' media='all' />
<link rel='stylesheet' id='font.awesome-css'  href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css?ver=4.2.0' type='text/css' media='all' />
<script type='text/javascript' src='js/jquery/jquery.js?ver=1.11.1'></script>
<script type='text/javascript' src='js/jquery/jquery-migrate.min.js?ver=1.2.1'></script>
<link rel='canonical' href='details.php' />
	</head>
	
	<body>
		<header>
			<nav class="navbar navbar-default" role="navigation">
				<div class="wrapper">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="social">
							<a href="https://www.facebook.com/smuoy" target="_blank"><i class="fa fa-facebook"></i></a>
				            <a href="https://twitter.com/smuoy" target="_blank"><i class="fa fa-twitter"></i></a>
				            <a href="#"><i class="fa fa-google-plus" target="_blank"></i></a>
				        </div>
						<a href="#"><div class="logo"></div></a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul id="navbar" class="nav navbar-nav">
							<?php
							
								$nav = array(
									"Home" => "index.php",
									"Projekt" => "project.php",
									"Details" => "details.php",
									"Kontakt" => "contact.php"
								);
								$current_url = $_SERVER["PHP_SELF"];
								
								foreach($nav as $title => $url) {
								
									$class_addition = "";
									if (strpos($current_url, $url) > 0) {
									
										$class_addition = " active current-menu-item";
									}
									
								?>
									<li class="menu-item menu-item-type-post_type menu-item-object-page<?= $class_addition ?>"><a title="Details" href="<?= $url ?>"><?= $title ?></a></li>
								<?php
								
								}
							
							?>
						</ul>
					</div>
				</div>
			</nav>
		</header>