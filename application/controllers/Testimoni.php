<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

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

		$data['title'] = 'Detail Content testimoni';
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['testimoni'] = $this->db->get('tbl_testimoni')->result_array(); 

		$this->load->view('template/headeradmin', $data);
		$this->load->view('template/menuleft', $data);
		$this->load->view('template/topadmin', $data);
		$this->load->view('testimoni/index', $data);
		$this->load->view('template/footeradmin');

		
	}

	public function add()
	{

		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Add Content testimoni';

		$this->form_validation->set_rules('nama','nama', 'required');
		$this->form_validation->set_rules('jabatan','jabatan', 'required');
		$this->form_validation->set_rules('detail','detail', 'required');

		if($this->form_validation->run() == false) {
			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('testimoni/add', $data);
			$this->load->view('template/footeradmin');
		} else {
			
			$upload_image = $_FILES['file_name']['name'];
			if($upload_image) {
				
				$config['upload_path'] = './assets/img/testimonials/';
				$config['allowed_types'] = 'jpg|png|gif|jpeg';
				$config['max_size'] = '1021';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('file_name')) {
					$image_name = $this->upload->data('file_name');
					
				} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> '. $this->upload->display_errors() . '</div>');
					redirect('testimoni/add');
				}

			} else {
				$image_name = 'testimoni.png';
			}

			$dataAdd = 
			[
				"nama" => $this->input->post('nama'),
				"jabatan" => $this->input->post('jabatan'),
				"detail" => $this->input->post('detail'),
				"image"	=> $image_name
			];

			$this->db->insert('tbl_testimoni', $dataAdd);

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update Content Sukses</div>');
			redirect('testimoni');	
		}
	}

	public function edit($id)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['testimoni'] = $this->db->get_where('tbl_testimoni', ['id' => $id ])->row_array();
		$data['title'] = 'Edit Content testimoni';

		$this->form_validation->set_rules('nama','nama', 'required');
		$this->form_validation->set_rules('detail','detail', 'required');
		$this->form_validation->set_rules('jabatan','jabatan', 'required');

		if($this->form_validation->run() == false) {

			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('testimoni/edit', $data);
			$this->load->view('template/footeradmin');
		} else {

			$upload_image = $_FILES['file_name']['name'];

			// Jika ada gambar
			if($upload_image) {
				// Pengaturan gambar 
				$config['upload_path'] = './assets/img/testimonials/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '1048';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('file_name')) {
					$oldImage = $data['testimoni']['image'];

					if ($oldImage != 'testimoni.png') {
						unlink(FCPATH . '/assets/img/testimoni/' . $oldImage);
					}

					$newImage = $this->upload->data('file_name');
					$this->db->set('image', $newImage);

				} else {
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> '. $this->upload->display_errors() . '</div>');
					redirect('testimoni/edit');
					
				}
			}

			$nama = $this->input->post('nama');
			$jabatan = $this->input->post('jabatan');
			$detail = $this->input->post('detail');

			$this->db->set('nama', $nama);
			$this->db->set('jabatan', $jabatan);
			$this->db->set('detail', $detail);

			$this->db->where('id', $id); 
			$this->db->update('tbl_testimoni');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update Content Sukses</div>');
			redirect('testimoni');	
		}
	}



	public function delete($id)
	{
		$take = $this->db->get_where('tbl_testimoni', ['id' => $id])->row_array();
		$fileName = $take['image'];
		if ($fileName != 'testimoni.png') {
			unlink(FCPATH . 'assets/img/testimoni/' . $fileName);
		}

		$this->db->where('id', $id);
		$this->db->delete('tbl_testimoni');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Admin has been deleted</div>');
		redirect('testimoni');
		
	}


}
