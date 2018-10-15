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
    <h1>Terms and Conditions</h1>
    <p>Don't post adult content anywhere on this site.</p>
    <p>Don't post inaccurate test data anywhere on this site.</p>
    <p>Don't try to break this site.</p>
    <p>If you break any rules, we hsve the right to terminate your account.</p>
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
