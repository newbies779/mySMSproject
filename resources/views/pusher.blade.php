@extends('layouts.smslayout')
<script src="https://js.pusher.com/3.2/pusher.min.js"></script>

<script type="text/javascript">
	(function(){

		var pusher = new Pusher('0384eeee590df2dd40c8', {
			cluster: 'ap1'
		});
		
		var channel = pusher.subscribe('rent_approve_listener');
		channel.bind('App\\Events\\AdminRentApprove', function(data) {
			console.log(data);
		});

	})();

</script>
