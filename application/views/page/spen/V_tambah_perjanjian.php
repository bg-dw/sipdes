<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Tambah Perjanjian Kerjasama</h4>
            </div>
            <div class="card-body">
                <?php 
                //var_dump($data_perjanjian);?>
                <?php global $total; $i=0; foreach($data_perjanjian as $a){
                    $total[$i]= $a->jumlah_bahan_kg*$a->harga_bahan_perjanjian;
                    $i++;
                }?>
                <?php foreach($data_perjanjian as $x){}?>
                <form action="<?php echo base_url();?>index.php/c_penawaran/set_perjanjian" class="repeater form-horizontal" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="id_pj" value="<?php echo $x->id_pj;?>">
                    <input type="hidden" name="id_detail_kg" value="<?php echo $x->id_detail_kg;?>">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Kegiatan :</label>
                                    <div class="col-md-9">
                                        <label><?php echo $x->nama_kg;?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Nomor Perjanjian :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nomor" class="form-control" value="<?php if(strlen($total_pj[0]->nomor)==1){echo "00";}elseif(strlen($total_pj[0]->nomor==2)){echo "0";} echo ($total_pj[0]->nomor)+1;?>/PERJANJIAN/21.12/<?php echo date('Y');?>" required="" readonly id="nomor">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Total Harga Perjanjian :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="harga" class="form-control" value="<?php echo array_sum($total);?>" required="" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Jangka Waktu :</label>
                                    <div class="form-group row col-md-8">
                                        <div class="col-md-5">
                                            <input type="text" value="<?php echo date('m/d/Y');?>" min="1" class="form-control date-min-today" name="sejak_tgl" value="1" required="">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Sampai</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" value="<?php echo date('m/d/Y');?>" min="1" class="form-control date-min-today" name="sampai_tgl" value="1" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Ketentuan :</label>
                                    <div class="col-md-9">
                                        <textarea name="ketentuan" class="te1 form-control" rows="10" ></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Sanksi :</label>
                                    <div class="col-md-9">
                                        <textarea name="sanksi" class="te2 form-control" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 class="box-title">Data Toko </h3>
                        <hr class="m-t-0 m-b-40">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Nama Toko :</label>
                                    <div class="col-md-9">
                                        <label><?php echo $x->nama_toko;?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Nama Pemilik :</label>
                                    <div class="col-md-9">
                                        <label><?php echo $x->pemilik_toko;?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Jabatan :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="jabatan" value="Direktur/Pemilik" class="form-control" required="" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Alamat :</label>
                                    <div class="col-md-9">
                                        <textarea name="alamat" class="form-control" rows="4" required="" readonly=""><?php echo $x->alamat_toko;?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-inverse" onclick="location.href='<?php echo base_url();?>index.php/c_penawaran/daftar_perjanjian';">Batal</button>
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
