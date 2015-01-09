<?php
/*
Template Name: Details
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
			<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
			<div class="row">
				<div class="col-xs-12">
					<div class="tab-content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<?php endwhile; endif; ?>
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-pills" id="smoje-sensors">
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-pills" id="smoje-measurements">
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
					<script type="text/javascript" src="http://www.amcharts.com/lib/3/serial.js"></script>
					<script type="text/javascript" src="http://www.amcharts.com/lib/3/themes/none.js"></script>
					<script type="text/javascript" src="http://www.amcharts.com/lib/3/amstock.js"></script>
					<script type="text/javascript" src="http://cdn.amcharts.com/lib/3/lang/de.js"></script>
					<div id="chartcontainer">
						<div id="chartdiv"></div>
					</div>							
					<script src="/ch.bfh.smojeWeb/wp-content/themes/smoje/js/charts.js"></script>
				</div>
			</div>
		</div>

<?php get_footer(); ?>