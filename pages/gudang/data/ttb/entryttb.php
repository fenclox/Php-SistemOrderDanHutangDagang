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
                                $po = $_GET['kd_po'];

                                $query = "SELECT * from po where kd_po = '$po'";
                                $hasil = mysql_query($query);
                                $row = mysql_fetch_array($hasil);
                                echo $row['kd_po'];
                            ?>'>
                </div>
                <div class="form-group"><label>Kode TTB</label><input required class="form-control required text-uppercase" data-placement="top" data-trigger="manual" type="text" name="kdttb" readonly value="<?php
                  $dmy    =  date('dmy'); 
                  //menjadikan 6 digit pertama kode -> dmy (tanggal, bulan, tahun) dan mereset kode setelah dmy berganti
                  $query = "select MAX(RIGHT(kd_ttb,2)) as max_id from ttb where LEFT(kd_ttb, 6)='$dmy' ORDER BY kd_ttb"; 
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
                  $kd   = $dmy.$idfix;
                echo $kd;
                ?>">
                </div>
                <div class="form-group">
                  <label>Nomor Surat Jalan</label>
                  <input name="nosj" type="text" maxlength="10" onkeypress="return isNumberKey(event);" class="form-control" placeholder="Masukkan Nomor Surat Jalan" required="">
                </div>
                <div class="form-group">
                  <label>Nomor Kendaraan</label>
                  <div class="row">
                    <div class="col-md-2">
                      <input name="front" type="text" maxlength="2" id="Uppercase" onkeypress="return isAlphabetKey(event);" class="form-control" placeholder="..." required="">
                    </div>
                    <div class="col-md-4">
                      <input name="mid" type="text" maxlength="4" onkeypress="return isNumberKey(event);" class="form-control" placeholder="..." required="">
                    </div>
                    <div class="col-md-2">
                      <input name="back" type="text" maxlength="3" id="Uppercase2" onkeypress="return isAlphabetKey(event);" class="form-control" placeholder="..." required="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Nama Supir</label>
                  <input name="nama" type="text" maxlength="50" onkeypress="return isAlphabetKey(event);" class="form-control" placeholder="Masukkan Nama Supir" required="" style="text-transform: capitalize;">
                </div>
                <input name="kdp" type="hidden" class="form-control" value="<?php echo $_SESSION['kd_pegawai']?>">
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
                <div class="form-group">
                  <label>Jumlah Terima</label><input required class="form-control required text-capitalize" placeholder="Qty" data-placement="top" data-trigger="manual" type="number" name="jmlterima">
                </div>
                <button name="tambah" type="submit" class="btn btn-primary">Tambah</button>
              </form>
              </div>
              </div>
              <!-- END FORM ENTRY PO -->
              <hr>
              <!-- DETIL PO -->
              <i class="fa fa-list fa-fw"></i> Detil TTB<hr>
                <?php
                $record = mysql_query("SELECT detil_ttb.kd_barang as brgdetil, barang.kd_barang, nm_barang, jumlah_terima from ttb, detil_ttb, barang, po
                                       where ttb.kd_ttb=detil_ttb.kd_ttb and barang.kd_barang=detil_ttb.kd_barang and po.kd_po = '$_GET[kd_po]'
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