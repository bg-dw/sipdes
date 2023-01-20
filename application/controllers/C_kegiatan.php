<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kegiatan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_kegiatan');
		if($this->session->userdata('log_in') != TRUE){
			$url=base_url();
			redirect($url);
		} 
	}

	public function index(){
		//$th = date('Y');
    	$data['content']= "page/kegiatan/V_kegiatan";
    	$data['kg'] = $this->M_kegiatan->get_data();
		$this->load->view('page/Main',$data);
	}
//periode rab
	public function set_periode(){
    	$data['title']= "Periode Aktif";
    	$data['periode'] = $this->M_kegiatan->get_all_data("tbl_periode");
    	$data['content']= "page/kegiatan/V_periode";
		$this->load->view('page/Main',$data);
	}
	function add_periode(){	
		$th =$this->input->post('th');
		$where = "periode='".$th."'";
		$hasil=$this->M_kegiatan->edit_data($where,'tbl_periode');
		if($hasil->num_rows()==0){
			$data = array(
				'periode' => $th
			);
			$this->M_kegiatan->input_data($data,'tbl_periode');
			echo json_encode($data);
		}			
	}
	function update_periode(){	
		$id =$this->input->post('id_periode');
		$where = "status_periode='1'";
		$data = array(
			'status_periode' => 0
		);
		$this->M_kegiatan->update_data($where,$data,'tbl_periode');
		$data = array(
			'status_periode' => 1
		);
		$where = "id_periode='".$id."'";
		$this->M_kegiatan->update_data($where,$data,'tbl_periode');
		echo json_encode($data);			
	}

//kegiatan
	public function input_kg(){
		//$th=date('Y');
    	$data['total_kg'] = $this->M_kegiatan->count_kg();
    	$data['content']= "page/kegiatan/V_buat_kegiatan";
		$this->load->view('page/Main',$data);
	}
	public function ac_input(){
		$kg = $this->input->post('kd');
		$d = $this->input->post('bidang');
		$f = $this->input->post('kegiatan');
	    $x=$this->M_kegiatan->cek_kd($kg);
		if(count($x)>0){
	    	$this->session->set_flashdata('warning','Kode Kegiatan Sudah Ada!');
	    	redirect('c_kegiatan/input_kg/');
	    }else{
			$data = array(
		      'kd_kg'=>$kg,
		      'bidang_kg'=>$d,
		      'nama_kg'=>$f
		    );
		    $this->M_kegiatan->input_data($data,'tbl_kegiatan');
	    	$this->session->set_flashdata('info','Ditambahkan!');
	    	redirect('c_kegiatan/');
	    }
	}
	public function edit_kg($id_kg){
		$id = $id_kg;
		$where = array('id_kg'=>$id);
    	$data['content']= "page/kegiatan/V_edit_kegiatan";
		$data['kegiatan'] = $this->M_kegiatan->edit_data($where,'tbl_kegiatan')->result();
		$this->load->view('page/Main',$data);
	}
	public function ac_edit(){
		$id = $this->input->post('id');
		$kg = $this->input->post('kd');
		$d = $this->input->post('bidang');
		$f = $this->input->post('kegiatan');

		$where = array('id_kg'=>$id);
		$data = array(
	      'kd_kg'=>$kg,
	      'bidang_kg'=>$d,
	      'nama_kg'=>$f
	    );
	    $this->M_kegiatan->update_data($where,$data,'tbl_kegiatan');
    	$this->session->set_flashdata('update','Diperbaharui!');
	    redirect('c_kegiatan/');
	}
	public function ac_hapus(){
		$id = $this->input->post('id');
	    $a=$this->M_kegiatan->delete_data($id,'tbl_kegiatan');
	    if($a==true){
    		$this->session->set_flashdata('hapus',"Terhapus");	
	    }else{
    		$this->session->set_flashdata('warning',"Gagal!");
	    }
	    redirect('c_kegiatan');
	}

