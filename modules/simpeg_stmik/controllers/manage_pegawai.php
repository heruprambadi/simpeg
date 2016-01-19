<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Manage_Pegawai
 *
 * @author No-CMS Module Generator
 */
class Manage_Pegawai extends CMS_Priv_Strict_Controller {

	protected $URL_MAP = array();

	public function index(){
        $crud = $this->new_crud();
        // /$crud->set_theme('datatables');
        $crud->unset_jquery();
        $crud->unset_print();
        $crud->unset_export();

        //Add Action
        $crud->add_action('Buat SK Kontrak', base_url().'/assets/icon/skkon.png', base_url().'simpeg_stmik/manage_pegawai/generate_skkon/');
        $crud->add_action('Buat SK', base_url().'/assets/icon/sk.png', base_url().'simpeg_stmik/manage_pegawai/generate_sk/');
        $crud->add_action('Buat SP', base_url().'/assets/icon/sp.png', base_url().'simpeg_stmik/manage_pegawai/generate_sp/');

        // set model
        $crud->set_model($this->cms_module_path().'/grocerycrud_pegawai_model');

        // adjust groceryCRUD's language to No-CMS's language
        $crud->set_language('indonesian');

        // table name
        $crud->set_table($this->cms_complete_table_name('pegawai'));

        // set subject
        $crud->set_subject('Data Pegawai');
		
		//field type
		$crud->field_type('jk','true_false',array('Wanita','Pria'));
		$crud->field_type('beasiswa','true_false',array('Tidak','Ya'));
		$crud->field_type('gaji_lama','invisible');
		$crud->field_type('gaji_baru','invisible');
		$crud->field_type('gaji','invisible');
		
		//callback column
		$crud->callback_column('tgl_lahir',array($this,'cc_umur'));
		$crud->callback_column('tgl_mulai_kerja',array($this,'cc_masa_kerja'));
		$crud->callback_column('gaji',array($this,'cc_gaji'));
		$crud->callback_column('nama_kar',array($this,'cc_nama'));
		

        // displayed columns on list
        $crud->columns('nama_kar','tgl_lahir','jk','stt_pegawai','nik','tgl_mulai_kerja','pangkat','tmt_pangkat','jabatan');
        // displayed columns on edit operation
        $crud->edit_fields('nama_kar','tempat_lahir','tgl_lahir','jk','stt_pegawai','nik','tgl_mulai_kerja','pangkat','tmt_pangkat','jabatan','peny_ijazah','gaji_lama', 'gaji_baru', 'id_gaji', 'gaji','beasiswa','lama_studi','rekomendasi');
        // displayed columns on add operation
        $crud->add_fields('nama_kar','tempat_lahir','tgl_lahir','jk','stt_pegawai','nik','tgl_mulai_kerja','pangkat','tmt_pangkat','jabatan','peny_ijazah','gaji_lama', 'gaji_baru', 'id_gaji', 'gaji','beasiswa','lama_studi','rekomendasi');
		$crud->required_fields('nama_kar','tgl_lahir','jk','stt_pegawai','nik','tgl_mulai_kerja','tmt_pangkat','pangkat','id_gaji');
		
        // caption of each columns
        $crud->display_as('nama_kar','Nama Karyawan');
        $crud->display_as('tempat_lahir','Tempat Lahir');
		$crud->display_as('jk','Jenis Kelamin');
        $crud->display_as('stt_pegawai','Status Pegawai');
        $crud->display_as('nik','NIK');
        $crud->display_as('jabatan','Jabatan Saat Ini');
        $crud->display_as('pangkat','Pangkat Saat Ini');
        $crud->display_as('tmt_pangkat','Tanggal Mulai Pangkat');
        $crud->display_as('tgl_lahir','Umur');
        $crud->display_as('tgl_mulai_kerja','Masa Kerja');
		$crud->display_as('tgl_sd_pangkat','Tanggal Habis Pangkat');
        $crud->display_as('sisa_peny_ijazah','Sisa Pot. Peny. Ijazah');
        $crud->display_as('peny_ijazah','Peny. Ijazah');
        $crud->display_as('gaji','Jumlah Gaji');
        $crud->display_as('id_gaji','Jumlah Gaji');
        $crud->display_as('lama_studi', "Lama Studi");
        $crud->display_as('rekomendasi', 'Rekomendasi');
        $crud->display_as('beasiswa', 'Sedang Menerima Beasiswa ?');
        //get state
		$state = $crud->getState();
		if($state == 'add' OR $state == 'edit' OR $state == 'insert_validation' OR $state == 'update_validation'){
  		    $crud->display_as('tgl_mulai_kerja','Tanggal Mulai Kerja');
  		    $crud->display_as('tgl_lahir','Tanggal Lahir');
		}
		if($state == 'add'){
			$crud->set_relation('id_gaji',$this->cms_complete_table_name('mas_gaji'), 'gaji');
		}else{

		}
		if($state == 'add' OR $state == 'edit'){
			$crud->set_relation('id_gaji',$this->cms_complete_table_name('mas_gaji'), 'gaji');
		}else{

		}

		$crud->set_relation('stt_pegawai', $this->cms_complete_table_name('mas_status_pegawai'), 'nama_mas_status_pegawai');
		$crud->set_relation('pangkat', $this->cms_complete_table_name('mas_pangkat'), 'nama_mas_pangkat');
		$crud->set_relation('jabatan', $this->cms_complete_table_name('mas_jabatan'), 'nama_mas_jabatan');
		$crud->set_relation('rekomendasi', $this->cms_complete_table_name('mas_rekomendasi'), 'nama_rekomendasi');

        $crud->callback_before_insert(array($this,'before_insert'));
		$crud->callback_before_update(array($this,'before_update'));
		$crud->callback_before_delete(array($this,'before_delete'));
		//$crud->callback_after_insert(array($this,'after_insert'));
		$crud->callback_after_update(array($this,'after_update'));
		$crud->callback_after_delete(array($this,'after_delete'));

		$output = $crud->render();
        $this->view($this->cms_module_path().'/manage_pegawai_view', $output,
            $this->cms_complete_navigation_name('manage_pegawai'));

    }

