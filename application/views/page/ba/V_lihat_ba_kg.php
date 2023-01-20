<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body" id="print-ba">
        <table style="width: 100%;border-collapse: collapse;border-bottom: 1px;" rules="none">
          <tr>
            <th colspan="5" style="text-align: center;padding: 8px;"></th>
          </tr>
          <tr>
            <th colspan="5" style="text-align: center;">LAPORAN KEGIATAN</th>
          </tr>
          <tr>
            <th colspan="5" style="text-align: center;">TIM PELAKSANA</th>
          </tr>
          <tr>
            <th colspan="5" style="text-align: center;padding: 8px;"></th>
          </tr>
        </table>
        <table style="width: 100%;border-collapse: collapse;border-bottom: 1px;" rules="none" border="2">
          <tr>
            <td style="text-align: center;padding: 5px;"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td width="15%" style="padding-left: 10px;">Nomor Bukti</td>
            <td width="2%" > :</td>
            <td width="40%" style="text-align: left;">0023/CASH/21.12/2018</td>
            <td width=10%"></td>
            <td width="10%" style="padding-left: 10px;">Pembayaran</td>
            <td width="2%" > :</td>
            <td width="11%" style="text-align: left;">Tunai</td>
          </tr>
          <tr>
            <td width="100px" style="padding-left: 10px;">Tanggal</td>
            <td width="10px" > :</td>
            <td  style="text-align: left;"><?php echo date('d M Y');?></td>
            <td width="50px"></td>
            <td width="100px" style="padding-left: 10px;">Jenis SPP</td>
            <td width="10px" > :</td>
            <td style="text-align: left;">LS</td>
          </tr>
          <tr>
            <td style="text-align: center;padding: 5px;"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </table>
        <table style="width: 100%;border-collapse: collapse;border-bottom: 1px;" rules="none" border="2">
          <tr>
            <td style="text-align: center;padding: 5px;"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr><th colspan="7" style="text-indent: 5px;">Dasar Pembayaran :</th></tr>
          <tr>
            <td width="100px" style="padding-left: 10px;">SPP Nomor dan Tanggal</td>
            <td width="10px" > :</td>
            <td style="text-align: left;">0023/SPP/21.12/2018 tanggal <?php echo date('d M Y');?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td width="100px" style="padding-left: 10px;">Uraian</td>
            <td> :</td>
            <td style="text-align: left;">Pelatihan Kerja dan Keterampilan Bagi Masyarakat Desa</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td style="text-align: center;padding: 5px;"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td width="100px" style="padding-left: 10px;">Bidang</td>
            <td width="10px" > :</td>
            <td style="text-align: left;">21.12.04 Bidang Pemberdayaan Masyarakat</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td width="100px" style="padding-left: 10px;">Kegiatan</td>
            <td> :</td>
            <td style="text-align: left;">21.12.04.22. Kegiatan Pembentukan dan Pelatihan Kader Pemberdayaan Masyarakat Desa</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr><th colspan="7" style="text-indent: 5px;">Rincian Penggunaan Dana :</th></tr>
          <tr>
            <td style="text-align: center;padding: 5px;"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </table>
        <table style="width: 100%;" border="2">
          <tr>
            <th width="5%" style="text-align: center;border: 2px solid;" >No</th>
            <th width="10%" style="text-align: center;border: 2px solid;" >Kode Rek.</th>
            <th width="55%px" style="text-align: center;border: 2px solid;" >Nama </th>
            <th width="15%" style="text-align: center;border: 2px solid;">ANGGARAN</th>
          </tr>
          <?php for($x=1;$x<+5;$x++){ ?>
            <tr>
              <td style="padding-left: 15px;"><?php echo $x;?></td>
              <td style="padding-left: 15px;"><?php echo "5.1.2.0".$x;?></td>
              <td style="width: 80px;padding-left: 20px;"> <?php echo $x.".";?> Uraian </td>
              <td style="width: 15px;text-align: right;padding-right: 10px;">2.500.00,00</td>
            </tr>
          <?php }?>
          <tr style="border: 2px solid;">
            <td style="border: 2px solid;"></td>
            <td style="border: 2px solid;"></td>
            <td style="text-align: center;border: 2px solid;"><b>JUMLAH</b></td>
            <td style="text-align: right;padding-right: 10px;border: 2px solid;">2.500.00,00</td>
          </tr>
        </table>
        <table style="width: 100%;border-collapse: collapse;border-top: 1px;" rules="none" border="2">
          <tr>
            <td style="text-align: center;padding: 5px;"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td width="200px" style="padding-left: 10px;">Jumlah Pembayaran</td>
            <td width="35px" > : Rp.</td>
            <td width="150px" style="text-align: right;">25.000.000,00</td>
            <td colspan="4"></td>
          </tr>
          <tr>
            <td width="200px" style="padding-left: 10px;">Potongan Pajak</td>
            <td width="35px" > : Rp.</td>
            <td width="150px" style="text-align: right;">25.000.000,00</td>
            <td colspan="4"></td>
          </tr>
          <tr>
            <td width="200px" style="padding-left: 10px;">Jumlah Dibayarkan</td>
            <td width="35px" > : Rp.</td>
            <td width="150px" style="text-align: right;">25.000.000,00</td>
            <td colspan="4"></td>
          </tr>
          <tr>
            <td colspan="7" style="text-align: center;padding: 5px;"></td>
          </tr>
          <tr>
            <td width="200px" style="padding-left: 10px;">Terbilang</td>
            <td width="10px"> :</td>
            <td width="250px"><?php $angka = 25000000; echo terbilang($angka)." Rupiah";?></td>
            <td colspan="4"></td>
          </tr>
          <tr>
            <td colspan="7" style="text-align: center;padding: 5px;"></td>
          </tr>
        </table>
        <table style="width: 100%;border-collapse: collapse;border-top: 1px;" border="2" rules="none">
          <tr>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <th width="200px" style="text-align: center;" ></th>
            <th width="200px" style="text-align: center;" >Pandanlandung, <?php echo date('d M Y');?></th>
          </tr>
          <tr >
            <th width="200px" style="text-align: center;" >Pelaksana Kegiatan,</th>
            <th width="200px" style="text-align: center;" >Bendahara Desa</th>
          </tr>
          <tr >
            <th width="200px" height="50px" style="text-align: center;" ></th>
            <th width="200px" height="50px" style="text-align: center;" ></th>
          </tr>
          <tr >
            <th width="200px"style="text-align: center;" >Nama</th>
            <th width="200px"style="text-align: center;" >Nama</th>
          </tr>
        </table><br>
      </div>
      <div class="card-footer">
        <button class="btn btn-md btn-outline-info waves-effect waves-light pull-right" onclick="javascript:printDiv('print-ba');">
            <i class="mdi mdi-printer"></i> Cetak
        </button>
      </div>
    </div>
  </div>
</div>
<?php 
function terbilang($nilai) {
  if($nilai<0) {
    $hasil = "minus ". trim(penyebut($nilai));
  } else {
    $hasil = trim(penyebut($nilai));
  }         
  return $hasil;
}
function penyebut($nilai) {
  $nilai = abs($nilai);
  $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
  $temp = "";
  if ($nilai < 12) {
    $temp = " ". $huruf[$nilai];
  } else if ($nilai <20) {
    $temp = penyebut($nilai - 10). " Belas";
  } else if ($nilai < 100) {
    $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
  } else if ($nilai < 200) {
    $temp = " Seratus" . penyebut($nilai - 100);
  } else if ($nilai < 1000) {
    $temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
  } else if ($nilai < 2000) {
    $temp = " Seribu" . penyebut($nilai - 1000);
  } else if ($nilai < 1000000) {
    $temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
  } else if ($nilai < 1000000000) {
    $temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
  } else if ($nilai < 1000000000000) {
    $temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
  } else if ($nilai < 1000000000000000) {
    $temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
  }     
  return $temp;
}
?>