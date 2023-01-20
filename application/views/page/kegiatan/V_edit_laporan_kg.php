<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Laporan Kegiatan</h4>
            </div>
            <div class="card-body">
                <?php //var_dump($kegiatan);
                ?>
                <?php foreach($kegiatan as $baris){}?>
                <form action="<?php echo base_url();?>index.php/c_kegiatan/ac_edit_laporan/<?php echo $this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5);?>" enctype="multipart/form-data" method="POST">
                    <div class="form-body">
                        <h3 class="box-title">Edit Laporan Kegiatan</h3>
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
                                        <input type="number" name="volume" class="form-control" value="<?=$baris->volume_kg?>" required="">
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
                                        <textarea rows="4" type="text" name="k_awal" class="form-control" required=""><?php echo $baris->kondisi_awal?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Kondisi Akhir :</label>
                                    <div class="col-md-9">
                                        <textarea rows="4" type="text" name="k_akhir" class="form-control" required=""><?php echo $baris->kondisi_akhir?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Kondisi(0%) :</label>
                                    <div class="col-md-9">
                                        <img class="img-responsive pad" style="margin: 10px auto;vertical-align: middle;max-width: 500px;max-height: 280;" src="<?php echo base_url();?>assets/dist/kegiatan/<?php echo $baris->foto_sebelum;?>" data-toggle="tooltip" title="Klik Untuk Edit" id="pic_id1" onclick="document.getElementById('id1').click()">
                                        <input type="hidden" name="pic_lama1" value="<?php echo $baris->foto_sebelum;?>">
                                        <input type="file" id="id1" name="f_1" onchange="readURL(this);" style="display: none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Kondisi(50%) :</label>
                                    <div class="col-md-9">
                                        <img class="img-responsive pad" style="margin: 10px auto;vertical-align: middle;max-width: 500px;max-height: 280;" src="<?php echo base_url();?>assets/dist/kegiatan/<?php echo $baris->foto_progres;?>" data-toggle="tooltip" title="Klik Untuk Edit" id="pic_id2" onclick="document.getElementById('id2').click()">
                                        <input type="hidden" name="pic_lama2" value="<?php echo $baris->foto_progres;?>">
                                        <input type="file" id="id2" name="f_2" onchange="readURL(this);" style="display: none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Kondisi(100%) :</label>
                                    <div class="col-md-9">
                                        <img class="img-responsive pad" style="margin: 10px auto;vertical-align: middle;max-width: 500px;max-height: 280;" src="<?php echo base_url();?>assets/dist/kegiatan/<?php echo $baris->foto_sesudah;?>" data-toggle="tooltip" title="Klik Untuk Edit" id="pic_id3" onclick="document.getElementById('id3').click()">
                                        <input type="hidden" name="pic_lama3" value="<?php echo $baris->foto_sesudah;?>">
                                        <input type="file" id="id3" name="f_3" onchange="readURL(this);" style="display: none;">
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
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#pic_'+input.id).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>