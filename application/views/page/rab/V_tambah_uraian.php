<script type="text/javascript">
    function tester(){
        window.location.hash = '#belanja';
    }</script>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">RAB Kegiatan</h4>
            </div>
            <?php //var_dump($rab);?>
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
                    <form action="<?php echo base_url();?>index.php/c_rab/ac_input_bahan_kegiatan" method="POST" onsubmit="return cek()" id="form_belanja">
                        <?php foreach($rab as $a){}?>
                        <input type="hidden" value="<?php echo $a->id_detail_kg;?>" name="id_detail" class="form-control" required="" readonly>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2">Nama Kegiatan</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" name="id_kg" required="">
                                            <?php foreach($rab as $a){?>
                                                <option value="<?php echo $a->id_kg;?>"><?php echo $a->nama_kg;?></option>
                                            <?php }?>
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
                                            <?php foreach($rab as $a){?>
                                                <option value="<?php echo $a->id_rab;?>" selected><?php echo $a->periode_rab;?></option>
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
                                    <div class="col-md-3">
                                        <select class="form-control custom-select" name="rw" required="" id="inp_rw">
                                            <option value="">-Pilih RW-</option>
                                            <?php for($i=1;$i<=6;$i++){ ?>
                                                <option value="<?php if($i<=9){echo "00".$i;}else{echo "0".$i;}?>" <?php if($kegiatan!=""){if($i==intval($kegiatan['rw'])){echo "selected";}}?>><?php if($i<=9){echo "00".$i;}else{echo "0".$i;}?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control custom-select" name="rt" required="" id="inp_rt">
                                            <option value="">-Pilih RT-</option>
                                            <?php for($i=1;$i<=26;$i++){ ?>
                                                <option value="<?php if($i<=9){echo "00".$i;}else{echo "0".$i;}?>" <?php if($kegiatan!=""){if($i==intval($kegiatan['rt'])){echo "selected";}}?>><?php if($i<=9){echo "00".$i;}else{echo "0".$i;}?></option>
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
                                        <input type="text" name="keluaran" class="form-control" placeholder="Keluaran Kegiatan" required="" id="inp_kel" value="<?php if($kegiatan!=""){echo $kegiatan['keluaran'];}?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_bahan_kg" value="<?php if($uraian){echo $uraian['id_bahan'];}?>">
                        <input type="hidden" name="harga_bahan_kg" value="<?php if($uraian){echo $uraian['harga_bahan'];}?>">
                        <input type="hidden" name="jumlah_bahan_kg" value="<?php if($uraian){echo $uraian['jumlah_bahan'];}?>">
                        <?php //var_dump($kegiatan);
                        ?>
                    </form>
                    <form action="<?php echo base_url()."index.php/c_rab/isi_uraian/".$this->uri->segment(3)."/".$this->uri->segment(4)."/";?>" method="POST" id="isi_uraian" onsubmit="set_data()">
                        <div id="belanja">
                            <h3 class="box-title">Daftar Belanja</h3>
                        </div>
                        <input type="hidden" name="inp_rw" id="b_rw">
                        <input type="hidden" name="inp_rt" id="b_rt">
                        <input type="hidden" name="inp_keluaran" id="b_keluaran">
                        <input type="hidden" name="id_bahan_kg" id="id_inp" value="<?php if($uraian){echo $uraian['id_bahan'];}?>">
                        <input type="hidden" name="nama_bahan_kg" id="nm_inp" value="<?php if($uraian){echo $uraian['nama_bahan'];}?>">
                        <input type="hidden" name="satuan_bahan_kg" id="st_inp" value="<?php if($uraian){echo $uraian['satuan_bahan'];}?>">
                        <input type="hidden" name="harga_bahan_kg" id="hg_inp" value="<?php if($uraian){echo $uraian['harga_bahan'];}?>">
                        <input type="hidden" name="jumlah_bahan_kg" id="jml_inp" value="<?php if($uraian){echo $uraian['jumlah_bahan'];}?>">
                        <hr class="m-t-0 m-b-40">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Belanja</label>
                                        <div class="col-md-8">
                                            <select class="form-control custom-select" name="id_bahan" data-placeholder="Choose a Category" onchange="myFunction(event);" id="id_bahan">
                                                <option value="">--</option>
                                                <?php foreach($bahan as $b){ ?>
                                                    <option value="<?php echo $b->id_bahan.",".$b->nama_bahan;?>"><?php echo $b->nama_bahan;?></option>
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
                                          <input type="text" name="satuan" class="form-control" id="satuan" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Harga Satuan</label>
                                        <div class="col-md-8">
                                          <input type="number" name="harga" class="form-control" min="1" id="harga">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Jumlah</label>
                                        <div class="col-md-8">
                                          <input type="number" name="jumlah" class="form-control" min="1" id="jumlah">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-success" onclick="$('#isi_uraian').submit()">Tambahkan</button>
                                </div>
                            </div>
                            <hr class="m-t-0 m-b-40"><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table color-bordered-table info-bordered-table" id="myTable" border="2">
                                            <thead>
                                                <tr style="text-align: center;">
                                                    <th width="15px">No.</th>
                                                    <th>Nama Bahan</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga Satuan</th>
                                                    <th>Sub Total</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $total = 0;
                                                if($uraian){
                                                if($uraian['id_bahan']!=""){
                                                    echo "<script>tester();</script>";
                                                //var_dump($uraian);
                                                $id = explode(",", $uraian['id_bahan']);
                                                $nama = explode(",", $uraian['nama_bahan']);
                                                $jumlah = explode(",", $uraian['jumlah_bahan']);
                                                $satuan = explode(",", $uraian['satuan_bahan']);
                                                $harga = explode(",", $uraian['harga_bahan']);
                                                for($i=0;$i<count($id);$i++){?>
                                                <tr style="font-weight: bold;">
                                                    <td><?=($i+1).".";?></td>
                                                    <td><?php echo $nama[$i]?></td>
                                                    <td style="text-align: center;"><?php echo $jumlah[$i]." ".$satuan[$i]?></td>
                                                    <td style="text-align: right;"><?php echo $harga[$i]?></td>
                                                    <td style="text-align: right;"><?php echo $jumlah[$i]*$harga[$i]?></td>
                                                    <td style="text-align: center;"><button type="button" class="btn btn-danger" onclick="hapus_pilihan(<?php echo $i;?>)"><i class="fa fa-minus"></i></button></td>
                                                </tr>
                                            <?php $total += $jumlah[$i]*$harga[$i];} }}?>
                                                <tr style="font-weight: bold;">
                                                    <td></td>
                                                    <td colspan="3" style="text-align: right;">Total</td>
                                                    <td id="total" style="text-align: right;"><?=$total?></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <input type="hidden" name="tot" id="tot_table" value="<?=$total?>">
                                    </div>
                                </div>
                            </div><br>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" onclick="$('#form_belanja').submit()" class="btn btn-info pull-right">Simpan</button>
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
    function  myFunction(e){
        var id = e.target.value;
        $.ajax({
            url : "<?php echo base_url();?>index.php/c_rab/get_satuan",
            method : "POST",
            data : {id: id},
            async : false,
            dataType : 'json',
            success: function(data){
                $('#satuan').val(data[0].satuan_bahan); 
                $('#harga').val(data[0].harga_bahan); 
            }
        });
    }
</script>
<script type="text/javascript">
    function cek() {
        var total_kegiatan = $('#harga_kg').val();
        var total_bahan = $('#tot_table').val();
        if (total_kegiatan != total_bahan && total_kegiatan!="") {
            alert('Total RAB dengan Total Nominal Kegiatan Tidak Sama!');
            return false;
        }else{
            return confirm('Simpan Data?');
        }
    }
</script>
<script type="text/javascript">
    function hapus_pilihan(index){
        var con = confirm('Hapus Bahan Terpilih?');
        if(con==true){
            var id = $('#id_inp').val();
            var nm = $('#nm_inp').val();
            var st = $('#st_inp').val();
            var hg = $('#hg_inp').val();
            var jml = $('#jml_inp').val();

            var arr_id = id.split(",");// dijadikan array
            var arr_nm = nm.split(",");
            var arr_st = st.split(",");
            var arr_hg = hg.split(",");
            var arr_jml = jml.split(",");

            var update_id = arr_id.splice(index,1);//remove element
            var update_nm = arr_nm.splice(index,1);
            var update_st = arr_st.splice(index,1);
            var update_hg = arr_hg.splice(index,1);
            var update_jml = arr_jml.splice(index,1);

            var id_baru = arr_id.join();//menjadikan string dengan join
            var nm_baru = arr_nm.join();
            var st_baru = arr_st.join();
            var hg_baru = arr_hg.join();
            var jml_baru = arr_jml.join();
            console.log(index);
            console.log(id_baru);
            console.log(nm_baru);
            console.log(st_baru);
            console.log(hg_baru);
            console.log(jml_baru);
            $('#id_inp').val(id_baru);
            $('#nm_inp').val(nm_baru);
            $('#st_inp').val(st_baru);
            $('#hg_inp').val(hg_baru);
            $('#jml_inp').val(jml_baru);
           $('#isi_uraian').submit();
        }  
    }
    function set_data(){
        var a = $('#inp_rw').val();
        var b = $('#inp_rt').val();
        var c = $('#inp_kel').val();

        $('#b_rw').val(a);
        $('#b_rt').val(b);
        $('#b_keluaran').val(c);
    }
</script>