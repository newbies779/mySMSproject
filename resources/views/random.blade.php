<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
	
	<style>
		html, body {
			height: 100%;
		}

		body {
			height: 100%;
		}

		#center-content {
			display: flex;
			align-items: center;
			justify-content: center;
			height: 100%;
		}

		.gotname2 {
			font-weight: bold;
		}
	</style>

</head>
<body>
	<div id="center-content">
		<div id="random-content">
			<select class="selectName" data-toggle="tooltip" title="Who are you?">
				<option value="0" selected>Who are you?</option>
				@foreach ($avai_peoples as $avai_people)
					<option value="{{ $avai_people->id }}">{{ $avai_people->Name }}</option>
				@endforeach
			</select>
			
		</div>
		<button type="button" class="btn btn-primary clickme" data-url="{{ route('getmem') }}" style="margin-left: 20px">Click Me</button>
		<div class="gotname1"></div>
		<div class="gotname2" style="margin:0px 5px"></div>
		<div class="gotname3"></div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

	<script>
		$('.gotname').hide();

		$(document).on('click', '.clickme', function(){
			if($('.selectName option:selected').val() == 0){
				$('.selectName').tooltip('show');
				// $('.selectName').focus();
				return 0;
			}

			var url = $(this).data('url');
			url += '?chooser=' + $('.selectName option:selected').val();
			$.get(url , function(data) {
				$('.selectName, .clickme').hide();
				$('.gotname1').show().text('Congratulation! You have');
				$('.gotname2').show().text(data.name.Name);
				$('.gotname3').show().text('as your buddy.');
			});

		});

		$(document).on('change', '.selectName', function(){
			$('.clickme').prop('disabled', false);
		});

		$(document).on('blur, focus', '.selectName', function(){
			$(this).tooltip('hide');
		});

		$(document).on('blur', '.clickme', function(){
			$('.selectName').tooltip('hide');
		});

	</script>
</body>
</html>