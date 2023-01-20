<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_rab extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_rab');
		$this->load->model('M_kegiatan');
		$this->load->model('M_bahan');
		if($this->session->userdata('log_in') != TRUE){
			$url=base_url();
			redirect($url);
		} 
	}

	public function index(){
		//$th = date('Y'); 
		$data['list_rab'] = $this->M_rab->list_rab();   	
    	$data['content']= "page/rab/V_rab";
		$this->load->view('page/Main',$data);
	}
	public function daftar_rab_kegiatan(){
		$th = $this->session->userdata('periode_aktif');  
		$data['rab'] = $this->M_rab->daftar_kegiatan_th($th);  	
    	$data['content']= "page/rab/V_rab_kegiatan";
		$this->load->view('page/Main',$data);
	}
//kegiatan rab
	public function input_rab(){
		if($this->session->userdata('level')=="pk"){
        	$data['content']= "page/rab/V_tambah_rab";
	    	$data['kg'] = $this->M_kegiatan->get_data();
			$this->load->view('page/Main',$data);
		}else{
			redirect('page/');
		}
	}
	function get_satuan(){
        $id=$this->input->post('id');
        $data=$this->M_rab->get_satuan_bahan($id);
        echo json_encode($data);
    }
	public function ac_input(){
		$th = $this->input->post('th');
		$nilai = $this->input->post('nilai');
		$lokasi = $this->input->post('lokasi');
		$a = $this->input->post('nama_kg');
		$b = $this->input->post('harga_kg');
		$c = $this->input->post('waktu_kg');
		$date = $this->input->post('date_kg');
		$where = "periode_rab='".$th."'";
		$cek = $this->M_rab->edit_data($where,'tbl_rab');
		if(count($cek)==0){//cek apakah ada RAB yang sama
			$data = array(
				'periode_rab'=>$th,
				'lokasi_rab'=>$lokasi,
				'status_rab'=>1,
				'nilai_rab'=>$nilai
		    );  
	    	$this->M_rab->input_data($data,'tbl_rab');
	    	$where = "periode_rab='".$th."'";
	    	$get_id = $this->M_rab->edit_data($where,'tbl_rab');
			if($get_id){
				$id_kg=explode("," ,$a);
				$harga_kg=explode("," ,$b);
				$waktu_kg=explode("," ,$c);
				$date_kg=explode("," ,$date);
		    	for($i=0;$i<count($id_kg);$i++){
					$data = array(
						'id_rab'=>$get_id[0]->id_rab,
						'id_kg'=>$id_kg[$i],
						'nominal_kegiatan_rab'=>$harga_kg[$i],
						'status_kg'=>0,
						'waktu_pelaksanaan'=>$waktu_kg[$i],
						'tgl_pelaksanaan'=>$date_kg[$i]
				    );  
			    	$this->M_rab->input_data($data,'tbl_detail_kegiatan_rab');
		    	} 
		    }
    		redirect('c_rab/'); 
		}else{
    		$this->session->set_flashdata('warning','RAB telah ada!');
			redirect('c_rab/input_rab');
		}   	
	}
	public function edit_rab($id_rab){
		if($this->session->userdata('level')=="pk"){
        	$data['content']= "page/rab/V_edit_rab";
        	$where = "id_rab='".$id_rab."'";
			$th = $this->session->userdata('periode_aktif');
	    	$data['kg'] = $this->M_kegiatan->get_data($th);
	    	$data['rab'] = $this->M_rab->edit_data($where,'tbl_rab');
	    	$data['kegiatan_rab'] = $this->M_rab->edit_data($where,'tbl_detail_kegiatan_rab');
			$this->load->view('page/Main',$data);
		}else{
			redirect('page/');
		}
	}
	public function ac_edit(){
		$id = $this->input->post('id');
		$th = $this->input->post('th');
		$nilai = $this->input->post('nilai');
		$lokasi = $this->input->post('lokasi');
		$a = $this->input->post('id_kg');
		$b = $this->input->post('nilai_kg');
		$c = $this->input->post('j_kg');
		$d = $this->input->post('w_kg');
		$id_detail = $this->input->post('id_detail');
		$where = "id_rab=".$id;
		$data = array(
			'periode_rab'=>$th,
			'lokasi_rab'=>$lokasi,
			'nilai_rab'=>$nilai
	    );  
    	$this->M_rab->update_data($where,$data,'tbl_rab');
    	for($i=0;$i<count($a);$i++){
    		$waktu_kg = $c[$i]." ".$d[$i];
			$where = "id_detail_kg=".$id_detail[$i];
			$data = array(
				'id_kg'=>$a[$i],
				'nominal_kegiatan_rab'=>$b[$i],
				'waktu_pelaksanaan'=>$waktu_kg
		    );  
    		$this->M_rab->update_data($where,$data,'tbl_detail_kegiatan_rab');
    	}
    	$this->session->set_flashdata('update','Diperbaharui!');
	    redirect('c_rab/');
	}
	public function ac_hapus_rab(){
		if($this->session->userdata('level')=="pk"){
			$kd = $this->input->post('id');
			$where = "id_rab='".$kd."'";
		    $hapus = $this->M_rab->delete_data($where,'tbl_rab');
	    	$this->session->set_flashdata('hapus','Dihapus!');
		    redirect('c_rab/');
		}else{
			redirect('page/');
		}
	}
	public function rincian_rab($id){
		$data['rab'] = $this->M_rab->daftar_kegiatan($id);   	
    	$data['content']= "page/rab/V_rincian_rab";
		$this->load->view('page/Main',$data);
	}
