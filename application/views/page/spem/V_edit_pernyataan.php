<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Tambah Permintaan Pembayaran</h4>
            </div>
            <div class="card-body">
                <?php //var_dump($isi);?>
                <form action="<?php echo base_url();?>index.php/c_pembayaran/ac_edit_pernyataan" method="POST">
                    <?php global $tamp;$i=0; foreach($isi as $a){
                        $tamp[$i]=$a->harga_bahan*$a->jumlah_bahan_rab;
                    $i++;}?>
                    <input type="hidden" name="id_kg" value="<?php echo $isi[0]->id_kg;?>">
                    <input type="hidden" name="id_tj" value="<?php echo $isi[0]->id_tj;?>">
                    <div class="form-body">
                        <h3 class="box-title">Data SPTB</h3>
                        <hr class="m-t-0 m-b-40">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Penerima :</label>
                                    <div class="col-md-9">
                                        <label><?php echo $pk[0]->nama_us;?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Kegiatan :</label>
                                    <div class="col-md-9">
                                        <label><?php echo $a->nama_kg;?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Tgl. dibuat :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="date" class="form-control" required="" placeholder="mm/dd/yyyy" value="<?php echo date('m/d/Y',strtotime($a->tgl_dibuat));?>" id="datepicker-autoclose">
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Total Pembayaran :</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="harga_pembayaran" value="<?php echo array_sum($tamp);?>" required="" readonly><br>
                                            <span><?php echo "( ".terbilang(array_sum($tamp))." )";?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <br>
                        <h3 class="box-title">Data Bahan</h3>
                        <hr class="m-t-0 m-b-40">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label class="control-label col-md-5">Spesifikasi Barang / Jasa :</label><br>
                                <table border="1" width="100%">
                                    <tr>
                                        <th style="text-align: center;">NO.</th>
                                        <th style="text-align: center;">JENIS BARANG/JASA</th>
                                        <th style="text-align: center;">VOLUME</th>
                                        <th style="text-align: center;">SATUAN</th>
                                        <th style="text-align: center;">HARGA SATUAN</th>
                                    </tr>
                                    <?php $i=0; foreach($isi as $row){?>
                                        <tr>
                                            <td><?php echo ($i+1).".";?></td>
                                            <td><?php echo $row->nama_bahan;?></td>
                                            <td style="text-align: center;"><?php echo $row->jumlah_bahan_rab;?></td>
                                            <td style="text-align: center;"><?php echo $row->satuan_bahan;?></td>
                                            <td style="text-align: center;"><?php echo $row->harga_bahan;?></td>
                                        </tr>
                                    <?php $i++;}?>
                                </table><br><br>
                            </div>
                        </div><br>
                        <h3 class="box-title">Data Pembayaran</h3>
                        <hr class="m-t-0 m-b-40">
                        <?php foreach($isi as $c){?>
                            <input type="hidden" class="form-control" name="harga[]" value="<?php echo $c->id_bahan;?>" required="" readonly>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Kel. Bahan :</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" value="<?php echo $c->kel_bahan;?>" required="" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Nama Bahan :</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" value="<?php echo $c->nama_bahan;?>" required="" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Total Harga :</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="harga_kwt[]" value="<?php echo $c->harga_total_kwt;?>" required="" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr style="margin-left: 5%;" class="col-md-8 m-l-0 m-t-0 m-b-30">
                        <?php }?>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-inverse" onclick="location.href='<?php echo base_url();?>index.php/c_pembayaran/daftar_pernyataan';">Batal</button>
                                        <button type="submit" class="btn btn-info pull-right">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
