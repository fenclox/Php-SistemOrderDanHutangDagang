  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Barang
      </h1>
      <ol class="breadcrumb">
        <b><p style="font-size:15px; margin-top:-5px"><?php echo tglIndonesia(date('D, d F Y')); ?></p></b>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title"><button type="button" class="btn btn-primary" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#tambah"><i class="glyphicon glyphicon-plus"></i></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th><span class="glyphicon glyphicon-cog"></span></th>
              </tr>
            </thead>
            <tbody>
              <!-- Data barang -->
              <?php
              $query="SELECT * from barang order by kd_barang asc";
              $tampil = mysql_query($query);
              $no = 1; // nomor baris
              while ($r = mysql_fetch_array($tampil)) {
                echo "
                    <tr>
                        <td>$no</td>
                        <td>$r[kd_barang]</td>
                        <td style='text-transform: capitalize;'>$r[nm_barang]</td>
                        <td>$r[harga]</td>
                        <td>$r[stok]</td>
                        <td> "; ?>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning" value='<?php echo $r['kd_barang'];?>' onclick="ubahdata(this.value)" data-toggle="modal" data-target="#ubah"><i class="glyphicon glyphicon-pencil"></i></button>&nbsp;
                        <button type="button" class="btn btn-danger" value='<?php echo $r['kd_barang'];?>' onclick="hapusdata(this.value)" data-toggle="modal" data-target="#hapus"><i class="glyphicon glyphicon-trash"></i></button>
                        </td>
                    </tr>
                  <?php
                  $no++;}
              ?>
              <!-- End Data Barang -->
            </table>
          </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!--**************************************** Modals ****************************************-->
  <!--****************** Tambah ******************-->
  <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Barang</h4>
        </div>
        <div class="modal-body">
          <!-- general form elements -->
            <!-- form start -->
            <form role="form" method="POST" action="data/barang/proses.php">
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input name="nama" type="text" class="form-control" placeholder="Masukkan Nama Barang" maxlength="30" onkeypress="return isAlphabetKey(event)" required="" style='text-transform: capitalize;'>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input name="harga" type="text" class="form-control" placeholder="Masukkan Harga" onkeypress="return isNumberKey(event)" maxlength="9" required="">
                </div>
                <div class="form-group">
                  <label>Stok</label>
                  <input name="stok" type="text" class="form-control" placeholder="Masukkan Stok" onkeypress="return isNumberKey(event)" maxlength="4" required="">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button name="tambah" type="submit" class="btn btn-success">Tambah</button>
              </div>
            </form>
          <!-- /.box -->
        </div>
      </div>
    </div>
  </div>
  <!--****************** Ubah ******************-->
  <div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Ubah Barang</h4>
        </div>
        <div class="modal-body">
          <!-- general form elements -->
            <!-- form start -->
            <form role="form" method="POST" action="data/barang/proses.php">
              <div class="box-body">
                <!-- Ubah Data -->
                <span id="dub"></span>
                <!-- End Ubah Data -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button name="ubah" type="submit" class="btn btn-success">Ubah</button>
              </div>
            </form>
          <!-- /.box -->
        </div>
      </div>
    </div>
  </div>
  <!--****************** Hapus ******************-->
  <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Hapus Barang</h4>
        </div>
        <div class="modal-body">
          <!-- general form elements -->
            <!-- form start -->
            <form role="form" method="POST" action="data/barang/proses.php">
              <div class="box-body">
                Yakin ingin menghapus data?
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="hidden" id="kd" name="kode" value="">
                <button name="hapus" type="submit" class="btn btn-success">Hapus</button>
              </div>
            </form>
          <!-- /.box -->
        </div>
      </div>
    </div>
  </div>
  <!--**************************************** /Modals ****************************************-->
  <!-- Ubah & hapus data -->
  <script>
  function ubahdata(kd_barang){
      var ajaxbos = new XMLHttpRequest();
          ajaxbos.onreadystatechange= function(){
              if(ajaxbos.readyState==4 && ajaxbos.status==200){
                  document.getElementById("dub").innerHTML= ajaxbos.responseText;
              }
          };
          ajaxbos.open("GET","data/barang/ubah.php?q="+kd_barang+"&s=#",true);
          ajaxbos.send();
      }
  function hapusdata(kd_barang){
      document.getElementById('kd').value=kd_barang;
  }
</script>
