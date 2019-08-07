        <?php
          include('../../../../Connection/config.php'); 
          
          $query = "select kd_po, tgl_po, nm_supplier as suppliers from po, supplier where po.kd_supplier = supplier.kd_supplier";
          $record = mysql_query($query);
          
          while ($row = mysql_fetch_array($record)) { 
        ?>
 
        <div <?php echo 'id="detilpoModal'.$row['kd_po'].'"' ?> class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Detil PO</h3>
              </div>
              <div class="modal-body">
                <form method="POST" action="update/statuspo.php">
                  <div class="form-group"><label>Kode PO</label><input required class="form-control required text-uppercase" data-placement="top" data-trigger="manual" type="text" name="po" maxlength="8" readonly value="<?php echo $row['kd_po']; ?>"></div>
                  <div class="form-group"><label>Tanggal PO</label><input required class="form-control required text-capitalize" data-placement="top" data-trigger="manual" type="text" name="tglpo" value="<?php echo $row['tgl_po']; ?>" readonly></div>
                  <div class="form-group"><label>Supplier</label><input required class="form-control required text-capitalize" data-placement="top" data-trigger="manual" type="text" name="tglpo" value="<?php echo $row['suppliers']; ?>" readonly></div>

              <!-- table detil -->
                <?php
                  
                  $query2 = mysql_query("SELECT detil_po.kd_barang as brgdetil, barang.kd_barang, nm_barang, jumlah_barang from po, detil_po, barang
                                         where po.kd_po=detil_po.kd_po and barang.kd_barang=detil_po.kd_barang and detil_po.kd_po = '".$row['kd_po']."'
                                         ORDER by barang.nm_barang asc");
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
                          if($row['jumlah_barang']>'0'){
                              echo "<tr'>";                 
                                  echo "<td style=' width:150px;  text-align:left; padding: 10px;vertical-align: middle;' class='text-uppercase'>";echo $row['kd_barang'];echo"</td>";
                                  echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['nm_barang'];"</td>";
                                  echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['jumlah_barang'];"</td>";
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