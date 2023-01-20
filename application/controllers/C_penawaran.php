<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_penawaran extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_rab');
		$this->load->model('M_penawaran');
		if($this->session->userdata('log_in') != TRUE){
			$url=base_url();
			redirect($url);
		} 
	}

//permintaan penawaran
	public function index(){
		$th = $this->session->userdata('periode_aktif');
	   	$data['rab'] = $this->M_penawaran->daftar_kegiatan_th($th);
	   	$data['pn'] = $this->M_penawaran->daftar_penawaran($th);
		$data['content']= "page/spen/V_daftar_penawaran";
		$this->load->view('page/Main',$data);
	}
	public function input_penawaran($id_rab,$id_kg,$lokasi_kg){
		$lokasi = urldecode($lokasi_kg);
	    $data['total_permintaan'] = $this->M_penawaran->count_permintaan();
	    $data['data_toko'] = $this->M_penawaran->get_data('tbl_toko');
	    $data['data_kg'] = $this->M_penawaran->get_data_kg($id_rab,$id_kg,$lokasi);
		$data['content']= "page/spen/V_tambah_penawaran";
		$this->load->view('page/Main',$data);
	}
	public function ac_input_penawaran(){
		$status=2;
		$id_rab = $this->input->post('id_rab');
		$id_detail = $this->input->post('id_detail_kg');
		$nomor = $this->input->post('nomor');
		$sifat = $this->input->post('sifat');
		$lampiran = $this->input->post('lampiran');
		$hal = $this->input->post('hal'); 
		$tujuan = $this->input->post('nama_tujuan');
		$date = date('Y-m-d',strtotime($_POST['date']));
		$data_update = array(
			'status_rab' =>$status
		);
		$where = "id_rab ='".$id_rab."'";
		$this->M_penawaran->update_data($where,$data_update,'tbl_rab');
		$data = array(
			'status_kg' =>$status
		);
		$where = "id_rab ='".$id_rab."' and id_detail_kg='".$id_detail."'";
		$this->M_penawaran->update_data($where,$data,'tbl_detail_kegiatan_rab');
	    $data = array(
	      'id_detail_kg'=>$id_detail,
	      'id_toko'=>$tujuan,
	      'nomor_pn'=>$nomor,
	      'sifat_pn'=>$sifat,
	      'lampiran_pn'=>$lampiran,
	      'hal_pn'=>$hal,
	      'bts_tgl'=>$date
	    );
	    $this->M_penawaran->input_data($data,'tbl_permintaan_penawaran');
    	$this->session->set_flashdata('info','Disimpan!');
	    redirect('c_penawaran/');
	}
	public function edit_penawaran($id,$id_kg,$lokasi_kg){
		$lokasi = urldecode($lokasi_kg);
	    $data['data_penawaran'] = $this->M_penawaran->get_edit_penawaran($id,$id_kg,$lokasi);
	    $data['data_toko'] = $this->M_penawaran->get_data('tbl_toko');
		$data['content']= "page/spen/V_edit_penawaran";
		$this->load->view('page/Main',$data);
	}
	public function ac_edit_penawaran(){
		$id_rab = $this->input->post('id_rab');
		$id_kg = $this->input->post('id_kg');
		$id = $this->input->post('id_pn');
		$sifat = $this->input->post('sifat');
		$lampiran = $this->input->post('lampiran');
		$hal = $this->input->post('hal'); 
		$tujuan = $this->input->post('nama_tujuan');
		$date = date('Y-m-d',strtotime($_POST['date']));
		$data = array(
			'status_kg' =>2
		);
		$where = "id_rab ='".$id_rab."' and id_kg='".$id_kg."'";
		$this->M_penawaran->update_data($where,$data,'tbl_detail_kegiatan_rab');
		$where = "id_pn='".$id."'";
	    $data = array(
	      'sifat_pn'=>$sifat,
	      'lampiran_pn'=>$lampiran,
	      'hal_pn'=>$hal,
	      'id_toko'=>$tujuan,
	      'bts_tgl'=>$date
	    );
	    $this->M_penawaran->update_data($where,$data,'tbl_permintaan_penawaran');
    	$this->session->set_flashdata('info','Disimpan!');
	    redirect('c_penawaran/');
	}
	public function rincian_penawaran($id,$id_kg,$lokasi_kg){
		$tgl = $this->session->userdata('periode_aktif');
		$lokasi = urldecode($lokasi_kg);
	    $data['data_penawaran'] = $this->M_penawaran->get_edit_penawaran($id,$id_kg,$lokasi);
		$where = "(level_us='pk' or level_us='kd') and th_aktif='".$tgl."'";
		$data['ttd'] = $this->M_rab->get_ttd($where,'tbl_user');
		$data['content']= "page/spen/V_rincian_penawaran";
		$this->load->view('page/Main',$data);
	}
	public function cek_penawaran(){
		//status kegiatan 3=revisi
		//status kegiatan 4=diverifikasi
		$id_rab = $this->input->post('id_rab');
		$id_kg = $this->input->post('id_kg');
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$data_update = array(
			'status_kg' =>$status
		);
		$where = "id_rab ='".$id_rab."' and id_kg='".$id_kg."'";
		$this->M_penawaran->update_data($where,$data_update,'tbl_detail_kegiatan_rab');
		if($status==3){
    		$this->session->set_flashdata('info','Meminta Revisi!');
		}else{
	    	$this->session->set_flashdata('info','Diverifikasi!');
	    }
	    redirect('c_penawaran/');
	}

