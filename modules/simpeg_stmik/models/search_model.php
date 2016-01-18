<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    function search($keyword)
    {
        $this->db->like('nama_kar',$keyword)
                 ->join('cms_sp_mas_status_pegawai','id_mas_status_pegawai=stt_pegawai','left')
                 ->join('cms_sp_mas_pangkat','id_mas_pangkat=pangkat','left')
                 ->join('cms_sp_mas_rekomendasi','id_rekomendasi=rekomendasi','left');
        $query  =   $this->db->get('cms_sp_pegawai');
        return $query->result();
    }
}   