<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function index()
	{

		
		
			$data['companyInfo'] = $this->db->get('tbl_companyinfo')->row_array();
			$data['aboutDesc'] = $this->db->get_where('tbl_menuutama', ['kategori' =>'About' ])->row_array();
			$data['servicesDesc'] = $this->db->get_where('tbl_menuutama', ['kategori' =>'Services' ])->row_array();
			$data['portfolioDesc'] = $this->db->get_where('tbl_menuutama', ['kategori' =>'Portfolio' ])->row_array();
			$data['testimonialDesc'] = $this->db->get_where('tbl_menuutama', ['kategori' =>'Testimonial' ])->row_array();
			$data['teamDesc'] = $this->db->get_where('tbl_menuutama', ['kategori' =>'Team' ])->row_array();
			$data['contactDesc'] = $this->db->get_where('tbl_menuutama', ['kategori' =>'Contact' ])->row_array();
			$data['ask'] = $this->db->get('tbl_ask')->result_array(); 
			$data['testimoni'] = $this->db->get('tbl_testimoni')->result_array(); 
			$data['services'] = $this->db->get('tbl_services')->result_array();
			$data['portfolio'] = $this->db->get('tbl_portfolio')->result_array(); 
			$data['ourteam'] = $this->db->get('tbl_team')->result_array(); 
			$data['email'] = $this->db->get_where('tbl_kontak', ['kategori' =>'email' ])->result_array();
			$data['nomor'] = $this->db->get_where('tbl_kontak', ['kategori' =>'nomor' ])->result_array();
			$data['alamat'] = $this->db->get_where('tbl_kontak', ['kategori' =>'alamat' ])->result_array();
			$data['client'] = $this->db->get('tbl_client')->result_array(); 


			$this->load->view('template/header', $data);
			$this->load->view('home/index', $data);
			$this->load->view('template/footer', $data);
		
		
	}
}
