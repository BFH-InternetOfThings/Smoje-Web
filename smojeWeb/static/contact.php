<?php include("inc/header.php") ?>

		<div id="map-holder" class="banner" data-param="47.142334|7.243298"></div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>Kontakt</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div id="success"></div>
					<form id="contact-form" action="libs/processContact.php" method="post" role="form" novalidate="novalidate">
						<div class="form-group">
							<label class="control-label">Name *</label>
							<div class="controls">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" id="name" name="name" placeholder="Name">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">E-Mail *</label>
							<div class="controls">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="email" class="form-control" id="email" name="email" placeholder="beispiel@domain.ch">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Telefon/Mobile</label>
							<div class="controls">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone"></i></span>
									<input type="text" class="form-control" id="phone" name="phone" placeholder="079 123 45 67">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Betreff *</label>
							<div class="controls">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
									<input type="text" class="form-control" id="subject" name="subject" placeholder="Ihr Betreff">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Nachricht *</label>
							<div class="controls">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-file-text"></i></span>
									<textarea class="form-control" id="message" name="message" placeholder="Ihre Nachricht" rows="10"></textarea>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="controls">
								<button class="btn btn-default" type="submit" id="btnSubmit" name="btnSubmit">Absenden</button>
								<button class="btn btn-default" type="reset" id="btnReset" name="btnReset">Reset</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-6">
					<div class="col-xs-6">
						<a href="http://www.smoje.ch"><img src="img/logo.png" alt="Logo Smoje" width="187.5" height="120"></a>
					</div>
					<div class="col-xs-6">
						<a href="http://www.bfh.ch"><img src="http://www.bfh.ch/fileadmin/templates/img/logo_bfh_en.gif" alt="Logo BFH"></a>
					</div>
				</div>
			</div>
		</div>
		
		<div id="detail-container"></div>
		
<?php include("inc/footer.php") ?>