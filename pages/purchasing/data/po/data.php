<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Data Permintaan Barang - PO
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
        <h5>* Data yang ditampilkan hanya data yang belum disetujui</h5>
      </div>
      <!-- /.box-header -->
      <div class="box-body"><div class="row">
                <div class="col-md-8"> <?php
                if (isset($_GET['stj'])) {
                  if($_GET['stj']=="success") { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Berhasil Menyetujui Permintaan!
                    </div> <?php 
                  }
                }
                else if (isset($_GET['tlk'])) {
                  if($_GET['tlk']=="success") { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Berhasil Menolak Permintaan!
                    </div> <?php 
                  }
                } ?>
                </div>
              </div>              
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Kode PO</th>
              <th>Supplier</th>
              <th>Tanggal PO</th>
              <th><span class="glyphicon glyphicon-cog"></span></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no=1;
            $record = mysql_query("SELECT * from po, supplier where po.kd_supplier = supplier.kd_supplier and po.status_po='0' ORDER BY tgl_po desc");
            while ($r = mysql_fetch_array($record)) {
            echo "
            <tr>
              <td>$no</td>
              <td>$r[kd_po]</td>
              <td style='text-transform: capitalize'>$r[nm_supplier]</td>
              <td>$r[tgl_po]</td>
              <td width='10%'><button title='Setujui Permintaan' id='setujuipo' class='btn btn-warning' data-toggle='modal' href='#' data-target='#setujuipoModal".$r['kd_po']."'><i class='fa fa-eye'></i></button></td>
            </tr>
            ";
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
<!-- Modal -->
<?php
$query = "select kd_po, tgl_po, nm_pegawai as pegawais from po, pegawai where po.kd_pegawai = pegawai.kd_pegawai";
$record = mysql_query($query);
while ($row = mysql_fetch_array($record)) {
?>
<div <?php echo 'id="setujuipoModal'.$row['kd_po'].'"' ?> class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Detil PO</h3>
      </div>
      <div class="modal-body">
        <form method="POST" action="data/po/proses.php">
          <div class="form-group"><label>Kode PO</label><input required class="form-control required text-uppercase" data-placement="top" data-trigger="manual" type="text" name="po" maxlength="8" readonly value="<?php echo $row['kd_po']; ?>"></div>
          <div class="form-group"><label>Tanggal PO</label><input required class="form-control required text-capitalize" data-placement="top" data-trigger="manual" type="text" name="tglpo" value="<?php echo $row['tgl_po']; ?>" readonly></div>
          <div class="form-group"><label>Pegawai</label><input required class="form-control required text-capitalize" data-placement="top" data-trigger="manual" type="text" name="tglpo" value="<?php echo $row['pegawais']; ?>" readonly></div>
          <!-- table detil -->
          <?php
          $query2 = mysql_query("SELECT detil_po.kd_barang as brgdetil, barang.kd_barang, nm_barang, jumlah_barang from po, detil_po, barang
          where po.kd_po=detil_po.kd_po and barang.kd_barang=detil_po.kd_barang and detil_po.kd_po = '".$row['kd_po']."'
          ORDER by barang.nm_barang desc");
          ?>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Kode barang</th>
                <th>Nama barang</th>
                <th>Jumlah barang</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $no=1;
              while ($row = mysql_fetch_array($query2)) {
              if($row['jumlah_barang']>'0'){ ?>
              <tr>
                <td><?php echo $no?></td>
                <td><?php echo $row['kd_barang'];?></td>
                <td style="text-transform: capitalize;"><?php echo $row['nm_barang'];?></td>
                <td><?php echo $row['jumlah_barang'];?></td>
              </tr>
              <?php
              }
              $no++;
              }
              ?>
            </tbody>
          </table>
          <!-- end table detil -->
          
          <div class="form-group">
            <button type="submit" name="setuju" class="btn btn-success pull-center">Setujui</button>&emsp;
            <button type="submit" name="tolak" class="btn btn-danger pull-center">Tolak</button> 
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
}
?>
<!-- ./ update obat modal -->