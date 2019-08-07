<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Detil TTB
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
          <div class="col-md-8">
            <?php
            if (isset($_GET['tmb'])) {
            if($_GET['tmb']=="success") {
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Berhasil Menambahkan Data!
            </div>
            <?php } else { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Gagal Menambahkan Data!</h4>
            </div>
            <?php }
            }
            ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <form role="form" method="POST" action="data/detil_ttb/proses.php">
              <div class="box-body">
                <div class="form-group">
                  <label>Kode TTB</label>
                  <select class="form-control select2" style="width: 100%;" name="ttb" required="">
                    <?php
                    $query = mysql_query("select * from ttb ORDER by kd_ttb desc ");
                    while ($row = mysql_fetch_array($query)){
                    echo "<option value=$row[kd_ttb]>$row[kd_ttb] ($row[tgl_ttb])</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Kode Barang</label>
                  <select class="form-control select2" style="width: 100%;" name="barang" required="">
                    <?php
                    $query = mysql_query("select * from barang ORDER by kd_barang asc");
                    while ($row = mysql_fetch_array($query)){
                    echo "<option value=$row[kd_barang]>$row[kd_barang] - $row[nm_barang]</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jumlah Terima</label>
                  <input name="jumlah" type="text" maxlength="4" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Masukkan Jumlah Terima" required="">
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