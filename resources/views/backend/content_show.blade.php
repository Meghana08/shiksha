@extends('backend.master')
@section('title', 'Home')

@section('main')
<section id="main">
  
        <div class="row">
                <div class="col-lg-12 col-lg-offset-1 col-xs-12 col-xs-offset-1">
                  <p class="center-content">
                    
                      @foreach($contents as $content)
                        @include('backend.partials._contentCard')
                      @endforeach
                    
                  </p>
                </div>
              </div>
      
</section>
@endsection
