<header>
<!-- Navigation -->
<div id="main-navigation">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"  style="background:white; border-bottom:transparent">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul id="nav" class="nav navbar-nav navbar-right of-largebt">
                    <li>
                        <div class="of-largebt of-button texthover-bluelight" onclick="location.href=location.origin+'/admin';">      
                            <span class="of-bt-icon"><i class="fa fa-home"></i></span>
                            <span class="of-bt-title">Home</span>                          
                        </div>
                    </li>
                    <li>
                       <div class="of-largebt of-button texthover-bluelight"  data-toggle="modal" data-target="#add_file">      
                            <span class="of-bt-icon"><i class="fa fa-book"></i></span>
                            <span class="of-bt-title">Add File</span> 
                        </div>
                    </li>
                    <li>
                        <div class="of-largebt of-button texthover-bluelight" onclick="location.href=location.origin+'/admin/visitor-list';">      
                            <span class="of-bt-icon"><i class="fa fa-users"></i></span>
                            <span class="of-bt-title">Vistors</span>                          
                        </div>
                    </li>
                    <li>
                        <div class="of-largebt of-button texthover-bluelight" onclick="location.href=location.origin+'/admin/tutors-list';">      
                            <span class="of-bt-icon"><i class="fa fa-male"></i></span>
                            <span class="of-bt-title">Tutors</span>                          
                        </div>
                    </li>
                    <li>
                        <div class="of-largebt of-button texthover-bluelight" onclick="location.href=location.origin+'/admin/exam-time-help';">      
                            <span class="of-bt-icon"><i class="fa fa-book"></i></span>
                            <span class="of-bt-title">Exam Helps</span>                          
                        </div>
                    </li>
                    <li>
                        <div class="of-largebt of-button texthover-bluelight" onclick="location.href=location.origin+'/admin/view-feedbacks';">      
                            <span class="of-bt-icon"><i class="fa fa-pencil-square-o"></i></span>
                            <span class="of-bt-title">Feedbacks</span>                          
                        </div>
                    </li>
                    <li>
                        <div class="of-largebt of-button texthover-bluelight" onclick="location.href=location.origin+'/admin/classes';">      
                            <span class="of-bt-icon"><i class="fa fa-pencil-square-o"></i></span>
                            <span class="of-bt-title">Class/Subject</span>                          
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</div>
          @section('section-after-mainMenu')
          @show
</header>