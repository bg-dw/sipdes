<?php
class M_kegiatan extends CI_Model {
	public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function input_data($data,$table){
        $this->db->insert($table,$data);
    }
    public function edit_data($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function get_data(){
        $hasil=$this->db->query("SELECT * FROM tbl_kegiatan");
        return $hasil->result();
    }
    public function get_all_data($table){
        $hasil=$this->db->query("SELECT * FROM $table");
        return $hasil->result();
    }
    public function count_kg(){
        $hasil=$this->db->query("SELECT id_kg FROM tbl_kegiatan");
        return $hasil->result();
    }
    public function show_rab($th){
        $hasil=$this->db->query("SELECT a.id_rab,a.kd_rab,a.status,a.lokasi_rab,b.id_kg,b.nama_kg,b.keluaran_kg FROM tbl_rab a join tbl_kegiatan b ON a.id_kg=b.id_kg WHERE tahun_anggaran='$th' GROUP BY kd_rab");
        return $hasil->result();
    }

    public function cek_kd($kd){
        $hasil=$this->db->query("SELECT kd_kg FROM tbl_kegiatan WHERE kd_kg='$kd'");
        return $hasil->result();
    }
    function delete_data($id){
        $hasil=$this->db->query("DELETE FROM tbl_kegiatan WHERE id_kg='$id'");
        return $hasil;
    }
    function delete_kas($id){
        $hasil=$this->db->query("DELETE FROM tbl_kas_kegiatan WHERE id_kas_kg='$id'");
        return $hasil;
    }
    public function get_transaksi_terakhir($th){
        $hasil=$this->db->query("SELECT a.saldo_kas_kg from tbl_kas_kegiatan a join tbl_detail_kegiatan_rab b join tbl_rab c ON a.id_detail_kg=b.id_detail_kg and b.id_rab=c.id_rab where c.periode_rab='$th' ORDER BY id_kas_kg DESC limit 1");
        return $hasil->result();
    }
    function get_rincian_bukti($id_kg){
        $hasil=$this->db->query("SELECT a.id_kg,a.kd_kg,a.keluaran_kg,b.nomor_bp,b.tgl_bp,b.tipe_pem,c.nomor_pembayaran,c.tgl_pembayaran,d.harga_total_kwt,e.id_kel_bahan,e.kel_bahan,f.jumlah_bahan_rab,g.id_bahan,g.nama_bahan,g.harga_bahan from tbl_kegiatan a join tbl_bp_pembayaran b join tbl_permintaan_pembayaran c join tbl_kwitansi d join tbl_kel_bahan e join tbl_rab f join tbl_bahan g ON b.id_kg=a.id_kg and a.id_kg=f.id_kg and c.id_kg=f.id_kg and f.id_bahan=g.id_bahan and d.id_kg=f.id_kg and d.id_bahan=g.id_bahan and g.id_kel_bahan=e.id_kel_bahan WHERE f.id_kg='$id_kg'");
        return $hasil->result();
    }
    function get_data_kas($id_kas,$table){
        $hasil=$this->db->query("SELECT a.*,b.id_rab,c.lokasi_kg,d.id_kg,d.nama_kg from tbl_kas_kegiatan a join tbl_rab b join tbl_detail_kegiatan_rab c join tbl_kegiatan d ON a.id_detail_kg=c.id_detail_kg and b.id_rab=c.id_rab and d.id_kg=c.id_kg WHERE a.id_kas_kg='$id_kas'");
        return $hasil->result();
    }

    function get_rincian_kas($id_kg){
        $hasil=$this->db->query("SELECT a.*,b.nama_kg,b.bidang_kg from tbl_kas_kegiatan a join tbl_kegiatan b join tbl_detail_kegiatan_rab c ON a.id_detail_kg=c.id_detail_kg and b.id_kg=c.id_kg WHERE a.id_detail_kg='$id_kg'");
        return $hasil->result();
    }
    function get_pk($th){
        $hasil=$this->db->query("SELECT nama_us,level_us FROM tbl_user where level_us='pk' and th_aktif='$th'");
        return $hasil->result();
    }

    function get_daftar_kas($th){
        $hasil=$this->db->query("SELECT a.* from tbl_kas_kegiatan a join tbl_detail_kegiatan_rab b join tbl_rab c on a.id_detail_kg=b.id_detail_kg and b.id_rab=c.id_rab WHERE c.periode_rab='$th'");
        return $hasil->result();
    }

    public function daftar_kegiatan_rab($th){
        $hasil=$this->db->query("SELECT a.*,b.*,c.nama_kg FROM tbl_rab a join tbl_detail_kegiatan_rab b join tbl_kegiatan c on a.id_rab=b.id_rab and b.id_kg=c.id_kg where a.periode_rab='$th'");
        return $hasil->result();
    }
    public function get_item($id_rab,$id_kg,$lokasi){
        $hasil=$this->db->query("SELECT a.id_bahan,a.nama_bahan,a.satuan_bahan,b.jumlah_bahan_kg,b.harga_bahan_kg,b.harga_bahan_perjanjian from tbl_bahan a join tbl_detail_rab b join tbl_kegiatan c join tbl_detail_kegiatan_rab d join tbl_rab e ON a.id_bahan = b.id_bahan and c.id_kg=d.id_kg and b.id_detail_kg=d.id_detail_kg and d.id_rab=e.id_rab where d.id_rab='$id_rab' and d.id_kg='$id_kg' and d.lokasi_kg='$lokasi'");
        return $hasil->result();
    }
    public function get_item_nominal($id_rab,$id_kg,$lokasi,$id_bahan){
        $hasil=$this->db->query("SELECT a.id_bahan,a.nama_bahan,a.satuan_bahan,b.jumlah_bahan_kg,b.harga_bahan_kg,b.harga_bahan_perjanjian,b.nomor_kwt from tbl_bahan a join tbl_detail_rab b join tbl_kegiatan c join tbl_detail_kegiatan_rab d join tbl_rab e ON a.id_bahan = b.id_bahan and c.id_kg=d.id_kg and b.id_detail_kg=d.id_detail_kg and d.id_rab=e.id_rab where d.id_rab='$id_rab' and d.id_kg='$id_kg' and d.lokasi_kg='$lokasi' and b.id_bahan='$id_bahan'");
        return $hasil->result();
    }

//Laporan Kegiatan
    function get_daftar_laporan($th){
        $hasil=$this->db->query("SELECT a.id_rab,b.id_kg,b.nama_kg,c.lokasi_kg,c.status_kg,d.id_pn from tbl_rab a join tbl_kegiatan b join tbl_detail_kegiatan_rab c join tbl_permintaan_penawaran d on a.id_rab=c.id_rab and b.id_kg=c.id_kg and c.id_detail_kg=d.id_detail_kg WHERE a.periode_rab='$th'");
        return $hasil->result();
    }

    function get_rincian_kegiatan($id_rab,$id_kg,$lokasi){
        $hasil=$this->db->query("SELECT a.nama_kg,b.id_detail_kg,b.lokasi_kg,c.nama_bahan,d.jumlah_bahan_kg,d.harga_bahan_perjanjian from tbl_kegiatan a join tbl_detail_kegiatan_rab b join tbl_bahan c join tbl_detail_rab d join tbl_rab e ON a.id_kg=b.id_kg and c.id_bahan=d.id_bahan and d.id_detail_kg=b.id_detail_kg and e.id_rab=b.id_rab WHERE b.id_rab='$id_rab' and b.id_kg='$id_kg' and b.lokasi_kg='$lokasi'");
        return $hasil->result();
    }
    function get_edit_kegiatan($id_rab,$id_kg,$lokasi){
        $hasil=$this->db->query("SELECT a.nama_kg,b.id_detail_kg,b.lokasi_kg,c.nama_bahan,d.jumlah_bahan_kg,d.harga_bahan_perjanjian,f.* from tbl_kegiatan a join tbl_detail_kegiatan_rab b join tbl_bahan c join tbl_detail_rab d join tbl_rab e join tbl_laporan_kg f ON a.id_kg=b.id_kg and c.id_bahan=d.id_bahan and d.id_detail_kg=b.id_detail_kg and e.id_rab=b.id_rab and f.id_detail_kg=b.id_detail_kg WHERE b.id_rab='$id_rab' and b.id_kg='$id_kg' and b.lokasi_kg='$lokasi'");
        return $hasil->result();
    }
    function get_rincian_laporan($id_rab,$id_kg,$lokasi){
        $hasil=$this->db->query("SELECT a.nama_kg,b.id_detail_kg,b.lokasi_kg,c.nama_bahan,c.satuan_bahan,d.jumlah_bahan_kg,d.harga_bahan_perjanjian,f.* from tbl_kegiatan a join tbl_detail_kegiatan_rab b join tbl_bahan c join tbl_detail_rab d join tbl_rab e join tbl_laporan_kg f ON a.id_kg=b.id_kg and c.id_bahan=d.id_bahan and d.id_detail_kg=b.id_detail_kg and e.id_rab=b.id_rab and f.id_detail_kg=b.id_detail_kg WHERE b.id_rab='$id_rab' and b.id_kg='$id_kg' and b.lokasi_kg='$lokasi'");
        return $hasil->result();
    }
}