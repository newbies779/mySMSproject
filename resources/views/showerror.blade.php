@if (count($errors))
<div class="alert alert-danger" id="errors">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

<script>
	setTimeout(function() {
	    $('#errors').fadeOut('slow');
	    }, 3000); // <-- time in milliseconds
</script>
@endif