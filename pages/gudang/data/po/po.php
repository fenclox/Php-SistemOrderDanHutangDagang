<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Data PO
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
      <h5>* Data yang ditampilkan hanya data yang sudah disetujui bagian Purchasing</h5>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Kode PO</th>
              <th>Supplier</th>
              <th>Tanggal PO</th>
              <th><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $record = mysql_query("SELECT * from po, supplier where po.kd_supplier = supplier.kd_supplier and po.status_po= '1' ORDER BY tgl_po desc");
            while ($r = mysql_fetch_array($record)) {
            echo "
            <tr>
              <td>$r[kd_po]</td>
              <td style='text-transform: capitalize'>$r[nm_supplier]</td>
              <td>$r[tgl_po]</td>
              <td width='15%'>
                <button title='Lihat Detil' id='detilpo' class='btn btn-warning' data-toggle='modal' href='#' data-target='#detilpoModal".$r['kd_po']."'><i class='fa fa-eye'></i></button>&nbsp;
                <a title='Buat TTB' class='btn btn-success' href='index.php?hal=ettb&&kd_po=$r[kd_po]'><i class='fa fa-plus'></i></a></td>
            </tr>
            ";
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /////////////////////////////////////// =============== /////////////////////////////////////// -->
    <!-- /////////////////////////////////////// Box 2 /////////////////////////////////////// -->
    <div class="box box-success">
      <div class="box-header">
      <h5>* Data yang ditampilkan hanya data yang sudah dibuat TTB</h5>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      <table id="example2" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Kode PO</th>
              <th>Supplier</th>
              <th>Tanggal PO</th>
              <th><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $record = mysql_query("SELECT * from po, supplier where po.kd_supplier = supplier.kd_supplier and po.status_po= '3' ORDER BY tgl_po desc");
            while ($r = mysql_fetch_array($record)) {
            echo "
            <tr>
              <td>$r[kd_po]</td>
              <td style='text-transform: capitalize'>$r[nm_supplier]</td>
              <td>$r[tgl_po]</td>
              <td width='15%'>
                <button title='Lihat Detil' id='detilpo' class='btn btn-warning' data-toggle='modal' href='#' data-target='#detilpoModal".$r['kd_po']."'><i class='fa fa-eye'></i></button>
              </td>
            </tr>
            ";
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /////////////////////////////////////// =============== /////////////////////////////////////// -->
    <!-- /////////////////////////////////////// Box 3 /////////////////////////////////////// -->
    <div class="box box-danger">
      <div class="box-header">
      <h5>* Data yang ditampilkan hanya data yang ditolak bagian Purchasing</h5>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      <table id="example3" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Kode PO</th>
              <th>Supplier</th>
              <th>Tanggal PO</th>
              <th><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $record = mysql_query("SELECT * from po, supplier where po.kd_supplier = supplier.kd_supplier and po.status_po= '2' ORDER BY tgl_po desc");
            while ($r = mysql_fetch_array($record)) {
            echo "
            <tr>
              <td>$r[kd_po]</td>
              <td style='text-transform: capitalize'>$r[nm_supplier]</td>
              <td>$r[tgl_po]</td>
              <td width='15%'>
                <button title='Lihat Detil' id='detilpo' class='btn btn-warning' data-toggle='modal' href='#' data-target='#detilpoModal".$r['kd_po']."'><i class='fa fa-eye'></i></button>
              </td>
            </tr>
            ";
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
<?php
  include 'data/po/detil.php';
?>