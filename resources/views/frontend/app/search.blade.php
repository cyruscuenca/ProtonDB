@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<div style="padding-top: calc(50vh - 225px); padding: none; text-align: center;">
<img style="height: 100px; margin-bottom: 36px;" src="{{asset('img/backend/search-term.png')}}">
        {!! Form::open(['route' => ['frontend.app.search']]) !!}
        {!! Form::text("term", null, ['placeholder' => 'Enter search term', 'class' => 'form-control', 'style' => 'width: 300px; display: inline-block; color: #C7D5E0; height: 35px; background: #1B2838; border: 1px solid #2A475E;']) !!}
        {!! Form::submit("Submit", ['class' => 'standard-btn' , 'style' => 'border-radius: 1.5px; color: #C7D5E0; background: #2A475E; border: none; outline: none; height: 40px; width: 92.5px; float: right;']) !!}
        {!! Form::close() !!}
</div>
@endsection
