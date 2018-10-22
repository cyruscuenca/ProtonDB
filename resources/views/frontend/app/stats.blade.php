@extends('frontend.layouts.app')

@section('title', "Stats" . ' | ' . app_name())
<style>
.timeline-list {
     float: left;
     display: inline-block;
}
.timeline-list li {
    margin-top: 20px;
    background: #2a475e;
    width: 275px;
    text-align: center;
    border-radius: 2px;
}
.timeline-list li p {
    padding: 8px;
}
.nav-dashboard li:nth-child(4) {
    border-bottom: 3px solid #66c0f4;
}
.grid-container {
  display: grid;
  height: 100%;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: 1fr;
  grid-gap: 0px;
  grid-template-areas: ". . .";
  color: #2a475e;
  border-radius:
}
.grid-container div h1{
  margin-top: 32px;
}
</style>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@section('content')
<div class="fullwidth" style="background-image: url({{asset('img/backend/brand/background.jpg')}}); height: 215px;">
    <div class="responsive-width" style="font-family: 'Oswald'; text-align: center;">
        <h1 style="font-weight: bold; font-size: 72px; margin-top: 64px;">STATISTICS</h1>
    </div>
</div>
<div class="grid-container" style="background: #2a475e; height: 150px; text-align: center; font-size: 22px; color: #c7d5e0; margin-top: 25px;">
	<div>
		<h1 style="color: #66c0f4;">{{$app_count}}</h1>
		<p>Apps in Database</p>
	</div>
	<div>
		<h1 style="color: #66c0f4;">{{$entries_count}}</h1>
		<p>App Reports in Database</p>
	</div>
	<div>
		<h1 style="color: #66c0f4;">{{$flawless_count}}</h1>
		<p>Apps Reported as Flawless</p>
	</div>
</div>
<div class="grid-container" style="margin-top: 25px; background: #c7d5e0; height: 400px; text-align: center; font-size: 22px;">
        <div id="chartContainer" style="height: 90%; width: 280%; margin: 5%;"></div>
</div>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
    backgroundColor: "#c7d5e0",
	title:{
		text: "App compatiblility",
		horizontalAlign: "left",
        fontColor: "#2a475e"
	},
	data: [{
		type: "doughnut",
		startAngle: 60,
		//innerRadius: 60,
		indexLabelFontSize: 17,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: [
			{ y: {{$flawless_count}}, label: "Flawless" },
			{ y: {{$playable_count}}, label: "Playable" },
			{ y: {{$barely_playable_count}}, label: "Barely Playable"},
			{ y: {{$unplayable_count}}, label: "Unplayable" },
		]
	}]
});
chart.render();

}
</script>
@endsection
