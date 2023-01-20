<div class="row">
    <div class="col-md-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Rincian RAB</h4>
            </div>
            <div class="card-body print" id="rincian-laporan">
              <?php foreach($kegiatan as $baris){}
              //var_dump($kegiatan);
              ?>
              <div class="row" style="margin-left: 80px;width: 90%;" style="page-break-after: always;">
                  <table style="width: 100%;">
                    <tr>
                      <th colspan="5" style="text-align: center;padding: 8px;"></th>
                    </tr>
                    <tr>
                      <th colspan="5" style="text-align: center;">LAPORAN KEGIATAN</th>
                    </tr>
                    <tr>
                      <th colspan="5" style="text-align: center;">TIM PELAKSANA KEGIATAN</th>
                    </tr>
                    <tr>
                      <th colspan="5" style="text-align: center;padding: 8px;"></th>
                    </tr>
                  </table><br>
                  <div class="col-md-12">
                      <div style="margin-left: 50px;">
                          <table style="width: 100%;">
                              <tr>
                                <td width="200px" > Jenis Kegiatan</td>
                                <td width="10px" style="text-align: center;" >:</td>
                                <td ><?php echo $baris->nama_kg;?></td>
                              </tr>
                              <tr>
                                <td width="200px" > Rencana Volume</td>
                                <td width="10px" style="text-align: center;">:</td>
                                <td ><?php echo $baris->volume_kg;?></td>
                              </tr>
                              <tr>
                                <td width="200px" > Lokasi</td>
                                <td width="10px" style="text-align: center;">:</td>
                                <td ><?php echo $baris->lokasi_kg;?></td>
                              </tr>
                              <tr>
                                <td width="200px" > Desa</td>
                                <td width="10px" style="text-align: center;">:</td>
                                <td >Pandanlandung</td>
                              </tr>
                              <tr>
                                <td width="200px" valign="top"> Kecamatan</td>
                                <td width="10px" style="text-align: center;" valign="top">:</td>
                                <td >Wagir</td>
                              </tr>
                              <tr>
                                <td width="200px" valign="top"> Kabupaten</td>
                                <td width="10px" style="text-align: center;" valign="top">:</td>
                                <td >Malang</td>
                              </tr>
                          </table><br>
                          <ol type="A">
                            <li>Pelaksanaan Kegiatan</li>
                            <ol type="1">
                              <li>Penggunaan Bahan</li>
                                <ol type="a">
                                  <?php foreach($kegiatan as $baris){ ?>
                                    <li><?=$baris->nama_bahan." ".$baris->jumlah_bahan_kg." ".$baris->satuan_bahan?></li>
                                  <?php }?>
                                </ol>
                              <li>Hasil Kegiatan</li>
                                <ol type="a">
                                  <?php foreach($kegiatan as $baris){}?>
                                    <li><?=$baris->kondisi_awal?></li>
                                    <li><?=$baris->kondisi_akhir?></li>
                                </ol>
                            </ol>
                            <li style="margin-top: 20px;">Rekapitulasi Pembayaran</li>
                            <li style="margin-top: 20px;">Lampiran</li>
                              <ol type="1">
                                  <li>Foto 0%,50%, dan 100%</li>
                                  <li>Rencana Anggaran Biaya</li>
                                  <li>Laporan Realisasi</li>
                                  <li>Bukti Pembayaran</li>
                                  <li>Daftar hadir</li>
                                  <li>Berita acara sosialisasi, pembentukan TPK, dan Pembentukan TIM Pemantau dan Pengawas Masyarakat</li>
                                  <li>Laporan hasil pemantauan dan pengawasan masyarakat</li>
                                  <li>Berita acara musyawarah serah terima</li>
                              </ol>
                          </ol><br>
                          <p>Demikian laporan kegiatan ini dibuat dengan sebenarnya,untuk dipergunakan sebagaimana mestinya.</p><br>
                      </div>
                  </div>
                  <div class="col-md-11">
                      <label style="margin-left: 74%">Malang, <?php echo indo_php(date('d/m/Y'));?></label>
                      <table border="0" width="100%" style="margin-left: 5%;">
                          <tr>
                            <td style="text-align: center;" width="50%">Ketua TPK</td>
                            <td style="text-align: center;" width="50%">Sekretaris TPK</td>
                          </tr>
                          <tr>
                            <td height="80px" ></td>
                            <td height="80px" ></td>
                          </tr>
                          <tr>
                            <td style="text-align: center;">Nama Ketua</td>
                            <td style="text-align: center;">Nama Sekretaris</td>
                          </tr>
                          <tr>
                            <td height="40px" ></td>
                            <td height="40px" ></td>
                          </tr>
                          <tr>
                            <td style="text-align: center;">Menyetujui</td>
                            <td style="text-align: center;">Mengetahui</td>
                          </tr>
                          <tr>
                            <td style="text-align: center;">Kepala Desa Pandanlandung</td>
                            <td style="text-align: center;">Pelaksana Kegiatan</td>
                          </tr>
                          <tr>
                            <td height="80px" ></td>
                            <td height="80px" ></td>
                          </tr>
                          <tr>
                            <td style="text-align: center;">Nama Ketua</td>
                            <td style="text-align: center;">Nama Sekretaris</td>
                          </tr>
                      </table>
                  </div>
              </div><br>
              <div class="row page-break" style="margin-left: 80px;width: 90%;">
                  <div class="col-md-12" >
                    <label><b>LAMPIRAN</b></label><br>
                    <label>1. Dokumentasi Foto Kegiatan</label><br>
                    <center>
                      <img src="<?php echo base_url();?>assets/dist/kegiatan/<?php echo $baris->foto_sebelum;?>" width="600" height="366"><br><br>
                      <label>Gambar 1. Kondisi 0%</label><br><br>
                      <img src="<?php echo base_url();?>assets/dist/kegiatan/<?php echo $baris->foto_progres;?>" width="600" height="366"><br><br>
                      <label>Gambar 2. Kondisi 50%</label><br><br>
                      <img src="<?php echo base_url();?>assets/dist/kegiatan/<?php echo $baris->foto_sesudah;?>" width="600" height="366"><br><br>
                      <label>Gambar 3. Kondisi 100%</label>
                    </center>
                  </div>
              </div>
            </div>
            <?php //}?>
            <div class="card-footer">
                <button class="btn btn-md btn-outline-info waves-effect waves-light pull-right" onclick="javascript:printDiv('rincian-laporan');">
                    <i class="mdi mdi-printer"></i> Cetak
                </button>
            </div>
        </div>
    </div>
</div>
