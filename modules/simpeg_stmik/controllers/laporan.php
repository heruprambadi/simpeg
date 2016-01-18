<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Manage_Pegawai
 *
 * @author No-CMS Module Generator
 */
class Laporan extends CMS_Priv_Strict_Controller {

	protected $URL_MAP = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
	
    }

    public function jenis_kelamin($id=2){
    	$crud = $this->new_crud();
        if($id == 0 || $id == 1){
            $crud->where('jk', $id);
            $crud->set_table($this->cms_complete_table_name('pegawai'));
        }else{
            $crud->set_table($this->cms_complete_table_name('pegawai'));
            $crud->unset_export();
        }
        //$crud->set_theme('datatables');
        $crud->unset_jquery()
        	 ->unset_print()
        	 ->unset_add()
        	 ->unset_edit()
        	 ->unset_delete();

        //Custom URL
        $crud->custom_export_url = 'simpeg_stmik/download/jenis_kelamin/'.$id;

        // set model
        $crud->set_model($this->cms_module_path().'/grocerycrud_pegawai_model');

        // adjust groceryCRUD's language to No-CMS's language
        $crud->set_language('indonesian');

        // set subject
        $crud->set_subject('Data Pegawai');
		
		//callback column
		$crud->callback_column('tgl_lahir',array($this,'cc_umur'));
		$crud->callback_column('tgl_mulai_kerja',array($this,'cc_masa_kerja'));
		$crud->callback_column('gaji',array($this,'cc_gaji'));
		

        // displayed columns on list
        $crud->columns('nama_kar','tgl_lahir','stt_pegawai','nik','tgl_mulai_kerja','pangkat','tmt_pangkat','gaji');
        
        // caption of each columns
        $crud->display_as('nama_kar','Nama Karyawan');
        $crud->display_as('tgl_lahir','Umur');
        $crud->display_as('tgl_mulai_kerja','Masa Kerja');
        $crud->display_as('tempat_lahir','Tempat Lahir');
        $crud->display_as('stt_pegawai','Status Pegawai');
        $crud->display_as('nik','NIK');
        $crud->display_as('pangkat','Pangkat');
        $crud->display_as('tmt_pangkat','Tanggal Mulai Pangkat');
		$crud->display_as('tgl_sd_pangkat','Tanggal Habis Pangkat');
        $crud->display_as('sisa_peny_ijazah','Sisa Pot. Peny. Ijazah');
        $crud->display_as('peny_ijazah','Peny. Ijazah');
        $crud->display_as('gaji','Jumlah Gaji');
        $crud->display_as('lama_studi', "Lama Studi");
        $crud->display_as('rekomendasi', 'Rekomendasi');
        $crud->display_as('beasiswa', 'Sedang Menerima Beasiswa ?');

        //Relation
		$crud->set_relation('stt_pegawai', $this->cms_complete_table_name('mas_status_pegawai'), 'nama_mas_status_pegawai');
		$crud->set_relation('pangkat', $this->cms_complete_table_name('mas_pangkat'), 'nama_mas_pangkat');
		$crud->set_relation('rekomendasi', $this->cms_complete_table_name('mas_rekomendasi'), 'nama_rekomendasi');
        $output = $crud->render();
        $output->id = $id;
        $this->view($this->cms_module_path().'/laporan/jenis_kelamin', $output, 'simpeg_stmik_lap_jk');

    }

    public function pangkat($id=NULL){
    	$crud = $this->new_crud();
        $pangkat = $this->db->select('*')
						    ->get('cms_sp_mas_pangkat')->result();

        if($id != 0){
            $crud->where('pangkat', $id);
            $crud->set_table($this->cms_complete_table_name('pegawai'));
        }else{
            $crud->set_table($this->cms_complete_table_name('pegawai'));
            $crud->unset_export();
        }
        //$crud->set_theme('datatables');
        $crud->unset_jquery()
        	 ->unset_print()
        	 ->unset_add()
        	 ->unset_edit()
        	 ->unset_delete();

        //Custom URL
        $crud->custom_export_url = 'simpeg_stmik/download/pangkat/'.$id;

        // adjust groceryCRUD's language to No-CMS's language
        $crud->set_language('indonesian');

        // set subject
        $crud->set_subject('Data Pegawai');
		
		//callback column
		$crud->callback_column('tgl_lahir',array($this,'cc_umur'));
		$crud->callback_column('tgl_mulai_kerja',array($this,'cc_masa_kerja'));
		$crud->callback_column('gaji',array($this,'cc_gaji'));
		

        // displayed columns on list
        $crud->columns('nama_kar','tgl_lahir','jk','stt_pegawai','nik','tgl_mulai_kerja','pangkat','tmt_pangkat','gaji');
        
        // caption of each columns
        $crud->display_as('nama_kar','Nama Karyawan');
        $crud->display_as('tgl_lahir','Umur');
        $crud->display_as('tgl_mulai_kerja','Masa Kerja');
        $crud->display_as('tempat_lahir','Tempat Lahir');
		$crud->display_as('jk','Jenis Kelamin');
        $crud->display_as('stt_pegawai','Status Pegawai');
        $crud->display_as('nik','NIK');
        $crud->display_as('pangkat','Pangkat');
        $crud->display_as('tmt_pangkat','Tanggal Mulai Pangkat');
		$crud->display_as('tgl_sd_pangkat','Tanggal Habis Pangkat');
        $crud->display_as('sisa_peny_ijazah','Sisa Pot. Peny. Ijazah');
        $crud->display_as('peny_ijazah','Peny. Ijazah');
        $crud->display_as('gaji','Jumlah Gaji');
        $crud->display_as('lama_studi', "Lama Studi");
        $crud->display_as('rekomendasi', 'Rekomendasi');
        $crud->display_as('beasiswa', 'Sedang Menerima Beasiswa ?');

        //Relation
		$crud->set_relation('stt_pegawai', $this->cms_complete_table_name('mas_status_pegawai'), 'nama_mas_status_pegawai');
		$crud->set_relation('pangkat', $this->cms_complete_table_name('mas_pangkat'), 'nama_mas_pangkat');
		$crud->set_relation('rekomendasi', $this->cms_complete_table_name('mas_rekomendasi'), 'nama_rekomendasi');
		$crud->set_relation('jk', $this->cms_complete_table_name('mas_jk'), 'nama_mas_jk');
        $output = $crud->render();
        $output->pangkat = $pangkat;
        $output->id = $id;
        $this->view($this->cms_module_path().'/laporan/pangkat', $output, 'simpeg_stmik_lap_pangkat');

    }

    public function status($id=NULL){
        $crud = $this->new_crud();
        
        $status = $this->db->select('*')
                           ->get('cms_sp_mas_status_pegawai')->result();
        if($id != 0){
            $crud->where('stt_pegawai', $id);
            $crud->set_table($this->cms_complete_table_name('pegawai'));
        }else{
            $crud->set_table($this->cms_complete_table_name('pegawai'));
            $crud->unset_export();
        }
        //$crud->set_theme('datatables');
        $crud->unset_jquery()
             ->unset_print()
             ->unset_add()
             ->unset_edit()
             ->unset_delete();

        //Custom URL
        $crud->custom_export_url = 'simpeg_stmik/download/status/'.$id;

        // set model
        $crud->set_model($this->cms_module_path().'/grocerycrud_pegawai_model');

        // adjust groceryCRUD's language to No-CMS's language
        $crud->set_language('indonesian');

        // set subject
        $crud->set_subject('Data Pegawai');
        
        //callback column
        $crud->callback_column('tgl_lahir',array($this,'cc_umur'));
        $crud->callback_column('tgl_mulai_kerja',array($this,'cc_masa_kerja'));
        $crud->callback_column('gaji',array($this,'cc_gaji'));
        

        // displayed columns on list
        $crud->columns('nama_kar','tgl_lahir','jk','stt_pegawai','nik','tgl_mulai_kerja','pangkat','tmt_pangkat','gaji');
        
        // caption of each columns
        $crud->display_as('nama_kar','Nama Karyawan');
        $crud->display_as('tgl_lahir','Umur');
        $crud->display_as('tgl_mulai_kerja','Masa Kerja');
        $crud->display_as('tempat_lahir','Tempat Lahir');
        $crud->display_as('jk','Jenis Kelamin');
        $crud->display_as('stt_pegawai','Status Pegawai');
        $crud->display_as('nik','NIK');
        $crud->display_as('pangkat','Pangkat');
        $crud->display_as('tmt_pangkat','Tanggal Mulai Pangkat');
        $crud->display_as('tgl_sd_pangkat','Tanggal Habis Pangkat');
        $crud->display_as('sisa_peny_ijazah','Sisa Pot. Peny. Ijazah');
        $crud->display_as('peny_ijazah','Peny. Ijazah');
        $crud->display_as('gaji','Jumlah Gaji');
        $crud->display_as('lama_studi', "Lama Studi");
        $crud->display_as('rekomendasi', 'Rekomendasi');
        $crud->display_as('beasiswa', 'Sedang Menerima Beasiswa ?');

        //Relation
        $crud->set_relation('stt_pegawai', $this->cms_complete_table_name('mas_status_pegawai'), 'nama_mas_status_pegawai');
        $crud->set_relation('pangkat', $this->cms_complete_table_name('mas_pangkat'), 'nama_mas_pangkat');
        $crud->set_relation('rekomendasi', $this->cms_complete_table_name('mas_rekomendasi'), 'nama_rekomendasi');
        $crud->set_relation('jk', $this->cms_complete_table_name('mas_jk'), 'nama_mas_jk');
        $output = $crud->render();
        $output->status = $status;
        $output->id = $id;
        $this->view($this->cms_module_path().'/laporan/status', $output, 'simpeg_stmik_lap_stt');

    }

    public function his_pangkat(){
        $crud = $this->new_crud();
        $pangkat = $this->db->select('*')
                            ->get('cms_sp_mas_pangkat')->result();
        $crud->set_table($this->cms_complete_table_name('his_pangkat'));

        $crud->unset_jquery()
             ->unset_print()
             ->unset_add()
             ->unset_edit()
             ->unset_delete();

        //Custom URL
        $crud->custom_export_url = 'simpeg_stmik/download/his_pangkat/';

        // adjust groceryCRUD's language to No-CMS's language
        $crud->set_language('indonesian');

        // displayed columns on list
        $crud->columns('fk_id_pegawai','fk_id_mas_pangkat','dari_tgl','sampai_tgl');
        
        // caption of each columns
        $crud->display_as('fk_id_pegawai','Nama Karyawan');
        $crud->display_as('fk_id_mas_pangkat','Pangkat');
        $crud->display_as('dari_tgl','Dari Tanggal');
        $crud->display_as('sampai_tgl','Sampai Tanggal');

        //Relation
        $crud->set_relation('fk_id_pegawai', $this->cms_complete_table_name('pegawai'), 'nama_kar');
        $crud->set_relation('fk_id_mas_pangkat', $this->cms_complete_table_name('mas_pangkat'), 'nama_mas_pangkat');

        $output = $crud->render();
        $output->pangkat = $pangkat;
        $this->view($this->cms_module_path().'/laporan/his_pangkat', $output, 'simpeg_stmik_lap_his_pang');

    }

	/*public function jenis_kelamin($id=2){
		$tanggal = date('d-m-Y');
		$data = $this->db->where('jk', $id)
						 ->join('cms_sp_mas_status_pegawai','id_mas_status_pegawai=stt_pegawai','left')
						 ->join('cms_sp_mas_pangkat','id_mas_pangkat=pangkat','left')
						 ->join('cms_sp_mas_rekomendasi','id_rekomendasi=rekomendasi','left')
						 ->get('cms_sp_pegawai')->result();
		$this->view('laporan/jenis_kelamin', array('id'=>$id,'tanggal'=>$tanggal,'data'=>$data), 'simpeg_stmik_lap_jk');
	}

	public function status($id=0){
		$tanggal = date('d-m-Y');
		$data = $this->db->where('stt_pegawai', $id)
						 ->join('cms_sp_mas_status_pegawai','id_mas_status_pegawai=stt_pegawai','left')
						 ->join('cms_sp_mas_pangkat','id_mas_pangkat=pangkat','left')
						 ->join('cms_sp_mas_rekomendasi','id_rekomendasi=rekomendasi','left')
						 ->get('cms_sp_pegawai')->result();
		$status = $this->db->select('*')
						   ->get('cms_sp_mas_status_pegawai')->result();
		$status_pilih = $this->db->select('*')
								 ->where('id_mas_status_pegawai', $id)
								 ->get('cms_sp_mas_status_pegawai')->result();
		$this->view('laporan/status', array('id'=>$id,'tanggal'=>$tanggal,'data'=>$data, 'status'=>$status, 'status_pilih'=>$status_pilih), 'simpeg_stmik_lap_stt');
	}

	public function pangkat($id=0){
		$tanggal = date('d-m-Y');
		$data = $this->db->where('pangkat', $id)
						 ->join('cms_sp_mas_status_pegawai','id_mas_status_pegawai=stt_pegawai','left')
						 ->join('cms_sp_mas_pangkat','id_mas_pangkat=pangkat','left')
						 ->join('cms_sp_mas_rekomendasi','id_rekomendasi=rekomendasi','left')
						 ->get('cms_sp_pegawai')->result();
		$pangkat = $this->db->select('*')
						    ->get('cms_sp_mas_pangkat')->result();
		$pangkat_pilih = $this->db->select('*')
								  ->where('id_mas_pangkat', $id)
								  ->get('cms_sp_mas_pangkat')->result();
		$this->view('laporan/pangkat', array('id'=>$id,'tanggal'=>$tanggal,'data'=>$data, 'pangkat'=>$pangkat, 'pangkat_pilih'=>$pangkat_pilih), 'simpeg_stmik_lap_pangkat');
	}*/

	public function cc_umur($value, $row){
		$date1 = new DateTime('NOW');
		$date2 = new DateTime($value);
        $interval = date_diff($date1, $date2);
        error_log( "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days ");
        return $interval->y." Tahun";
	}
	
	public function cc_masa_kerja($value, $row){
		$date1 = new DateTime('NOW');
		$date2 = new DateTime($value);
        $interval = date_diff($date1, $date2);
        error_log( "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days ");
        return $interval->y." Tahun";
	}
	
	public function cc_gaji($value, $row){
		$gaji_koma = number_format($value);
		$gaji_titik = str_replace(",", ".", $gaji_koma);
        return "Rp".$gaji_titik;
	}
}