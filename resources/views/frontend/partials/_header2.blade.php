<style type="text/css">
    
#logo  img{
    top: 0px;
    left:0px;
    padding: 1px; 
    position: fixed;
    width: 8vw;
    height: 20vh;
    z-index: 900;
    background-color: rgba(238, 238, 238, 0.64);
    border-radius: 0px 0px 30px 30px;
}

.navbar-inverse {
     background-color: #fff;
    border-bottom: 3px solid;
    border-color: #ccc;
}

.navbar-inverse .navbar-nav {
    background-color: #fff;
}


.navbar-inverse .navbar-nav li a {
    color: #000000;
    font-family: sans-serif;
}
.navbar-inverse .navbar-nav li a i{
    padding-right: 10px;
}

.navbar-inverse .navbar-nav li:hover a {
    color: #337ab7;
}
.navbar-inverse .navbar-nav li:hover {
    border-top: 5px solid #3d85c6;
}

</style>

<header>
<div id="logo">
    <img src="{{ asset('img/logo.gif') }}" alt="..." class="transparent-smoky shadow-black">
</div>
<!-- Navigation -->
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
                <div class="hidden-xs">
                    <a class="navbar-brand" style="color:#073b63"  href="#"><i class="fa fa-phone"></i>&nbsp;&nbsp;9990158844, 9990158847</a>
                </div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ url("home") }}"><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li>
                        <a id="showTopClass"  href="#"><i class="fa fa-book"></i>Class</a>

                            <nav id="cbp-spmenu-class" class="cbp-spmenu cbp-spmenu-horizontal cbp-spmenu-top">
                                <h3 id="backTopClass">Back</h3>
                                    <li>
                                        <a href="#"  data-toggle="modal" data-target="#contact_form"> Class 1-8 </a>
                                    </li>
                                    <li>
                                        <a href="{{ url("/class/9") }}"> Class 9 </a>
                                    </li>
                                    <li>
                                        <a href="{{ url("/class/10") }}"> Class 10 </a>
                                    </li>
                                    <li>
                                        <a href="{{ url("/class/11") }}"> Class 11 </a>
                                    </li>
                                    <li>
                                        <a href="{{ url("/class/12") }}"> Class 12 </a>
                                    </li>
                                    <li>
                                        <a href="{{ url("/class/bca") }}"> B.C.A </a>
                                    </li>
                                    <li>
                                        <a href="{{ url("/class/b-com") }}"> B.Com </a>
                                    </li>
                                    <li>
                                        <a href="{{ url("/class/ca") }}"> C.A </a>
                                    </li>
                                    <li>
                                        <a href="{{ url("/class/cpt") }}"> C.P.T </a>
                                    </li>
                            </nav>
                    </li>
                    <li>
                        <a id="showTopEntrance"  href="#"><i class="fa fa-laptop"></i>Entrance</a>

                            <nav id="cbp-spmenu-entrance" class="cbp-spmenu cbp-spmenu-horizontal cbp-spmenu-top">
                                <h3 id="backTopEntrance">Back</h3>
                                    <li>
                                        <a href="{{ url("/class/9") }}"> B.C.A </a>
                                    </li>
                                    <li>
                                        <a href="{{ url("/class/10") }}"> B.Tech </a>
                                    </li>
                                    <li>
                                        <a href="{{ url("/class/11") }}"> CAT </a>
                                    </li>
                                    <li>
                                        <a href="{{ url("/class/12") }}"> MAT </a>
                                    </li>
                            </nav>
                    </li>
                    <li>
                        <a id="showTopApti"  href="#"><i class="fa fa-dribbble"></i>About Us</a>

                            <nav id="cbp-spmenu-apti" class="cbp-spmenu cbp-spmenu-horizontal cbp-spmenu-top">
                                <h3 id="backTopApti">Back</h3>
                                    <li>
                                        <a href="{{ url("/class/9") }}"> Analytical </a>
                                    </li>
                                    <li>
                                        <a href="{{ url("/class/10") }}"> Awareness </a>
                                    </li>
                            </nav>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</div>
</header>