//bahan Kegiatan
	public function input_bahan_kegiatan($id_rab,$id_kg){
		if($this->session->userdata('level')=="pk"){
        	$data['content']= "page/rab/V_tambah_uraian";
	    	$data['rab'] = $this->M_rab->get_data_rab($id_rab,$id_kg);
	    	$data['bahan'] = $this->M_bahan->get_data();
	    	$data['uraian'] = "";
	    	$data['kegiatan'] = "";
			$this->load->view('page/Main',$data);
		}else{
			redirect('page');
		}
	}
	public function isi_uraian($id_rab,$id_kg){
		$rw = $this->input->post('inp_rw');
		$rt = $this->input->post('inp_rt');
		$keluaran = $this->input->post('inp_keluaran');
		$kegiatan = array(
			'rw'=>$rw,
			'rt'=>$rt,
			'keluaran'=>$keluaran
		);

		$id_bahan =  $this->input->post('id_bahan');
		$satuan =  $this->input->post('satuan');
		$harga =  $this->input->post('harga');
		$jumlah =  $this->input->post('jumlah');

		$id_bahan_kg =  $this->input->post('id_bahan_kg');
		$satuan_bahan_kg =  $this->input->post('satuan_bahan_kg');
		$nama_bahan_kg =  $this->input->post('nama_bahan_kg');
		$harga_bahan_kg =  $this->input->post('harga_bahan_kg');
		$jumlah_bahan_kg =  $this->input->post('jumlah_bahan_kg');

		$inm = explode(",", $id_bahan);
    	if($id_bahan==""){
    		$id = $id_bahan_kg;
    		$nm = $nama_bahan_kg;
    		$st = $satuan_bahan_kg;
    		$hrg = $harga_bahan_kg;
    		$jml = $jumlah_bahan_kg;
    	}else{
    		if($id_bahan_kg!=""){
				$id = $id_bahan_kg.",".$inm[0];
				$nm = $nama_bahan_kg.",".$inm[1];
				$st = $satuan_bahan_kg.",".$satuan;
				$hrg = $harga_bahan_kg.",".$harga;
				$jml = $jumlah_bahan_kg.",".$jumlah;
			}else{
				$id = $inm[0];
				$nm = $inm[1];
				$st = $satuan;
				$hrg = $harga;
				$jml = $jumlah;
			}
	    }
    	$belanja = array(
    		'id_bahan'=>$id,
    		'nama_bahan'=>$nm,
    		'satuan_bahan'=>$st,
    		'harga_bahan'=>$hrg,
    		'jumlah_bahan'=>$jml,
    	);
		$data['title'] ="RAB Kegiatan";
    	$data['content']= "page/rab/V_tambah_uraian";
    	$data['rab'] = $this->M_rab->get_data_rab($id_rab,$id_kg);
    	$data['bahan'] = $this->M_bahan->get_data();
    	$data['uraian'] = $belanja;
    	$data['kegiatan'] = $kegiatan;
		$this->load->view('page/Main',$data);
	}
	public function ac_input_bahan_kegiatan(){
		$id = $this->input->post('id_detail');
		$id_rab = $this->input->post('id_rab');
		$id_kg = $this->input->post('id_kg');
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$keluaran = $this->input->post('keluaran');
		$a = $this->input->post('id_bahan_kg');
		$b = $this->input->post('harga_bahan_kg');
		$c = $this->input->post('jumlah_bahan_kg');
		$where = "id_rab=".$id_rab." and id_kg='".$id_kg."'";
		$data = array(
			'status_kg'=>1,
			'keluaran_kg'=>$keluaran,
			'lokasi_kg'=>"RT ".$rt."-RW ".$rw
	    );  
    	$this->M_rab->update_data($where,$data,'tbl_detail_kegiatan_rab');
		$id_bahan=explode("," ,$a);
		$harga=explode("," ,$b);
		$jumlah=explode("," ,$c);
		$x=count($id_bahan);
		for($i=0;$i<$x;$i++){
			$data = array(
				'id_detail_kg'=>$id,
				'id_bahan'=>$id_bahan[$i],
				'harga_bahan_kg'=>$harga[$i],
				'jumlah_bahan_kg'=>$jumlah[$i]
		    ); 
			$input_rab=$this->M_rab->input_data($data,'tbl_detail_rab');
	    }
    	$this->session->set_flashdata('info','Ditambahkan!');
	    redirect('c_rab/daftar_rab_kegiatan/');
	}
	public function edit_bahan_kegiatan($id_rab,$id_kg,$lokasi_kg){
		$data['title'] ="Edit";
		if($this->session->userdata('level')=="pk"){
			$lokasi = urldecode($lokasi_kg);
        	$data['content']= "page/rab/V_edit_uraian";
	    	$data['kegiatan'] = $this->M_rab->get_data_kegiatan($id_rab,$id_kg,$lokasi);
	    	$data['bahan'] = $this->M_bahan->get_data();
			$this->load->view('page/Main',$data);
		}else{
			redirect('page');
		}
	}
	public function ac_edit_bahan_kegiatan(){
		$id_rab = $this->input->post('id_rab');
		$id_kg = $this->input->post('id_kg');
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$keluaran = $this->input->post('keluaran');
		$id_bahan_sebelum = $this->input->post('id_bahan_sebelum');
		$id_bahan = $this->input->post('id_bahan_kg');
		$harga = $this->input->post('harga_bahan_kg');
		$jumlah = $this->input->post('jumlah_bahan_kg');
		$where = "id_rab=".$id_rab." and id_kg='".$id_kg."'";
		$data = array(
			'keluaran_kg'=>$keluaran,
			'lokasi_kg'=>"RT ".$rt."-RW ".$rw
	    );  
    	$this->M_rab->update_data($where,$data,'tbl_detail_kegiatan_rab');
		$x=count($id_bahan);
		for($i=0;$i<$x;$i++){
			$where = "id_detail_kg='".$id_kg."' and id_bahan='".$id_bahan_sebelum[$i]."'";
			$data = array(
				'id_detail_kg'=>$id_kg,
				'id_bahan'=>$id_bahan[$i],
				'harga_bahan_kg'=>$harga[$i],
				'jumlah_bahan_kg'=>$jumlah[$i]
		    ); 
	    	$this->M_rab->update_data($where,$data,'tbl_detail_rab');
	    }
    	$this->session->set_flashdata('info','Disimpan!');
	    redirect('c_rab/daftar_rab_kegiatan/');
	}
	public function rincian($id_rab,$id_kg,$lokasi_kg){
		$tgl = $this->session->userdata('periode_aktif');
		$lokasi = urldecode($lokasi_kg);
        $data['content']= "page/rab/V_rincian_rab_kegiatan";
		$where = "th_aktif='$tgl' and (level_us='pk' or level_us='sd' or level_us='kd') and th_aktif='".$tgl."'";
		$data['ttd'] = $this->M_rab->get_ttd($where,'tbl_user');
    	$data['rab'] = $this->M_rab->show_rab_rincian($id_rab,$id_kg,$lokasi);
		$this->load->view('page/Main',$data);
	}
}
