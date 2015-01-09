$('#formUpdateSensors').validate({
	/*rules:{
		'title[]': 'required',
		'description[]': 'required',
		'unit[]': 'required',
		'sortOrder[]': {
			required: true,
			digits: true
		}
	},*/
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
				$('#success').html('<div class="alert alert-success"><strong>Änderungen wurde gespeichert!</strong></div>').delay(3000).fadeOut('fast');
				$('#formUpdate').fadeOut('fast').delay(3000).fadeIn('fast');
				$('#formUpdate').find('.has-success').removeClass('has-success');
			}
		});
		return false;
	}
});

$('.title, .unit, .displayType').each(function() {
	$(this).rules('add', {
		required: true
	});
});

$('.sortOrder').each(function() {
	$(this).rules('add', {
		required: true,
		digits: true
	});
});