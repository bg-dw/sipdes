<div class="row">
    <div class="col-md-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Rincian RAB</h4>
            </div>
            <?php //var_dump($rab); 
            foreach($rab as $data){}?>
            <div class="card-body print" id="printablediv">
                <table style="width: 100%;border-collapse: collapse;border-bottom: 1px;" rules="none" border="2">
                    <tr>
                        <th colspan="5" style="text-align: center;padding: 8px;"></th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: center;font-weight: bold;">PEMERINTAH DESA PANDANLANDUNG</th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: center;font-weight: bold;">RENCANA ANGGARAN BIAYA (RAB)</th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: center;font-weight: bold;">TAHUN ANGGARAN <?php echo $data->periode_rab;?></th>
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
                      <th width="200px" style="padding-left: 10px;">Waktu Pelaksanaan</th>
                      <th> :</th>
                      <th  style="text-align: left;"><?php echo $data->waktu_pelaksanaan;?></th>
                    </tr>
                    <tr>
                      <th width="200px" style="padding-left: 10px;">Sumber Dana</th>
                      <th> :</th>
                      <th  style="text-align: left;"><?php echo "DDS";//$data->sumber_dana_kg;?></th>
                    </tr>
                    <tr>
                      <th width="200px" style="padding-left: 10px;">Output / Keluaran</th>
                      <th> :</th>
                      <th style="text-align: left;"><?php echo $data->keluaran_kg;?></th>
                    </tr>
                    <tr>
                      <th style="text-align: center;padding: 5px;"></th>
                      <th></th>
                      <th></th>
                    </tr>
                </table>
                <table style="width: 100%;" border="2">
                    <tr>
                      <th rowspan="2" width="100px" style="text-align: center;" >KODE</th>
                      <th rowspan="2" width="950px" style="text-align: center;" >URAIAN</th>
                      <th colspan="3" width="150px" style="text-align: center;">ANGGARAN</th>
                    </tr>
                    <tr>
                      <th width="50px" style="text-align: center;">VOLUME</th>
                      <th width="50px" style="text-align: center;">HARGA SATUAN</th>
                      <th width="50px" style="text-align: center;">JUMLAH</th>
                    </tr>
                    <tr>
                      <th width="100px" style="text-align: center;">1</th>
                      <th width="300px" style="text-align: center;">2</th>
                      <th width="200px" style="text-align: center;">3</th>
                      <th width="200px" style="text-align: center;">4</th>
                      <th width="200px" style="text-align: center;">5</th>
                    </tr>
                    <tr border="2">
                      <td style="padding-left: 15px;">5.</td>
                      <td border="2" style="text-align: left;padding-left: 10px;"><b>Belanja</b></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td style="padding-left: 15px;"> 5.1.2</td>
                      <td style="text-align: left;padding-left: 15px;"><b>Belanja Barang dan Jasa</b></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <?php global $kel; $i=0; foreach($rab as $a){
                      $kel[$i]=$a->kel_bahan;
                      $i++;
                    } 
                    $kel[count($kel)]="last index";?>
                    <?php global $tam; $i=0;$x=0; foreach($rab as $a){ ?>
                      <?php if($i==0){ ?>
                        <tr>
                            <td style="padding-left: 15px;"><?php echo "5.1.2.".$a->id_kel_bahan;?></td>
                            <td style="width: 80px;padding-left: 20px;"><?php echo $a->kel_bahan;?></td>
                            <td style="width: 15px;text-align: center;"></td>
                            <td style="width: 15px;text-align: right;padding-right: 10px;"></td>
                            <td style="width: 15px;text-align: right;padding-right: 10px;"></td>
                        </tr>
                      <?php }else{ if($a->kel_bahan==$kel[$i-1]){}else{?>
                        <tr>
                            <td style="padding-left: 15px;"><?php echo "5.1.2.".$a->id_kel_bahan;?></td>
                            <td style="width: 80px;padding-left: 20px;"><?php echo $a->kel_bahan;?></td>
                            <td style="width: 15px;text-align: center;"></td>
                            <td style="width: 15px;text-align: right;padding-right: 10px;"></td>
                            <td style="width: 15px;text-align: right;padding-right: 10px;"></td>
                        </tr>
                        <?php $x=0;} }?>
                        <tr>
                            <td style="padding-left: 15px;"></td>
                            <td style="width: 80px;padding-left: 30px;"> <?php echo "0".($x+1).". ";?><?php echo $a->nama_bahan?></td>
                            <td style="width: 15px;text-align: center;"><?php echo $a->jumlah_bahan_kg." ".$a->satuan_bahan?></td>
                            <td style="width: 15px;text-align: right;padding-right: 10px;"><?php echo rupiah_php($a->harga_bahan_kg);?></td>
                            <td style="width: 15px;text-align: right;padding-right: 10px;"><?php echo rupiah_php($tam[$i]=$a->jumlah_bahan_kg * $a->harga_bahan_kg);?></td>
                        </tr>
                    <?php $i++;$x++;}?>
                    <tr border="1">
                      <td></td>
                      <td style="text-align: center;"><b>JUMLAH</b></td>
                      <td></td>
                      <td></td>
                      <td style="text-align: right;padding-right: 10px;"><b><?php echo rupiah_php(array_sum($tam));?></b></td>
                    </tr>
                </table>
                <table style="width: 100%;border-collapse: collapse;border-top: 1px;" border="2" rules="cols">
                    <tr>
                      <th width="200px" style="text-align: center;" >Mengesahkan,</th>
                      <th width="200px" style="text-align: center;" >Telah Diverifikasi</th>
                      <th width="200px" style="text-align: center;" >Tanggal, <?php echo indo_php(date('d/m/Y'));?></th>
                    </tr>
                    <tr >
                      <th width="200px" style="text-align: center;" >Kepala Desa</th>
                      <th width="200px" style="text-align: center;" >Sekretaris Desa</th>
                      <th width="200px" style="text-align: center;" >Pelaksana Kegiatan</th>
                    </tr>
                    <tr >
                      <th width="200px" height="70px" style="text-align: center;" ></th>
                      <th width="200px" height="70px" style="text-align: center;" ></th>
                      <th width="200px" height="70px" style="text-align: center;" ></th>
                    </tr>
                    <tr >
                      <th width="200px"style="text-align: center;" ><?php foreach($ttd as $s){if($s->level_us=="kd"){echo $s->nama_us;}}?></th>
                      <th width="200px"style="text-align: center;" ><?php foreach($ttd as $s){if($s->level_us=="sd"){echo $s->nama_us;}}?></th>
                      <th width="200px"style="text-align: center;" ><?php foreach($ttd as $s){if($s->level_us=="pk"){echo $s->nama_us;}}?></th>
                    </tr>
                </table>
            </div>
            <?php //}?>
            <div class="card-footer">
                <button class="btn btn-md btn-outline-info waves-effect waves-light pull-right" onclick="javascript:printDiv('printablediv');">
                    <i class="mdi mdi-printer"></i> Cetak
                </button>
            </div>
        </div>
    </div>
</div>
