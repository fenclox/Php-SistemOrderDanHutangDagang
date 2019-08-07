  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Supplier
      </h1>
      <ol class="breadcrumb">
        <b><p style="font-size:15px; margin-top:-5px"><?php echo tglIndonesia(date('D, d F Y')); ?></p></b>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title"><button type="button" class="btn btn-primary" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#tambah"><i class="glyphicon glyphicon-plus"></i></button></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <?php
                if (isset($_GET['tmb'])) {
                  if($_GET['tmb']=="success") {
                    ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Berhasil Menambahkan Data!
                    </div>
                  <?php } else { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Gagal Menambahkan Data!</h4>
                    </div>
                  <?php }
                } else if (isset($_GET['ubh'])) {
                  if($_GET['ubh']=="success") {
                    ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Berhasil Mengubah Data!</h4>
                    </div>
                  <?php } else { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Gagal Mengubah Data!</h4>
                    </div>
                  <?php }
                } else if (isset($_GET['hps'])) {
                  if($_GET['hps']=="success") {
                    ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Berhasil Menghapus Data!</h4>
                    </div>
                  <?php } else { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Gagal Menghapus Data!</h4>
                    </div>
                  <?php }
                }
              ?>
            </div>
          </div>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Kode Supplier</th>
                <th>Nama Supplier</th>
                <th>NPWP</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Email</th>
                <th><span class="glyphicon glyphicon-cog"></span></th>
              </tr>
            </thead>
            <tbody>
              <!-- Data supplier -->
              <?php
              $query="SELECT * from supplier order by kd_supplier asc";
              $tampil = mysql_query($query);
              $no = 1; // nomor baris
              while ($r = mysql_fetch_array($tampil)) {
                echo "
                    <tr>
                        <td>$no</td>
                        <td>$r[kd_supplier]</td>
                        <td style='text-transform: capitalize;'>$r[nm_supplier]</td>
                        <td>$r[npwp]</td>
                        <td>$r[alamat_supplier]</td>
                        <td>$r[no_telp_supplier]</td>
                        <td>$r[email_supplier]</td>
                        <td> "; ?>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning" value='<?php echo $r['kd_supplier'];?>' onclick="ubahdata(this.value)" data-toggle="modal" data-target="#ubah"><i class="glyphicon glyphicon-pencil"></i></button>&nbsp;
                        <button type="button" class="btn btn-danger" value='<?php echo $r['kd_supplier'];?>' onclick="hapusdata(this.value)" data-toggle="modal" data-target="#hapus"><i class="glyphicon glyphicon-trash"></i></button>&nbsp;
                        <a title='Buat PO' class='btn btn-success' href='index.php?hal=epo&&kd_supplier=<?php echo $r['kd_supplier'];?>' ><i class='glyphicon glyphicon-plus'></i></a>
                        </td>
                    </tr>
                  <?php
                  $no++;}
              ?>
              <!-- End Data Cabang -->
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
          <h4 class="modal-title">Tambah Supplier</h4>
        </div>
        <div class="modal-body">
          <!-- general form elements -->
            <!-- form start -->
            <form role="form" method="POST" action="data/supplier/proses.php">
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Supplier</label>
                  <input name="nama" type="text" class="form-control" placeholder="Masukkan Nama Supplier" maxlength="30" required="" style='text-transform: capitalize;' onkeypress="return isAlphabetKey(event)">
                </div>
                <div class="form-group">
                  <label>NPWP</label>
                  <input name="npwp" type="text" class="form-control" placeholder="Masukkan NPWP" onkeypress="return isNumberKey(event)" maxlength="50" required="">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat" required=""></textarea>
                </div>
                <div class="form-group">
                  <label>Nomor Telepon</label>
                  <input name="telp" type="text" class="form-control" placeholder="Masukkan Nomor Telepon" onkeypress="return isNumberKey(event)" maxlength="13" required="">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input name="email" type="email" class="form-control" placeholder="Masukkan Email" required="" maxlength="30">
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
          <h4 class="modal-title">Ubah supplier</h4>
        </div>
        <div class="modal-body">
          <!-- general form elements -->
            <!-- form start -->
            <form role="form" method="POST" action="data/supplier/proses.php">
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
          <h4 class="modal-title">Hapus supplier</h4>
        </div>
        <div class="modal-body">
          <!-- general form elements -->
            <!-- form start -->
            <form role="form" method="POST" action="data/supplier/proses.php">
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
  function ubahdata(kd_supplier){
      var ajaxbos = new XMLHttpRequest();
          ajaxbos.onreadystatechange= function(){
              if(ajaxbos.readyState==4 && ajaxbos.status==200){
                  document.getElementById("dub").innerHTML= ajaxbos.responseText;
              }
          };
          ajaxbos.open("GET","data/supplier/ubah.php?q="+kd_supplier+"&s=#",true);
          ajaxbos.send();
      }
  function hapusdata(kd_supplier){
      document.getElementById('kd').value=kd_supplier;
  }
</script>
