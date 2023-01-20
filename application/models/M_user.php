<?php
class M_user extends CI_Model {
	public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function show_data(){
        $query=$this->db->query("SELECT * FROM tbl_user order by th_aktif DESC");
        return $query->result();
    }
    public function get_data($th){
        $query=$this->db->query("SELECT * FROM tbl_user WHERE th_aktif='$th' and level_us='pk'");
        return $query->result();
    }
    public function show_data_by($where,$table){
        return $this->db->get_where($table,$where);
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
    function delete_data($id){
        $hasil=$this->db->query("DELETE FROM tbl_user WHERE id_user='$id'");
        return $hasil;
    }
}