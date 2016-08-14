<div id="filter">
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => 'adminFilterTutors', 'method' => 'get','class' => 'form-inline']) !!}
                <div class="form-group">
                    <label for="search"><b>Search By:-</b></label>
                    &emsp;
                    {!! Form::select('search', ['0'=>'Select','1' => 'Teacher ID', '2' => 'First Name', '3' => 'Last Name', '4' => 'Qualification', '5' => 'Contact', '6' => 'Email', '7' => 'Location'],$search) !!}
                    &emsp;
                   {!! Form::text('search_text',$search_text,['class'=>'form-control','placeholder'=>'Search text']) !!}
                </div>

                <div class="form-group">
                    <label for="request_from_date"><b>Requests from:-</b></label>
                    &emsp;
                    {!! Form::text('request_from_date',$fromDate, ['class'=>'form-control', 'id'=>'request_from_date','placeholder'=>'From Date'])!!}
                    <span class="help-text"></span>
               </div>

               <div class="form-group">
                    <label for="request_to_date"><b>Requests upto:-</b></label>
                    &emsp;
                    {!! Form::text('request_to_date', $toDate, ['class'=>'form-control', 'id'=>'request_to_date','placeholder'=>'To Date'])!!}
                    <span class="help-text"></span>
               </div>

               <div class="form-group">
                     <label for="rows"><b>Records per page</b></label>
                    &emsp;
                    <input type="number" name="rows" maxlength="2" width="20px" class="form-control" id="rows" value="{{$rows}}">
                </div>
                <button type="submit" class="btn btn-default pull-right">Search</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>