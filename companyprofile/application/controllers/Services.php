<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

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

		$data['title'] = 'Detail Content Services';
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['services'] = $this->db->get('tbl_services')->result_array(); 

		$this->load->view('template/headeradmin', $data);
		$this->load->view('template/menuleft', $data);
		$this->load->view('template/topadmin', $data);
		$this->load->view('services/index', $data);
		$this->load->view('template/footeradmin');

		
	}

	public function add()
	{

		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Add Content Services';

		$this->form_validation->set_rules('nama','nama', 'required');
		$this->form_validation->set_rules('detail','detail', 'required');

		if($this->form_validation->run() == false) {
			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('services/add', $data);
			$this->load->view('template/footeradmin');
		} else {
			
			$upload_image = $_FILES['file_name']['name'];
			if($upload_image) {
				
				$config['upload_path'] = './assets/img/services/';
				$config['allowed_types'] = 'jpg|png|gif|jpeg';
				$config['max_size'] = '1021';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('file_name')) {
					$image_name = $this->upload->data('file_name');
					
				} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> '. $this->upload->display_errors() . '</div>');
					redirect('services/ada');
				}

			} else {
				$image_name = 'services.png';
			}

			$dataAdd = 
			[
				"nama" => $this->input->post('nama'),
				"detail" => $this->input->post('detail'),
				"image"	=> $image_name
			];

			$this->db->insert('tbl_services', $dataAdd);

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update Content Sukses</div>');
			redirect('services');	
		}
	}

	public function edit($id)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['services'] = $this->db->get_where('tbl_services', ['id' => $id ])->row_array();
		$data['title'] = 'Edit Content Services';

		$this->form_validation->set_rules('nama','nama', 'required');
		$this->form_validation->set_rules('detail','detail', 'required');

		if($this->form_validation->run() == false) {
			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('services/edit', $data);
			$this->load->view('template/footeradmin');
		} else {

			$upload_image = $_FILES['file_name']['name'];

			// Jika ada gambar
			if($upload_image) {
				// Pengaturan gambar 
				$config['upload_path'] = './assets/img/services/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '1048';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('file_name')) {
					$oldImage = $data['services']['image'];

					if ($oldImage != 'services.png') {
						unlink(FCPATH . '/assets/img/services/' . $oldImage);
					}

					$newImage = $this->upload->data('file_name');
					$this->db->set('image', $newImage);

				} else {
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> '. $this->upload->display_errors() . '</div>');
					redirect('services/edit');
					
				}
			}

			$nama = $this->input->post('nama');
			$detail = $this->input->post('detail');

			$this->db->set('nama', $nama);
			$this->db->set('detail', $detail);

			$this->db->where('id', $id); 
			$this->db->update('tbl_services');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update Content Sukses</div>');
			redirect('services');	
		}
	}



	public function delete($id)
	{
		$take = $this->db->get_where('tbl_services', ['id' => $id])->row_array();
		$fileName = $take['image'];
		if ($fileName != 'services.png') {
			unlink(FCPATH . 'assets/img/services/' . $fileName);
		}

		$this->db->where('id', $id);
		$this->db->delete('tbl_services');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Content has been deleted</div>');
		redirect('services');
		
	}


}
