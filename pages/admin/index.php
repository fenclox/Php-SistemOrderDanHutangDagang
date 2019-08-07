<?php
  //Include file header.php
  include 'header.php';
  //cek session, kalo ga ada, lempar ke login.
  if(isset($_GET['hal'])){
      switch($_GET['hal']){
          case 'beranda'  : include 'beranda.php'; break;
          case 'spl'      : include 'data/supplier/supplier.php'; break;
          case 'pgw'      : include 'data/pegawai/pegawai.php'; break;
          case 'brg'      : include 'data/barang/barang.php'; break;

          case 'po'       : include 'data/po/po.php'; break;
          case 'dtpo'     : include 'data/po/data.php'; break;
          case 'dpo'      : include 'data/detil_po/detil_po.php'; break;
          case 'dtdpo'    : include 'data/detil_po/data.php'; break;

          case 'dsi'      : include 'data/si/data.php'; break;

          case 'dttb'     : include 'data/ttb/data.php'; break;
          case 'ddttb'    : include 'data/detil_ttb/data.php'; break;

          case 'dbyr'     : include 'data/pembayaran/data.php'; break;
          case 'byr'      : include 'data/pembayaran/pembayaran.php'; break;

          default : include '404.php';
      }
  }else{
      include 'beranda.php';
  }
  //Include file footer.php
  include 'footer.php';

?>
