<?php

//if (isset($_POST['btnSubmit'])) {
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
	$subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
	$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

	/*$errors = '';

	if ($name == '') {
		$errors .= 'Bitte einen Namen eingeben.<br /><br />';
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

	}*/
	$to = 'f4nky@f4nky.ch';
	$header = 'Content-type: text/plain; charset=ISO-8859-1' . "\r\n";
	$header .= "From: ". $email ."\r\n";
	
	$body = "Name:     $name\n";
	$body .= "E-Mail:  $email\n\n";
	$body .= "Telefon: $phone\n\n";
	$body .= "Betreff: $subject\n";
	$body .= $message;
	
	$sendmail = @mail($to, 'Smoje.ch: '. $subject, $body, $header);
//}