//kas kegiatan
	function daftar_kas_kg(){
		$th=$this->session->userdata('periode_aktif');
    	$data['kg'] = $this->M_kegiatan->get_daftar_kas($th);
		$data['rab'] = $this->M_kegiatan->daftar_kegiatan_rab($th);
    	$data['content']= "page/kegiatan/V_kas_kegiatan";
		$this->load->view('page/Main',$data);
	}
	public function input_kas_kegiatan(){
		$th = $this->session->userdata('periode_aktif');  
	    $data['transaksi'] = $this->M_kegiatan->get_transaksi_terakhir($th);
	    // $data['isi'] = $this->M_kegiatan->get_rincian_bukti($id);
		$data['rab'] = $this->M_kegiatan->daftar_kegiatan_rab($th);
    	$data['title']= "Kas Kegiatan";
        $data['content']= "page/kegiatan/V_tambah_kas";
        $this->load->view('page/Main',$data);
	}
	public function get_bahan_kegiatan(){
        $lokasi=$this->input->post('lokasi');
		//$lokasi = urldecode($lokasi_kg);
        $id_rab=$this->input->post('id_rab');
        $id_kg=$this->input->post('id_kg');
        $data=$this->M_kegiatan->get_item($id_rab,$id_kg,$lokasi);
        echo json_encode($data);
    }
	public function get_bahan_kegiatan_nominal(){
        $lokasi=$this->input->post('lokasi');
        $id_rab=$this->input->post('id_rab');
        $id_kg=$this->input->post('id_kg');
        $id_bahan=$this->input->post('id_bahan');
        $data=$this->M_kegiatan->get_item_nominal($id_rab,$id_kg,$lokasi,$id_bahan);
        echo json_encode($data);
    }

	public function ac_tambah_kas(){
		$date = date('Y-m-d',strtotime($_POST['date']));
		$jenis = $this->input->post('jenis');
		$sumber = $this->input->post('sumber');
		$kg = $this->input->post('kegiatan');
		$uraian = $this->input->post('uraian');
		$no_bukti = $this->input->post('nomor');
		$nominal = $this->input->post('nominal');
		$pengembalian = $this->input->post('pengembalian');
		$saldo = $this->input->post('saldo');
		$ex_kg = explode(",", $kg);

		if($jenis=="penerimaan"){
			if($sumber=="bendahara"){
				$pen_bd = $nominal;
				$pen_sm = 0;
				$peng_bj = 0;
				$peng_bm = 0;
			}else{
				$pen_bd = 0;
				$pen_sm = $nominal;
				$peng_bj = 0;
				$peng_bm = 0;
			}
			$saldo_akhir = $saldo;
		}else{
			if($sumber=="barang"){
				$pen_bd = 0;
				$pen_sm = 0;
				$peng_bj = $nominal;
				$peng_bm = 0;
			}else{
				$pen_bd = 0;
				$pen_sm = 0;
				$peng_bj = 0;
				$peng_bm = $nominal;
			}
			$saldo_akhir = $saldo;
		}

		$data = array(
	      'id_detail_kg'=>$ex_kg[0],
	      'tgl_kas_kg'=>$date,
	      'uraian_kas_kg'=>$uraian,
	      'penerimaan_kas_bd'=>$pen_bd,
	      'penerimaan_kas_sm'=>$pen_sm,
	      'no_bukti_kas_kg'=>$no_bukti,
	      'pengeluaran_bj'=>$peng_bj,
	      'pengeluaran_bm'=>$peng_bm,
	      'pengembalian_kas'=>$pengembalian,
	      'saldo_kas_kg'=>$saldo_akhir
	    ); 
	    $this->M_kegiatan->input_data($data,'tbl_kas_kegiatan');
    	$this->session->set_flashdata('info','Ditambahkan!');
	    redirect('c_kegiatan/daftar_kas_kg');
	}
	public function edit_kas_kg($id)
	{
    	$data['title']= "Edit";
		$th = $this->session->userdata('periode_aktif');
		$data['rab'] = $this->M_kegiatan->daftar_kegiatan_rab($th);

		$id_rab = $data['rab'][0]->id_rab;
		$id_kg = $data['rab'][0]->id_kg;
		$lokasi = $data['rab'][0]->lokasi_kg;
		$data['bahan'] = $this->M_kegiatan->get_item($id_rab,$id_kg,$lokasi);
	    $data['isi'] = $this->M_kegiatan->get_data_kas($id,'tbl_kas_kegiatan');
        $data['content']= "page/kegiatan/V_edit_kas_kg";
        $this->load->view('page/Main',$data);
	}
	public function ac_edit_kas($id_kas){
		$date = date('Y-m-d',strtotime($_POST['date']));
		$jenis = $this->input->post('jenis');
		$sumber = $this->input->post('sumber');
		$kg = $this->input->post('kegiatan');
		$uraian = $this->input->post('uraian');
		$no_bukti = $this->input->post('nomor');
		$nominal = $this->input->post('nominal');
		$pengembalian = $this->input->post('pengembalian');
		$saldo = $this->input->post('saldo');
		$ex_kg = explode(",", $kg);

		if($jenis=="penerimaan"){
			if($sumber=="bendahara"){
				$pen_bd = $nominal;
				$pen_sm = 0;
				$peng_bj = 0;
				$peng_bm = 0;
			}else{
				$pen_bd = 0;
				$pen_sm = $nominal;
				$peng_bj = 0;
				$peng_bm = 0;
			}
		}else{
			if($sumber=="barang"){
				$pen_bd = 0;
				$pen_sm = 0;
				$peng_bj = $nominal;
				$peng_bm = 0;
			}else{
				$pen_bd = 0;
				$pen_sm = 0;
				$peng_bj = 0;
				$peng_bm = $nominal;
			}
		}

		$data = array(
	      'id_detail_kg'=>$ex_kg[0],
	      'tgl_kas_kg'=>$date,
	      'uraian_kas_kg'=>$uraian,
	      'penerimaan_kas_bd'=>$pen_bd,
	      'penerimaan_kas_sm'=>$pen_sm,
	      'no_bukti_kas_kg'=>$no_bukti,
	      'pengeluaran_bj'=>$peng_bj,
	      'pengeluaran_bm'=>$peng_bm,
	      'pengembalian_kas'=>$pengembalian,
	      'saldo_kas_kg'=>$saldo
	    ); 
	    $where = "id_kas_kg=".$id_kas;
	    $this->M_kegiatan->update_data($where,$data,'tbl_kas_kegiatan');
    	$this->session->set_flashdata('info','Disimpan!');
	    redirect('c_kegiatan/daftar_kas_kg');
	}

	public function hapus_kas_kg($id){
	    $this->M_kegiatan->delete_kas($id);
    	$this->session->set_flashdata("success", "Dihapus!");
    	redirect('c_kegiatan/daftar_kas_kg/');
	}
	public function rincian_kas($id){
		$th = $this->session->userdata('periode_aktif');
	    $data['ttd'] = $this->M_kegiatan->get_pk($th);
	    $data['isi'] = $this->M_kegiatan->get_rincian_kas($id);
        $data['content']= "page/kegiatan/V_rincian_kas";
        $this->load->view('page/Main',$data);
	}

