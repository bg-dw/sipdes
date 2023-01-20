<div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-xlg-9">
        <div class="card">
            <?php //var_dump($rab);?>
            <div class="card-body">
                <h4 class="card-title">Daftar Kegiatan</h4>
                <h6 class="card-subtitle">Bidang Pemberdayaan Masyarakat</h6>
                <div class="table-responsive m-t-40">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                            <tr role="row">
                              <th class="text text-center">No</th>
                              <th class="text text-center">Nama Kegiatan</th>
                              <th class="text text-center">Lokasi</th>
                              <th class="text text-center">Status</th>
                              <th class="text text-center">Opsi</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; foreach($rab as $a){ ?>
                            <tr role="row">
                                <td align="center" width="10px"><?php echo ($i+1).".";?></td>
                                <td><?php echo $a->nama_kg;?></td>
                                <td align="center"><?php echo $a->lokasi_kg;?></td>
                                <td align="center">
                                    <?php if($a->status_kg==13){ ?>
                                        <span class="label label-rounded label-danger">Belum Selesai</span>
                                    <?php }elseif ($a->status_kg<=12) {?>
                                        <span class="label label-rounded label-warning">Menunggu</span>
                                    <?php }elseif ($a->status_kg>=14) {?>
                                        <span class="label label-rounded label-success">Selesai</span>
                                    <?php }?>
                                </td>
                                <td align="center">
                                    <?php if($this->session->userdata('level')=="pk"){?>
                                        <?php if($a->status_kg==13){ ?>
                                            <button class="btn waves-effect waves-light btn-success btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_kegiatan/tambah_laporan_kegiatan/<?php echo $a->id_rab;?>/<?php echo $a->id_kg;?>/<?php echo $a->lokasi_kg;?>'"><i class="mdi mdi-plus"></i>Tambah</button> 
                                        <?php }elseif($a->status_kg==14){ ?>
                                            <button class="btn waves-effect waves-light btn-warning btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_kegiatan/edit_laporan_kegiatan/<?php echo $a->id_rab;?>/<?php echo $a->id_kg;?>/<?php echo $a->lokasi_kg;?>'"><i class="mdi mdi-pen"></i>Edit</button> 
                                        <?php }?>
                                    <?php }?>
                                    <?php if($a->status_kg>=14){ ?>
                                        <button class="btn waves-effect waves-light btn-info btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_kegiatan/rincian_laporan_kegiatan/<?php echo $a->id_rab;?>/<?php echo $a->id_kg;?>/<?php echo $a->lokasi_kg;?>'"><i class="mdi mdi-file-document"></i> Lihat</button>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php $i++; }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Column
 -->
</div>