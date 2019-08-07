<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Data TTB
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
              <th>Kode TTB</th>
              <th>Kode Barang</th>
              <th>Jumlah Terima</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $query="select barang.kd_barang, barang.nm_barang, detil_ttb.kd_ttb, jumlah_terima
                      from barang inner join detil_ttb
                      on detil_ttb.kd_barang=barang.kd_barang
                      where detil_ttb.kd_ttb=kd_ttb ";
              $tampil = mysql_query($query);
              $no = 1; // nomor baris
              while ($r = mysql_fetch_array($tampil)) {
                echo "
                    <tr>
                        <td>$no</td>
                        <td>$r[kd_ttb]</td>
                        <td>$r[nm_barang]</td>
                        <td>$r[jumlah_terima]</td>
                    </tr>";
                  $no++;
                }
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