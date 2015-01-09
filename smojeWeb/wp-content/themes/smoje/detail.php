<?php

header('Content-Type: text/html; charset=utf-8');
require_once("smoje.class.php");
	
$smoje = new Smoje($_GET["id"]);

?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div id="btn-close-detail-holder">
				<button class="btn btn-default" id="btn-close-detail" name="btnCloseDetail">Close</button>
			</div>
			<h1><?= $smoje->name ?></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Current measurements</h2>
		</div>
	</div>
	<div class="row">
		<?php
	
		$file = $smoje->urlTissan;
		$data = json_decode(file_get_contents($file), true);
		
	
		if ($data["lastPosition"]) {
				
			$latlong = array(
				"latitude" => $data["lastPosition"]["latitude"],
				"longitude" => $data["lastPosition"]["longitude"]
			);
			$date = new DateTime($data["timeUpdated"]);

		?>
			<div class="col-md-12">
				<div id="map-holder-detail" data-param="<?= $latlong["latitude"]."|".$latlong["longitude"] ?>"></div>
				<div class="map-details">
					<h3>GPS <span class="measurementDate">(<?= $date->format('d.m.Y H:i:s') ?>)</span></h3>
					<table class="details">
						<tr>
							<th>Breitengrad:</th>
							<td><?= $latlong["latitude"] ?> °</td>
						</tr>
						</tr>
							<th>Längengrad:</th>
							<td><?= $latlong["longitude"] ?> °</td>
						</tr>
					</table>
				</div>
			</div>
		<?php
		
		}
		
		foreach($smoje->sensors as $sensor) {
	
			if (
				($sensor["measurements"] && $sensor["name"] != "gps") &&
				(!stristr($sensor["name"], "camera")) &&
				array_key_exists("displayTypeId", $sensor) &&
				$sensor["displayTypeId"] < 3 &&
				$sensor["measurements"][0]["value"] != "failed") {
					
					$measurement = $sensor["measurements"][0];
					$date = new DateTime();
					$date->setTimestamp($measurement["timestamp"]);
					$date = $date->format('d.m.Y H:i:s');

		?>
			<div class="col-md-6">
				<h3><?= str_replace("_", " ", $sensor["title"])." <span class=\"measurementDate\">(".$date.")</span>" ?></h3>
				<table class="details">
					<?php
					
					$name = "";
					$value = "";
					
					$value = $measurement["value"]." ".str_replace("^", "", $sensor["unit"]);
					
					?>
					<tr>
						<td colspan="2"><?= $value ?></td>
					</tr>
				</table>
			</div>
		<?php
	
			}
		}

		foreach($smoje->sensors as $sensor) {
			
			if (array_key_exists("displayTypeId", $sensor)) {
				
				if (stristr($sensor["name"], "camera")) {
				
					$value = "";
					foreach($sensor["measurements"] as $measurement) {
					
						$value = $measurement["value"];
						$measurement = $sensor["measurements"][0];
						echo ($measurement["timestamp"]["date"]);
						$date = new DateTime();
						$date->setTimestamp($measurement["timestamp"]);
						$date = $date->format('d.m.Y H:i:s');
					}
				?>
				<div class="col-md-12">
					<h3><?= str_replace("_", " ", $sensor["title"])." <span class=\"measurementDate\">(".$date.")</span>" ?></h3>
					<img src="/img/<?= $value ?>" />
				</div>
				<?php
				
				}
			}
		}
	
	
		?>
	</div>
	<div></div>
</div>