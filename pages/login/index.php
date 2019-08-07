<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Halaman | Masuk</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=".https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="../../https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="../../https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script language="Javascript">
    function isNumberKey(evt)
    {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    {
    return false;
    }
    else{
    return true;
    }
    }
    </script>
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <h2><a href="index.php"><b>PT. MODERNPACK JAYA LESTARI</b></a></h2>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive no-border" src="../../images/logo.png" alt="User profile picture"><br>
        </div>
        <!-- /.box-profile -->
        <form action="proses.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="kd_pegawai" class="form-control" placeholder="Kode Pegawai" maxlength="4" onkeypress="return isNumberKey(event)" required="">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Kata Sandi" required="">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <select name="level" class="form-control" required="">
              <option value="">Level</option>
              <option value="0">Admin</option>
              <option value="1">Purchasing</option>
              <option value="2">Gudang</option>
              <option value="3">Finance</option>
              <option value="4">Direktur</option>
            </select>
          </div>
          <div class="row">
            <div class="col-md-4">
              <button type="submit" name="masuk" class="btn btn-success btn-block btn-flat">Masuk</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <!-- jQuery 2.2.3 -->
    <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
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