<?php
  include "../../../../Connection/config.php";

  $tampil = mysql_query("SELECT * FROM supplier where kd_supplier='".$_GET['q']."'");
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
  <label>Kode Supplier</label>
  <input name="kode" type="text" value="<?php echo $r['kd_supplier'];?>" class="form-control" readonly="">
</div>
<div class="form-group">
  <label>Nama Supplier</label>
  <input name="nama" type="text" value="<?php echo $r['nm_supplier'];?>" class="form-control" placeholder="Masukkan Nama Supplier" maxlength="50" required="" style='text-transform:capitalize;' onkeypress='return isAlphabetKey(event)'>
</div>
<div class="form-group">
  <label>NPWP</label>
  <input name="npwp" type="text" value="<?php echo $r['npwp'];?>" class="form-control" placeholder="Masukkan NPWP" onkeypress="return isNumberKey(event)" required="">
</div>
<div class="form-group">
  <label>Alamat</label>
  <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat" required=""><?php echo $r['alamat_supplier'];?></textarea>
</div>
<div class="form-group">
  <label>Nomor Telepon</label>
  <input name="telp" type="text" value="<?php echo $r['no_telp_supplier'];?>" class="form-control" placeholder="Masukkan Nomor Telepon" onkeypress="return isNumberKey(event)" maxlength="13" required="">
</div>
<div class="form-group">
  <label>Email</label>
  <input name="email" type="email" value="<?php echo $r['email_supplier'];?>" class="form-control" placeholder="Masukkan Email" required="" maxlength='30'>
</div>
