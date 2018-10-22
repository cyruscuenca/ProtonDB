@extends('frontend.layouts.app')
<style>
  #app-add-data {
        border-bottom: 3px solid #66c0f4;
  }
  .textbox {
      color: #C7D5E0; height: 175px; background: #C7D5E0; border: 1px solid #2A475E;
      border-radius: 5px;
  }
</style>
@section('title', "Submit test results" . ' | ' . app_name())

@section('content')
<div class="card" style="margin-top: 100px; border: none; background: none;">
    @include('../../includes/partials/app-banner')
<div style="width: 100%; background: #2a475e; margin-top: 50px">
    <div style="background: #2a475e; height: 25px; width: 100%; margin-top: 25px;">
        <div style="margin-left: 25px; margin-right: 25px; width: calc(100% - 50px); margin-top: -8px;">
            <h6>Create a Test Report</h6>
        </div>
    </div>
    <div style="min-height: 400px; color: #C7D5E0;">
        {!! Form::open(['route' => ['frontend.entry.store', $app->path_int]]) !!}
        <div style="width: 100%;">
            <div style="margin: 25px;">
            {{ Form::hidden('app_id', $app->id) }}
            <div style="width: 100%; margin-bottom: 18px;">
                <div style="display: inline-block; margin-right: 15px;">
                {{ Form::label("Distro&nbsp;", null) }}
                {!! Form::select("distro_id", $distros, null, ['placeholder' => '&nbsp;&nbsp;Specify your distro&nbsp;&nbsp;', 'style' => 'display: inline-block; color: #C7D5E0; border: none; height: 30px; border-radius: 1px;']) !!}
                </div>
                {!! Form::text("distro_version", null, ['placeholder' => 'Version', 'class' => 'form-control', 'style' => 'width: 115px; display: inline-block; color: #C7D5E0; height: 35px; background: #C7D5E0; border: 1px solid #2A475E;']) !!}
            </div>
            <div style="width: 100%; margin-bottom: 18px;">
                <div style="margin-bottom: 18px;">
                <div style="margin-right: 15px; display: inline-block;">
                {{ Form::label("CPU&nbsp;", null) }}
                {!! Form::select("cpu_id", $cpus, null, ['placeholder' => '&nbsp;&nbsp;Specify your CPU&nbsp;&nbsp;', 'style' => 'color: #C7D5E0; border: none; height: 30px; border-radius: 1px;']) !!}
                </div>
                <div style="display: inline-block; margin-right: 15px;">
                {{ Form::label("GPU&nbsp;", null) }}
                {!! Form::select("gpu_id", $gpus, null, ['placeholder' => '&nbsp;&nbsp;Specify your GPU&nbsp;&nbsp;', 'style' => 'color: #C7D5E0; border: none; height: 30px; border-radius: 1px;']) !!}
                </div>
                <div style="display: inline-block; margin-right: 15px;">
                {!! Form::text("driver_version", null, ['placeholder' => 'Driver', 'class' => 'form-control', 'style' => 'width: 115px; display: inline-block; color: #C7D5E0; height: 35px; background: #C7D5E0; border: 1px solid #2A475E;']) !!}
                </div>
                </div>
            </div>
            </div>
        </div>
        <div style="margin: 25px; color: #C7D5E0;">
            <div style="width: calc(50% - 12.5px); display: inline-block; float: left;">
            {{ Form::label("What works?", null) }}
            {!! Form::textarea("works", null, ['class' => 'form-control', 'style' => 'border-radius: 1px; color: #2a475e; height: 50px; background: #C7D5E0; border: 1px solid #1b2838;']) !!}
            </div>
            <div style="width: calc(50% - 12.5px); margin-bottom: 25px; display: inline-block; float: right;">
            {{ Form::label("What's broken?", null) }}
            {!! Form::textarea("broken", null, ['class' => 'form-control', 'style' => 'border-radius: 1px; color: #2a475e; height: 50px; background: #C7D5E0; border: 1px solid #1b2838;']) !!}
            </div>
			<div style="width: 100%;">
            	<p style="display: inline-block;">Did you try any tweaks to get the game running better?&nbsp;</p>
				{!! Form::checkbox('tweaks', 'value', false, ['id' => 'tweaks-box']) !!}
			</div>
			<div id="autoUpdate" style="height: 210px;">
				<div style="width: 100%; margin-bottom: 25px;">
				{{ Form::label("What tweaks did you do?", null) }}
				{!! Form::textarea("tweaks", null, ['class' => 'form-control textbox', 'style' => 'border-radius: 1px; color: #2a475e; height: 50px; background: #C7D5E0; border: 1px solid #1b2838;']) !!}
				</div>
                <div style="width: calc(50% - 12.5px); display: inline-block; float: left;">
                {{ Form::label("What works now?", null) }}
                {!! Form::textarea("works_after", null, ['class' => 'form-control', 'style' => 'border-radius: 1px; color: #2a475e; height: 50px; background: #C7D5E0; border: 1px solid #1b2838;']) !!}
                </div>
                <div style="width: calc(50% - 12.5px); display: inline-block; float: right;">
                {{ Form::label("What's broken now?", null) }}
                {!! Form::textarea("broken_after", null, ['class' => 'form-control', 'style' => 'border-radius: 1px; color: #2a475e; height: 50px; background: #C7D5E0; border: 1px solid #1b2838;']) !!}
                </div>
			</div>
			<div style="width: 100%; margin-bottom: 25px;">
				{{ Form::label("Extra notes", null) }}
				{!! Form::textarea("notes", null, ['class' => 'form-control', 'style' => 'border-radius: 1px; color: #2a475e; height: 50px; background: #C7D5E0; border: 1px solid #1b2838;']) !!}
			</div>
        </div>
        <div style="color: #C7D5E0;">
            <div style="margin: 25px;">
                <div style="display: inline-block; margin-right: 15px;">
                    {{ Form::label("Overall Compatibility&nbsp;", null) }}
                    {!! Form::select("compatibility_id", $compatibilities, null, ['placeholder' => '&nbsp;&nbsp;How did it run?&nbsp;&nbsp;', 'style' => 'color: #C7D5E0; border: none; height: 30px; border-radius: 1px;']) !!}
                </div>
                    {!! Form::submit("Submit", ['class' => 'standard-btn' , 'style' => 'border-radius: 2px; color: #C7D5E0; background: #388E3C; border: none; outline: none; height: 40px; width: 92.5px; float: right;']) !!}
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
        <section style="width: 100%; background: #2a475e; height: 75px; margin-top: 25px; border-radius: 1px;">
                <div style="padding: 25px;">
                    <a href="https://steamspy.com/app/{{$app->path_int}}" style="color: #c7d5e0; margin-right: 25px;">SteamSpy</a>
                    <a href="https://steamdb.info/app/{{$app->path_int}}/graphs/" style="color: #c7d5e0;">SteamDB</a>
                    <div style="float: right;">
                        <a href="http://www.facebook.com/sharer.php?u=https://www.steamplay.games/{{$app->path_int}}" target="_blank">
                            <img style="height: 25px; margin-left: 10px;" src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
                        </a>
                        <a href="http://reddit.com/submit?url=https://www.steamplay.games/{{$app->path_int}}" target="_blank">
                            <img style="height: 25px; margin-left: 10px;" src="https://simplesharebuttons.com/images/somacro/reddit.png" alt="Reddit" />
                        </a>
                        <a href="http://vkontakte.ru/share.php?url=https://www.steamplay.games/{{$app->path_int}}" target="_blank">
                            <img style="height: 25px; margin-left: 10px;" src="https://simplesharebuttons.com/images/somacro/vk.png" alt="VK" />
                        </a>
                        <a href="https://twitter.com/share?url=https://www.steamplay.games/{{$app->path_int}}&amp;hashtags=GamingOnLinux" target="_blank">
                            <img style="height: 25px; margin-left: 10px;" src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
                        </a>
                    </div>
                </div>
        </section>
</div>
<script type="text/javascript">
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('#autoUpdate').hide();
    $('#tweaks-box').change(function(){
        if(this.checked)
            $('#autoUpdate').fadeIn('fast');
        else
            $('#autoUpdate').fadeOut('fast');

    });
});
</script>
@endsection
