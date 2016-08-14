    
<header>
    <style type="text/css">


    </style>

    <div id="logo">
        <img src="{{ asset('img/logo.gif') }}" alt="..." class="transparent-smoky shadow-black">
    </div>
    <!-- Navigation -->
    <div id="main-navigation">
        <nav id="navbar" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- <nav class="navbar navbar-inverse navbar-fixed"> -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="row top-row">
                <div class="col-md-5 col-sm-5 col-xs-5 hidden-xs">
                    <div class="hidden-xs">
                        <a class="contact" href="#"><i  class="fa fa-phone"></i> &nbsp;&nbsp;&nbsp;&nbsp;9990158844, 9990158847</a>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-5">
                    @if(Auth::guest())
                    <p id="news" data-toggle="modal" data-target="#messageModal"><span class="glyphicon glyphicon-bell"></span>Exam Time Help!</p>
                    @else
                    <p id="news" data-toggle="modal" data-target="#examTimeModal"><span class="glyphicon glyphicon-bell"></span>Exam Time Help!</p>
                    @endif
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">                     
                    @if (Auth::guest())
                    <a class="pull-right" href="{{ url('/login') }}">Login</a>
                    @else
                    <a class="pull-right" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                    @endif
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <div class="row">
               <div class="col-md-12">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ url("home") }}"><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-book"></i>Class <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @foreach($classes as $class)
                            @if(!preg_match('/entrance/', $class->name))
                            <li>
                                <a href="{{ url('class/'.$class->name) }}"></i>{{ $class->name }}</a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-laptop"></i>Entrance <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @foreach($classes as $class)
                            @if(preg_match('/entrance/', $class->name))
                            <li>
                                <a href="{{ url('class/'.$class->name) }}"></i>{{ str_replace('entrance-','',$class->name) }}</a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('viewFeedback') }}"><i class="fa fa-pencil-square-o"></i>View Feedbacks</a>
                    </li>
                    @if (Auth::guest())
                    <li>
                        <a class="page-scroll" href="#about"><i class="fa fa-dribbble"></i>About Us</a>
                    </li>
                    <li>
                        <a id="student_menu_btn" class="page-scroll" href="#student_register"><i class="fa fa-users"></i>Student</a>
                    </li>
                    <li>
                        <a id="tutor_menu_btn" class="page-scroll" href="#teacher_register"><i class="fa fa-pencil-square"></i>Teacher</a>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('getFeedback') }}"><i class="fa fa-pencil-square-o"></i>Give Feedback</a>
                    </li>
                    <li>
                        <a href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i>View Profile</a>
                    </li>
                    @endif
                </ul>
            </div>
                <!-- <ul class="nav navbar-nav">
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul> -->


                
            </div>
            <!-- /.navbar-collapse -->
    </nav>
</div>
</header>