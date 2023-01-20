<?php
class M_toko extends CI_Model {
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
        $this->db->select('*');
        $this->db->from('tbl_toko');
        $query=$this->db->get();
        return $query->result();
    }
    function hapus_data($id){
        $hasil=$this->db->query("DELETE FROM tbl_toko WHERE id_toko='$id'");
        return $hasil;
    }
}