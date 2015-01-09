<?php 

require_once('header.inc.php');
require_once('config.php');
require_once('class/Database.php');

// get sensors from json
$json = file_get_contents(URL_SENSORS);
$jsonObj = json_decode($json);
$sensors = $jsonObj->sensors;

$displayTypes = getDisplayTypes();

?>

		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>Sensoren administrieren</h1>
					<p>Diese Angaben gelten für alle Sensoren auf sämtlichen Stationen.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div id="success"></div>
					<form id="formUpdateSensors" method="post" action="libs/processUpdateSensors.php">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<a href="#sensors" data-toggle="collapse" data-target="#sensors">Sensoren</a>
							</div>
							<div id="sensors" class="panel-collapse collapse in">
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
													<th class="col-xs-1">#</th>
													<th class="col-xs-2">Name</th>
													<th class="col-xs-2">Titel</th>
													<th class="col-xs-3">Beschreibung</th>
													<th class="col-xs-1">Unit</th>
													<th class="col-xs-2"><abbr rel="tooltip" title="infoWindow: Google-Maps-Window<br />detail: nur auf der Detail-Seite ersichtlich">Anzeigeart</abbr></th>
													<th class="col-xs-1"><abbr rel="tooltip" title="Reihenfolge auf Website">Sort.reih.</abbr></th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($sensors as $idx => $sensor) { ?>
												<tr>
													<td><?= $sensor->sensorId; ?></td>
													<td><?= $sensor->name; ?></td>
													<td>
														<div class="form-group">
															<input type="text" class="form-control title" name="title[<?= $sensor->sensorId; ?>]" value="<?= $sensor->title; ?>">
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text" class="form-control description" name="description[<?= $sensor->sensorId; ?>]" value="<?= $sensor->description; ?>">
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text" class="form-control unit" name="unit[<?= $sensor->sensorId; ?>]" value="<?= $sensor->unit; ?>">
														</div>
													</td>
													<td>
														<div class="form-group">
															<select class="form-control displayType" name="displayType[<?= $sensor->sensorId; ?>]">
																<? showOptionFields($displayTypes, $sensor->displayTypeId); ?>
															</select>
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text" class="form-control sortOrder" name="sortOrder[<?= $sensor->sensorId; ?>]" value="<?= $sensor->sortOrder; ?>">
														</div>
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-default" id="btnSave" name="btnSave">Speichern</button>
					</form>
				</div>
			</div>
		</div>

<?php require_once('footer.inc.php');

// get displayTypes from db
function getDisplayTypes() {
	$db = Database::getInstance();
	$query = 'SELECT * FROM displaytype';
	$result = $db->query($query);
	
	while($row = $result->fetch_object()) {
		$displayTypes[] = $row;
	}
	return $displayTypes;
}

function showOptionFields($displayTypes, $sensorDisplayTypeId) {
	if ((!isset($sensorDisplayTypeId)) || (empty($sensorDisplayTypeId))) {
		echo "<option value='' selected></option>";
	}
    
    foreach($displayTypes as $idx => $displayType) {
		$status = ((!empty($sensorDisplayTypeId)) && ($displayType->id == $sensorDisplayTypeId)) ? 'selected' : '';
		echo "<option value='$displayType->id' $status>$displayType->name</option>";
	}
}