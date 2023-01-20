<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3 class="text-themecolor">
			<?php 
				if($this->uri->segment(1)=="page" && $this->uri->segment(2)==""){
					echo "Dashboard";
				}elseif($this->uri->segment(1)=="c_ba" && $this->uri->segment(2)=="foto"){
					echo "Galeri";
				}elseif($this->uri->segment(1)=="c_ba" && $this->uri->segment(2)=="lihat_foto"){
					echo "Lihat Foto";
				}elseif($this->uri->segment(1)=="c_user" && $this->uri->segment(2)==""){
					echo "User";
				}elseif($this->uri->segment(1)=="c_user" && $this->uri->segment(2)=="myprofile"){
					echo "Profile User";
				}elseif($this->uri->segment(1)=="c_rab" && $this->uri->segment(2)==""||$this->uri->segment(2)=="input_rab"||$this->uri->segment(2)=="rincian_rab"){
					echo "Rencana Anggaran Biaya";
				}elseif($this->uri->segment(1)=="c_rab" && $this->uri->segment(2)=="daftar_rab_kegiatan"||$this->uri->segment(2)=="input_bahan_kegiatan"||$this->uri->segment(2)=="rincian_rab_kegiatan"){
					echo "RAB Kegiatan";
				}elseif($this->uri->segment(1)=="c_rab" && $this->uri->segment(2)=="input_bahan_kegiatan"){
					echo "Uraian";
				}elseif($this->uri->segment(1)=="c_rab" && $this->uri->segment(2)=="rincian"){
					echo "RAB Kegiatan";
				}elseif($this->uri->segment(1)=="c_rab" && $this->uri->segment(2)=="edit_rab"){
					echo "Edit RAB";
				}elseif($this->uri->segment(1)=="c_bahan" && $this->uri->segment(2)==""){
					echo "Bahan";
				}elseif($this->uri->segment(1)=="c_bahan" && $this->uri->segment(2)=="input_bahan"){
					echo "Input Bahan";
				}elseif($this->uri->segment(1)=="c_bahan" && $this->uri->segment(2)=="kel_bahan"){
					echo "Kelompok Bahan";
				}elseif($this->uri->segment(1)=="c_kegiatan" && $this->uri->segment(2)==""){
					echo "Kegiatan";
				}elseif($this->uri->segment(1)=="c_kegiatan" && $this->uri->segment(2)=="input_kg"){
					echo "Input Kegiatan";
				}elseif($this->uri->segment(1)=="c_kegiatan" && $this->uri->segment(2)=="edit_kg"){
					echo "Edit Kegiatan";
				}elseif($this->uri->segment(1)=="c_penawaran" && ($this->uri->segment(2)==""||$this->uri->segment(2)=="input_penawaran"||$this->uri->segment(2)=="edit_penawaran"||$this->uri->segment(2)=="rincian_penawaran")){
					echo "Permintaan Penawaran";
				}elseif($this->uri->segment(1)=="c_penawaran" && ($this->uri->segment(2)=="daftar_undangan"||$this->uri->segment(2)=="input_undangan"||$this->uri->segment(2)=="edit_undangan"||$this->uri->segment(2)=="rincian_undangan")){
					echo "Undangan Penawaran";
				}elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="daftar_ba_penawaran"){
					echo "Berita Acara Negosiasi";
				}elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="input_ba_penawaran"){
					echo "Berita Acara";
				}elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="edit_ba_penawaran"){
					echo "Berita Acara";
				}elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="rincian_ba_penawaran"){
					echo "Berita Acara";
				}elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="daftar_perjanjian"){
					echo "Perjanjian Kerjasama";
				}elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="input_perjanjian"){
					echo "Perjanjian Kerjasama";
				}elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="edit_perjanjian"){
					echo "Perjanjian Kerjasama";
				}elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="rincian_perjanjian"){
					echo "Perjanjian";
				}elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="hasil_penawaran"){
					echo "Hasil Penawaran";
				}elseif($this->uri->segment(1)=="c_pembayaran" && (($this->uri->segment(2)=="")||$this->uri->segment(2)=="tambah_spp"||$this->uri->segment(2)=="rincian_pembayaran"||$this->uri->segment(2)=="edit_pembayaran")){
					echo "Permintaan Pembayaran";
				}elseif($this->uri->segment(1)=="c_pembayaran" && (($this->uri->segment(2)=="daftar_pernyataan")||$this->uri->segment(2)=="tambah_pernyataan"||$this->uri->segment(2)=="rincian_pernyataan"||$this->uri->segment(2)=="edit_pernyataan")){
					echo "Pernyataan Tanggung Jawab";
				}elseif($this->uri->segment(1)=="c_pembayaran" && (($this->uri->segment(2)=="daftar_bukti_spp")||$this->uri->segment(2)=="tambah_bukti"||$this->uri->segment(2)=="rincian_bukti"||$this->uri->segment(2)=="edit_bukti")){
					echo "Bukti Pencairan SPP";
				}elseif($this->uri->segment(1)=="c_kas" && (($this->uri->segment(2)=="")||$this->uri->segment(2)=="input_kas"||$this->uri->segment(2)=="rincian_bukti"||$this->uri->segment(2)=="rincian_kas")){
					echo "Buku Kas Umum";
				}elseif($this->uri->segment(1)=="c_kegiatan" && (($this->uri->segment(2)=="")||$this->uri->segment(2)=="daftar_kas_kg"||$this->uri->segment(2)=="tambah_kas"||$this->uri->segment(2)=="edit_penerimaan_kas"||$this->uri->segment(2)=="rincian_kas")){
					echo "Buku Kas Kegiatan";
				}elseif($this->uri->segment(1)=="c_toko" && $this->uri->segment(2)==""){
					echo "Data Toko";
				}else{
					if($title){
						echo $title;
					}
				}
			?>
		</h3>
	</div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
			<?php if($this->uri->segment(1)=="page" && $this->uri->segment(2)==""){?>
				<li class="breadcrumb-item active">Dashboard</li>
			<?php	}else{?>
				<li class="breadcrumb-item"><a href="<?php echo base_url();?>index.php/page/">Dashboard</a></li>
				<!--posisi sekarang -->	
				<?php if($this->uri->segment(1)=="c_user" && $this->uri->segment(2)==""){?>
					<li class="breadcrumb-item active">User</li>
				<?php }elseif($this->uri->segment(1)=="c_user" && $this->uri->segment(2)=="myprofile"){?>
					<li class="breadcrumb-item active">Profile User</li>
				<?php }elseif($this->uri->segment(1)=="c_rab" && $this->uri->segment(2)==""){?>
					<li class="breadcrumb-item active">Rencana Anggaran Biaya</li>
				<?php }elseif($this->uri->segment(1)=="c_rab" && $this->uri->segment(2)=="input_rab"){?>		
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_rab/">Rencana Anggaran Biaya</a>
					</li>
					<li class="breadcrumb-item active">Tambah</li>
				<?php }elseif($this->uri->segment(1)=="c_rab" && $this->uri->segment(2)=="input_bahan_kegiatan"){?>		
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_rab/daftar_rab_kegiatan">Rencana Anggaran Biaya</a>
					</li>
					<li class="breadcrumb-item active">Tambah</li>
				<?php }elseif($this->uri->segment(1)=="c_rab" && $this->uri->segment(2)=="rincian_rab"){?>		
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_rab/">Rencana Anggaran Biaya</a>
					</li>
					<li class="breadcrumb-item active">Rincian</li>
				<?php }elseif($this->uri->segment(1)=="c_rab" && $this->uri->segment(2)=="daftar_rab_kegiatan"){?>		
					<li class="breadcrumb-item active">Rencana Anggaran Biaya</li>
				<?php }elseif($this->uri->segment(1)=="c_rab" && $this->uri->segment(2)=="rincian"){?>		
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_rab/daftar_rab_kegiatan">Rencana Anggaran Biaya</a>
					</li>
					<li class="breadcrumb-item active">Rincian RAB</li>
				<?php }elseif($this->uri->segment(1)=="c_rab" && $this->uri->segment(2)=="edit_rab"){?>		
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_rab/">Rencana Anggaran Biaya</a>
					</li>
					<li class="breadcrumb-item active">Edit RAB</li>
				<?php }elseif($this->uri->segment(1)=="c_bahan" && $this->uri->segment(2)==""){?>
					<li class="breadcrumb-item active">Bahan</li>
				<?php }elseif($this->uri->segment(1)=="c_bahan" && $this->uri->segment(2)=="input_bahan"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_bahan/">Bahan</a>
					</li>
					<li class="breadcrumb-item active">Tambah Bahan</li>
				<?php }elseif($this->uri->segment(1)=="c_kegiatan" && $this->uri->segment(2)==""){?>
					<li class="breadcrumb-item active">Kegiatan</li>
				<?php }elseif($this->uri->segment(1)=="c_kegiatan" && $this->uri->segment(2)=="input_kg"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_kegiatan/">Kegiatan</a>
					</li>
					<li class="breadcrumb-item active">Tambah Kegiatan</li>
				<?php }elseif($this->uri->segment(1)=="c_kegiatan" && $this->uri->segment(2)=="edit_kg"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_kegiatan/">Kegiatan</a>
					</li>
					<li class="breadcrumb-item active">Edit Kegiatan</li>
				<?php }elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)==""){?>
					<li class="breadcrumb-item active"> Permintaan Penawaran</li>
				<?php }elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="input_penawaran"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_penawaran/">Permintaan Penawaran</a>
					</li>
					<li class="breadcrumb-item active">Penawaran</li>
				<?php }elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="rincian_penawaran"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_penawaran/">Permintaan Penawaran</a>
					</li>
					<li class="breadcrumb-item active">Rincian</li>
				<?php }elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="edit_penawaran"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_penawaran/">Permintaan Penawaran</a>
					</li>
					<li class="breadcrumb-item active">Edit</li>
				<?php }elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="daftar_undangan"){?>
					<li class="breadcrumb-item active"> Undangan Penawaran</li>
				<?php }elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="input_undangan"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_penawaran/">Undangan Penawaran</a>
					</li>
					<li class="breadcrumb-item active">Tambah</li>
				<?php }elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="edit_undangan"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_penawaran/">Undangan Penawaran</a>
					</li>
					<li class="breadcrumb-item active">Edit</li>
				<?php }elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="rincian_undangan"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_penawaran/daftar_undangan">Undangan Penawaran</a>
					</li>
					<li class="breadcrumb-item active">Rincian</li>
				<?php }elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="daftar_perjanjian"){?>
					<li class="breadcrumb-item active">Perjanjian Kerjasama</li>
				<?php }elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="rincian_perjanjian"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_penawaran/daftar_perjanjian/">Perjanjian Kerjasama</a>
					</li>
					<li class="breadcrumb-item active">Rincian</li>
				<?php }elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="input_perjanjian"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_penawaran/daftar_perjanjian/">Perjanjian Kerjasama</a>
					</li>
					<li class="breadcrumb-item active">Tambah</li>
				<?php }elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="edit_perjanjian"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_penawaran/daftar_perjanjian/">Perjanjian Kerjasama</a>
					</li>
					<li class="breadcrumb-item active">Edit</li>
				<?php }elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="daftar_ba_penawaran"){?>
					<li class="breadcrumb-item active">Berita Acara</li>
				<?php }elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="input_ba_penawaran"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_penawaran/daftar_ba_penawaran/">Berita Acara</a>
					</li>
					<li class="breadcrumb-item active">Tambah Berita Acara</li>
				<?php }elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="edit_ba_penawaran"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_penawaran/daftar_ba_penawaran/">Berita Acara</a>
					</li>
					<li class="breadcrumb-item active">Edit Berita Acara</li>
				<?php }elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="rincian_ba_penawaran"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_penawaran/daftar_ba_penawaran/">Berita Acara</a>
					</li>
					<li class="breadcrumb-item active">Penawaran</li>
				<?php }elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="lihat_perjanjian"){?>
					<li class="breadcrumb-item active">Perjanjian Kerjasama</li>
				<?php }elseif($this->uri->segment(1)=="c_penawaran" && $this->uri->segment(2)=="hasil_penawaran"){?>
					<li class="breadcrumb-item active">Hasil Penawaran</li>
				<?php }elseif($this->uri->segment(1)=="c_kas" && $this->uri->segment(2)==""){?>
					<li class="breadcrumb-item active">Anggaran Belanja</li>
				<?php }elseif($this->uri->segment(1)=="c_kas" && $this->uri->segment(2)=="input_anggaran"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_kas/">Anggaran Belanja</a>
					</li>
					<li class="breadcrumb-item active">Input Anggaran</li>
				<?php }elseif($this->uri->segment(1)=="c_pembayaran" && $this->uri->segment(2)==""){?>
					<li class="breadcrumb-item active">Permintaan Pembayaran</li>
				<?php }elseif($this->uri->segment(1)=="c_pembayaran" && $this->uri->segment(2)=="tambah_spp"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_pembayaran/">Permintaan Pembayaran</a>
					</li>
					<li class="breadcrumb-item active">Tambah</li>
				<?php }elseif($this->uri->segment(1)=="c_pembayaran" && $this->uri->segment(2)=="edit_pembayaran"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_pembayaran/">Permintaan Pembayaran</a>
					</li>
					<li class="breadcrumb-item active">Edit</li>
				<?php }elseif($this->uri->segment(1)=="c_pembayaran" && $this->uri->segment(2)=="rincian_pembayaran"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_pembayaran/">Permintaan Pembayaran</a>
					</li>
					<li class="breadcrumb-item active">Rincian</li>
				<?php }elseif($this->uri->segment(1)=="c_pembayaran" && $this->uri->segment(2)=="daftar_pernyataan"){?>
					<li class="breadcrumb-item active">Daftar</li>
				<?php }elseif($this->uri->segment(1)=="c_pembayaran" && $this->uri->segment(2)=="tambah_pernyataan"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_pembayaran/daftar_pernyataan">Pernyataan Tanggung Jawab</a>
					</li>
					<li class="breadcrumb-item active">Tambah</li>
				<?php }elseif($this->uri->segment(1)=="c_pembayaran" && $this->uri->segment(2)=="edit_pernyataan"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_pembayaran/daftar_pernyataan">Pernyataan Tanggung Jawab</a>
					</li>
					<li class="breadcrumb-item active">Edit</li>
				<?php }elseif($this->uri->segment(1)=="c_pembayaran" && $this->uri->segment(2)=="rincian_pernyataan"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_pembayaran/daftar_pernyataan">Pernyataan Tanggung Jawab</a>
					</li>
					<li class="breadcrumb-item active">Rincian</li>
				<?php }elseif($this->uri->segment(1)=="c_pembayaran" && $this->uri->segment(2)=="daftar_bukti_spp"){?>
					<li class="breadcrumb-item active">Daftar</li>
				<?php }elseif($this->uri->segment(1)=="c_pembayaran" && $this->uri->segment(2)=="tambah_bukti"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_pembayaran/daftar_bukti_spp">Bukti Pencairan SPP</a>
					</li>
					<li class="breadcrumb-item active">Tambah</li>
				<?php }elseif($this->uri->segment(1)=="c_pembayaran" && $this->uri->segment(2)=="edit_bukti"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_pembayaran/daftar_bukti_spp">Bukti Pencairan SPP</a>
					</li>
					<li class="breadcrumb-item active">Edit</li>
				<?php }elseif($this->uri->segment(1)=="c_pembayaran" && $this->uri->segment(2)=="rincian_bukti"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_pembayaran/daftar_bukti_spp">Bukti Pencairan SPP</a>
					</li>
					<li class="breadcrumb-item active">Rincian</li>
				<?php }elseif($this->uri->segment(1)=="c_kegiatan" && $this->uri->segment(2)=="daftar_kas_kg"){?>
					<li class="breadcrumb-item active">Daftar Kas</li>
				<?php }elseif($this->uri->segment(1)=="c_kegiatan" && $this->uri->segment(2)=="tambah_kas"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_kegiatan/daftar_kas_kg">Daftar Kas</a>
					</li>
					<li class="breadcrumb-item active">Tambah</li>
				<?php }elseif($this->uri->segment(1)=="c_kegiatan" && $this->uri->segment(2)=="edit_penerimaan_kas"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_kegiatan/daftar_kas_kg">Daftar Kas</a>
					</li>
					<li class="breadcrumb-item active">Edit</li>
				<?php }elseif($this->uri->segment(1)=="c_kegiatan" && $this->uri->segment(2)=="rincian_kas"){?>
					<li class="breadcrumb-item">
						<a href="<?php echo base_url();?>index.php/c_kegiatan/daftar_kas_kg">Daftar Kas</a>
					</li>
					<li class="breadcrumb-item active">Rincian</li>
				<?php }elseif($this->uri->segment(1)=="c_toko" && $this->uri->segment(2)==""){?>
					<li class="breadcrumb-item active">Daftar</li>
				<?php }?>
			<?php }?>
		</ol>
	</div>
</div>