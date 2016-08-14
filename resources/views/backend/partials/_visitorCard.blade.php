<div class="listing-items">
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
        <?php 
          use App\User;

          $id = User::where('member_id',$visitor->id)->where('type_id',$type)->value('id');
          $class = "";
          $visSubs = array();
        
          foreach($userSubjects as $sub) {
            if($sub->user_id==$id) {
              if($sub->class_subject_id == '0') {
                $class = $sub->other_class;
                $visSubs[] = $sub->other_subject;
              }
              else if($sub->class_subject_id == '-1') {
                $visSubs[] = $sub->other_subject;
              }
              else {
                $class = $sub->getSubject->getClassName->name;
                $visSubs[] = $sub->getSubject->getSubject->name;
              }
            }
          }
        ?>
       
        <p><span><b>Class : </b></span>{{ $class}}
        </p>     
        <p><span><b>Subject : </b></span>
        @foreach($visSubs as $subject)
          {{$subject}},
        @endforeach
        </p>
      </div>
      <div class="col-md-3">        
        <p><span><b>Contact : </b></span>{{ $visitor->contact }}</p>  
        <p><span><b>Email : </b></span>{{ $visitor->email }}</p>   
        <p><span><b>Institute : </b></span>{{ $visitor->institute }}</p>
      </div>
      <div class="col-md-3">        
        <p><span><b>Address : </b></span>{{ $visitor->house_no }} {{ $visitor->location }}</p>
      </div>
      <div class="col-md-3">        
        <p><span><b>Message : </b></span>{{ $visitor->message }}</p>
      </div>
    </div>
    <hr>
  </div>