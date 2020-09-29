<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

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
		$data['title'] = 'User';
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('template/headeradmin', $data);
		$this->load->view('template/menuleft', $data);
		$this->load->view('template/topadmin', $data);
		$this->load->view('user/index', $data);
		$this->load->view('template/footeradmin');
	}

	public function edit()
	{
		$data['title'] = 'Edit Data';
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('name', 'Full name', 'required|trim');
		
		if($this->form_validation->run() == false) {

			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('template/footeradmin');

		} else {

			$name = $this->input->post('name'); 
			$username = $this->input->post('email');
			$akses = $this->input->post('akses');

			$upload_image = $_FILES['file_name']['name'];

			// Jika ada gambar
			if($upload_image) {
				// Pengaturan gambar 
				$config['upload_path'] = './assets/img/profile/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '2048';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('file_name')) {
					$oldImage = $data['user']['image'];

					if ($oldImage != 'default.jpg') {
						unlink(FCPATH . '/assets/img/profile/' . $oldImage);
					}

					$newImage = $this->upload->data('file_name');
					$this->db->set('image', $newImage);

				} else {
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> '. $this->upload->display_errors() . '</div>');
					redirect('user');
					
				}
			}

			$this->db->set('fullname', $name);
			$this->db->set('role', $akses);
			$this->db->where('username', $username); 
			$this->db->update('tbl_user');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Profile has been Updated</div>');
			redirect('user');
		}


		
	}

	public function editdata($id) 
	{

		$akses = $this->session->userdata('role');
		if($akses <> 2) {
			redirect('admin/block');
		}

		$data['title'] = 'Edit Data';
		$data['user'] = $this->db->get_where('tbl_user', ['id' => $id])->row_array();

		$this->form_validation->set_rules('password','New password', 'required|trim');
		$this->form_validation->set_rules('name','name', 'required');

		if($this->form_validation->run() == false) {
			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('user/editdata', $data);
			$this->load->view('template/footeradmin');	
		} else {
			$name = $this->input->post('name');
			$akses = $this->input->post('akses');
			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$this->db->set('fullname', $name);
			$this->db->set('role', $akses);
			$this->db->set('password', $password);
			$this->db->where('id', $id); 
			$this->db->update('tbl_user');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Admin has Been Changed</div>');
			redirect('user/view');
		}
	}

	public function password() 
	{
		$data['title'] = 'Change Password';
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('new','New Password', 'required|trim');
		$this->form_validation->set_rules('confirm', 'Confirm Password', 'required|trim|matches[new]',['matches' => 'Confirm password doesnt match with new password']);

		if($this->form_validation->run() == false) {
			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('user/password', $data);
			$this->load->view('template/footeradmin');	
		} else {
			$new = $this->input->post('new', true);
			$dataUpdate = [
				'password' => password_hash($new, PASSWORD_DEFAULT)
			];
			$this->db->where('username', $data['user']['username']);
			$this->db->update('tbl_user', $dataUpdate);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Your Password has Been Changed</div>');
			redirect('user');
		}
	}

	public function add() 
	{
		$akses = $this->session->userdata('role');
		if($akses <> 2) {
			redirect('admin/block');
		}

		$data['title'] = 'Tambah Data Admin';
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('username', 'username', 'required|is_unique[tbl_user.username]', [
			'required' => 'Username Must Be Required',
			'is_unique' => 'Username Already Exist!'
		]);
		$this->form_validation->set_rules('name', 'name', 'required', [
			'required' => 'Nama Must Be Required'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required', [
			'required' => 'Password Must Be Required'
		]);

		if($this->form_validation->run() == false) {
			$this->load->view('template/headeradmin', $data);
			$this->load->view('template/menuleft', $data);
			$this->load->view('template/topadmin', $data);
			$this->load->view('user/add', $data);
			$this->load->view('template/footeradmin');	
		} else {

			$upload_image = $_FILES['file_name']['name'];
			if($upload_image) {
				
				$config['upload_path'] = './assets/img/profile/';
				$config['allowed_types'] = 'jpg|png|gif|jpeg';
				$config['max_size'] = '1021';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('file_name')) {
					$image_name = $this->upload->data('file_name');
					
				} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> '. $this->upload->display_errors() . '</div>');
					redirect('user/add');
				}

			} else {
				$image_name = 'default.png';
			}


			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$dataAdd = 
			[
				"username" => $this->input->post('username'),
				"fullname" => $this->input->post('name'),
				"role" => $this->input->post('akses'),
				"password" => $password,
				"image"	=> $image_name
			];

			$this->db->insert('tbl_user', $dataAdd);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">User Add Successed</div>');
			redirect('user/add');
		}
		
	}

	public function view()
	{
		$akses = $this->session->userdata('role');
		if($akses <> 2) {
			redirect('admin/block');
		}

		$data['title'] = 'Data Admin';
		$data['dataadmin'] = $this->db->get('tbl_user')->result_array(); 
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('template/headeradmin', $data);
		$this->load->view('template/menuleft', $data);
		$this->load->view('template/topadmin', $data);
		$this->load->view('user/view', $data);
		$this->load->view('template/footeradmin', $data);
	}

	public function delete($id)
	{
		$akses = $this->session->userdata('role');
		if($akses <> 2) {
			redirect('admin/block');
		}
		
		$take = $this->db->get_where('tbl_user', ['id' => $id])->row_array();
		$fileName = $take['image'];
		unlink(FCPATH . 'assets/img/profile/' . $fileName);


		$this->db->where('id', $id);
		$this->db->delete('tbl_user');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Admin has been deleted</div>');
		redirect('user/view');
	}
}
