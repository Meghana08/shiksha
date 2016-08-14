<div class="listing-items">
  <div class="row">
    <div class="col-md-12"> 
      <p class="lead">       
        @if($class->deleted)
        <span class="pull-left label label-danger">
          @else
          <span class="pull-left label label-primary">
            @endif
            {{ $class->id }}- Class {{ $class->name }}</span>
            <span class="pull-right label label-warning"><b>Submitted on : </b>{{ $class->created_at }}</span>
          </p>
          <hr>
        </div>
      </div>
      <?php 
      $presentSubs = array();
      $leftSubs = $subjects;
      ?>
      <div class="row">
        <div class="col-md-6">
          <p>
            @foreach($classSubjects as $subject)
            @if($subject->class_id == $class->id && !($subject->deleted))
            <span class="label label-info">{{ $subject->subject_id }} - {{ $subject->getSubject->name }}</span> &nbsp;
            <?php 
            $presentSubs[$subject->subject_id] = $subject->getSubject->name;
            unset($leftSubs[$subject->subject_id]);
            ?>
            @endif
            @endforeach
          </p>
        </div>

        <div class="col-md-2"> 
          @if($class->deleted)  
          <a class="btn btn-success" href="{{ url('admin/class/add-back/'.$class->id) }}"><i class="fa fa-btn fa-check"></i>Add Back</a>
          @else
          <a class="btn btn-danger" href="{{ url('admin/class/remove/'.$class->id) }}"><i class="fa fa-btn fa-remove"></i>Remove Class</a>
          @endif
        </div>      

        <div class="col-md-4">   
          <a class="btn btn-success sub-show" href="{{ '#subDivAdd'.$class->id }}"><i class="fa fa-btn fa-check"></i>Add Subject</a>
          <a class="btn btn-danger sub-show" href="{{ '#subDivRemove'.$class->id }}"><i class="fa fa-btn fa-remove"></i>Remove Subject</a>
        </div>
      </div>
      <hr>
      <div class="row subject-div" id="{{ 'subDivAdd'.$class->id }}">
        {{ Form::open([ 'url'=>'admin/class/add-subjects/'.$class->id,'method'=>'post'])  }}
        {{ csrf_field() }}
        <div class="col-md-10">
          @foreach($leftSubs as $id => $subject)
                <input class="checkbox-inline" type="checkbox" name="{{'addSub[]'}}" value="{{ $id }}">{{ $subject }} &nbsp;
          @endforeach
        </div>
        <div class="col-md-2">   
          <button type="submit" class="btn btn-success submit-btn">
            <i class="fa fa-btn fa-check"></i> Add
          </button>
        </div>
        {!! Form::Close() !!}
      </div>

      <div class="row subject-div" id="{{ 'subDivRemove'.$class->id }}">
        {{ Form::open([ 'url'=>'admin/class/remove-subjects/'.$class->id,'method'=>'post'])  }}
        {{ csrf_field() }}
        <div class="col-md-10">
          @foreach($presentSubs as $id => $subject)
          <input class="checkbox-inline" type="checkbox" name="{{'removeSub[]'}}" value="{{ $id }}">{{ $subject }} &nbsp;
          @endforeach
        </div>
        <div class="col-md-2">   
          <button type="submit" class="btn btn-danger submit-btn">
            <i class="fa fa-btn fa-remove"></i> Remove
          </button>
        </div>
        {!! Form::Close() !!}
      </div>

      <hr>
    </div>