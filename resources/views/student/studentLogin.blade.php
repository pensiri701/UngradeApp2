<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CPECMU Projects<</title>
    <!-- Bootstrap -->
    <link href="{{ URL::asset('css/template/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset('css/template/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ URL::asset('css/template/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
   <link href="{{ URL::asset('css/template/animate.min.css') }}" rel="stylesheet"/>
    <!-- Custom Theme Style -->
  <link href="{{ URL::asset('css/template/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="login">
  <!-- login code -->
  <div id="fb-root"></div>
	<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1304711542984665";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
 <!-- -->
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <!-- <form class="form-horizontal" method="POST" action="{{ route('login') }}">-->
           <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ url('/loginme') }}">
              <h1> Login Ugrade App </h1>
              <div>
              {{ csrf_field() }}
              </div>
              <div class="form-group">
                  <div >

                  </div>
              </div>
              <br />
              <div class="separator">
                <div class="clearfix"></div>


                <div>
                    <p>©2016 All Rights Reserved.Computer Engneering CMU</p>
                </div>
              </div>
          </form>
            <!--end from-->
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
