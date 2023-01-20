<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <?php if($this->session->userdata('level')=="pk"){ ?>
                    <button class="btn waves-effect waves-light btn-success btn-md pull-right" onclick="location.href='<?php echo base_url();?>index.php/c_rab/input_rab';"><i class="mdi mdi-plus"></i> Tambah</button>
                <?php }?>
                <h4 class="card-title">Daftar RAB</h4>
                <h6 class="card-subtitle">Bidang Pemberdayaan Masyarakat</h6>
                <div class="table-responsive m-t-40">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                            <tr role="row">
                              <th class="text text-center">No</th>
                              <th class="text text-center">Tahun Anggaran</th>
                              <th class="text text-center">Total Anggaran</th>
                              <th class="text text-center">Status</th>
                              <th class="text text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; foreach($list_rab as $a){ ?>
                                <tr role="row">
                                    <td align="center" width="10px"><?php echo ($i+1).".";?></td>
                                    <td align="center"><?php echo $a->periode_rab;?></td>
                                    <td align="center"><?php echo rupiah_php($a->nilai_rab);?></td>
                                    <td align="center"><?php if($a->status_rab=="1"){?><span class="label label-rounded label-warning">Perencanaan</span><?php }else{?> <span class="label label-rounded label-success">Pelaksanaan</span><?php }?></td>
                                    <td align="center">
                                        <?php if($this->session->userdata('level')!="bd"){ ?>
                                            <button class="btn waves-effect waves-light btn-info btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_rab/rincian_rab/<?php echo $a->id_rab;?>'">
                                                <i class="fa fa-desktop"> Lihat</i>
                                            </button> 
                                            <?php if($this->session->userdata('level')=="pk"){ ?>
                                                <button class="btn waves-effect waves-light btn-warning btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_rab/edit_rab/<?php echo $a->id_rab;?>'">
                                                    <i class="fa fa-pencil "> Edit</i>
                                                </button> 
                                                <?php if($a->status_rab<=1){?>
                                                    <button class="btn waves-effect waves-light btn-danger btn-sm" data-toggle="modal" data-target="#hapusUs" onclick="hapus('<?php echo $a->id_rab;?>','<?php echo $a->periode_rab;?>');">
                                                        <i class="fa fa-trash-o text-white"> Hapus</i>
                                                    </button> 
                                                <?php }?>
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
</div>
<div class="modal fade" id="hapusUs" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Hapus RAB?</h4>
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
<!-- Column
 -->
</div>
<script type="text/javascript">
    function hapus(id,th) {
        document.getElementById('l_us').innerHTML ="Tahun Anggaran "+th;
        document.getElementById('id_rab').value=id;
    }
</script>