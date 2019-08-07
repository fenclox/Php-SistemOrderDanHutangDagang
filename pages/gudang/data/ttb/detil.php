        <?php
          include('../../../../Connection/config.php'); 
          
          $query = "select kd_ttb, tgl_ttb, nm_supplier as suppliers from ttb, supplier, po where ttb.kd_po = po.kd_po and po.kd_supplier = supplier.kd_supplier";
          $record = mysql_query($query);
          
          while ($row = mysql_fetch_array($record)) { 
        ?>
 
        <div <?php echo 'id="detilttbModal'.$row['kd_ttb'].'"' ?> class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Detil TTB</h3>
              </div>
              <div class="modal-body">
                <form method="POST" action="">
                  <div class="form-group"><label>Kode TTB</label><input required class="form-control required text-uppercase" data-placement="top" data-trigger="manual" type="text" name="po" maxlength="8" readonly value="<?php echo $row['kd_ttb']; ?>"></div>
                  <div class="form-group"><label>Tanggal TTB</label><input required class="form-control required text-capitalize" data-placement="top" data-trigger="manual" type="text" name="tglpo" value="<?php echo $row['tgl_ttb']; ?>" readonly></div>
                  <div class="form-group"><label>Supplier</label><input required class="form-control required text-capitalize" data-placement="top" data-trigger="manual" type="text" name="tglpo" value="<?php echo $row['suppliers']; ?>" readonly></div>

              <!-- table detil -->
                <?php
                  
                  $query2 = mysql_query("SELECT detil_ttb.kd_barang as brgdetil, barang.kd_barang, nm_barang, jumlah_terima from ttb, detil_ttb, barang
                                         where ttb.kd_ttb=detil_ttb.kd_ttb and barang.kd_barang=detil_ttb.kd_barang and detil_ttb.kd_ttb = '".$row['kd_ttb']."'
                                         ORDER by barang.nm_barang desc");
                  echo'<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
                      echo '<thead>';
                          echo '<tr>';
                              echo '<th>Kode barang</th>';
                              echo '<th>Nama barang</th>';
                              echo '<th>Jumlah barang</th>';
                          echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';
                      while ($row = mysql_fetch_array($query2)) {
                          if($row['jumlah_terima']>'0'){
                              echo "<tr'>";                 
                                  echo "<td style=' width:150px;  text-align:left; padding: 10px;vertical-align: middle;' class='text-uppercase'>";echo $row['kd_barang'];echo"</td>";
                                  echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['nm_barang'];"</td>";
                                  echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['jumlah_terima'];"</td>";
                              echo '</tr>';
                          }
                      }
                      echo '</tbody>';
                  echo '</table>';
                ?>
                <!-- end table detil -->
                </form>
              </div>
            </div>
          </div>
        </div>

        <?php
          }
        ?>
        <!-- ./ update obat modal -->