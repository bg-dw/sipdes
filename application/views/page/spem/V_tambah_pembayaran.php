<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Tambah Permintaan Pembayaran</h4>
            </div>
            <div class="card-body">
                <?php //var_dump($total_pembayaran);?>
                <form action="<?php echo base_url();?>index.php/c_pembayaran/ac_input_pembayaran" method="POST">
                    <?php global $tamp;$i=0; foreach($penawaran as $a){
                        $tamp[$i]=$a->harga_bahan_perjanjian*$a->jumlah_bahan_kg;
                    $i++;}?>
                    <input type="hidden" name="id_detail_kg" value="<?php echo $penawaran[0]->id_detail_kg;?>">
                    <div class="form-body">
                        <h3 class="box-title">Data SPP</h3>
                        <hr class="m-t-0 m-b-40">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Kegiatan :</label>
                                    <div class="col-md-9">
                                        <label><?php echo $a->nama_kg;?></label>
                                    </div>
                                </div>
                            </div>
                        </div><?php //echo count($total_pembayaran)+1;?>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Nomor SPP :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nomor" class="form-control" value="<?php echo ($total_pembayaran[0]->nomor_spp)+1;?>/SPP/21.12/<?php echo date('Y');?>" required="" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Tgl. dibuat :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="date" class="form-control" required="" placeholder="mm/dd/yyyy" value="<?php echo date('m/d/Y');?>" id="datepicker-autoclose">
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
                                            <span><?php echo "( ".terbilang(array_sum($tamp))." Rupiah)";?></span>
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
                                    <?php $i=0; foreach($penawaran as $b){?>
                                        <tr>
                                            <td><?php echo ($i+1).".";?></td>
                                            <td><?php echo $b->nama_bahan;?></td>
                                            <td style="text-align: center;"><?php echo $b->jumlah_bahan_kg;?></td>
                                            <td style="text-align: center;"><?php echo $b->satuan_bahan;?></td>
                                            <td style="text-align: center;"><?php echo $b->harga_bahan_perjanjian;?></td>
                                        </tr>
                                    <?php $i++;}?>
                                </table><br><br>
                            </div>
                        </div><br>
                        <h3 class="box-title">Data Kwitansi</h3>
                        <hr class="m-t-0 m-b-40">
                        <?php 
                        $i=0;
                        $no_kwt =  $total_kwt[0]->nomor_kwt;
                        foreach($penawaran as $b){?>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Nomor KWT :</label>
                                        <div class="col-md-9">
                                            <input type="text" name="nomor_kwt[]" class="form-control" value="<?php echo $no_kwt+=1;?>/KWT/21.12/<?php echo date('Y');?>" required="" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Nama Bahan :</label>
                                        <div class="col-md-9">
                                            <input type="hidden" name="id_bahan[]" class="form-control" value="<?php echo $b->id_bahan;?>" required="" readonly>
                                            <input type="text" class="form-control" value="<?php echo $b->nama_bahan;?>" required="" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Total Harga :</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="harga_kwt[]" value="<?php echo $b->harga_bahan_perjanjian*$b->jumlah_bahan_kg;?>" required="" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr style="margin-left: 5%;" class="col-md-8 m-l-0 m-t-0 m-b-30">
                        <?php $i++;}?>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-inverse" onclick="location.href='<?php echo base_url();?>index.php/c_pembayaran/';">Batal</button>
                                        <button type="submit" class="btn btn-info pull-right">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php //var_dump($data_kg);?>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
