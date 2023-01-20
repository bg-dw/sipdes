<div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-xlg-9">
        <div class="card">
            <div class="card-body">
                <button class="btn waves-effect waves-light btn-success btn-md pull-right" data-toggle="modal" data-target="#addUs"><i class="mdi mdi-account-plus"></i> Tambah</button>
                <h4 class="card-title">Daftar User</h4>
                <h6 class="card-subtitle">Bidang Pemberdayaan Masyarakat</h6>
                <div class="table-responsive m-t-40">
                    <table class="datatable table table-bordered table-striped">
                        <thead>
                            <tr role="row">
                              <th class="text text-center">No</th>
                              <th class="text text-center">Nama User</th>
                              <th class="text text-center">Level</th>
                              <th class="text text-center">Status</th>
                              <th class="text text-center">Tahun Aktif</th>
                              <th class="text text-center">Opsi</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; foreach($user as $a){ ?>
                            <tr role="row">
                                <td align="center" width="10px"><?php echo ($i+1).".";?></td>
                                <td align="center"><?php echo $a->nama_us;?></td>
                                <td align="center"><?php echo $a->level_us;?></td>
                                <td align="center"> 
                                    <div class="label label-table label-<?php if($a->status_us=='ak'){ echo 'success';}else{ echo 'danger';}?>"><?php if($a->status_us=='ak'){echo "Active";}else{echo "Non-Aktif";}?></div>
                                </td>
                                <td align="center"><?php echo $a->th_aktif;?></td>
                                <td align="center">
                                    <button class="btn waves-effect waves-light btn-warning btn-sm" data-toggle="modal" data-target="#editUs" onclick="edit('<?php echo $a->id_user;?>','<?php echo $a->nama_us;?>','<?php echo $a->jk_us;?>','<?php echo date('m/d/Y',strtotime($a->tgl_us));?>','<?php echo $a->level_us;?>','<?php echo $a->status_us;?>','<?php echo $a->th_aktif;?>');">
                                        <i class="fa fa-pencil text-inverse m-r-10"> Edit</i>
                                    </button> 
                                    <?php if($a->level_us=="admin"){}else{?>
                                    <button class="btn waves-effect waves-light btn-danger btn-sm" data-toggle="modal" data-target="#hapusUs" onclick="hapus('<?php echo $a->id_user;?>','<?php echo $a->nama_us;?>');">
                                        <i class="fa fa-trash-o text-white"> Hapus</i>
                                    </button> 
                                    <?php }?> 
                                </td>
                            </tr>
                        <?php $i++; }?>
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="addUs" role="dialog" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel1">Tambah User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form action="<?php echo base_url();?>index.php/c_user/ac_tambah" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name" class="control-label">Nama :</label>
                                    <input type="text" name="nama" class="form-control" id="name" required="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Jenis Kelamin :</label>
                                    <input name="jk" value="lk" type="radio" id="radio_1" checked />
                                    <label for="radio_1">Laki - Laki</label>
                                    <input name="jk" value="pr" type="radio" id="radio_2" />
                                    <label for="radio_2">Perempuan</label>
                                </div>
                                <div class="form-group">
                                     <label class="control-label">Tgl. Lahir :</label>
                                    <div class="input-group">
                                        <input type="text" name="tgl" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy" required="">
                                        <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Level :</label>
                                    <select class="form-control" name="level" data-style="form-control btn-secondary" required="">
                                        <option value="pk">Pelaksana kegiatan</option>
                                        <option value="tpk_kt">Ketua TPK</option>
                                        <option value="tpk_sk">Sekretaris TPK</option>
                                        <option value="tpk_bd">Bendahara TPK</option>
                                        <option value="kd">Kepala Desa</option>
                                        <option value="sd">Sekretaris Desa</option>
                                        <option value="bd">Bendahara Desa</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Status Akses :</label>
                                    <input name="status" value="ak" type="radio" id="radio_a" checked />
                                    <label for="radio_a">Aktif</label>
                                    <input name="status" value="na" type="radio" id="radio_b" />
                                    <label for="radio_b">Non-aktif</label>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="th_ak" class="form-control" id="th_ak" value="<?php echo date('Y');?>" required="" readonly>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn waves-effect waves-light btn-info">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="editUs" role="dialog" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel1">Edit User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form action="<?php echo base_url();?>index.php/c_user/ac_edit" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                    <input type="hidden" name="id" class="form-control" id="e_id" required="">
                                <div class="form-group">
                                    <label for="name" class="control-label">Nama :</label>
                                    <input type="text" name="nama" class="form-control" id="e_name" required="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Jenis Kelamin :</label>
                                    <input name="jk" value="lk" type="radio" id="r_lk"/>
                                    <label for="r_lk">Laki - Laki</label>
                                    <input name="jk" value="pr" type="radio" id="r_pr" />
                                    <label for="r_pr">Perempuan</label>
                                </div>
                                <div class="form-group">
                                     <label class="control-label">Tgl. Lahir :</label>
                                    <div class="input-group">
                                        <input type="text" name="tgl" class="form-control" id="d_e_user" required="">
                                        <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Level :</label>
                                    <select class="form-control" name="level" data-style="form-control btn-secondary" required="" id="level">
                                        <option value="admin">Admin</option>
                                        <option value="pk">Pelaksana kegiatan</option>
                                        <option value="tpk_kt">Ketua TPK</option>
                                        <option value="tpk_sk">Sekretaris TPK</option>
                                        <option value="tpk_bd">Bendahara TPK</option>
                                        <option value="kd">Kepala Desa</option>
                                        <option value="sd">Sekretaris Desa</option>
                                        <option value="bd">Bendahara Desa</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Status Akses :</label>
                                    <input name="status" value="ak" type="radio" id="s_a"/>
                                    <label for="s_a">Aktif</label>
                                    <input name="status" value="na" type="radio" id="s_b" />
                                    <label for="s_b">Non-aktif</label>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="th_ak" class="form-control" id="e_th_ak" required="" >
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn waves-effect waves-light btn-info">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="hapusUs" role="dialog" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel1">Hapus User?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form action="<?php echo base_url();?>index.php/c_user/ac_hapus" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name" class="control-label">Nama :</label>
                                    <label id="l_us"></label>
                                    <input type="hidden" name="id" class="form-control" id="id_us" required="">
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
<!-- Column
 -->
</div>
<script type="text/javascript">
    function hapus(id,nama) {
        document.getElementById('l_us').innerHTML =nama;
        document.getElementById('id_us').value=id;
    }
</script>
<script type="text/javascript">
    function edit(id,nama,jk,tgl,level,st,th) {
        document.getElementById('e_id').value=id;
        document.getElementById('e_name').value=nama;
        if(jk=="lk"){
            document.getElementById('r_lk').checked = true;
        }else if(jk=="pr"){
            document.getElementById('r_pr').checked = true;
        }
        document.getElementById('d_e_user').value=tgl;
        document.getElementById('level').value=level;
        document.getElementById('e_th_ak').value=th;
        if(st=="ak"){
            document.getElementById('s_a').checked = true;
        }else if(st=="na"){
            document.getElementById('s_b').checked = true;
        }
    }
</script>