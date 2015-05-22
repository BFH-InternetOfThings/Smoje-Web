jQuery('#contact-form').validate({
	rules: {
		name: 'required',
		email: {
			required: true,
			email: true
		},
		subject: 'required',
		message: 'required'
	},
	messages: {
		name: 'Bitte einen Namen eingeben.',
		email: {
			required: 'Bitte eine E-Mail-Adresse eingeben.',
			email: 'Bitte gültige E-Mail-Adresse eingeben.'
		},
		subject: 'Bitte einen Betreff eingeben.',
		message: 'Bitte eine Nachricht eingeben.'
	},
	highlight: function(element) {
		jQuery(element).closest('.form-group').addClass('has-error');
	},
	unhighlight: function(element) {
		jQuery(element).closest('.form-group').removeClass('has-error').addClass('has-success');
	},
	errorElement: 'span',
	errorClass: 'help-block',
	errorPlacement: function(error, element) {
		if (element.parent('.input-group').length) {
			error.insertAfter(element.parent());
		} else {
			error.insertAfter(element);
		}
	},
	submitHandler: function(form) {
		jQuery.ajax({
			type: jQuery(form).attr('method'),
			url: jQuery(form).attr('action'),
			data: jQuery(form).serialize(),
			success: function(result) {
				jQuery('#success').html('<div class="alert alert-success"><strong><p>Vielen Dank.</p><p>Ihre Nachricht wurde erfolgreich übermittelt.</p>').fadeIn('fast').delay(3000).fadeOut('fast');
				jQuery('#contact-form').trigger('reset');
				jQuery('#contact-form').fadeOut('fast').delay(3000).fadeIn('fast');
				jQuery('#contact-form').find('.has-success').removeClass('has-success');
			}
		});
		return false;
	}
});