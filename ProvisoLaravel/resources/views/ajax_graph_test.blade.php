<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type='text/javascript'>
	$('button.class_graph').click(function() {
		$('div.class_graph').html('<img src="/classGraph?ID={{ Auth::UserID }}"/>')
	});
 </script>
 <button class="class_graph">Show classes</button>
 <div class="class_graph">
 </div>