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
		$year = date('Y');
		$dari = date('Y-m-d');
		$sampai = date('Y-m-d', strtotime($dari. ' - 7 days'));
		$data = $this->db->select('nama_kar, (tgl_mulai_kerja + INTERVAL 2 YEAR) AS tanggal')
						 ->where('(YEAR(tgl_mulai_kerja)+2)', $year)
						 ->order_by('tgl_mulai_kerja', 'DESC')
						 ->get('cms_sp_pegawai')->result();
						 
		$this->view('show_event', array('data'=>$data), "simpeg_stmik_pemberitahuan");
		}
		

}