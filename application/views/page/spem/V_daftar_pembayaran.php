<div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-xlg-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar SPP</h4>
                <h6 class="card-subtitle">Bidang Pemberdayaan Masyarakat</h6>
                <div class="table-responsive m-t-40">
                    <table class="datatable table table-bordered table-striped">
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
                        <?php $i=0; foreach($daftar as $a){ ?>
                            <tr role="row">
                                <td align="center" width="10px"><?php echo ($i+1).".";?></td>
                                <td align="center"><?php echo $a->nama_kg;?></td>
                                <td align="center"><?php echo $a->lokasi_kg;?></td>
                                <td align="center">
                                    <?php if($this->session->userdata('level')=="pk"){ //echo $a->status_kg; ?>
                                        <?php if($a->status_kg>=10){ ?>
                                            <span class="label label-rounded label-success">Selesai</span>
                                         <?php }elseif ($a->status_kg<=5) {?>
                                                <span class="label label-rounded label-warning">Menunggu</span>
                                        <?php }elseif ($a->status_kg==6) {?>
                                                <span class="label label-rounded label-danger">Belum Selesai</span>
                                        <?php }elseif ($a->status_kg==7) {?>
                                                <span class="label label-rounded label-warning">Menunggu Verifikasi</span>
                                        <?php }elseif ($a->status_kg==8) {?>
                                                <span class="label label-rounded label-danger">Periksa Kembali</span>
                                        <?php }elseif ($a->status_kg==9) {?>
                                                <span class="label label-rounded label-warning">Menunggu Persetujuan</span>
                                        <?php }?>
                                    <?php }?>
                                    <?php if($this->session->userdata('level')=="sd"){ //echo $a->status_kg; ?>
                                        <?php if($a->status_kg>=11){ ?>
                                            <span class="label label-rounded label-success">Selesai</span>
                                         <?php }elseif ($a->status_kg<=6) {?>
                                                <span class="label label-rounded label-warning">Menunggu</span>
                                         <?php }elseif ($a->status_kg==7) {?>
                                                <span class="label label-rounded label-danger">Belum Selesai</span>
                                        <?php }elseif ($a->status_kg==8) {?>
                                                <span class="label label-rounded label-warning">Menunggu Perubahan</span>
                                        <?php }elseif ($a->status_kg==10) {?>
                                                <span class="label label-rounded label-danger">Periksa Kembali</span>
                                        <?php }elseif ($a->status_kg==9) {?>
                                                <span class="label label-rounded label-warning">Menunggu Persetujuan</span>
                                        <?php }?>
                                    <?php }?>
                                    <?php if($this->session->userdata('level')=="kd"||$this->session->userdata('level')=="bd"){ //echo $a->status_kg; ?>
                                        <?php if($a->status_kg>=11){ ?>
                                            <span class="label label-rounded label-success">Selesai</span>
                                         <?php }elseif ($a->status_kg==9) {?>
                                                <span class="label label-rounded label-danger">Belum Selesai</span>
                                        <?php }elseif ($a->status_kg==10) {?>
                                                <span class="label label-rounded label-warning">Menunggu Perubahan</span>
                                        <?php }elseif ($a->status_kg<9) {?>
                                                <span class="label label-rounded label-warning">Menunggu</span>
                                        <?php }?>
                                    <?php }?>
                                </td>
                                <td align="center">
                                    <?php if($this->session->userdata('level')=="pk"){ ?>
                                        <?php if($a->status_kg==6){ ?>
                                            <button class="btn waves-effect waves-light btn-success btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_pembayaran/tambah_spp/<?php echo $a->id_rab;?>/<?php echo $a->id_kg;?>/<?php echo $a->lokasi_kg;?>'"><i class="mdi mdi-plus"></i>Tambah</button> 
                                        <?php }?>
                                        <?php if($a->status_kg==8){ ?>
                                            <button class="btn waves-effect waves-light btn-warning btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_pembayaran/edit_pembayaran/<?php echo $a->id_rab;?>/<?php echo $a->id_kg;?>/<?php echo $a->lokasi_kg;?>'">
                                                <i class="fa fa-pencil text-inverse m-r-10"> Edit</i>
                                            </button> 
                                        <?php }elseif($a->status_kg>=7){ ?>
                                            <button class="btn waves-effect waves-light btn-info btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_pembayaran/rincian_pembayaran/<?php echo $a->id_rab;?>/<?php echo $a->id_kg;?>/<?php echo $a->lokasi_kg;?>'"><i class="mdi mdi-file-document"></i>Lihat</button>
                                        <?php }?>
                                    <?php }?>
                                    <?php if($this->session->userdata('level')=="sd"){ ?>
                                        <?php if($a->status_kg==7){ ?>
                                            <button class="btn waves-effect waves-light btn-info btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_pembayaran/rincian_pembayaran/<?php echo $a->id_rab;?>/<?php echo $a->id_kg;?>/<?php echo $a->lokasi_kg;?>'"><i class="mdi mdi-file-document"></i>Verifikasi</button>
                                        <?php }?>
                                        <?php if($a->status_kg>=9){ ?>
                                            <button class="btn waves-effect waves-light btn-info btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_pembayaran/rincian_pembayaran/<?php echo $a->id_rab;?>/<?php echo $a->id_kg;?>/<?php echo $a->lokasi_kg;?>'"><i class="mdi mdi-file-document"></i>Lihat</button>
                                        <?php }?>
                                    <?php }?>
                                    <?php if($this->session->userdata('level')=="kd"){ ?>
                                        <?php if($a->status_kg==9){ ?>
                                            <button class="btn waves-effect waves-light btn-info btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_pembayaran/rincian_pembayaran/<?php echo $a->id_rab;?>/<?php echo $a->id_kg;?>/<?php echo $a->lokasi_kg;?>'"><i class="mdi mdi-file-document"></i>Verifikasi</button>
                                        <?php }?>
                                        <?php if($a->status_kg>=11){ ?>
                                            <button class="btn waves-effect waves-light btn-info btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_pembayaran/rincian_pembayaran/<?php echo $a->id_rab;?>/<?php echo $a->id_kg;?>/<?php echo $a->lokasi_kg;?>'"><i class="mdi mdi-file-document"></i>Lihat</button>
                                        <?php }?>
                                    <?php }?>
                                    <?php if($this->session->userdata('level')=="bd"){ ?>
                                        <?php if($a->status_kg>=11){ ?>
                                            <button class="btn waves-effect waves-light btn-info btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_pembayaran/rincian_pembayaran/<?php echo $a->id_rab;?>/<?php echo $a->id_kg;?>/<?php echo $a->lokasi_kg;?>'"><i class="mdi mdi-file-document"></i>Lihat</button>
                                        <?php }?>
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