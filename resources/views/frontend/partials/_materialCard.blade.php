<div class="listing-items">
    <div class="row">
      <div class="col-md-12">        
        
          <p class="lead">Class -{{ $paper->getClassSubject->getClassName->name }} : {{ $paper->getClassSubject->getsubject->name }}</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">        
        <p>{{ $paper->description }}</p>
      </div>
      <div class="col-md-4">  
          <ul class="list-unstyled pull-right" style="font-size: 16px">
            <li>
              <a class="btn btn-success" href="{{ asset('material/'.$paper->file_name) }}">
                <span class="glyphicon glyphicon-user"></span>View File
              </a>
          </ul>
      </div>
    </div>
</div>
<hr>