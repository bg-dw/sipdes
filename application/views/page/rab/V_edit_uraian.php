<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">RAB Kegiatan</h4>
            </div>
            <?php //var_dump($rab);
            //var_dump($rt);?>
            <div class="card-body">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <h3 class="control-label text-left col-md-7">Kegiatan</h3>
                            </div>
                        </div>
                    </div>
                    <hr class="m-t-0 m-b-40">
                    <form action="<?php echo base_url();?>index.php/c_rab/ac_edit_bahan_kegiatan" method="POST" onsubmit="return cek()">
                        <?php foreach($kegiatan as $a){}?>
                        <input type="hidden" name="id_detail_kg" class="form-control" value="<?php echo $a->id_detail_kg;?>" required="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2">Nama Kegiatan</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" name="id_kg" required="">
                                                <option value="<?php echo $a->id_kg;?>"><?php echo $a->nama_kg;?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2">Periode RAB</label>
                                    <div class="col-md-3">
                                        <select class="form-control custom-select" name="id_rab" required="">
                                            <option value="<?php echo $a->id_rab;?>" selected><?php echo $a->periode_rab;?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2">Nominal Kegiatan</label>
                                    <div class="col-md-3">
                                      <input type="number" value="<?php echo $a->nominal_kegiatan_rab;?>" name="harga" class="form-control" min="1" required="" id="harga_kg" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2">Lokasi</label>
                                    <?php $tamp=explode("-",$a->lokasi_kg);?>
                                    <div class="col-md-3">
                                        <select class="form-control custom-select" name="rt" required="">
                                            <option value="">-Pilih RT-</option>
                                            <option value="<?php echo substr($tamp[0], 3);?>" selected=""><?php echo substr($tamp[0], 3);?></option>
                                            <?php for($i=1;$i<=26;$i++){ ?>
                                                <option value="<?php if($i<=9){echo "00".$i;}else{echo "0".$i;}?>"><?php if($i<=9){echo "00".$i;}else{echo "0".$i;}?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control custom-select" name="rw" required="">
                                            <option value="">-Pilih RW-</option>
                                            <option value="<?php echo substr($tamp[1], 3);?>" selected=""><?php echo substr($tamp[1], 3);?></option>
                                            <?php for($i=1;$i<=6;$i++){ ?>
                                                <option value="<?php if($i<=9){echo "00".$i;}else{echo "0".$i;}?>"><?php if($i<=9){echo "00".$i;}else{echo "0".$i;}?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2">Keluaran</label>
                                    <div class="col-md-9">
                                        <input type="text" name="keluaran" class="form-control" placeholder="Keluaran Kegiatan" value="<?php echo $a->keluaran_kg;?>" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 class="box-title">Daftar Belanja</h3>
                        <hr class="m-t-0 m-b-40">
                        <?php $i=0; foreach($kegiatan as $isi){?>
                            <input type="hidden" name="id_bahan_sebelum[]" value="<?php echo $isi->id_bahan;?>">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Belanja</label>
                                        <div class="col-md-8">
                                            <select class="form-control custom-select" name="id_bahan_kg[]" data-placeholder="Choose a Category" onchange="myFunction(event,'<?php echo $i;?>');" id="id_bahan<?php echo $i;?>">
                                                <option value="">--</option>
                                                <?php foreach($bahan as $b){ ?>
                                                    <option value="<?php echo $b->id_bahan;?>" <?php if($b->id_bahan==$isi->id_bahan){ echo "selected";}?>><?php echo $b->nama_bahan;?></option>
                                                <?php }?>
                                            </select><span class="help-block text-muted text-center"><small>Pilih nama belanja</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-7">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Satuan</label>
                                        <div class="col-md-8">
                                          <input type="text" name="satuan[]" value="<?php echo $isi->satuan_bahan;?>" class="form-control" id="satuan<?php echo $i;?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Harga Satuan</label>
                                        <div class="col-md-8">
                                          <input type="number" name="harga_bahan_kg[]" value="<?php echo $isi->harga_bahan_kg;?>" class="form-control" min="1" id="harga<?php echo $i;?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Jumlah</label>
                                        <div class="col-md-8">
                                          <input type="number" name="jumlah_bahan_kg[]" value="<?php echo $isi->jumlah_bahan_kg;?>" class="form-control" min="1" id="jumlah<?php echo $i;?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="m-t-0 m-b-40">
                        <?php $i++;}?>
                        <input type="hidden" value="<?php echo $i;?>" id="jumlah_bahan">
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-info pull-right">Simpan</button>
                                            <button type="button" class="btn btn-inverse pull-right" style="margin-right: 2%;" onclick="location.href='<?php echo base_url();?>index.php/c_rab/daftar_rab_kegiatan';">Batal</button>
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
</div>
<!-- Row -->
<script type="text/javascript">
    function  myFunction(e,index){
        var id = e.target.value;
        $.ajax({
            url : "<?php echo base_url();?>index.php/c_rab/get_satuan",
            method : "POST",
            data : {id: id},
            async : false,
            dataType : 'json',
            success: function(data){
                $('#satuan'+index).val(data[0].satuan_bahan); 
                $('#harga'+index).val(data[0].harga_bahan); 
            }
        });
    }
</script>

<script type="text/javascript">
    var sub_total=[];
    function cek() {
        var a,b,c;
        a=$("#jumlah_bahan").val();
        for(var i=0;i<a;i++){
            b=$("#harga"+i).val();
            c=$("#jumlah"+i).val();
            sub_total.push(b*c);   
        }
        var total_kegiatan = $('#harga_kg').val();
        var total_bahan = sub_total.reduce(add, 0);
        if (total_kegiatan != total_bahan && total_kegiatan!="") {
            alert('Total RAB dengan Total Nominal Kegiatan Tidak Sama!');
            sub_total=[];
            return false;
        }else{
            sub_total=[];
            return confirm('Simpan Data?');
        }
    }
    function add(a, b) {
        return parseInt(a) + parseInt(b);
    }
</script>