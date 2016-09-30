$(function() {

	if ($('section.login-form').length > 0) {

		$('[data-toggle="tooltip"]').tooltip();

		$(document).on('click','.navbar-nav #signUp', function(){
			$('.login-form').removeClass('page--current');
			$('body').addClass('reveal-regis');
			$('.regis-form').addClass('page--current');
			setTimeout(function() {
			}, 600)
		});
		$(document).on('click','.pages #backtoLogin', function(){
			$('.regis-form').removeClass('page--current');
			$('body').addClass('reveal-login');
			$('.login-form').addClass('page--current');
			setTimeout(function() {
				$('body').removeClass('reveal-login')
						 .removeClass('reveal-regis');
			}, 600)
		});
		$(document).on('click','#forgetLink', function(){
			$('.page.page-overlay').addClass('is-showing');
			$('.forget-card').toggleClass('animated lightSpeedIn is-showing');
			setTimeout(function() {
				$('.forget-card').toggleClass('animated lightSpeedIn');
				$('body').addClass('reveal-forget');
				$('#forgetLink').toggleClass('is-showing');
			}, 1000)
		});
		$(document).on('click','#resetSubmit', function(){
			$('#formReset').submit();
		});
		$(document).on('submit','#formReset', function(e) {
			e.preventDefault();
			$('.pages .page-overlay').removeClass('is-showing');
			$('.forget-card').toggleClass('animated bounceOutUp');
			setTimeout(function() {
				$('.forget-card').toggleClass('animated bounceOutUp is-showing');
				$('body').removeClass('reveal-forget');
				$('#forgetLink').toggleClass('is-showing');
				$('#resetEmail').val('');
				//  Show alert
				$('.alert').toggleClass('is-showing');
			}, 1000);
			setTimeout(function() {
				$('.alert').toggleClass('is-showing');
			},4000);
			// Handle alert animation
			// $('.alert').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function() {
			// 	$('.alert').toggleClass('animated slideInDown');
			// });
		});
		// Prevent window detected click
		$(document).on('click','.forget-card, #forgetLink.is-showing .link-text', function(e){
			e.stopPropagation();
		});
		// window click detect
		$(window).on('click',function(e) {
			// Start forget-card detect click outside
			if ($('body').hasClass('reveal-forget') && $('.forget-card').is(':visible')) {
				$('.pages .page-overlay').removeClass('is-showing');
				$('.forget-card').toggleClass('animated lightSpeedOut');
				setTimeout(function() {
					$('.forget-card').toggleClass('animated lightSpeedOut is-showing');
					$('body').removeClass('reveal-forget');
					$('#forgetLink').toggleClass('is-showing');
				}, 1000)
			}
			// End forget-card detect click outside
		})
	};

})
