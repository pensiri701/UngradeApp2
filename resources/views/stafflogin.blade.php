<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

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

    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
           <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?PHP echo url('/'); ?>/staffLoginSubmit" method="post">

              <h1>Staff Login</h1>

              <div>
                <div>
                  <input type="text" class="form-control" placeholder="Staff ID" required  name="staffID"/>
                </div>

                <div>
                  <input type="password" class="form-control" placeholder="Password" required name="fullname"/>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-success" value="submit">Submit</button>
                </div>


              <!-- facebook button
             <div class="fb-login-button" data-max-rows="1" data-size="medium" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="true"></div>
                 facebook button -->
              </div>

              <div class="clearfix"></div>
              <div class="separator">
                <div class="clearfix"></div>
                <br />
                <div>
                    <p>©2016 All Rights Reserved.Computer Engneering CMU</p>
                </div>
              </div>
            </form>
          </section>
        </div>


            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
