<div class="listing-items">
<div class="row">
  <div class="col-md-9">
    <div class="row">
      <div class="col-md-12">        
        <p class="lead">{{ $content->title }}</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">        
        <p>{{ $content->content }}</p>
      </div>
      <div class="col-md-4">  
          <ul class="list-unstyled pull-right" style="font-size: 16px">
            <li>
              <a class="btn btn-primary" href={{ route('changeContent', $content->id) }}>
                <span class="glyphicon glyphicon-edit"></span>Edit
              </a>
            </li>
          </ul>
      </div>
    </div>
    <hr>
  </div>
</div>
</div>