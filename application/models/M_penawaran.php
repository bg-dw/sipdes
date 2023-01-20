<?php
class M_penawaran extends CI_Model {
	public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function input_data($data,$table){
        $this->db->insert($table,$data);
    }
    public function edit_data($where,$table){
        return $this->db->get_where($table,$where)->result();
    }
    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function delete_data($id){
        $hasil=$this->db->query("DELETE FROM tbl_kegiatan WHERE id_kg='$id'");
        return $hasil;
    }
    public function get_data($table){
        return $this->db->get($table)->result();
    }

    function count_permintaan(){
        $hasil=$this->db->query("SELECT id_pn FROM tbl_permintaan_penawaran");
        return $hasil->result();
    }
    public function daftar_kegiatan_th($th){
        $hasil=$this->db->query("SELECT a.*,b.*,c.nama_kg FROM tbl_rab a join tbl_detail_kegiatan_rab b join tbl_kegiatan c on a.id_rab=b.id_rab and b.id_kg=c.id_kg where b.status_kg='1' and a.periode_rab='$th'");
        return $hasil->result();
    }
    public function get_data_kg($id_rab,$id_kg,$lokasi){
        $hasil=$this->db->query("SELECT a.id_rab,a.periode_rab,b.id_kg,b.bidang_kg,b.nama_kg,c.id_detail_kg,c.waktu_pelaksanaan,c.keluaran_kg,d.id_bahan,d.nama_bahan,d.satuan_bahan,e.jumlah_bahan_kg,e.harga_bahan_kg,f.id_kel_bahan,f.kel_bahan from tbl_rab a join tbl_kegiatan b join tbl_detail_kegiatan_rab c join tbl_bahan d join tbl_detail_rab e join tbl_kel_bahan f on a.id_rab=c.id_rab and b.id_kg=c.id_kg and c.id_detail_kg=e.id_detail_kg and d.id_bahan=e.id_bahan and f.id_kel_bahan=d.id_kel_bahan where c.id_rab='$id_rab' and c.id_kg='$id_kg' and c.lokasi_kg='$lokasi'");
        return $hasil->result();
    }

    public function daftar_penawaran($th){
        $sql = $this->db->query("SELECT a.id_rab,b.id_kg,b.nama_kg,c.lokasi_kg,c.status_kg,d.id_pn from tbl_rab a join tbl_kegiatan b join tbl_detail_kegiatan_rab c join tbl_permintaan_penawaran d on a.id_rab=c.id_rab and b.id_kg=c.id_kg and c.id_detail_kg=d.id_detail_kg WHERE a.periode_rab='$th'");
        return $sql->result();
    }
    public function get_edit_penawaran($id_pn,$id_kg,$lokasi){
        $hasil=$this->db->query("SELECT a.id_rab,a.periode_rab,b.id_kg,b.bidang_kg,b.nama_kg,c.waktu_pelaksanaan,c.keluaran_kg,c.status_kg,c.lokasi_kg,d.id_bahan,d.nama_bahan,d.satuan_bahan,e.jumlah_bahan_kg,e.harga_bahan_kg,f.id_kel_bahan,f.kel_bahan,g.*,h.* from tbl_rab a join tbl_kegiatan b join tbl_detail_kegiatan_rab c join tbl_bahan d join tbl_detail_rab e join tbl_kel_bahan f join tbl_permintaan_penawaran g join tbl_toko h on a.id_rab=c.id_rab and b.id_kg=c.id_kg and c.id_detail_kg=e.id_detail_kg and d.id_bahan=e.id_bahan and f.id_kel_bahan=d.id_kel_bahan and h.id_toko=g.id_toko where g.id_pn='$id_pn' and c.id_kg='$id_kg' and c.lokasi_kg='$lokasi'");
        return $hasil->result();
    }

    function count_ba($id){
        $hasil=$this->db->query("SELECT COUNT(DISTINCT a.nomor_ba) as nomor FROM tbl_perjanjian a join tbl_detail_kegiatan_rab b WHERE b.id_rab='$id' and nomor_ba!=''");
        return $hasil->result();
    }

//berita acara
    public function get_tambah_ba_pen($id_rab,$id_kg,$lokasi){
        $hasil=$this->db->query("SELECT b.id_kg,b.nama_kg,c.id_bahan,c.nama_bahan,c.satuan_bahan,f.jumlah_bahan_kg,f.harga_bahan_kg,g.nama_toko,h.id_detail_kg,h.lokasi_kg FROM tbl_rab a join tbl_kegiatan b join tbl_bahan c join tbl_permintaan_penawaran d join tbl_detail_rab f join tbl_toko g join tbl_detail_kegiatan_rab h ON a.id_rab=h.id_rab and f.id_detail_kg=h.id_detail_kg and f.id_bahan=c.id_bahan and g.id_toko=d.id_toko and b.id_kg=h.id_kg and d.id_detail_kg=h.id_detail_kg where h.id_rab='$id_rab' and h.id_kg='$id_kg' and h.lokasi_kg='$lokasi'");
        return $hasil->result();
    }
    public function get_tpk($th){
        $hasil=$this->db->query("SELECT nama_us,level_us FROM tbl_user where th_aktif='$th'");
        return $hasil->result();
    }