//berita acara
	public function daftar_ba_penawaran(){
		$th = $this->session->userdata('periode_aktif');
	   	$data['pn'] = $this->M_penawaran->daftar_penawaran($th);
		$data['content']= "page/spen/V_daftar_negosiasi";
		$this->load->view('page/Main',$data);
	}
	public function input_ba_penawaran($id_rab,$id_kg,$lokasi_kg){
		$lokasi = urldecode($lokasi_kg);
	    $data['total_ba'] = $this->M_penawaran->count_ba($id_rab);
	    $data['data'] = $this->M_penawaran->get_tambah_ba_pen($id_rab,$id_kg,$lokasi);
		$data['content']= "page/spen/V_tambah_ba_penawaran";
		$this->load->view('page/Main',$data);
	}
	public function ac_input_ba_penawaran(){
		$status=5;//status kg
		$id = $this->input->post('id_detail_kg');
		$tgl = date('Y-m-d',strtotime($this->input->post('tgl')));
		$nomor = $this->input->post('nomor');
		$jam = $this->input->post('jam');
		$tempat = $this->input->post('tempat');
		$dihadiri_oleh = $this->input->post('dihadiri_oleh');
	    $id_bahan=$this->input->post('id_bahan');
		$harga= $this->input->post('harga');//per item
		$data_update = array(
			'status_kg' =>$status
		);
		$where = "id_detail_kg ='".$id."'";
		$this->M_penawaran->update_data($where,$data_update,'tbl_detail_kegiatan_rab');
	    $data = array(
	      'id_detail_kg'=>$id,
	      'nomor_ba'=>$nomor,
	      'tgl_ba'=>$tgl,
	      'jam_ba'=>$jam,
	      'tempat_ba'=>$tempat,
	      'dihadiri_oleh'=>$dihadiri_oleh
	    );
	    $this->M_penawaran->input_data($data,'tbl_perjanjian');
		for($i=0;$i<count($id_bahan);$i++){
		    $data = array(
		      'harga_bahan_perjanjian'=>$harga[$i]	
		    );
			$where = "id_detail_kg ='".$id."' and id_bahan='".$id_bahan[$i]."'";
		    $this->M_penawaran->update_data($where,$data,'tbl_detail_rab');

			//update harga barang kegiatan di data master
			$where = array('id_bahan'=>$id_bahan[$i]);
			$data_update = array(
				'harga_bahan'=>$harga[$i]
		    ); 
			$this->M_penawaran->update_data($where,$data_update,'tbl_bahan');
		}
    	$this->session->set_flashdata('info','Disimpan!');
	    redirect('c_penawaran/daftar_ba_penawaran');
	}
	public function edit_ba_penawaran($id_rab,$id_kg,$lokasi_kg){
		$lokasi = urldecode($lokasi_kg);
	    $data['data_ba'] = $this->M_penawaran->get_edit_ba($id_rab,$id_kg,$lokasi);
		$data['content']= "page/spen/V_edit_ba_penawaran";
		$this->load->view('page/Main',$data);
	}
	public function ac_edit_ba_penawaran(){
		$id = $this->input->post('id_detail_kg');
		$id_pj = $this->input->post('id_pj');
		$tgl = date('Y-m-d',strtotime($this->input->post('tgl')));
		$nomor = $this->input->post('nomor');
		$jam = $this->input->post('jam');
		$tempat = $this->input->post('tempat');
		$dihadiri_oleh = $this->input->post('dihadiri_oleh');
	    $id_bahan=$this->input->post('id_bahan');
		$harga= $this->input->post('harga');//per item
	    $data = array(
	      'id_detail_kg'=>$id,
	      'nomor_ba'=>$nomor,
	      'tgl_ba'=>$tgl,
	      'jam_ba'=>$jam,
	      'tempat_ba'=>$tempat,
	      'dihadiri_oleh'=>$dihadiri_oleh
	    );
		$where = "id_detail_kg ='".$id."'";
	    $this->M_penawaran->update_data($where,$data,'tbl_perjanjian');
		for($i=0;$i<count($id_bahan);$i++){
		    $data = array(
		      'harga_bahan_perjanjian'=>$harga[$i]	
		    );
			$where = "id_detail_kg ='".$id."' and id_bahan='".$id_bahan[$i]."'";
		    $this->M_penawaran->update_data($where,$data,'tbl_detail_rab');
		}
    	$this->session->set_flashdata('info','Disimpan!');
	    redirect('c_penawaran/daftar_ba_penawaran');
	}
	public function rincian_ba_penawaran($id_rab,$id_kg,$lokasi_kg){
		$th = $this->session->userdata('periode_aktif');
		$lokasi = urldecode($lokasi_kg);
	    $data['tpk'] = $this->M_penawaran->get_tpk($th);
	    $data['data_ba'] = $this->M_penawaran->get_isi_ba($id_rab,$id_kg,$lokasi);
	    $i=0;
	    foreach($data['data_ba'] as $a){
	    	$tamp[$i]= $a->jumlah_bahan_kg*$a->harga_bahan_kg;
	    	$i++;
	    }
	    $data['permintaan'] = array_sum($tamp);
		$data['content']= "page/spen/V_rincian_negosiasi";
		$this->load->view('page/Main',$data);
	}

