<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Peristiwa | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="adminlte/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="adminlte/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="adminlte/dist/css/skins/_all-skins.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="adminlte/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="adminlte/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="adminlte/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="adminlte/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" type="text/css" href="css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/s2-docs.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
  <!-- POP UP -->
  <div class="pop_up_background">
        <div class="pop_up_tweet">
          <h3 class="title">Tweet peristiwa di Provinsi ini!</h3>
            <form class="form-horizontal" method="POST" action="{{ route('twitter_status_update') }}">
              {!! csrf_field() !!}
              <div class="form-group margin-bottom-none">
                <div class="col-sm-12">
                  <textarea name="status" class="form-control input-sm" placeholder="Apa yang terjadi?"></textarea><br>
 
                  <input type="hidden" name="location_id">
                  <div class="row">
                  <div class="col-md-7">
                      <!-- <input name="haystack" class="form-control input-sm pull-left" placeholder="#"> -->
                  <select class="js-multiple" multiple="multiple" style="width:100%" placeholder="haystack">
                    <option value="kebakaran">Kebakaran</option>
                    <option value="response_plus">Response Pemerintah (+)</option>
                    <option value="response_min">Response Pemerintah (-)</option>
                    <option value="penebangan">Penebangan Liar</option>
                    <option value="dukungan">Dukungan Masyarakat</option>
                  </select>
                    </div>
                    <div class="col-md-5">
                      <ul class="button-group-popup">
                        <li>
                          <button id="close" class="btn btn-default">Close</button>
                        </li>
                        <li>
                          <button type="submit" class="btn btn-promary tweet">Tweet</button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>                          
              </div>                        
          </form>
        </div>
  </div>
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="@yield('user_image')" class="user-image" alt="User Image">
                  <span class="hidden-xs">@yield('user_fullname') <i class="fa fa-angle-down" style="margin-left:7px;font-size:15px;"></i></span>
                </a>
                <ul class="dropdown-menu settnav">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="@yield('user_image')" class="img-circle" alt="User Image">
                    <p>
                      @yield('user_fullname') - @yield('user_username')
                      <small>@yield('user_description')</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Tweets</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Following</a>
                    </div>
                    <div class="col-xs-4 text-center">  
                      <a href="#">Followers</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="/profile" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ route('logout_path') }}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!-- <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li> -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel" style="background-image:url('{{asset('image/userbackground2.jpg')}}');background-size:100%;background-repeat:no-repeat;padding-bottom:61px;">
            <!-- <div class="userpanel-wrap"> -->
              <div class=" image" style="padding-left:15px;">
                <img src="@yield('user_image')" class="img-circle" alt="User Image">
              </div>
              <div class=" info">
                <p style="color:#fff;margin-bottom:0;">@yield('user_fullname')</p>
                <p class="text-muted" style="color:#fff;font-size:11px;">{{ "@" . $twitterAccount->screen_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
            <!-- </div> -->
          </div><!--end-user-panel-->
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <li class="active">
              <a href="/dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="/profile">
                <i class="fa fa-user"></i> <span>Profile</span>
              </a>
              <hr>
            </li>
            <li>
              <a href="/stats">
                <i class="fa fa-area-chart"></i> <span>Stats</span>
              </a>
            </li>
            <li>
              <a href="/help">
                <i class="fa fa-question-circle"></i> <span>Help</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @yield('title')
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
          	@yield('breadcrumb')
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	@yield('content')
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> Beta
        </div>
        <strong>Copyright &copy; {{ date('Y') }} <a href="http://github.com/dilbadil">Peristiwa</a>.</strong> All rights reserved.
      </footer>
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="adminlte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
       <!-- custom by wida -->
    <script type="text/javascript" src="javascript/raphael-min.js"></script>
    <script type="text/javascript" src="javascript/chart.min.js"></script>
    <!-- // <script type="text/javascript" src="javascript/petaindonesia.js"></script> -->
    <script type="text/javascript" src="javascript/peta_custom.js"></script>
    <script type="text/javascript" src="javascript/select2.js"></script>
    <script type="text/javascript" src="javascript/pretty.min.js"></script>
    <script type="text/javascript" src="javascript/anchor.min.js"></script>
    <script type="text/javascript" src="javascript/show_chart.js"></script>
    <script type="text/javascript">
        $(".js-multiple").select2();
    </script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="adminlte/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="adminlte/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="adminlte/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="adminlte/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="adminlte/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="adminlte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="adminlte/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="adminlte/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="adminlte/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="adminlte/dist/js/demo.js"></script>

 
  </body>
</html>
