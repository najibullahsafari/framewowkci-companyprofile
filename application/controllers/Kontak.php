<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Please Login!</div>');
			redirect('admin');
		}
	}

	public function index()
	{

		$data['title'] = 'Content Utama';
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['kontak'] = $this->db->get('tbl_kontak')->result_array(); 

		$this->load->view('template/headeradmin', $data);
		$this->load->view('template/menuleft', $data);
		$this->load->view('template/topadmin', $data);
		$this->load->view('kontak/index', $data);
		$this->load->view('template/footeradmin');

		
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Content Kontak';
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['kontak'] = $this->db->get_where('tbl_kontak', ['id' => $id ])->row_array();
		$data['title'] = 'Edit Content Kontak';

		$this->form_validation->set_rules('deskripsi','deskripsi', 'required');

		if($this->form_validation->run() == false) {
			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('kontak/edit', $data);
			$this->load->view('template/footeradmin');
		} else {
			$this->db->set('kategori', $this->input->post('kategori'));
			$this->db->set('deskripsi', $this->input->post('deskripsi'));
			$this->db->where('id', $id); 
			$this->db->update('tbl_kontak');
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update Content Sukses</div>');
			redirect('kontak/');	
		}

		
	}


	public function add()
	{
		$data['title'] = 'Add Content Kontak';
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('deskripsi','deskripsi', 'required');

		if($this->form_validation->run() == false) {
			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('kontak/add', $data);
			$this->load->view('template/footeradmin');
		} else {
			$dataAdd = 
			[
				"kategori" => $this->input->post('kategori'),
				"deskripsi" => $this->input->post('deskripsi')
			];

			$this->db->insert('tbl_kontak', $dataAdd);

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update Content Sukses</div>');
			redirect('kontak');	
		}
	}


	public function delete($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('tbl_kontak');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Admin has been deleted</div>');
		redirect('kontak');
		
	}
}
