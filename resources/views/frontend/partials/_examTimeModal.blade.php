 <!-- Modal For Add File -->
 <div class="modal fade" id="examTimeModal" tabindex="-1" role="dialog" aria-labelledby="examModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color:#5a9fe2">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>        
        <h4 class="modal-title" id="examModalLabel">Exam Time Help</h4>
      </div>
      <?php 
          $subjects = App\ClassSubject::where('class_id','1')->get();
      ?>

      <div class="modal-body">
          {{ Form::open([ 'route'=>'storeExamTimeHelp','method'=>'post'])  }}
          {{ csrf_field() }}
          <input type="hidden" id="rownum" name="rownum" value="1">
          <div id="msubjectdiv">
            <div class="row" id="addsub0">
              <div class="form-group">
                <div class='form-group col-md-6'> 
                  <label for='msubject0' class='col-md-4 control-label'>Subject :</label>
                  <input class="form-control" type="text" id="msubject0" name="msubject0">
                </div>
              </div>

              <div class="form-group">
                <div class='form-group col-md-6'> 
                  <label for='mtopic0' class='col-md-4 control-label'>Topics :</label>
                  <input class="form-control" type="text" id="mtopic0" name="mtopic0">
                </div>
              </div> 
            </div>  
          </div>
          <div id="addsub1" class="row">
            
          </div>


                                <div id="class_btns" class="row">
                                  <a id="madd_row" class="btn btn-default pull-left">Add row</a>
                                  <a id='mdelete_row' class="pull-right btn btn-default">Delete row</a>
                                </div>  


          <div class="row">
            <div class="col-md-12">
              <center>
                  <button type="submit" class="btn btn-primary submit-btn">
                      <i class="fa fa-btn fa-sign-in"></i> Submit
                  </button>
              </center>
            </div>
          </div>
          {!! Form::Close() !!}     
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>
