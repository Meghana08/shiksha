@extends('backend.master')
@section('title', 'Classes')

@section('custom-styles')

<style type="text/css">
  .row p {
    padding-left: 2vw;
  }
  .subject-div {
    padding: 0px 20px;
    display: none;
  }
</style>

@endsection

@section('main')
<section id="main">  
{{-- */$id=0;/* --}}

<div class="container-fluid">
    <div class="row">
      <div class="col-md-9">
        <h3>Classes</h3>
      </div>
      <div class="col-md-3">
        <a class="btn btn-primary sub-show" href="#addClass">Add Class</a>&nbsp;
        <a class="btn btn-info sub-show" href="#addSubject">Add Subject</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
      </div>
    </div>

    <div class="subject-div" id="addClass">
      {{ Form::open([ 'url'=>'admin/class/add-class','method'=>'post'])  }}
      {{ csrf_field() }}
        <div class="row form-group">
          <div class="col-md-3">                         
              <label for="new_class" class="control-label">class Name :</label>
          </div>
          <div class="col-md-7">  
              <input id="new_class" type="text" class="form-control" name="new_class" placeholder="Enter class name">
          </div>
          <div class="col-md-2">   
            <button type="submit" class="btn btn-success submit-btn">
              <i class="fa fa-btn fa-check"></i> Add
            </button>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-10">                         
              <label class="control-label">Choose subjects you want too add in this class (optional) :</label>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-10">                         
              @foreach($subjects as $id => $subject)
                <input class="checkbox-inline" type="checkbox" name="{{'addSubjectsInClass[]'}}" value="{{ $id }}">{{ $subject }} &nbsp;
              @endforeach
          </div>
        </div>
      {!! Form::Close() !!}
      <hr>
    </div>

    <div class="subject-div" id="addSubject">
      {{ Form::open([ 'url'=>'admin/class/add-subject','method'=>'post'])  }}
      {{ csrf_field() }}
        <div class="row form-group">
          <div class="col-md-3">                         
              <label for="new_subject" class="control-label">Subject Name :</label>
          </div>
          <div class="col-md-7">  
              <input id="new_subject" type="text" class="form-control" name="new_subject" placeholder="Enter subject name">
          </div>
          <div class="col-md-2">   
            <button type="submit" class="btn btn-success submit-btn">
              <i class="fa fa-btn fa-check"></i> Add
            </button>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-10">                         
              <label class="control-label">Choose classes in which you want too add this subject (optional) :</label>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-10">                         
              @foreach($classes as $class)
                <input class="checkbox-inline" type="checkbox" name="{{'addInClass[]'}}" value="{{ $class->id }}">{{ $class->name }} &nbsp;
              @endforeach
          </div>
        </div>
      {!! Form::Close() !!}
      <hr>
    </div>

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
                  @if(!($classes->isEmpty()))
                    @foreach($classes as $class)
                        @include('backend.partials._classCard')
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


@section('footer-scripts')
   <script>
     $(function() {
        $('a.sub-show').bind('click', function(event) {
            var $anchor = $(this),
                $divID = $anchor.attr('href');
            $(".subject-div").css("display", "none");
            $($divID).css("display", "block");
            event.preventDefault();
        });
    });
  </script>

@endsection