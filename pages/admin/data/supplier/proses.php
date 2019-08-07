<?php
include "../../../../Connection/config.php";

$query = "select MAX(RIGHT(kd_supplier,2)) as max_id from supplier ORDER BY kd_supplier";
$sql   = mysql_query($query);
$hasil = mysql_fetch_array($sql);
$maxid = 0;
$maxid = $hasil['max_id'];
$maxid++;
switch (strlen($maxid)) {
  case 1 :
      $idfix = "00" . $maxid;
      break;
  case 2 :
      $idfix = "0" . $maxid;
      break;
  default :
      $idfix = $maxid;
      break;
};
//Proses Tambah
if(isset($_POST['tambah'])){
  $kd     = $idfix;
  $nm     = $_POST['nama'];
  $npwp   = $_POST['npwp'];
  $alm    = $_POST['alamat'];
  $telp   = $_POST['telp'];
  $email  = $_POST['email'];
  //INSERT QUERY START
  $query1 = "insert into supplier values('".$kd."','".$nm."','".$npwp."','".$alm."','".$telp."','".$email."')";
  $sql1   = mysql_query($query1);
  if ($sql1) {
      header("Location: ../../index.php?hal=spl&tmb=success");
    } else {
      header("Location: ../../index.php?hal=spl&tmb=fail");
    }
}
//Proses Ubah
else if(isset($_POST['ubah'])) {
  $kd     = $_POST['kode'];
  $nm     = $_POST['nama'];
  $npwp   = $_POST['npwp'];
  $alm    = $_POST['alamat'];
  $telp   = $_POST['telp'];
  $email  = $_POST['email'];
  //UPDATE QUERY START
  $query1 = "update supplier set nm_supplier='$nm', npwp='$npwp', alamat_supplier='$alm', no_telp_supplier='$telp', email_supplier='$email' where kd_supplier='$kd'";
  $sql1 = mysql_query($query1);
  if ($sql1) {
    header("Location: ../../index.php?hal=spl&ubh=success");
  } else {  mysql_error();
    //header("Location: ../../index.php?hal=spl&ubh=fail");
  }
//UPDATE QUERY END
}
//Proses Hapus
else if(isset($_POST['hapus'])) {
  $kode = $_POST['kode'];
  //DELETE QUERY START
  $query1 = "delete from supplier where kd_supplier='$kode'";
  $sql1 = mysql_query($query1);
  if ($sql1) {
    header("Location: ../../index.php?hal=spl&hps=success");
  } else {
    header("Location: ../../index.php?hal=spl&hps=fail");
  }
  exit;
}
?>
