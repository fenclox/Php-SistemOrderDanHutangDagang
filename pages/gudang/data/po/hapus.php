<?php
  include('../../../../Connection/config.php');
  $brg = $_GET['brgdetil'];
  // query SQL untuk delete data
  $query="DELETE from detil_po where kd_barang='$brg'";
  mysql_query($query);
  // mengalihkan ke halaman datatables
  header('location:'.$_SERVER['HTTP_REFERER']);
?>