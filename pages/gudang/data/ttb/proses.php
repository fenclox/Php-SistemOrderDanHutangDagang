<?php
  include "../../../../Connection/config.php";
  $kdpo       = $_POST['kdpo'];
  $kdttb      = $_POST['kdttb'];
  $nosj       = $_POST['nosj'];

  $a          = $_POST['front'];
  $b          = $_POST['mid'];
  $c          = $_POST['back'];
  $no         = $a.$b.$c;
  $nokndr     = $no;

  $spr        = $_POST['nama'];
  $kdp        = $_POST['kdp'];
  $kdbarang   = $_POST['kdbarang'];
  $jmlterima  = $_POST['jmlterima'];

  $queryttb = "INSERT into ttb values ('$kdttb', CURDATE(), '$nosj', '$nokndr', '$spr', '$kdp', '$kdpo', '0')";

  $querydtlttb = "INSERT into detil_ttb (kd_ttb, kd_barang, jumlah_terima) values('$kdttb', '$kdbarang', '$jmlterima')";

  $querypo = "update po set status_po='3' where kd_po='$kdpo'";

  mysql_query($queryttb);
  mysql_query($querydtlttb);
  mysql_query($querypo);
  header('location:../../index.php?hal=ettbdtl&&kd_ttb='.$kdttb.'&&kd_po='.$kdpo);
?>