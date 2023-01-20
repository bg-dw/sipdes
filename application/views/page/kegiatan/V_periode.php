<div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-xlg-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="card-title">Periode</h4>
                        <h6 class="card-subtitle">Bidang Pemberdayaan Masyarakat</h6>
                    </div>
                    <div class="col-md-4 offset-md-4">
                            <div class="input-group">
                            <label class="control-label">Periode : </label>
                                <input type="number" name="th" class="form-control text-center yearpicker" required="" id="th">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="button" onclick="add_periode()"><i class="mdi mdi-plus"></i>Tambah</button>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="table-responsive m-t-40">
                    <table class="datatable table table-bordered table-striped">
                        <thead>
                            <tr role="row">
                              <th class="text text-center">No</th>
                              <th class="text text-center">Periode</th>
                              <th class="text text-center">Status</th>
                              <th class="text text-center">Opsi</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; foreach($periode as $a){ ?>
                            <tr role="row">
                                <td align="center" width="10px"><?php echo ($i+1).".";?></td>
                                <td align="center"><?php echo $a->periode;?></td>
                                <td align="center"><?php if($a->status_periode==1){echo "Aktif";}else{echo "Non-aktif";}?></td>
                                <td align="center">
                                    <?php if($a->status_periode==0){?>
                                    <button class="btn waves-effect waves-light btn-success btn-sm" onclick="set_aktif('<?php echo $a->id_periode;?>');">
                                        <i class="fa fa-check text-white"> Aktifkan</i>
                                    </button> 
                                    <?php }?> 
                                </td>
                            </tr>
                        <?php $i++; }?>
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="addp" role="dialog" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel1">Tambah Periode</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form action="#">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label">Periode :</label>
                                    <div class="input-group">
                                        <input type="number" name="th" class="form-control text-center yearpicker" required="" id="th">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="button" onclick="add_periode()" class="btn waves-effect waves-light btn-info">Simpan</button>
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
    function add_periode() {
        var th = $("#th").val();
        jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/c_kegiatan/add_periode",
        dataType: 'json',
        data: {
         th: th
        },
        success: function(result){
            window.location.href="<?php echo base_url(); ?>" + "index.php/c_kegiatan/set_periode";
            alert('Periode Baru Ditambahkan!');
        },
        error: function(xhr,status, error){
            alert('Periode Telah Digunakan!');
        }
     });
    }
    function set_aktif(id) {
        jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "index.php/c_kegiatan/update_periode",
        dataType: 'json',
        data: {
         id_periode: id
        },
        success: function(result){
            window.location.href="<?php echo base_url(); ?>" + "index.php/c_kegiatan/set_periode";
            alert('Periode Telah Aktif!');
        },
        error: function(xhr,status, error){
            alert('Gagal!');
        }
     });
    }
</script>