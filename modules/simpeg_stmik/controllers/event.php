<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Manage_Mas_Pangkat
 *
 * @author No-CMS Module Generator
 */
class Event extends CMS_Controller {

	protected $URL_MAP = array();

	public function index(){
		$this->load->helper('date');
		$datestring = date('Y-m-d');
		$datestring2 = date('Y-m-d', strtotime($datestring. ' + 2 days'));
		$data = $this->db->where('tanggal >=', $datestring)
						 ->where('tanggal <=', $datestring2)
						 ->join('cms_sp_pegawai','id_pegawai=fk_id_pegawai','left')
						 ->order_by('tanggal')
						 ->get('cms_sp_event')->result();
						 
		$this->view('show_event', array('data'=>$data, 'datestring'=>$datestring, 'datestring2'=>$datestring2), "simpeg_stmik_pemberitahuan");
		}
		
	

}