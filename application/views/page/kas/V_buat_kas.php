<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Kas Umum</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url();?>index.php/c_kas/ac_input_kas" method="POST" onsubmit="return cek()">
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
                                    <label class="control-label text-right col-md-3">Kd. Rekening</label>
                                    <div class="col-md-9">
                                        <input type="text" name="kd_rek" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">No. Bukti</label>
                                    <div class="col-md-9">
                                        <input type="text" name="no_bukti" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Tipe Transaksi</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" name="tipe" required="" id="tipe">
                                            <option value="Pengeluaran">Pengeluaran</option>
                                            <option value="Penerimaan">Penerimaan</option>
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
                                        <textarea name="uraian" class="form-control" required="" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Jumlah (Rp.)</label>
                                    <div class="col-md-9">
                                        <input type="number" name="jumlah" class="form-control" min="0" value="0" required="" id="nominal">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Pengeluaran Kumulatif</label>
                                    <div class="col-md-9">
                                        <input type="number" name="kumulatif" value="<?php if($transaksi){echo $transaksi[0]->pengeluaran_kumulatif;}else{echo 0;} ?>" class="form-control" min="0" required="" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Saldo Saat Ini</label>
                                    <div class="col-md-9">
                                        <input type="number" name="saldo" value="<?php if($transaksi){echo $transaksi[0]->saldo_kas;}else{echo 0;}?>" class="form-control" min="0" required="" readonly="" id="saldo">
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
                                        <button type="button" class="btn btn-inverse" onclick="location.href='<?php echo base_url();?>index.php/c_kas/';">Cancel</button>
                                        <button type="submit" class="btn btn-info pull-right">Submit</button>
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
    function cek(){
        var nominal = $('#nominal').val();
        var saldo = $('#saldo').val();
        var e = document.getElementById("tipe");
        console.log('nominal='+nominal);
        console.log('saldo='+saldo);
        var int_nominal = parseInt(nominal, 10);
        var int_saldo = parseInt(saldo, 10);
        var tipe =e.options[e.selectedIndex].value;
        if (tipe == "Pengeluaran") {
            if(int_nominal > int_saldo){
                alert("Nominal Pengeluaran Lebih Besar Dari Saldo Saat Ini!");
                return false;
            }else{
                return confirm('Simpan Data?');
            }
        }else{
            return confirm('Simpan Data?');
        }
    }
</script>
