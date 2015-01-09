<?php require_once('header.inc.php'); ?>

		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>Neue Smoje</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="tab-content">
						<div id="success"></div>
						<form id="formNew" method="post" action="libs/processRegisterSmoje.php">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<a href="#general" data-toggle="collapse" data-target="#general">Allgemein</a>
								</div>
								<div id="general" class="panel-collapse collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-xs-2">
												<div class="form-group">
													<label class="control-label">ID*</label>
													<input type="text" class="form-control" id="id" name="id" autofocus>
												</div>
											</div>
											<div class="col-xs-2">
												<div class="form-group">
													<label class="control-label">Name*</label>
													<input type="text" class="form-control" id="name" name="name"1>
												</div>
											</div>
											<div class="col-sm-8">
												<div class="form-group">
													<label class="control-label">Beschreibung</label>
													<input type="text" class="form-control" id="desc" name="desc">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label class="control-label">URL NetModule*</label>
													<input type="url" class="form-control" id="url_netmodule" name="url_netmodule">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label class="control-label">URL Sensoren*</label>
													<input type="url" class="form-control" id="url_sensor" name="url_sensor">
												</div>
											</div>											
											<div class="col-sm-4">
												<div class="form-group">
													<label class="control-label">URL Tissan*</label>
													<input type="url" class="form-control" id="url_tissan" name="url_tissan">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-default" id="btnSave" name="btnSave">Speichern</button>
						</form>
					</div>
				</div>
			</div>
		</div>

<?php require_once('footer.inc.php'); ?>