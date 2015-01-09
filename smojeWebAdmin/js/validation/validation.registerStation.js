$('#formNew').validate({
	rules:{
		id: {
			required: true,
			number: true
		},
		name: 'required',
		url_netmodule: {
			required: true,
			url: true
		},
		url_sensoren: {
			//required: true,
			url: true
		},
		url_tissan: {
			//required: true,
			url: true
		}
	},
	highlight: function(element) {
		$(element).closest('.form-group').addClass('has-error');
	},
	unhighlight: function(element) {
		$(element).closest('.form-group').removeClass('has-error');
		$(element).closest('.form-group').addClass('has-success');
	},
	errorClass: 'help-block',
	submitHandler: function(form) {
		$.ajax({
			type: $(form).attr('method'),
			url: $(form).attr('action'),
			data: $(form).serialize(),
			success: function(result) {
				$('#success').html('<div class="alert alert-success"><strong>Smoje wurde gespeichert!</strong></div>').delay(3000).fadeOut('fast');
				$('#formNew').trigger('reset');
				$('#formNew').fadeOut('fast').delay(3000).fadeIn('fast');
				$('#formNew').find('.has-success').removeClass('has-success');
			}
		});
		return false;
	}
});