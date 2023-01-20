<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30">
                    <?php if($this->session->userdata('pic')==""){?>
                        <img src="<?php echo base_url();?>assets/dist/profile_img/default.png" alt="user" class="img-circle" width="150">
                    <?php }else{ ?>
                        <img src="<?php echo base_url();?>assets/dist/profile_img/<?php echo $this->session->userdata('pic');?>" alt="user" class="img-circle" width="150">
                    <?php }?>
                    <h4 class="card-title m-t-10">
                        <?php 
                            $a = $this->session->userdata('nama');
                            $n_aw = explode(" ",$a);
                            echo $n_aw[0];
                        ?>
                    </h4>
                    <h6 class="card-subtitle"><?php echo $this->session->userdata('level');?></h6>
                    <div class="row text-center justify-content-md-center">
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="mdi mdi-account-card-details"></i> <font class="font-medium"><?php echo $this->session->userdata('id');?></font></a></div>
                    </div>
                </center>
            </div>
            <div>
                <hr> </div>
            <div class="card-body"> 
                <small class="text-muted">Tanggal Lahir </small>
                <h6><?php echo date("d-m-Y",strtotime($this->session->userdata('tgl')));?></h6> 
                <small class="text-muted p-t-30 db">Jenis Kelamin</small>
                <h6><?php if($this->session->userdata('jk')=="lk"){ echo "Laki - Laki";}else{echo "Perempuan";}?></h6> 
                <small class="text-muted p-t-30 db">Status Akses</small>
                <h6><?php if($this->session->userdata('status')=="ak"){echo "Active";}else{echo "Non-active";}?></h6> 
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="profile" role="tabpanel">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Nama Lengkap</strong>
                                <br>
                                <p class="text-muted"><?php echo $this->session->userdata('nama');?></p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Umur</strong>
                                <br>
                                <p class="text-muted">
                                    <?php
                                      $birthday = $this->session->userdata('tgl');
                                      
                                      // Convert Ke Date Time
                                      $biday = new DateTime($birthday);
                                      $today = new DateTime();
                                      
                                      $diff = $today->diff($biday);
                                        if($diff->y<1){
                                        echo "[ <1 Tahun"." ]";}else{
                                        
                                        echo "[ ".$diff->y ." Tahun ]";}
                                    ?></p>
                            </div>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Jenis Kelamin</strong>
                                <br>
                                <p class="text-muted"><?php if($this->session->userdata('jk')=="lk"){ echo "Laki - Laki";}else{echo "Perempuan";}?></p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Username</strong>
                                <br>
                                <p class="text-muted"><?php echo $this->session->userdata('username');?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="settings" role="tabpanel">
                    <div class="card-body">
                        <input type="checkbox" name="">
                        <form class="form-horizontal form-material" action="<?php echo base_url();?>index.php/c_user/ac_update_profile" enctype="multipart/form-data" method="post" >
                            <input type="hidden" name="id" class="form-control" value="<?php echo $this->session->userdata('id');?>" required="">
                            <div class="form-group">
                                <label class="control-label">Nama Lengkap</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="nama" value="<?php echo $this->session->userdata('nama');?>" readonly>
                                </div>
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
                                <div class="col-md-12">
                                    <input type="text" name="tgl" class="form-control form-control-line" id="datepicker-autoclose" value="<?php echo date('m/d/Y',strtotime($this->session->userdata('tgl')));?>" required="" readonly>
                                    <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-file-now-custom-2">Foto Profile :</label> 
                                <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#update_foto">
                                    Ganti Foto
                                </button>
                                <div class="collapse" id="update_foto"><br>
                                    <input type="file" name="foto_profile" class="dropify" data-height="200" data-show-remove="false" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Level :</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="level" data-style="form-control btn-secondary" required="">
                                        <option value="pk" <?php if($this->session->userdata('level')=="admin"){echo "selected";}else{echo "style='display:none;'";}?>>Admin</option>
                                        <option value="pk" <?php if($this->session->userdata('level')=="pk"){echo "selected";}else{echo "style='display:none;'";}?>>Pelaksana kegiatan</option>
                                        <option value="tpk_kt" <?php if($this->session->userdata('level')=="tpk_kt"){echo "selected";}else{echo "style='display:none;'";}?>>Ketua TPK</option>
                                        <option value="tpk_sk" <?php if($this->session->userdata('level')=="tpk_sk"){echo "selected";}else{echo "style='display:none;'";}?>>Sekretaris TPK</option>
                                        <option value="tpk_bd" <?php if($this->session->userdata('level')=="tpk_bd"){echo "selected";}else{echo "style='display:none;'";}?>>Bendahara TPK</option>
                                        <option value="kd" <?php if($this->session->userdata('level')=="kd"){echo "selected";}else{echo "style='display:none;'";}?>>Kepala Desa</option>
                                        <option value="sd" <?php if($this->session->userdata('level')=="sd"){echo "selected";}else{echo "style='display:none;'";}?>>Sekretaris Desa</option>
                                        <option value="bd" <?php if($this->session->userdata('level')=="bd"){echo "selected";}else{echo "style='display:none;'";}?>>Bendahara Desa</option>
                                    </select>
                                </div>
                            </div><input type="checkbox" onclick="document.getElementById('pw').type = this.checked ? 'text' : 'password'" class="filled-in chk-col-teal" checked="">
                            <div class="form-group">
                                <label class="control-label">Username</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="uname" value="<?php echo $this->session->userdata('username');?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control form-control-line" name="upass" value="<?php echo $this->session->userdata('password');?>" id="pw">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox checkbox-success">
                                    <input id="checkbox1" type="checkbox" onclick="document.getElementById('pw').type = this.checked ? 'text' : 'password'">
                                    <label for="checkbox1"> Show password </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Status Akses :</label>
                                <input name="status" value="ak" type="radio" id="radio_a" <?php if($this->session->userdata('status')=="ak"){echo "checked";}?>/>
                                <label for="radio_a">Aktif</label>
                                <input name="status" value="na" type="radio" id="radio_b" <?php if($this->session->userdata('status')=="na"){echo "checked";}?> />
                                <label for="radio_b">Non-aktif</label>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn waves-effect waves-light btn-info">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- Row -->
<script>
    function cekFile() {
     var cek = document.forms['cekForm']['foto'].value;
       if(cek==null || cek=="")
       {
         alert("Silahkan Pilih Foto Baru !!!");
         return false;
       }
    }
</script>