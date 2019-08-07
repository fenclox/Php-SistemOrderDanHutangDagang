<?php
  include "../../../../Connection/config.php";

  $tampil = mysql_query("SELECT * FROM barang where kd_barang='".$_GET['q']."'");
  $r = mysql_fetch_array($tampil);
  //Fungsi Cek\
  class selected{
      function cek($val,$sel,$tipe){
          if($val==$sel){
              switch($tipe){
                  case 'select' :echo "selected"; break;
                  case 'radio' :echo "checked"; break;
              }
          }else{
              echo "";
          }
      }
  }
  $ob = new selected();
?>
<div class="form-group">
  <label>Kode Barang</label>
  <input name="kode" type="text" value="<?php echo $r['kd_barang'];?>" class="form-control" readonly="">
</div>
<div class="form-group">
  <label>Nama Barang</label>
  <input name="nama" type="text" value="<?php echo $r['nm_barang']?>" class="form-control" placeholder="Masukkan Nama Barang" maxlength="30" required="" style='text-transform: capitalize;' onkeypress='return isAlphabetKey(event)'>
</div>
<div class="form-group">
  <label>Harga</label>
  <input name="harga" type="text" value="<?php echo $r['harga']?>" class="form-control" placeholder="Masukkan Harga" onkeypress="return isNumberKey(event)" maxlength="9" required="">
</div>
<div class="form-group">
  <label>Stok</label>
  <input name="stok" type="text" value="<?php echo $r['stok']?>" class="form-control" placeholder="Masukkan Stok" onkeypress="return isNumberKey(event)" maxlength="4" required="">
</div>
