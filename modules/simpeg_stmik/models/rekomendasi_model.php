<?php
class rekomendasi_model extends CI_Model  {
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

        public function get_rekomendasi($table, $year)
	{
		$this->db->select('*');
		$this->db->where('year', $year);
                $this->db->order_by('id desc');
		return $this->db->get($table);
	}


}