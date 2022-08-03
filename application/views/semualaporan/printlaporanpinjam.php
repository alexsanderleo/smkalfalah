<!-- Setting CSS bagian header/ kop -->
<style type="text/css">
  table.page_header {width: 1020px; border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }
  table.page_footer {width: 1020px; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}
  h1 {color: #000033}
  h2 {color: #000055}
  h3 {color: #000077}
</style>
<!-- Setting Margin header/ kop -->
<page backtop="14mm" backbottom="14mm" backleft="1mm" backright="10mm">
  <page_header>
    <!-- Setting Header -->
    <table class="page_header">
      <tr>
        <td style="text-align: left;    width: 10%">App v.1.0</td>
        <td style="text-align: center; width: 53%">LAPORAN DATA SUPPLIER</td>
        <td style="text-align: right;    width: 10%"><?php echo date('d/m/Y'); ?></td>
      </tr>
    </table>
  </page_header>
  <!-- Setting Footer -->
  <page_footer>
    <table class="page_footer">
      <tr>
        <td style="width: 10%; text-align: left">
          
        </td>
        <td style="width: 53%; text-align: center">
          Dicetak oleh: <?= $this->fungsipropile->user_login()->username?>
        </td>
        <td style="width: 10%; text-align: right">
          Halaman [[page_cu]]/[[page_nb]]
        </td>
      </tr>
    </table>
  </page_footer>
  <!-- Setting CSS Tabel data yang akan ditampilkan -->
  <style type="text/css">
  .tabel2 {
    border-collapse: collapse;
  }
  .tabel2 th, .tabel2 td {
      padding: 5px 5px;
      border: 1px solid #000;
  }
  </style>
  <table>
    <tr>
        <!-- Genti KOP garek nganggo style="width: 600px;" PERHATIKAN CSS TR KURUNG BUKA KURUNG TUTUP E-->

        <!-- Genti logo alfalah nganggo <th rowspan="3"><img src="images/logo.jpg" style="width:120px;height:100px" /></th> -->
        <th><img src="logoneiki/fileasli.jpg" style="width:120px;height:150px" /></th>
    
      
      <td align="center" style="width: 600px;"><font style="font-size: 18px"><br><b>SMK AL - FALAH WINONG</b></font>
      
        <br><br>Ds. Pekalongan Kec. Winong Kab.Pati | 5918 -  Telp: (0812)2895923
        <br><br>Email: alfalahsmk@yahoo.co.id | admin@smkalfalahwinong.sch.id</td>
    </tr>

  </table>
  <hr><br><br>
  <table class="tabel2">
    <thead>
    <tr>
   
    <th style="width: 10px">#</th>
    <th>Barcode</th>
                    <th>Nama peminjam</th>
                    <th>Quantyty</th>
                    <th>Kondisi Barang Dikembalikan</th>
                    <th>TGL.PINJAM</th>
                    <th>TGL.KEMBALI</th>
                    <th>Status barang di</th>
    </tr>
    </thead>
    <tbody>
    <?php $no =1;
                     if(empty($transaksi)){ // Jika data tidak ada
                      echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                  }else{ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                      foreach($transaksi as $data){ // Looping hasil data transaksi
                          $tgl = date('d-m-Y', strtotime($data->tanggalpinjam)); // Ubah format tanggal jadi dd-mm-yyyy

                          echo "<tr>";
                          echo "<td>".$no++."</td>";
                          echo "<td>".$data->barcode."</td>";
                          echo "<td>".$data->namapeminjam."</td>";
                          echo "<td>".$data->qty."</td>";
                          echo "<td>".$data->kondisibarang."</td>";
                          echo "<td>".$tgl."</td>";
                          echo "<td>".$data->tanggaldikembalikan."</td>";
                          echo "<td>".$data->status."</td>";
                          echo "</tr>";
                      }
                  }
                  ?>
    </tbody>
  </table>
</page>

