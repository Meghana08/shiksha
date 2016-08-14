<!DOCTYPE html>
<html lang="en"  class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shiksha: @yield('title')</title>

    <!-- IE 8 -->
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/fix-ie8.css" type="text/css" />
    <![endif]-->
    <!-- end of menu bar styles -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDn6kJnLS51zltAGT9bvUb1TQD-oY05nMs&libraries=places"></script>






    <!-- Bootstrap -->
    <link href={{ asset("bootstrapMy/css/bootstrap.min.css") }} rel="stylesheet">
    <link href={{ asset("bootstrapMy/css/scrolling-nav.css") }} rel="stylesheet">

    <!-- font awsm -->
    <link rel="stylesheet" href={{ asset("bootstrapMy/css/font-awesome.min.css") }} type="text/css" />         
    <!-- styling for social pluggin menu button etc -->
    <link href={{ asset("bootstrapMy/css/style.css") }} rel="stylesheet">
    <!-- Slider link -->
    <link href={{ asset("slider/css/style2.css") }} rel="stylesheet">

    @yield('custom-styles')

  </head>


  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    @include('frontend.partials._header')
    @section('main')
    @show
    @include('frontend.partials._footer')
    @include('frontend.partials._examTimeModal')

    <script src={{ asset("bootstrapMy/js/jquery.js") }}></script>
    <script src={{ asset("bootstrapMy/js/bootstrap.min.js") }}></script>
    <script src={{ asset("bootstrapMy/js/jquery.easing.min.js") }}></script>
    <script src={{ asset("bootstrapMy/js/scrolling-nav.js") }}></script>


    <script>
        $("#showClass").click(function() {
            $("#dropClas").toggle();
        });


         $("#madd_row").click(function(){
          var i = $('#rownum').val();
          console.log('added:'+i);
          $('#addsub'+i).html("<div class='form-group'> <div class='form-group col-md-6'>  <label for='msubject"+i+"' class='col-md-4 control-label'>Subject :</label> <input class='form-control' type='text' id='msubject"+i+"' name='msubject"+i+"'> </div> </div> <div class='form-group'> <div class='form-group col-md-6'>  <label for='mtopic"+i+"' class='col-md-4 control-label'>Topics :</label> <input class='form-control' type='text' id='mtopic"+i+"' name='mtopic"+i+"'> </div> </div>");

          $('#msubjectdiv').append('<div id="addsub'+(++i)+'" class="row"></div>');

          $('#rownum').val(i);
      });


         $("#mdelete_row").click(function(){
          var i = $('#rownum').val();
            
          console.log('added:'+i);
           if(i>1){
         $("#addsub"+(i-1)).html('');
         i--;
          $('#rownum').val(i);

         }
       });

    </script>


    @yield('footer-scripts')
  </body>
</html>

<!-- Modal For Add File -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>      
                <!-- <h2 class="modal-title" id="messageModalLabel">Message</h2> -->
            </div>

            <div class="modal-body">        
                <h4 id="message">Register For free for this service.<br>
                <a href="{{ route('login') }}"> Login </a> if already registered!</h4>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">OK</button>
            </div>
        </div>
    </div>
</div>

