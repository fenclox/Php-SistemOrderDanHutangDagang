<?php
  include "../../../../Connection/config.php";
  $po   = $_POST['po'];
  $spl  = $_POST['supplier'];
  $pgw  = $_POST['pegawai'];
  $brg  = $_POST['barang'];
  $jml  = $_POST['jumlah'];

  $querypo = "INSERT into po (kd_po, tgl_po, status_po, kd_pegawai, kd_supplier)
  values('$po', CURDATE(), '0', '$pgw', '$spl')";

  $querydtlpo = "INSERT into detil_po (kd_po, kd_barang, jumlah_barang)
  values('$po', '$brg', '$jml')";
  
    mysql_query($querypo);
    mysql_query($querydtlpo);
    header('location:../../index.php?hal=epodtl&&kd_po='.$po.'&&kd_supplier='.$spl);
  //}

?>