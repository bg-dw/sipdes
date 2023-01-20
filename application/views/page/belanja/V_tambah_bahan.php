<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Data Bahan</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url();?>index.php/c_bahan/ac_input" class="repeater" enctype="multipart/form-data" method="POST">
                    <div class="form-body">
                        <div data-repeater-list="data">
                            <div data-repeater-item>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Nama Bahan</label>
                                        <div class="col-md-9">
                                          <input type="text" name="nm_bahan" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Kelompok Bahan</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="kel_bahan" data-style="form-control btn-secondary" required="">
                                                <?php foreach($kel_bahan as $kel){?>
                                                  <option value="<?php echo $kel->id_kel_bahan;?>"><?php echo $kel->kel_bahan;?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Satuan</label>
                                        <div class="col-md-9">
                                          <input type="text" name="satuan" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Harga Satuan</label>
                                        <div class="col-md-9">
                                          <input type="number" name="harga" class="form-control" min="1" required="">
                                        </div>
                                    </div>
                                </div>
                                <button data-repeater-delete type="button" class="btn waves-effect waves-light btn-circle btn-outline-danger pull-right"><i class="mdi mdi-minus"></i></button>
                            </div>
                            <hr>
                            </div>
                          </div>
                      <button data-repeater-create type="button" class="btn waves-effect waves-light btn-circle btn-outline-success pull-right" style="margin-top: -115px;"><i class="mdi mdi-plus"></i></button>
                    </div>
                    <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-inverse" onclick="location.href='<?php echo base_url();?>index.php/c_bahan/';">Batal</button>
                                        <button type="submit" class="btn btn-info pull-right">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>