@extends('frontend.master')
@section('title', $type)

@section('main')
  <section id="main">

      <div class="container-fluid">
      <center><h3>{{ $type }}</h3></center>
        
          <!-- Add anything from here -->

            <div class="panel panel-default panel-list">
                <!-- start panel heading -->
                <div class="panel-heading compact-pagination ">
                  <div class="row">
                    <div class="col-md-9">
                      {{-- other content --}}
                    </div>
                    <div class="col-md-3">
                        <!-- some data -->
                        
                    </div>
                  </div>
               </div>
                <!-- ending panel-heading -->

                {{-- starting list items --}}
                <div class="panel-body">
                  @if(!($papers->isEmpty()))
                    @foreach($papers as $paper)
                        @include('frontend.partials._materialCard')
                    @endforeach   
                  @else
                      <p>No records</p>
                  @endif 
                </div>
                {{-- ending list items --}}

                  <!-- panel-footer -->
                <div class="panel-footer compact-pagination">
                    <div class="row">
                      <div class="col-md-9">
                        {{-- other content --}}
                      </div>
                      <div class="col-md-3">
                          {{-- some data --}}
                      </div>
                    </div>
                  </div>
                </div>
              <!-- /.panel -->
          <!-- Add anything till here -->
        </div>
  </section>
@endsection



