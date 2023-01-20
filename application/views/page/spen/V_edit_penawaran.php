<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Edit Permintaan Penawaran</h4>
            </div>
            <div class="card-body">
                <?php //var_dump($data_penawaran);?>
                <form action="<?php echo base_url();?>index.php/c_penawaran/ac_edit_penawaran" class="repeater form-horizontal" enctype="multipart/form-data" method="POST">
                    <?php foreach($data_penawaran as $a){}?>
                    <input type="hidden" name="id_pn" value="<?php echo $a->id_pn;?>">
                    <input type="hidden" name="id_rab" value="<?php echo $a->id_rab;?>">
                    <input type="hidden" name="id_kg" value="<?php echo $a->id_kg;?>">
                    <div class="form-body">
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
                                    <label class="control-label text-right col-md-3">Nomor :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nomor" class="form-control" value="<?php echo $a->nomor_pn;?>" required="" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Sifat :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="sifat" class="form-control" value="<?php echo $a->sifat_pn;?>" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Lampiran :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="lampiran" class="form-control" value="<?php echo $a->lampiran_pn;?>" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Hal :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="hal" class="form-control" value="<?php echo $a->hal_pn;?>" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Nama Tujuan/Pihak Ketiga :</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="nama_tujuan" required="">
                                            <?php foreach($data_toko as $tk){?>
                                                <option value="<?php echo $tk->id_toko;?>" <?php if($a->id_toko==$tk->id_toko){echo "selected";}?>><?php echo $tk->pemilik_toko." (".$tk->nama_toko.")";?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Batas Pengumpulan :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="date" class="form-control datepicker-autoclose" value="<?php echo date('m/d/Y',strtotime($a->bts_tgl));?>" required="" placeholder="mm/dd/yyyy">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                            <label class="control-label col-md-5">Spesifikasi Barang / Jasa :</label><br>
                            <table border="1" width="100%">
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Jenis Barang / Jasa</th>
                                    <th style="text-align: center;">Jumlah</th>
                                    <th style="text-align: center;">Harga</th>
                                    <th style="text-align: center;">Sub Total</th>
                                </tr>
                                <?php $i=0;$total=0; foreach($data_penawaran as $b){?>
                                <tr>
                                    <td><?php echo ($i+1).".";?></td>
                                    <td><?php echo $b->nama_bahan;?></td>
                                    <td style="text-align: center;"><?php echo $b->jumlah_bahan_kg." ".$b->satuan_bahan;?></td>
                                    <td style="text-align: right;padding-right: 10px;"><?php echo rupiah_php($b->harga_bahan_kg)?></td>
                                    <td style="text-align: right;padding-right: 10px;"><?php echo rupiah_php($b->harga_bahan_kg*$b->jumlah_bahan_kg);?></td>
                                </tr>
                                <?php $total+=$b->harga_bahan_kg*$b->jumlah_bahan_kg;?>
                            <?php $i++;}?>
                                <tr>
                                    <td></td>
                                    <td colspan="3" style="text-align: right;padding-right: 10px;">Total</td>
                                    <td style="text-align: right;padding-right: 10px;"><?php echo rupiah_php($total);?></td>
                                </tr>
                            </table><br><br>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-inverse" onclick="location.href='<?php echo base_url();?>index.php/c_penawaran/';">Batal</button>
                                        <button type="submit" class="btn btn-info pull-right">Simpan</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"> </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
