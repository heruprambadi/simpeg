<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Manage_Pegawai
 *
 * @author No-CMS Module Generator
 */
class Personal extends CMS_Priv_Strict_Controller {

	protected $URL_MAP = array();

    public function bio($id=NULL){
        $crud = $this->new_crud();
        $crud->where('id_pegawai',$id);
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
        $crud->set_table($this->cms_complete_table_name('pegawai'));

        // set subject
        $crud->set_subject('Data Pegawai');
        
        //field type
        $crud->field_type('jk','true_false',array('Wanita','Pria'));
        $crud->field_type('beasiswa','true_false',array('Tidak','Ya'));
        $crud->field_type('event_name','invisible');
        $crud->field_type('naik_pangkat','invisible');
        $crud->field_type('naik_gaji','invisible');
        
        // displayed columns on list
        $crud->columns('nama_kar','tgl_lahir','jk','stt_pegawai','nik','tgl_mulai_kerja','pangkat','tmt_pangkat','gaji');
        // displayed columns on edit operation
        $crud->edit_fields('nama_kar','tempat_lahir','tgl_lahir','jk','stt_pegawai','nik','tgl_mulai_kerja','pangkat','tmt_pangkat','sisa_peny_ijazah','peny_ijazah','gaji','beasiswa','lama_studi','rekomendasi');
        // displayed columns on add operation
        $crud->add_fields('nama_kar','tempat_lahir','tgl_lahir','jk','stt_pegawai','nik','tgl_mulai_kerja','pangkat','tmt_pangkat','sisa_peny_ijazah','peny_ijazah','gaji','beasiswa','lama_studi','rekomendasi');
        $crud->required_fields('nama_kar','tgl_lahir','jk','stt_pegawai','nik','tgl_mulai_kerja','tmt_pangkat','pangkat','gaji');
        
        // caption of each columns
        $crud->display_as('nama_kar','Nama Karyawan');
        $crud->display_as('tempat_lahir','Tempat Lahir');
        $crud->display_as('jk','Jenis Kelamin');
        $crud->display_as('stt_pegawai','Status Pegawai');
        $crud->display_as('nik','NIK');
        $crud->display_as('pangkat','Pangkat Saat Ini');
        $crud->display_as('tmt_pangkat','Tanggal Mulai Pangkat');
        $crud->display_as('tgl_lahir','Umur');
        $crud->display_as('tgl_mulai_kerja','Masa Kerja');
        $crud->display_as('tgl_sd_pangkat','Tanggal Habis Pangkat');
        $crud->display_as('sisa_peny_ijazah','Sisa Pot. Peny. Ijazah');
        $crud->display_as('peny_ijazah','Peny. Ijazah');
        $crud->display_as('gaji','Jumlah Gaji');
        $crud->display_as('lama_studi', "Lama Studi");
        $crud->display_as('rekomendasi', 'Rekomendasi');
        $crud->display_as('beasiswa', 'Sedang Menerima Beasiswa ?');
        
        $crud->set_relation('stt_pegawai', $this->cms_complete_table_name('mas_status_pegawai'), 'nama_mas_status_pegawai');
        $crud->set_relation('pangkat', $this->cms_complete_table_name('mas_pangkat'), 'nama_mas_pangkat');
        $crud->set_relation('rekomendasi', $this->cms_complete_table_name('mas_rekomendasi'), 'nama_rekomendasi');

        $crud->callback_before_insert(array($this,'before_insert'));
        $crud->callback_before_update(array($this,'before_update'));
        $crud->callback_before_delete(array($this,'before_delete'));
        $crud->callback_after_insert(array($this,'after_insert'));
        $crud->callback_after_update(array($this,'after_update'));
        $crud->callback_after_delete(array($this,'after_delete'));

        $output = $crud->render();
        $this->view($this->cms_module_path().'/personal/index', $output,
            $this->cms_complete_navigation_name('view_bio'));
    }

