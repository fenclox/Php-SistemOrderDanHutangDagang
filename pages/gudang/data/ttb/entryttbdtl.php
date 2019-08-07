  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input TTB
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
              <!-- FORM ENTRY TTB -->
              <div class="row">
              <div class="col-md-6">
              <form method="POST" action="data/ttb/proses.php">
                <div class="form-group">
                    <label>Kode PO</label>
                    <input required class="form-control required text-uppercase" data-placement="top" data-trigger="manual" type="text" readonly name="kdpo" value='<?php 
                                $kdpo = $_GET['kd_po'];

                                $query = "SELECT * from po where kd_po = '$kdpo'";
                                $hasil = mysql_query($query);
                                $row = mysql_fetch_array($hasil);
                                echo $row['kd_po'];
                            ?>'>
                </div>
                <div class="form-group"><label>Kode TTB</label><input required class="form-control required text-uppercase" data-placement="top" data-trigger="manual" type="text" name="kdttb" readonly value='<?php
                    $kdttb = $_GET['kd_ttb'];
                    echo $kdttb;
                ?>'>
                </div>
                <div class="form-group">
                  <label>Barang</label>
                  <select class="form-control select2" style="width: 100%;" name="kdbarang" required="">
                    <?php
                    $query = mysql_query("select * from barang ORDER by kd_barang asc");
                    while ($row = mysql_fetch_array($query)){
                    echo "<option value=$row[kd_barang]>$row[kd_barang] - $row[nm_barang]</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group"><label>Jumlah Terima</label><input required class="form-control required text-capitalize" placeholder="Qty" data-placement="top" data-trigger="manual" type="number" name="jmlterima"></div>
                <button name="tambah" type="submit" class="btn btn-primary">Tambah</button>
              </form>
              </div>
              </div>
              <!-- END FORM ENTRY TTB -->
              <hr>
              <!-- DETIL TTB -->
              <i class="fa fa-list fa-fw"></i> Detil TTB<hr>
                <?php
                $record = mysql_query("SELECT detil_ttb.kd_barang as brgdetil, barang.kd_barang, nm_barang, jumlah_terima from ttb, detil_ttb, barang, po
                                       where ttb.kd_ttb=detil_ttb.kd_ttb and barang.kd_barang=detil_ttb.kd_barang and ttb.kd_ttb = '$_GET[kd_ttb]' and po.kd_po = '$_GET[kd_po]'
                                       ORDER by barang.nm_barang desc");
                if(!empty($_GET['kd_ttb'])){
                echo'<table class="table table-striped table-bordered table-hover" id="example1">';
                    echo '<thead>';
                        echo '<tr>';
                            echo '<th>Kode barang</th>';
                            echo '<th>Nama barang</th>';
                            echo '<th>Jumlah barang</th>';
                            echo '<th>Aksi</th>';
                        echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while ($row = mysql_fetch_array($record)) {
                        if($row['jumlah_terima']>'0'){
                            echo "<tr'>";                 
                                echo "<td style=' width:150px;  text-align:left; padding: 10px;vertical-align: middle;' class='text-uppercase'>";echo $row['kd_barang'];echo"</td>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['nm_barang'];"</td>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['jumlah_terima'];"</td>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'><a class='btn btn-danger' aria-label='Delete' href='prosesdelete/ttbdetil.php?brgdetil=$row[brgdetil]'></span>Hapus</a></td>";
                            echo '</tr>';
                        }
                    }
                    echo '</tbody>';
                echo '</table>';
                echo "<a class='btn btn-success' href='index.php?hal=ttb'>Selesai</a>";
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