<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Laporan Pembayaran
    </h1>
    <ol class="breadcrumb">
      <b><p style="font-size:15px; margin-top:-5px"><?php echo tglIndonesia(date('D, d F Y')); ?></p></b>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- ////////////////////////////////////////////// -->
    <!-- About Me Box -->
    <div class="box box-success">
      <div class="box-header">
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-lg-12">
            <form method="POST" action="data/laporan/pembayaran/pembayaran.php">
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="control-label">Bulan</label>
                    <div class="selectContainer">
                      <select class="form-control" name="bulan">
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="control-label">Tahun</label>
                    <div class="selectContainer">
                      <?php
                      $now=date('Y');
                      echo "<select name='tahun' class='form-control'>";
                        for ($a=2010;$a<=$now;$a++)
                        {
                        echo "<option value='$a' selected>$a</option>";
                        }
                      echo "</select>";
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <input type="submit" value="Cetak" class="btn btn-primary">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- ////////////////////////////////////////////// -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->