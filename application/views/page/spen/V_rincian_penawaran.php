<div class="row">
    <div class="col-12">
        <div class="card card-outline-info print_warna">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Penawaran</h4>
            </div>
            <?php //var_dump($data_penawaran);?>
            <div class="card-body" id="penawaran">
                <?php foreach($data_penawaran as $a){}?>
                    <div class="row" style="margin-left: 80px;width: 80%; margin-top: 0;">
                        <table style="width: 100%;">
                            <tr>
                                <th colspan="5" style="text-align: center;padding: 8px;"></th>
                            </tr>
                            <tr>
                                <th colspan="5" style="text-align: center;">TIM PENGELOLA KEGIATAN</th>
                            </tr>
                            <tr>
                                <th colspan="5" style="text-align: center;">DESA PANDANLANDUNG KEC. WAGIR KAB. MALANG</th>
                            </tr>
                            <tr>
                                <th colspan="5" style="text-align: center;padding: 8px;"></th>
                            </tr>
                        </table><br>
                        <div class="col-lg-12"><br>
                            <table>
                                <tr>
                                    <td>Nomor</td>
                                    <td width="10">:</td>
                                    <td><?php echo $a->nomor_pn;?></td>
                                </tr>
                                <tr>
                                    <td>Sifat</td>
                                    <td width="10">:</td>
                                    <td><?php echo $a->sifat_pn;?></td>
                                </tr>
                                <tr>
                                    <td>Lampiran</td>
                                    <td width="10">:</td>
                                    <td><?php echo $a->lampiran_pn;?></td>
                                </tr>
                                <tr>
                                    <td>Perihal</td>
                                    <td width="10">:</td>
                                    <td><?php echo $a->hal_pn;?></td>
                                </tr>
                            </table><br>
                        </div>
                        <div class="col-lg-12">
                            <p>Yth. Sdr. <?php echo $a->pemilik_toko;?></p><br>
                            <p>ditempat</p>
                        </div>
                        <div class="col-lg-12">
                            <p>Sehubung dengan akan dilaksanakan "<?php echo $a->nama_kg;?>" dimana didalamnya terdapat pekerjaan yang kami persyaratkan adalah :</p>
                            <ol type="1" style="margin-left: 0px;">
                                <li>
                                    <p>Ruang lingkup Pekerjaan : <?php echo $a->nama_kg;?>.</p>
                                </li>
                                <li>
                                    <p>Daftar barang atau jasa adapun spesifikasi teknis</p>
                                </li>
                            </ol>
                            <table border="1" width="100%">
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Jenis barang / jasa</th>
                                    <th style="text-align: center;">Volume</th>
                                    <th style="text-align: center;">Satuan</th>
                                </tr>
                                <?php  $i=0;foreach($data_penawaran as $isi){?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo ($i+1).".";?></td>
                                        <td style="padding-left: 5px;"><?php echo $isi->nama_bahan;?></td>
                                        <td style="text-align: center;"><?php echo $isi->jumlah_bahan_kg;?></td>
                                        <td style="text-align: center;"><?php echo $isi->satuan_bahan;?></td>
                                    </tr>
                                <?php $i++;}?>
                            </table><br>
                        </div>
                        <div class="col-lg-12">
                            <p>Maka apabila Saudara berminat dan bersedia melaksanakan pekerjaan tersebut, diminta segera mengajukan surat penawaran harga. Surat penawaran harga dialamatkan kepada <b><?php foreach($ttd as $nama){ if($nama->level_us=="pk"){echo $nama->nama_us;}}?></b> selaku tim pengelola kegiatan dengan ketentuan sebagai berikut:</p>

                            <ol type="1" style="margin-left: 0px;">
                                <li>
                                    <p>Surat penawaran dibuat rangkap3 (tiga) asli bermaterai RP. 6.000,00 dan sudah harus kami terima tanggal <?php echo indo_mysql($a->bts_tgl);?>.</p>
                                </li>
                                <li>
                                    <p>Surat penawaran dilampiri :</p>
                                    <ol type="a" style="margin-left: 0px;">
                                        <li>
                                            <p>Daftar penawaran harga termasuk dan jasa pengadaan</p>
                                        </li>
                                        <li>
                                            <p>Foto kopi Surat Ijin Usaha Perdagangan (SIUP);dan</p>
                                        </li>
                                        <li>
                                            <p>Foto kopi Nomor pokok wajib pajak (NPWP).</p>
                                        </li>
                                    </ol>
                                </li>
                            </ol>
                            <p>Demikian surat permintaan penawaran ini kami sampaikan atas perhatian Saudara diucapkan terima kasih.</p>
                        </div>
                        <div class="col-lg-10">
                            <div class="pull-left text-center">
                                <label>Mengetahui</label><br>
                                <label>Kepala Desa Pandanlandung,</label><br><br><br>
                                <label><?php foreach($ttd as $x){ if($x->level_us=="kd"){echo $x->nama_us;}}?></label>
                            </div>
                            <div class="pull-right text-center">
                                <label>Ketua</label><br>
                                <label>Tim Pengelola Kegiatan,</label><br><br><br>
                                <label><?php foreach($ttd as $x){ if($x->level_us=="pk"){echo $x->nama_us;}}?></label>
                            </div>
                        </div>
                    </div>
            </div>
            <?php if($this->session->userdata('level')=="pk"){ if($a->status_kg<4){?>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="<?php echo base_url();?>index.php/c_penawaran/cek_penawaran" method="POST" onsubmit="return confirm('Laporkan Penawaran?');">
                                <input type="hidden" name="id_rab" value="<?php echo $a->id_rab;?>">
                                <input type="hidden" name="id_kg" value="<?php echo $a->id_kg;?>">
                                <input type="hidden" name="id" value="<?php echo $a->id_pn;?>">
                                <input type="hidden" name="status" value="3">
                                <button class="btn btn-md btn-outline-warning waves-effect waves-light" type="submit">Cek Kembali
                                </button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="<?php echo base_url();?>index.php/c_penawaran/cek_penawaran" method="POST" onsubmit="return confirm('Verifikasi Penawaran?');">
                                <input type="hidden" name="id_rab" value="<?php echo $a->id_rab;?>">
                                <input type="hidden" name="id_kg" value="<?php echo $a->id_kg;?>">
                                <input type="hidden" name="id" value="<?php echo $a->id_pn;?>">
                                <input type="hidden" name="status" value="4">
                                <button class="btn btn-md btn-outline-info waves-effect waves-light pull-right">
                                    <i class="mdi mdi-checkbox-marked"></i> Verifikasi
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } }?>
            <?php if($this->session->userdata('level')=="tpk_sk"){?>
                <?php if($a->status_kg<4){?>
                    <div class="card-footer">
                        <button class="btn btn-md btn-outline-warning waves-effect waves-light" onclick="location.href='<?php echo base_url();?>index.php/c_penawaran/edit_penawaran/<?php echo $a->id_pn;?>/<?php echo $a->id_kg;?>/<?php echo $a->lokasi_kg;?>'">
                            <i class="mdi mdi-checkbox-marked"></i> Edit
                        </button>
                    </div>          
                <?php }?> 
            <?php }?>
        </div>
    </div>
