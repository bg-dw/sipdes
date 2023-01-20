<div class="row">
    <div class="col-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Bukti Pencairan</h4>
            </div>
            <div class="card-body" id="print_pembayaran">
            	<?php //var_dump($isi);
            	foreach($isi as $a){}?>
                <div class="row" style="margin-left: 80px;width: 90%;">
					<table style="width: 100%;border-collapse: collapse;border-bottom: 1px;" rules="none" border="2">
						<tr>
							<th colspan="5" style="text-align: center;padding: 8px;"></th>
						</tr>
						<tr>
							<th colspan="5" style="text-align: left;text-indent: 5px;font-weight: bold;">PEMERINTAH DESA PANDANLANDUNG</th>
						</tr>
						<tr>
							<th colspan="5" style="text-align: center;font-weight: bold;">BUKTI PENCAIRAN SPP</th>
						</tr>
						<tr>
							<th colspan="5" style="text-align: center;padding: 8px;"></th>
						</tr>
					</table>
					<table style="width: 100%;border-collapse: collapse;border-bottom: 1px;" rules="none" border="2">
						<tr>
							<td style="text-align: center;padding: 5px;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td width="15%" style="padding-left: 10px;">Nomor Bukti</td>
							<td width="2%" > :</td>
							<td width="40%" style="text-align: left;"><?php echo $a->nomor_bp;?></td>
							<td width=10%"></td>
							<td width="10%" style="padding-left: 10px;">Pembayaran</td>
							<td width="2%" > :</td>
							<td width="11%" style="text-align: left;"><?php echo $a->tipe_pembayaran;?></td>
						</tr>
						<tr>
							<td width="100px" style="padding-left: 10px;">Tanggal</td>
							<td width="10px" > :</td>
							<td  style="text-align: left;"><?php echo indo_mysql(date('Y-m-d'));?></td>
							<td width="50px"></td>
							<td width="100px" style="padding-left: 10px;"></td>
							<td width="10px" ></td>
							<td style="text-align: left;"></td>
						</tr>
						<tr>
							<td style="text-align: center;padding: 5px;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</table>
					<table style="width: 100%;border-collapse: collapse;border-bottom: 1px;" rules="none" border="2">
						<tr>
							<td style="text-align: center;padding: 5px;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr><th colspan="7" style="text-indent: 5px;">Dasar Pembayaran :</th></tr>
						<tr>
							<td width="20%" style="padding-left: 10px;">SPP Nomor dan Tanggal</td>
							<td width="10px" > :</td>
							<td style="text-align: left;"><?php echo $a->nomor_spp;?> Tanggal <?php echo indo_mysql($a->tgl_spp);?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td width="100px" style="padding-left: 10px;">Uraian</td>
							<td> :</td>
							<td style="text-align: left;"><?php echo $a->keluaran_kg;?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td style="text-align: center;padding: 5px;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td width="100px" style="padding-left: 10px;">Bidang</td>
							<td width="10px" > :</td>
							<td style="text-align: left;">21.12.04 <?php echo $a->bidang_kg;?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td width="100px" style="padding-left: 10px;">Kegiatan</td>
							<td> :</td>
							<td style="text-align: left;">21.12.04.<?php echo $a->kd_kg;?>. <?php echo $a->nama_kg;?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr><th colspan="7" style="text-indent: 5px;">Rincian Penggunaan Dana :</th></tr>
						<tr>
							<td style="text-align: center;padding: 5px;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</table>
                    <?php $kel=array(); $kel_bahan="1";$i=0;$sub_harga=0; // menjumlahkan belanja berdasarkan kelompok belanja
                    foreach($isi as $a){
                      if($kel_bahan==$a->kel_bahan){
                        $sub_harga+=$a->jumlah_bahan_kg*$a->harga_bahan_perjanjian;
                      }else{
                        $sub_harga=0;
                        $sub_harga=$a->jumlah_bahan_kg*$a->harga_bahan_perjanjian;
                      }?>
                      <?php 
                        $kel[$a->kel_bahan]= array($a->kel_bahan,$sub_harga,$a->id_kel_bahan); 
                      ?>
                    <?php $i++;
                      $kel_bahan=$a->kel_bahan;
                    }?>
                    <table border="2" width="100%">
                        <tr>
							<th width="5%" style="text-align: center;border: 2px solid;" >No</th>
							<th width="10%" style="text-align: center;border: 2px solid;" >Kode Rek.</th>
							<th width="55%px" style="text-align: center;border: 2px solid;" >Nama </th>
							<th width="15%" style="text-align: center;border: 2px solid;">ANGGARAN</th>
                        </tr>
                        <?php $total=0; $i=0; foreach($isi_kel_bahan as $x){?>
                            <tr>
                                <td style="text-align: center;border: 2px solid;"><?php echo ($i+1).".";?></td>
                                <td style="text-align: center;border: 2px solid;"><?php echo "5.1.2.".$kel[$x->kel_bahan][2];?></td>
                                <td style="border: 2px solid;"><?php echo $kel[$x->kel_bahan][0];?></td>
                                <td style="border: 2px solid;"><?php echo rupiah_php($kel[$x->kel_bahan][1]);?></td>
                            </tr>
                        <?php $i++;$total+=$kel[$x->kel_bahan][1];}?>
                        <tr style="font-weight: bold;border: 2px solid;">
                            <td style="text-align: center;border: 2px solid;"></td>
                            <td style="text-align: center;border: 2px solid;"></td>
                            <td style="text-align: center;border: 2px solid;">Jumlah</td>
                            <td><?php echo rupiah_php($total);?></td>
                        </tr>
                    </table>
					<table style="width: 100%;border-collapse: collapse;border-top: 1px;" rules="none" border="2">
						<tr>
							<td style="text-align: center;padding: 5px;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td width="200px" style="padding-left: 10px;">Jumlah Dibayarkan</td>
							<td width="35px" > :</td>
							<td width="50%" style="text-align: left;">Rp. <?php echo rupiah_php($total);?></td>
							<td colspan="4"></td>
						</tr>
						<tr>
							<td width="200px" style="padding-left: 10px;">Terbilang</td>
							<td width="10px"> :</td>
							<td width="50%"><?php echo terbilang($total)." Rupiah";?></td>
							<td colspan="4"></td>
						</tr>
						<tr>
							<td colspan="7" style="text-align: center;padding: 5px;"></td>
						</tr>
					</table>
					<table style="width: 100%;border-collapse: collapse;border-top: 1px;" border="2" rules="none">
						<tr>
							<th></th>
							<th></th>
						</tr>
						<tr>
							<th width="200px" style="text-align: center;" ></th>
							<th width="200px" style="text-align: center;" >Pandanlandung, <?php echo indo_mysql(date('Y-m-d'));?></th>
						</tr>
						<tr >
							<th width="200px" style="text-align: center;" >Pelaksana Kegiatan,</th>
							<th width="200px" style="text-align: center;" >Bendahara Desa</th>
						</tr>
						<tr >
							<th width="200px" height="50px" style="text-align: center;" ></th>
							<th width="200px" height="50px" style="text-align: center;" ></th>
						</tr>
						<tr >
							<th width="200px"style="text-align: center;" ><?php echo $a->nama_us?></th>
							<th width="200px"style="text-align: center;" ><?php foreach($ttd as $s){if($s->level_us=="bd"){echo $s->nama_us;}}?></th>
						</tr>
					</table><br>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-md btn-outline-info waves-effect waves-light pull-right" onclick="javascript:printDiv('print_pembayaran');">
                    <i class="mdi mdi-printer"></i> Cetak
                </button>
            </div>
        </div>
    </div>
</div>