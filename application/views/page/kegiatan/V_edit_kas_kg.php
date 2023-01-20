<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Penerimaan Kas Kegiatan</h4>
            </div>
            <div class="card-body">
                <?php //var_dump($isi);
                foreach($isi as $x){//$tamp[]=$x->harga_total_kwt;
                }?>
                <form action="<?php echo base_url();?>index.php/c_kegiatan/ac_edit_kas/<?=$x->id_kas_kg?>" method="POST">
                    <div class="form-body">
                        <h3 class="box-title">Input Buku Kas</h3>
                        <hr class="m-t-0 m-b-40">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Tgl. dibuat :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="date" class="form-control" required="" placeholder="mm/dd/yyyy" value="<?php echo date('m/d/Y',strtotime($x->tgl_kas_kg));?>" id="datepicker-autoclose">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Transaksi </label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" name="jenis" required="" id="jenis" onchange="set_sumber()">
                                            <option value="">----</option>
                                            <option value="penerimaan" <?php if($x->penerimaan_kas_bd!=0||$x->penerimaan_kas_sm!=0){ echo 'selected=""';}?>>Penerimaan</option>
                                            <option value="pengeluaran" <?php if($x->pengeluaran_bj!=0||$x->pengeluaran_bm!=0){ echo 'selected=""';}?>>Pengeluaran</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="display: none;">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Transaksi Hide</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" name="jenis_hide" required="" id="jenis_hide">
                                            <option value="">----</option>
                                            <option value="<?php if($x->penerimaan_kas_bd!=0){echo "kas_bd";}else{echo "kas_sm";}?>" <?php if($x->penerimaan_kas_bd!=0||$x->penerimaan_kas_sm!=0){ echo 'selected=""';}?>>Penerimaan</option>
                                            <option value="<?php if($x->pengeluaran_bj!=0){echo "kas_bj";}else{echo "kas_bm";}?>" <?php if($x->pengeluaran_bj!=0||$x->pengeluaran_bm!=0){ echo 'selected=""';}?>>Pengeluaran</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Sumber</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" name="sumber" required="" id="sumber">
                                            <option value="">----</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Nama Kegiatan</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" name="kegiatan" required="" onchange="myFunction(event);" id="nm_kg">
                                            <option value="">----</option>
                                            <?php foreach($rab as $a){?>
                                                <option value="<?php echo $a->id_detail_kg.",".$a->id_rab.",".$a->id_kg.",".$a->lokasi_kg;?>" <?php if($x->nama_kg==$a->nama_kg){echo "selected=''";}?>><?php echo $a->nama_kg." (".$a->lokasi_kg.")";?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Uraian</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" name="uraian" required="" id="bahan">
                                            <option value="">----</option>
                                            <?php foreach($bahan as $row){
                                                $val = $row->nama_bahan." (".$row->jumlah_bahan_kg." ".$row->satuan_bahan.")";
                                                ?>
                                                <option value="<?=$row->nama_bahan." (".$row->jumlah_bahan_kg." ".$row->satuan_bahan.")";?>" <?php if($val==$x->uraian_kas_kg){echo "selected=''";} ?>><?=$row->nama_bahan." (".$row->jumlah_bahan_kg." ".$row->satuan_bahan.")";?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Nomor Bukti :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nomor" class="form-control" required="" value="<?=$x->no_bukti_kas_kg?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Nominal :</label>
                                    <div class="col-md-9">
                                        <input type="number" name="nominal" class="form-control" required="" id="nominal" value="<?php if($x->penerimaan_kas_bd!=0){echo $x->penerimaan_kas_bd;}elseif($x->penerimaan_kas_sm!=0){echo $x->penerimaan_kas_sm;}elseif($x->pengeluaran_bj!=0){echo $x->pengeluaran_bj;}else{echo $x->pengeluaran_bm;}?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Pengembalian :</label>
                                    <div class="col-md-9">
                                        <input type="number" name="pengembalian" class="form-control" required="" id="pengembalian" value="<?=$x->pengembalian_kas?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Saldo Kas :</label>
                                    <div class="col-md-9">
                                        <input type="number" name="saldo" class="form-control" required="" id="saldo" value="<?=$x->saldo_kas_kg?>">
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
                                        <button type="button" class="btn btn-inverse" onclick="location.href='<?php echo base_url();?>index.php/c_kegiatan/daftar_kas_kg';">Batal</button>
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
<script type="text/javascript">
    window.onload(set_selected_sumber());
    function  myFunction(e){
        var i;
        var kg = e.target.value;
        var ex = kg.split(",");
        var jenis = document.getElementById("jenis").value;
        
        var bahan = document.getElementById("bahan");
        bahan.options.length=1;//reset option
        $.ajax({
            url : "<?php echo base_url();?>index.php/c_kegiatan/get_bahan_kegiatan",
            method : "POST",
            data : {
                id_rab: ex[1],
                id_kg: ex[2],
                lokasi: ex[3]
            },
            async : false,
            dataType : 'json',
            success: function(data){ 
                for(i=0;i<data.length;i++){
                    var x = document.getElementById("bahan");
                    var opt = document.createElement("option");
                    if(jenis=='penerimaan'){
                        opt.text=data[i].nama_bahan+" ("+data[i].jumlah_bahan_kg+" "+data[i].satuan_bahan+")";
                        opt.value=data[i].nama_bahan+" ("+data[i].jumlah_bahan_kg+" "+data[i].satuan_bahan+")";
                        x.add(opt);
                    }else if(jenis=='pengeluaran'){
                        opt.text=data[i].nama_bahan+" ("+data[i].jumlah_bahan_kg+" "+data[i].satuan_bahan+")";
                        opt.value=data[i].nama_bahan+" ("+data[i].jumlah_bahan_kg+" "+data[i].satuan_bahan+")";
                        x.add(opt);
                    }    
                }
            },
            error: function(xhr, status, error){
                alert("gagal");
                var err = eval("("+xhr.responseText+")");
                alert(err.Message);
            }
        });
    }

    function set_sumber(){
        var jenis = document.getElementById("jenis");
        var sumber = document.getElementById("sumber");
        sumber.options.length=1;//reset option
        if(jenis.value=="penerimaan"){
            var opt = document.createElement("option");
            opt.text="Bendahara";
            opt.value="bendahara";
            sumber.add(opt);
            var opt = document.createElement("option");
            opt.text="Swadaya";
            opt.value="swadaya";
            sumber.add(opt);
        }else{
            var opt = document.createElement("option");
            opt.text="Belanja Barang dan Jasa";
            opt.value="barang";
            sumber.add(opt);
            var opt = document.createElement("option");
            opt.text="Belanja Modal";
            opt.value="modal";
            sumber.add(opt);
        }
    }

    // function set_selected_kg(){
    //     var kg = document.getElementById("nm_kg");
    //     set_new(kg.value);
    // }

    function set_selected_sumber(){
        set_sumber();
        //set_selected_kg();
        var jenis_hide = document.getElementById("jenis_hide");
        var sumber = document.getElementById("sumber");
        if(jenis_hide.value=="kas_bd"){
            sumber.value="bendahara";
        }else if(jenis_hide.value=="kas_sm"){
            sumber.value=="swadaya";
        }else if(jenis_hide.value=="kas_bj"){
            sumber.value=="barang";
        }else{
            sumber.value=="modal";
        }

    }
</script>
