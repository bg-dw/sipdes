<?php if($this->session->userdata('level')!="bd"){ ?>
    <div class="row">
        <?php //var_dump($rab_kegiatan);
        foreach($rab_kegiatan as $x){}?>
        <div class="card-group col-md-12">
        <!-- Column -->
            <div class="col-md-4">
                <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="m-b-0"><i class="mdi mdi-case-sensitive-alt text-blue"></i></h2>
                            <h3 class=""><?php if($total_anggaran){echo "Rp. ".rupiah_php($total_anggaran[0]->nilai_rab);}?></h3>
                            <h6 class="card-subtitle">Total Anggaran</h6>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: 100%; height:15px;" role="progressbar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="m-b-0"><i class="mdi mdi-cart-plus text-warning"></i></h2>
                                <h3 class=""><?php //echo "Rp. ".rupiah_php(array_sum($isi));?>-</h3>
                                <h6 class="card-subtitle">Total Pengeluaran</h6>
                            </div>
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar bg-warning" style="width: <?php //echo (array_sum($isi)/$anggaran[0]->total_anggaran)*100;?>%; height:15px;" role="progressbar"><?php //echo round((array_sum($isi)/$anggaran[0]->total_anggaran)*100);?>0%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="m-b-0"><i class="mdi mdi-wallet text-danger"></i></h2>
                            <h3 class=""><?php //echo "Rp. ".rupiah_php(($anggaran[0]->total_anggaran)-(array_sum($isi)));?>-</h3>
                            <h6 class="card-subtitle">Sisa Anggaran</h6>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-danger" style="width: <?php //echo ((($anggaran[0]->total_anggaran)-(array_sum($isi)))/$anggaran[0]->total_anggaran)*100;?>%; height:15px;" role="progressbar"><?php //echo round(((($anggaran[0]->total_anggaran)-(array_sum($isi)))/$anggaran[0]->total_anggaran)*100);?>0%</div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>
<?php } ?>

<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-xlg-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Kegiatan</h4>
                <h6 class="card-subtitle">Bidang Pemberdayaan Masyarakat</h6>
                <div class="table-responsive m-t-40">
                    <?php //var_dump($rab);?>
                    <table class="datatable table table-bordered table-striped">
                        <thead>
                            <tr role="row">
                              <th class="text text-center">Kode Kegiatan</th>
                              <th class="text text-center">Tahun Anggaran</th>
                              <th class="text text-center">Nama Kegiatan</th>
                              <th class="text text-center">Biaya (Rp.)</th>
                              <th class="text text-center">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=0;
                                foreach($rab as $l){ echo $l->status_kg;?>
                                <tr role="row">
                                    <td align="center" width="10px"><?php echo ($i+1).".";?></td>
                                    <td align="center"><?php echo $l->periode_rab;?></td>
                                    <td><?php echo $l->nama_kg;?></td>
                                    <td align="right"><?php echo rupiah_php($l->nominal_kegiatan_rab);?></td>
                                    <td align="center">
                                        <?php if($l->status_rab>=1){?>
                                            <div class="label label-table <?php if($l->status_kg<2){echo "label-warning";}elseif($l->status_kg<14){echo "label-success";}elseif($l->status_kg==14){echo "label-info";}?>"><?php if($l->status_kg==0||$l->status_kg<2){echo "Perencanaan";}elseif($l->status_kg>=2&&$l->status_kg<14){echo "Pelaksanaan";}elseif($l->status_kg==14){echo "Selesai";}?></div>
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php $i++;}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- Column -->
</div>