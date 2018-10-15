@extends('frontend.layouts.app')
<style>
  #app-add-data {
        border-bottom: 3px solid #66c0f4;
  }
</style>
@section('title', "Submit test results" . ' | ' . app_name())

@section('content')
@include('../../includes/partials/link-check')
<div class="card" style="margin-top: 25px;">
    @include('../../includes/partials/app-banner')
    <div style="margin: 25px; min-height: 400px;">
        {!! Form::open(['route' => ['frontend.entry.store', $app->path_int]]) !!}
        {{ Form::hidden('app_id', $app->id) }}
            <div style="width: 100%; margin-bottom: 18px;">
                <div style="display: inline-block; margin-right: 15px;">
                {{ Form::label("Distro&nbsp;", null) }}
                {!! Form::select("distro_id", $distros, null, ['placeholder' => '&nbsp;&nbsp;Specify your distro&nbsp;&nbsp;', 'style' => 'display: inline-block; color: #C7D5E0; background: #2A475E; border: none; height: 30px; border-radius: 2px;']) !!}
                </div>
                {!! Form::text("distro_version", null, ['placeholder' => 'Version', 'class' => 'form-control', 'style' => 'width: 115px; display: inline-block; color: #C7D5E0; height: 35px; background: #1B2838; border: 1px solid #2A475E;']) !!}
            </div>
            <div style="width: 100%; margin-bottom: 18px;">
                <div style="margin-bottom: 18px;">
                <div style="margin-right: 15px; display: inline-block;">
                {{ Form::label("CPU&nbsp;", null) }}
                {!! Form::select("cpu_id", $cpus, null, ['placeholder' => '&nbsp;&nbsp;Specify your CPU&nbsp;&nbsp;', 'style' => 'color: #C7D5E0; background: #2A475E; border: none; height: 30px; border-radius: 2px;']) !!}
                </div>
                <div style="display: inline-block; margin-right: 15px;">
                {{ Form::label("GPU&nbsp;", null) }}
                {!! Form::select("gpu_id", $gpus, null, ['placeholder' => '&nbsp;&nbsp;Specify your GPU&nbsp;&nbsp;', 'style' => 'color: #C7D5E0; background: #2A475E; border: none; height: 30px; border-radius: 2px;']) !!}
                </div>
                <div style="display: inline-block; margin-right: 15px;">
                {!! Form::text("driver_version", null, ['placeholder' => 'Driver', 'class' => 'form-control', 'style' => 'width: 115px; display: inline-block; color: #C7D5E0; height: 35px; background: #1B2838; border: 1px solid #2A475E;']) !!}
                </div>
                </div>
            </div>
            <div style="width: calc(50% - 17.5px); display: inline-block; float: left;">
            {{ Form::label("What works?", null) }}
            {!! Form::textarea("works", null, ['class' => 'form-control', 'style' => 'color: #C7D5E0; height: 75px; background: #1B2838; border: 1px solid #2A475E;']) !!}
            </div>
            <div style="width: calc(50% - 17.5px); margin-bottom: 25px; display: inline-block; float: right;">
            {{ Form::label("What's broken?", null) }}
            {!! Form::textarea("broken", null, ['class' => 'form-control', 'style' => 'color: #C7D5E0; height: 75px; background: #1B2838; border: 1px solid #2A475E;']) !!}
            </div>
			<div style="width: 100%;">
            	<p style="display: inline-block;">Did you try any tweaks to get the game running better?&nbsp;</p>
				{!! Form::checkbox('tweaks', 'value', false, ['id' => 'tweaks-box']) !!}
			</div>
			<div id="autoUpdate">
				<div style="width: 100%; margin-bottom: 25px;">
				{{ Form::label("What tweaks did you do?", null) }}
				{!! Form::textarea("tweaks", null, ['class' => 'form-control', 'style' => 'color: #C7D5E0; height: 175px; background: #1B2838; border: 1px solid #2A475E;']) !!}
				</div>
                <div style="width: calc(50% - 17.5px); display: inline-block; float: left;">
                {{ Form::label("What works now?", null) }}
                {!! Form::textarea("works_after", null, ['class' => 'form-control', 'style' => 'color: #C7D5E0; height: 75px; background: #1B2838; border: 1px solid #2A475E;']) !!}
                </div>
                <div style="width: calc(50% - 17.5px); margin-bottom: 25px; display: inline-block; float: right;">
                {{ Form::label("What's broken now?", null) }}
                {!! Form::textarea("broken_after", null, ['class' => 'form-control', 'style' => 'color: #C7D5E0; height: 75px; background: #1B2838; border: 1px solid #2A475E;']) !!}
                </div>
			</div>
			<div style="width: 100%; margin-bottom: 25px;">
				{{ Form::label("Extra notes", null) }}
				{!! Form::textarea("notes", null, ['class' => 'form-control', 'style' => 'color: #C7D5E0; height: 175px; background: #1B2838; border: 1px solid #2A475E;']) !!}
			</div>
			<div style="display: inline-block; margin-right: 15px;">
                {{ Form::label("Overall Compatibility&nbsp;", null) }}
                {!! Form::select("compatibility_id", $compatibilities, null, ['placeholder' => '&nbsp;&nbsp;How did it run?&nbsp;&nbsp;', 'style' => 'color: #C7D5E0; background: #2A475E; border: none; height: 30px; border-radius: 2px;']) !!}
            </div>
            {!! Form::submit("Submit", ['class' => 'standard-btn' , 'style' => 'border-radius: 1.5px; color: #C7D5E0; background: #2A475E; border: none; outline: none; height: 40px; width: 92.5px; float: right;']) !!}
        {!! Form::close() !!}
    </div>
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
