<?php //var_dump($rab);
//var_dump($pn); 
if($rab){ //penawaran lama?>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12 col-xlg-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Permintaan Penawaran Baru</h4>
                    <h6 class="card-subtitle">Bidang Pemberdayaan Masyarakat</h6>
                    <div class="table-responsive m-t-40">
                        <table class="table table-bordered table-striped datatable">
                            <thead>
                                <tr role="row">
                                  <th class="text text-center">No</th>
                                  <th class="text text-center">Nama Kegiatan</th>
                                  <th class="text text-center">Lokasi</th>
                                  <th class="text text-center">Durasi</th>
                                  <th class="text text-center">Biaya</th>
                                  <th class="text text-center">Status</th>
                                  <th class="text text-center">Opsi</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; foreach($rab as $a){ ?>
                                   <tr role="row">
                                        <td align="center" width="10px"><?php echo ($i+1).".";?></td>
                                        <td><?php echo $a->nama_kg;?></td>
                                        <td align="center"><?php echo str_replace("-", "/", $a->lokasi_kg);?></td>
                                        <td><?php echo $a->waktu_pelaksanaan;?></td>
                                        <td><?php echo $a->nominal_kegiatan_rab;?></td>
                                        <td align="center">
                                            <?php if($this->session->userdata('level')!="pk"){ ?>
                                                <?php if($a->status_kg>2){ ?>
                                                    <span class="label label-rounded label-success">Selesai</span>
                                                 <?php }elseif ($a->status_kg==1) {?>
                                                        <span class="label label-rounded label-danger">Belum Selesai</span>
                                                <?php }?>
                                            <?php }?>
                                        </td>
                                        <td align="center">
                                            <?php if($this->session->userdata('level')=="tpk_sk"){ ?>
                                                <?php if($a->status_kg==1){ ?>
                                                    <button class="btn waves-effect waves-light btn-success btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_penawaran/input_penawaran/<?php echo $a->id_rab;?>/<?php echo $a->id_kg;?>/<?php echo $a->lokasi_kg;?>'"><i class="fa fa-plus-square"></i> Tambah
                                                    </button>
                                                <?php }?>
                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php  $i++; }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <!-- Column
     -->
    </div>
<?php }?>
<?php if($pn){ //penawaran baru?>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12 col-xlg-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Permintaan Penawaran</h4>
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
                                <?php $i=0; foreach($pn as $a){ ?>
                                   <tr role="row">
                                        <td align="center" width="10px"><?php echo ($i+1).".";?></td>
                                        <td align="center"><?php echo $a->nama_kg;?></td>
                                        <td align="center"><?php echo str_replace("-", "/", $a->lokasi_kg);?></td>
                                        <td align="center">
                                            <?php if($this->session->userdata('level')!="pk"){ ?>
                                                <?php if($a->status_kg>3){ ?>
                                                    <span class="label label-rounded label-success">Selesai</span>
                                                 <?php }elseif ($a->status_kg==2) {?>
                                                        <span class="label label-rounded label-warning">Menunggu Verifikasi</span>
                                                <?php }elseif ($a->status_kg==3) {?>
                                                        <span class="label label-rounded label-danger">Periksa Kembali</span>
                                                <?php }?>
                                            <?php }elseif($this->session->userdata('level')=="pk"){?>
                                            <?php if($a->status_kg>=4){ ?>
                                                    <span class="label label-rounded label-success">Selesai</span>
                                                 <?php }elseif ($a->status_kg==2) {?>
                                                        <span class="label label-rounded label-danger">Belum Terverifikasi</span>
                                                <?php }elseif ($a->status_kg==1) {?>
                                                        <span class="label label-rounded label-warning">Menunggu</span>
                                                <?php }elseif ($a->status_kg==3) {?>
                                                        <span class="label label-rounded label-warning">Menunggu Perbaikan</span>
                                                <?php }?>
                                            <?php }?>
                                        </td>
                                        <td align="center">
                                            <?php if($this->session->userdata('level')=="tpk_sk"){ ?>
                                                <?php if($a->status_kg==2||$a->status_kg==3){ ?>
                                                    <button class="btn waves-effect waves-light btn-warning btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_penawaran/edit_penawaran/<?php echo $a->id_pn;?>/<?php echo $a->id_kg;?>/<?php echo $a->lokasi_kg;?>'">
                                                        <i class="mdi mdi-pencil"></i> Edit
                                                    </button>
                                                <?php }?>
                                            <?php }?>
                                            <?php if($this->session->userdata('level')=="pk"){ ?>
                                                <?php if($a->status_kg==2){ ?>
                                                    <button class="btn waves-effect waves-light btn-success btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_penawaran/rincian_penawaran/<?php echo $a->id_pn;?>/<?php echo $a->id_kg;?>/<?php echo $a->lokasi_kg;?>'">
                                                        <i class="mdi mdi-file-document"></i> Verifikasi
                                                    </button> 
                                                <?php }?>
                                            <?php }?>
                                            <?php if($a->status_kg>2){ ?>
                                                <button class="btn waves-effect waves-light btn-info btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_penawaran/rincian_penawaran/<?php echo $a->id_pn;?>/<?php echo $a->id_kg;?>/<?php echo $a->lokasi_kg;?>'">
                                                    <i class="fa fa-desktop"></i> Lihat
                                                </button> 
                                            <?php }?>
                                        </td>
                                    </tr>
                                <?php  $i++; }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <!-- Column
     -->
    </div>
<?php }else{ $this->load->view("errors/gagal.html");}?>