<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Kas Kegiatan</h4>
            </div>
            <div class="card-body">
                <?php //var_dump($rab);
                //foreach($isi as $x){$tamp[]=$x->harga_total_kwt;}
                //var_dump($transaksi);
                ?>
                <form action="<?php echo base_url();?>index.php/c_kegiatan/ac_tambah_kas" method="POST" id="form_kas">
                    <div class="form-body">
                        <h3 class="box-title">Input Buku Kas</h3>
                        <hr class="m-t-0 m-b-40">
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
                                    <label class="control-label text-right col-md-3">Transaksi </label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" name="jenis" required="" id="jenis" onchange="set_sumber()">
                                            <option value="">----</option>
                                            <option value="penerimaan">Penerimaan</option>
                                            <option value="pengeluaran">Pengeluaran</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="display: none;" id="div_sumber">
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
                        <div class="row" style="display: none;" id="div_kg">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Nama Kegiatan</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" name="kegiatan" required="" onchange="myFunction(event);" id="nm_kg">
                                            <option value="">----</option>
                                            <?php foreach($rab as $a){?>
                                                <option value="<?php echo $a->id_detail_kg.",".$a->id_rab.",".$a->id_kg.",".$a->lokasi_kg;?>"><?php echo $a->nama_kg." (".$a->lokasi_kg.")";?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="display: none;" id="div_uraian">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Uraian</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" name="uraian" required="" id="bahan" onchange="set_nominal(event);">
                                            <option value="">----</option>
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
                                        <input type="text" name="nomor" class="form-control" required="" id="no_bukti">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Nominal :</label>
                                    <div class="col-md-9">
                                        <input type="number" name="nominal" class="form-control" required="" id="nominal" onkeyup="set_saldo()">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Pengembalian :</label>
                                    <div class="col-md-9">
                                        <input type="number" name="pengembalian" class="form-control" required="" id="pengembalian" onkeyup="set_saldo()">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Saldo Kas :</label>
                                    <div class="col-md-9">
                                        <input type="hidden" name="saldo_awal" class="form-control" required="" id="saldo_awal" value="<?php if($transaksi){echo $transaksi[0]->saldo_kas_kg;}else{echo 0;}?>">
                                        <input type="number" name="saldo" class="form-control" required="" id="saldo" min="0" value="<?php if($transaksi){echo $transaksi[0]->saldo_kas_kg;}else{echo 0;}?>" readonly="">
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
                                        <button type="button" class="btn btn-info pull-right" onclick="cek_form();">Simpan</button>
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
    function  myFunction(e){
        $("#div_uraian").show();
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
                        opt.value=data[i].id_bahan+"-"+data[i].nama_bahan+" ("+data[i].jumlah_bahan_kg+" "+data[i].satuan_bahan+")";
                        x.add(opt);
                    }else if(jenis=='pengeluaran'){
                        opt.text=data[i].nama_bahan+" ("+data[i].jumlah_bahan_kg+" "+data[i].satuan_bahan+")";
                        opt.value=data[i].id_bahan+"-"+data[i].nama_bahan+" ("+data[i].jumlah_bahan_kg+" "+data[i].satuan_bahan+")";
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
        var bahan = document.getElementById("bahan");
        var kegiatan = document.getElementById("nm_kg");
        kegiatan.value="";//reset option
        bahan.options.length=1;//reset option
        $('#no_bukti').val("");
        var saldo_awal = $('#saldo_awal').val();
        var int_saldo_awal = parseInt(saldo_awal, 10);
        $('#nominal').val("");
        $('#saldo').val(int_saldo_awal);
        $("#div_sumber").show();
        $("#div_kg").show();
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

    //set nominal
    function  set_nominal(e){
        var i;
        var get_id_bahan = e.target.value;
        var split_id = get_id_bahan.split("-");
        var kg = $("#nm_kg").val();
        var ex = kg.split(",");
        var jenis = document.getElementById("jenis").value;
        
        var bahan = document.getElementById("bahan");
        console.log(split_id[0]);
        $.ajax({
            url : "<?php echo base_url();?>index.php/c_kegiatan/get_bahan_kegiatan_nominal",
            method : "POST",
            data : {
                id_rab: ex[1],
                id_kg: ex[2],
                lokasi: ex[3],
                id_bahan: split_id[0]
            },
            async : false,
            dataType : 'json',
            success: function(data){ 
                if(jenis=='penerimaan'){
                    $('#nominal').val(data[0].jumlah_bahan_kg*data[0].harga_bahan_kg);
                    $('#pengembalian').val(0);
                }else if(jenis=='pengeluaran'){
                    $('#nominal').val(data[0].jumlah_bahan_kg*data[0].harga_bahan_perjanjian);
                    $('#pengembalian').val((data[0].jumlah_bahan_kg*data[0].harga_bahan_kg)-(data[0].jumlah_bahan_kg*data[0].harga_bahan_perjanjian));
                    $('#no_bukti').val(data[0].nomor_kwt);
                }
                set_saldo();
            },
            error: function(xhr, status, error){
                alert("gagal");
                var err = eval("("+xhr.responseText+")");
                alert(err.Message);
            }
        });
    }

    function set_saldo(){
        var nominal = $('#nominal').val();
        var pengembalian = $('#pengembalian').val();
        var saldo_awal = $('#saldo_awal').val();
        var jenis = $('#jenis').val();
        var int_nominal = parseInt(nominal, 10);
        var int_pengembalian = parseInt(pengembalian, 10);
        var int_saldo_awal = parseInt(saldo_awal, 10);
        if(jenis==="penerimaan"){
            $('#saldo').val((int_saldo_awal)+(int_nominal-int_pengembalian));
        }else if(jenis==="pengeluaran"){
            $('#saldo').val((int_saldo_awal)-(int_nominal));
        }
    }
    function cek_form(){
        var saldo=$("#saldo").val();
        if(saldo>=0){
            var x =confirm('Simpan Data?');
            if(x==true){
                document.getElementById("form_kas").submit();
            }
        }else{
            alert("Saldo Tidak Boleh Kurang Dari '0' ");
        }
    }
</script>