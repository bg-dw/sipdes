<div class="row">
    <div class="col-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Penawaran</h4>
            </div>
            <?php //var_dump($data_ba);?>
            <div class="card-body print_warna" id="print-ba-penawaran">
                <?php global $perjanjian;$perjanjian=0; foreach($data_ba as $a){
                    $perjanjian +=$a->jumlah_bahan_kg*$a->harga_bahan_perjanjian;
                }?>
                <div class="row" style="margin-left: 80px;width: 80%;margin-top: 0px;">
                    <table style="width: 100%;text-align: center;">
                        <tr>
                            <th colspan="5" style="text-align: center;padding: 8px;"></th>
                        </tr>
                        <tr>
                            <th colspan="5" style="text-align: center;font-weight: bold;">TIM PENGELOLA KEGIATAN</th>
                        </tr>
                        <tr>
                            <th colspan="5" style="text-align: center;font-weight: bold;">DESA PANDANLANDUNG KEC. WAGIR KAB. MALANG</th>
                        </tr>
                        <tr>
                            <th colspan="5" style="text-align: center;font-weight: bold;">Alamat Jl. Tugu No.58, Krajan, Pandanlandung, Wagir, Malang, Jawa Timur 65158</th>
                        </tr>
                        <tr>
                            <th colspan="5" style="text-align: center;padding: 8px;"></th>
                        </tr>
                    </table>
                    <div class="col-lg-12 text-center">
                        <p style="font-weight: bold;"> BERITA ACARA NEGOSIASI/KLARIFIKASI</p>
                    </div>
                    <div class="col-lg-12">
                        <?php //var_dump($kegiatan);

                        $tanggal = $data_ba[0]->tgl_ba;
                        $day = date('D', strtotime($tanggal));
                        $dayList = array(
                            'Sun' => 'Minggu',
                            'Mon' => 'Senin',
                            'Tue' => 'Selasa',
                            'Wed' => 'Rabu',
                            'Thu' => 'Kamis',
                            'Fri' => 'Jumat',
                            'Sat' => 'Sabtu'
                        );
                        ?>
                        <?php //var_dump($data_ba);?>
                        <p style="text-align: justify;">Pekerjaan
                        Pada hari ini <?php echo $dayList[$day];?> tanggal <?php echo indo_mysql($data_ba[0]->tgl_ba);?> pada pukul <?php echo date('H:i',strtotime($data_ba[0]->jam_ba));?> WIB dengan mengambil tempat di <?php echo $data_ba[0]->tempat_ba;?> kami yang bertanda tangan di bawah ini telah melakukan klarifikasi dan negosiasi harga atas pekerjaan "<?php echo $a->nama_kg;?>"
                        Rapat dipimpin oleh Ketua Tim Pengelola Kegiatan <?php echo $tpk[0]->nama_us;?> dengan pihak Penyedia barang/jasa dari <?php echo $data_ba[0]->nama_toko;?>
                        </p><br>
                        <p>Pada saat klarifikasi dan negosiasi harga pihak penyedia jasa yang dihadiri oleh  <?php echo $data_ba[0]->dihadiri_oleh;?> menyatakan hal-hal sebagai berikut : </p>
                        <ol type="d" style="margin-left: 0px;text-align: justify;">
                            <li>
                                <p>Bahwa pihak Penyedia barang/jasa dari <?php echo $data_ba[0]->nama_toko;?> menyatakan telah menerima semua surat yang berkaitan dengan proses pekerjaan <?php echo $a->nama_kg;?> </p>
                            </li>
                            <li>
                                <p>Bahwa pihak Penyedia barang/jasa dari <?php echo $data_ba[0]->nama_toko;?> menyambut baik dan mengucapkan terima kasih atas kepercayaan yang telah diberikan selama ini dan semoga keiasanna yang telah berjalan dapat dilanjutkan.</p>
                            </li>
                        </ol>
                        <p>Adapun mengenai pengajuan penawaran untuk melaksanakan kegiatan tersebut disampaikan sebagai berikut: </p><br>
                        <ol type="a" style="margin-left: 0px;text-align: justify;">
                            <li>
                                <p>Besarnya jumlah penawaran harga yang diajukan oleh Penyedia barang/jasa dari <?php echo $data_ba[0]->nama_toko;?> adalah sebesar Rp.<?php echo rupiah_php($permintaan);?> termasuk beban pajak dan bea materai;</p>
                            </li>
                            <li>
                                <p>Adapun mengenai rincian dari jumlah penawaran tersebut dapat dilihat secara rinci dalam lampiran surat penawaran harga,</p>
                            </li>
                            <li>
                                <p>Setelah dilakukan beberapa pembicaraan baik menyangkut negosiasi serta beberapa klariflkasi maka kedua belah pihak secara bersama sarna telah menyepakati pengurangan atas penawaran yang diajukan Penyedia barang/jasa dari <?php echo $data_ba[0]->nama_toko;?> sebesar Rp.<?php echo rupiah_php($permintaan);?> menjadi sebesar Rp.<?php echo rupiah_php($perjanjian);?> termasuk beban pajak dan bea materai yang harus dibayai Penyedia barang/jasa dari <?php echo $data_ba[0]->nama_toko;?> dan  selanjutnya penyedia barang/jasa dari <?php echo $data_ba[0]->nama_toko;?> akan membuat dan menyampaikan surat penawaran yang baru sesuai hasil kesepakatan ini dengan rincian sebagai berikut:</p>
                            </li>
                        </ol>
                        <table border="1" width="100%">
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Jenis Barang/Jasa</th>
                                <th style="text-align: center;">Volume</th>
                                <th style="text-align: center;">Satuan</th>
                                <th style="text-align: center;">Harga Satuan</th>
                                <th style="text-align: center;">Harga</th>
                            </tr>
                            <?php $i=0; foreach($data_ba as $a){?>
                                <tr>
                                    <td style="text-align: center;"><?php echo ($i+1).".";?></td>
                                    <td style="text-align: center;"><?php echo $a->nama_bahan;?></td>
                                    <td style="text-align: center;"><?php echo $a->jumlah_bahan_kg;?></td>
                                    <td style="text-align: center;"><?php echo $a->satuan_bahan;?></td>
                                    <td style="text-align: center;"><?php echo $a->harga_bahan_perjanjian;?></td>
                                    <td style="text-align: center;"><?php echo $a->jumlah_bahan_kg*$a->harga_bahan_perjanjian;?></td>
                                </tr>
                            <?php $i++;}?>
                        </table><br>
                        <ol type="a" start="4" style="margin-left: 0px;text-align: justify;">
                            <li>
                                <p>Kesepakatan Lain yang dihasilkan pada saat klarifikasi dan negosiasi harga adalah bahwa masing-masing pihak bersepakat untuk menuangkan proses kerjasama ini dalam bentuk Surat Perjanjian Kerjasama yang akan dibuat setelah proses klarifikasi dan negosiasi harga disepalati dan ditandatagani oleh kedua belah pihak.</p>
                            </li>
                        </ol>
                    </div>
                    <div class="col-lg-12" style="text-align: justify;">
                        <p>Demikian Berita Acara ini dibuat rangkap 2 (dua) masing-masing bermeterai cukup dan mempunyai kekuatan hukum yang sana untuk dipertanggungjawabkan sesuai peraturan perundang-undangan yang berlaku.</p>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <p>Direktur/Pimpinan</p><br><br>
                            <p>( <?php echo $a->pemilik_toko;?> )</p>
                        </div>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <div class="text-center">
                            <p>Ketua Tim Pelaksana Kegiatan</p><br><br>
                            <p>( <?php foreach($tpk as $s){
                                if($s->level_us=="tpk_kt"){ echo $s->nama_us;}
                            }?> )</p><br>
                        </div>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <div class="text-center">
                            <p>Mengetahui :</p>
                            <p>Kepala Desa</p><br><br>
                            <p>( <?php foreach($tpk as $s){
                                if($s->level_us=="kd"){ echo $s->nama_us;}
                            } ?> )</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-md btn-outline-info waves-effect waves-light pull-right" onclick="javascript:printDiv('print-ba-penawaran');">
                    <i class="mdi mdi-printer"></i> Cetak
                </button>
            </div>
        </div>
    </div>
</div>
