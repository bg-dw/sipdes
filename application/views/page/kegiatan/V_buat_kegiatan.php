<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Data Kegiatan</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url();?>index.php/c_kegiatan/ac_input" class="outer-repeater form-horizontal" enctype="multipart/form-data" method="POST">
                    <div class="form-body">
                        <!--/row-->
                        <div class="row">
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Bidang</label>
                                    <div class="col-md-9">
                                      <input type="text" name="bidang" class="form-control" value="Pemberdayaan Masyarakat" readonly="" required="">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Kode Kegiatan</label>
                                    <div class="col-md-9">
                                      <input type="text" name="kd" value="<?php echo count($total_kg)+1;?>" class="form-control" required="" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Kegiatan</label>
                                    <div class="col-md-9">
                                      <textarea class="form-control" rows="3" placeholder="Kegiatan" name="kegiatan" required=""></textarea>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <hr>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-inverse" onclick="location.href='<?php echo base_url();?>index.php/c_kegiatan/';">Batal</button>
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
