<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Manage_Pegawai
 *
 * @author No-CMS Module Generator
 */
class Download extends CMS_Controller {

	protected $URL_MAP = array();

	public function jenis_kelamin($id=0){
		$this->load->helper('date');
		$tanggal = date('d-m-Y');
		if($id == 0 || $id == 1){
			$data = $this->db->where('jk', $id)
						 ->join('cms_sp_mas_status_pegawai','id_mas_status_pegawai=stt_pegawai','left')
						 ->join('cms_sp_mas_pangkat','id_mas_pangkat=pangkat','left')
						 ->join('cms_sp_mas_rekomendasi','id_rekomendasi=rekomendasi','left')
						 ->get('cms_sp_pegawai')->result();
		}elseif($id == 2){
			$data = $this->db->join('cms_sp_mas_status_pegawai','id_mas_status_pegawai=stt_pegawai','left')
						 ->join('cms_sp_mas_pangkat','id_mas_pangkat=pangkat','left')
						 ->join('cms_sp_mas_rekomendasi','id_rekomendasi=rekomendasi','left')
						 ->get('cms_sp_pegawai')->result();
		}
		
		$this->load->view('download/jenis_kelamin', array('id'=>$id,'tanggal'=>$tanggal,'data'=>$data));
	}

	public function status($id=0){
		$this->load->helper('date');
		$tanggal = date('d-m-Y');
		if($id != 0){
			$data = $this->db->where('stt_pegawai', $id)
						 ->join('cms_sp_mas_status_pegawai','id_mas_status_pegawai=stt_pegawai','left')
						 ->join('cms_sp_mas_pangkat','id_mas_pangkat=pangkat','left')
						 ->join('cms_sp_mas_rekomendasi','id_rekomendasi=rekomendasi','left')
						 ->get('cms_sp_pegawai')->result();
		}else{
			$data = $this->db->join('cms_sp_mas_status_pegawai','id_mas_status_pegawai=stt_pegawai','left')
						 ->join('cms_sp_mas_pangkat','id_mas_pangkat=pangkat','left')
						 ->join('cms_sp_mas_rekomendasi','id_rekomendasi=rekomendasi','left')
						 ->get('cms_sp_pegawai')->result();
		}
		
		$status = $this->db->select('*')
						   ->get('cms_sp_mas_status_pegawai')->result();
		$status_pilih = $this->db->select('*')
								 ->where('id_mas_status_pegawai', $id)
								 ->get('cms_sp_mas_status_pegawai')->result();
		$this->load->view('download/status', array('id'=>$id,'tanggal'=>$tanggal,'data'=>$data, 'status'=>$status, 'status_pilih'=>$status_pilih));
	}

	public function pangkat($id=0){
		$this->load->helper('date');
		$tanggal = date('d-m-Y');
		if($id != 0){
			$data = $this->db->where('pangkat', $id)
						 ->join('cms_sp_mas_status_pegawai','id_mas_status_pegawai=stt_pegawai','left')
						 ->join('cms_sp_mas_pangkat','id_mas_pangkat=pangkat','left')
						 ->join('cms_sp_mas_rekomendasi','id_rekomendasi=rekomendasi','left')
						 ->get('cms_sp_pegawai')->result();
		}else{
			$data = $this->db->join('cms_sp_mas_status_pegawai','id_mas_status_pegawai=stt_pegawai','left')
						 ->join('cms_sp_mas_pangkat','id_mas_pangkat=pangkat','left')
						 ->join('cms_sp_mas_rekomendasi','id_rekomendasi=rekomendasi','left')
						 ->get('cms_sp_pegawai')->result();
		}
		
		$pangkat = $this->db->select('*')
						 ->get('cms_sp_mas_pangkat')->result();
		$pangkat_pilih = $this->db->select('*')
								  ->where('id_mas_pangkat', $id)
						 ->get('cms_sp_mas_pangkat')->result();
		$this->load->view('download/pangkat', array('id'=>$id,'tanggal'=>$tanggal,'data'=>$data, 'pangkat'=>$pangkat, 'pangkat_pilih'=>$pangkat_pilih));
	}

	public function his_pangkat(){
		$this->load->helper('date');
		$tanggal = date('d-m-Y');
		$data = $this->db->join('cms_sp_pegawai','id_pegawai=fk_id_pegawai','left')
						 ->join('cms_sp_mas_pangkat','id_mas_pangkat=fk_id_mas_pangkat','left')
						 ->order_by('fk_id_pegawai', 'ASC')
						 ->order_by('fk_id_mas_pangkat', 'ASC')
						 ->get('cms_sp_his_pangkat')->result();
		$this->load->view('download/his_pangkat', array('tanggal'=>$tanggal,'data'=>$data));
	}
}