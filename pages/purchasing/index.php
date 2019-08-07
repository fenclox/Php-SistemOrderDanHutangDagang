<?php
  //Include file header.php
  include 'header.php';
  //cek session, kalo ga ada, lempar ke login.
  if(isset($_GET['hal'])){
      switch($_GET['hal']){
          case 'beranda'  : include 'beranda.php'; break;
          case 'pfl'      : include 'data/profil/profil.php'; break;


          case 'dtpo'      : include 'data/po/data.php'; break;
          case 'po'      : include 'data/po/po.php'; break;
          case 'dpo'      : include 'data/detil_po/detil_po.php'; break;
          case 'dtdpo'      : include 'data/detil_po/data.php'; break;

          default : include '404.php';
      }
  }else{
      include 'beranda.php';
  }
  //Include file footer.php
  include 'footer.php';

?>