</div>

<!-- undangan penawaran -->
<div class="row">
    <div class="col-12">
        <div class="card card-outline-info print_warna">
            <?php //var_dump($isi);?>
            <div class="card-body">
                <?php foreach($data_penawaran as $a){}?>
                    <div class="row" style="margin-left: 80px;width: 80%; margin-top: 0;" id="penawaran">
                        <table style="width: 100%;">
                            <tr>
                                <th colspan="5" style="text-align: center;padding: 8px;"></th>
                            </tr>
                            <tr>
                                <th colspan="5" style="text-align: center;">TIM PENGELOLA KEGIATAN</th>
                            </tr>
                            <tr>
                                <th colspan="5" style="text-align: center;">DESA PANDANLANDUNG KEC. WAGIR KAB. MALANG</th>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align: center;">Alamat :Jl. Tugu No.58, Krajan, Pandanlandung, Wagir, Malang, Jawa Timur 65158</td>
                            </tr>
                            <tr>
                                <th colspan="5" style="text-align: center;padding: 8px;"></th>
                            </tr>
                        </table><br>
                        <div class="col-lg-12"><br>
                            <table width="100%">
                                <tr>
                                    <td width="100%"><p style="margin-left: 70%;">Malang, <?php echo indo_mysql(date('Y/m/d'));?></p></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td>Nomor</td>
                                    <td width="10">:</td>
                                    <td><?php echo $a->nomor_pn;?></td>
                                </tr>
                                <tr>
                                    <td>Sifat</td>
                                    <td width="10">:</td>
                                    <td><?php echo $a->sifat_pn;?></td>
                                </tr>
                                <tr>
                                    <td>Lampiran</td>
                                    <td width="10">:</td>
                                    <td><?php echo $a->lampiran_pn;?></td>
                                </tr>
                                <tr>
                                    <td>Perihal</td>
                                    <td width="10">:</td>
                                    <td>Undangan Pengadaan Barang / Jasa</td>
                                </tr>
                            </table><br>
                        </div>
                        <div class="col-lg-12">
                            <p>Yth. Sdr. <?php echo $a->pemilik_toko;?></p><br>
                            <p>ditempat</p>
                        </div>
                        <div class="col-lg-12">
                            <p>Yang bertanda tangan dibawah ini :</p>
                            <table width="100%">
                                <tr>
                                    <td width="15%">Nama</td>
                                    <td width="5px">:</td>
                                    <td><?php foreach($ttd as $nama){ if($nama->level_us=="pk"){echo $nama->nama_us;}}?></td>
                                </tr>
                                <tr>
                                    <td width="15%">Jabatan</td>
                                    <td width="5px">:</td>
                                    <td>Ketua Tim Pengelola Kegiatan (TPK) Desa Pandanlandung Kecamatan Wagir Kab. Malang</td>
                                </tr>
                                <tr>
                                    <td width="15%">Alamat</td>
                                    <td width="5px">:</td>
                                    <td>Jl. Tugu No.58, Krajan, Pandanlandung, Wagir, Malang, Jawa Timur 65158</td>
                                </tr>
                            </table><br>
                            <p>Dalam rangka mendukung pelaksanaan :</p>
                            <table width="100%">
                                <tr>
                                    <td width="15%">Kegiatan</td>
                                    <td width="5px">:</td>
                                    <td><?php echo $a->nama_kg;?></td>
                                </tr>
                            </table><br>
                            <p>Dengan ini kami menawarkan pengadaan barang/jasa sebagai berikut :</p>
                            <table border="1" width="100%">
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Jenis barang / jasa</th>
                                    <th style="text-align: center;">Volume</th>
                                    <th style="text-align: center;">Satuan</th>
                                </tr>
                                <?php  $i=0;foreach($data_penawaran as $v){?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo ($i+1).".";?></td>
                                        <td style="padding-left: 5px;"><?php echo $v->nama_bahan;?></td>
                                        <td style="text-align: center;"><?php echo $v->jumlah_bahan_kg;?></td>
                                        <td style="text-align: center;"><?php echo $v->satuan_bahan;?></td>
                                    </tr>
                                <?php $i++;}?>
                            </table><br>
                        </div>
                        <div class="col-lg-12">
                            <p>Selanjutnya kami mohon agar dapat menyampaikan penawaran atas pengadaan barang/jasa tersebut diatas dengan mencantumkan nama barang/jasa,volume/satuan,dan spesifikasi harga.</p>

                            <ol type="1" style="margin-left: 0px;">
                                <li>
                                    <p>Surat penawaran dibuat rangkap3 (tiga) asli bermaterai RP. 6.000,00 dan sudah harus kami terima tanggal <?php echo indo_mysql($a->bts_tgl);?>.</p>
                                </li>
                                <li>
                                    <p>Surat penawaran dilampiri :</p>
                                    <ol type="a" style="margin-left: 0px;">
                                        <li>
                                            <p>Daftar penawaran harga termasuk dan jasa pengadaan</p>
                                        </li>
                                        <li>
                                            <p>Foto kopi Surat Ijin Usaha Perdagangan (SIUP);dan</p>
                                        </li>
                                        <li>
                                            <p>Foto kopi Nomor pokok wajib pajak (NPWP).</p>
                                        </li>
                                    </ol>
                                </li>
                            </ol>
                            <p>Demikian atas perhatian dan kerjasamanya diucapkan terima kasih.</p>
                        </div>
                        <div class="col-lg-10">
                            <div class="pull-left text-center">
                                <label>Mengetahui</label><br>
                                <label>Kepala Desa Pandanlandung,</label><br><br><br>
                                <label><?php foreach($ttd as $x){ if($x->level_us=="kd"){echo $x->nama_us;}}?></label>
                            </div>
                            <div class="pull-right text-center">
                                <label>Ketua</label><br>
                                <label>Tim Pengelola Kegiatan,</label><br><br><br>
                                <label><?php foreach($ttd as $x){ if($x->level_us=="pk"){echo $x->nama_us;}}?></label>
                            </div>
                        </div>
                        <div class="col-lg-12"><br>
                            <p>Keterangan : <br>Jika uraian barang/jasa tidak dapat dimuat pada kolom diatas, maka dapat dilampirkan, termasuk dokumen atau data pendukung lainnya.</p>
                        </div>
                    </div>
            </div>
            <?php if($this->session->userdata('level')=="pk"){ if($a->status_kg>=4){?>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-md btn-outline-info waves-effect waves-light pull-right" onclick="printDiv('penawaran');">
                                <i class="mdi mdi-printer"></i> Cetak
                            </button>
                        </div>
                    </div>
                </div>
            <?php } }?>
        </div>
    </div>
</div>
