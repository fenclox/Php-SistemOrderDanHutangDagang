<?php
include "../../../../Connection/config.php";
//set timezone jakarta
date_default_timezone_set("Asia/Jakarta"); 
//Proses Tambah
if(isset($_POST['tambah'])){
  $kdsi   = $_POST['kdsi']; 
  $ttl  = $_POST['total'];
  $tmp  = $_POST['tempo'];
  $ccl  = $_POST['cicilan'];
  $ttb  = $_POST['kdttb'];

  //INSERT QUERY START
  $query1 = "insert into salinan_invoice values('".$kdsi."', CURDATE(),'".$ttl."','".$tmp."','".$ccl."',0,0,'".$ttb."')";
  $query2 = "update ttb set status_ttb='1' where kd_ttb='$ttb'";

  $sql1   = mysql_query($query1);
  $sql2   = mysql_query($query2);

  if ($sql1 && sql2) {
      header("Location: ../../index.php?hal=si&tmb=success");
    } else {
      header("Location: ../../index.php?hal=si&tmb=fail");
    }
}
?>
