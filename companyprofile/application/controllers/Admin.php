<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {


	public function index()
	{
		if($this->session->userdata('username')) {
			redirect('user');
		} else {
			$this->form_validation->set_rules('username', 'username', 'required|trim');
			$this->form_validation->set_rules('password', 'password', 'required|trim');

			if($this->form_validation->run() == false) {
				$this->load->view('template/headerlogin');
				$this->load->view('login/index');
				$this->load->view('template/footerlogin');
			} else {
				$this->cek();
			}
		}
		
	}

	private function cek()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();
		// var_dump($user);
		// die; 
		if($user) {
			if(password_verify($password, $user['password'])) {
				$data = [
					'username' => $user['username'],
					'role'	=> $user['role'],
					'fullname' => $user['fullname']
				];
				$this->session->set_userdata($data);
				redirect('user');
				
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong Password!</div>');
				redirect('admin');
			}
		} else {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Admin is not registered!</div>');
			redirect('admin');
		}
	}

	public function logout() 
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('fullname');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You has been logout</div>');
		redirect('admin');
	}

	public function block() 
	{
		$this->load->view('login/block');
	}
}
