<?php
include('../../../../Connection/config.php');
// Setuju
if(isset($_POST['setuju'])) {
  $po = $_POST['po'];

  $sql = mysql_query("UPDATE po SET status_po = '1' where kd_po ='$po'");

  header("Location: ../../index.php?hal=dtpo&stj=success");
}
// Setuju
else if(isset($_POST['tolak'])) {
  $po = $_POST['po'];
  // query mengubah staus
  $sql = mysql_query("UPDATE po SET status_po = '2' where kd_po ='$po'");

  header("Location: ../../index.php?hal=dtpo&tlk=success");
}
?>