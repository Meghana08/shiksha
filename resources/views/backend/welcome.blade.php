@extends('backend.master')
@section('title', 'Home')

@section('custom-styles')
  <style type="text/css">
    body {
      padding-top: 0;
    }
  </style>
@endsection

@section('main')
<section id="main">

<div class="home-page" style="visibility: visible; ">
    <div class="introduction" style="width: 90%; height: 100%; left: 0px;">
      <div class="intro-content">
       <h1>Hi, We are</h1>
        <span class="number">S</span>
        <span>hiksha</span>
        <p class="slogan-text text-capitalize" style="text-align: right;">at scholars</p>

    @if(!is_null($message))
    <div>
      <p class="slogan-text text-capitalize" style="text-align: center; background-color:green; color:white; padding:10px;">{{ $message }}</p>
    </div> 
      @endif
      </div>  
           
</div>
      
</section>
@endsection