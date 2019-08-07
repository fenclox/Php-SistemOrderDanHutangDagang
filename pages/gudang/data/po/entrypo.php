  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input PO
      </h1>
      <ol class="breadcrumb">
        <b><p style="font-size:15px; margin-top:-5px"><?php echo tglIndonesia(date('D, d F Y')); ?></p></b>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-success">
        <div class="box-header">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
              <!-- FORM ENTRY PO -->
              <div class="row">
              <div class="col-md-6">
              <form method="POST" action="data/po/proses.php">
                <div class="form-group">
                    <label>Kode Supplier</label>
                    <input required class="form-control required text-uppercase" data-placement="top" data-trigger="manual" type="text" readonly name="supplier" value='<?php 
                                $kd_supplier = $_GET['kd_supplier'];

                                $query = "SELECT * from supplier where kd_supplier = '$kd_supplier'";
                                $hasil = mysql_query($query);
                                $row = mysql_fetch_array($hasil);
                                echo $row['kd_supplier'];
                            ?>'>
                </div>
                <div class="form-group"><label>Kode PO</label><input required class="form-control required text-uppercase" data-placement="top" data-trigger="manual" type="text" name="po" readonly
                value="<?php
                    $ymd    =  date('ymd'); 
                    //menjadikan 6 digit pertama kode -> ymd (tahun,bulan,tanggal) dan mereset kode setelah ymd berganti
                    $query = "select MAX(RIGHT(kd_po,2)) as max_id from po where LEFT(kd_po, 6)='$ymd' ORDER BY kd_po"; 
                    $sql   = mysql_query($query);
                    $hasil = mysql_fetch_array($sql);
                    $maxid = 0;
                    $maxid = $hasil['max_id'];
                    $maxid++;
                    switch (strlen($maxid)) {
                      case 1 :
                          $idfix = "0" . $maxid;
                          break;
                      default :
                          $idfix = $maxid;
                          break;
                    };
                    $kd_po = $ymd.$idfix;
                    //$today nanti jadinya misal 20160526 .sprintf('%04s', $NoUrut) urutan id di tanggal hari ini
                echo $kd_po;
                ?>">
                </div>
                <div class="form-group">
                  <label>Barang</label>
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
                  <label>Jumlah Barang</label>
                  <input name="jumlah" type="text" maxlength="4" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Qty" data-trigger="manual" required="">
                </div>
                <input type="hidden" value="<?php echo $_SESSION['kd_pegawai']; ?>" name="pegawai">
                  <button name="tambah" type="submit" class="btn btn-primary">Tambah</button>
              </form>
              </div>
              </div>
              <!-- END FORM ENTRY PO -->
              <hr>
              <!-- DETIL PO -->
              <i class="fa fa-list fa-fw"></i> Detil PO<hr>
                <?php
                $record = mysql_query("SELECT detil_po.kd_barang as brgdetil, barang.kd_barang, nm_barang, jml_barang from po, detil_po, barang
                                       where po.kd_po=detil_po.kd_po and barang.kd_barang=detil_po.kd_barang and
                                       supplier.kd_supplier = '$_GET[kd_supplier]'
                                       GROUP BY barang.kd_barang ORDER by barang.nm_barang desc");
                if(!empty($_GET['kd_po'])){
                echo'<table class="table table-striped table-bordered table-hover" id="example1">';
                    echo '<thead>';
                        echo '<tr>';
                            echo '<th>Kode barang</th>';
                            echo '<th>Nama barang</th>';
                            echo '<th>Jumlah barang</th>';
                            echo '<th>Hapus</th>';
                        echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while ($row = mysql_fetch_array($record)) {
                        if($row['jumlah_barang']>'0'){
                            echo "<tr'>";                 
                                echo "<td style=' width:150px;  text-align:left; padding: 10px;vertical-align: middle;' class='text-uppercase'>";echo $row['kd_barang'];echo"</td>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['nm_barang'];"</td>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['jumlah_barang'];"</td>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'><a class='btn btn-danger' aria-label='Delete' href='prosesdelete/podetil.php?brgdetil=$row[brgdetil]'></span>Hapus</a></td>";
                            echo '</tr>';
                        }
                    }
                    echo '</tbody>';
                echo '</table>';
                echo "<a class='btn btn-success' href='index.php?hal=po'>Selesai</a>";
                }
                ?>
              <!-- END DETIL PO -->

          </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>