<style type="text/css">
    
#logo  img{
    top: 0px;
    left:0px;
    padding: 2vw; 
    position: fixed;
    width: 8vw;
    height: 20vh;
    z-index: 900;
}
</style>
<header>
<!-- Navigation -->
@if($isHome)
<div id="logo">
    <img src="{{ asset('img/logo.jpg') }}" alt="..." class=" transparent-smoky shadow-black">
        
</div>

<div id="main-navigation">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
                <ul id="nav" class="nav navbar-nav navbar-left">     <!--    style="background:white;"> -->
@else

<div id="logo">
    <img src="{{ asset('img/logo.png') }}" alt="..." class=" solid-white shadow-black">
        
</div>

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

@endif 



                    <li>
                        <div class="of-button" onclick="location.href=location.origin+'/home';">      
                            <span class="of-bt-icon"><i class="fa fa-home"></i></span>
                            <span class="of-bt-title">Home</span>                          
                        </div>
                    </li>
                    <li>
                       <div id="showTop" class="of-largebt of-button texthover-bluelight">      
                            <span class="of-bt-icon"><i class="fa fa-book"></i></span>
                            <span class="of-bt-title">Class</span> 
                        </div>
                            <nav class="cbp-spmenu cbp-spmenu-horizontal cbp-spmenu-top" id="cbp-spmenu-class">
                                <h3 id="backTop">Back</h3>
                                    <li>
                                        <a href="{{ url("/class/".$class->id) }}"> Class 1-8 </a>
                                    </li>
                                    <li>
                                        <a href="{{ url("/class/".$class->id) }}"> Class 1-8 </a>
                                    </li>
                            </nav>
                    </li>
                    <li>
                        <div class="of-largebt of-button texthover-bluelight" onclick="location.href=location.origin+'/class/CA';">      
                            <span class="of-bt-icon"><i class="fa fa-crosshairs"></i></span>
                            <span class="of-bt-title">C.A</span>                          
                        </div>
                    </li>
                    <li>
                        <div class="of-largebt of-button texthover-bluelight" onclick="location.href=location.origin+'/class/Entrance';">      
                            <span class="of-bt-icon"><i class="fa fa-laptop"></i></span>
                            <span class="of-bt-title">Entrance</span>                          
                        </div>
                    </li>
                    <li>
                        <div class="of-largebt of-button texthover-bluelight" onclick="location.href=location.origin+'/class/Aptitude';">      
                            <span class="of-bt-icon"><i class="fa fa-dribbble"></i></span>
                            <span class="of-bt-title">Aptitude</span>                          
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</div>
</header>