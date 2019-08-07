
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Salinan Invoice
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
            <form role="form" method="POST" action="data/si/proses.php">
              <div class="box-body">
                <div class="form-group">
                  <?php
                    $time = date('ymdHis');
                    $id   = rand(0,9);
                    $kd   = $time.$id;
                  ?>
                  <label>Kode SI</label>
                  <input type="text" name="kdsi" maxlength="13" onkeypress="return isNumberKey(event);" class="form-control" value="<?php echo $kd ?>" required="" readonly="">
                </div>
                <div class="form-group">
                  <label>Kode TTB</label>
                  <input type="text" class="form-control" name="kdttb" readonly="" value='<?php
                    $ttb = $_GET['kd_ttb'];
                    $query = mysql_query("SELECT * from ttb where kd_ttb = '$ttb'");
                    $row = mysql_fetch_array($query);
                    echo $row['kd_ttb'];
                    ?>'>
                </div>
                <div class="form-group">
                  <label>Total Tagihan</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      Rp
                    </div>
                    <input name="total" type="text" maxlength="9" onkeypress="return isNumberKey(event);" class="form-control" value='<?php
                    $ttb = $_GET['kd_ttb'];
                    $query = mysql_query("SELECT sum(a.harga * b.jumlah_terima) as total FROM barang a, detil_ttb b WHERE a.kd_barang=b.kd_barang and b.kd_ttb='$ttb'");
                    $row = mysql_fetch_array($query);
                    echo $row['total'];
                    ?>' readonly="">
                  </div>
                </div>
                <div class="form-group">
                  <label>Tanggal jatuh Tempo</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="tempo" placeholder="Pilih Tanggal Jatuh Tempo" class="form-control pull-right" id="datepicker" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label>Batas Cicilan</label>
                  <input name="cicilan" type="text" maxlength="2" onkeypress="return isNumberKey(event)" class="form-control" placeholder="xx" required="" style="width: 40%">
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button name="tambah" type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.box-body -->
        </div>

        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->