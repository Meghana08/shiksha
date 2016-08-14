<!DOCTYPE html>
<html lang="en" style="height: 100%">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Shiksha Admin: @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>



    <link href='http://fonts.googleapis.com/css?family=Open+Sans|Wire+One' rel='stylesheet' type='text/css' />

    <meta name="viewport" content="width=device-width, user-scalable=no" />

    <!-- <link rel="stylesheet" href={{ asset("menu_plug/css/font-awesome.min.css") }} type="text/css" /> -->

 
    <link rel="stylesheet" href={{ asset("menu_plug/css/sonhlab-base.css") }} type="text/css" />

    <link rel="stylesheet" href={{ asset("menu_plug/css/openfooter.css") }} type="text/css" />

    <link rel="stylesheet" href={{ asset("menu_plug/css/menu-style.css") }} type="text/css" />


    <link rel="stylesheet" href={{ asset("css/admin.css") }} type="text/css" />

<link href={{ asset("css/font-awesome.min.css") }}  rel="stylesheet" type="text/css">




    <!-- Bootstrap -->
    <link href={{ asset("bootstrapMy/css/bootstrap.min.css") }} rel="stylesheet">
    <link href={{ asset("bootstrapMy/css/backendStyle.css") }} rel="stylesheet">

    <style>
    body {
        height:100%;
        padding-top: 20vh;
    }
    </style>

    @yield('custom-styles')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
    @include('backend.partials._header')
    @section('main')
    @show
    @include('backend.partials._addFileModal')

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src={{ asset("bootstrapMy/js/bootstrap.min.js") }}></script>
    <script src={{ asset("js/jquery-ui.js") }}></script>
    <!-- <script src={{ asset("js/bootstrap.min.js") }}></script> -->
    <script src={{ asset("js/admin.js") }}></script>
@yield('footer-scripts')




<script>
    $('#class').on('change',function(e) {
      console.log(e);
      var class_id = e.target.value;

      //ajax
      $.get('/ajax-subject?class_id='+class_id, function(data) {
        //success data
        console.log('data : '+data);
        $('#subject').empty();
        $.each(data, function(index, subObj) {
          $('#subject').append('<option value="'+subObj.id+'">'+subObj.name+'</option>');
        });
      });
  });
</script>



  </body>
</html>