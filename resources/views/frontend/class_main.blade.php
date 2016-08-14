@extends('frontend.master')
@section('title', 'Class'.$className)

@section('main')
  <section id="main">

      <div class="container-fluid">
      <center><h3>Class {{$className}}</h3></center>
        
        
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
                  @if(!($subjects->isEmpty()))
                    @foreach($subjects as $subject)
                        <div class="row">
                        @include('frontend.partials._classSubjectCard')
                        </div>
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



