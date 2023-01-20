<?php
class M_kas extends CI_Model {
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
    public function get_data_kas(){
        $hasil=$this->db->query("SELECT * FROM tbl_kas_umum");
        return $hasil->result();
    }
    public function get_data(){
        $hasil=$this->db->query("SELECT * FROM tbl_anggaran");
        return $hasil->result();
    }
    public function get_kas(){
        $hasil=$this->db->query("SELECT * FROM tbl_kas_umum");
        return $hasil->result();
    }
    public function get_kas_by($date1,$date2){
        $hasil=$this->db->query("SELECT * FROM tbl_kas_umum WHERE tgl_kas between '$date1' AND '$date2'");
        return $hasil->result();
    }
    public function get_ttd($th){
        $hasil=$this->db->query("SELECT nama_us,level_us FROM tbl_user where level_us='kd' or level_us='bd' and th_aktif='$th'");
        return $hasil->result();
    }
    public function show_rab(){
        $hasil=$this->db->query("SELECT a.id_rab,a.kd_rab,a.lokasi_rab,b.id_kg,b.nama_kg,b.keluaran_kg FROM tbl_rab a join tbl_kegiatan b ON a.id_kg=b.id_kg GROUP BY kd_rab");
        return $hasil;
    }
    function get_rincian_bukti($id_kg){
        $hasil=$this->db->query("SELECT a.id_kg,a.kd_kg,a.keluaran_kg,b.nomor_bp,b.tgl_bp,b.tipe_pem,c.nomor_pembayaran,c.tgl_pembayaran,d.harga_total_kwt,e.id_kel_bahan,e.kel_bahan from tbl_kegiatan a join tbl_bp_pembayaran b join tbl_permintaan_pembayaran c join tbl_kwitansi d join tbl_kel_bahan e join tbl_rab f join tbl_bahan g ON b.id_kg=a.id_kg and a.id_kg=f.id_kg and c.id_kg=f.id_kg and f.id_bahan=g.id_bahan and d.id_kg=f.id_kg and d.id_bahan=g.id_bahan and g.id_kel_bahan=e.id_kel_bahan WHERE f.id_kg='$id_kg'");
        return $hasil->result();
    }
    function get_edit_kas($id){
        $hasil=$this->db->query("SELECT * FROM tbl_kas_umum where id_kas='$id'");
        return $hasil->result();
    }
    public function get_transaksi_terakhir(){
        $hasil=$this->db->query("SELECT pengeluaran_kumulatif,saldo_kas FROM tbl_kas_umum ORDER BY id_kas DESC LIMIT 1");
        return $hasil->result();
    }
    function hapus_data($id){
        $hasil=$this->db->query("DELETE FROM tbl_anggaran WHERE id_anggaran='$id'");
        return $hasil;
    }
}