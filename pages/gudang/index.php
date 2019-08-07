<?php
  //Include file header.php
  include 'header.php';
  //cek session, kalo ga ada, lempar ke login.
  if(isset($_GET['hal'])){
      switch($_GET['hal']){
          case 'beranda'  : include 'beranda.php'; break;
          case 'pfl'      : include 'data/profil/profil.php'; break;
          case 'spl'      : include 'data/supplier/supplier.php'; break;

          case 'po'       : include 'data/po/po.php'; break;
          case 'epo'      : include 'data/po/entrypo.php'; break;
          case 'epodtl'   : include 'data/po/entrypodtl.php'; break;

          case 'ttb'      : include 'data/ttb/ttb.php'; break;
          case 'ettb'     : include 'data/ttb/entryttb.php'; break;
          case 'ettbdtl'  : include 'data/ttb/entryttbdtl.php'; break;

          case 'esi'       : include 'data/si/entrysi.php'; break;
          case 'si'       : include 'data/si/data.php'; break;

          default : include '404.php';
      }
  }else{
      include 'beranda.php';
  }
  //Include file footer.php
  include 'footer.php';

?>
