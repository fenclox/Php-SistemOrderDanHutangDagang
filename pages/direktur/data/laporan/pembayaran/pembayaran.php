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
            <th style='width: 180px;'>Supplier</th>
            <th style='width: 150px;'>Sisa Pembayaran</th>
          </tr>";
          // Menampilkan data
          $sql="SELECT a.kd_pembayaran, a.tgl_pembayaran, e.nm_supplier, a.jumlah_pembayaran, b.total_tagihan, b.total_pembayaran  FROM pembayaran a 
                JOIN salinan_invoice b ON a.no_si=b.no_si
                JOIN ttb c ON b.kd_ttb=c.kd_ttb
                JOIN po d ON c.kd_po=d.kd_po
                JOIN supplier e ON d.kd_supplier=e.kd_supplier
                WHERE YEAR(a.tgl_pembayaran)='$tahun' AND MONTH(a.tgl_pembayaran)='$bulan'";

          $hasil=mysql_query($sql);
          $no=1;
          while($r=mysql_fetch_array($hasil))
            {
              $a=$r['total_tagihan']-$r['total_pembayaran'];
              $content.="<tr bgcolor='#FFFFFF'>
                <td>$no</td>
                <td>$r[kd_pembayaran]</td>
                <td>$r[tgl_pembayaran]</td>
                <td>$r[jumlah_pembayaran]</td>
                <td style='text-transform:uppercase; width: 180px'>$r[nm_supplier]</td>
                <td>$a</td>
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

