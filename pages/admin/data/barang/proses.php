<?php
include "../../../../Connection/config.php";

  $query = "select MAX(RIGHT(kd_barang,4)) as max_id from barang ORDER BY kd_barang";
  $sql   = mysql_query($query);
  $hasil = mysql_fetch_array($sql);
  $maxid = 0;
  $maxid = $hasil['max_id'];
  $maxid++;
  switch (strlen($maxid)) {
    case 1 :
        $idfix = "0000" . $maxid;
        break;
    case 2 :
        $idfix = "000" . $maxid;
        break;
    case 3 :
        $idfix = "00" . $maxid;
        break;
    case 4 :
        $idfix = "0" . $maxid;
        break;
    default :
        $idfix = $maxid;
        break;
  };
//Proses Tambah
if(isset($_POST['tambah'])){
  $kd = $idfix;
  $nm     = $_POST['nama'];
  $hrg    = $_POST['harga'];
  $stok   = $_POST['stok'];
  //INSERT QUERY START
  $query1 = "insert into barang values('".$kd."','".$nm."','".$hrg."','".$stok."')";
  $sql1   = mysql_query($query1);
  if ($sql1) {
      header("Location: ../../index.php?hal=brg&tmb=success");
    } else {
      header("Location: ../../index.php?hal=brg&tmb=fail");
    }
}
//Proses Ubah
else if(isset($_POST['ubah'])) {
  $kd     = $_POST['kode'];
  $nm     = $_POST['nama'];
  $hrg    = $_POST['harga'];
  $stok   = $_POST['stok'];
  //UPDATE QUERY START
  $query1 = "update barang set nm_barang='$nm', harga='$hrg', stok='$stok' where kd_barang='$kd'";
  $sql1 = mysql_query($query1);
  if ($sql1) {
    header("Location: ../../index.php?hal=brg&ubh=success");
  } else {
    header("Location: ../../index.php?hal=brg&ubh=fail");
  }
//UPDATE QUERY END
}
//Proses Hapus
else if(isset($_POST['hapus'])) {
  $kode = $_POST['kode'];
  //DELETE QUERY START
  $query1 = "delete from barang where kd_barang='$kode'";
  $sql1 = mysql_query($query1);
  if ($sql1) {
    header("Location: ../../index.php?hal=brg&hps=success");
  } else {
    header("Location: ../../index.php?hal=brg&hps=fail");
  }
  exit;
}
?>
