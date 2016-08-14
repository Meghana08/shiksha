<div class="listing-items">
  <div class="row">
    <div class="col-md-12">        
    <p class="lead"><span class="pull-left label label-primary"> {{ $feedback->getUser->name }} </span>
    <span class="pull-right label label-warning"><b>Submitted on : </b>{{ $feedback->created_at }}</span>
      </p>
      <hr>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">        
      <p><span><b>Response : </b></span>{{ $feedback->getResponseGrade->name }}</p>     
      <p><span><b>Material : </b></span>{{ $feedback->getMaterialGrade->name }}</p>
    </div>

    <div class="col-md-3">        
      <p><span><b>Query Resolution : </b></span>{{ $feedback->getQueryResolveGrade->name }}</p>
    </div>

    <div class="col-md-4">   
      <p>{{ $feedback->message }}</p>
    </div>

    <div class="col-md-2"> 
      @if($feedback->at_front)  
        <a class="btn btn-danger" href="{{ url('admin/feedback/remove/'.$feedback->id) }}"><i class="fa fa-btn fa-remove"></i>Remove From Front</a>
      @else 
        <a class="btn btn-success" href="{{ url('admin/feedback/accept/'.$feedback->id) }}"><i class="fa fa-btn fa-check"></i>Show at front</a>
      @endif
    </div>
  </div>
  <hr>
</div>