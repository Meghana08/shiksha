@extends('frontend.master')
@section('title', 'Home')
@section('main')
<section id="main" style="position:relative; top:0;">
	<img class="bg-image" src="{{ asset('img/bg/bg.jpg') }}">
	<div class="row">
		<div class="col-md-12 page-top-div">
			<ul class="cb-slideshow" style="list-style:none">
				<li>
					<span>Image 01</span>
					<div>
						<h1>Get Better Grades With Our High-Quality Tutoring</h1>
					</div>
				</li>
				<li>
					<span>Image 02</span>
					<div>
						<h1>We Do Things A Bit Differently</h1>
					</div>
				</li>
				<li>
					<span>Image 03</span>
					<div>
						<h1>Provides Home Tutors for Delhi/NCR</h1>
					</div>
				</li>
				<li>
					<span>Image 04</span>
					<div>
						<h1>Skilled Tutors Develop Lessons To Meet Needs</h1>
					</div>
				</li>
				<li>
					<span>Image 05</span>
					<div>
						<h1>Work With Students To Explore Advanced</h1>
					</div>
				</li>
				<li>
					<span>Image 06</span>
					<div>
						<h1>We are here to help you !</h1>
					</div>
				</li>
			</ul>

			<div class="row">
				<div class="col-md-12">
					@if(Auth::guest())

					<!-- Registration Section -->
					<section id="student_register slide-module"><!-- 
						<div class="row">
							<div class="col-lg-5 col-md-5">	 -->	                
								<div class="student-form-block">
									{{ Form::open([ 'url'=>'/register/student','method'=>'post','id'=>'reg_form', 'files'=>true])  }}
									{{ csrf_field() }}

									<div class="row">
										<div class="col-md-12">
											<h2 id="regSectionLabel" style="font-size:2vw">
												STUDENT REGISTRATION
											</h2>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-6">    
											<input id="f_name" type="text" class="form-control" name="f_name" placeholder="first name" pattern="[A-Za-z\s]{1,}" title="Only characters and spaces allowed" required>
										</div>

										<div class="form-group col-md-6">    
											<input id="l_name" type="text" class="form-control" name="l_name" placeholder="last name" pattern="[A-Za-z\s]{1,}" title="Only characters and spaces allowed" required>
										</div>
									</div>

									<div id="stud_class">
										<div class="row">
											<div id="stud_class" class="form-group col-md-12">
												<select id="class" class="form-control" name="class">
													<option value="">Select Class</option>
													@foreach($classes as $class)
													<option value="{{$class->id}}">{{$class->name}}</option>
													@endforeach
													<option value="other">Other</option>
												</select>
											</div>
										</div>

										<div class="row">
											<div class="form-group col-md-12">
												<label for="subjectDiv" class="pull-left">Subject :</label>
												<div id="subjectDiv" class="form-control" name="subjectDiv" style="border:0px; height:auto;"> Choose any Class First
												</div>
											</div>
										</div>
									</div>  

									<div class="row">
										<div class="form-group col-md-12">  
											<input id="institute" type="text" class="form-control" name="institute" placeholder="institute name">
										</div>
									</div>                     

									<div class="row">
										<div class="form-group col-md-6">

											<input id="contact" type="text" class="form-control" placeholder="Contact Number" name="contact" pattern="[0-9+-]{8,15}" title="There should be numbers,+ or - only. Length: 8-15" required>
										</div>
										<div class="form-group col-md-6">

											<input id="email" type="email" class="form-control" placeholder="email" name="email">
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-6">
											<input type="text" class="form-control" name="house" id="house" placeholder="house number" pattern="[A-Za-z0-9,/\s]{1,}" title="Only characters, numericals, coma operator,/ and spaces allowed" required>
										</div>
										<div class="form-group col-md-6">
											<input type="text" class="form-control" name="location" placeholder="location">
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-12">

											<input id="message" type="text" class="form-control" placeholder="message" name="message" >
										</div>
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
								</div><!-- 
							</div>
						</div> -->
						<div class="bg-block">

						</div>
					</section>
					@endif
				</div>
			</div>
			<!-- <img class="div-center" src="{{ asset('img/mainText.png') }}"> -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 div-parent">
			<section id="about" class="page-block center-me slide-module">
			<div class="row">			
				<div class="clearfix col-md-6">
					<h2 class="small-heading">
						LEARN ABOUT US
					</h2>
					<div class="row">
						<div class="col-lg-11 col-lg-offset-1 col-xs-11 col-xs-offset-1">
							<h4 class="center-content slide-module">
								‘Shiksha At Scholars’ strongly believes in providing quality education to the students and making them believe also that they are not less than scholars. Everyone can be a scholar with little effort , because everyone has some kind of skills. Point is to get to know where you lags behind and where you are strong.
								<br><br>
								We are not partial with weak or strong students , We were also students at some point of time and we realized the need to provide quality education , we want to make you forward and helping you to rise for your bright future .
							</h4>
						</div>
					</div>
				</div><!-- 
				<div class="clearfix col-md-5">
					<div class="team-member-box slide-module">
						<div class="row">
							<div class="col-md-3 col-xs-3">
								<img src="{{ asset('img/websiteContent/teamMember1.png') }}" class="center-me img-responsive">
								<h4 class="text-capitalize">{{ $content['Team Member 1 Name'] }}</h4>
								<p class="text-uppercase">post</p>
							</div>
							<div class="col-md-9 col-xs-9">
								<h5>
									ITE from HMR ITM (GGSIPU ) Delhi
									<br><br>
									Working as Business Analyst / Qlikview Developer.
									<br>
									Worked in some corporates. 
									<br>
									Started my teaching career from 2011 during my bachelor’s , after bachelor’s continued my teaching as well worked in some corporate/startups as software developer
									<br>
									Worked as faculty in many institutes  earlier.
								</h5>
								<div class="social_icon">
									<a href="#" class="fa fa-facebook"></a>
									<a href="#" class="fa fa-twitter"></a>
									<a href="#" class="fa fa-google-plus"></a>
									<a href="#" class="fa fa-linkedin"></a>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<div class="clearfix col-md-5">
					<div class="team-member-box slide-module">
						<div class="row">
							<div class="col-md-3 col-xs-3">
								<img src="{{ asset('img/websiteContent/teamMember1.png') }}" class="center-me img-responsive">
								<h4 class="text-capitalize">{{ $content['Team Member 1 Name'] }}</h4>
							</div>
							<div class="col-md-9 col-xs-9">
								<h5>
									ITE from HMR ITM (GGSIPU ) Delhi
									<br><br>
									Working as Business Analyst / Qlikview Developer.
									<br>
									Worked in some corporates. 
									<br>
									Started my teaching career from 2011 during my bachelor’s , after bachelor’s continued my teaching as well worked in some corporate/startups as software developer
									<br>
									Worked as faculty in many institutes  earlier.
								</h5>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 col-xs-3">
								<p class="text-uppercase">founder</p>
							</div>
							<div class="col-md-9 col-xs-9">
								<div class="social_icon">
									<a href="#" class="fa fa-facebook"></a>
									<a href="#" class="fa fa-twitter"></a>
									<a href="#" class="fa fa-google-plus"></a>
									<a href="#" class="fa fa-linkedin"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix col-md-5">
					<div class="team-member-box slide-module">
						<div class="row">
							<div class="col-md-3 col-xs-3">
								<img src="{{ asset('img/websiteContent/teamMember2.png') }}" class="center-me img-responsive">
								<h4 class="text-capitalize">{{ $content['Team Member 2 Name'] }}</h4>
							</div>
							<div class="col-md-9 col-xs-9">
								<h5>
									Teaching experience successful 8 years 
									<br> Qualifiaction M.com 
									<br> Teaching Area 
									<br> Accounts- 11th 12 th 
									<br> Ca-Cpt b.com m.com bba MBA
								</h5>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 col-xs-3">
								<p class="text-uppercase">founder</p>
							</div>
							<div class="col-md-9 col-xs-9">
								<div class="social_icon">
									<a href="#" class="fa fa-facebook"></a>
									<a href="#" class="fa fa-twitter"></a>
									<a href="#" class="fa fa-google-plus"></a>
									<a href="#" class="fa fa-linkedin"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</section>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			@if(Auth::guest())

		    <!-- Registration Section -->
		    <section id="teacher_register">
		        <div class="row">
		            <div class="col-lg-12">
		                <h2 class="bg-block slide-module" id="regSectionLabel">
		                   TEACHER REGISTRATION
		                </h2>
		                <div class="center-me form-block slide-module" style="padding:50px">
		                        {{ Form::open([ 'url'=>'/register/teacher','method'=>'post','id'=>'reg_form', 'files'=>true])  }}
		                        {{ csrf_field() }}
		                            <div class="row">
		                              <div class="form-group col-md-6">                            
		                                <label for="f_name" class="col-md-4 control-label pull-left">First Name :</label>

		                                    <input id="f_name" type="text" class="form-control" name="f_name" placeholder="first name" pattern="[A-Za-z\s]{1,}" title="Only characters and spaces allowed" required>
		                              </div>

		                              <div class="form-group col-md-6">                            
		                                <label for="l_name" class="col-md-4 control-label pull-left">Last Name :</label>

		                                    <input id="l_name" type="text" class="form-control" name="l_name" placeholder="last name" pattern="[A-Za-z\s]{1,}" title="Only characters and spaces allowed" required>
		                              </div>
		                            </div>

		                            
		                            <div id="tut_class" style="display:block">
		                         
		                            <div class="row">
		                              <div class="form-group col-md-12">
		                                <label for="preferred_location" class="col-md-4 control-label">Preferred Location for teaching :</label>
		                                <input id="preferred_location" type="text" class="form-control" placeholder="Preferred Location" name="preferred_location" >
		                              </div>
		                            </div>

		                                <input type="hidden" id="rownum" name="rownum" value="1">
		                                <div id="tab_logic">
		                                    <div id="addr0" class="row">
		                                      <div class="form-group col-md-6">
		                                        <label for="class0" class="col-md-4 control-label">Class :</label>
		                                        <select id="class0" class="form-control" name="class0" onchange="loadSubjects(this)">
		                                            <option value="">Select Class</option>
		                                            @foreach($classes as $class)
		                                              <option value="{{$class->id}}">{{$class->name}}</option>
		                                            @endforeach
		                                            <option value="other">Other</option>
		                                        </select>
		                                      </div>

		                                      <div class="form-group col-md-6">
		                                        <label for="subject0" class="col-md-4 control-label">Subjects :</label><br>
		                                        <div id="subjectDiv0" class="form-control" name="subjectDiv0" style="border:0px; margin-top:20px; height:auto;"><br> Choose any Class First
		                                        </div>
		                                      </div>
		                                    </div>

		                                    <div id="addr1" name="addr1" class="row"></div>
		                                </div>
		                                <div id="class_btns" class="row">
		                                  <a id="add_row" class="btn btn-default pull-left">Add Class</a>
		                                  <a id='delete_row' class="pull-right btn btn-default">Delete Class</a>
		                                </div>  
		                            </div>                          

		                            <div class="row">
		                              <div class="form-group col-md-6">
		                                <label for="contact" class="col-md-4 control-label">Contact No. :</label>
		                                <input id="contact" type="text" class="form-control" placeholder="Contact Number" name="contact" pattern="[0-9+-]{8,15}" title="There should be numbers,+ or - only. Length: 8-15" required>
		                              </div>
		                              <div class="form-group col-md-6">
		                                <label for="email" class="col-md-4 control-label">Email ID :</label>
		                                <input id="email" type="email" class="form-control" placeholder="email" name="email">
		                              </div>
		                            </div>

		                            <div id="quali" class="row" style="display:block">
		                              <div class="form-group col-md-6">
		                                  <label for="qualification" class="col-md-4 control-label">Qualification :</label>
		                                  <input id="qualification" type="text" class="form-control" name="qualification" placeholder="qualification" pattern="[A-Za-z0-9,\s]{1,}" title="Only characters, numericals, coma operator and spaces allowed">
		                              </div>

		                              <div class="form-group col-md-6">
		                                  <label for="resume" class="col-md-4 control-label">Upload Resume</label>
		                                  <br><br>                                  
		                                  {!! Form::file('resume', ['class' => 'form-control', 'id'=>'resume', 'required' => 'required']) !!}
		                                  <!-- <input type="file" name="resume" id="resume" class="form-control"> -->
		                              </div>
		                            </div>

		                            <div class="row">
			                              <div class="form-group col-md-6">
			                                    <label><u>Address :</u></label><br>
			                                    <label for="house" class="col-md-4 control-label">House Number :</label>
			                                    <input type="text" class="form-control" name="house" id="house" placeholder="house number" value="{{ old('house') }}" pattern="[A-Za-z0-9,/\s]{1,}" title="Only characters, numericals, coma operator,/ and spaces allowed" required>
			                                    <br>
			                                    <label for="location" class="col-md-4 control-label">Location :</label>
			                                    <input type="text" class="form-control" name="location" id="location" >
			                            </div>
			                            <div class="form-group col-md-6">
			                                <div id="map_canvas" class="form-control" style="height:150px"></div>
			                            </div>
			                        </div>
		                         
		                            <div class="row">
		                              <div class="form-group col-md-12">
		                                <label for="message" class="col-md-4 control-label">Message :</label>
		                                <input id="message" type="text" class="form-control" placeholder="message" name="message" >
		                              </div>
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
		            </div>
		        </div>
		        <div class="bg-block">
		        	
		        </div>
		    </section>
		    @endif
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<section class="page-block">				
				<div class="clearfix">
					<div class="row">
						<div class="col-md-6 slide-module">
							<h2 class="small-heading">CONTACT US</h2>
							<h3 class="center-content" style="color:#162448">
								Contact Us At : {{  $content['Contact Numbers'] }} <br>
								Mail Us At : {{  $content['Email ID'] }}
								<hr><br>
							</h3>   
						</div>
						<div class="col-md-6 slide-module">
							<h2 class="small-heading">CONNECT WITH US</h2>
							<div class="social-media">
					          	<a href="#" class="fa fa-facebook"></a>
					          	<a href="#" class="fa fa-twitter"></a>
					          	<a href="#" class="fa fa-google-plus"></a>
					          	<a href="#" class="fa fa-linkedin"></a>
					      	</div> 
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
					<div class="row">
						<div class="col-md-12">
								<h4></h4>
						</div>
					</div>
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
            $('#subjectDiv').append('<input class="form-control" type="text" name="otherClassSubject" id="otherClassSubject" placeholder="Enter other subject">');
          });
      }
  });

  function loadSubjects(ele) {
      var class_id = ele.value;
      var ele_id = ele.id.substring(5);
      console.log(class_id+'-'+ele_id); 
      console.log('class Id :'+class_id);
      if(class_id=='other') {
        $('#addr'+ele_id).append('<input id="otherClass'+ele_id+'" class="form-control" type="text" name="otherClass'+ele_id+'" placeholder="Enter class">'); 
        $('#subjectDiv'+ele_id+'').empty();
        $('#subjectDiv'+ele_id+'').append('<input id="otherSubject'+ele_id+'" class="form-control" type="text" name="otherSubject'+ele_id+'" placeholder="Enter subjects">');
      }
      else {

          var elem1 = document.getElementById('otherClass'+ele_id+'');
          if(elem1)
            elem1.parentNode.removeChild(elem1);
          var elem2 = document.getElementById('otherSubject'+ele_id+'');
          if(elem2)
            elem2.parentNode.removeChild(elem2);


          //ajax
          $.get('/ajax-subject?class_id='+class_id, function(data) {
            //success data
            console.log('data : '+data);
            $('#subjectDiv'+ele_id).empty();
            $.each(data, function(index, subObj) {
              $('#subjectDiv'+ele_id).append('<input class="checkbox-inline" type="checkbox" name="subject'+ele_id+'[]" value="'+subObj.id+'">'+subObj.name);
            });
            $('#subjectDiv'+ele_id).append('<input class="form-control" type="text" name="otherClassSubject'+ele_id+'" id="otherClassSubject'+ele_id+'" placeholder="Enter other subject">');
          });
      }
  }


     $(document).ready(function(){
          var i=1;
         $("#add_row").click(function(){
          console.log('added:'+i);
          $('#addr'+i).html("<div class='form-group col-md-6'> <label for='class"+i+"' class='col-md-4 control-label'>Class :</label> <select id='class"+i+"' class='form-control' name='class"+i+"' onchange='loadSubjects(this)'> <option value=''>Select Class</option> @foreach($classes as $class) <option value='{{$class->id}}'>{{$class->name}}</option> @endforeach <option value='other'>Other</option> </select> </div>  <div class='form-group col-md-6'> <label for='subject"+i+"' class='col-md-4 control-label'>Subjects :</label><br> <div id='subjectDiv"+i+"' class='form-control' name='subjectDiv"+i+"' style='border:0px; margin-top:20px; height:auto;'><br> Choose any Class First </div> </div>");

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

<script>
	var map_options = {
	    center: new google.maps.LatLng(-2.548926, 118.0148634),
	    zoom: 4,
	    mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	var map = new google.maps.Map(document.getElementById("map_canvas"), map_options);

	var input = document.getElementById("location");
	var autocomplete = new google.maps.places.Autocomplete(input);
	autocomplete.bindTo("bounds", map);

	var marker = new google.maps.Marker({
	    map: map,
	    zoom: 14,
	    animation: google.maps.Animation.BOUNCE
	});

	google.maps.event.addListener(autocomplete, "place_changed", function () {
	    var place = autocomplete.getPlace();

	    if (place.geometry.viewport) {
	        map.fitBounds(place.geometry.viewport);
	    } else {
	        map.setCenter(place.geometry.location);
	        map.setZoom(15);
	    }

	    marker.setPosition(place.geometry.location);
	});

	google.maps.event.addListener(map, "click", function (event) {
	    marker.setPosition(event.latLng);
	});
</script>
@endsection