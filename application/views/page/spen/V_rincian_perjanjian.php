<div class="row">
    <div class="col-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Perjanjian Kerjasama</h4>
            </div>
            <div class="card-body print_warna">
                <?php //var_dump($data_perjanjian); 
                //var_dump($tpk);
                $total=0;
                foreach($data_perjanjian as $a){
                    $total+=$a->jumlah_bahan_kg*$a->harga_bahan_perjanjian;
                }
                foreach($data_perjanjian as $x){}?>
                <?php 

                    $tanggal = $x->tgl_mulai;
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
                <div class="row" style="margin-left: 80px;width: 80%;" id="print_pj">
                    <table style="width: 100%;text-align: center;">
                        <tr>
                            <th colspan="5" style="text-align: center;padding: 8px;"></th>
                        </tr>
                        <tr>
                            <th colspan="5" style="text-align: center;"><u><b>PERJANJIAN KERJASAMA</b></u></th>
                        </tr>
                        <tr>
                            <th colspan="5" style="text-align: center;font-size: 14px;"><b>Nomor :<?php echo $x->nomor_pj?></b></th>
                        </tr>
                        <tr>
                            <th colspan="5" style="text-align: center;padding: 8px;"></th>
                        </tr>
                    </table>
                    <div class="col-lg-12">
                        <p style="text-align: justify;"> Pada hari ini <?php echo $dayList[$day];?> Tanggal <?php echo indo_mysql($x->tgl_mulai);?> Yang bertanda tangan dibawah ini :</p>
                        <table style="margin-left: 20px;" width="100%">
                            <tr>
                                <td width="5%">1.</td>
                                <td width="10%">Nama</td>
                                <td>:</td>
                                <td width="85%"> <?php foreach($tpk as $nm){if($nm->level_us=="tpk_kt"){echo $nm->nama_us;}}?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td width="100px">Jabatan</td>
                                <td>:</td>
                                <td width="150px"> Ketua Tim Pengelola Kegiatan (TPK) Desa Pandanlandung Kecamatan Wagir Kab. Malang</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td width="100px">Alamat</td>
                                <td>:</td>
                                <td width="150px"> Jl. Tugu No.58, Krajan, Pandanlandung, Wagir, Malang</td>
                            </tr>
                        </table><br>
                        <p>selanjutnya disebut sebagai <b>PIHAK KESATU</b></p><br>
                        <table style="margin-left: 20px;">
                            <tr>
                                <td width="5%">2.</td>
                                <td width="10%">Nama</td>
                                <td>:</td>
                                <td width="85%"><?php echo $x->pemilik_toko;?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td width="100px">Jabatan</td>
                                <td>:</td>
                                <td width="150px"><?php echo "Pemilik Toko";?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td width="100px">Alamat</td>
                                <td>:</td>
                                <td width="150px"><?php echo $x->alamat_toko?></td>
                            </tr>
                        </table><br>
                        <p>selanjutnya disebut sebagai <b>PIHAK KEDUA</b></p><br>
                    </div>
                    <div class="col-lg-12">
                        <p style="text-align: justify;text-indent: 40px;">Berdasarkan hasil Berita Acara Negosiasi/Klarifikasi nomor <?php echo $x->nomor_ba;?> Tanggal <?php echo indo_mysql($x->tgl_ba);?> atas pekerjaan "<?php echo $x->nama_kg;?>", PIHAK KESATU dan PIHAK KEDUA menyatakan setuju/sepakat dengan ketentuan sebagai berikut:</p><br>
                        <p>Hasil negosiasi/klarifikasi sebagai berikut:</p>
                    </div>
                    <div class="col-lg-12">
                        <ol type="1" style="margin-left: 0px;">
                            <li>
                                <p>Lingkup Pekerjaan : <?php echo $x->nama_kg;?> yang berlokasi di <?php echo $x->lokasi_kg;?> Desa Pandanlandung Kec.Wagir Kab. Malang.</p>
                            </li>
                            <li>
                                <p>Nilai Pekerjaan Rp. <?php echo rupiah_php($total);?></p>
                            </li>
                            <li>
                                <p>Hak dan Kewajiban Para Pihak.</p>
                            </li>
                        </ol>
                        <ol type="a" style="margin-left: 40px;">
                            <li>
                                <p style="text-align: justify;">PIHAK KESATU mempunyai hak untuk meneliti, menerima, menolak, atau memerintahkan PIHAK KEDUA untuk menyempurnakan atau mengganti barang / jasa yang diadakan oleh PIHAK KEDUA apabila tidak sesuai spesifikasi, jumlah atau volume berdasarkan hasil negosiasi/klarifikasi antara PIHAK KESATU dan PIHAK KEDUA.</p>
                            </li>
                            <li>
                                <p style="text-align: justify;">PIHAK KESATU mempunyai kewajiban untuk membantu penyelesaian pembayaran atas pekerjaan yang telah diadakan oleh PIHAK KEDUA apabila PIHAK KEDUA telah melaksanakan kewajibannya atas pengadaan barang / jasa yang telah disepakati oleh KEDUA BELAH PIHAK.</p>
                            </li>
                            <li>
                                <p style="text-align: justify;">PIHAK KEDUA mempunyai kewajiban untuk melaksanakan pekerjaan sesuai  spesifikasi, waktu, jumalah atau volume pekerjaan pengadaan barang / jasa yang telah disepakati oleh KEDUA BELAH PIHAK serta membayar pajak-pajak atau dalam bentuk lain sesuai ketentuan peraturan yang berlaku.</p>
                            </li>
                            <li>
                                <p style="text-align: justify;">PIHAK KEDUA mempunyai hak untuk mendapat pembayaran apabila PIHAK KEDUA telah melaksanakan pekerjaan sesuai spesifikasi, jumlah atau volume berdasarkan hasil negosiasi / klarifikasi antara KEDUA BELAH PIHAK.</p>
                            </li>
                        </ol>
                        <?php
                            $tgl_awal = new DateTime($x->tgl_mulai);
                            $tgl_akhir = new DateTime($x->tgl_akhir);
                            $selisih = $tgl_awal->diff($tgl_akhir); 
                            if($selisih->format('%m')==0){
                                $waktu = $selisih->format('%d hari'); 
                            }else{
                                if($selisih->format('%d')==0){
                                    $waktu = $selisih->format('%m bulan');
                                }else{
                                    $waktu = $selisih->format('%m bulan, %d hari');
                                }
                            }
                        ?>
                        <ol start="4" style="margin-left: 0px;">
                            <li>
                                <p style="text-align: justify;">Jangka waktu pelaksanaan selama <?php echo $waktu;?>. Hari kalender mulai tanggal <?php echo indo_mysql($x->tgl_mulai);?> sampai dengan tanggal <?php echo indo_mysql($x->tgl_akhir);?>.</p>
                            </li>
                            <li>
                                <p style="text-align: justify;">Ketentuan keadaan kahar (force majoure) : <?php echo $x->ketentuan_pj;?></p>
                            </li>
                            <li>
                                <p>Sanksi : <?php echo $x->sanksi_pj;?></p>
                            </li>
                        </ol>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="text-center">
                            <label>PIHAK KESATU</label><br>
                            <label>Ketua TPK,</label><br><br><br>
                            <label>( <?php foreach($tpk as $nm){if($nm->level_us=="tpk_kt"){echo $nm->nama_us;}}?> )</label><br><br>
                        </div>
                        <div class="text-center">
                            <label>PIHAK KEDUA</label><br>
                            <label>Penyedia Barang / jasa</label><br><br><br>
                            <label>( <?php echo $x->pemilik_toko;?> )</label><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-md btn-outline-info waves-effect waves-light pull-right" onclick="javascript:printDiv('print_pj');">
                    <i class="mdi mdi-printer"></i> Cetak
                </button>
            </div>
        </div>
    </div>
</div>
