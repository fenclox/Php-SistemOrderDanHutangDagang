<?php
  session_start();
  //Mendapatkan Session
  ob_start();
  include('../../../../../connection/config.php');
  $tahun = $_POST['tahun'];
  $bulan = $_POST['bulan'];

  $kd  = $_SESSION['kd_pegawai'];
  //Report
  require ("../../../../../html2pdf/html2pdf.class.php");
  $content = ob_get_clean();
  $content.= "<img src='../../../../../images/headmodernpack.jpg' style='width:100%'>
        <hr width='100%'>
        <h3  align='center'>Laporan Pembelian</h3>
        <hr>
        <h4  align='center'>Bulan ke: $bulan &nbsp;&nbsp;&nbsp;&nbsp; Tahun: $tahun</h4>
        <p align='center'>
        <table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5>
          <tr bgcolor='#CCCCCC'>
            <th style='width: 20px;'>No</th>
            <th style='width: 150px;'>Kode TTB</th>
            <th style='width: 150px;'>Tgl. Terima</th>
            <th style='width: 270px;'>Nama Barang</th>
            <th style='width: 150px;'>Jml. Terima</th>
          </tr>";
          // Menampilkan data
          $sql="SELECT a.*,b.*,c.tgl_ttb from barang a, detil_ttb b, ttb c
                  where a.kd_barang=b.kd_barang  and YEAR(tgl_ttb)=$tahun and MONTH(tgl_ttb)=$bulan
                  group by kd_ttb order by kd_ttb asc";

          $hasil=mysql_query($sql);
          $no=1;
          while($r=mysql_fetch_array($hasil))
            {
              $content.="<tr bgcolor='#FFFFFF'>
                <td>$no</td>
                <td>$r[kd_ttb]</td>
                <td>$r[tgl_ttb]</td>
                <td style='width: 270px; text-transform:capitalize;'>$r[nm_barang]</td>
                <td>$r[jumlah_terima]</td>
              </tr>";
              $no++;
            }
          $content.="</table></p><br><br>";

  $filename="Pembayaran-".$bulan."-".$tahun.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya

  ob_end_clean();
  // conversion HTML => PDF
  try
  {
    $html2pdf = new HTML2PDF('P', 'A4','en', false, 'ISO-8859-15');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->pdf->IncludeJS('print(TRUE)');
    $html2pdf->Output($filename);
  }
  catch(HTML2PDF_exception $e) { echo $e; }
?>

