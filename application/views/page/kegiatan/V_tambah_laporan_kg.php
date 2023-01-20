<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Laporan Kegiatan</h4>
            </div>
            <div class="card-body">
                <?php //var_dump($kegiatan);                ?>
                <?php foreach($kegiatan as $baris){}?>
                <form action="<?php echo base_url();?>index.php/c_kegiatan/ac_tambah_laporan/<?php echo $this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5);?>" enctype="multipart/form-data" method="POST">
                    <div class="form-body">
                        <h3 class="box-title">Tambah Laporan Kegiatan</h3>
                        <hr class="m-t-0 m-b-40">
                        <input type="hidden" name="id_detail_kg" value="<?=$baris->id_detail_kg?>">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Nama Kegiatan :</label>
                                    <div class="col-md-9">
                                        <label><?=$baris->nama_kg?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Volume (Orang):</label>
                                    <div class="col-md-9">
                                        <input type="number" name="volume" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Lokasi Kegiatan :</label>
                                    <div class="col-md-9">
                                        <label><?=$baris->lokasi_kg?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Kondisi Awal :</label>
                                    <div class="col-md-9">
                                        <textarea rows="4" type="text" name="k_awal" class="form-control" required=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Kondisi Akhir :</label>
                                    <div class="col-md-9">
                                        <textarea rows="4" type="text" name="k_akhir" class="form-control" required=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Kondisi(0%) :</label>
                                    <div class="col-md-9">
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="fa fa-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-secondary btn-file"> 
                                            <span class="fileinput-new">Pilih Foto</span>
                                        <span class="fileinput-exists">Ganti</span>
                                        <input type="file" name="f_1" required="">
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-secondary fileinput-exists" data-dismiss="fileinput">Hapus</a> </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Kondisi(50%) :</label>
                                    <div class="col-md-9">
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="fa fa-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-secondary btn-file"> 
                                            <span class="fileinput-new">Pilih Foto</span>
                                        <span class="fileinput-exists">Ganti</span>
                                        <input type="file" name="f_2" required="">
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-secondary fileinput-exists" data-dismiss="fileinput">Hapus</a> </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Kondisi(100%) :</label>
                                    <div class="col-md-9">
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="fa fa-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-secondary btn-file"> 
                                            <span class="fileinput-new">Pilih Foto</span>
                                        <span class="fileinput-exists">Ganti</span>
                                        <input type="file" name="f_3" required="">
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-secondary fileinput-exists" data-dismiss="fileinput">Hapus</a> </div>

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
                                        <button type="button" class="btn btn-inverse" onclick="location.href='<?php echo base_url();?>index.php/c_kegiatan/daftar_laporan_kg';">Batal</button>
                                        <button type="submit" class="btn btn-info pull-right" onclick="return confirm('Simpan Data?')">Simpan</button>
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