//laporan Kegiatan
	public function daftar_laporan_kg(){
		$th = $this->session->userdata('periode_aktif'); 
        $data['title']= "Kas Kegiatan";
		$data['rab'] = $this->M_kegiatan->get_daftar_laporan($th);  
        $data['content']= "page/kegiatan/V_daftar_laporan_kg";
        $this->load->view('page/Main',$data);
	}
	function tambah_laporan_kegiatan($id_rab,$id_kg,$lokasi_kg){ 
		$lokasi = urldecode($lokasi_kg);
        $data['title']= "Tambah";
		$data['kegiatan'] = $this->M_kegiatan->get_rincian_kegiatan($id_rab,$id_kg,$lokasi);  
        $data['content']= "page/kegiatan/V_tambah_laporan_kg";	
        $this->load->view('page/Main',$data);	
	}

	function ac_tambah_laporan($id_rab,$id_kg,$lokasi_kg){
		$id_detail = $this->input->post('id_detail_kg');
		$volume = $this->input->post('volume');
		$k_awal = $this->input->post('k_awal');
		$k_akhir = $this->input->post('k_akhir');
		$foto=array();

		for($i=1;$i<=3;$i++){
		    $nmfile = $id_detail."_".time();
		    $config['upload_path']          = './assets/dist/kegiatan/';
		    $config['allowed_types']        = 'gif|jpg|png';
		    $config['max_size']             = 2048;
		    $config['max_width']            = 6000;
		    $config['max_height']           = 4000;
		    $config['file_name'] = $nmfile;
	 
			$this->load->library('upload', $config);
			$x = "f_".$i;
			if (!$this->upload->do_upload($x)){
	    		$this->session->set_flashdata("warning", "Foto ke-".$i."<br>".$this->upload->display_errors());
		    	redirect('c_kegiatan/tambah_laporan_kegiatan/'.$id_rab.'/'.$id_kg.'/'.$lokasi_kg);
			}else{
	        	$gbr = $this->upload->data();
				$data = array('upload_data' => $this->upload->data());
		        $foto[]= $gbr['file_name'];
			}
		}
		if(count($foto)==3){
			$data = array(
				'id_detail_kg'=>$id_detail,
				'volume_kg'=>$volume,
				'kondisi_awal'=>$k_awal,
				'kondisi_akhir'=>$k_akhir,
				'foto_sebelum'=>$foto[0],
				'foto_progres'=>$foto[1],
				'foto_sesudah'=>$foto[2]
			);
		    $this->M_kegiatan->input_data($data,'tbl_laporan_kg');
			$data_update = array(
				'status_kg' =>14
			);
			$where = "id_detail_kg ='".$id_detail."'";
			$this->M_kegiatan->update_data($where,$data_update,'tbl_detail_kegiatan_rab');
	    	$this->session->set_flashdata('info','Disimpan!');
		    redirect('c_kegiatan/daftar_laporan_kg');
		}else{
	    	$this->session->set_flashdata("warning", "Gagal!");
	    	redirect('c_kegiatan/tambah_laporan_kegiatan/'.$id_rab.'/'.$id_kg.'/'.$lokasi_kg);
	    }
	}
	function edit_laporan_kegiatan($id_rab,$id_kg,$lokasi_kg){ 
		$lokasi = urldecode($lokasi_kg);
        $data['title']= "Edit";
		$data['kegiatan'] = $this->M_kegiatan->get_edit_kegiatan($id_rab,$id_kg,$lokasi);  
        $data['content']= "page/kegiatan/V_edit_laporan_kg";	
        $this->load->view('page/Main',$data);	
	}
	function ac_edit_laporan($id_rab,$id_kg,$lokasi_kg){
		$lokasi = urldecode($lokasi_kg);
		$id_detail = $this->input->post('id_detail_kg');
		$volume = $this->input->post('volume');
		$k_awal = $this->input->post('k_awal');
		$k_akhir = $this->input->post('k_akhir');
		$foto=array();

		for($i=1;$i<=3;$i++){
		    $nmfile = $id_detail."_".time();
		    $config['upload_path']          = './assets/dist/kegiatan/';
		    $config['allowed_types']        = 'gif|jpg|png';
		    $config['max_size']             = 2048;
		    $config['max_width']            = 6000;
		    $config['max_height']           = 4000;
		    $config['file_name'] = $nmfile;
	 
			$this->load->library('upload', $config);
			$x = "f_".$i;
			$pic = $this->input->post('pic_lama'.$i);
			if($_FILES['f_'.$i]['name']==""){//jika kosong
				$foto[]=$this->input->post('pic_lama'.$i);
			}else{
				if (!$this->upload->do_upload($x)){
		    		$this->session->set_flashdata("warning", "Foto ke-".$i."<br>".$this->upload->display_errors());
			    	redirect('c_kegiatan/edit_laporan_kegiatan/'.$id_rab.'/'.$id_kg.'/'.$lokasi);
				}else{
		        	$gbr = $this->upload->data();
					$data = array('upload_data' => $this->upload->data());
			        $foto[]= $gbr['file_name'];
			        unlink('./assets/dist/kegiatan/'.$pic);
				}
			}
		}
		if(count($foto)==3){
			$data = array(
				'volume_kg'=>$volume,
				'kondisi_awal'=>$k_awal,
				'kondisi_akhir'=>$k_akhir,
				'foto_sebelum'=>$foto[0],
				'foto_progres'=>$foto[1],
				'foto_sesudah'=>$foto[2]
			);
			$where = "id_detail_kg ='".$id_detail."'";
			$this->M_kegiatan->update_data($where,$data,'tbl_laporan_kg');
	    	$this->session->set_flashdata('info','Disimpan!');
		    redirect('c_kegiatan/daftar_laporan_kg');
		}else{
	    	$this->session->set_flashdata("warning", "Gagal!");
	    	redirect('c_kegiatan/edit_laporan_kegiatan/'.$id_rab.'/'.$id_kg.'/'.$lokasi_kg);
	    }
	}
	function rincian_laporan_kegiatan($id_rab,$id_kg,$lokasi_kg){ 
		$lokasi = urldecode($lokasi_kg);
        $data['title']= "Rincian";
		$data['kegiatan'] = $this->M_kegiatan->get_rincian_laporan($id_rab,$id_kg,$lokasi);  
        $data['content']= "page/kegiatan/V_rincian_laporan_kg";	
        $this->load->view('page/Main',$data);	
	}
}
