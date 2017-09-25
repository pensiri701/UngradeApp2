<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Grade </title>

    <!-- Bootstrap -->
    <link href="{{ URL::asset('css/template/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset('css/template/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ URL::asset('css/template/nprogress.css') }}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="{{ URL::asset('css/template/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <link href="{{ URL::asset('css/template/custom.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ URL::asset('build/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"> <span>ระบบจัดการโปรเจ็ค</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <!-- <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Pensiri Kusalporn</h2>
              </div>
            </div> -->
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3></h3>
                <ul class="nav side-menu">
                  <li><a href="../guest/allproject"><i class="fa fa-edit"></i> All Projects </a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <p> Wellcome: Pensiri Kusalaporn </p>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Project Detail <small></small></h2>
                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">
                    <!-- Start Content  -->

                @foreach($output as $project)
                  <p><strong>
                  Title (English) :  {{ $project['project']['projectTitleEN'] }}<br />
                  Title (Thai) :    {{ $project['project']['projectTitleTH'] }}</strong></p>



                <p><strong>Auther:</strong></p>
                        @foreach($project['students'] as $student)
                        {{ $student['student']['student_name'] }}{{ $student['student']['student_id'] }} <br />
                        @endforeach
                <br /><p><strong>Advisor:</strong></p>

              @foreach($project['committees'] as $committee)
                 @if($committee['committee']['type']=="advisor")
                   {{ $committee['committee']['staffName'] }}<br />
                 @endif
               @endforeach

                <br /><p><strong>Committee:</strong></p>


                @foreach($project['committees'] as $committee)
                   @if($committee['committee']['type']=="committee")
                       {{ $committee['committee']['staffName'] }}<br />
                   @endif

              @endforeach






               <br />

                  <div class="clearfix"></div>
                  <strong><p>Download:</p></strong>
                  <div class="col-md-12">
                <!--{{ asset('assets/.....') }}  -->

                  @if($project['project']['pdf'] !="")
                  <a href ="{{ $project['project']['pdf'] }}" ><span class="label label-warning" style="margin:3px;"> PDF </span></a>
                  @endif
                  @if($project['project']['link'] !="")
                  <a href ="{{ $project['project']['link'] }}" >  <span class="label label-danger" style="margin:3px;"> YOUTUBE </span> </a>
                  @endif
                  @if($project['project']['file'] !="")
                  <a href ="{{ $project['project']['file'] }}" >  <span class="label label-success" style="margin:3px;">  PROGRAM FILE </span></a>
                 @endif
                  </div>
                  @endforeach

                    <!-- End Content  -->
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
              @2017 Computer Engineering , Chiangmai University
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
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
    <!-- jQuery custom content scroller -->
    <script src="{{ asset('js/template/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/template/custom.min.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{asset('js/custom.min.js')}}"></script>

  </body>
</html>
