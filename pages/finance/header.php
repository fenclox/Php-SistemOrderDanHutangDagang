<?php// error_reporting(0); ?>
<?php include"../../Connection/config.php";
session_start();
if(!isset($_SESSION['kd_pegawai'])){
    ?>
    <script >
        alert("Anda harus masuk terlebih dahulu");
        document.location="../login/index.php";
    </script>
    <?php
}
?>
<!-- Mengatur Tanggal Indonesia -->
<?php
  date_default_timezone_set('Asia/Jakarta');
  function tglIndonesia($str){
        $tr   = trim($str);
        $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
        return $str;
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman | Finance</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- PDF Preview -->
  <script src="../../pdfjs-1.7.225-dist/build/pdf.js"></script>
  <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- ////////////////// Onclick only ////////////////// -->
  <script language="javascript">
    function isNumberKey(evt) //Number
    {
      var charCode = (evt.which) ? evt.which : event.keyCode;
      console.log(charCode);
        if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;

      return true;
    }
    function isUppercaseKey(evt) //Uppercase
    {
      var charCode = (evt.which) ? evt.which : event.keyCode;
      console.log(charCode);
        if (charCode > 31 && (charCode < 65 || charCode > 90))
          return false;

      return true;
    }
    function isLowercaseKey(evt) //Lowercase
    {
      var charCode = (evt.which) ? evt.which : event.keyCode;
      console.log(charCode);
        if (charCode > 31 && (charCode < 97 || charCode > 122))
          return false;

      return true;
    }
    function isAlphabetKey(evt) //Alphabet + spc
    {
      var charCode = (evt.which) ? evt.which : event.keyCode;
      console.log(charCode);
        if (charCode > 32 && (charCode < 97 || charCode > 122))
          return false;

      return true;
    }
  </script>
  <!-- ////////////////// End Onclick only ////////////////// -->
  <!-- ////////////////// PDF Show & Hide ////////////////// -->
    <script type="text/javascript">
    $(document).ready(function () {
    $("#pdfInp").change(function () {
    if (this.files && this.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    showInCanvas(e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
    }
    });
    function convertDataURIToBinary(dataURI) {
    var BASE64_MARKER = ';base64,';
    var base64Index = dataURI.indexOf(BASE64_MARKER) + BASE64_MARKER.length;
    var base64 = dataURI.substring(base64Index);
    var raw = window.atob(base64);
    var rawLength = raw.length;
    var array = new Uint8Array(new ArrayBuffer(rawLength));
    for (i = 0; i < rawLength; i++) {
    array[i] = raw.charCodeAt(i);
    }
    return array;
    }
    function showInCanvas(url) {
    // See README for overview
    'use strict';
    // Fetch the PDF document from the URL using promises
    var pdfAsArray = convertDataURIToBinary(url);
    PDFJS.getDocument(pdfAsArray).then(function (pdf) {
    // Using promise to fetch the page
    pdf.getPage(1).then(function (page) {
    var scale = 1.5;
    var viewport = page.getViewport(scale);
    // Prepare canvas using PDF page dimensions
    var canvas = document.getElementById('the-canvas');
    var context = canvas.getContext('2d');
    canvas.height = viewport.height;
    canvas.width = viewport.width;
    // Render PDF page into canvas context
    var renderContext = {
    canvasContext: context,
    viewport: viewport
    };
    page.render(renderContext);
    });
    });
    }
    });
    </script>
    <script type="text/javascript">
    $(document).ready (function() {
    $(".tombol1").click (function() {
    $("#lihat").toggle(1000);
    });
    });
    </script>
    <!-- ////////////////// End PDF Show & Hide ////////////////// -->
</head>
<body class="hold-transition skin-green sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../../images/logo.png" height="40" width="40"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="../../images/logo.png" height="40" width="40"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/avatar04.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <?php
            $kd = $_SESSION['kd_pegawai'];
            include "../../connection/config.php";
            $sql = "select kd_pegawai,nm_pegawai from pegawai where kd_pegawai='".$kd."'";
            $query = mysql_query($sql);
            while($data = mysql_fetch_array($query)){
              echo  "<br><p>" .$data['nm_pegawai']. "</b></p>";
            }
          ?>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <!-- Menu Utama -->
        <li class="header">MENU UTAMA</li>
        <li><a href="index.php?hal=beranda"><i class="glyphicon glyphicon-home"></i> <span>Beranda</span></a></li>
        <li><a href="index.php?hal=pfl"><i class="glyphicon glyphicon-user"></i> <span>Profil</span></a></li>
        <!-- Menu lainnya -->
        <li class="header">MENU LAINNYA</li>
        <li><a href="index.php?hal=dsi"><i class="glyphicon glyphicon-copy"></i> <span>Data Salinan Invoice</span></a></li>
        <li><a href="index.php?hal=byr"><i class="fa fa-money"></i> <span>Data Pembayaran</span></a></li>
        </li>
        <li class="header">MENU KELUAR</li>
        <li><a href="keluar.php"><i class="glyphicon glyphicon-off"></i> <span>Keluar</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->