    public function foto($id=NULL){
        $crud = $this->new_crud();
        $crud->where('id_pegawai',$id);
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
        $crud->set_table($this->cms_complete_table_name('pegawai'));

        // set subject
        $crud->set_subject('Foto Pegawai');
        
        //field type
        $crud->set_field_upload('foto','assets/foto');
        $crud->field_type('id_pegawai', 'invisible');
        
        // displayed columns on edit operation
        $crud->edit_fields('id_pegawai','foto');
        
        // caption of each columns
        $crud->display_as('foto','Foto');

        $output = $crud->render();
        $this->view($this->cms_module_path().'/personal/index', $output,
            $this->cms_complete_navigation_name('view_foto'));
    }

    public function pend($id=NULL){
        $crud = $this->new_crud();
        $crud->where('fk_id_pegawai',$id);
        // /$crud->set_theme('datatables');
        $crud->unset_jquery();
        $crud->unset_print();
        $crud->unset_export();

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
        $crud->columns('fk_id_mas_pend','nama_tempat_belajar','tahun','ipk','dari_tanggal','sampai_tanggal');
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

    public function pangkat($id=NULL){
        $crud = $this->new_crud();
        $crud->where('fk_id_pegawai', $id);
        $crud->field_type('fk_id_pegawai', 'hidden', $id);
        $crud->unset_jquery();

        // set model
        $crud->set_model($this->cms_module_path().'/grocerycrud_his_pangkat_model');

        // adjust groceryCRUD's language to No-CMS's language
        $crud->set_language('indonesian');

        // table name
        $crud->set_table($this->cms_complete_table_name('his_pangkat'));

        // set subject
        $crud->set_subject('Riwayat Pangkat');

        // displayed columns on list
        $crud->columns('fk_id_mas_pangkat','dari_tgl','sampai_tgl');
        // displayed columns on edit operation
        $crud->edit_fields('fk_id_pegawai','fk_id_mas_pangkat','dari_tgl','sampai_tgl');
        // displayed columns on add operation
        $crud->add_fields('fk_id_pegawai','fk_id_mas_pangkat','dari_tgl','sampai_tgl');

        // caption of each columns
        $crud->display_as('fk_id_pegawai','Nama Pegawai');
        $crud->display_as('fk_id_mas_pangkat','Pangkat');
        $crud->display_as('dari_tgl','Dari Tanggal');
        $crud->display_as('sampai_tgl','Sampai Tanggal');

        $crud->set_relation('fk_id_pegawai', $this->cms_complete_table_name('pegawai'), 'nama_kar');
        $crud->set_relation('fk_id_mas_pangkat', $this->cms_complete_table_name('mas_pangkat'), 'nama_mas_pangkat');

        $output = $crud->render();
        $this->view($this->cms_module_path().'/personal/index', $output,
            $this->cms_complete_navigation_name('view_pang'));

    }

    public function lamp($id=NULL){
        $crud = $this->new_crud();
        $crud->where('fk_id_pegawai', $id);
        $crud->unset_jquery();
        $crud->unset_export();
        $crud->unset_print();

        // set model
        $crud->set_model($this->cms_module_path().'/grocerycrud_his_pangkat_model');

        // adjust groceryCRUD's language to No-CMS's language
        $crud->set_language('indonesian');

        // table name
        $crud->set_table($this->cms_complete_table_name('lampiran'));

        // set subject
        $crud->set_subject('Lampiran');

        // displayed columns on list
        $crud->columns('nama_file', 'file_biodata', 'ket');
        $crud->field_type('fk_id_pegawai','hidden',$id);
        
        $crud->display_as('file_biodata','File');
        $crud->set_relation('fk_id_pegawai', $this->cms_complete_table_name('pegawai'), 'nama_kar');

        $crud->set_field_upload('file_biodata','assets/lampiran');
        
        // render
        $output = $crud->render();
        $this->view($this->cms_module_path().'/personal/index', $output,
            $this->cms_complete_navigation_name('view_lamp'));

    }

	public function view_bio($id=NULL){
        $data_form = $this->db->where('id_pegawai',$id)
            ->get('cms_sp_pegawai')->result();
        $this->view($this->cms_module_path().'/personal/bio', array('id'=>$id,'data_form'=>$data_form), $this->cms_complete_navigation_name('manage_pegawai'));
    }

    public function view_foto($id=NULL){
        $data_form = $this->db->where('id_pegawai',$id)
            ->get('cms_sp_pegawai')->result();
        $this->view($this->cms_module_path().'/personal/foto', array('id'=>$id,'data_form'=>$data_form), $this->cms_complete_navigation_name('detail_foto'));
    }

    public function view_pend($id=NULL){
        $data_form = $this->db->where('fk_id_pegawai',$id)
                              ->join('cms_sp_pegawai', 'id_pegawai=fk_id_pegawai', 'left')
                              ->get('cms_sp_pendidikan')->result();
        $data = $this->db->where('id_pegawai',$id)
            ->get('cms_sp_pegawai')->result();
        $this->view($this->cms_module_path().'/personal/pend', array('id'=>$id,'data_form'=>$data_form, 'data'=>$data), $this->cms_complete_navigation_name('detail_pend'));
    }

    public function view_pang($id=NULL){
        $data_form = $this->db->where('fk_id_pegawai',$id)
                              ->join('cms_sp_pegawai', 'id_pegawai=fk_id_pegawai', 'left')
                              ->get('cms_sp_his_pangkat')->result();
        $data = $this->db->where('id_pegawai',$id)
            ->get('cms_sp_pegawai')->result();
        $this->view($this->cms_module_path().'/personal/pang', array('id'=>$id,'data_form'=>$data_form, 'data'=>$data), $this->cms_complete_navigation_name('detail_pang'));
    }

    public function view_lamp($id=NULL){
        $data_form = $this->db->where('fk_id_pegawai',$id)
                              ->join('cms_sp_pegawai', 'id_pegawai=fk_id_pegawai', 'left')
                              ->get('cms_sp_lampiran')->result();
        $data = $this->db->where('id_pegawai',$id)
            ->get('cms_sp_pegawai')->result();
        $this->view($this->cms_module_path().'/personal/lamp', array('id'=>$id,'data_form'=>$data_form, 'data'=>$data), $this->cms_complete_navigation_name('detail_lamp'));
    }

    public function before_insert($post_array){
        return TRUE;
    }

    public function after_insert($post_array, $primary_key){
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
        /////////////////////////Pemotongan/////////////////////////////////
        if($rekomendasi == '1'){
            $konsekwensi = (2 * $lama_studi) + 1 + (4 - ($interval->y));
        }elseif($rekomendasi == '2'){
            $konsekwensi = (2 * $lama_studi) + 1 + (3 - ($interval->y));
        }elseif($rekomendasi == '3'){
            $konsekwensi = (2 * $lama_studi) + 1;
        }else{
            $konsekwensi = 0;
        }
        /////////////////////////End Of Pemotongan/////////////////////////////////

        $q_update_sampai_pangkat = "UPDATE cms_sp_pegawai SET tgl_sd_pangkat = tmt_pangkat + INTERVAL 4 YEAR WHERE id_pegawai = '".$primary_key."' AND pangkat < '".$jlh."'";
        $pangkat = array(
        "fk_id_pegawai" => $primary_key,
        "nama_event" => 'Naik Pangkat',
        "tanggal" => $tgl_naik_pangkat,
        "pangkat_baru" => $pangkat_baru + 1
        );
        $gaji = array(
        "fk_id_pegawai" => $primary_key,
        "nama_event" => 'Naik Gaji',
        "tanggal" => $tgl_naik_gaji,
        "pangkat_baru" => $pangkat_baru + 1
        );
        /////////////////////////////////////////Event////////////////////////////////////////////////////////////
        $q_event_pangkat = "SET GLOBAL event_scheduler = ON;
                            CREATE EVENT $nama_ev_pangkat
                            ON SCHEDULE EVERY $konsekwensi + 10 SECOND
                            STARTS CURRENT_TIMESTAMP + INTERVAL 10 SECOND
                            DO

                                BEGIN
                                INSERT INTO hrm_dev.cms_sp_his_pangkat (fk_id_pegawai, fk_id_mas_pangkat, dari_tgl, sampai_tgl) SELECT cms_sp_pegawai.id_pegawai, cms_sp_pegawai.pangkat, cms_sp_pegawai.tmt_pangkat, cms_sp_pegawai.tgl_sd_pangkat FROM hrm_dev.cms_sp_pegawai WHERE cms_sp_pegawai.id_pegawai = '".$primary_key."' and cms_sp_pegawai.pangkat < '".$jlh."';
                                UPDATE hrm_dev.cms_sp_pegawai SET cms_sp_pegawai.pangkat = cms_sp_pegawai.pangkat + 1, cms_sp_pegawai.tmt_pangkat = cms_sp_pegawai.tmt_pangkat + INTERVAL 4 YEAR, cms_sp_pegawai.tgl_sd_pangkat = cms_sp_pegawai.tgl_sd_pangkat + INTERVAL 4 YEAR WHERE cms_sp_pegawai.id_pegawai = '".$primary_key."' and cms_sp_pegawai.pangkat < '".$jlh."';
                                UPDATE hrm_dev.cms_sp_event SET cms_sp_event.pangkat_baru = cms_sp_event.pangkat_baru + 1, cms_sp_event.tanggal = cms_sp_event.tanggal + INTERVAL 4 YEAR WHERE cms_sp_event.fk_id_pegawai = '".$primary_key."' AND cms_sp_event.nama_event = 'Naik Pangkat' AND cms_sp_event.pangkat_baru < '".$jlh."';
                                END";
        $q_event_gaji = "SET GLOBAL event_scheduler = ON;
                            CREATE EVENT $nama_ev_gaji
                            ON SCHEDULE EVERY $konsekwensi + 10 SECOND
                            STARTS CURRENT_TIMESTAMP + INTERVAL 10 SECOND
                            DO

                                BEGIN
                                UPDATE hrm_dev.cms_sp_pegawai SET cms_sp_pegawai.gaji = cms_sp_pegawai.gaji + (cms_sp_pegawai.gaji * (75/100)) WHERE cms_sp_pegawai.id_pegawai = '".$primary_key."' AND cms_sp_pegawai.tgl_lahir + INTERVAL 60 YEAR >= CURDATE();
                                UPDATE hrm_dev.cms_sp_event SET cms_sp_event.pangkat_baru = cms_sp_event.pangkat_baru + 1, cms_sp_event.tanggal = cms_sp_event.tanggal + INTERVAL 2 YEAR WHERE cms_sp_event.fk_id_pegawai = '".$primary_key."' AND cms_sp_event.nama_event = 'Naik Gaji' AND cms_sp_pegawai.tgl_lahir + INTERVAL 60 YEAR >= CURDATE();
                                END";

        $q_update_event_pangkat = "SET GLOBAL event_scheduler = ON;
                                   CREATE EVENT $nama_upd_pangkat
                                   ON SCHEDULE EVERY 10 SECOND
                                   STARTS CURRENT_TIMESTAMP + INTERVAL 10 SECOND
                                   ENDS CURRENT_TIMESTAMP + INTERVAL 12 SECOND

                                   DO
                                    BEGIN
                                    ALTER EVENT $nama_ev_pangkat
                                    ON SCHEDULE EVERY 30 SECOND
                                    STARTS CURRENT_TIMESTAMP + INTERVAL 30 SECOND;
                                    END";

        $q_update_event_gaji = "SET GLOBAL event_scheduler = ON;
                                CREATE EVENT $nama_upd_gaji
                                ON SCHEDULE EVERY 10 SECOND
                                STARTS CURRENT_TIMESTAMP + INTERVAL 10 SECOND
                                ENDS CURRENT_TIMESTAMP + INTERVAL 12 SECOND

                                DO
                                    BEGIN
                                    ALTER EVENT $nama_ev_gaji
                                    ON SCHEDULE EVERY 30 SECOND
                                    STARTS CURRENT_TIMESTAMP + INTERVAL 30 SECOND;
                                    END";
        /////////////////////////////////////////End Of Event//////////////////////////////////////////////////
        $this->db->trans_start();
        $this->db->query($q_update_sampai_pangkat);
        $this->db->insert($this->cms_complete_table_name('event'),$pangkat);
        $this->db->insert($this->cms_complete_table_name('event'),$gaji);
        $this->db->query($q_event_pangkat);
        $this->db->query($q_event_gaji);
        $this->db->query($q_update_event_pangkat);
        $this->db->query($q_update_event_gaji);
        $this->db->trans_complete();
        return TRUE;
    }


    public function before_update($post_array, $primary_key){
        return TRUE;
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
        /////////////////////////Pemotongan/////////////////////////////////
        if($rekomendasi == '1'){
            $konsekwensi = (2 * $lama_studi) + 1 + (4 - ($interval->y));
        }elseif($rekomendasi == '2'){
            $konsekwensi = (2 * $lama_studi) + 1 + (3 - ($interval->y));
        }elseif($rekomendasi == '3'){
            $konsekwensi = (2 * $lama_studi) + 1;
        }else{
            $konsekwensi = 0;
        }
        /////////////////////////End Of Pemotongan/////////////////////////////////

        $q_update_sampai_pangkat = "UPDATE cms_sp_pegawai SET tgl_sd_pangkat = tmt_pangkat + INTERVAL 4 YEAR WHERE id_pegawai = '".$primary_key."' AND pangkat < '".$jlh."'";
        $pangkat = array(
        "fk_id_pegawai" => $primary_key,
        "nama_event" => 'Naik Pangkat',
        "tanggal" => $tgl_naik_pangkat,
        "pangkat_baru" => $pangkat_baru + 1
        );
        $gaji = array(
        "fk_id_pegawai" => $primary_key,
        "nama_event" => 'Naik Gaji',
        "tanggal" => $tgl_naik_gaji,
        "pangkat_baru" => $pangkat_baru + 1
        );
        /////////////////////////////////////////Event////////////////////////////////////////////////////////////
        $q_event_pangkat = "SET GLOBAL event_scheduler = ON;
                            CREATE EVENT $nama_ev_pangkat
                            ON SCHEDULE EVERY $konsekwensi + 10 SECOND
                            STARTS CURRENT_TIMESTAMP + INTERVAL 10 SECOND
                            DO

                                BEGIN
                                INSERT INTO hrm_dev.cms_sp_his_pangkat (fk_id_pegawai, fk_id_mas_pangkat, dari_tgl, sampai_tgl) SELECT cms_sp_pegawai.id_pegawai, cms_sp_pegawai.pangkat, cms_sp_pegawai.tmt_pangkat, cms_sp_pegawai.tgl_sd_pangkat FROM hrm_dev.cms_sp_pegawai WHERE cms_sp_pegawai.id_pegawai = '".$primary_key."' and cms_sp_pegawai.pangkat < '".$jlh."';
                                UPDATE hrm_dev.cms_sp_pegawai SET cms_sp_pegawai.pangkat = cms_sp_pegawai.pangkat + 1, cms_sp_pegawai.tmt_pangkat = cms_sp_pegawai.tmt_pangkat + INTERVAL 4 YEAR, cms_sp_pegawai.tgl_sd_pangkat = cms_sp_pegawai.tgl_sd_pangkat + INTERVAL 4 YEAR WHERE cms_sp_pegawai.id_pegawai = '".$primary_key."' and cms_sp_pegawai.pangkat < '".$jlh."';
                                UPDATE hrm_dev.cms_sp_event SET cms_sp_event.pangkat_baru = cms_sp_event.pangkat_baru + 1, cms_sp_event.tanggal = cms_sp_event.tanggal + INTERVAL 4 YEAR WHERE cms_sp_event.fk_id_pegawai = '".$primary_key."' AND cms_sp_event.nama_event = 'Naik Pangkat' AND cms_sp_event.pangkat_baru < '".$jlh."';
                                END";
        $q_event_gaji = "SET GLOBAL event_scheduler = ON;
                            CREATE EVENT $nama_ev_gaji
                            ON SCHEDULE EVERY $konsekwensi + 10 SECOND
                            STARTS CURRENT_TIMESTAMP + INTERVAL 10 SECOND
                            DO

                                BEGIN
                                UPDATE hrm_dev.cms_sp_pegawai SET cms_sp_pegawai.gaji = cms_sp_pegawai.gaji + (cms_sp_pegawai.gaji * (75/100)) WHERE cms_sp_pegawai.id_pegawai = '".$primary_key."' AND cms_sp_pegawai.tgl_lahir + INTERVAL 60 YEAR >= CURDATE();
                                UPDATE hrm_dev.cms_sp_event SET cms_sp_event.pangkat_baru = cms_sp_event.pangkat_baru + 1, cms_sp_event.tanggal = cms_sp_event.tanggal + INTERVAL 2 YEAR WHERE cms_sp_event.fk_id_pegawai = '".$primary_key."' AND cms_sp_event.nama_event = 'Naik Gaji' AND cms_sp_pegawai.tgl_lahir + INTERVAL 60 YEAR >= CURDATE();
                                END";

        $q_update_event_pangkat = "SET GLOBAL event_scheduler = ON;
                                   CREATE EVENT $nama_upd_pangkat
                                   ON SCHEDULE EVERY 10 SECOND
                                   STARTS CURRENT_TIMESTAMP + INTERVAL 10 SECOND
                                   ENDS CURRENT_TIMESTAMP + INTERVAL 12 SECOND

                                   DO
                                    BEGIN
                                    ALTER EVENT $nama_ev_pangkat
                                    ON SCHEDULE EVERY 30 SECOND
                                    STARTS CURRENT_TIMESTAMP + INTERVAL 30 SECOND;
                                    END";

        $q_update_event_gaji = "SET GLOBAL event_scheduler = ON;
                                CREATE EVENT $nama_upd_gaji
                                ON SCHEDULE EVERY 10 SECOND
                                STARTS CURRENT_TIMESTAMP + INTERVAL 10 SECOND
                                ENDS CURRENT_TIMESTAMP + INTERVAL 12 SECOND

                                DO
                                    BEGIN
                                    ALTER EVENT $nama_ev_gaji
                                    ON SCHEDULE EVERY 30 SECOND
                                    STARTS CURRENT_TIMESTAMP + INTERVAL 30 SECOND;
                                    END";
        /////////////////////////////////////////End Of Event//////////////////////////////////////////////////
        $this->db->trans_start();
        $this->db->update($this->cms_complete_table_name('event'),$pangkat);
        $this->db->update($this->cms_complete_table_name('event'),$gaji);
        $this->db->query($q_update_sampai_pangkat);
        $this->db->query($q_event_pangkat);
        $this->db->query($q_event_gaji);
        $this->db->query($q_update_event_pangkat);
        $this->db->query($q_update_event_gaji);
        $this->db->trans_complete();
        return TRUE;
    }

    public function before_delete($primary_key){

        return TRUE;
    }

    public function after_delete($primary_key){

        return TRUE;
    }
}