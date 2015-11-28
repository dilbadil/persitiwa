<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Peristiwa | Log in</title>
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
    <!-- iCheck -->
    <link rel="stylesheet" href="adminlte/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page ">
    <div class="login-box">
      <div class="login-logo">
        <h1>
          <a href="">Peristiwa</a>
        </h1>
        <span>Lindungi "HUTAN" dengan tweet<strong>mu!</strong></span>
        <p>Laporkan kerusakan hutan dengan cara tweet, Kamu juga bisa menanggapi dan mendukung pemerintah dalam menangani kerusakan hutan yang tengah terjadi di indonesia.
        Dengan keaktifanmu, secara tidak langsung kamu telah membantu dan mendorong pemerintah untuk mengambil keputusan.
        </p>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <div class="social-auth-links text-center">
          <a href="{{ $urlTwitter }}" class="btn btn-block btn-social btn-twitter btn-flat"><i class="fa fa-twitter"></i>Masuk dengan twitter</a>
        </div><!-- /.social-auth-links -->
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="adminlte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="adminlte/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="adminlte/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
