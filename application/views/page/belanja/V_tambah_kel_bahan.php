<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Data Bahan</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url();?>index.php/c_bahan/ac_input_kel" class="repeater" enctype="multipart/form-data" method="POST">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Nama Kel. Bahan</label>
                                    <div class="col-md-8">
                                      <input type="text" name="kel_bahan" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-inverse" onclick="location.href='<?php echo base_url();?>index.php/c_bahan/kel_bahan';">Cancel</button>
                                        <button type="submit" class="btn btn-info pull-right">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
