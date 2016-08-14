@extends('frontend.master')
@section('title', 'Confirmation')
@section('custom-styles')
<style type="text/css">
	.conf {
		height: 100vh;
		width: 100vw;
		text-align: center;
		vertical-align: center;
	}
	.conf span {
		color: #008058;
	    font-size: 10vh;
	    top: 20%;
	    position: relative;
	}
</style>
@endsection

<div class="conf">
	<span>{!! $message !!}</span>
</div>