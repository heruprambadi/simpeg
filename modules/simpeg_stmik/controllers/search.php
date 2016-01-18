<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Manage_Pegawai
 *
 * @author No-CMS Module Generator
 */
class Search extends CMS_Priv_Strict_Controller {

    protected $URL_MAP = array();

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->model('search_model');
    }

    public function index()
    {
        $this->view('search_form', 'simpeg_stmik_cari');
    }

    public function execute_search()
    {
        $tanggal = date('d-m-Y');
        $keyword    =   $this->input->post('keyword');
        $data['results']    =   $this->search_model->search($keyword);
        $this->view('search_results',$data);
    }
}