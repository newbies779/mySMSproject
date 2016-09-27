$(function() {
	$.fn.checkForm = function() {
		$(this).each(function( i, el ) {
			var field = $(el);
			console.log(field.val());
			if (field.val() != "") {
				alert("1234");
			}
		});
	}

	if ($('section.login-form').length > 0) {
		$(document).on('click', '.navbar-toggler',function() {
			$('nav.navbar').toggleClass('clicked');
		});
	
		$(document).on('change', 'input.form-control',function(e) {
			console.log(this.val());
		});
	};
	
})