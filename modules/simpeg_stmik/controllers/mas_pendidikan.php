<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Manage_Mas_Status_Pegawai
 *
 * @author No-CMS Module Generator
 */
class Mas_Pendidikan extends CMS_Priv_Strict_Controller {

	protected $URL_MAP = array();

	public function index(){
        $crud = $this->new_crud();
        $crud->unset_jquery()
        	 ->unset_export()
        	 ->unset_print();

        // adjust groceryCRUD's language to No-CMS's language
        $crud->set_language('indonesian');

        // table name
        $crud->set_table($this->cms_complete_table_name('mas_pend'));

        // set subject
        $crud->set_subject('Master Tingkat Pendidikan');

        // displayed columns on list
        $crud->columns('nama_mas_pend');
        // displayed columns on edit operation
        $crud->edit_fields('nama_mas_pend');
        // displayed columns on add operation
        $crud->add_fields('nama_mas_pend');

        // caption of each columns
        $crud->display_as('nama_mas_pend','Tingkat Pendidikan');

		$crud->callback_before_insert(array($this,'before_insert'));
		$crud->callback_before_update(array($this,'before_update'));
		$crud->callback_before_delete(array($this,'before_delete'));
		$crud->callback_after_insert(array($this,'after_insert'));
		$crud->callback_after_update(array($this,'after_update'));
		$crud->callback_after_delete(array($this,'after_delete'));



        $output = $crud->render();
        $this->view($this->cms_module_path().'/mas_pend', $output,
            $this->cms_complete_navigation_name('mas_pend'));

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