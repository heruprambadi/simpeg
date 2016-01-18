<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Manage_Mas_Status_Pegawai
 *
 * @author No-CMS Module Generator
 */
class Mas_Gaji extends CMS_Priv_Strict_Controller {

	protected $URL_MAP = array();

	public function index($id=NULL){
        $crud = $this->new_crud();

        $pangkat = $this->db->select('*')
						    ->get('cms_sp_mas_pangkat')->result();

        if($id != 0){
            $crud->where('fk_id_mas_pangkat', $id);
            $crud->field_type('fk_id_mas_pangkat', 'hidden', $id);
        }else{
        	
        }
        //field type
        $crud->required_fields('lama_kerja','gaji');

        //unset
        $crud->unset_jquery()
        	 ->unset_export()
        	 ->unset_print();

        // adjust groceryCRUD's language to No-CMS's language
        $crud->set_language('indonesian');

        // table name
        $crud->set_table($this->cms_complete_table_name('mas_gaji'));

        // set subject
        $crud->set_subject('Master Gaji Pokok');

        // displayed columns on list
        $crud->columns('fk_id_mas_pangkat','lama_kerja', 'gaji');
        // displayed columns on edit operation
        $crud->edit_fields('fk_id_mas_pangkat','lama_kerja', 'gaji');
        // displayed columns on add operation
        $crud->add_fields('fk_id_mas_pangkat','lama_kerja', 'gaji');

        // caption of each columns
        $crud->display_as('fk_id_mas_pangkat','Pangkat');
        $crud->display_as('lama_kerja','Lama Kerja');
        $crud->display_as('gaji','Jumlah Gaji');

        //callbacks
		$crud->callback_column('lama_kerja',array($this,'cc_lama_kerja'));
        $crud->callback_column('gaji',array($this,'cc_gaji'));

        //set relation
        $crud->set_relation('fk_id_mas_pangkat', $this->cms_complete_table_name('mas_pangkat'), 'nama_mas_pangkat');

		$crud->callback_before_insert(array($this,'before_insert'));
		$crud->callback_before_update(array($this,'before_update'));
		$crud->callback_before_delete(array($this,'before_delete'));
		$crud->callback_after_insert(array($this,'after_insert'));
		$crud->callback_after_update(array($this,'after_update'));
		$crud->callback_after_delete(array($this,'after_delete'));



        $output = $crud->render();
        $output->pangkat = $pangkat;
        $output->id = $id;
        $this->view($this->cms_module_path().'/mas_gaji', $output,
            $this->cms_complete_navigation_name('mas_gaji'));

    }

    public function before_insert($post_array){
    	$post_array['gaji'] = (($post_array['gaji'])*0.75);
		return $post_array;
	}

	public function after_insert($post_array, $primary_key){
		return TRUE;
	}

	public function before_update($post_array, $primary_key){
		$post_array['gaji'] = (($post_array['gaji'])*0.75);
		return $post_array;
	}

	public function after_update($post_array, $primary_key){
		return TRUE;
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

	public function cc_gaji($value, $row){
		$gaji_koma = number_format($value);
		$gaji_titik = str_replace(",", ".", $gaji_koma);
        return "Rp".$gaji_titik;
	}

	public function cc_lama_kerja($value, $row){
        return ">= ".$value." Tahun";
	}



}