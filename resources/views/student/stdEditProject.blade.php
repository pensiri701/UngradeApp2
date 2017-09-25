<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CPECMU Projects</title>

    <!-- Bootstrap -->
    <link href="{{ URL::asset('css/template/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset('css/template/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ URL::asset('css/template/nprogress.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ URL::asset('css/template/custom.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ URL::asset('css/penny.css') }}" rel="stylesheet">


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
            <!-- menu profile quick info -->
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            @include('student/menuLeftStudent')
            <!-- /sidebar menu -->

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

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add New Project  </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- Start From  -->
                    <form id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" action="<?PHP echo url('/'); ?>/updateProject" method="post">
                      @foreach($output as $project)

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Subject:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="subject" required="required" class="form-control col-md-7 col-xs-12" >
                              <option value="261491">261491</option>
                              <option value="261492">261492</option>
                              <option value="269491">269491</option>
                              <option value="269492">269492</option>
                          </select>
                        </div><div class="content_redStrong">*</div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Project  Title (English):</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="titleEN" value="{{ $project['project']['projectTitleEN'] }}">
                        </div><div class="content_redStrong">*</div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Project Title (Thai): </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" required="" name="titleTH" value="{{ $project['project']['projectTitleTH'] }}">
                        </div><div class="content_redStrong">*</div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Advisor">Advisor
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="advisor" required="required" class="form-control col-md-7 col-xs-12" >
                            <option value="FG02">Trasapong Thaiupathump</option>
                              <option value="FG03">Paskorn Champrasert</option>
                              <option value="FG04">Arnan Sipitakiat</option>
                              <option value="FG05">Lachana Ramingwong</option>
                              <option value="FG06">Pruet Boonma</option>
                              <option value="FG07">Dome Potikanond</option>
                              <option value="FG09">Anya Apavatjrut</option>
                              <option value="FG10">Sanpawat Kantabutra</option>
                              <option value="FG11">Athip Rooprayochsilp</option>
                              <option value="FG12">Juggapong Natwichai</option>
                              <option value="FG13">Kenneth Cosh</option>
                              <option value="FG14">Santi Phithakkitnukoon</option>
                              <option value="FG15">Narathip Tiangtae</option>
                              <option value="FG16">Sansanee Auephanwiriyakul</option>
                              <option value="FG17">Narissara Eiamkanitchat</option>
                              <option value="FG18">Sakgasit Ramingwong</option>
                              <option value="FG22">Yuthapong Somchit</option>
                              <option value="FG23">Patiwet Wuttisarnwattana</option>
                          </select>
                        </div><div class="content_redStrong">*</div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="std">Student ID1:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="std[]" required="required" class="form-control col-md-7 col-xs-12">
                        </div><div class="content_redStrong">*</div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Student ID2:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="std[]">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Semester:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="semester" required="required" class="form-control col-md-7 col-xs-12" >
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div><div class="content_redStrong">*</div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Year:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="year" value="<?php echo date("Y"); ?>">
                        </div><div class="content_redStrong">*</div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button type="submit" class="btn btn-success" value="submit">Submit</button>
                        </div>
                      </div>
                     @endforeach
                    </form>
                    <!-- End From  -->

                    <!-- End SmartWizard Content -->
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
    <!-- jQuery Form Smart Wizard -->
    <script src="{{ asset('js/template/jquery.smartWizard.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/template/custom.min.js') }}"></script>


  </body>
</html>
