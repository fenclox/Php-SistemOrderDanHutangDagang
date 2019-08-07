<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Data Salinan Invoice
    </h1>
    <ol class="breadcrumb">
      <b><p style="font-size:15px; margin-top:-5px"><?php echo tglIndonesia(date('D, d F Y')); ?></p></b>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- /////////////////////////////////////// Box /////////////////////////////////////// -->
    <div class="box box-info">
      <div class="box-header">
      </div>
      <!-- /.box-header -->
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
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nomor SI</th>
              <th>Tgl Jatuh Tempo</th>
              <th>Tgl SI</th>
              <th>Total Tagihan</th>
              <th>Total Pembayaran</th>
              <th>Batas Cicilan</th>
              <th>Cicilan Ke</th>
              <th>Kode TTB</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $kd = $_SESSION['kd_pegawai'];
            $query = "SELECT a.*,b.* from salinan_invoice a, ttb b where a.kd_ttb=b.kd_ttb order by no_si desc";
            $tampil = mysql_query($query);
            $no = 1; // nomor baris
            while ($r = mysql_fetch_array($tampil)) {
            echo "
            <tr>
              <td>$no</td>
              <td>$r[no_si]</td>
              <td>$r[tgl_jatuh_tempo]</td>
              <td>$r[tgl_si]</td>
              <td>$r[total_tagihan]</td>
              <td>$r[total_pembayaran]</td>
              <td>$r[batas_cicilan]</td>
              <td>$r[cicilan_ke]</td>
              <td>$r[kd_ttb]</td>
            </tr>
            ";
            $no++;}
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /////////////////////////////////////// =============== /////////////////////////////////////// -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->