<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
	    parent::__construct();
		$this->load->model('M_login');
	}
	
	public function index()
	{
    	if($this->session->userdata('log_in') == TRUE){
			$url=base_url('index.php/page/');
			redirect($url);
		}else{
		    $this->session->sess_destroy();
			$this->load->view('/login/v_login');
		}
	}

	public function cek_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$query=$this->M_login->cek_login($username,$password);
		$where="status_periode=1";
		$status_periode=$this->M_login->cek_periode($where,'tbl_periode');
		if($query->num_rows() >0)
		{
			$data=$query->row_array();
			$periode=$status_periode->row_array();

			if($data['level_us']=="admin"){
	    		$this->session->set_userdata('log_in',TRUE);
	    		$this->session->set_userdata('id',$data['id_user']);
	    		$this->session->set_userdata('nama',$data['nama_us']);
	    		$this->session->set_userdata('jk',$data['jk_us']);
	    		$this->session->set_userdata('tgl',$data['tgl_us']);
	    		$this->session->set_userdata('level',$data['level_us']);
	    		$this->session->set_userdata('pic',$data['pic_us']);
	    		$this->session->set_userdata('username',$data['username_us']);
	    		$this->session->set_userdata('password',$data['password_us']);
	    		$this->session->set_userdata('status',$data['status_us']);
	    		$this->session->set_userdata('periode_aktif',$periode['periode']);
				echo "1";
			}else{
				if($data['th_aktif']==$periode['periode']){
		    		$this->session->set_userdata('log_in',TRUE);
		    		$this->session->set_userdata('id',$data['id_user']);
		    		$this->session->set_userdata('nama',$data['nama_us']);
		    		$this->session->set_userdata('jk',$data['jk_us']);
		    		$this->session->set_userdata('tgl',$data['tgl_us']);
		    		$this->session->set_userdata('level',$data['level_us']);
		    		$this->session->set_userdata('pic',$data['pic_us']);
		    		$this->session->set_userdata('username',$data['username_us']);
		    		$this->session->set_userdata('password',$data['password_us']);
		    		$this->session->set_userdata('status',$data['status_us']);
		    		$this->session->set_userdata('periode_aktif',$periode['periode']);
					echo "1";
				}else{
					echo "2";
				}
			}
		}else{
		   echo "0";
		}
	}
    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    } 
}
