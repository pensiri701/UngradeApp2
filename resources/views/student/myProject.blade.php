<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> CPECMU Projects </title>

  <!-- Bootstrap -->
  <link href="{{ URL::asset('css/template/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ URL::asset('css/template/font-awesome.min.css') }}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{ URL::asset('css/template/nprogress.css') }}" rel="stylesheet">
  <!-- jQuery custom content scroller -->
  <link href="{{ URL::asset('css/template/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet"
  />
  <!-- Custom Theme Style -->
  <link href="{{ URL::asset('css/template/custom.min.css') }}" rel="stylesheet">
  <!-- Datatables -->
  <link href="{{ asset('css/datatable/dataTables.bootstrap.min.css') }} " rel="stylesheet">
  <link href="{{ asset('css/datatable/buttons.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('css/datatable/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/datatable/responsive.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/datatable/scroller.bootstrap.min.css') }}" rel="stylesheet">


</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title">
              <span>CPECMU Projects</span>
            </a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->

          <!-- /menu profile quick info -->

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
              <h3> Project Committee</h3>
            </div>
            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2><small></small></h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive "
                  cellspacing="0" width="100%">
                  <thead>
                    <tr>

                      <th>Project Name </th>
                      <th>committee</th>
                      <th>Course</th>
                      <th>Y/S</th>
                      <!--  <th>Edit</th>
                          <th>Delete</th> -->

                    </tr>
                  </thead>
                  <tbody>

                    @if(empty($output))
                    <tr>
                      <td colspan="5" class="text-center">
                          There're no students enroll
                      </td>
                    </tr>
                    @endif


                    @foreach($output as $project)
                    <tr>

                      <td>

                        @foreach($project['committee'] as $committee) @if($committee['committee']['type']=="advisor")
                        @if($committee['committee']['statusApprov']=="1")
                        <?php $status = "Approved"; ?> @else
                        <?php $status = "Pending"; ?> @endif @endif @endforeach

                        <div style="color:blue;">

                          <a href="{{ url('student', [$project['project']['pid']]) }}">
                            {{ $project['project']['projectTitleEN'] }}
                            <br /> {{ $project['project']['projectTitleTH'] }}
                            <br />
                          </a>
                        </div>

                      </td>


                      <td>

                        @foreach($project['committee'] as $committee) @if($committee['committee']['type']=="advisor")
                        <?php
                                     $advisorName=  explode(' ',$committee['committee']['staffName']);
                                     echo    "<span class='label label-info'>A</span>".$advisorName[0]."<br />";

                              ?>
                          @endif @endforeach @foreach($project['committee'] as $committee) @if($committee['committee']['type']=="committee")
                          <?php
                                        $committeeName=  explode(' ',$committee['committee']['staffName']);
                                        echo  "<span class='label label-info'>C</span>".$committeeName[0]."<br />";

                                 ?>

                            @endif @endforeach
                      </td>

                      <td>

                        <div>
                          {{ $project['project']['course'] }}
                        </div>

                      </td>
                      <td>

                        {{ $project['project']['regisyear'] }}/{{ $project['project']['semester'] }}

                      </td>
                      <!--
                          <td>
                          <a href="/student/viewProject/{{ $project['project']['pid'] }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                          </td>
                          <td>
                             <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </td>
                        -->
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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

  <!-- Chart.js -->
  <script src="{{ asset('js/Chart.min.js') }}"></script>

  <!-- Datatables -->
  <script src="{{ asset('js/datatable/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('js/datatable/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/datatable/dataTables.buttons.min.js')}}"></script>
  <script src="{{ asset('js/datatable/buttons.bootstrap.min.js')}}"></script>

  <script src="{{ asset('js/datatable/dataTables.responsive.min.js')}}"></script>
  <script src="{{ asset('js/datatable/responsive.bootstrap.js')}}"></script>

  <script src="{{ asset('js/datatable/jszip.min.js')}}"></script>
  <script src="{{ asset('js/datatable/pdfmake.min.js')}}"></script>
  <script src="{{ asset('js/datatable/vfs_fonts.js')}}"></script>

  <!-- Custom Theme Scripts -->
  <script src="{{asset('js/custom.min.js')}}"></script>

</body>

</html>
