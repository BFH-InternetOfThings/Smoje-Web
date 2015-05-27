<?php get_header(); ?>
		
		<div id="map-holder" class="map-holder-small" data-param="<?php
		
		$file = "http://tracker.xrj.ch/smoje-api/v1/1001/status";
		$data = json_decode(file_get_contents($file), true);
		
		echo ($data["lastPosition"]["latitude"]."|".$data["lastPosition"]["longitude"]);
		
		?>"></div>
		<div class="container">
			<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
			<div class="row">
				<div class="col-xs-12">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
			<div class="row">
				<p><?php the_content(); ?></p>
			</div>
			<?php endwhile; endif; ?>
		</div>

<?php get_footer(); ?>