    public function get_isi_ba($id_rab,$id_kg,$lokasi){
        $hasil=$this->db->query("SELECT a.nomor_ba,a.tgl_ba,a.jam_ba,a.tempat_ba,a.dihadiri_oleh,c.id_bahan,c.nama_bahan,c.satuan_bahan,e.nama_kg,f.jumlah_bahan_kg,f.harga_bahan_kg,f.harga_bahan_perjanjian,i.nama_toko,i.pemilik_toko from tbl_perjanjian a join tbl_rab b join tbl_bahan c join tbl_permintaan_penawaran d join tbl_kegiatan e join tbl_detail_rab f join tbl_detail_kegiatan_rab g join tbl_toko i ON a.id_detail_kg=g.id_detail_kg and g.id_rab=b.id_rab and f.id_bahan=c.id_bahan and d.id_toko=i.id_toko and g.id_kg=e.id_kg and d.id_detail_kg=g.id_detail_kg and g.id_rab=b.id_rab and f.id_detail_kg=g.id_detail_kg where g.id_rab='$id_rab' and g.id_kg='$id_kg' and g.lokasi_kg='$lokasi'");
        return $hasil->result();
    }
    public function get_edit_ba($id_rab,$id_kg,$lokasi){
        $hasil=$this->db->query("SELECT a.nama_kg,b.id_pj,b.nomor_ba,b.tgl_ba,b.jam_ba,b.tempat_ba,b.dihadiri_oleh,c.nama_toko,d.id_bahan,d.nama_bahan,d.satuan_bahan,e.id_detail_kg,e.jumlah_bahan_kg,e.harga_bahan_kg,e.harga_bahan_perjanjian,g.nominal_kegiatan_rab from tbl_kegiatan a join tbl_perjanjian b join tbl_toko c join tbl_bahan d join tbl_detail_rab e join tbl_detail_kegiatan_rab g join tbl_permintaan_penawaran h join tbl_rab i ON a.id_kg=g.id_kg and b.id_detail_kg=g.id_detail_kg and c.id_toko=h.id_toko and d.id_bahan=e.id_bahan and e.id_detail_kg=g.id_detail_kg and h.id_detail_kg=g.id_detail_kg and i.id_rab=g.id_rab where g.id_rab='$id_rab' and g.id_kg='$id_kg' and g.lokasi_kg='$lokasi'");
        return $hasil->result();
    }

//perjanjian
    public function get_daftar_perjanjian($th){
        $hasil=$this->db->query("SELECT a.id_rab,b.id_kg,b.nama_kg,c.lokasi_kg,c.status_kg,d.id_pn from tbl_rab a join tbl_kegiatan b join tbl_detail_kegiatan_rab c join tbl_permintaan_penawaran d on a.id_rab=c.id_rab and b.id_kg=c.id_kg and c.id_detail_kg=d.id_detail_kg WHERE a.periode_rab='$th'");
        return $hasil->result();
    }
    function count_pj($id){
        $hasil=$this->db->query("SELECT COUNT(DISTINCT a.nomor_pj) as nomor FROM tbl_perjanjian a join tbl_detail_kegiatan_rab b WHERE b.id_rab='$id' and nomor_pj!=''");
        return $hasil->result();
    }

