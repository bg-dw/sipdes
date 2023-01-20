<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Anggaran</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url();?>index.php/c_kas/ac_edit_anggaran" class="repeater form-horizontal" enctype="multipart/form-data" method="POST">
                    <div class="form-body">
                        <?php foreach($isi as $a){?>
                        <input type="hidden" name="id" class="form-control yearpicker" value="<?php echo $a->id_anggaran;?>" required="">
                        <h3 class="box-title">Total Anggaran</h3>
                        <hr class="m-t-0 m-b-40">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Tahun Anggaran</label>
                                    <div class="col-md-9">
                                      <input type="number" name="th" class="form-control yearpicker" value="<?php echo $a->tahun_anggaran;?>" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Jumlah (Rp.)</label>
                                    <div class="col-md-9">
                                        <input type="number" name="jumlah" class="form-control" min="1" value="<?php echo $a->total_anggaran;?>" required="" id="num">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
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
