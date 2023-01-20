<div class="row">
    <div class="col-md-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Rincian RAB</h4>
            </div>
            <div class="card-body print" id="printablediv">
                <table style="width: 100%;border-collapse: collapse;border-bottom: 1px;" rules="none" border="2">
                    <tr>
                        <th colspan="5" style="text-align: center;padding: 8px;"></th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: center;">PEMERINTAH DESA PANDANLANDUNG</th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: center;">RENCANA ANGGARAN BIAYA (RAB)</th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: center;">TAHUN ANGGARAN <?php echo $rab[0]->periode_rab;?></th>
                    </tr>
                    <tr>
                        <th colspan="5" style="text-align: center;padding: 8px;"></th>
                    </tr>
                </table>
                <table style="width: 100%;border-collapse: collapse;border-bottom: 1px;" rules="none" border="2">
                    <tr>
                      <th style="text-align: center;padding: 5px;"></th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <th width="200px" style="padding-left: 10px;">Tahun Anggaran</th>
                      <th width="10px" > :</th>
                      <th  style="text-align: left;"><?php echo $rab[0]->periode_rab;?></th>
                    </tr>
                    <tr>
                      <th width="200px" style="padding-left: 10px;">Lokasi</th>
                      <th width="10px" > :</th>
                      <th  style="text-align: left;"><?php echo $rab[0]->lokasi_rab;?></th>
                    </tr>
                    <tr>
                      <th width="200px" style="padding-left: 10px;">Status RAB</th>
                      <th width="10px" > :</th>
                      <th  style="text-align: left;"><?php if($rab[0]->status_kg==1){echo "Perancanaan";}else{echo "Dilaksanakan";}?></th>
                    </tr>
                    <tr>
                      <th width="200px" style="padding-left: 10px;">Total Anggaran</th>
                      <th width="10px" > :</th>
                      <th  style="text-align: left;"><?php echo $rab[0]->nilai_rab;?></th>
                    </tr>
                    <tr>
                      <th style="text-align: center;padding: 5px;"></th>
                      <th></th>
                      <th></th>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table" border="2">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width="50%">Nama Kegiatan</th>
                                        <th width="15%">Nominal</th>
                                        <th width="15%">Status</th>
                                        <th width="15%">Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $i=0; 
                                  foreach($rab as $data){?>
                                    <tr>
                                      <td><?php echo $i+1;?>.</td>
                                      <td><?php echo $data->nama_kg?></td>
                                      <td><?php echo rupiah_php($data->nominal_kegiatan_rab)?></td>
                                      <td><?php if($data->status_kg==1){echo "Perancanaan";}else{echo "Dilaksanakan";}?></td>
                                      <td><?php echo $data->waktu_pelaksanaan?></td>
                                    </tr>
                                  <?php $i++;}?>
                                    <tr style="font-weight: bold;">
                                        <td></td>
                                        <td>Total</td>
                                        <td colspan="3"><?php echo rupiah_php($rab[0]->nilai_rab)?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
