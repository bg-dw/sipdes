<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Tambah Permintaan Pembayaran</h4>
            </div>
            <div class="card-body">
                <?php //var_dump($isi);?>
                <form action="<?php echo base_url();?>index.php/c_pembayaran/ac_edit_bukti" method="POST">
                    <?php 
                        foreach($isi as $a){}
                        $nomor_lama = explode("/", $a->nomor_bp);
                    ?>
                    <input type="hidden" name="id_bp" value="<?php echo $isi[0]->id_bp;?>">
                    <input type="hidden" name="total_bp" id="total_bp" value="<?php echo $nomor_lama[0];?>">
                    <div class="form-body">
                        <h3 class="box-title">Dasar Pembayaran</h3>
                        <hr class="m-t-0 m-b-40">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Nomor SPP dan Tanggal :</label>
                                    <div class="col-md-9">
                                        <label><?php echo $a->nomor_spp." Tanggal ".indo_mysql($a->tgl_spp);?></label>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <h3 class="box-title">Bukti Pencairan</h3>
                        <hr class="m-t-0 m-b-40">
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
                                    <label class="control-label text-right col-md-3">Keluaran :</label>
                                    <div class="col-md-9">
                                        <label><?php echo $a->keluaran_kg;?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Pembayaran :</label>
                                    <div class="col-md-4">
                                        <select class="form-control custom-select" name="pembayaran" data-placeholder="Pilih Tipe Pembayaran" onchange="get_tipe(event);" id="tipe_pembayaran" required="">
                                            <option value="">--</option>
                                            <option value="CASH" <?php if($a->tipe_pembayaran=="CASH"){ echo "selected='selected'";}?>>TUNAI</option>
                                            <option value="TRANSFER" <?php if($a->tipe_pembayaran=="TRANSFER"){ echo "selected='selected'";}?>>TRANSFER</option>
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
                                        <input type="text" class="form-control" name="nomor" required="" readonly="" value="<?php echo $a->nomor_bp;?>" id="inp_nomor">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h3 class="box-title">Rincian Penggunaan</h3>
                        <hr class="m-t-0 m-b-40">
                        <?php $kel=array(); $kel_bahan="1";$i=0;$sub_harga=0; // menjumlahkan belanja berdasarkan kelompok belanja
                        foreach($isi as $a){
                          if($kel_bahan==$a->kel_bahan){
                            $sub_harga+=$a->jumlah_bahan_kg*$a->harga_bahan_perjanjian;
                          }else{
                            $sub_harga=0;
                            $sub_harga=$a->jumlah_bahan_kg*$a->harga_bahan_perjanjian;
                          }?>
                          <?php 
                            $kel[$a->kel_bahan]= array($a->kel_bahan,$sub_harga); 
                          ?>
                        <?php $i++;
                          $kel_bahan=$a->kel_bahan;
                        }?>
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label class="control-label col-md-8">Rincian Penggunaan Dana (per-kelompok bahan):</label><br>
                                <table border="1" width="100%">
                                    <tr>
                                        <th style="text-align: center;">NO.</th>
                                        <th style="text-align: center;">JENIS BARANG/JASA</th>
                                        <th style="text-align: center;">Nilai</th>
                                    </tr>
                                    <?php $total=0; $i=0; foreach($isi_kel_bahan as $x){?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo ($i+1).".";?></td>
                                            <td><?php echo $kel[$x->kel_bahan][0];?></td>
                                            <td><?php echo rupiah_php($kel[$x->kel_bahan][1]);?></td>
                                        </tr>
                                    <?php $i++;$total+=$kel[$x->kel_bahan][1];}?>
                                    <tr style="font-weight: bold;">
                                        <td style="text-align: center;"></td>
                                        <td style="text-align: center;">Total</td>
                                        <td><?php echo rupiah_php($total);?></td>
                                    </tr>
                                </table><br><br>
                            </div>
                        </div><br>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-inverse" onclick="location.href='<?php echo base_url();?>index.php/c_pembayaran/daftar_bukti_spp';">Batal</button>
                                        <button type="submit" class="btn btn-info pull-right">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php //var_dump($isi);?>
            </div>
        </div>
    </div>
</div>
<!-- Row -->

<script type="text/javascript">
    function  get_tipe(e){
        var date = new Date();
        var tipe_pembayaran = e.target.value;
        var total_bp = document.getElementById("total_bp").value;
        if(tipe_pembayaran!=""){
            $('#inp_nomor').val(total_bp+"/"+tipe_pembayaran+"/21.12/"+date.getFullYear());
        } 
    }
</script>