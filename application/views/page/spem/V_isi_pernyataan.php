<div class="row">
    <div class="col-md-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Rincian RAB</h4>
            </div>
            <?php //var_dump($isi); 
            foreach($isi as $data){}?>
            <div class="card-body print_warna" id="printablediv">
                <table style="width: 100%;">
                    <tr>
                        <th colspan="5" style="text-align: center;padding: 8px;"></th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: center;font-weight: bold">PEMERINTAH DESA PANDANLANDUNG</th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: center;font-weight: bold">SURAT PERNYATAAN TANGGUNG JAWAB BELANJA</th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: center;font-weight: bold">TAHUN ANGGARAN <?php echo $data->periode_rab;?></th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: center;padding: 8px;"></th>
                    </tr>
                </table>
                <table style="width: 100%;border-collapse: collapse;border-bottom: 1px;" rules="none" border="2">
                    <tr>
                      <th style="text-align: center;padding: 5px;"></th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <th width="200px" style="padding-left: 10px;">Bidang</th>
                      <th width="10px" > :</th>
                      <th  style="text-align: left;"><?php echo $data->bidang_kg;?></th>
                    </tr>
                    <tr>
                      <th width="200px" style="padding-left: 10px;">Kegiatan</th>
                      <th> :</th>
                      <th  style="text-align: left;"><?php echo $data->nama_kg;?></th>
                    </tr>
                    <tr>
                      <th style="text-align: center;padding: 5px;"></th>
                      <th></th>
                      <th></th>
                    </tr>
                </table>
                <?php $kel=array(); $kel_bahan="1";$i=0;$sub_harga=0; // menjumlahkan belanja berdasarkan kelompok belanja
                foreach($isi as $a){
                  if($kel_bahan==$a->kel_bahan){
                    $sub_harga+=$a->jumlah_bahan_kg*$a->harga_bahan_perjanjian;
                  }else{
                    $sub_harga=0;
                    $sub_harga=$a->jumlah_bahan_kg*$a->harga_bahan_perjanjian;
                  }?>
                  <?php 
                    $kel[$a->kel_bahan]= array($a->kel_bahan,$sub_harga); 
                  ?>
                <?php $i++;
                  $kel_bahan=$a->kel_bahan;
                }?>
                <table style="width: 100%;border-bottom: 2px solid black;" border="2">
                    <tr id="tr1">
                      <th width="10px" style="text-align: center;font-weight: bold">No.</th>
                      <th width="300px" style="text-align: center;font-weight: bold">Penerimaan</th>
                      <th width="200px" style="text-align: center;font-weight: bold" colspan="2">Uraian</th>
                      <th width="200px" style="text-align: center;font-weight: bold">Jumlah ( Rp. )</th>
                    </tr>
                    <?php $total=0; $i=0; foreach($isi_kel_bahan as $x){?>
                        <tr>
                            <td style="text-align: center;"><?php echo ($i+1).".";?></td>
                            <td style="width: 80px;padding-left: 20px;"><?php echo $a->nama_us;?></td>
                            <td style="width: 15px;text-align: left;padding-left: 10px;" colspan="2"><?php echo $kel[$x->kel_bahan][0];?></td>
                            <td style="width: 15px;text-align: right;padding-right: 10px;"><?php echo rupiah_php($kel[$x->kel_bahan][1]);?></td>
                        </tr>
                    <?php $i++;$total+=$kel[$x->kel_bahan][1];}?>
                    <tr id="th1">
                      <td></td>
                      <td colspan="3" style="text-align: center;font-weight: bold">Total</td>
                      <td style="text-align: right;padding-right: 10px;font-weight: bold">Rp.<?php echo rupiah_php($total); ?></td>
                    </tr>
                </table>
                <table style="width: 100%;border-collapse: collapse;border-top: 1px;" border="2" rules="none">
                    <tr border="1">
                      <th colspan="3"><p style="margin-left: 20px;margin-right: 20px;margin-top: 20px;">Bukti - bukti pengeluaran atau belanja tersebut diatas sebagaimana terlampir,untuk kelengkapan administrasi dan pemeriksaan telah sesuai peraturan perundang-undangan yang berlaku.</p></th>
                    </tr>
                    <tr border="1">
                      <th colspan="3"><p style="margin-left: 20px;margin-right: 20px;">Demikian surat pernyataan ini dibuat dengan sebenarnya.</p></th>
                    </tr>
                    <tr>
                      <th width="100%" colspan="3" ><p style="margin-left:70%;text-align: left;" >Pandanlandung,<?php echo indo(date('m/d/Y'))?></p></th>
                    </tr>
                    <tr >
                      <th width="100%" colspan="3" ><p style="margin-left:70%;text-align: left;" >Pelaksana Kegiatan,</p></th>
                    </tr>
                    <tr >
                      <th width="100%" colspan="3" height="70px"><p style="margin-left:70%;text-align: left;" ></p></th>
                    </tr>
                    <tr >
                      <th width="100%" colspan="3" ><p style="margin-left:70%;text-align: left;" ><?php echo $isi[0]->nama_us;?></p></th>
                    </tr>
                </table>
            </div>
            <?php //}?>
            <div class="card-footer">
                <button class="btn btn-md btn-outline-info waves-effect waves-light pull-right" onclick="javascript:printDiv_landscape('printablediv');">
                    <i class="mdi mdi-printer"></i> Cetak
                </button>
            </div>
        </div>
    </div>
</div>
