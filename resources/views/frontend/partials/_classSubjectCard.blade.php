<div class="listing-items">
    <div class="row">
      <div class="col-md-offset-1 col-md-5">        
        <p class="lead">{{ $subject->getSubject->name }}</p>
      </div>
      <div class="col-md-2">  
          <ul class="list-unstyled" style="font-size: 16px">
            <li>
              <a class="btn btn-success" href={{ url('samplePapers/'.$subject->id) }}>
                <span class="glyphicon glyphicon-user"></span>Sample Papers
              </a>
            </li>
          </ul>
      </div>
      <div class="col-md-2">  
          <ul class="list-unstyled" style="font-size: 16px">
            <li>
              <a class="btn btn-warning" href={{ url('keyNotes/'.$subject->id) }}>
                <span class="glyphicon glyphicon-user"></span>Key Notes
              </a>
            </li>
          </ul>
      </div>
      <div class="col-md-2">  
          <ul class="list-unstyled" style="font-size: 16px">
            <li>
              <a class="btn btn-info" href={{ route('prevYearPapers', $subject->id) }}>
                <span class="glyphicon glyphicon-user"></span>Previous Year Papers
              </a>
            </li>
          </ul>
      </div>
    </div>
</div>
<hr>