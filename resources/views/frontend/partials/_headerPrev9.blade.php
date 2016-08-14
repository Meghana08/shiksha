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
                        <div class="of-largebt of-button texthover-bluelight" onclick="location.href='home';">      
                            <span class="of-bt-icon"><i class="fa fa-home"></i></span>
                            <span class="of-bt-title">Home</span>                          
                        </div>
                    </li>
                    <li>
                       <div class="of-largebt of-button texthover-bluelight">      
                            <span class="of-bt-icon"><i class="fa fa-book"></i></span>
                            <span class="of-bt-title">Class</span> 
                        </div>
                        <ul class="submenu">
                            @foreach($classes as $class)
                                <li>
                                    <a href="{{ url("/class/".$class->id) }}">Class {{$class->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <div class="of-largebt of-button texthover-bluelight" onclick="location.href='home';">      
                            <span class="of-bt-icon"><i class="fa fa-crosshairs"></i></span>
                            <span class="of-bt-title">C.A</span>                          
                        </div>
                    </li>
                    <li>
                        <div class="of-largebt of-button texthover-bluelight" onclick="location.href='home';">      
                            <span class="of-bt-icon"><i class="fa fa-laptop"></i></span>
                            <span class="of-bt-title">Entrance</span>                          
                        </div>
                    </li>
                    <li>
                        <div class="of-largebt of-button texthover-bluelight" onclick="location.href='home';">      
                            <span class="of-bt-icon"><i class="fa fa-dribbble"></i></span>
                            <span class="of-bt-title">Aptitue</span>                          
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