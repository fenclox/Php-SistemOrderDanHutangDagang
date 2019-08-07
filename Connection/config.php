<?php
$host = "localhost"; // server
$user = "root"; // nama user (default)
$pass = ""; // password kosong / null (default)
$db   = "db_hutang_dagang"; // database yang digunakan

mysql_connect($host,$user,$pass) or die (mysql_error()); // konek ke 3 variabel, or die menjalankan 1 perintah setelahnya dan mengabaikkan perintah2 selanjutnya
mysql_select_db($db) or die (mysql_error()); // memilih database
?>
