<?php include("inc/header.php") ?>

		<div id="map-holder" class="banner" data-param="47.142334|7.243298"></div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>Details</h1>
				</div>
			</div>
						<div class="row">
				<div class="col-xs-12">
					<div class="tab-content">
						<p>Sie lieben Statistiken? Hier finden Sie die bisherigen Messdaten der Smojes!</p>
					</div>
				</div>
			</div>
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
					<script type="text/javascript" src="js/amcharts/amcharts.js"></script>
					<script type="text/javascript" src="js/amcharts/serial.js"></script>
					<script type="text/javascript" src="js/amcharts/none.js"></script>
					<script type="text/javascript" src="js/amcharts/amstock.js"></script>
					<script type="text/javascript" src="js/amcharts/de.js"></script>
					<div id="chartcontainer">
						<div id="chartdiv"></div>
					</div>							
					<script src="js/charts.js"></script>
				</div>
			</div>
		</div>

		<div id="detail-container"></div>

<?php include("inc/footer.php") ?>