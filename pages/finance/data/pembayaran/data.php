<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Data Pembayaran
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
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Berhasil Melakukan Pembayaran!
            </div>
            <?php } else { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Hanya file PDF yang dapat digunakan.</h4>
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
              <th>Kode Pembayaran</th>
              <th>No. SI</th>
              <th>Jumlah Bayar</th>
              <th>File Transfer</th>
              <th>Penerima</th>
              <th>No. Rekening</th>
              <th>File Transfer</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $kd = $_SESSION['kd_pegawai'];
            $query = "SELECT a.*,b.* from pembayaran a, salinan_invoice b where a.no_si=b.no_si order by kd_pembayaran desc";
            $tampil = mysql_query($query);
            $no = 1; // nomor baris
            while ($r = mysql_fetch_array($tampil)) {
            echo "
            <tr>
              <td>$no</td>
              <td>$r[kd_pembayaran]</td>
              <td>$r[tgl_pembayaran]</td>
              <td>$r[no_si]</td>
              <td>$r[jumlah_pembayaran]</td>
              <td style='text-transform: capitalize'>$r[nm_penerima]</td>
              <td>$r[no_rek]</td> "?>
              <td> <a href="../../pembayaran/<?php echo $r['file_tf'];?>">Lihat</a></td> 
              <?php echo"
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