    public function pend($id=NULL){
        $crud = $this->new_crud();
        $crud->where('fk_id_pegawai',$id);
        // /$crud->set_theme('datatables');
        $crud->unset_jquery();
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_back_to_list();

        // set model
        $crud->set_model($this->cms_module_path().'/grocerycrud_pegawai_model');

        // adjust groceryCRUD's language to No-CMS's language
        $crud->set_language('indonesian');

        // table name
        $crud->set_table($this->cms_complete_table_name('pendidikan'));

        // set subject
        $crud->set_subject('Data Pendidikan');
        
        //Field Type
        $crud->field_type('fk_id_pegawai', 'hidden', $id);

        // displayed columns on list
        $crud->columns('fk_id_pegawai','fk_id_mas_pend','nama_tempat_belajar','tahun','ipk','dari_tanggal','sampai_tanggal');
        // displayed columns on edit operation
        $crud->edit_fields('fk_id_pegawai','fk_id_mas_pend','nama_tempat_belajar','tahun','ipk','dari_tanggal','sampai_tanggal');
        // displayed columns on add operation
        $crud->add_fields('fk_id_pegawai','fk_id_mas_pend','nama_tempat_belajar','tahun','ipk','dari_tanggal','sampai_tanggal');

        // caption of each columns
        $crud->display_as('fk_id_pegawai','Nama Karyawan');
        $crud->display_as('fk_id_mas_pend','Tingkat Pendidikan');
        $crud->display_as('nama_tempat_belajar','Tempat Belajar');
        $crud->display_as('tahun','Tahun');
        $crud->display_as('ipk','IPK/NIM');
        $crud->display_as('dari_tanggal','Dari Tanggal');
        $crud->display_as('sampai_tanggal','Sampai Tanggal');
        
        //set relation
        $crud->set_relation('fk_id_pegawai',$this->cms_complete_table_name('pegawai'), 'nama_kar');
        $crud->set_relation('fk_id_mas_pend', $this->cms_complete_table_name('mas_pend'), 'nama_mas_pend');

        $output = $crud->render();
        $this->view($this->cms_module_path().'/personal/index', $output,
            $this->cms_complete_navigation_name('view_pend'));
    }

