<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Edit Berita Acara Negosiasi</h4>
            </div>
            <div class="card-body">
                <?php 
                //var_dump($data_balasan);
                foreach($data_ba as $a){}?>
                <form action="<?php echo base_url();?>index.php/c_penawaran/ac_edit_ba_penawaran" class="repeater form-horizontal" enctype="multipart/form-data" method="POST" id="ac_edit_ba">
                    <input type="hidden" name="id_pj" value="<?php echo $a->id_pj;?>">
                    <input type="hidden" name="id_detail_kg" value="<?php echo $a->id_detail_kg;?>">
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
                                    <label class="control-label text-right col-md-3">Nomor Berita Acara :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nomor" class="form-control" value="<?php echo $a->nomor_ba;?>" required="" readonly id="nomor">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Tanggal :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="tgl" class="form-control mydatepicker" value="<?php echo date('m/d/Y',strtotime($a->tgl_ba));?>" required="" id="tgl">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Jam :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="single-input" name="jam" placeholder="Waktu Saat ini" value="<?php echo date('H:i',strtotime($a->jam_ba));?>" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Tempat :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="tempat" class="form-control" value="<?php echo $a->tempat_ba;?>" required="" id="tempat">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Nama CV/Toko :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nama_toko" value="<?php echo $a->nama_toko;?>" class="form-control" required="" id="nama_toko" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Perwakilan Toko :</label>
                                    <div class="col-md-9">
                                        <input type="text" name="dihadiri_oleh" value="<?php echo $a->dihadiri_oleh;?>" class="form-control" required="" id="dihadiri_oleh">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Harga Dari (RAB) :</label>
                                    <div class="col-md-9">
                                        <label>Rp. <?php echo rupiah_php($a->nominal_kegiatan_rab);?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php //var_dump($data_ba);?>
                        <h3 class="box-title">Uraian </h3><h5><i>(Sesuai Harga Kesepakatan per-item)</i></h5>
                        <hr class="m-t-0 m-b-40">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table color-bordered-table info-bordered-table" id="myTable" border="1">
                                        <thead>
                                            <tr>
                                                <th width="5%">No.</th>
                                                <th width="40%">Nama Belanja</th>
                                                <th width="15%">Volume</th>
                                                <th width="20%">Harga RAB</th>
                                                <th width="20%">Harga Kesepakatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; foreach($data_ba as $s){?>
                                                <input type="hidden" name="id_bahan[]" value="<?php echo $s->id_bahan;?>" class="form-control" required="">
                                                <tr style="color: black;">
                                                    <td><?php echo ($i+1).".";?></td>
                                                    <td>
                                                        <input type="hidden" name="nama_bahan[]" value="<?php echo $s->nama_bahan;?>" class="form-control" required="" readonly>
                                                        <?php echo $s->nama_bahan;?>
                                                    </td>
                                                    <td>
                                                        <?php echo $s->jumlah_bahan_kg." ".$s->satuan_bahan;?>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="harga_sebelum[]" value="<?php echo $data_ba[$i]->harga_bahan_kg;?>" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="harga[]" min="1" value="<?php echo $data_ba[$i]->harga_bahan_perjanjian;?>" required="" style="text-align: right;">
                                                    </td>
                                                </tr>
                                            <?php $i++;}?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <hr class="m-t-0 m-b-40">
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-inverse" onclick="location.href='<?php echo base_url();?>index.php/c_penawaran/daftar_ba_penawaran';">Batal</button>
                                        <button type="button" onclick="submit_edit_ba();" class="btn btn-info pull-right">Simpan</button>
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
    function submit_edit_ba() {
        var i,inp1,inp2,nama_bahan,counter;
        counter=0;
        var a=document.getElementById("tgl").value;
        var b=document.getElementById("single-input").value;
        var c=document.getElementById("tempat").value;
        var d=document.getElementById("nama_toko").value;
        var e=document.getElementById("dihadiri_oleh").value;
        var bahan=document.getElementsByName('nama_bahan[]');
        var harga_sebelum=document.getElementsByName('harga_sebelum[]');
        var harga_sesudah=document.getElementsByName('harga[]');
        console.log(harga_sebelum.length);
        if (a==""||b==""||c==""||d==""||e=="")
        {
            alert("Harap Lengkapi Data!");
        }else{
            for (i = 0; i <harga_sesudah.length; i++) {
                nama_bahan = bahan[i];
                inp1=harga_sebelum[i];
                inp2=harga_sesudah[i];
                console.log("harga ke-["+i+"] a="+inp1.value+" || b="+inp2.value);
                if(inp2.value > inp1.value){
                    alert('Harga Belanja "'+nama_bahan.value+'" Melebihi RAB!');
                    console.log("harga melebihi["+i+"].value="+inp2.value);
                }else{
                    if(inp2.value!=0||inp2.value!=""){
                        counter+=1;
                        console.log("harga aman["+i+"].value="+inp1.value+"=/>="+inp2.value);
                    }
                }
            }
            if(counter==harga_sebelum.length){
                var x = confirm('Simpan Data?');
                if (x==true) {
                    console.log('counter='+counter);
                    document.getElementById("ac_edit_ba").submit();
                }
            }else{
                alert('Harap Periksa Kembali!');
                console.log('counter='+counter);
            }
        }
    }
    function total(){}
</script>