//perjanjian kerjasama
	public function daftar_perjanjian(){
		$th = $this->session->userdata('periode_aktif');
	   	$data['rab'] = $this->M_penawaran->get_daftar_perjanjian($th);
		$data['content']= "page/spen/V_daftar_perjanjian";
		$this->load->view('page/Main',$data);
	}
	public function input_perjanjian($id_rab,$id_kg,$lokasi_kg){
		$th = $this->session->userdata('periode_aktif');
		$lokasi = urldecode($lokasi_kg);
	    $data['total_pj'] = $this->M_penawaran->count_pj($id_rab);
	    $data['tpk'] = $this->M_penawaran->get_tpk($th);
	    $data['data_perjanjian'] = $this->M_penawaran->get_perjanjian($id_rab,$id_kg,$lokasi);
		$data['content']= "page/spen/V_tambah_perjanjian";
		$this->load->view('page/Main',$data);
	}
	public function set_perjanjian(){
		$status=6;
		$id = $this->input->post('id_pj');
		$id_detail = $this->input->post('id_detail_kg');
		$nomor = $this->input->post('nomor');
		$tgl1 = date('Y-m-d',strtotime($this->input->post('sejak_tgl')));
		$tgl2 = date('Y-m-d',strtotime($this->input->post('sampai_tgl')));
		$ketentuan = $this->input->post('ketentuan');
		$sanksi = $this->input->post('sanksi');
		$data_update = array(
			'status_kg' =>$status
		);
		$where = "id_detail_kg ='".$id_detail."'";
		$this->M_penawaran->update_data($where,$data_update,'tbl_detail_kegiatan_rab');
	    $data = array(
	      'nomor_pj'=>$nomor,
	      'tgl_mulai'=>$tgl1,
	      'tgl_akhir'=>$tgl2,
	      'ketentuan_pj'=>$ketentuan,
	      'sanksi_pj'=>$sanksi
	    );
		$where = "id_pj ='".$id."'";
	    $this->M_penawaran->update_data($where,$data,'tbl_perjanjian');
    	$this->session->set_flashdata('info','Disimpan!');
	    redirect('c_penawaran/daftar_perjanjian');
	}
	public function edit_perjanjian($id_rab,$id_kg,$lokasi_kg){
		$lokasi = urldecode($lokasi_kg);
	    $data['data_perjanjian'] = $this->M_penawaran->get_edit_perjanjian($id_rab,$id_kg,$lokasi);
		$data['content']= "page/spen/V_edit_perjanjian";
		$this->load->view('page/Main',$data);
	}	
	public function ac_edit_perjanjian(){
		$id = $this->input->post('id_pj');
		$id_detail = $this->input->post('id_detail_kg');
		$tgl1 = date('Y-m-d',strtotime($this->input->post('sejak_tgl')));
		$tgl2 = date('Y-m-d',strtotime($this->input->post('sampai_tgl')));
		$ketentuan = $this->input->post('ketentuan');
		$sanksi = $this->input->post('sanksi');
	    $data = array(
	      'tgl_mulai'=>$tgl1,
	      'tgl_akhir'=>$tgl2,
	      'ketentuan_pj'=>$ketentuan,
	      'sanksi_pj'=>$sanksi
	    );
		$where = "id_pj ='".$id."'";
	    $this->M_penawaran->update_data($where,$data,'tbl_perjanjian');
    	$this->session->set_flashdata('info','Disimpan!');
	    redirect('c_penawaran/daftar_perjanjian');
	}
	public function rincian_perjanjian($id_rab,$id_kg,$lokasi_kg){
		$th = $this->session->userdata('periode_aktif');
		$lokasi = urldecode($lokasi_kg);
	    $data['tpk'] = $this->M_penawaran->get_tpk($th);
	    $data['data_perjanjian'] = $this->M_penawaran->get_rincian_perjanjian($id_rab,$id_kg,$lokasi);
		$data['content']= "page/spen/V_rincian_perjanjian";
		$this->load->view('page/Main',$data);
	}
}
