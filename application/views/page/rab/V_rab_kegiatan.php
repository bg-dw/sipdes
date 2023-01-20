
<div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-xlg-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar RAB Kegiatan</h4>
                <h6 class="card-subtitle">Bidang Pemberdayaan Masyarakat</h6>
                <div class="table-responsive m-t-40">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                            <tr role="row">
                              <th class="text text-center">No</th>
                              <th class="text text-center">Lokasi</th>
                              <th class="text text-center">Nama Kegiatan</th>
                              <th class="text text-center">Keluaran</th>
                              <th class="text text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; foreach($rab as $a){ ?>
                                <tr role="row">
                                    <td align="center" width="10px"><?php echo ($i+1).".";?></td>
                                    <td align="center"><?php echo str_replace("-", "/", $a->lokasi_kg);?></td>
                                    <td><?php echo $a->nama_kg;?></td>
                                    <td align="center"><?php echo $a->keluaran_kg;?></td>
                                    <td align="center">
                                        <?php if($a->status_kg=="0"){ ?>
                                            <?php if($this->session->userdata('level')=="pk"){ ?>
                                                <button class="btn waves-effect waves-light btn-success btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_rab/input_bahan_kegiatan/<?php echo $a->id_rab;?>/<?php echo $a->id_kg;?>'"><i class="fa fa-plus-square"></i> Tambah
                                                </button>
                                            <?php }
                                        }else{?>
                                                <button class="btn waves-effect waves-light btn-info btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_rab/rincian/<?php echo $a->id_rab;?>/<?php echo $a->id_kg;?>/<?php echo $a->lokasi_kg;?>'"><i class="fa fa-desktop"> Lihat</i> 
                                                </button>
                                            <?php if($this->session->userdata('level')=="pk"){ ?>
                                                <button class="btn waves-effect waves-light btn-warning btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_rab/edit_bahan_kegiatan/<?php echo $a->id_rab;?>/<?php echo $a->id_kg;?>/<?php echo $a->lokasi_kg;?>'">
                                                    <i class="fa fa-pencil"> Edit</i>
                                                </button> 
                                            <?php }?>
                                            <!-- <?php if($this->session->userdata('level')=="admin"){}else{?>
                                            <button class="btn waves-effect waves-light btn-danger btn-sm" data-toggle="modal" data-target="#hapusUs" onclick="hapus('<?php echo $a->id_rab;?>','<?php echo $a->nama_kg;?>');">
                                                <i class="fa fa-trash-o text-white"> Hapus</i>
                                            </button> 
                                            <?php }?> -->
                                            <?php
                                        }?> 
                                    </td>
                                </tr>
                            <?php $i++; }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="hapusUs" role="dialog" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel1">Hapus User?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form action="<?php echo base_url();?>index.php/c_rab/ac_hapus_rab" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label id="l_us"></label>
                                    <input type="hidden" name="id" class="form-control" id="id_rab" required="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn waves-effect waves-light btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn waves-effect waves-light btn-danger">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>