    public function get_perjanjian($id_rab,$id_kg,$lokasi){
        $hasil=$this->db->query("SELECT a.id_pj,c.id_bahan,c.nama_bahan,c.satuan_bahan,e.nama_kg,f.jumlah_bahan_kg,f.harga_bahan_kg,f.harga_bahan_perjanjian,g.id_detail_kg,i.nama_toko,i.pemilik_toko,i.alamat_toko from tbl_perjanjian a join tbl_rab b join tbl_bahan c join tbl_permintaan_penawaran d join tbl_kegiatan e join tbl_detail_rab f join tbl_detail_kegiatan_rab g join tbl_toko i ON a.id_detail_kg=g.id_detail_kg and b.id_rab=g.id_rab and f.id_bahan=c.id_bahan and d.id_toko=i.id_toko and g.id_kg=e.id_kg and d.id_detail_kg=g.id_detail_kg and f.id_detail_kg=g.id_detail_kg where g.id_rab='$id_rab' and g.id_kg='$id_kg' and g.lokasi_kg='$lokasi'");
        return $hasil->result();
    }
    public function get_edit_perjanjian($id_rab,$id_kg,$lokasi){
        $hasil=$this->db->query("SELECT a.id_pj,a.nomor_pj,a.tgl_mulai,a.tgl_akhir,a.sanksi_pj,a.ketentuan_pj,e.nama_kg,f.jumlah_bahan_kg,f.harga_bahan_kg,f.harga_bahan_perjanjian,g.id_detail_kg,i.nama_toko,i.pemilik_toko,i.alamat_toko from tbl_perjanjian a join tbl_rab b join tbl_bahan c join tbl_permintaan_penawaran d join tbl_kegiatan e join tbl_detail_rab f join tbl_detail_kegiatan_rab g join tbl_toko i ON g.id_rab=b.id_rab and f.id_bahan=c.id_bahan and d.id_toko=i.id_toko and g.id_kg=e.id_kg and d.id_detail_kg=g.id_detail_kg and g.id_rab=b.id_rab and f.id_detail_kg=g.id_detail_kg where g.id_rab='$id_rab' and g.id_kg='$id_kg' and g.lokasi_kg='$lokasi'");
        return $hasil->result();
    }
    public function get_rincian_perjanjian($id_rab,$id_kg,$lokasi){
        $hasil=$this->db->query("SELECT a.id_pj,a.nomor_ba,a.tgl_ba,a.nomor_pj,a.tgl_mulai,a.tgl_akhir,a.sanksi_pj,a.ketentuan_pj,e.nama_kg,f.jumlah_bahan_kg,f.harga_bahan_kg,f.harga_bahan_perjanjian,g.id_detail_kg,g.lokasi_kg,i.nama_toko,i.pemilik_toko,i.alamat_toko from tbl_perjanjian a join tbl_rab b join tbl_bahan c join tbl_permintaan_penawaran d join tbl_kegiatan e join tbl_detail_rab f join tbl_detail_kegiatan_rab g join tbl_toko i ON g.id_rab=b.id_rab and f.id_bahan=c.id_bahan and d.id_toko=i.id_toko and g.id_kg=e.id_kg and d.id_detail_kg=g.id_detail_kg and g.id_rab=b.id_rab and f.id_detail_kg=g.id_detail_kg where g.id_rab='$id_rab' and g.id_kg='$id_kg' and g.lokasi_kg='$lokasi'");
        return $hasil->result();
    }

    // public function get_kegiatan_and($id){
    //     $hasil=$this->db->query("SELECT a.nama_kg,b.nomor_penawaran FROM tbl_kegiatan a join tbl_permintaan_penawaran b ON a.id_kg=b.id_kg where b.id_kg='$id'");
    //     return $hasil->result();
    // }
    // public function get_balasan_rab($id){
    //     $hasil=$this->db->query("SELECT a.id_bahan,a.harga_satuan,b.jumlah_bahan_rab FROM tbl_balasan_penawaran a join tbl_rab b ON a.id_kg=b.id_kg and a.id_bahan=b.id_bahan where a.id_kg='$id'");
    //     return $hasil->result();
    // }
    // public function get_bahan($id){
    //     $hasil=$this->db->query("SELECT a.id_bahan,a.nama_bahan,a.harga_bahan,b.harga_satuan FROM tbl_bahan a join tbl_balasan_penawaran b ON a.id_bahan=b.id_bahan where b.id_kg='$id'");
    //     return $hasil->result();
    // }

    // function count_undangan(){
    //     $hasil=$this->db->query("SELECT id_undangan FROM tbl_undangan_penawaran")->result();
    //     return $hasil;
    // }
    // function count_balasan(){
    //     $hasil=$this->db->query("SELECT id_balasan FROM tbl_balasan_penawaran GROUP BY id_kg")->result();
    //     return $hasil;
    // }
    // public function show_undangan($th){
    //     $hasil=$this->db->query("SELECT a.id_kg,a.nama_kg,a.keluaran_kg,b.batas_tanggal,c.kd_rab,c.status,d.id_undangan FROM tbl_kegiatan a join tbl_permintaan_penawaran b join tbl_rab c join tbl_undangan_penawaran d ON a.id_kg=b.id_kg and b.id_kg=c.id_kg and b.id_penawaran=d.id_penawaran WHERE c.status='4' and tahun_anggaran='$th' GROUP BY kd_rab");
    //     return $hasil->result();
    // }
    // public function show_hasil($th){
    //     $hasil=$this->db->query("SELECT a.id_rab,a.kd_rab,a.status,a.lokasi_rab,b.id_kg,b.nama_kg,b.keluaran_kg FROM tbl_rab a join tbl_kegiatan b ON a.id_kg=b.id_kg WHERE tahun_anggaran='$th' and status>=6 GROUP BY kd_rab");
    //     return $hasil->result();
    // }
}