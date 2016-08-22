@if (Session::has('status'))

<div id="flash" class="alert alert-{{ session('status') }}" role="alert">
	{{ session('message') }}
</div>
	
@endif

<script>
	setTimeout(function() {
	    $('#flash').fadeOut('slow');
	    }, 3000); // <-- time in milliseconds
</script>