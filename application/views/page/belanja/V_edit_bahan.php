<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Data Bahan</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url();?>index.php/c_bahan/ac_edit" class="repeater" enctype="multipart/form-data" method="POST">
                    <?php foreach($bahan as $b){ ?>
                        <input type="hidden" name="id" class="form-control" required="" value="<?php echo $b->id_bahan;?>">
                        <div class="form-body">
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Nama Bahan</label>
                                        <div class="col-md-9">
                                          <input type="text" name="nm_bahan" class="form-control" required="" value="<?php echo $b->nama_bahan;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Kelompok Bahan</label>
                                        <div class="col-md-9">
                                          <select class="form-control" name="kel_bahan" data-style="form-control btn-secondary" required="">
                                            <?php foreach($my_kel as $my){}
                                                    foreach($kel_bahan as $kel){?>
                                              <option value="<?php echo $kel->id_kel_bahan;?>" <?php if($kel->id_kel_bahan==$my->id_kel_bahan){echo "selected";}?>><?php echo $kel->kel_bahan;?></option>
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
                                          <input type="text" name="satuan" class="form-control" required="" value="<?php echo $b->satuan_bahan;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">harga (Rp.)</label>
                                        <div class="col-md-9">
                                          <input type="number" name="harga" class="form-control" min="1" required="" value="<?php echo $b->harga_bahan;?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
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
<!-- Row -->
