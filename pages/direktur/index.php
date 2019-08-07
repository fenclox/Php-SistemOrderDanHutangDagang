<?php
  //Include file header.php
  include 'header.php';
  //cek session, kalo ga ada, lempar ke login.
  if(isset($_GET['hal'])){
      switch($_GET['hal']){
          case 'beranda'  : include 'beranda.php'; break;
          case 'pfl'      : include 'data/profil/profil.php'; break;
          case 'lbyr'      : include 'data/laporan/pembayaran/laporan.php'; break;
          case 'lbli'      : include 'data/laporan/pembelian/laporan.php'; break;

          default : include '404.php';
      }
  }else{
      include 'beranda.php';
  }
  //Include file footer.php
  include 'footer.php';

?>
