<?php
/*
Template Name: Projekt
*/
?>

<?php get_header(); ?>
		
		<div id="map-holder" class="banner" data-param="<?php
		
		$file = "http://tracker.xrj.ch/smoje-api/v1/1001/status";
		$data = json_decode(file_get_contents($file), true);
		
		echo ($data["lastPosition"]["latitude"]."|".$data["lastPosition"]["longitude"]);
		
		?>"></div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
					<p><?php the_content(); ?></p>
					<?php endwhile; endif; ?>
				</div>
				<div class="col-md-4">
					<a class="twitter-timeline" href="https://twitter.com/smuoy" data-widget-id="520920327182770176" data-chrome="nofooter">Tweets von @smuoy</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>					
				</div>
			</div>
		</div>

<?php get_footer(); ?>