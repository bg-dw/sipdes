<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_login');
		if($this->session->userdata('log_in') != TRUE){
			$url=base_url();
			redirect($url);
		} 
	}

	public function index()	{
		if($this->session->userdata('level')=="admin"){
    		$data['content']= "page/user/V_user";
	    	$data['user'] = $this->M_user->show_data();
			$this->load->view('page/Main',$data);
		}else{
			redirect('page');
		}
	}
	public function ac_tambah()	{
		$a = $this->input->post('nama');
		$n_aw = explode(" ",$a);
		$nama = substr($n_aw[0],0,2);
		$jk = $this->input->post('jk');
		$b = date('Y-m-d',strtotime($_POST['tgl']));
		$tgl = explode("-",$b);
		$level = $this->input->post('level');
		$status = $this->input->post('status');
		$th = $this->input->post('th_ak');
		$uname = $nama.$tgl[2];
		$upass = $n_aw[0].$tgl[0];

	    $data = array(
	      'nama_us'=>$a,
	      'jk_us'=>$jk,
	      'tgl_us'=>$b,
	      'level_us'=>$level,
	      'username_us'=>$uname,
	      'password_us'=>$upass,
	      'status_us'=>$status,
	      'th_aktif'=>$th
	    );
	    $this->M_user->input_data($data,'tbl_user');
    	$this->session->set_flashdata('info','Ditambahkan!');
	    redirect('c_user');
	}
	public function ac_edit(){
		$id = $this->input->post('id');
		$a = $this->input->post('nama');
		$jk = $this->input->post('jk');
		$b = date('Y-m-d',strtotime($_POST['tgl']));
		$level = $this->input->post('level');
		$status = $this->input->post('status');
		$th = $this->input->post('th_ak');

		$where = "id_user='".$id."'";
	    $data = array(
	      'nama_us'=>$a,
	      'jk_us'=>$jk,
	      'tgl_us'=>$b,
	      'level_us'=>$level,
	      'status_us'=>$status,
	      'th_aktif'=>$th
	    );
	    $this->M_user->update_data($where,$data,'tbl_user');
    	$this->session->set_flashdata('info','Disimpan!');
	    redirect('c_user');
	}
	public function ac_hapus(){
		$id = $this->input->post('id');
	    $hapus = $this->M_user->delete_data($id,'tbl_user');
    	$this->session->set_flashdata('hapus','Dihapus!');
	    redirect('c_user');
	}

	public function myprofile(){
		$where = "id_user='".$this->session->userdata('id')."'";
		$data['content']= "page/user/V_profile_user";
    	$data['my'] = $this->M_user->show_data_by($where,'tbl_user');
		$this->load->view('page/Main',$data);
	}
	public function ac_update_profile()	{
		$id = $this->input->post('id');
		$u = $this->input->post('uname');
		$p = $this->input->post('upass');
		$foto=$this->input->post('foto_profile');

		$where = "id_user='".$id."'";
	    $data = array(
	      'username_us'=>$u,
	      'password_us'=>$p
	    );
	    $this->M_user->update_data($where,$data,'tbl_user');
	    $nmfile = $id."_".time();
	    $config['upload_path']          = './assets/dist/profile_img/';
	    $config['allowed_types']        = 'gif|jpg|png';
	    $config['max_size']             = 2048;
	    $config['max_width']            = 1366;
	    $config['max_height']           = 1366;
	    $config['file_name'] = $nmfile;
 
		$this->load->library('upload', $config);
		if($_FILES["foto_profile"]["error"] == 4) {//file kosong
		}else{
			if (!$this->upload->do_upload('foto_profile')){
	    		$this->session->set_flashdata("warning", $this->upload->display_errors());
		    	redirect('c_user/myprofile1');
			}else{
	        	$gbr = $this->upload->data();
				$data = array('upload_data' => $this->upload->data());
				$data = array(
		          'pic_us'=>$gbr['file_name']
		        );
		        $where = array(
		          'id_user' => $id
		        );
		        $this->M_user->update_data($where,$data,'tbl_user');
			}
		}
		$u=$this->session->userdata('username');
		$p=$this->session->userdata('password');
		$query=$this->M_login->cek_login($u,$p);
		$data=$query->row_array();
		$this->session->set_userdata('pic',$data['pic_us']);
    	$this->session->set_flashdata('info','Disimpan!');
	    redirect('c_user/myprofile');
	}
}
