<?php
class M_bahan extends CI_Model {
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
        $hasil=$this->db->query("SELECT * FROM tbl_bahan");
        return $hasil->result();
    }
    public function get_data_kel(){
        $this->db->select('*');
        $this->db->from('tbl_kel_bahan');
        $query=$this->db->get();
        return $query->result();
    }
    public function get_data_all(){
        $hasil=$this->db->query("SELECT a.id_bahan,a.nama_bahan,a.satuan_bahan,a.harga_bahan,b.kel_bahan FROM tbl_bahan a join tbl_kel_bahan b ON a.id_kel_bahan=b.id_kel_bahan");
        return $hasil->result();
    }
    public function get_data_kel_by($id){
        $hasil=$this->db->query("SELECT a.id_kel_bahan,kel_bahan FROM tbl_bahan a join tbl_kel_bahan b ON a.id_kel_bahan=b.id_kel_bahan where id_bahan='$id'");
        return $hasil;
    }
    function delete_data($id){
        $hasil=$this->db->query("DELETE FROM tbl_bahan WHERE id_bahan='$id'");
        return $hasil;
    }
    function delete_data_kel($id){
        $hasil=$this->db->query("DELETE FROM tbl_kel_bahan WHERE id_kel_bahan='$id'");
        return $hasil;
    }
}