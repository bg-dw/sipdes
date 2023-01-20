<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">RAB</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url();?>index.php/c_rab/ac_input" method="POST" onsubmit="return cek()">
                    <div class="form-body">
                        <?php foreach($kg as $x){}?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2">Tahun Anggaran</label>
                                    <div class="col-md-2">
                                      <input type="number" name="th" class="form-control text-center yearpicker" required="">
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
                                        <input type="number" min="1" name="nilai" class="form-control" required="" id="nilai_rab">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2">Lokasi</label>
                                    <div class="col-md-5">
                                        <input type="text" name="lokasi" value="Desa Pandanlandung" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="nama_kg" id="nm_inp">
                        <input type="hidden" name="harga_kg" id="hg_inp">
                        <input type="hidden" name="waktu_kg" id="wt_inp">
                        <input type="hidden" name="date_kg" id="d_inp">
                        <h3 class="box-title">Daftar Kegiatan</h3>
                        <hr class="m-t-0 m-b-40">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2">Nama Kegiatan</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" name="id_kg" id="kg">
                                            <?php foreach($kg as $a){?>
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
                                    <label class="control-label text-right col-md-2">Nominal Kegiatan</label>
                                    <div class="col-md-5">
                                        <input type="number" min="1" name="nilai_kg" class="form-control" id="hg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2">Waktu Kegiatan</label>
                                    <div class="col-md-2">
                                        <input type="number" min="1" name="w_kegiatan" class="form-control" value="1" id="jumlah_w">
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" id="jenis_w">
                                            <option value="Hari" selected="selected">Hari</option>
                                            <option value="Minggu">Minggu</option>
                                            <option value="Bulan">Bulan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2">Tanggal Kegiatan</label>
                                    <div class="input-daterange input-group date-range col-md-5">
                                        <input type="text" class="form-control" name="start" value="<?=date('m/d/Y')?>" id="d_start" />
                                        <span class="input-group-addon bg-info b-0 text-white">s/d</span>
                                        <input type="text" class="form-control" name="end" value="<?=date('m/d/Y')?>" id="d_end" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-success" onclick="tambah();">Tambahkan</button>
                            </div>
                        </div><br><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table color-bordered-table info-bordered-table" id="myTable" border="1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Kegiatan</th>
                                                <th>Waktu</th>
                                                <th>tgl</th>
                                                <th>Nominal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="font-weight: bold; background-color: grey; color: white;">
                                                <td></td>
                                                <td colspan="3" >Total</td>
                                                <td id="total"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><br><br>
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
    var nb=[];
    var hb=[];
    var wtb=[];
    var dtb=[];
    function tambah(){
        var b,c,start,end;
        b=$("#hg").val();
        c=$("#jumlah_w").val();
        start=$("#d_start").val();
        end=$("#d_end").val();
        var e = document.getElementById("kg");
        var id_kg = e.options[e.selectedIndex].value;
        var nm_kg = e.options[e.selectedIndex].text;
        var x = document.getElementById("jenis_w");
        var jw = x.options[x.selectedIndex].value;
        if(b!="" && c!="" && id_kg!="" && jw!=""){
            nb.push(id_kg);
            hb.push(b);
            wtb.push(c+" "+jw);
            dtb.push(start+"-"+end);
            var total = hb.reduce(add, 0);

            var table = document.getElementById("myTable");
            var rows = document.getElementById("myTable").getElementsByTagName("tr").length;
            var row = table.insertRow(rows-1);
            var cell0 = row.insertCell(0);
            var cell1 = row.insertCell(1);
            var cell2 = row.insertCell(2);
            var cell3 = row.insertCell(3);
            var cell4 = row.insertCell(4);
            cell0.innerHTML =(rows-1)+".";
            cell1.innerHTML =nm_kg;
            cell2.innerHTML =c+" "+jw;
            cell3.innerHTML =start+"-"+end;
            cell4.innerHTML =b;
            $('#total').html(total);
            document.getElementById("hg").value="";
            document.getElementById("jumlah_w").value="";
            $("#nm_inp").val(nb);
            $("#hg_inp").val(hb);
            $("#wt_inp").val(wtb);
            $("#d_inp").val(dtb);
        }else{
            alert('Harap Lengkapi data!');
        }
    }
    function add(a, b) {
        return parseInt(a) + parseInt(b);
    }
    function cek() {
        var total_rab = $('#nilai_rab').val();
        var total_kegiatan = hb.reduce(add, 0);
        if (total_rab != total_kegiatan && total_rab!="") {
            alert('Total RAB dengan Total Nominal Kegiatan Tidak Sama!');
            return false;
        }else{return confirm('Simpan Data?');}
    }
</script>