    public function generate_sk($id=0){
		$this->load->library('PHPWord');
		$this->load->helper('util');
		$date = date('Y-m-d_H-i-s');
		//if ($id==0);
		$data = $this->db->where('id_pegawai',$id)
						 ->where('nama_event','Naik Gaji')
						 ->join('cms_sp_event', 'fk_id_pegawai=id_pegawai', 'left')
						 ->join('cms_sp_mas_pangkat', 'id_mas_pangkat=pangkat', 'left')
						 ->join('cms_sp_mas_status_pegawai', 'id_mas_status_pegawai=stt_pegawai', 'left')
						 ->join('cms_sp_mas_jabatan', 'id_mas_jabatan=jabatan', 'left')
						 ->get('cms_sp_pegawai')->result();
					 
		$param['data'] = $data;
		$param['id_pegawai'] = $id;
		$PHPWord = new PHPWord();
		foreach ($data as $d):
		//Gaji
		$hitung_gaji_baru = ((($d->gaji)*0.75)+($d->gaji));
		$gaji_lama = $this->cc_gaji($d->gaji,'');
		$gaji_baru = $this->cc_gaji($hitung_gaji_baru,'');

		//Lama Kerja
		$date1 = new DateTime('NOW');
		$date2 = new DateTime($d->tgl_mulai_kerja);
        $interval = date_diff($date1, $date2);
        $lama_studi = $d->lama_studi;
		$rekomendasi = $d->rekomendasi;
		$pangkat_baru = $interval->y;
		/////////////////////////Pemotongan/////////////////////////////////
		if($rekomendasi == '1'){
			$konsekwensi = (2 * $lama_studi) + 1 - (4 - ($interval->y));
		}elseif($rekomendasi == '2'){
			$konsekwensi = (2 * $lama_studi) + 1 - (3 - ($interval->y));
		}elseif($rekomendasi == '3'){
			$konsekwensi = (2 * $lama_studi) + 1;
		}else{
			$konsekwensi = 0;
		}

        //Generate Document
		$document = $PHPWord->loadTemplate('assets/docs/sk.docx');
		//$document->setValue('myReplacedValue',$d->nama_kar);
		$document->setValue('nama',$d->nama_kar);
		$document->setValue('status_pegawai', $d->nama_mas_status_pegawai);
		$document->setValue('nama_mas_pangkat', $d->nama_mas_pangkat);
		$document->setValue('nama_mas_jabatan', $d->nama_mas_jabatan);
		$document->setValue('gaji_lama', $gaji_lama);
		$document->setValue('gaji_baru', $gaji_baru);
		$document->setValue('tanggal', tanggal($d->tanggal));
		$document->setValue('now', tanggal('d'));
		$document->setValue('lama_kerja', $interval->y." Tahun");
		$document->setValue('Value2', date('d', strtotime($d->tgl_lahir))."-".date('m', strtotime($d->tgl_lahir))."-".date('Y', strtotime($d->tgl_lahir)));
		$document->setValue('date', date('Y-m-d'));
		$document->setValue('weekday', date('l'));
		$document->setValue('time', date('H:i'));

		////open file////
		$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
		$filename = 'Surat_Keputusan.docx';
		$document->save($filename);

		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.$filename);
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($filename));
		flush();
		readfile($filename);
		unlink($filename); // deletes the temporary file
		exit;
		////end of open file////

		///save file////
		//$document->save('assets/docs/'.$d->nama_kar.'-'.$d->id_pegawai.'.docx');
		//redirect(base_url().'assets/docs/'.$d->nama_kar.'-'.$d->id_pegawai.'.docx', 'assets/manage_pegawai');
		///end of save file////
		endforeach;
	}

	public function generate_skkon($id=0){
		$this->load->library('PHPWord');
		$this->load->helper('util');
		$date = date('Y-m-d_H-i-s');
		//if ($id==0);
		$data = $this->db->where('id_pegawai',$id)
						 ->where('nama_event','Naik Gaji')
						 ->join('cms_sp_event', 'fk_id_pegawai=id_pegawai', 'left')
						 ->join('cms_sp_mas_pangkat', 'id_mas_pangkat=pangkat', 'left')
						 ->join('cms_sp_mas_status_pegawai', 'id_mas_status_pegawai=stt_pegawai', 'left')
						 ->join('cms_sp_mas_jabatan', 'id_mas_jabatan=jabatan', 'left')
						 ->get('cms_sp_pegawai')->result();
					 
		$param['data'] = $data;
		$param['id_pegawai'] = $id;
		$PHPWord = new PHPWord();
		foreach ($data as $d):
		//Gaji
		$hitung_gaji_baru = ((($d->gaji)*0.75)+($d->gaji));
		$gaji_lama = $this->cc_gaji($d->gaji,'');
		$gaji_baru = $this->cc_gaji($hitung_gaji_baru,'');

		//Lama Kerja
		$date1 = new DateTime('NOW');
		$date2 = new DateTime($d->tgl_mulai_kerja);
        $interval = date_diff($date1, $date2);
        $lama_studi = $d->lama_studi;
		$rekomendasi = $d->rekomendasi;
		$pangkat_baru = $interval->y;
		/////////////////////////Pemotongan/////////////////////////////////
		if($rekomendasi == '1'){
			$konsekwensi = (2 * $lama_studi) + 1 - (4 - ($interval->y));
		}elseif($rekomendasi == '2'){
			$konsekwensi = (2 * $lama_studi) + 1 - (3 - ($interval->y));
		}elseif($rekomendasi == '3'){
			$konsekwensi = (2 * $lama_studi) + 1;
		}else{
			$konsekwensi = 0;
		}

        //Generate Document
		$document = $PHPWord->loadTemplate('assets/docs/skkon.docx');
		//$document->setValue('myReplacedValue',$d->nama_kar);
		$document->setValue('nama',$d->nama_kar);
		$document->setValue('status_pegawai', $d->nama_mas_status_pegawai);
		$document->setValue('nama_mas_pangkat', $d->nama_mas_pangkat);
		$document->setValue('nama_mas_jabatan', $d->nama_mas_jabatan);
		$document->setValue('gaji_lama', $gaji_lama);
		$document->setValue('gaji_baru', $gaji_baru);
		$document->setValue('tanggal', tanggal($d->tgl_mulai_kerja));
		$document->setValue('now', tanggal('d'));
		$document->setValue('lama_kerja', $interval->y." Tahun");
		$document->setValue('Value2', date('d', strtotime($d->tgl_lahir))."-".date('m', strtotime($d->tgl_lahir))."-".date('Y', strtotime($d->tgl_lahir)));
		$document->setValue('date', date('Y-m-d'));
		$document->setValue('weekday', date('l'));
		$document->setValue('time', date('H:i'));

		////open file////
		$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
		$filename = 'Surat_Keputusan.docx';
		$document->save($filename);

		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.$filename);
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($filename));
		flush();
		readfile($filename);
		unlink($filename); // deletes the temporary file
		exit;
		////end of open file////
		
		///save file///
	/*	$document->save('assets/docs/'.$d->nama_kar.'-'.$d->id_pegawai.'.docx');
		redirect(base_url().'assets/docs/'.$d->nama_kar.'-'.$d->id_pegawai.'.docx', 'assets/manage_pegawai');*/
		///end of save file///
		endforeach;
	}

    public function before_insert($post_array){

    	return TRUE;
	}

	public function after_insert($post_array, $primary_key){
		$now = date('Y-m-d');
		$year = date('Y');
		$jlh = $this->db->count_all('cms_sp_mas_pangkat');
		$nama_ev_pangkat = 'ev_pangkat_'.$primary_key;
		$nama_ev_gaji = 'ev_gaji_'.$primary_key;
		$nama_upd_pangkat = 'ev_upd_pangkat'.$primary_key;
		$nama_upd_gaji = 'ev_upd_gaji'.$primary_key;
		$array_naik = explode('/',$post_array['tmt_pangkat']);
		$tgl_naik_pangkat = ($array_naik[2]+4).'-'.$array_naik[1].'-'.$array_naik[0];
		$tgl_naik_gaji = ($array_naik[2]+2).'-'.$array_naik[1].'-'.$array_naik[0];
		$lama_studi = $post_array['lama_studi'];
		$rekomendasi = $post_array['rekomendasi'];
		$pangkat_baru = $post_array['pangkat'];

		/*$pangkat = array(
        "fk_id_pegawai" => $primary_key,
        "nama_event" => 'Naik Pangkat',
        "tanggal" => $wkp,
        "pangkat_baru" => $pangkat_baru + 1
        );
        $gaji = array(
        "fk_id_pegawai" => $primary_key,
        "nama_event" => 'Naik Gaji',
        "tanggal" => $wkg,
        "pangkat_baru" => $pangkat_baru + 1
        );
        
		$this->db->trans_start();
		$this->db->query($q_update_sampai_pangkat);
		$this->db->query($q_update_gaji);
		$this->db->insert($this->cms_complete_table_name('event'),$pangkat);
        $this->db->insert($this->cms_complete_table_name('event'),$gaji);
		$this->db->trans_complete();*/
		return TRUE;
	}


	public function before_update($post_array, $primary_key){
		$post_array['gaji_baru'] = $post_array['gaji'];
    	return $post_array;
	}

	public function after_update($post_array, $primary_key){
		$now = date(Y-m-d);
		$year = date('Y');
		$jlh = $this->db->count_all('cms_sp_mas_pangkat');
		$nama_ev_pangkat = 'ev_pangkat_'.$primary_key;
		$nama_ev_gaji = 'ev_gaji_'.$primary_key;
		$nama_upd_pangkat = 'ev_upd_pangkat'.$primary_key;
		$nama_upd_gaji = 'ev_upd_gaji'.$primary_key;
		$array_naik = explode('/',$post_array['tmt_pangkat']);
		$tgl_naik_pangkat = ($array_naik[2]+4).'-'.$array_naik[1].'-'.$array_naik[0];
		$tgl_naik_gaji = ($array_naik[2]+2).'-'.$array_naik[1].'-'.$array_naik[0];
		$lama_studi = $post_array['lama_studi'];
		$rekomendasi = $post_array['rekomendasi'];
		$pangkat_baru = $post_array['pangkat'];
		
		
		return TRUE;
	}

	public function before_delete($primary_key){

		return TRUE;
	}

	public function after_delete($primary_key){
		/*$event_p = 'ev_pangkat_'.$primary_key;
		$event_g = 'ev_gaji_'.$primary_key;
		$del_pang = "DROP EVENT $event_p";
		$del_gaji = "DROP EVENT $event_g";
		$this->db->delete('cms_sp_pendidikan', array('fk_id_pegawai' => $primary_key)); 
		$this->db->delete('cms_sp_his_pangkat', array('fk_id_pegawai' => $primary_key)); 
		$this->db->delete('cms_sp_lampiran', array('fk_id_pegawai' => $primary_key)); 
		$this->db->delete('cms_sp_event', array('fk_id_pegawai' => $primary_key)); 
		$this->db->query($del_pang);
		$this->db->query($del_gaji);*/
		return TRUE;
	}
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
        $lama_studi = $row->lama_studi;
		$rekomendasi = $row->rekomendasi;
		$pangkat_baru = $interval->y;
		/////////////////////////Pemotongan/////////////////////////////////
		if($rekomendasi == '1'){
			$konsekwensi = (2 * $lama_studi) + 1 - (4 - ($interval->y));
		}elseif($rekomendasi == '2'){
			$konsekwensi = (2 * $lama_studi) + 1 - (3 - ($interval->y));
		}elseif($rekomendasi == '3'){
			$konsekwensi = (2 * $lama_studi) + 1;
		}else{
			$konsekwensi = 0;
		}
        return (($interval->y)-$konsekwensi)." Tahun";
	}

	public function cc_gaji($value, $row){
		$gaji_koma = number_format($value);
		$gaji_titik = str_replace(",", ".", $gaji_koma);
        return "Rp".$gaji_titik;
	}

	public function cc_nama($value, $row){
		return "<a href='personal/view_bio/$row->id_pegawai'>$value</a>";
	}
}