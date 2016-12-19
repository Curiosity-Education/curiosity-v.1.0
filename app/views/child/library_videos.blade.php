@extends('templates.child-menu')

@section('css')
    {{ HTML::style('packages/assets/css/child/main.css') }}
@stop

@section('title')
	 Rincón de Videos
@stop

@section('content')

@stop

@section('js')
	{{ HTML::script('/packages/assets/js/child/library_videos.js') }}
@stop
