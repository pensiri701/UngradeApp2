<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> CPECMU Projects  </title>

    <!-- Bootstrap -->
    <link href="{{ URL::asset('css/template/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset('css/template/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ URL::asset('css/template/nprogress.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ URL::asset('css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1 class="error-number">403</h1>
              <h2>Access denied</h2>
              <p>Full authentication is required to access this resource. <a href="#">Report this?</a>
              </p>
              <div class="mid_center">
                <h3>Search</h3>
                <form>
                  <div class="col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('js/template/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/template/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('js/template/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('js/template/nprogress.js') }}"></script>

    <script src="{{ asset('js/custom.min.js') }}"></script>
  </body>
</html>