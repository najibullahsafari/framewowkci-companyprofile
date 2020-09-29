<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {

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

		$data['title'] = 'Detail Content portfolio';
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['portfolio'] = $this->db->get('tbl_portfolio')->result_array(); 

		$this->load->view('template/headeradmin', $data);
		$this->load->view('template/menuleft', $data);
		$this->load->view('template/topadmin', $data);
		$this->load->view('portfolio/index', $data);
		$this->load->view('template/footeradmin');

		
	}

	public function add()
	{

		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Add Content portfolio';
		$data['services'] = $this->db->get('tbl_services')->result_array();

		$this->form_validation->set_rules('nama','nama', 'required');
		$this->form_validation->set_rules('kategori','kategori', 'required');

		if($this->form_validation->run() == false) {
			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('portfolio/add', $data);
			$this->load->view('template/footeradmin');
		} else {
			
			$upload_image = $_FILES['file_name']['name'];
			if($upload_image) {
				
				$config['upload_path'] = './assets/img/portfolio/';
				$config['allowed_types'] = 'jpg|png|gif|jpeg';
				$config['max_size'] = '2021';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('file_name')) {
					$image_name = $this->upload->data('file_name');
					
				} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> '. $this->upload->display_errors() . '</div>');
					redirect('portfolio/add');
				}

			} else {
				$image_name = 'default.jpg';
			}

			$dataAdd = 
			[
				"nama" => $this->input->post('nama'),
				"kategori" => $this->input->post('kategori'),
				"image"	=> $image_name
			];

			$this->db->insert('tbl_portfolio', $dataAdd);

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update Content Sukses</div>');
			redirect('portfolio');	
		}
	}

	public function edit($id)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['portfolio'] = $this->db->get_where('tbl_portfolio', ['id' => $id ])->row_array();
		$data['title'] = 'Edit Content portfolio';
		$data['services'] = $this->db->get('tbl_services')->result_array();

		$this->form_validation->set_rules('nama','nama', 'required');
		$this->form_validation->set_rules('kategori','kategori', 'required');

		if($this->form_validation->run() == false) {
			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('portfolio/edit', $data);
			$this->load->view('template/footeradmin');
		} else {

			$upload_image = $_FILES['file_name']['name'];

			// Jika ada gambar
			if($upload_image) {
				// Pengaturan gambar 
				$config['upload_path'] = './assets/img/portfolio/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '1048';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('file_name')) {
					$take = $this->db->get_where('tbl_portfolio', ['id' => $id])->row_array();
					$oldImage = $take['image'];

					if ($oldImage != 'default.jpg') {
						unlink(FCPATH . '/assets/img/portfolio/' . $oldImage);
					}

					$newImage = $this->upload->data('file_name');
					$this->db->set('image', $newImage);

				} else {
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> '. $this->upload->display_errors() . '</div>');
					redirect('portfolio/edit');
					
				}
			}

			$nama = $this->input->post('nama');
			$kategori = $this->input->post('kategori');

			$this->db->set('nama', $nama);
			$this->db->set('kategori', $kategori);

			$this->db->where('id', $id); 
			$this->db->update('tbl_portfolio');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update Content Sukses</div>');
			redirect('portfolio');	
		}
	}



	public function delete($id)
	{
		$take = $this->db->get_where('tbl_portfolio', ['id' => $id])->row_array();
		$fileName = $take['image'];
		if ($fileName != 'default.jpg') {
			unlink(FCPATH . 'assets/img/portfolio/' . $fileName);
		}

		$this->db->where('id', $id);
		$this->db->delete('tbl_portfolio');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Admin has been deleted</div>');
		redirect('portfolio');
		
	}


}
