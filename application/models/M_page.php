<?php
class M_page extends CI_Model {
	public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function nilai_rab($th){
        $hasil=$this->db->query("SELECT nilai_rab from tbl_rab WHERE periode_rab='$th'");
        return $hasil->result();
    }
    public function nilai_kegiatan($th){
        $hasil=$this->db->query("SELECT a.id_rab,a.periode_rab,b.id_kg,b.kd_kg,b.nama_kg,c.harga_bahan,e.jumlah_bahan_kg FROM tbl_rab a join tbl_kegiatan b join tbl_bahan c join tbl_detail_rab e join tbl_detail_kegiatan_rab d ON b.id_kg=d.id_kg and c.id_bahan=e.id_bahan WHERE a.periode_rab='$th'");
        return $hasil->result();
    }
}