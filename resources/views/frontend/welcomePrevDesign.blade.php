@extends('frontend.master')
@section('title', 'Home')

@section('custom-styles')
  <style type="text/css">
    /*body {
      overflow-y: hidden;
    }*/

    .intro-section {
      padding-top: 0px;
    }

    /*.modal-dialog {
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
    }

    .modal-content {
      height: auto;
      min-height: 100%;
      border-radius: 0;
    }*/

    .control-label {
      text-align: left;
    }

    .main-heading h1 {
        width: 200vw;
        bottom: 10vw;
        font-size: 100px;
    }
    .form-style {
      padding-left:5vw;
      padding-right:5vw;
    }

    .file_input {
      position: absolute;
    }

    .checkbox-inline+.checkbox-inline, .radio-inline+.radio-inline {
        color: white;
        padding: 10px;
    }

    option {
      color: black;
    }

  </style>
@endsection

@section('main')
<section id="main">
   <!-- Intro Section -->
   <section id="intro" class="intro-section">
            <div class="row" style="height:85vh">
                <div class="col-md-10 col-sm-10" style="height:100%">
                    <ul class="cb-slideshow " style="list-style:none">
                        <li>
                          <span>Image 01</span>
                          <div>
                            <h1>Get Better Grades With Our High-Quality Tutoring</h1>
                            <p>We can help with anything from high school algebra to graduate-level real analysis. We work with students who loathe math and students who love it.</p>
                          </div>
                        </li>
                        <li>
                          <span>Image 02</span>
                          <div>
                            <h1>We Do Things A Bit Differently</h1>
                            <p>We’ve been perfecting our hiring methods for 10 years</p>
                          </div>
                        </li>
                        <li>
                          <span>Image 03</span>
                          <div>
                            <h1>Ensuring Your Tutors As Truly Extraordinary</h1>
                            <p>Every tutor must meet our high standards for qualifications, pass an interview screening, and submit a background check. We ensure that your tutors are truly extraordinary.</p>
                          </div>
                        </li>
                        <li>
                          <span>Image 04</span>
                          <div>
                            <h1>Skilled Tutors Develop Lessons To Meet Needs</h1>
                            <p>Skilled tutors develop lessons to meet your individual needs. One-on-one tutoring sessions are held at a time and location of your choosing.</p>
                          </div>
                        </li>
                        <li>
                          <span>Image 05</span>
                          <div>
                            <h1>Work With Students To Explore Advanced</h1>
                            <p>Our business was built under the premise that in order to achieve results you must begin with unrivaled talent.</p>
                          </div>
                        </li>
                        <li>
                          <span>Image 06</span>
                          <div>
                            <h1>We are here to help you !</h1>
                          </div>
                        </li>
                    </ul>
                </div>



                <div class="col-md-2 col-sm-2" style="height:100%">
                    <div class="menu">
                      <div  id="student_btn">
                        <img src="{{ asset('img/contact_form.jpg') }}" style="width: 100%; height: 100%;" alt="...">
                        <!-- <div class="mask"></div> -->
                        <div class="heading">
                          <i class="fa fa-book hidden-xs"></i>
                          <h2>Student Registration</h2>
                        </div>
                      </div>
                      <div id="tutor_btn">
                        <img src="{{ asset('img/whats_new.jpg') }}" style="width: 100%; height: 100%;" alt="...">
                        <!-- <div class="mask"></div> -->
                        <div class="heading">
                          <i class="fa fa-male hidden-xs"></i>
                          <h2>Teacher Registration</h2>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
    </section>

    <!-- About Section -->
    <section id="about">
              <div class="row">
                <div class="col-md-12" style="height:15vh; background-color:#eee"></div>
              </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="clearfix">
                  <h2 class="small-heading">
                    LEARN ABOUT US
                  </h2>
                  <div class="row">
                    <div class="col-lg-12 col-lg-offset-1 col-xs-12 col-xs-offset-1">
                      <h4 class="center-content">
                          ‘Shiksha At Scholars’ strongly believes in providing quality education to the students and making them believe also that they are not less than scholars. Everyone can be a scholar with little effort , because everyone has some kind of skills. Point is to get to know where you lags behind and where u r strong.
                          <br><br>
                          We are not partial with weak or strong students , We were also students at some point of time and we realized the need to provide quality education , we want to make u forward and helping u to rise for your bright future .
                      </h4>
                    </div>
                  </div>
                </div>
                <div class="clearfix">
                <h2 class="small-heading">MEET THE TEAM</h2>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <div class="team-member-box center-block text-center">
                                    <img src="{{ asset('img/websiteContent/teamMember1.png') }}" class="img-responsive">
                                    <h4 class="text-capitalize">{{ $content['Team Member 1 Name'] }}</h4>
                                    <p class="text-uppercase">founder and ceo</p>
                                    <h5>
                                        An ITE from HMR ITM (GGSIPU ) Delhi ,  worked in some corporates  and still working as Business Analyst / Qlikview Developer .
                                        <br>
                                        Started my teaching career from 2011 during my bachelor’s , after bachelor’s continued my teaching as well worked in some corporate/startups as software developer , worked as faculty in many institutes  earlier .
                                    </h5>
                                    <div class="social_icon_team">
                                        <a href="#" class="fa fa-facebook"></a>
                                        <a href="#" class="fa fa-twitter"></a>
                                        <a href="#" class="fa fa-google-plus"></a>
                                        <a href="#" class="fa fa-linkedin"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="team-member-box center-block text-center">
                                    <img src="{{ asset('img/websiteContent/teamMember2.png') }}" class="img-responsive">
                                    <h4 class="text-capitalize">{{ $content['Team Member 2 Name'] }}</h4>
                                    <p class="text-uppercase">post</p>
                                    <h5>
                                       Teaching experience successful 8 years 
                                       <br> Qualifiaction M.com 
                                       <br> Teaching Area 
                                       <br> Accounts- 11th 12 th 
                                       <br> Ca-Cpt b.com m.com bba MBA
                                    </h5>
                                    <div class="social_icon_team">
                                        <a href="#" class="fa fa-facebook"></a>
                                        <a href="#" class="fa fa-twitter"></a>
                                        <a href="#" class="fa fa-google-plus"></a>
                                        <a href="#" class="fa fa-linkedin"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="team-member-box center-block text-center">
                                    <img src="{{ asset('img/websiteContent/teamMember3.png') }}" class="img-responsive">
                                    <h4 class="text-capitalize">{{ $content['Team Member 3 Name'] }}</h4>
                                    <p class="text-uppercase">post</p>
                                    <h5>
                                      
                                    </h5>
                                    <div class="social_icon_team">
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
            </div>
            <div class="clearfix">
                <h2 class="small-heading">CONTACT US</h2>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">

                    <h3 class="center-content" style="color:#162448">
                      Contact Us At : {{  $content['Contact Numbers'] }} <br>
                      Mail Us At : {{  $content['Email ID'] }}
                      <hr><br>
                    </h3>   
            </div>
          </div>
        </div>
    </section>

    @if(Auth::guest())

    <!-- Registration Section -->
    <section id="register" style="background-color:#21a664; padding-top:10vh">
        <div class="row">
            <div class="col-lg-12">
                <div class="clearfix" style="padding:50px">
                  <h2 class="small-heading" id="regSectionLabel">
                   STUDENT REGISTRATION
                  </h2>
                          {{ Form::open([ 'url'=>'/register/student','method'=>'post','id'=>'reg_form', 'files'=>true])  }}
                            {{ csrf_field() }}


                            <div class="row">
                              <div class="form-group col-md-6">                            
                                <label for="f_name" class="col-md-4 control-label pull-left">First Name :</label>

                                    <input id="f_name" type="text" class="form-control" name="f_name" placeholder="Enter your first name" value="{{ old('f_name') }}" pattern="[A-Za-z\s]{1,}" title="Only characters and spaces allowed" required>
                              </div>

                              <div class="form-group col-md-6">                            
                                <label for="l_name" class="col-md-4 control-label pull-left">Last Name :</label>

                                    <input id="l_name" type="text" class="form-control" name="l_name" placeholder="Enter your last name" value="{{ old('l_name') }}" pattern="[A-Za-z\s]{1,}" title="Only characters and spaces allowed" required>
                              </div>
                            </div>

                            <div id="stud_class" style="display:block">
                                    <div class="row">
                                      <div id="stud_class" class="form-group col-md-4">
                                        <label for="class" class="col-md-4 control-label">Class :</label>
                                        <select id="class" class="form-control" name="class">
                                            <option value=""></option>
                                            @foreach($classes as $class)
                                              <option value="{{$class->id}}">{{$class->name}}</option>
                                            @endforeach
                                            <option value="other">Other</option>
                                        </select>
                                      </div>

                                      <div class="form-group col-md-4">
                                        <label for="subject" class="col-md-4 control-label">Subjects :</label><br>
                                        <div id="subjectDiv" class="form-control" name="subjectDiv" style="border:0px; margin-top:20px"><br> Choose any Class First
                                        </div>
                                      </div>

                                    <div class="form-group col-md-4">                            
                                      <label for="institute" class="col-md-4 control-label pull-left">School/Institute :</label>

                                          <input id="institute" type="text" class="form-control" name="institute" placeholder="Enter your last name" value="{{ old('institute') }}">
                                    </div>
                                    </div>
                            </div>

                            <div id="tut_class" style="display:none">
                         
                            <div class="row">
                              <div class="form-group col-md-12">
                                <label for="preferred_location" class="col-md-4 control-label">Preferred Location for teaching :</label>
                                <input id="preferred_location" type="text" class="form-control" placeholder="Enter your Preferred Location" name="preferred_location" >
                              </div>
                            </div>

                                <input type="hidden" id="rownum" name="rownum" value="1">
                                <div id="tab_logic">
                                    <div id="addr0" class="row">
                                      <div class="form-group col-md-6">
                                        <label for="class0" class="col-md-4 control-label">Class :</label>
                                        <select id="class0" class="form-control" name="class0" onchange="loadSubjects(this)">
                                            <option value=""></option>
                                            @foreach($classes as $class)
                                              <option value="{{$class->id}}">{{$class->name}}</option>
                                            @endforeach
                                            <option value="other">Other</option>
                                        </select>
                                      </div>

                                      <div class="form-group col-md-6">
                                        <label for="subject0" class="col-md-4 control-label">Subjects :</label><br>
                                        <div id="subjectDiv0" class="form-control" name="subjectDiv0" style="border:0px; margin-top:20px"><br> Choose any Class First
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
                                <input id="contact" type="text" class="form-control" placeholder="Enter your Contact Number" name="contact" pattern="[0-9+-]{8,15}" title="There should be numbers,+ or - only. Length: 8-15" required>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="email" class="col-md-4 control-label">Email ID :</label>
                                <input id="email" type="email" class="form-control" placeholder="Enter your email" name="email">
                              </div>
                            </div>

                            <div id="quali" class="row" style="display:none">
                              <div class="form-group col-md-6">
                                  <label for="qualification" class="col-md-4 control-label">Qualification :</label>
                                  <input id="qualification" type="text" class="form-control" name="qualification" placeholder="Enter your qualification" value="{{ old('name') }}" pattern="[A-Za-z0-9,\s]{1,}" title="Only characters, numericals, coma operator and spaces allowed">
                              </div>

                              <div class="form-group col-md-6">
                                  <label for="resume" class="col-md-4 control-label">Upload Resume</label>
                                  <br><br>                                  
                                  {!! Form::file('resume', old('resume'), ['class' => 'form-control', 'id'=>'resume']) !!}
                                  <!-- <input type="file" name="resume" id="resume" class="form-control"> -->
                              </div>
                            </div>

                            @include('frontend.partials._mapCard')
                         
                            <div class="row">
                              <div class="form-group col-md-12">
                                <label for="message" class="col-md-4 control-label">Message :</label>
                                <input id="message" type="text" class="form-control" placeholder="Enter your message" name="message" >
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
    </section>

    @endif


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