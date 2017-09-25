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
                @include('committee.menuCommittee')
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
                      <a href="{{ url('/staff') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
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



              <!-- Start Content  -->

          @foreach($output as $project)


        <!----------------------------------------------->

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2> Project Detail  <small> &nbsp:</small></h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <div class="form-horizontal form-label-left" >

                <div class="form-group">
                  <label class="col-md-3 col-sm-3 col-xs-12 control-label">Project Title (English):</label>

                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="checkbox">
                      <label><strong>{{ $project['project']['projectTitleEN'] }}</strong></label>
                    </div>

                  </div>

                <div class="form-group">
                  <label class="col-md-3 col-sm-3 col-xs-12 control-label">Project Title (Thai):</label>

                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="checkbox">
                      <label><strong>{{ $project['project']['projectTitleTH'] }}</strong></label>
                    </div>

                  </div>


                <div class="form-group">
                  <label class="col-md-3 col-sm-3 col-xs-12 control-label">Students:</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    @foreach($project['students'] as $student)
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="checkbox">
                      <label>{{ $student['student']['student_id'] }} {{ $student['student']['student_name'] }}  </label>  <br />
                    </div>
                   </div>
                    @endforeach
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 col-sm-3 col-xs-12 control-label">Committee:</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    @foreach($project['committees'] as $committee)
                    @if($committee['committee']['type']=="advisor")
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="checkbox">
                         <label> <span class='label label-info'>A</span>    {{ $committee['committee']['staffName'] }}<br /> </label>  <br />
                        </div>
                     </div>
                   @endif
                       @if($committee['committee']['type']=="committee")
                         <div class="col-md-9 col-sm-9 col-xs-12">
                           <div class="checkbox">
                            <label>  <span class='label label-info'>C</span>   {{ $committee['committee']['staffName'] }}<br /> </label>  <br />
                           </div>
                        </div>
                      @endif
                 @endforeach

                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 col-sm-3 col-xs-12 control-label">Section:</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="checkbox">
                      <label> {{ $project['project']['sec'] }}</label>
                    </div>
                   </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 col-sm-3 col-xs-12 control-label">Semester/Year:</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="checkbox">
                      <label> {{ $project['project']['semester'] }}/{{ $project['project']['year'] }}</label>
                    </div>
                   </div>
                  </div>
                </div>



                <div class="form-group">
                  <label class="col-md-3 col-sm-3 col-xs-12 control-label">Status:</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="checkbox">
                      <label>
                        @if($committee['committee']['statusApprov']=="1")
                            <a href="#" class="btn btn-success btn-xs">Approved</a>
                          @else
                            <a href="#" class="btn btn-danger btn-xs">Pending</a>
                          @endif
                      </label>
                    </div>
                   </div>

                  </div>
                </div>


                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">


                  </div>
                </div>
                    @endforeach
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!----------------------------------------------->


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
