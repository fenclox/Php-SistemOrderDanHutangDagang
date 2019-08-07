<?php
  //Kode
  $time   = date('Hisymd');
  $id     = rand(0,9);
  $kd     = $time.$id;
  //Salinan Invoice
  $nosi = $_GET['no_si'];
  $query = mysql_query("SELECT * from salinan_invoice where no_si = '$nosi'");
  $row = mysql_fetch_array($query);
  $ttl_tgh = $row['total_tagihan'];
  $ttl_byr = $row['total_pembayaran'];
  $bts_ccl = $row['batas_cicilan'];
  $ccl_ke  = $row['cicilan_ke'];
  $jml_byr = $ttl_tgh/$bts_ccl;
  $sisa_ccl= $bts_ccl-$ccl_ke;
  $sisa_byr= $ttl_tgh-$ttl_byr;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Pembayaran
    </h1>
    <ol class="breadcrumb">
      <b><p style="font-size:15px; margin-top:-5px"><?php echo tglIndonesia(date('D, d F Y')); ?></p></b>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box box-success">
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <form role="form" method="POST" enctype="multipart/form-data" action="data/pembayaran/proses.php">
              <div class="box-body">
                <div class="form-group">
                  <label>Kode Pembayaran</label>
                  <input type="text" class="form-control" name="kode" value='<?php echo $kd;?>' readonly="">
                </div>
                <div class="form-group">
                  <label>No. SI</label>
                  <input type="text" class="form-control" name="nosi" value='<?php echo $nosi;?>' readonly="">
                </div>
                <div class="form-group">
                  <label>Sisa Pembayaran</label>
                  <input type="text" class="form-control" name="sccl" readonly="" value='<?php echo $sisa_byr;?>'>
                </div>
                <div class="form-group">
                  <label>Sisa Cicilan</label>
                  <input type="text" class="form-control" name="sccl" readonly="" value='<?php echo $sisa_ccl;?>'>
                </div>
                <div class="form-group">
                  <label>Jumlah Pembayaran</label>
                  <div class="input-group">
                    <div class="input-group-addon">Rp</div>
                    <input name="jmlbyr" type="text" maxlength="9" onkeypress="return isNumberKey(event);" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label>File Transfer (PDF)</label>
                  <div class="row">
                    <div class="col-md-6">
                      <input type="file" name="berkas" id="pdfInp" required="">
                    </div>
                    <div class="col-md-6">
                      <button type="button" class="tombol1">Lihat | Tutup</button>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Nama Penerima</label>
                  <input type="text" name="nama" maxlength="30" onkeypress="return isAlphabetKey(event);" placeholder="Masukkan Nama Penerima" class="form-control" style="text-transform: capitalize;" required="">
                </div>
                <div class="form-group">
                  <label>Nomor Rekening</label>
                  <input name="norek" type="text" maxlength="15" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Masukkan Nomor Rekening" required="">
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button name="tambah" type="submit" class="btn btn-primary">Bayar</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <!-- Canvas -->
            <p id="lihat" style="display:none">
              <canvas id="the-canvas" style="border:2px solid black; width: 100%"></canvas>
            </p>
            <!-- End Canvas -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->