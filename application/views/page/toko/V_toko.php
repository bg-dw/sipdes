<div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-xlg-9">
        <div class="card">
            <div class="card-body">
                <button class="btn waves-effect waves-light btn-success btn-md pull-right" data-toggle="modal" data-target="#i_toko"><i class="mdi mdi-plus"></i> Tambah</button>
                <h4 class="card-title">Daftar Kegiatan</h4>
                <h6 class="card-subtitle">Bidang Pemberdayaan Masyarakat</h6>
                <div class="table-responsive m-t-40">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                            <tr role="row">
                              <th class="text text-center">No</th>
                              <th class="text text-center">KD. Kegiatan</th>
                              <th class="text text-center">Nama Kegiatan</th>
                              <th class="text text-center">Opsi</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; foreach($toko as $a){ ?>
                            <tr role="row">
                                <td align="center" width="10px"><?php echo ($i+1).".";?></td>
                                <td align="center"><?php echo $a->nama_toko;?></td>
                                <td align="center"><?php echo $a->pemilik_toko;?></td>
                                <td align="center">
                                    <?php //if($a->tahun_kg==date('Y')){?>
                                        <button class="btn waves-effect waves-light btn-warning btn-sm" data-toggle="modal" data-target="#e_toko" onclick="edit('<?php echo $a->id_toko;?>','<?php echo $a->nama_toko;?>','<?php echo $a->pemilik_toko;?>','<?php echo $a->alamat_toko;?>')">
                                            <i class="fa fa-pencil text-inverse m-r-10"> Edit</i>
                                        </button> 
                                    <?php //}?>
                                    <button class="btn waves-effect waves-light btn-danger btn-sm" data-toggle="modal" data-target="#hapusUs" onclick="hapus('<?php echo $a->id_toko;?>','<?php echo $a->nama_toko;?>');">
                                        <i class="fa fa-trash-o text-white"> Hapus</i>
                                    </button> 
                                </td>
                            </tr>
                        <?php $i++; }?>
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="i_toko" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel1">Tambah Toko</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form action="<?php echo base_url();?>index.php/c_toko/ac_input" method="POST" onsubmit="return confirm('Simpan Data?');">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Nama Toko</label>
                                    <input type="text" name="nt" class="form-control" placeholder="Nama Toko" required="">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Nama Pemilik</label>
                                    <input type="text" name="np" class="form-control" placeholder="Pemilik" required="">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Alamat Toko</label>
                                    <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat" required=""></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="e_toko" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel1">Tambah Toko</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form action="<?php echo base_url();?>index.php/c_toko/ac_edit" method="POST" onsubmit="return confirm('Simpan Data?');">
                            <div class="modal-body">
                                <input type="hidden" name="id" class="form-control" placeholder="Nama Toko" required="" id="e_id">
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Nama Toko</label>
                                    <input type="text" name="nt" class="form-control" placeholder="Nama Toko" required="" id="e_nt">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Nama Pemilik</label>
                                    <input type="text" name="np" class="form-control" placeholder="Pemilik" required="" id="e_np">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Alamat Toko</label>
                                    <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat" required="" id="e_al"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="hapusUs" role="dialog" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel1">Hapus Toko?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form action="<?php echo base_url();?>index.php/c_toko/ac_hapus" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label id="l_tk"></label>
                                    <input type="hidden" name="id" class="form-control" id="id_tk" required="">
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
        document.getElementById('l_tk').innerHTML =nama;
        document.getElementById('id_tk').value=id;
    }
</script>
<script type="text/javascript">
    function edit(id,nt,np,al) {
        document.getElementById('e_id').value=id;
        document.getElementById('e_nt').value=nt;
        document.getElementById('e_np').value=np;
        document.getElementById('e_al').innerHTML =al;
    }
</script>