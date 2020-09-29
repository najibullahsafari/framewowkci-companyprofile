<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

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
		$data['faq'] = $this->db->get('tbl_ask')->result_array(); 

		$this->load->view('template/headeradmin', $data);
		$this->load->view('template/menuleft', $data);
		$this->load->view('template/topadmin', $data);
		$this->load->view('faq/index', $data);
		$this->load->view('template/footeradmin');

		
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Content F.A.Q';
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['faq'] = $this->db->get_where('tbl_ask', ['id' => $id ])->row_array();
		$data['title'] = 'Edit Content ';

		$this->form_validation->set_rules('tanya','tanya', 'required');
		$this->form_validation->set_rules('jawab','jawab', 'required');

		if($this->form_validation->run() == false) {
			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('faq/edit', $data);
			$this->load->view('template/footeradmin');
		} else {
			$this->db->set('pertanyaan', $this->input->post('tanya'));
			$this->db->set('jawab', $this->input->post('jawab'));
			$this->db->where('id', $id); 
			$this->db->update('tbl_ask');
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update Content Sukses</div>');
			redirect('faq/');	
		}

		
	}


	public function add()
	{
		$data['title'] = 'Add Content F.A.Q';
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Add Content F.A.Q ';

		$this->form_validation->set_rules('tanya','tanya', 'required');
		$this->form_validation->set_rules('jawab','jawab', 'required');

		if($this->form_validation->run() == false) {
			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('faq/add', $data);
			$this->load->view('template/footeradmin');
		} else {
			$dataAdd = 
			[
				"pertanyaan" => $this->input->post('tanya'),
				"jawab" => $this->input->post('jawab')
			];

			$this->db->insert('tbl_ask', $dataAdd);

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update Content Sukses</div>');
			redirect('faq');	
		}
	}


	public function delete($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('tbl_ask');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Admin has been deleted</div>');
		redirect('faq');
		
	}
}
