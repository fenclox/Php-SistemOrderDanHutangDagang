<?php
include "../../../../Connection/config.php";
$tampil = mysql_query("SELECT * FROM pegawai where kd_pegawai='".$_GET['q']."'");
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
  <label>Kode Pegawai</label>
  <input name="kode" type="text" value="<?php echo $r['kd_pegawai'];?>" class="form-control" readonly="">
</div>
<div class="form-group">
  <label>Nama Lengkap</label>
  <input name="nama" type="text" value="<?php echo $r['nm_pegawai']?>" class="form-control" placeholder="Masukkan Nama Kepala Bagian" maxlength="30" onkeypress="return isAlphabetKey(event)" required="" style="text-transform: capitalize;">
</div>
<div class="form-group">
  <label>Bagian</label>
  <select class="form-control" name="bagian" required="">
    <option <?php $ob->cek("Manager",$r['bagian'],"select") ?> value="Manager">Manager</option>
    <option <?php $ob->cek("Finance",$r['bagian'],"select") ?> value="Finance">Finance</option>
    <option <?php $ob->cek("Akunting",$r['bagian'],"select") ?> value="Akunting">Akunting</option>
    <option <?php $ob->cek("Gudang",$r['bagian'],"select") ?> value="Gudang">Gudang</option>
    <option <?php $ob->cek("Purchasing",$r['bagian'],"select") ?> value="Purchasing">Purchasing</option>
  </select>
</div>
<div class="form-group">
  <label>Alamat</label>
  <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat" required=""><?php echo $r['alamat_pegawai']?></textarea>
</div>
<div class="form-group">
  <label>Nomor Telepon</label>
  <input name="telp" type="text" value="<?php echo $r['no_telp_pegawai']?>" class="form-control" placeholder="Masukkan Nomor Telepon" onkeypress="return isNumberKey(event)" maxlength="13" required="">
</div>
<div class="form-group">
  <label>Kata Sandi</label>
  <input name="pass" type="password" value="<?php echo $r['password']?>" class="form-control" placeholder="Masukkan Kata Sandi" maxlength="10" required="">
</div>