<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Kas Umum</h4>
            </div>
            <div class="card-body">
                <?php //var_dump($isi);
                foreach($isi as $x){$tamp[]=$x->harga_total_kwt;}?>
                <form action="<?php echo base_url();?>index.php/c_kas/ac_bayar_kas" method="POST">
                    <div class="form-body">
                        <h3 class="box-title">Input Buku Kas</h3>
                        <hr class="m-t-0 m-b-40">
                        <input type="hidden" name="id_kg" value="<?php echo $x->id_kg;?>" class="form-control" required="">
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
                                        <input type="text" name="kd_rek" value="<?php echo "4.21.12.".$x->kd_kg;?>" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">No. Bukti</label>
                                    <div class="col-md-9">
                                        <input type="text" name="no_bukti" value="<?php echo $x->nomor_bp;?>" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Tipe Transaksi</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" name="tipe" required="">
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
                                        <textarea name="uraian" class="form-control" required="" rows="4"><?php echo $x->keluaran_kg;?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Jumlah (Rp.)</label>
                                    <div class="col-md-9">
                                        <input type="number" name="jumlah" value="<?php echo array_sum($tamp);?>" class="form-control" min="0" value="0" required="" id="num">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Pengeluaran Kumulatif</label>
                                    <div class="col-md-9">
                                        <input type="number" name="kumulatif" value="<?php echo $transaksi[0]->pengeluaran_kumulatif;?>" class="form-control" min="0" required="" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Saldo Saat Ini</label>
                                    <div class="col-md-9">
                                        <input type="number" name="saldo" value="<?php echo $transaksi[0]->saldo_ks;?>" class="form-control" min="0" required="" readonly>
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
                                        <button type="button" class="btn btn-inverse" onclick="location.href='<?php echo base_url();?>index.php/c_kas/';">Batal</button>
                                        <button type="submit" class="btn btn-info pull-right">Simpan</button>
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
