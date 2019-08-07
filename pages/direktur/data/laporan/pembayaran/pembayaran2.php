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
  $content.= "<img src='../../../../../images/headmodernpack.jpg' >
        <hr width='100%'>
        <h3  align='center'>Laporan Pembayaran</h3>
        <hr>
        <h4  align='center'>Bulan ke: $bulan &nbsp;&nbsp;&nbsp;&nbsp; Tahun: $tahun</h4>
        <p align='center'>
        <table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5>
          <tr bgcolor='#CCCCCC'>
            <th style='width: 20px;'>No</th>
            <th style='width: 120px;'>Kode</th>
            <th style='width: 120px;'>Tgl. Pembayaran</th>
            <th style='width: 150px;'>Jml. Pembayaran</th>
            <th style='width: 180px;'>Penerima</th>
            <th style='width: 150px;'>No. Rekening</th>
          </tr>";
          // Menampilkan data
          $sql="SELECT a.*,b.* from pembayaran a, salinan_invoice b
                  where a.no_si=b.no_si and YEAR(tgl_pembayaran)=$tahun and MONTH(tgl_pembayaran)=$bulan
                  group by kd_pembayaran
                  order by kd_pembayaran asc";

          $hasil=mysql_query($sql);
          $no=1;
          while($r=mysql_fetch_array($hasil))
            {
              $content.="<tr bgcolor='#FFFFFF'>
                <td>$no</td>
                <td>$r[kd_pembayaran]</td>
                <td>$r[tgl_pembayaran]</td>
                <td>$r[jumlah_pembayaran]</td>
                <td>$r[nm_suplier]</td>
                <td>$r[no_rek]</td>
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

