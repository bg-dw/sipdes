<style type="text/css">
  #print_warna{
    color: black;
    font-family: sans-serif;
  }
</style>
<div class="row">
    <div class="col-12" id="print_warna">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Rincian Permintaan Pembayaran</h4>
            </div>
            <?php 
            //var_dump($pembayaran);
            //echo "total record ".count($pembayaran); 
            global $tampx;$i=0; foreach($pembayaran as $x){
                $tampx[$i]=$x->harga_bahan_perjanjian*$x->jumlah_bahan_kg;
            $i++;}?>
            <?php //var_dump($tampx);
            $tamp;$h=0;$x="";
            foreach($pembayaran as $h){
              $tam[]=$h->kel_bahan;
            }
            $kel = array_unique($tam);
            $kel_baru = array_values($kel);
            $res  = array();
            $i=0;
            foreach($pembayaran as $vals){
                if(array_key_exists($vals->kel_bahan,$res)){
                    $res[$vals->kel_bahan]->harga_kwt += $vals->harga_kwt;
                    $res[$vals->kel_bahan]->kel_bahan = $vals->kel_bahan;
                }
                else{
                    $res[$vals->kel_bahan]  = $vals;
                }
              $i++;
            }


            foreach($pembayaran as $a){}?>
              <?php //$total=0; for($i=0;$i<count($res);$i++){ echo $res[$kel_baru[$i]]->kel_bahan."=>".$res[$kel_baru[$i]]->harga_kwt;}?>
            <div class="card-body" id="print_pembayaran">
                <div class="row" style="margin-left: 80px;width: 90%;">
                    <table style="width: 100%;">
                      <tr>
                        <th colspan="5" style="text-align: center;padding: 8px;"></th>
                      </tr>
                      <tr>
                        <th colspan="5" style="text-align: center;">PEMERINTAH DESA PANDANLANDUNG</th>
                      </tr>
                      <tr>
                        <th colspan="5" style="text-align: center;"><b>SURAT PERMINTAAN PEMBAYARAN</b></th>
                      </tr>
                      <tr>
                        <th colspan="5" style="text-align: center;">TAHUN ANGGARAN <?php echo $a->periode_rab;?></th>
                      </tr>
                      <tr>
                        <th colspan="5" style="text-align: center;padding: 8px;"></th>
                      </tr>
                    </table>
                    <hr style="border-top: 5px double #8c8c8c;margin-top: -10px;" width="100%">
                    <div class="col-md-12" >
                        <center>
                          <h5 style="color: black;"><b>NOMOR : <?php echo $a->nomor_spp;?></b></h5>
                          <h5 style="color: black;"><b>SURAT PENGANTAR</b></h5>
                        </center>
                    </div><br>
                    <p>Kepada Yth.<br>
                      Kepala Desa<br>
                    Di tempat</p><br>
                    <p>Dengan memperhatikan Peraturan Desa nomor 2 TAHUN 2018 Tanggal 09 April 2018 Tanggal 09 April 2018 kami mengajukan permintaan pembayaran sebagai berikut :</p>
                    <div class="col-md-12">
                        <div style="margin-left: 50px;">
                            <table style="width: 100%;">
                                <tr>
                                  <td width="20px" style="text-align: center;">a. </td>
                                  <td width="200px" > Bidang</td>
                                  <td width="10px" style="text-align: center;" >:</td>
                                  <td ><?php echo $a->bidang_kg;?></td>
                                </tr>
                                <tr>
                                  <td width="20px" style="text-align: center;">b. </td>
                                  <td width="200px" > Kegiatan</td>
                                  <td width="10px" style="text-align: center;">:</td>
                                  <td ><?php echo $a->nama_kg;?></td>
                                </tr>
                                <tr>
                                  <td width="20px" style="text-align: center;">c. </td>
                                  <td width="200px" > Tahun Anggaran</td>
                                  <td width="10px" style="text-align: center;">:</td>
                                  <td ><?php echo $a->periode_rab;?></td>
                                </tr>
                                <tr>
                                  <td width="20px" style="text-align: center;">d. </td>
                                  <td width="200px" > Keperluan</td>
                                  <td width="10px" style="text-align: center;">:</td>
                                  <td ><?php echo $a->keluaran_kg;?></td>
                                </tr>
                                <tr>
                                  <td width="20px" style="text-align: center;" valign="top">e. </td>
                                  <td width="200px" valign="top"> Jumlah Diminta</td>
                                  <td width="10px" style="text-align: center;" valign="top">:</td>
                                  <td >Rp. <?php echo rupiah_php(array_sum($tampx));?><br>( <?php echo terbilang(array_sum($tampx));?> )</td>
                                </tr>
                            </table><br><br>
                        </div>
                    </div>
                    <div class="col-md-11">
                        <div class="pull-right">
                            <table>
                                <tr><td style="text-align: center;">Pandanlandung, <?php echo indo_mysql($a->tgl_spp);?></td></tr>
                                <tr><td style="text-align: center;">Pelaksana Kegiatan,</td></tr>
                                <tr><td height="80px" ></td></tr>
                                <tr><td style="text-align: center;"><?php foreach($ttd as $nm){if($nm->level_us=="pk"){echo $nm->nama_us;}}?></td></tr>
                            </table>
                        </div>
                    </div>
                </div>
                <hr size="5">
                <div class="row" style="page-break-before: always;margin-left: 80px;width: 90%;">
                    <table style="width: 100%;">
                      <tr>
                        <th colspan="5" style="text-align: center;padding: 8px;"></th>
                      </tr>
                      <tr>
                        <th colspan="5" style="text-align: center;">PEMERINTAH DESA PANDANLANDUNG</th>
                      </tr>
                      <tr>
                        <th colspan="5" style="text-align: center;"><b>SURAT PERMINTAAN PEMBAYARAN</b></th>
                      </tr>
                      <tr>
                        <th colspan="5" style="text-align: center;">TAHUN ANGGARAN <?php echo $a->periode_rab;?></th>
                      </tr>
                      <tr>
                        <th colspan="5" style="text-align: center;padding: 8px;"></th>
                      </tr>
                    </table>
                    <table style="width: 100%;">
                      <tr>
                        <th style="text-align: center;padding: 5px;"></th>
                        <th></th>
                        <th></th>
                      </tr>
                      <tr>
                        <th width="100px" style="text-align: left;" valign="top">Bidang</th>
                        <th width="10px" valign="top"> :</th>
                        <th style="text-align: left;" valign="top"><?php echo $a->bidang_kg;?></th>
                        <th style="text-align: left;border: 1px solid black;text-indent: 5px;" width="150px" valign="top">Nomor : <?php echo $a->nomor_spp;?></th>
                      </tr>
                      <tr>
                        <th width="100px" style="text-align: left;" valign="top">Kegiatan</th>
                        <th valign="top"> :</th>
                        <th style="text-align: left;" valign="top" width="300px"><?php echo $a->nama_kg;?></th>
                        <th width="100px"></th>
                      </tr>
                      <tr>
                        <th width="100px" style="text-align: left;" valign="top">Waktu Pelaksanaan</th>
                        <th valign="top"> :</th>
                        <th style="text-align: left;" valign="top"><?php echo $a->waktu_pelaksanaan;?></th>
                      </tr>
                      <tr>
                        <th width="100px" style="text-align: left;" valign="top">Rincian Pendanaan</th>
                        <th valign="top"> :</th>
                        <th valign="top"></th>
                      </tr>
                      <tr>
                        <th style="text-align: center;padding: 5px;"></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </table>
                    <table style="width: 100%;" border="1">
                      <tr>
                        <th rowspan="2" width="100px" style="text-align: center;" >No.</th>
                        <th rowspan="2" width="100px" style="text-align: center;" >Kode</th>
                        <th rowspan="2" width="950px" style="text-align: center;" >Uraian</th>
                        <th width="50px" style="text-align: center;">Pagu Anggaran</th>
                        <th width="50px" style="text-align: center;">Permintaan</th>
                      </tr>
                      <tr>
                        <th width="50px" style="text-align: center;">( Rp )</th>
                        <th width="50px" style="text-align: center;">( Rp )</th>
                      </tr>
                      <tr>
                        <th width="100px" style="text-align: center;">1</th>
                        <th width="300px" style="text-align: center;">2</th>
                        <th width="200px" style="text-align: center;">3</th>
                        <th width="200px" style="text-align: center;">4</th>
                        <th width="200px" style="text-align: center;">5</th>
                      </tr>
                      <?php $c=0;$total=0; for($i=0;$i<count($res);$i++){//echo $res[$kel_baru[$i]]->harga_kwt;?>
                        <tr>
                          <td style="width: 15px;text-align: center;"><?php echo ($c+1).".";?></td>
                          <td style="padding-left: 15px;"><?php echo "5.1.2.0".$res[$kel_baru[$i]]->id_kel_bahan;?></td>
                          <td style="width: 80px;padding-left: 20px;"> <?php echo ($c+1).".";?> <?php echo $res[$kel_baru[$i]]->kel_bahan;?> </td>
                          <td style="width: 15px;text-align: right;padding-right: 10px;"><?php echo rupiah_php($res[$kel_baru[$i]]->harga_kwt);?></td>
                          <td style="width: 15px;text-align: right;padding-right: 10px;"><?php echo rupiah_php($res[$kel_baru[$i]]->harga_kwt);?></td>
                        </tr>
                        <?php $total+=($res[$kel_baru[$i]]->harga_kwt);?>
                      <?php $c++;}?>
                      <tr border="1">
                        <td></td>
                        <td></td>
                        <td style="text-align: center;"><b>JUMLAH</b></td>
                        <td></td>
                        <td style="text-align: right;padding-right: 10px;"><?php echo rupiah_php($total);?></td>
                      </tr>
                    </table>
                    <table style="width: 100%;"frame="box">
                      <tr>
                        <th colspan="4" style="text-align: center;">Pandanlandung, <?php echo indo_mysql($a->tgl_spp);?></th>
                      </tr>
                      <tr>
                        <th width="200px" style="text-align: center;" >Setuju Untuk Dibayarkan,</th>
                        <th width="200px" style="text-align: center;" >Telah Dibayar Lunas,</th>
                        <th width="200px" style="text-align: center;" >Telah Diverifikasi</th>
                        <th width="200px" style="text-align: center;" ></th>
                      </tr>
                      <tr >
                        <th width="200px" style="text-align: center;" >Kepala Desa</th>
                        <th width="200px" style="text-align: center;" >Bendahara Desa</th>
                        <th width="200px" style="text-align: center;" >Sekretaris Desa</th>
                        <th width="200px" style="text-align: center;" >Pelaksana Kegiatan</th>
                      </tr>
                      <tr >
                        <th width="200px" height="50px" style="text-align: center;" ></th>
                        <th width="200px" height="50px" style="text-align: center;" ></th>
                        <th width="200px" height="50px" style="text-align: center;" ></th>
                        <th width="200px" height="50px" style="text-align: center;" ></th>
                      </tr>
                      <tr >
                        <th width="200px"style="text-align: center;" ><?php foreach($ttd as $nm){if($nm->level_us=="kd"){echo $nm->nama_us;}}?></th>
                        <th width="200px"style="text-align: center;" ><?php foreach($ttd as $nm){if($nm->level_us=="bd"){echo $nm->nama_us;}}?></th>
                        <th width="200px"style="text-align: center;" ><?php foreach($ttd as $nm){if($nm->level_us=="sd"){echo $nm->nama_us;}}?></th>
                        <th width="200px"style="text-align: center;" ><?php foreach($ttd as $nm){if($nm->level_us=="pk"){echo $nm->nama_us;}}?></th>
                      </tr>
                    </table>
                </div>
                <hr><br>
                <?php $i=0; foreach($pembayaran as $isi){?>
                  <div class="row" style="page-break-before: always;margin-left: 80px;width: 90%;">
                    <div style="border: 2px solid black;" class="col-md-12">
                      <table style="width: 103%;margin-left: -15px;">
                          <tr>
                              <th colspan="5" style="text-align: center;padding: 8px;"></th>
                          </tr>
                          <tr>
                              <th colspan="5" style="text-align: left;">PEMERINTAH DESA PANDANLANDUNG</th>
                          </tr>
                          <tr>
                              <th colspan="5" style="text-align: center;">KUITANSI PENGELUARAN</th>
                          </tr>
                          <tr>
                              <th colspan="5" style="text-align: center;padding: 8px;border-bottom: 2px solid black;"></th>
                          </tr>
                      </table><br>
                      <table width="100%">
                        <tr>
                          <th style="padding-left: 39%;" width="84%"><b>NOMOR : <?php echo $isi->nomor_kwt;?></b></th>
                          <th>Sumber Dana : DDS</th>
                        </tr>
                      </table><br>
                      <table>
                        <tr>
                          <th width="200px" style="padding-left: 10px;">Sudah diterima dari</th>
                          <th width="10px" > :</th>
                          <th  style="text-align: left;">Bendahara Desa</th>
                        </tr>
                        <tr>
                          <th width="200px" style="padding-left: 10px;">Uang Sejumlah</th>
                          <th> :</th>
                          <th  style="text-align: left;">Rp. <?php echo rupiah_php($tampx[$i]);?></th>
                        </tr>
                        <tr>
                          <th width="200px" style="padding-left: 10px;">Nama Kegiatan</th>
                          <th> :</th>
                          <th  style="text-align: left;"><?php echo $isi->kd_kg;?>. <?php echo $isi->nama_kg;?></th>
                        </tr>
                        <tr>
                          <th width="200px" style="padding-left: 10px;">Kode Rek. Belanja</th>
                          <th> :</th>
                          <th style="text-align: left;"><?php echo $isi->kd_kg;?>.<?php echo $isi->id_kel_bahan;?>. <?php echo $isi->kel_bahan;?></th>
                        </tr>
                        <tr>
                          <th width="200px" style="padding-left: 10px;">Nama Bahan</th>
                          <th>:</th>
                          <th style="text-align: left;padding: 5px;"><?php echo $isi->nama_bahan;?></th>
                        </tr>
                        <tr>
                          <th style="text-align: center;padding: 5px;"></th>
                          <th></th>
                          <th></th>
                        </tr>
                      </table>
                      <table>
                        <tr>
                          <th style="padding-left: 10px;"><b>Potongan Pajak, Pajak Daerah dan Lainnya :</b></th>
                          <th></th>
                          <th></th>
                        </tr>
                      </table>
                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                          <table style="margin-left: 5%;width: 70%">
                            <tr>
                              <th width="150px">Nilai</th>
                              <th width="50px">: Rp.</th>
                              <th width="200px" style="text-align: right;"><?php echo rupiah_php($tampx[$i]);?></th>
                            </tr>
                            <tr>
                              <th width="150px">Pot Pajak PPN</th>
                              <th width="50px">: Rp.</th>
                              <th width="200px" style="text-align: right;">0</th>
                            </tr>
                            <tr>
                              <th width="150px">Pot Pajak PPh</th>
                              <th width="50px">: Rp.</th>
                              <th width="200px" style="text-align: right;">0</th>
                            </tr>
                            <tr>
                              <th width="150px">Pot Lainnya</th>
                              <th width="50px">: Rp.</th>
                              <th width="200px" style="text-align: right;border-bottom: solid 2px black;">0</th>
                            </tr>
                            <tr>
                              <th width="150px">Nilai</th>
                              <th width="50px">: Rp.</th>
                              <th width="200px" style="text-align: right;"><?php echo rupiah_php($tampx[$i]);?></th>
                            </tr>
                          </table>
                        </div>
                        <div class="col-xs-6 col-md-5">
                          <table style="width: 100%;">
                            <tr>
                              <th width="100%" style="text-align: center;" >Pandanlandung, <?php echo indo_mysql($isi->tgl_spp);?></th>
                            </tr>
                            <tr >
                              <th style="text-align: center;" >Yang menerima,</th>
                            </tr>
                            <tr >
                              <th height="50px" style="text-align: center;" ></th>
                            </tr>
                            <tr >
                              <th style="text-align: center;" ><?php foreach($ttd as $nm){if($nm->level_us=="pk"){echo $nm->nama_us;}}?></th>
                            </tr>
                          </table>
                        </div>
                      </div><br>
                      <table>
                        <tr>
                          <th width="150px">Total Pembayaran</th>
                          <th width="50px"></th>
                          <th width="200px" style="text-align: right; border: 2px solid black;">Rp. <?php echo rupiah_php($tampx[$i]);?></th>
                        </tr>
                      </table><br>
                      <table style="width: 100%;">
                        <tr>
                          <th width="50%" style="text-align: center;" >Disetujui,</th>
                          <th width="50%" style="text-align: center;" >Dibayar Oleh</th>
                          <th></th>
                        </tr>
                        <tr >
                          <th style="text-align: center;" >Kepala Desa</th>
                          <th style="text-align: center;" >Bendahara Desa</th>
                          <th></th>
                        </tr>
                        <tr >
                          <th height="50px" style="text-align: center;" ></th>
                          <th height="50px" style="text-align: center;" ></th>
                          <th></th>
                        </tr>
                        <tr >
                          <th style="text-align: center;" ><?php foreach($ttd as $nm){if($nm->level_us=="kd"){echo $nm->nama_us;}}?></th>
                          <th style="text-align: center;" ><?php foreach($ttd as $nm){if($nm->level_us=="bd"){echo $nm->nama_us;}}?></th>
                          <th></th>
                        </tr>
                      </table>
                    </div>
                  </div><br><br>
                <?php $i++;}?>
            </div>
            <?php if($this->session->userdata('level')=="sd"){ 
              if($pembayaran[0]->status_kg==7||$pembayaran[0]->status_kg==10){?>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-md btn-outline-warning waves-effect waves-light" onclick="location.href='<?php echo base_url();?>index.php/c_pembayaran/ubah_status_pembayaran/<?php echo $pembayaran[0]->id_detail_kg;?>/8'">
                                <i class="mdi mdi-checkbox-marked"></i> Revisi
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-md btn-outline-info waves-effect waves-light pull-right" onclick="location.href='<?php echo base_url();?>index.php/c_pembayaran/ubah_status_pembayaran/<?php echo $pembayaran[0]->id_detail_kg;?>/9'">
                                <i class="mdi mdi-checkbox-marked"></i> Verifikasi
                            </button>
                        </div>
                    </div>
                </div>
              <?php } 
            }?>
            <?php if($this->session->userdata('level')=="kd"){ 
              if($pembayaran[0]->status_kg==9||$pembayaran[0]->status_kg==10){?>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-md btn-outline-warning waves-effect waves-light" onclick="location.href='<?php echo base_url();?>index.php/c_pembayaran/ubah_status_pembayaran/<?php echo $pembayaran[0]->id_detail_kg;?>/10'">
                                <i class="mdi mdi-checkbox-marked"></i> Revisi
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-md btn-outline-info waves-effect waves-light pull-right" onclick="location.href='<?php echo base_url();?>index.php/c_pembayaran/ubah_status_pembayaran/<?php echo $pembayaran[0]->id_detail_kg;?>/11'">
                                <i class="mdi mdi-checkbox-marked"></i> Verifikasi
                            </button>
                        </div>
                    </div>
                </div>
              <?php } 
            }?>
            <?php if($this->session->userdata('level')=="pk"){?>
                <div class="card-footer">
                    <?php if($pembayaran[0]->status_kg>=11){?>
                        <button class="btn btn-md btn-outline-info waves-effect waves-light pull-right" onclick="printDiv_landscape('print_pembayaran');">
                            <i class="mdi mdi-printer"></i> Cetak
                        </button>
                    <?php }?>
                </div>           
            <?php }?>
        </div>
    </div>
</div>