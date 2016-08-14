<div class="listing-items">
<div class="row">
      <div class="col-md-12">        
        <p class="lead"><span class="pull-left label label-primary">{{ $tutor->id }}- {{ $tutor->first_name }} {{ $tutor->last_name }}</span>
        <span class="pull-right label label-warning"><b>Submitted on : </b>{{ $tutor->created_at }}</span>
        </p>
        <hr>
      </div>
    </div>


    <div class="row">
      <div class="col-md-4">  
        <?php 
          use App\User;

          $id = User::where('member_id',$tutor->id)->where('type_id',$type)->value('id');
          $userSubjects = $userSubjects->where('user_id',$id)->get();
          $class = null;
          $visSubs = array();
        
          foreach($userSubjects as $sub) {
            if($sub->getSubject) {
              if($class == $sub->getSubject->getClassName->name || is_null($class)) {
                if($sub->class_subject_id == '-1') {
                  $visSubs[] = $sub->other_subject;
                }
                else {
                  $class = $sub->getSubject->getClassName->name;
                  $visSubs[] = $sub->getSubject->getSubject->name;
                }
              }
              else {
                ?>
                    <p><span><b>Class : </b></span>{{ $class}}
                    </p>     
                    <p><span><b>Subject : </b></span>
                    @foreach($visSubs as $subject)
                      {{$subject}},
                    @endforeach
                    </p>
                <?php
              }
            }
          }
        ?>
       
        
      </div>




    <!-- <div class="row">
      <div class="col-md-4">        
        <p><span><b>Class : </b></span>{{ $tutor->class }}</p>     
        <p><span><b>Subject : </b></span>{{ $tutor->subjects }}</p>
      </div> -->
      <div class="col-md-4">        
        <p><span><b>Qualification : </b></span>{{ $tutor->qualification }}</p>
        @if(!is_null($tutor->resume))
            <p><span><b>Resume : </b></span><a class="btn btn-success" href="{{ asset('tutor_resume/'.$tutor->resume) }}"><span class="glyphicon glyphicon-user"></span>View File</a></p>
        @endif
      </div>
      <div class="col-md-4">
        <p><span><b>Contact : </b></span>{{ $tutor->contact }}</p>     
        <p><span><b>Email : </b></span>{{ $tutor->email }}</p>
      </div>
    </div>
    <hr>
  </div>