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
              <th>Kode TTB</th>
              <th>Supplier</th>
              <th>Tanggal TTB</th>
              <th><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $record = mysql_query("SELECT * from ttb, po, supplier where ttb.kd_po = po.kd_po and po.kd_supplier = supplier.kd_supplier and status_ttb='0' ORDER BY tgl_ttb desc");
            while ($r = mysql_fetch_array($record)) {
            echo "
            <tr>
              <td>$r[kd_ttb]</td>
              <td style='text-transform: capitalize'>$r[nm_supplier]</td>
              <td>$r[tgl_ttb]</td>
              <td width='15%'>
                <button title='Lihat Detil' id='detilttb' class='btn btn-warning' data-toggle='modal' href='#' data-target='#detilttbModal".$r['kd_ttb']."'><i class='fa fa-eye'></i></button>&nbsp;
                <a title='Buat Salinan Invoice' class='btn btn-success' href='index.php?hal=esi&&kd_ttb=$r[kd_ttb]'><i class='glyphicon glyphicon-arrow-right'></i></a></td>
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
  include 'data/ttb/detil.php';
?>