<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Tambah SPTB</h4>
            </div>
            <div class="card-body">
                <?php //var_dump($isi);
                //var_dump($pk);?>
                <form action="<?php echo base_url();?>index.php/c_pembayaran/set_pernyataan" method="POST">
                    <?php //var_dump($isi); 
                    global $tamp;$i=0; foreach($isi as $a){
                        $tamp[$i]=$a->harga_bahan_perjanjian*$a->jumlah_bahan_kg;
                    $i++;}?>
                    <input type="hidden" name="id_detail_kg" value="<?php echo $isi[0]->id_detail_kg;?>">
                    <input type="hidden" name="id_us" value="<?php echo $pk[0]->id_user;?>">
                    <div class="form-body">
                        <h3 class="box-title">Data SPTB</h3>
                        <hr class="m-t-0">
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
                                    <label class="control-label text-right col-md-3">Total Pembayaran :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="harga_pembayaran" value="<?php echo array_sum($tamp);?>" required="" readonly><br>
                                        <span><?php echo "( ".terbilang(array_sum($tamp))." )";?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h3 class="box-title">Data Pembayaran</h3>
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
                                    <?php $total=0;$i=0; foreach($isi as $b){?>
                                        <tr>
                                            <td><?php echo ($i+1).".";?></td>
                                            <td><?php echo $b->nama_bahan;?></td>
                                            <td style="text-align: center;"><?php echo $b->jumlah_bahan_kg." ".$b->satuan_bahan;?></td>
                                            <td style="text-align: center;"><?php echo $b->satuan_bahan;?></td>
                                            <td style="text-align: right;"><?php echo rupiah_php($b->harga_bahan_perjanjian);?></td>
                                        </tr>
                                    <?php $total+=$b->jumlah_bahan_kg*$b->harga_bahan_perjanjian; $i++;}?>
                                    <tr>
                                        <td></td>
                                        <td colspan="3"><?php echo "Total";?></td>
                                        <td style="text-align: right;"><?php echo rupiah_php($total);?></td>
                                    </tr>
                                </table><br><br>
                            </div>
                        </div>
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
                <?php //var_dump($isi);?>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
