  <?php
  $kd = $_SESSION['kd_pegawai'];
  $sql = "select * from pegawai where kd_pegawai='$kd'";
  $query = mysql_query($sql);
  $r = mysql_fetch_array($query);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil
      </h1>
      <ol class="breadcrumb">
        <b><p style="font-size:15px; margin-top:-5px"><?php echo tglIndonesia(date('D, d F Y')); ?></p></b>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- ////////////////////////////////////////////// -->
        <!-- About Me Box -->
          <div class="box box-success">
            <div class="box-header with-border">
              <div class="row">
                <div class="col-md-10">
                    <?php if (isset($_GET['er'])){
                      switch($_GET['er']){
                        case '0' : ?>
                          <div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Gagal, kata sandi baru tidak sesuai</h4>
                          </div> <?php break;
                        case '1' : ?>
                          <div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Gagal, kata sandi yang dimasukkan salah</h4>
                          </div>   <?php break;
                        case 's' : ?>
                          <div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Berhasil mengubah kata sandi</h4>
                          </div>  <?php break;
                      }
                    }
                    ?>
                </div>
                <div class="col-md-2">
                  <button type="button" class="btn bg-navy" data-toggle="modal" data-target="#ubah">Ubah kata sandi</button>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <style type="text/css">
              
            </style>
            <div class="box-body">
              <strong><i class="glyphicon glyphicon-user margin-r-5"></i> Nama Lengkap</strong>
              <p class="text-muted">&emsp;&ensp;&nbsp;<?php echo $r['nm_pegawai']?></p>
              <hr>
              <strong><i class="glyphicon glyphicon-briefcase margin-r-5"></i> Bagian</strong>
              <p class="text-muted">&emsp;&ensp;&nbsp;<?php echo $r['bagian']?></p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>
              <p class="text-muted">&emsp;&ensp;&nbsp;<?php echo $r['alamat_pegawai']?></p>
              <hr>
              <strong><i class="glyphicon glyphicon-earphone margin-r-5"></i> Nomor Telepon</strong>
              <p class="text-muted">&emsp;&ensp;&nbsp;<?php echo $r['no_telp_pegawai']?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- ////////////////////////////////////////////// -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Modal Ubah-->
<div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Ubah kata sandi</h4>
            </div>
            <div class="modal-body">
                <!-- Ubah Data -->
                <form role="form" method="post" action="data/profil/proses.php">
                    <div class="form-group">
                        <label>Kata sandi lama</label>
                        <input class="form-control" type="password" name="lama" placeholder="Kata sandi lama" required="">
                    </div>
                    <div class="form-group">
                        <label>Kata sandi baru</label>
                        <input class="form-control" type="password" name="baru" placeholder="Kata sandi baru" required="">
                    </div>
                    <div class="form-group">
                        <label>Ulangi kata sandi baru</label>
                        <input class="form-control" type="password" name="baru1" placeholder="Kata sandi baru" required="">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
                    </div>
                </form>
                <!-- End Ubah Data -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal ubah-->
