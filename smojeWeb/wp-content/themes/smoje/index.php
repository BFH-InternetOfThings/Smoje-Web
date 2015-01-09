<?php get_header(); ?>

		<div id="headline" class="banner">
			<div class="wrapper">
				<h1>Smoje - die smarteste Boje der Welt!</h1>
			</div>
		</div>
		<section class="container-fluid">
			<div id="map-holder" class="map-holder-big" data-param="<?php
		
		$file = "http://tracker.xrj.ch/smoje-api/v1/1001/status";
		$data = json_decode(file_get_contents($file), true);
		
		echo ($data["lastPosition"]["latitude"]."|".$data["lastPosition"]["longitude"]);
		
		?>"></div>
		</section>
		
<?php get_footer(); ?>