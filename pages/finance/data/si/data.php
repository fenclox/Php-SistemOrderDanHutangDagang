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
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nomor SI</th>
              <th>Tgl SI</th>
              <th>Tgl Jatuh Tempo</th>
              <th>Total Tagihan</th>
              <th>Total Pembayaran</th>
              <th>Batas Cicilan</th>
              <th>Cicilan Ke</th>
              <th>Kode TTB</th>
              <th><span class="glyphicon glyphicon-cog"></span></th>
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
              <td>$r[tgl_si]</td>
              <td>$r[tgl_jatuh_tempo]</td>
              <td>$r[total_tagihan]</td>
              <td>$r[total_pembayaran]</td>
              <td>$r[batas_cicilan]</td>
              <td>$r[cicilan_ke]</td>
              <td>$r[kd_ttb]</td>
              <td><a title='Lakukan Pembayaran' class='btn btn-success' href='index.php?hal=ebyr&&no_si=$r[no_si]'><i class='glyphicon glyphicon-btc'></i></a></td>
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