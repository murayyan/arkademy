<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_arkademy extends CI_Controller {
    function __construct(){
		parent::__construct();
			$this->load->model('m_arkademy');
	}

	public function index(){
            $data['arkademy'] = $this->m_arkademy->m_get_data()->result_array();
            $data['hobby'] = $this->m_arkademy->m_get_hobby()->result_array();
            $data['category'] = $this->m_arkademy->m_get_category()->result_array();
			$this->load->view('index', $data);
    }
    
    public function add_data(){
        $nama = $this->input->post('nama');
        $hobi = $this->input->post('hobi');
        $kategori = $this->input->post('kategori');
        $data = array(
			'name' => $nama,
			'id_hobby' => $hobi,
			'id_category' => $kategori
		);
		$this->m_arkademy->m_add_data($data);
    }
    public function edit_data(){
        $id = $this->input->post('id_data');
        $nama = $this->input->post('nama');
        $hobi = $this->input->post('hobi');
        $kategori = $this->input->post('kategori');
        $data = array(
			'name' => $nama,
			'id_hobby' => $hobi,
			'id_category' => $kategori
		);
		$this->m_arkademy->m_edit_data($id, $data);
    }
    function hapus_data($id){
		$this->m_arkademy->m_hapus_data($id);
		redirect(base_url());
	}
}
