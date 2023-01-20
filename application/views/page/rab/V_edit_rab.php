<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Edit RAB</h4>
            </div>
            <?php 
            // var_dump($rab);
            // echo "<br>";
            // var_dump($kegiatan_rab);?>
            <div class="card-body">
                <form action="<?php echo base_url();?>index.php/c_rab/ac_edit" method="POST" onsubmit="return cek()">
                    <div class="form-body">
                        <?php foreach($kg as $x){}?>
                        <input type="hidden" name="id" value="<?php echo $rab[0]->id_rab?>" class="form-control" required="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2">Tahun Anggaran</label>
                                    <div class="col-md-2">
                                      <input type="number" name="th" value="<?php echo $rab[0]->periode_rab;?>" class="form-control text-center yearpicker" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2">Bidang</label>
                                    <div class="col-md-9">
                                        <label><?php echo $x->bidang_kg;?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2">Total Anggaran</label>
                                    <div class="col-md-5">
                                        <input type="number" min="1" name="nilai" value="<?php echo $rab[0]->nilai_rab;?>" class="form-control" required="" id="nilai_rab">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2">Lokasi</label>
                                    <div class="col-md-5">
                                        <input type="text" name="lokasi" value="<?php echo $rab[0]->lokasi_rab;?>" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 class="box-title">Kegiatan</h3>
                        <hr class="m-t-0 m-b-40">
                        <?php $i=0;$total=0; foreach($kegiatan_rab as $s){
                            $waktu=explode(" " ,$s->waktu_pelaksanaan);
                            ?>
                            <input type="hidden" name="id_detail[]" value="<?php echo $s->id_detail_kg?>" class="form-control" required="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-2">Nama Kegiatan</label>
                                        <div class="col-md-9">
                                            <select class="form-control custom-select" name="id_kg[]" id="kg<?php echo $i;?>">
                                                <?php foreach($kg as $a){?>
                                                    <option value="<?php echo $a->id_kg;?>" <?php if($s->id_kg==$a->id_kg){ echo "selected";}?>><?php echo $a->nama_kg;?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-2">Nominal Kegiatan</label>
                                        <div class="col-md-5">
                                            <input type="number" min="1" name="nilai_kg[]" value="<?php echo $s->nominal_kegiatan_rab;?>" class="form-control" id="hg<?php echo $i;?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-2">Waktu Kegiatan</label>
                                        <div class="col-md-2">
                                            <input type="number" min="1" name="j_kg[]" value="<?php echo $waktu[0];?>" class="form-control" id="jumlah_w<?php echo $i;?>">
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-control" name="w_kg[]" id="jenis_w<?php echo $i;?>">
                                                <option value="Hari" <?php if($waktu[1]=="Hari"){ echo "selected";}?>>Hari</option>
                                                <option value="Minggu" <?php if($waktu[1]=="Minggu"){ echo "selected";}?>>Minggu</option>
                                                <option value="Bulan" <?php if($waktu[1]=="Bulan"){ echo "selected";}?>>Bulan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="m-t-0 m-b-40">
                        <?php $i++;}?>
                        <input type="hidden" id="total_nilai" value="<?php echo $i;?>">
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-info pull-right">Simpan</button>
                                        <button type="button" class="btn btn-inverse pull-right" style="margin-right: 2%;" onclick="location.href='<?php echo base_url();?>index.php/c_rab/';">Batal</button>
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
<script type="text/javascript">
    function cek() {
        var total_rab = $('#nilai_rab').val();
        var total_record = $('#total_nilai').val();
        var total_kegiatan = 0;
        for(var i=0;i<total_record;i++){
            total_kegiatan+=parseInt($('#hg'+i).val());
        }
        if (total_rab != total_kegiatan && total_rab!="") {
            alert('Total RAB dengan Total Nominal Kegiatan Tidak Sama!');
            console.log(total_rab+"="+total_kegiatan);
            return false;
        }else{
            return confirm('Simpan Data?');
        }
    }
</script>