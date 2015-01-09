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
		<?php wp_head(); ?>
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
						<?php wp_nav_menu(array(
							'menu'			=> 'primary',
							'container'		=> '',
							'menu_id'		=> 'navbar',
							'menu_class'	=> 'nav navbar-nav',
							'walker'		=> new wp_bootstrap_navwalker()
						)); ?>
					</div>
				</div>
			</nav>
		</header>