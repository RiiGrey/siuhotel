<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 
	public function __construct()
	{
		parent :: __construct();   
		$this->load->helper(array('form', 'url'));
			//load the validation library
		$this->load->library('form_validation');
		$this->load->library("pagination");
        if($this->session->userdata('username') == ''){
            redirect(base_url() . 'login');
		}
		$this->load->model("pemesanan_model");
	}

	public function index()
	{
		$data['fetch_data'] = $this->pemesanan_model->fetch_data();
		$this->load->view('.header.php');
		$this->load->view('.nav-admin.php');
		$this->load->view('admin/pemesanan/index.php', $data);
		$this->load->view('.footer.php');
	}
}
