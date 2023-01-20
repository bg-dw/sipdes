<?php
class M_rab extends CI_Model {
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
    function list_rab(){
        $hasil=$this->db->query("SELECT * FROM tbl_rab");
        return $hasil->result();
    }
    function list_rab_th($th){
        $hasil=$this->db->query("SELECT * FROM tbl_rab WHERE periode_rab='$th'");
        return $hasil->result();
    }
    // function show_rab($th){
    //     $hasil=$this->db->query("SELECT a.id_rab,a.status_rab,b.id_kg,b.nama_kg,c.keluaran_kg,c.lokasi_kg FROM tbl_rab a join tbl_kegiatan b join tbl_detail_pelaksanaan c ON a.id_rab=c.id_rab and b.id_kg=c.id_kg WHERE a.periode_rab='$th' GROUP BY b.nama_kg,c.lokasi_kg");
    //     return $hasil->result();
    // }
    function get_edit($id_rab){
        $hasil=$this->db->query("SELECT * FROM tbl_rab where id_rab='$id_rab'");
        return $hasil->result();
    }
    function get_rab(){
        $hasil=$this->db->query("SELECT id_rab,periode_rab FROM tbl_rab");
        return $hasil->result();
    }
    function get_satuan_bahan($id){
        $hasil=$this->db->query("SELECT nama_bahan,satuan_bahan,harga_bahan FROM tbl_bahan WHERE id_bahan='$id'");
        return $hasil->result();
    }
    public function daftar_kegiatan($id){
        $hasil=$this->db->query("SELECT a.*,b.*,c.nama_kg FROM tbl_rab a join tbl_detail_kegiatan_rab b join tbl_kegiatan c on a.id_rab=b.id_rab and b.id_kg=c.id_kg where a.id_rab='$id'");
        return $hasil->result();
    }
    public function daftar_kegiatan_th($th){
        $hasil=$this->db->query("SELECT a.*,b.*,c.nama_kg FROM tbl_rab a join tbl_detail_kegiatan_rab b join tbl_kegiatan c on a.id_rab=b.id_rab and b.id_kg=c.id_kg where a.periode_rab='$th'");
        return $hasil->result();
    }
    public function get_data_rab($id_rab,$id_kg){
        $hasil=$this->db->query("SELECT a.*,b.*,c.nama_kg FROM tbl_rab a join tbl_detail_kegiatan_rab b join tbl_kegiatan c on a.id_rab=b.id_rab and b.id_kg=c.id_kg where b.id_rab='$id_rab' and b.id_kg='$id_kg'");
        return $hasil->result();
    }
    public function get_data_kegiatan($id_rab,$id_kg,$lokasi){
        $hasil=$this->db->query("SELECT a.id_rab,a.periode_rab,b.id_kg,b.bidang_kg,b.nama_kg,c.id_detail_kg,c.waktu_pelaksanaan,c.keluaran_kg,c.nominal_kegiatan_rab,c.lokasi_kg,d.id_bahan,d.nama_bahan,d.satuan_bahan,e.jumlah_bahan_kg,e.harga_bahan_kg,f.id_kel_bahan,f.kel_bahan from tbl_rab a join tbl_kegiatan b join tbl_detail_kegiatan_rab c join tbl_bahan d join tbl_detail_rab e join tbl_kel_bahan f on a.id_rab=c.id_rab and b.id_kg=c.id_kg and c.id_detail_kg=e.id_detail_kg and d.id_bahan=e.id_bahan and f.id_kel_bahan=d.id_kel_bahan where c.id_rab='$id_rab' and c.id_kg='$id_kg' and c.lokasi_kg='$lokasi'");
        return $hasil->result();
    }
    public function show_rab_rincian($id_rab,$id_kg,$lokasi){
        $hasil=$this->db->query("SELECT a.periode_rab,b.bidang_kg,b.nama_kg,c.waktu_pelaksanaan,c.keluaran_kg,d.id_bahan,d.nama_bahan,d.satuan_bahan,e.jumlah_bahan_kg,e.harga_bahan_kg,f.id_kel_bahan,f.kel_bahan from tbl_rab a join tbl_kegiatan b join tbl_detail_kegiatan_rab c join tbl_bahan d join tbl_detail_rab e join tbl_kel_bahan f on a.id_rab=c.id_rab and b.id_kg=c.id_kg and c.id_detail_kg=e.id_detail_kg and d.id_bahan=e.id_bahan and f.id_kel_bahan=d.id_kel_bahan where c.id_rab='$id_rab' and c.id_kg='$id_kg' and c.lokasi_kg='$lokasi'");
        return $hasil->result();
    }

    // function get_id_rab($where,$tbl){
    //     $query=$this->db->query("SELECT * FROM $tbl WHERE $where");
    //     return $query;
    // }
    // function get_data_rab($id){
    //     $hasil=$this->db->query("SELECT nama_bahan,satuan_bahan,harga_bahan FROM tbl_bahan WHERE id_bahan='$id'");
    //     return $hasil->result();
    // }

    // function get_rab($id){
    //     $hasil=$this->db->query("SELECT a.kd_rab,a.id_rab,a.lokasi_rab,a.tahun_anggaran,b.nama_kg,b.bidang_kg FROM tbl_rab a join tbl_kegiatan b ON a.id_kg=b.id_kg WHERE id_rab='$id'");
    //     return $hasil->result();
    // }
    // public function cek_kg_rab($id,$th,$h){
    //     $hasil=$this->db->query("SELECT id_kg FROM tbl_rab WHERE id_kg='$id' and tahun_anggaran='$th' and lokasi_rab='$h'");
    //     return $hasil->result();
    // }
    

    public function get_ttd($where,$table){
        return $this->db->query("SELECT level_us,nama_us FROM $table WHERE $where order by level_us asc")->result();
    }
    function delete_data($where,$table){
        $hasil=$this->db->query("DELETE FROM $table WHERE $where");
        return $hasil;
    }
}