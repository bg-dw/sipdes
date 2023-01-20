<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <?php if($this->session->userdata('level')=="bd"){ ?>
                  <button class="btn waves-effect waves-light btn-success btn-md pull-right" onclick="location.href='<?php echo base_url();?>index.php/c_kas/input_kas';"><i class="mdi mdi-plus"></i> Tambah</button>
                <?php }?>
                <h4 class="card-title">Buku Kas Umum</h4>
                <h6 class="card-subtitle">Bidang Pemberdayaan Masyarakat</h6>
                <div class="table-responsive m-t-40">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                            <tr role="row">
                              <th class="text text-center">No</th>
                              <th class="text text-center">Tgl.</th>
                              <th class="text text-center">Kd. Rek</th>
                              <th class="text text-center">Uraian</th>
                              <th class="text text-center">Penerimaan</th>
                              <th class="text text-center">Pengeluaran</th>
                              <th class="text text-center">No.Bukti</th>
                              <th class="text text-center">Pengeluaran Kumulatif</th>
                              <th class="text text-center">Saldo</th>
                              <th class="text text-center">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; foreach($kas as $b){ ?>
                            <tr role="row">
                                <td align="center" width="10px"><?php echo ($i+1).".";?></td>
                                <td align="center"><?php echo date("d/m/Y",strtotime($b->tgl_kas));?></td>
                                <td align="center"><?php echo $b->kode_rek_kas;?></td>
                                <td align="center"><?php echo $b->uraian_kas;?></td>
                                <td align="center"><?php echo $b->penerimaan_kas;?></td>
                                <td align="center"><?php echo $b->pengeluaran_kas;?></td>
                                <td align="center"><?php echo $b->no_bukti_kas;?></td>
                                <td align="center"><?php echo $b->pengeluaran_kumulatif;?></td>
                                <td align="center"><?php echo $b->saldo_kas;?></td>
                                <td>
                                  <?php if($this->session->userdata('level')=="bd"){ ?>
                                    <button class="btn waves-effect waves-light btn-warning btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_kas/edit_kas/<?php echo $b->id_kas;?>'">
                                        <i class="fa fa-pencil "> Edit</i>
                                    </button>
                                  <?php }?></td>
                            </tr>
                        <?php $i++; }?>
                        </tbody>
                    </table>
                </div><br>
                <hr class="m-t-0 m-b-40">
                <form action="<?php echo base_url();?>index.php/c_kas/rincian_kas/" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Mulai Tgl. :</label>
                                <div class="col-md-3">
                                    <input type="text" name="date1" class="form-control datepicker-autoclose" required="" placeholder="mm/dd/yyyy" value="<?php echo date('m/d/Y');?>">
                                </div>
                                <label class="control-label text-right col-md-2">sampai dengan :</label>
                                <div class="col-md-3">
                                    <input type="text" name="date2" class="form-control datepicker-autoclose" required="" placeholder="mm/dd/yyyy" value="<?php echo date('m/d/Y');?>">
                                </div>
                                <button type="submit" class="btn waves-effect waves-light btn-info btn-md"><i class="mdi mdi-file-document"></i> Lihat</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>