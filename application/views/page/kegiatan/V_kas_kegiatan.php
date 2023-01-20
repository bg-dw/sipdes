<div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-xlg-9">
        <div class="card">
            <div class="card-body">
                <?php if($this->session->userdata('level')=="tpk_bd"){ ?>
                    <button class="btn waves-effect waves-light btn-success btn-md pull-right" onclick="location.href='<?php echo base_url();?>index.php/c_kegiatan/input_kas_kegiatan';"><i class="mdi mdi-plus"></i> Tambah</button>
                <?php }?>
                <h4 class="card-title">Daftar Kas Kegiatan</h4>
                <h6 class="card-subtitle">Bidang Pemberdayaan Masyarakat</h6>
                <div class="table-responsive m-t-40">
                    <table class="table table-bordered table-striped datatable">
                        <thead>
                            <tr role="row">
                              <th class="text text-center">No</th>
                              <th class="text text-center">Tgl</th>
                              <th class="text text-center">Uraian</th>
                              <th class="text text-center">Pen. Bendahara</th>
                              <th class="text text-center">Pen. Swadaya</th>
                              <th class="text text-center">Peng. B.barang</th>
                              <th class="text text-center">Peng. B.modal</th>
                              <th class="text text-center">Saldo</th>
                              <th class="text text-center">Opsi</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; foreach($kg as $a){ ?>
                            <tr role="row">
                                <td align="center" width="10px"><?php echo ($i+1).".";?></td>
                                <td align="center"><?php echo date('d/m/Y',strtotime($a->tgl_kas_kg));?></td>
                                <td align="center"><?php echo $a->uraian_kas_kg;?></td>
                                <td align="center"><?php echo $a->penerimaan_kas_bd;?></td>
                                <td align="center"><?php echo $a->penerimaan_kas_sm;?></td>
                                <td align="center"><?php echo $a->pengeluaran_bj;?></td>
                                <td align="center"><?php echo $a->pengeluaran_bm;?></td>
                                <td align="center"><?php echo $a->saldo_kas_kg;?></td>
                                <td align="center">
                                  <div class="btn-group" role="group" aria-label="Basic example"><button class="btn waves-effect waves-light btn-warning" onclick="location.href='<?php echo base_url();?>index.php/c_kegiatan/edit_kas_kg/<?php echo $a->id_kas_kg;?>'">Edit
                                    </button> 
                                    <button class="btn waves-effect waves-light btn-danger" onclick="hapus_kas('<?=$a->id_kas_kg?>')">Hapus
                                    </button>
                                  </div>

                                    
                                </td>
                            </tr>
                        <?php $i++; }?>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label>Tampilkan Kas Kegiatan :</label>
                      <select class="form-control custom-select" onchange="get_kas_kg()" id="sel_kas">
                          <option>--Pilih Kegiatan--</option>
                          <?php foreach ($rab as $isi){?>
                            <option value="<?=$isi->id_detail_kg?>"><?=$isi->nama_kg?> (<?=$isi->lokasi_kg?>)</option>
                          <?php } ?>
                      </select>
                      <?php //var_dump($rab);?>
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
  function get_kas_kg(id_detail_kg){
    var id = $('#sel_kas').val();
    window.location.href = "<?php echo base_url();?>index.php/c_kegiatan/rincian_kas/"+id;
  }
  function hapus_kas(id){
    var x = confirm('Hapus Kas?');
    if(x===true){
      location.href='<?php echo base_url();?>index.php/c_kegiatan/hapus_kas_kg/'+id;
    }
  }
</script>