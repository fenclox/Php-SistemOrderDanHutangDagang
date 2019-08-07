<?php
include "../../../../Connection/config.php";
//set timezone jakarta
date_default_timezone_set("Asia/Jakarta"); 
//Proses Tambah
if(isset($_POST['tambah'])){
  $time = date('ymdHis');
  $id   = rand(0,9);
  $kd   = $time.$id;
  $tgl  = date("Y-m-d");
  $ttl  = $_POST['total'];
  $tmp  = $_POST['tempo'];
  $ccl  = $_POST['cicilan'];
  $ttb  = $_POST['ttb'];

  //INSERT QUERY START
  $query1 = "insert into salinan_invoice values('".$kd."','".$tgl."','".$ttl."','".$tmp."','".$ccl."',0,0,'".$ttb."')";
  $sql1   = mysql_query($query1);
  if ($sql1) {
      header("Location: ../../index.php?hal=si&tmb=success");
    } else {
      die (mysql_error());
      header("Location: ../../index.php?hal=si&tmb=fail");
    }
}
?>
