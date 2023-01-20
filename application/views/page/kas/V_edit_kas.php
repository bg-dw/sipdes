<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Kas Umum</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url();?>index.php/c_kas/ac_edit_kas" method="POST">
                    <?php foreach($transaksi as $a){ ?>
                        <input type="hidden" name="id_kas" value="<?php echo $a->id_kas;?>">
                        <div class="form-body">
                            <h3 class="box-title">Input Buku Kas</h3>
                            <hr class="m-t-0 m-b-40">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Tgl. dibuat :</label>
                                        <div class="col-md-9">
                                            <input type="text" name="date" class="form-control" required="" placeholder="mm/dd/yyyy" value="<?php echo date('m/d/Y',strtotime($a->tgl_kas));?>" id="datepicker-autoclose">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Kd. Rekening</label>
                                        <div class="col-md-9">
                                            <input type="text" name="kd_rek" class="form-control" value="<?php echo $a->kode_rek_kas;?>" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">No. Bukti</label>
                                        <div class="col-md-9">
                                            <input type="text" name="no_bukti" class="form-control" value="<?php echo $a->no_bukti_kas;?>" required="">
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
                                                <option value="Pengeluaran" <?php if($a->pengeluaran_kas!=0){echo "selected='selected'";}?>>Pengeluaran</option>
                                                <option value="Penerimaan" <?php if($a->penerimaan_kas!=0){echo "selected='selected'";}?>>Penerimaan</option>
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
                                            <textarea name="uraian" class="form-control" required="" rows="4"><?php echo $a->uraian_kas;?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Jumlah (Rp.)</label>
                                        <div class="col-md-9">
                                            <input type="number" name="jumlah" class="form-control" min="0" value="<?php if($a->pengeluaran_kas!=0){echo $a->pengeluaran_kas;}elseif($a->penerimaan_kas!=0){echo $a->penerimaan_kas;}?>" required="" id="num">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Pengeluaran Kumulatif</label>
                                        <div class="col-md-9">
                                            <input type="number" name="kumulatif" value="<?php echo $a->pengeluaran_kumulatif;?>" class="form-control" min="0" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Saldo Saat Ini</label>
                                        <div class="col-md-9">
                                            <input type="number" name="saldo" value="<?php echo $a->saldo_kas;?>" class="form-control" min="0" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
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
