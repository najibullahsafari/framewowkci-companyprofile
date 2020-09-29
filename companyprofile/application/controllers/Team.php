<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

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

		$data['title'] = 'Detail Content team';
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['team'] = $this->db->get('tbl_team')->result_array(); 

		$this->load->view('template/headeradmin', $data);
		$this->load->view('template/menuleft', $data);
		$this->load->view('template/topadmin', $data);
		$this->load->view('team/index', $data);
		$this->load->view('template/footeradmin');

		
	}

	public function add()
	{

		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Add Content team';

		$this->form_validation->set_rules('nama','nama', 'required');
		$this->form_validation->set_rules('jabatan','jabatan', 'required');
		$this->form_validation->set_rules('twitter','twitter', 'required');
		$this->form_validation->set_rules('facebook','facebook', 'required');
		$this->form_validation->set_rules('instagram','instagram', 'required');
		$this->form_validation->set_rules('linkedin','linkedin', 'required');


		if($this->form_validation->run() == false) {
			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('team/add', $data);
			$this->load->view('template/footeradmin');
		} else {
			
			$upload_image = $_FILES['file_name']['name'];
			if($upload_image) {
				
				$config['upload_path'] = './assets/img/team/';
				$config['allowed_types'] = 'jpg|png|gif|jpeg';
				$config['max_size'] = '1021';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('file_name')) {
					$image_name = $this->upload->data('file_name');
					
				} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> '. $this->upload->display_errors() . '</div>');
					redirect('team/add');
				}

			} else {
				$image_name = 'default.png';
			}

			$dataAdd = 
			[
				"nama" => $this->input->post('nama'),
				"jabatan" => $this->input->post('jabatan'),
				"facebook" => $this->input->post('facebook'),
				"twitter" => $this->input->post('twitter'),
				"instagram" => $this->input->post('instagram'),
				"linkedin" => $this->input->post('linkedin'),
				"image"	=> $image_name
			];

			$this->db->insert('tbl_team', $dataAdd);

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update Content Sukses</div>');
			redirect('team');	
		}
	}

	public function edit($id)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['team'] = $this->db->get_where('tbl_team', ['id' => $id ])->row_array();
		$data['title'] = 'Edit Content team';

		$this->form_validation->set_rules('nama','nama', 'required');
		$this->form_validation->set_rules('jabatan','jabatan', 'required');
		$this->form_validation->set_rules('twitter','twitter', 'required');
		$this->form_validation->set_rules('facebook','facebook', 'required');
		$this->form_validation->set_rules('instagram','instagram', 'required');
		$this->form_validation->set_rules('linkedin','linkedin', 'required');

		if($this->form_validation->run() == false) {

			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('team/edit', $data);
			$this->load->view('template/footeradmin');
		} else {

			$upload_image = $_FILES['file_name']['name'];

			// Jika ada gambar
			if($upload_image) {
				// Pengaturan gambar 
				$config['upload_path'] = './assets/img/team/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '1048';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('file_name')) {
					$take = $this->db->get_where('tbl_team', ['id' => $id])->row_array();
					$oldImage = $take['image'];

					if ($oldImage != 'default.png') {
						unlink(FCPATH . '/assets/img/team/' . $oldImage);
					}

					$newImage = $this->upload->data('file_name');
					$this->db->set('image', $newImage);

				} else {
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> '. $this->upload->display_errors() . '</div>');
					redirect('team/edit');
					
				}
			}

			$nama = $this->input->post('nama');
			$jabatan = $this->input->post('jabatan');
			$detail = $this->input->post('detail');
			$twitter = $this->input->post('twitter');
			$facebook = $this->input->post('facebook');
			$instagram = $this->input->post('instagram');
			$linkedin = $this->input->post('linkedin');

			$this->db->set('nama', $nama);
			$this->db->set('jabatan', $jabatan);
			$this->db->set('twitter', $twitter);
			$this->db->set('facebook', $facebook);
			$this->db->set('instagram', $instagram);
			$this->db->set('linkedin', $linkedin);

			$this->db->where('id', $id); 
			$this->db->update('tbl_team');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Update Content Sukses</div>');
			redirect('team');	
		}
	}



	public function delete($id)
	{
		$take = $this->db->get_where('tbl_team', ['id' => $id])->row_array();
		$fileName = $take['image'];
		if ($fileName != 'default.png') {
			unlink(FCPATH . 'assets/img/team/' . $fileName);
		}

		$this->db->where('id', $id);
		$this->db->delete('tbl_team');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Admin has been deleted</div>');
		redirect('team');
		
	}


}
