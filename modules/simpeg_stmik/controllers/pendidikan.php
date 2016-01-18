<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Manage_Mas_Status_Pegawai
 *
 * @author No-CMS Module Generator
 */
class Pendidikan extends CMS_Priv_Strict_Controller {

	protected $URL_MAP = array();

	public function index($id=NULL){
        $crud = $this->new_crud();
        $crud->where('fk_id_pegawai')
        $crud->unset_jquery()
        	 ->unset_export()
        	 ->unset_print();

        // adjust groceryCRUD's language to No-CMS's language
        $crud->set_language('indonesian');

        // table name
        $crud->set_table($this->cms_complete_table_name('pendidikan'));

        // set subject
        $crud->set_subject('Master Pendidikan');

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

		$crud->callback_before_insert(array($this,'before_insert'));
		$crud->callback_before_update(array($this,'before_update'));
		$crud->callback_before_delete(array($this,'before_delete'));
		$crud->callback_after_insert(array($this,'after_insert'));
		$crud->callback_after_update(array($this,'after_update'));
		$crud->callback_after_delete(array($this,'after_delete'));

		//set relation
		$crud->set_relation('fk_id_pegawai',$this->cms_complete_table_name('pegawai'), 'nama_kar');
		$crud->set_relation('fk_id_mas_pend', $this->cms_complete_table_name('mas_pend'), 'nama_mas_pend');



        $output = $crud->render();
        $this->view($this->cms_module_path().'/pend', $output,
            $this->cms_complete_navigation_name('pend'));

    }

    public function before_insert($post_array){
		return TRUE;
	}

	public function after_insert($post_array, $primary_key){
		$success = $this->after_insert_or_update($post_array, $primary_key);
		return $success;
	}

	public function before_update($post_array, $primary_key){
		return TRUE;
	}

	public function after_update($post_array, $primary_key){
		$success = $this->after_insert_or_update($post_array, $primary_key);
		return $success;
	}

	public function before_delete($primary_key){

		return TRUE;
	}

	public function after_delete($primary_key){
		return TRUE;
	}

	public function after_insert_or_update($post_array, $primary_key){

        return TRUE;
	}



}