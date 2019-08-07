<?php
include "../../../../Connection/config.php";

$query = "select MAX(RIGHT(kd_pegawai,3)) as max_id from pegawai ORDER BY kd_pegawai";
$sql   = mysql_query($query);
$hasil = mysql_fetch_array($sql);
$maxid = 0;
$maxid = $hasil['max_id'];
$maxid++;
switch (strlen($maxid)) {
  case 1 :
      $idfix = "000" . $maxid;
      break;
  case 2 :
      $idfix = "00" . $maxid;
      break;
  case 3 :
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
  $bg     = $_POST['bagian'];
  $alm    = $_POST['alamat'];
  $telp   = $_POST['telp'];
  $pass   = "test";
  //Mendapatkan value level dari value bagian
  if ($bg == 'Purchasing'){
    $lvl  = 1; 
  }else if ($bg == 'Gudang') {
    $lvl  = 2; 
  }else if ($bg == 'Finance') {
    $lvl  = 3; 
  }else if ($bg == 'Manager') {
    $lvl  = 4; 
  }
  //INSERT QUERY START
  $query1 = "insert into pegawai values('".$kd."','".$nm."','".$bg."','".$alm."','".$telp."','".$pass."','".$lvl."')";
  $sql1   = mysql_query($query1);
  if ($sql1) {
      header("Location: ../../index.php?hal=pgw&tmb=success");
    } else {
      header("Location: ../../index.php?hal=pgw&tmb=fail");
    }
}
//Proses Ubah
else if(isset($_POST['ubah'])) {
  $kd   = $_POST['kode'];
  $nm   = $_POST['nama'];
  $bg   = $_POST['bagian'];
  $alm  = $_POST['alamat'];
  $telp = $_POST['telp'];
  $pass = $_POST['pass'];
  //UPDATE QUERY START
  $query1 = "update pegawai set nm_pegawai='$nm',bagian='$bg', alamat_pegawai='$alm', no_telp_pegawai='$telp', password='$pass' where kd_pegawai='$kd'";
  $sql1 = mysql_query($query1);
  if ($sql1) {
    header("Location: ../../index.php?hal=pgw&ubh=success");
  } else {
    header("Location: ../../index.php?hal=pgw&ubh=fail");
  }
//UPDATE QUERY END
}
//Proses Hapus
else if(isset($_POST['hapus'])) {
  $kode = $_POST['kode'];
  //DELETE QUERY START
  $query1 = "delete from pegawai where kd_pegawai='$kode'";
  $sql1 = mysql_query($query1);
  if ($sql1) {
    header("Location: ../../index.php?hal=pgw&hps=success");
  } else {
    header("Location: ../../index.php?hal=pgw&hps=fail");
  }
  exit;
}
?>
