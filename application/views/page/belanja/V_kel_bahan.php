<div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-xlg-9">
        <div class="card">
            <div class="card-body">
                <button class="btn waves-effect waves-light btn-success btn-md pull-right" onclick="location.href='<?php echo base_url();?>index.php/c_bahan/input_kel_bahan';"><i class="mdi mdi-plus"></i> Tambah</button>
                <h4 class="card-title">Daftar Belanja</h4>
                <h6 class="card-subtitle">Barang atau Jasa</h6>
                <div class="table-responsive m-t-40">
                    <table class="datatable table table-bordered table-striped">
                        <thead>
                            <tr role="row">
                              <th class="text text-center">No</th>
                              <th class="text text-center">Nama Kelompok Bahan</th>
                              <th class="text text-center">Opsi</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; foreach($kel_bahan as $a){ ?>
                            <tr role="row">
                                <td align="center" width="10px"><?php echo ($i+1).".";?></td>
                                <td align="center"><?php echo $a->kel_bahan;?></td>
                                <td align="center">
                                    <button class="btn waves-effect waves-light btn-warning btn-sm" onclick="location.href='<?php echo base_url();?>index.php/c_bahan/edit_kel_bahan/<?php echo $a->id_kel_bahan;?>'">
                                        <i class="fa fa-pencil text-inverse m-r-10"> Edit</i>
                                    </button> 
                                    <button class="btn waves-effect waves-light btn-danger btn-sm" data-toggle="modal" data-target="#hapusUs" onclick="hapus('<?php echo $a->id_kel_bahan;?>','<?php echo $a->kel_bahan;?>');">
                                        <i class="fa fa-trash-o text-white"> Hapus</i>
                                    </button> 
                                </td>
                            </tr>
                        <?php $i++; }?>
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="hapusUs" role="dialog" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel1">Hapus Kelompok Bahan?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form action="<?php echo base_url();?>index.php/c_bahan/ac_hapus_kel" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label id="l_bahan"></label>
                                    <input type="hidden" name="id" class="form-control" id="id_bahan" required="">
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
        document.getElementById('l_bahan').innerHTML =nama;
        document.getElementById('id_bahan').value=id;
    }
</script>