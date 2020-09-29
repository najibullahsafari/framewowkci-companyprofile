<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class client extends CI_Controller {

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

		$data['title'] = 'Detail Content client';
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['client'] = $this->db->get('tbl_client')->result_array(); 

		$this->load->view('template/headeradmin', $data);
		$this->load->view('template/menuleft', $data);
		$this->load->view('template/topadmin', $data);
		$this->load->view('client/index', $data);
		$this->load->view('template/footeradmin');

		
	}

	public function add()
	{

		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Add Content client';

		$this->form_validation->set_rules('nama','nama', 'required');

		if($this->form_validation->run() == false) {
			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('client/add', $data);
			$this->load->view('template/footeradmin');
		} else {
			
			$upload_image = $_FILES['file_name']['name'];
			if($upload_image) {
				
				$config['upload_path'] = './assets/img/clients/';
				$config['allowed_types'] = 'jpg|png|gif|jpeg';
				$config['max_size'] = '1021';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('file_name')) {
					$image_name = $this->upload->data('file_name');
					
				} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> '. $this->upload->display_errors() . '</div>');
					redirect('client/add');
				}

			} else {
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Pilih Gambar !!!</div>');
				redirect('client/edit');
			}

			$dataAdd = 
			[
				"nama" => $this->input->post('nama'),
				"image"	=> $image_name
			];

			$this->db->insert('tbl_client', $dataAdd);

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update Content Sukses</div>');
			redirect('client');	
		}
	}

	public function edit($id)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['client'] = $this->db->get_where('tbl_client', ['id' => $id ])->row_array();
		$data['title'] = 'Edit Content client';

		$this->form_validation->set_rules('nama','nama', 'required');

		if($this->form_validation->run() == false) {
			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('client/edit', $data);
			$this->load->view('template/footeradmin');
		} else {

			$upload_image = $_FILES['file_name']['name'];

			// Jika add gambar
			if($upload_image) {
				// Pengaturan gambar 
				$config['upload_path'] = './assets/img/clients/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '1048';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('file_name')) {
					$oldImage = $data['client']['image'];
					unlink(FCPATH . '/assets/img/clients/' . $oldImage);

					$newImage = $this->upload->data('file_name');
					$this->db->set('image', $newImage);

				} else {
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> '. $this->upload->display_errors() . '</div>');
					redirect('client/edit');
					
				}
			}

			$nama = $this->input->post('nama');
			$detail = $this->input->post('detail');

			$this->db->set('nama', $nama);

			$this->db->where('id', $id); 
			$this->db->update('tbl_client');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update Content Sukses</div>');
			redirect('client');	
		}
	}



	public function delete($id)
	{
		$take = $this->db->get_where('tbl_client', ['id' => $id])->row_array();
		$fileName = $take['image'];
		unlink(FCPATH . 'assets/img/clients/' . $fileName);

		$this->db->where('id', $id);
		$this->db->delete('tbl_client');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Content has been deleted</div>');
		redirect('client');
		
	}


}
