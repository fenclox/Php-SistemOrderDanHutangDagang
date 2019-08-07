<?php
include "../../../../Connection/config.php";
//set timezone jakarta
date_default_timezone_set("Asia/Jakarta");
//Proses Tambah
if(isset($_POST['tambah'])){
  $kd     = $_POST['kode'];
  //$tgl    = date("Y-m-d");
  $si     = $_POST['nosi'];
  $jml    = $_POST['jmlbyr'];
  $nama   = $_POST['nama'];
  $rek    = $_POST['norek'];
  $berkas = $_FILES['berkas']['name'];
  $tmp    = $_FILES['berkas']['tmp_name'];
  //tabel salinan_invoice
  $query = mysql_query("SELECT kd_ttb, total_pembayaran, cicilan_ke from salinan_invoice where no_si='$si' group by no_si");
  while ($r = mysql_fetch_array($tampil)) {
    $total      = $r[total_pembayaran];
    $cicil      = $r[cicil_ke];  
    $total_pem  = $total + $jml;
    $cicil_ke   = $cicil + 1; 
    $ttb   = $r[kd_ttb]; 
  };
  // Rename nama filenya dengan menambahkan tanggal dan jam upload
  $berkasbaru = date('dmYHis').'.pdf';
  // Set path folder tempat menyimpan fotonya
  $path = "../../../../pembayaran/".$berkasbaru;
  //-----------------------------------------------
  $fileExt = strtolower(pathinfo($berkas,PATHINFO_EXTENSION)); // get .* extension
  // valid pdf extensions
  $valid_extensions = array('pdf'); // valid extensions
  // allow valid pdf file formats
  if(in_array($fileExt, $valid_extensions)){
    // Jika syarat sudah terpenuhi
    if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
    // Proses simpan ke Database
    $query1 = "insert into pembayaran values('".$kd."', CURDATE(),'".$si."','".$jml."','".$berkasbaru."','".$nama."','".$rek."')";
    $sql1 = mysql_query($query1);
    //$sql2 = mysql_query($query2);
      if ($sql1){
        header("Location: ../../index.php?hal=byr&tmb=success");
      }
    } else {
    // Jika gambar gagal diupload, Lakukan : 
    mysql_error();
    }
  } else {
    header("Location: ../../index.php?hal=byr&tmb=fail");
  }
} else { mysql_error();}
?>