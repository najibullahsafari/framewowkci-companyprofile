<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class company extends CI_Controller {

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
		$data['title'] = 'Company Info';
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['companyInfo'] = $this->db->get('tbl_companyinfo')->row_array();

		$this->form_validation->set_rules('companyname','companyname', 'required');
		$this->form_validation->set_rules('tagline','tagline', 'required');
		$this->form_validation->set_rules('subtagline','subtagline', 'required');
		$this->form_validation->set_rules('twitter','twitter', 'required');
		$this->form_validation->set_rules('facebook','facebook', 'required');
		$this->form_validation->set_rules('instagram','instagram', 'required');
		$this->form_validation->set_rules('linkedin','linkedin', 'required');

		if($this->form_validation->run() == false) {
			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('company/index', $data);
			$this->load->view('template/footeradmin');

		} else {

			$this->db->set('companyname', $this->input->post('companyname'));
			$this->db->set('tagline', $this->input->post('tagline'));
			$this->db->set('subtagline', $this->input->post('subtagline'));
			$this->db->set('twitter', $this->input->post('twitter'));
			$this->db->set('facebook', $this->input->post('facebook'));
			$this->db->set('instagram', $this->input->post('instagram'));
			$this->db->set('linkedin', $this->input->post('linkedin'));
			// $this->db->set('image', $image_name);
			$this->db->where('id', 1); 
			$this->db->update('tbl_companyinfo');


			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">sukses</div>');
			redirect('company');
					
		}

		
	}		

	public function banner() 
	{
		
		$data['title'] = 'Website Benner';
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['companyInfo'] = $this->db->get('tbl_companyinfo')->row_array();


		$this->form_validation->set_rules('bannername','bannername', 'required');

		if($this->form_validation->run() == false) {

			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('company/benner', $data);
			$this->load->view('template/footeradmin');
		
		} else {

			$upload_image = $_FILES['file_name']['name'];

			 // jika ada file yang diupload 

			if($upload_image) {
				
				$config['upload_path'] = './assets/img/';
				$config['allowed_types'] = 'jpg|png|gif|jpeg';
				$config['max_size'] = '8021';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('file_name')) {
					
					$oldImage = $companyInfo['banner'];

					if ($oldImage != 'banner.jpg') {
						unlink(FCPATH . '/assets/img/' . $oldImage);
					}

					$image_name = $this->upload->data('file_name');
					
					$this->db->set('banner', $image_name);
					$this->db->where('id', 1); 
					$this->db->update('tbl_companyinfo');

					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Banner has been updated</div>');
					redirect('company/banner');

				} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> '. $this->upload->display_errors() . '</div>');
					redirect('company/banner');
				}
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Pilih Gambar!!!</div>');
				redirect('company/banner');
			}
		}			
	}

	public function icon() 
	{
		
		$data['title'] = 'Website Icon';
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['companyInfo'] = $this->db->get('tbl_companyinfo')->row_array();


		$this->form_validation->set_rules('iconname','iconname', 'required');

		if($this->form_validation->run() == false) {

			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('company/icon', $data);
			$this->load->view('template/footeradmin');
		
		} else {

			$upload_image = $_FILES['file_name']['name'];

			 // jika ada file yang diupload 

			if($upload_image) {
				
				$config['upload_path'] = './assets/img/';
				$config['allowed_types'] = 'jpg|png|gif|jpeg';
				$config['max_size'] = '1021';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('file_name')) {
					
					$oldImage = $companyInfo['icon'];

					if ($oldImage != 'banner.jpg') {
						unlink(FCPATH . '/assets/img/' . $oldImage);
					}

					$image_name = $this->upload->data('file_name');
					
					$this->db->set('icon', $image_name);
					$this->db->where('id', 1); 
					$this->db->update('tbl_companyinfo');

					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Icon has been updated</div>');
					redirect('company/banner');

				} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> '. $this->upload->display_errors() . '</div>');
					redirect('company/icon');
				}
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Pilih Gambar!!!</div>');
				redirect('company/banner');
			}
		}			
	}
	
}
