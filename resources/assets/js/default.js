$(function() {

	if ($('section.login-form').length > 0) {
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
		$(document).on('click','#forgetPassword', function(){
			$('.forget-card').toggleClass('animated lightSpeedIn is-showing');
			$('.pages .page-overlay').addClass('is-showing');
			setTimeout(function() {
				$('.forget-card').toggleClass('animated lightSpeedIn');
			}, 1000)
		});
		$(window).on('click',function(e) {
			console.log('1234');
			if ($('.forget-card').hasClass('is-showing')) {$('.pages .page-overlay').removeClass('is-showing');}
		})
	};

})