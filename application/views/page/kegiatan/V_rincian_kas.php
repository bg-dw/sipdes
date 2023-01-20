<div class="row">
    <div class="col-md-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Rincian RAB</h4>
            </div>
            <div class="card-body print" id="buku_kas">
                <table style="width: 100%;" rules="none">
                    <tr>
                        <th colspan="5" style="text-align: center;padding: 8px;"></th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: center;">BUKU KAS PEMBANTU KEGIATAN</th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: center;">DESA PANDANLANDUNG KECAMATAN WAGIR</th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: center;">TAHUN ANGGARAN <?php echo date('Y');?></th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: center;padding: 8px;"></th>
                    </tr>
                </table>
                <table style="width: 100%;" border="2">
                    <tr>
                      <th rowspan="2" width="70px" style="text-align: center;">No.</th>
                      <th rowspan="2" width="100px" style="text-align: center;" >Tgl.</th>
                      <th rowspan="2" width="950px" style="text-align: center;" >Uraian</th>
                      <th colspan="2" width="100px" style="text-align: center;" >Penerimaan (Rp.)</th>
                      <th rowspan="2" width="150px" style="text-align: center;">No. Bukti</th>
                      <th colspan="2" width="150px" style="text-align: center;">Pengeluaran (RP.)</th>
                      <th rowspan="2" width="150px" style="text-align: center;">Jumlah Pengembalian ke Bendahara</th>
                      <th rowspan="2" width="150px" style="text-align: center;">Saldo</th>
                    </tr>
                    <tr>
                      <th width="70px" style="text-align: center;">Dari Bendahara</th>
                      <th width="100px" style="text-align: center;">Swadaya Masyarakat</th>
                      <th width="200px" style="text-align: center;">Belanja Barang & Jasa</th>
                      <th width="200px" style="text-align: center;">Belanja Modal</th>
                    </tr>
                    <tr>
                      <th width="70px" style="text-align: center;">1</th>
                      <th width="100px" style="text-align: center;">2</th>
                      <th width="200px" style="text-align: center;">3</th>
                      <th width="200px" style="text-align: center;">4</th>
                      <th width="200px" style="text-align: center;">5</th>
                      <th width="200px" style="text-align: center;">6</th>
                      <th width="200px" style="text-align: center;">7</th>
                      <th width="200px" style="text-align: center;">8</th>
                      <th width="50px" style="text-align: center;">9</th>
                      <th width="50px" style="text-align: center;">9</th>
                    </tr>
                    <?php //var_dump($isi);
                    //$pen[]=0;$peng[]=0;
                    if($isi){
                    $i=0; foreach($isi as $a){?>
                      <tr border="2">
                        <td style="padding-left: 15px;"><?php echo ($i+1).".";?></td>
                        <td border="2" style="text-align: left;padding-left: 10px;"><?php echo date('d/m/Y',strtotime($a->tgl_kas_kg));?></td>
                        <td><?php echo $a->uraian_kas_kg;?></td>
                        <td style="text-align: right;padding-right: 5px;"><?php echo rupiah_php($a->penerimaan_kas_bd); $peng[]=$a->penerimaan_kas_bd;?></td>
                        <td style="text-align: right;padding-right: 5px;"><?php echo rupiah_php($a->penerimaan_kas_sm)?></td>
                        <td style="text-align: left;padding-left: 5px;"><?php echo $a->no_bukti_kas_kg;?></td>
                        <td style="text-align: right;padding-right: 5px;"><?php echo rupiah_php($a->pengeluaran_bj);$pen[]=$a->pengeluaran_bj?></td>
                        <td style="text-align: right;padding-right: 5px;"><?php echo rupiah_php($a->pengeluaran_bm);?></td>
                        <td style="text-align: right;padding-right: 5px;"><?php echo rupiah_php($a->pengembalian_kas);?></td>
                        <td style="text-align: right;padding-right: 5px;"><?php echo rupiah_php($a->saldo_kas_kg);$saldo=$a->saldo_kas_kg;?></td>
                      </tr>
                    <?php $i++;}?>
                    <tr border="1">
                      <td></td>
                      <td></td>
                      <td style="text-align: left;padding-left: 5px;"><b>JUMLAH</b></td>
                      <td style="text-align: right;padding-right: 5px;"></td>
                      <td></td>
                      <td></td>
                      <td style="text-align: right;padding-right: 5px;"></td>
                      <td></td>
                      <td style="text-align: right;padding-right: 10px;"></td>
                      <td></td>
                    </tr>
                    <tr border="1">
                      <td></td>
                      <td></td>
                      <td style="text-align: left;padding-left: 5px;"><b>Total Penerimaan</b></td>
                      <td style="text-align: right;padding-right: 5px;"><?php if(count($isi)!=0){ echo rupiah_php(array_sum($peng));}?></td>
                      <td></td>
                      <td></td>
                      <td style="text-align: left;padding-left: 5px;">Total Pengeluaran</td>
                      <td></td>
                      <td></td>
                      <td style="text-align: right;padding-right: 10px;"><?php if(count($isi)!=0){ echo rupiah_php(array_sum($pen));}?></td>
                    </tr>
                    <tr border="1">
                      <td></td>
                      <td></td>
                      <td style="text-align: center;"></td>
                      <td style="text-align: right;padding-right: 5px;"></td>
                      <td></td>
                      <td></td>
                      <td style="text-align: left;padding-left: 5px;">Total Pengeluaran + Saldo Kas</td>
                      <td></td>
                      <td></td>
                      <td style="text-align: right;padding-right: 10px;"><?php echo rupiah_php(array_sum($pen)+$saldo);?></td>
                    </tr>
                    <?php }?>
                </table><br>
                <table style="width: 40%;margin-left: 50%;">
                    <tr>
                      <th width="200px" style="text-align: center;" >Desa Pandanlandung</th>
                    </tr>
                    <tr>
                      <th width="200px" style="text-align: center;" >Tanggal, <?php echo indo_php(date('d/m/Y'));?></th>
                    </tr>
                    <tr >
                      <th width="200px" style="text-align: center;" >Pelaksana Kegiatan</th>
                    </tr>
                    <tr >
                      <th width="200px" height="50px" style="text-align: center;" ></th>
                    </tr>
                    <tr >
                      <th width="300px"style="text-align: center;" ><?php foreach($ttd as $s){if($s->level_us=="pk"){echo $s->nama_us;}}?></th>
                    </tr>
                </table>
            </div>
            <?php //}?>
            <div class="card-footer">
                <button class="btn btn-md btn-outline-info waves-effect waves-light pull-right" onclick="javascript:printDiv_landscape('buku_kas');">
                    <i class="mdi mdi-printer"></i> Cetak
                </button>
            </div>
        </div>
    </div>
</div>
