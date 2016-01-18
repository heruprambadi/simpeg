<?php

class Event_model extends CI_Model{

			function get_event(){
			$sql = "SELECT nama_event FROM cms_sp_event WHERE tanggal=NOW() + INTERVAL 7 DAY";
			$q = $this->db->query($sql);
			
			if($q->num_rows() > 0){
				foreach ($q->result() as $row){
					$data[] = $row;
					}
					return $data;
				}
			}
		
			
}