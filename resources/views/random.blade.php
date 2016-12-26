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

		#random-content {

		}
	</style>

</head>
<body>
	<div id="center-content">
		<div id="random-content">
			<div class="dropdown open">
				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Who are you?
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					@foreach ($choosen_peoples as $choosen_people)
						{{-- expr --}}
					@endforeach
				</div>
			</div>
			
		</div>
		<button type="button" class="btn btn-primary clickme" data-url="{{ route('getmem') }}" style="margin-left: 20px" disabled="true">Click Me</button>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
	<script>
		$(document).on('click', '.clickme', function(){
			$(this).prop('disabled', false);

			var url = $(this).data('url');
			$.get(url , function(data) {
				alert(data);
			});
		});
	</script>
</body>
</html>