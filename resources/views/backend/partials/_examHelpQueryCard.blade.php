<div class="listing-items">
<?php 
  $visitor = \App\UserDetails::find($help->getVisitor->id);
  $topics = \App\ExamHelpSubject::where('help_id',$help->id)->get();
  // dd($visitor);
?>
    <div class="row">
      <div class="col-md-12">        
        <p class="lead"><span class="pull-left label label-primary">{{ $visitor->id }}- {{ $visitor->first_name }} {{ $visitor->last_name }}</span>
        <span class="pull-right label label-warning"><b>Submitted on : </b>{{ $visitor->created_at }}</span>
        </p>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">        
        <p><span><b>Contact : </b></span>{{ $visitor->contact }}</p>  
        <p><span><b>Email : </b></span>{{ $visitor->email }}</p>   
      </div>
      <div class="col-md-3">        
        <p><span><b>Institute : </b></span>{{ $visitor->institute }}</p>
        <p><span><b>Address : </b></span>{{ $visitor->house_no }} {{ $visitor->location }}</p>
      </div>
      <div class="col-md-4">
      @foreach($topics as $topic)
        <p><span><b>Subject : </b></span>{{ $topic->other_subject }} - <span><b>Topic : </b></span>{{ $topic->topic }}</p>
      @endforeach
      </div>
    </div>
    <hr>
  </div>