<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> CPECMU Projects</title>

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
    <style>
    table, td, th {
        border: 1px solid #ddd;
        text-align: left;

    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 5px;
    }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"> <span>CPECMU Projects</span></a>
            </div>

            <div class="clearfix"></div>
            <br />

            <!-- sidebar menu -->
                @include('student.menuLeftStudent')
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
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="false">
                    Welcome : {{ session('userName') }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a href="{{ url('/login') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
                  </ul>
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

                      <table >
                        <tr>
                          <td width="15%">
                              <h5 class="heading"> Title (English) : </h5>
                          </td>
                          <td >
                              {{ $project['project']['projectTitleEN'] }}
                          </td>
                        </tr>

                        <tr>
                          <td >
                                <h5 class="heading">  Title (Thai) :</h5>
                          </td>
                          <td >
                              {{ $project['project']['projectTitleTH'] }}
                          </td>
                        </tr>

                        <tr>
                          <td >
                                <h5 class="heading"> Section:</h5>
                          </td>
                          <td >
                                {{ $project['project']['sec'] }}
                          </td>
                        </tr>

                        <tr>
                          <td >
                              <h5 class="heading"> Semester/Year:</h5>
                          </td>
                          <td >
                            {{ $project['project']['semester'] }} /  {{ $project['project']['year'] }}
                          </td>
                          </tr>
                        <tr>
                          <td >
                              <h5 class="heading">   Student(s): </h5>
                          </td>
                          <td >
                            @foreach($project['students'] as $student)
                            {{ $student['student']['student_id'] }}  {{ $student['student']['student_name'] }} <br />
                            @endforeach
                          </td>
                        </tr>
                        <tr>
                          <td >
                                <h5 class="heading"> Advisor:</h5>
                          </td>
                          <td >

                                          @foreach($project['committees'] as $committee)
                                             @if($committee['committee']['type']=="advisor")
                                               {{ $committee['committee']['staffName'] }}<br />
                                             @endif
                                           @endforeach
                          </td>
                        </tr>
                        <tr>
                          <td >
                                <h5 class="heading">  Committee:</h5>
                          </td>
                          <td >

                            @foreach($project['committees'] as $committee)
                               @if($committee['committee']['type']=="committee")
                                   {{ $committee['committee']['staffName'] }}<br />
                               @endif
                             @endforeach
                          </td>
                        </tr>
                        <td >Status:</td>
                        <td>
                          @foreach($project['committees'] as $committee)
                             @if($committee['committee']['type']=="advisor")
                                @if($committee['committee']['statusApprov']==1)
                                 <a href="#" class="btn btn-success btn-xs">Approved</a>
                                  @else
                                  <a href="#" class="btn btn-danger btn-xs">Pending</a>

                                  @endif
                             @endif
                           @endforeach
                        </td>
                      </tr>
                      </table>

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
