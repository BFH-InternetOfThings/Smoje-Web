$('#formUpdate').validate({
	rules:{
		name: 'required',
		url_netmodule: {
			required: true,
			url: true
		},
		url_sensor: {
			required: true,
			url: true
		},
		url_tissan: {
			required: true,
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
			data: $(form).find('.tab-pane.active input').serialize(),
			success: function(result) {
				alert(result);
				$('#success').html('<div class="alert alert-success"><strong>Änderungen wurde gespeichert!</strong></div>').delay(3000).fadeOut('fast');
				$('#formUpdate').fadeOut('fast').delay(3000).fadeIn('fast');
				$('#formUpdate').find('.has-success').removeClass('has-success');
			}
		});
		return false;
	}
});

$('.delay').each(function() {
	$(this).rules('add', {
		required: true,
		digits: true
	});
});