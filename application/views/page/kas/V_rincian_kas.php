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
                        <th colspan="5" style="text-align: center;font-weight: bold;">BUKU KAS UMUM</th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: center;font-weight: bold;">DESA PANDANLANDUNG KECAMATAN WAGIR</th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: center;font-weight: bold;">TAHUN ANGGARAN <?php echo date('Y');?></th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: center;padding: 8px;"></th>
                    </tr>
                </table>
                <table style="width: 100%;" border="2">
                    <tr>
                      <th width="70px" style="text-align: center;" >No.</th>
                      <th width="100px" style="text-align: center;" >Tgl.</th>
                      <th width="100px" style="text-align: center;" >Kode Rekening</th>
                      <th width="950px" style="text-align: center;" >Uraian</th>
                      <th width="150px" style="text-align: center;">Penerimaan (Rp.)</th>
                      <th width="150px" style="text-align: center;">Pengeluaran (RP.)</th>
                      <th width="150px" style="text-align: center;">No. Bukti</th>
                      <th width="150px" style="text-align: center;">Jumlah Pengeluaran Kumulatif</th>
                      <th width="150px" style="text-align: center;">Saldo</th>
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
                    </tr>
                    <?php //var_dump($kas);
                    $i=0; foreach($kas as $a){?>
                      <tr border="2">
                        <td style="padding-left: 15px;"><?php echo ($i+1).".";?></td>
                        <td border="2" style="text-align: left;padding-left: 10px;"><?php echo date('d/m/Y',strtotime($a->tgl_kas));?></td>
                        <td><?php echo $a->kode_rek_kas;?></td>
                        <td><?php echo $a->uraian_kas;?></td>
                        <td style="text-align: right;padding-right: 5px;"><?php $pen[]=$a->penerimaan_kas;echo rupiah_php($a->penerimaan_kas);?></td>
                        <td style="text-align: right;padding-right: 5px;"><?php $peng[]=$a->pengeluaran_kas;echo rupiah_php($a->pengeluaran_kas);?></td>
                        <td><?php echo $a->no_bukti_kas?></td>
                        <td style="text-align: right;padding-right: 5px;"><?php echo rupiah_php($a->pengeluaran_kumulatif);?></td>
                        <td style="text-align: right;padding-right: 5px;"><?php echo rupiah_php($a->saldo_kas);?></td>
                      </tr>
                    <?php $i++;}?>
                    <tr border="1">
                      <td></td>
                      <td></td>
                      <td style="text-align: center;"><b>JUMLAH</b></td>
                      <td></td>
                      <td style="text-align: right;padding-right: 5px;"><?php if(count($kas)!=0){ echo rupiah_php(array_sum($pen));}?></td>
                      <td style="text-align: right;padding-right: 5px;"><?php if(count($kas)!=0){ echo rupiah_php(array_sum($peng));}?></td>
                      <td colspan="3"></td>
                    </tr>
                </table><br>
                <table style="width: 100%;">
                    <tr>
                      <th width="200px" style="text-align: center;" >Mengetahui,</th>
                      <th width="200px" style="text-align: center;" >Pandanlandung, <?php echo indo_php(date('d/m/Y'));?></th>
                    </tr>
                    <tr >
                      <th width="200px" style="text-align: center;" >Kepala Desa</th>
                      <th width="200px" style="text-align: center;" >Bendahara Desa</th>
                    </tr>
                    <tr >
                      <th width="200px" height="50px" style="text-align: center;" ></th>
                      <th width="200px" height="50px" style="text-align: center;" ></th>
                    </tr>
                    <tr >
                      <th width="300px"style="text-align: center;" ><?php foreach($ttd as $s){if($s->level_us=="kd"){echo $s->nama_us;}}?></th>
                      <th width="300px"style="text-align: center;" ><?php foreach($ttd as $s){if($s->level_us=="bd"){echo $s->nama_us;}}?></th>
                    </tr>
                </table>
            </div>
            <?php //}?>
            <div class="card-footer">
              <?php if($this->session->userdata('level')=="admin"){ ?>
                <button class="btn btn-md btn-outline-info waves-effect waves-light pull-right" onclick="javascript:printDiv_landscape('buku_kas');">
                    <i class="mdi mdi-printer"></i> Cetak
                </button>
              <?php }?>
            </div>
        </div>
    </div>
</div>
