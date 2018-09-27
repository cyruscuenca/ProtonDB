{{ html()->text('link_input')
        ->class('form-control')
        ->placeholder(' Paste Steam URL here')
        ->style('height: 50px; background: #1B2838; border-radius: 1px; border: 1pt solid #2a475e; display: inline-block; width: calc(100% - 120px);')
        ->attribute('maxlength', 191)
        ->required()
        ->autofocus() }}
<button onclick="check(document.getElementById('link_input').value);" style="outline: none; display: inline-block; width: 120px; float: right; height: 50px; border-radius: 0 1px 1px 0; background: #2a475e; color: #c7d5e0; border: 1px solid #2a475e;">Check Game</button>
<script type="text/javascript"
src="http://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous">
// AJAX setup
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
</script>
<script type="text/javascript">
function check(link) {
	console.log(link + ' request sent');
	var url = "http://www.steamplay-wiki.local:8000/api/app/check";
	$.ajax({
		type: "POST",
        contentType: "application/json",
        dataType: "json",
		url: url,
		data: JSON.stringify({
			link: link,
		}),
		processData: false,
	})
	.done(function(data) {
		console.log(data.path + ' response recieved');
		window.location = 'http://www.steamplay-wiki.local:8000/app/' + data.path_int + '/' + data.path_slug;
	})
}
</script>