@extends('frontend.master')
@section('title', 'Home')

@section('custom-styles')
<style type="text/css">
	option {
		color: black;
	}

	.form-group {
		color: #fff;
		/*padding: 10px;*/
	}
</style>
@endsection

@section('main')

<!-- Registration Section -->
<section id="main">
	<div class="row">
		<div class="col-md-12 tab-list">        
			<div class="row">
				<div id="tabBtn1" class="col-lg-4 col-md-4 col-sm-4 tab-btn active">
					<a class="page-shift" href="#sec1">Profile</a>
				</div>
				<div id="tabBtn2" class="col-lg-4 col-md-4 col-sm-4 tab-btn">
					<a class="page-shift" href="#sec2">Password</a>
				</div>
				<div id="tabBtn3" class="col-lg-4 col-md-4 col-sm-4 tab-btn">
					<a class="page-shift" href="#sec3">Add query</a>
				</div>
			</div>
		</div>
	</div>
	<section class="pro-form-section" id="sec1" style="display:block">
		<div class="row">
			<div class="col-lg-12">
				<div class="clearfix">
					<h2 class="small-heading" id="regSectionLabel">
						@if(!strcmp($type,'teacher'))
						TEACHER PROFILE
						@else
						STUDENT PROFILE
						@endif
					</h2>
					{{ Form::open([ 'url'=>'/update/'.$type,'method'=>'post','id'=>'reg_form', 'files'=>true])  }}
					{{ csrf_field() }}
					<div class="row">
						<div class="form-group col-md-6">                            
							<label for="f_name" class="col-md-4 control-label pull-left">First Name :</label>

							<input id="f_name" type="text" class="form-control" name="f_name" placeholder="Enter your first name" pattern="[A-Za-z\s]{1,}" title="Only characters and spaces allowed" value="{{ $user->first_name }}" required>
						</div>

						<div class="form-group col-md-6">                            
							<label for="l_name" class="col-md-4 control-label pull-left">Last Name :</label>

							<input id="l_name" type="text" class="form-control" name="l_name" placeholder="Enter your last name" pattern="[A-Za-z\s]{1,}" title="Only characters and spaces allowed" value="{{ $user->last_name }}" required>
						</div>
					</div>


				@if(!strcmp($type,'student'))
					@if(is_null($userClassID))
					<div class="row">
						<div id="stud_class" class="form-group col-md-4">
							<label for="class" class="col-md-4 control-label">Class :</label>
							<select id="class" class="form-control" name="class">
								<option value=""></option>
								@foreach($classes as $class)
								<option value="{{$class->id}}">{{$class->name}}</option>
								@endforeach
								<option value="other" selected="selected">Other</option>
							</select>
							<input id="otherClass" class="form-control" type="text" name="otherClass" placeholder="Enter class" value="{{ $otherClass }}">

						</div>

						<div class="form-group col-md-4">
							<label for="subject" class="col-md-4 control-label">Subjects :</label><br>
							<div id="subjectDiv" class="form-control" name="subjectDiv" style="border:0px; margin-top:20px">
								<input class="form-control" type="text" name="otherSubject" id="otherSubject" placeholder="Enter other subject" value="{{ $otherSubject }}">
							</div>
						</div>
					@else
						<div class="row">
							<div id="stud_class" class="form-group col-md-4">
								<label for="class" class="col-md-4 control-label">Class :</label>
								<select id="class" class="form-control" name="class">
									<option value=""></option>
									@foreach($classes as $class)
									@if($class->id == $userClassID)
									<option value="{{$class->id}}" selected="selected">{{$class->name}}</option>
									@else
									<option value="{{$class->id}}">{{$class->name}}</option>
									@endif
									@endforeach
									<option value="other">Other</option>
								</select>
							</div>

							<div class="form-group col-md-4">
								<label for="subject" class="col-md-4 control-label">Subjects :</label><br>
								<div id="subjectDiv" class="form-control" name="subjectDiv" style="border:0px; margin-top:20px; height: auto;">
									@foreach($subjects as $subject)
									@if(in_array($subject->id,$userSubjects))
									<input class="checkbox-inline" type="checkbox" name="subject[]" value="{{ $subject->getsubject->id }}" checked="true">{{ $subject->getsubject->name }}
									@else
									<input class="checkbox-inline" type="checkbox" name="subject[]" value="{{ $subject->getsubject->id }}">{{ $subject->getsubject->name }}
									@endif
									@endforeach
									<input class="form-control" type="text" name="otherClassSubject" id="otherClassSubject" placeholder="Enter other subject" value="{{ $otherClassSubject }}">
								</div>
							</div>
					@endif

							<div class="form-group col-md-4">                            
								<label for="institute" class="col-md-4 control-label pull-left">School/Institute :</label>

								<input id="institute" type="text" class="form-control" name="institute" placeholder="Enter your last name" value="{{ $user->institute }}">
							</div>
						</div>
				@else

						<div class="row">
							<div class="form-group col-md-12">
								<label for="preferred_location" class="col-md-4 control-label">Preferred Location for teaching :</label>
								<input id="preferred_location" type="text" class="form-control" placeholder="Enter your Preferred Location" name="preferred_location" value="{{ $user->preferred_location }}">
							</div>
						</div>

						<?php
						$highID=-1;
						foreach ($userClassID as $id => $userClass) {
							$highID = $id;
						} 
						$highID++;
						?>
						<div id="tab_logic">
							@foreach($userClassID as $id => $userClass)
							<div id="{{'addr'.$id}}" class="row">
								<div class="form-group col-md-6">
									<label for="{{'class'.$id}}" class="col-md-4 control-label">Class :</label>
									<select id="{{'class'.$id}}" class="form-control" name="{{'class'.$id}}" onchange="loadSubjects(this)">
										<option value=""></option>
										@foreach($classes as $class)
										@if($class->id == $userClass)
										<option value="{{$class->id}}" selected="selected">{{$class->name}}</option>
										@else
										<option value="{{$class->id}}">{{$class->name}}</option>
										@endif
										@endforeach
										<option value="other">Other</option>
									</select>
								</div>

								<div class="form-group col-md-4">
									<label for="{{'subject'.$id}}" class="col-md-4 control-label">Subjects :</label><br>
									<div id="{{'subjectDiv'.$id}}" class="form-control" name="{{'subjectDiv'.$id}}" style="border:0px; margin-top:20px">
										@foreach($subjects[$id] as $subject)
										@if(in_array($subject->id,$userSubjects))
										<input class="checkbox-inline" type="checkbox" name="{{'subject'.$id.'[]'}}" value="{{ $subject->getsubject->id }}" checked="true">{{ $subject->getsubject->name }}
										@else
										<input class="checkbox-inline" type="checkbox" name="{{'subject'.$id.'[]'}}" value="{{ $subject->getsubject->id }}">{{ $subject->getsubject->name }}
										@endif
										@endforeach
										<input class="form-control" type="text" name="{{'otherClassSubject'.$id}}" id="{{'otherClassSubject'.$id}}" placeholder="Enter other subject" value="{{ $otherClassSubject[$id] }}">
									</div>
								</div>
							</div>
							@endforeach
							@for($i=0; $i < $otherNum; $i++)
							<div class="row">
								<div id="stud_class" class="form-group col-md-4">
									<label for="{{ 'class'.($highID+$i) }}" class="col-md-4 control-label">Class :</label>
									<select id="{{ 'class'.($highID+$i) }}" class="form-control" name="{{ 'class'.($highID+$i) }}">
										<option value=""></option>
										@foreach($classes as $class)
										<option value="{{$class->id}}">{{$class->name}}</option>
										@endforeach
										<option value="other" selected="selected">Other</option>
									</select>
									<input id="{{'otherClass'.($highID+$i)}}" class="form-control" type="text" name="{{'otherClass'.($highID+$i)}}" placeholder="Enter class" value="{{ $otherClass[$i] }}">

								</div>

								<div class="form-group col-md-4">
									<label for="{{'subject'.($highID+$i)}}" class="col-md-4 control-label">Subjects :</label><br>
									<div id="{{'subjectDiv'.($highID+$i)}}" class="form-control" name="{{'subjectDiv'.($highID+$i)}}" style="border:0px; margin-top:20px">
										<input class="form-control" type="text" name="{{'otherSubject'.($highID+$i)}}" id="{{'otherSubject'.($highID+$i)}}" placeholder="Enter other subject" value="{{ $otherSubject[$i] }}">
									</div>
								</div>
							</div>
							@endfor

							<?php 
							$highID = $highID+$otherNum;
							?>







							<div id="{{'addr'.$highID}}" name="{{'addr'.$highID}}" class="row"></div>
							<div id="class_btns" class="row">
								<a id="add_row" class="btn btn-default pull-left">Add Class</a>
								<a id='delete_row' class="pull-right btn btn-default">Delete Class</a>
							</div> 
						</div> 
						<input type="hidden" id="rownum" name="rownum" value="{{$highID}}">
				@endif

						<div class="row">
							<div class="form-group col-md-6">
								<label for="contact" class="col-md-4 control-label">Contact No. :</label>
								<input id="contact" type="text" class="form-control" placeholder="Enter your Contact Number" name="contact" pattern="[0-9+-]{8,15}" title="There should be numbers,+ or - only. Length: 8-15" value="{{ $user->contact }}" required>
							</div>
							<div class="form-group col-md-6">
								<label for="email" class="col-md-4 control-label">Email ID :</label>
								<input id="email" type="email" class="form-control" value="{{ $user->email }}" placeholder="Enter your email" name="email">
							</div>
						</div>

						@if(!strcmp($type,'teacher'))
						<div id="quali" class="row">
							<div class="form-group col-md-6">
								<label for="qualification" class="col-md-4 control-label">Qualification :</label>
								<input id="qualification" type="text" class="form-control" name="qualification" placeholder="Enter your qualification" value="{{ $user->qualification }}" pattern="[A-Za-z0-9,\s]{1,}" title="Only characters, numericals, coma operator and spaces allowed">
							</div>

							<div class="form-group col-md-6">
								<label for="resume" class="col-md-4 control-label">Upload Resume</label><br><br>
								<a class="form-control col-md-4" href="{{ asset('/tutor_resume/'.$user->resume) }}">Resume</a> 
								{!! Form::file('resume', null, ['class' => 'form-control col-md-4 file_input', 'id'=>'resume']) !!}
							</div>
						</div>
						@endif

						<div class="row">
							<div class="form-group col-md-12">
								<label><u>Address :</u></label>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<label for="house" class="control-label">House Number :</label>
								<input type="text" class="form-control" name="house" id="house" placeholder="house number" value="{{ $user->house_no }}" pattern="[A-Za-z0-9,/\s]{1,}" title="Only characters, numericals, coma operator,/ and spaces allowed" required>
							</div>
							<div class="form-group col-md-6">
								<label for="location" class="control-label">Location :</label>
								<input type="text" class="form-control" name="location" id="location" value="{{ $user->location }}">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-12">
								<label for="message" class="col-md-4 control-label">Message :</label>
								<input id="message" type="text" class="form-control" placeholder="Enter your message" name="message" value="{{ $user->message }}">
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<center>
									<button type="submit" class="btn btn-primary submit-btn">
										<i class="fa fa-btn fa-edit"></i> Update
									</button>
								</center>
							</div>
						</div>
						{!! Form::Close() !!}
					</div>
				</div>
			</div>		
		</section>
		<section class="pro-form-section" id="sec2">
			<div class="row">
				<div class="col-md-offset-4	col-md-4 col-sm-4 col-sm-offset-4">
					<h2 class="small-heading">
						Section 2
					</h2>
					{{ Form::open([ 'url'=>'/change-password/'.$type,'method'=>'post','id'=>'password_form'])  }}
					{{ csrf_field() }}
					<div class="row">
						<div class="form-group col-md-12">                            
							<label for="pass" class="col-md-4 control-label pull-left">Enter New Password :</label>
							<input id="pass" type="password" class="form-control" name="pass" placeholder="Enter the new password" pattern="[A-Za-z0-9@_]{1,10}" title="Only 10 characters, numerical, '@' and '_' allowed" required>
						</div>

						<div class="form-group col-md-12">                            
							<label for="re_pass" class="col-md-4 control-label pull-left">Re-enter Password :</label>
							<input id="re_pass" type="password" class="form-control" name="re_pass" placeholder="Re-enter the new password" pattern="[A-Za-z0-9@_]{1,10}" title="Only 10 characters, numerical, '@' and '_' allowed" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<center>
								<button type="submit" class="btn btn-primary submit-btn">
									<i class="fa fa-btn fa-edit"></i> Update
								</button>
							</center>
						</div>
					</div>
					{!! Form::Close() !!}
				</div>
			</div>
		</section>
		<section class="pro-form-section" id="sec3">
				<div class="clearfix" style="padding:50px">
					<h2 class="small-heading" id="regSectionLabel">
						Section 3
					</h2>
				</div>
		</section>

	</section>
	@endsection

	@section('footer-scripts')
	<script>

		$('#class').on('change',function(e) {
			console.log(e);
			var class_id = e.target.value;
			console.log('class Id :'+class_id);
			if(class_id=='other') {
				$('#stud_class').append('<input id="otherClass" class="form-control" type="text" name="otherClass" placeholder="Enter class">'); 
				$('#subjectDiv').empty();
				$('#subjectDiv').append('<input id="otherSubject" class="form-control" type="text" name="otherSubject" placeholder="Enter subjects">');
			}
			else {

				var elem1 = document.getElementById('otherClass');
				if(elem1)
					elem1.parentNode.removeChild(elem1);
				var elem2 = document.getElementById('otherSubject');
				if(elem2)
					elem2.parentNode.removeChild(elem2);

          //ajax
          $.get('/ajax-subject?class_id='+class_id, function(data) {
            //success data
            console.log('data : '+data);
            $('#subjectDiv').empty();
            $.each(data, function(index, subObj) {
            	$('#subjectDiv').append('<input class="checkbox-inline" type="checkbox" name="subject[]" value="'+subObj.id+'">'+subObj.name);
            });
        });
      }
  });

		function loadSubjects(ele) {
			var class_id = ele.value;
			var ele_id = ele.id.substring(5);
			console.log(class_id+'-'+ele_id); 
			console.log('class Id :'+class_id);

          //ajax
          $.get('/ajax-subject?class_id='+class_id, function(data) {
            //success data
            console.log('data : '+data);
            $('#subjectDiv'+ele_id).empty();
            $.each(data, function(index, subObj) {
            	$('#subjectDiv'+ele_id).append('<input class="checkbox-inline" type="checkbox" name="subject'+ele_id+'[]" value="'+subObj.id+'">'+subObj.name);
            });
        });
      }


      $(document).ready(function(){
      	var i=$("#rownum").val();
      	$("#add_row").click(function(){
      		console.log('added:'+i);
      		$('#addr'+i).html("<div class='form-group col-md-6'> <label for='class"+i+"' class='col-md-4 control-label'>Class :</label> <select id='class"+i+"' class='form-control' name='class"+i+"' onchange='loadSubjects(this)'> <option value=''></option> @foreach($classes as $class) <option value='{{$class->id}}'>{{$class->name}}</option> @endforeach <option value='other'>Other</option> </select> </div>  <div class='form-group col-md-6'> <label for='subject"+i+"' class='col-md-4 control-label'>Subjects :</label><br> <div id='subjectDiv"+i+"' class='form-control' name='subjectDiv"+i+"' style='border:0px; margin-top:20px'><br> Choose any Class First </div> </div>");

      		$('#tab_logic').append('<div id="addr'+(++i)+'" class="row"></div>');

      		$('#rownum').val(i);
      	});
      	$("#delete_row").click(function(){
      		console.log('added:'+i);
      		if(i>1){
      			$("#addr"+(i-1)).html('');
      			i--;
      			$('#rownum').val(i);

      		}
      	});

      });

  </script>
  @endsection