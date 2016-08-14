 <!-- Modal For Add File -->
<div class="modal fade" id="add_file" tabindex="-1" role="dialog" aria-labelledby="add_file_label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
        <h2 class="modal-title" id="add_file_label">Add File</h2>
      </div>

      <div class="modal-body">
            {!! Form::open(array('route' => ['storeFile'], 'files'=>true)) !!}
                        {{ csrf_field() }}

                         <div class="form-group">
                            <label for="class" class="col-md-4 control-label">Class :</label>

                                <select id="class" class="form-control" name="class" required>
                                    <option value=""></option>
                                    @foreach($classes as $class)
                                      <option value="{{$class->id}}">{{$class->name}}</option>
                                    @endforeach
                                </select>
                            
                        </div>

                        <div class="form-group">
                            <label for="subject" class="col-md-4 control-label">Subject. :</label>

                                <select id="subject" class="form-control" name="subject" required>
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="data_file_type" class="col-md-4 control-label">File Of :</label>

                                <select id="data_file_type" class="form-control" name="data_file_type" required>
                                    @foreach ($fileTypes as $type)
                                      <option value="{{$type->id}}">{{$type->type}}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="form-group">
                          <label for="file_chosen" class="col-md-4 control-label">Choose File</label>

                             {!! Form::file('file_chosen', null, ['class' => 'form-control', 'id'=>'file_chosen']) !!}
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description :</label>

                                <textarea rows="4" cols="40" id="description" type="text" placeholder="Enter description" class="form-control" name="description" required></textarea>
                        </div>


                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Submit
                                </button>
                        </div>
                    {!! Form::Close() !!}
        
    </div>
      <div class="modal-footer">
      </div>
      </div>
        
  </div>
</div>

