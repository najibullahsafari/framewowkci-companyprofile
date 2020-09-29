<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class maincontent extends CI_Controller {

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
		$data['maincontent'] = $this->db->get('tbl_menuutama')->result_array(); 

		$this->load->view('template/headeradmin', $data);
		$this->load->view('template/menuleft', $data);
		$this->load->view('template/topadmin', $data);
		$this->load->view('main/index', $data);
		$this->load->view('template/footeradmin');

		
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Content Utama';
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['maincontent'] = $this->db->get_where('tbl_menuutama', ['id' => $id ])->row_array();
		$data['title'] = 'Edit Content ' . $data['maincontent']['kategori'];

		$this->form_validation->set_rules('deskripsi','deskripsi', 'required');

		if($this->form_validation->run() == false) {
			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('main/edit', $data);
			$this->load->view('template/footeradmin');
		} else {
			$this->db->set('deskripsi', $this->input->post('deskripsi'));
			$this->db->where('id', $id); 
			$this->db->update('tbl_menuutama');
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update Content Sukses</div>');
			redirect('maincontent/');	
		}

		
	}
}
