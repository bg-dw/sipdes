<?php
class M_login extends CI_Model{
	function cek_login($username,$password){
		$query=$this->db->query("SELECT * FROM tbl_user WHERE username_us='$username' AND password_us='$password' and status_us='ak'");
		return $query;
	}	
    public function cek_periode($where,$table){
        return $this->db->get_where($table,$where);
    }
}
?>