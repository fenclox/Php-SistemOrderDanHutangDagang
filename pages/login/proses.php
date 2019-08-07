<?php
session_start();
require_once("../../Connection/config.php");
$kd     = $_POST['kd_pegawai'];
$pass   = $_POST['password'];
$level  = $_POST['level'];

$query = mysql_query("SELECT * FROM pegawai WHERE kd_pegawai='$kd' AND password='$pass'"); // Membandingkan kode & password
    if(mysql_num_rows($query) == 0){
      ?>
      <script type="text/javascript">
          alert("Login Gagal");
          document.location="index.php";
      </script>
      <?php
    } else{
      $row = mysql_fetch_array($query);

      if ($row['level'] == 0 && $level == 0){ // Membandingkan level
        //Mengambil session pegawai super
        $_SESSION['kd_pegawai']=$kd;
        $_SESSION['level']='Admin';
        header("Location:../admin/index.php"); // Mengalihkan file setelah berhasil login
      } else if ($row['level'] == 1 && $level == 1){
        //Mengambil session pegawai
        $_SESSION['kd_pegawai']=$kd;
        $_SESSION['level']='Purchasing';
        header("Location:../purchasing/index.php");
      } else if ($row['level'] == 2 && $level == 2){
        //Mengambil session pegawai
        $_SESSION['kd_pegawai']=$kd;
        $_SESSION['level']='Gudang';
        header("Location:../gudang/index.php");
      } else if ($row['level'] == 3 && $level == 3){
        //Mengambil session pegawai
        $_SESSION['kd_pegawai']=$kd;
        $_SESSION['level']='Finance';
        header("Location:../finance/index.php");
      } else if ($row['level'] == 4 && $level == 4){
        //Mengambil session pegawai
        $_SESSION['kd_pegawai']=$kd;
        $_SESSION['level']='Direktur';
        header("Location:../direktur/index.php");
      } else {
        ?>
        <script type="text/javascript">
            alert("Login Gagal");
            document.location="index.php";
        </script>
        <?php
      }
    }
?>
