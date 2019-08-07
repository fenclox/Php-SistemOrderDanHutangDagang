<?php
include "../../../../Connection/config.php";
//set timezone jakarta
date_default_timezone_set("Asia/Jakarta");
//Proses Tambah
if(isset($_POST['tambah'])){
  $ttb   = $_POST['ttb'];
  $brg  = $_POST['barang'];
  $jml  = $_POST['jumlah'];

  //INSERT QUERY START
  $query1 = "insert into detil_ttb values('".$ttb."','".$brg."','".$jml."')";
  $sql1   = mysql_query($query1);
  if ($sql1) {
      header("Location: ../../index.php?hal=dttb&tmb=success");
    } else {
      die (mysql_error());
      header("Location: ../../index.php?hal=dttb&tmb=fail");
    }
}
?>
