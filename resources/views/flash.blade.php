@if (Session::has('status'))

<div id="flash" class="alert alert-{{ session('status') }}" role="alert">
	{{ session('message') }}
</div>
	
@endif