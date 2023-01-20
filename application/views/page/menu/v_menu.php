<nav class="sidebar-nav no-print">
  <ul id="sidebarnav">
    <li class="nav-small-cap">PERSONAL</li>
    <li> <a class="has-arrow waves-effect waves-dark" href="<?php echo base_url();?>index.php/page/" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
    </li>
    <?php if($this->session->userdata('level')=="bd"||$this->session->userdata('level')=="kd"){ ?>
      <li> <a class="has-arrow waves-effect waves-dark" href="<?php echo base_url();?>index.php/c_kas/" aria-expanded="false"><i class="mdi mdi-book"></i><span class="hide-menu">Buku Kas Umum</span></a>
      </li>
    <?php }?>
    <?php if($this->session->userdata('level')=="admin"){ ?>
      <li class="one-column"> <a class="has-arrow waves-effect waves-dark" href="<?php echo base_url();?>index.php/c_user/" aria-expanded="false"><i class="mdi mdi-account-box"></i><span class="hide-menu">User</span></a>
      </li>
      <li class="one-column"> <a class="has-arrow waves-effect waves-dark" href="<?php echo base_url();?>index.php/c_kegiatan/set_periode" aria-expanded="false"><i class="mdi mdi-av-timer"></i><span class="hide-menu">Periode</span></a>
      </li>
    <?php }?>
    <?php if($this->session->userdata('level')=="pk"||$this->session->userdata('level')=="tpk_kt"||$this->session->userdata('level')=="tpk_sk"||$this->session->userdata('level')=="tpk_bd"||$this->session->userdata('level')=="bd"||$this->session->userdata('level')=="sd"){ ?>
      <li class="one-column"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-barcode-scan"></i><span class="hide-menu">RAB</span></a>
        <ul aria-expanded="false" class="collapse">
          <li><a href="<?php echo base_url();?>index.php/c_rab/">Daftar RAB</a></li>
          <li><a href="<?php echo base_url();?>index.php/c_rab/daftar_rab_kegiatan/">RAB Kegiatan</a></li>
        </ul>
      </li>
    <?php }?>
    <?php if($this->session->userdata('level')=="tpk_kt"||$this->session->userdata('level')=="tpk_sk"||$this->session->userdata('level')=="pk"||$this->session->userdata('level')=="sd"||$this->session->userdata('level')=="kd"){ ?>
      <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-barcode"></i><span class="hide-menu">Penawaran</span></a>
        <ul aria-expanded="false" class="collapse">
        <?php if($this->session->userdata('level')=="tpk_kt"||$this->session->userdata('level')=="tpk_sk"||$this->session->userdata('level')=="pk"){ ?>
          <li> <a class="has-arrow" href="#" aria-expanded="false">Proses Penawaran</a>
            <ul aria-expanded="false" class="collapse">
              <li><a href="<?php echo base_url();?>index.php/c_penawaran/">Daftar Penawaran</a></li>
              <li><a href="<?php echo base_url();?>index.php/c_penawaran/daftar_ba_penawaran">B.A. Negosiasi</a></li>
            </ul>
          </li>
          <?php }?>
          <?php if($this->session->userdata('level')=="tpk_kt"||$this->session->userdata('level')=="kd"||$this->session->userdata('level')=="sd"||$this->session->userdata('level')=="pk"){ ?>
            <li> <a class="has-arrow" href="#" aria-expanded="false">Hasil Penawaran</a>
              <ul aria-expanded="false" class="collapse">
                <li>
                  <a href="<?php echo base_url();?>index.php/c_penawaran/daftar_perjanjian">Perjanjian Kerjasama</a>
                </li>
              </ul>
            </li>
          <?php }?>
        </ul>
      </li>
    <?php }?>
    <?php if($this->session->userdata('level')=="kd"||$this->session->userdata('level')=="pk"||$this->session->userdata('level')=="sd"||$this->session->userdata('level')=="bd"){ ?>
      <li class="one-column"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-barcode-scan"></i><span class="hide-menu">Pembayaran</span></a>
        <ul aria-expanded="false" class="collapse">
          <li><a href="<?php echo base_url();?>index.php/c_pembayaran/">Daftar SPP</a></li>
          <?php if($this->session->userdata('level')=="pk"){ ?>
            <li><a href="<?php echo base_url();?>index.php/c_pembayaran/daftar_pernyataan/">Surat Pernyataan</a></li>
            <li><a href="<?php echo base_url();?>index.php/c_pembayaran/daftar_bukti_spp/">Bukti Pencairan SPP</a></li>
          <?php }?>
        </ul>
      </li>
    <?php }?>
    <?php if($this->session->userdata('level')=="tpk_kt"||$this->session->userdata('level')=="tpk_sk"||$this->session->userdata('level')=="pk"){ ?>
      <li> <a class="has-arrow waves-effect waves-dark" href="<?php echo base_url();?>index.php/c_kegiatan/daftar_laporan_kg" aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu">Laporan Kegiatan</span></a>
      </li>
    <?php }?>
    <?php if($this->session->userdata('level')=="tpk_kt"||$this->session->userdata('level')=="tpk_bd"||$this->session->userdata('level')=="tpk_kt"){ ?>
      <li> <a class="has-arrow waves-effect waves-dark" href="<?php echo base_url();?>index.php/c_kegiatan/daftar_kas_kg" aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu">Buku Kas Kegiatan</span></a>
      </li>
    <?php }?>

    <?php if($this->session->userdata('level')=="pk"){ ?>
      <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Data Bahan</span></a>
        <ul aria-expanded="false" class="collapse">
          <li><a href="<?php echo base_url();?>index.php/c_bahan/">Daftar Bahan</a></li>
          <li><a href="<?php echo base_url();?>index.php/c_bahan/kel_bahan/">Daftar Kelompok Bahan</a></li>
        </ul>
      </li>
      <li> <a class="has-arrow waves-effect waves-dark" href="<?php echo base_url();?>index.php/c_kegiatan/" aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu">Data Kegiatan</span></a>
      </li>
      <li> <a class="has-arrow waves-effect waves-dark" href="<?php echo base_url();?>index.php/c_toko/" aria-expanded="false"><i class="mdi mdi-store"></i><span class="hide-menu">Data Toko</span></a>
      </li>
    <?php }?>
  </ul>
</nav>