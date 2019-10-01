<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->model("admin_model");
	}

	public function index()
	{
		
		$this->load->view('.header.php');
		$this->load->view('admin/.nav-admin.php');
		$this->load->view('admin/welcome.php',);
		$this->load->view('.footer.php');
	}

	public function kamar_list(){
		$config['base_url'] = site_url('admin/kamar_list');
		$config['total_rows'] = $this->db->count_all('kamar');
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);

		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		
		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['kamars'] = $this->admin_model->fetch_kamar_perpage($config['per_page'], $data['page']);

		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('.header.php');
		$this->load->view('admin/.nav-admin.php');
		$this->load->view('admin/kamar/index.php', $data);
		$this->load->view('.footer.php');
	}

	public function tambah_kamar_form(){
		
		$this->load->view('.header.php');
		$this->load->view('admin/.nav-admin.php');
		$this->load->view('admin/kamar/tambah_kamar_form.php',);
		$this->load->view('.footer.php');
	}

	public function tambah_kamar_save(){
		//mencari auto increment kamar id
		$kamar = $this->admin_model->kamarid_ai()->row();
		
        $config['file_name'] = $kamar->kamarid_ai;
		$config['upload_path'] = './uploads/admin/kamar';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 10000;
       
		$this->load->library('upload', $config);
		$this->upload->overwrite = true;
		
        if ( ! $this->upload->do_upload('gambar')){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
            // redirect(base_url() . "tamu_kamar/pembayaran_form/" . $this->input->post("idkamar"));
        }else{

			$data = array(
				'tipe'=>$this->input->post('tipe'),
				'jumlah'=>$this->input->post('jumlah'),
				'harga'=>$this->input->post('harga'),
				'gambar'=>$this->upload->data('file_name'),
			);
			$this->admin_model->insert_kamar($data);
			redirect(base_url() . 'admin/tambah_kamar_saved');
		}
		
	}

	public function tambah_kamar_saved(){
		$this->kamar_list();
	}

	public function ubah_kamar_form(){
        $id = $this->uri->segment(3);
		$data['kamar'] = $this->admin_model->fetch_kamar_single($id);
		
		$this->load->view('.header.php');
		$this->load->view('admin/.nav-admin.php');
		$this->load->view('admin/kamar/ubah_kamar_form.php', $data);
		$this->load->view('.footer.php');

	}

	public function ubah_kamar_save(){
		if(empty($this->input->post('checkgambar'))){

			$data = array(
				'idkamar'=>$this->input->post('idkamar'),
				'tipe'=>$this->input->post('tipe'),
				'jumlah'=>$this->input->post('jumlah'),
				'harga'=>$this->input->post('harga'),
			);
			$this->admin_model->update_kamar($data);
			redirect(base_url() . 'admin/ubah_kamar_saved');
		}elseif(empty($this->input->post('checkgambar'))){
			$config['file_name'] = $this->input->post('idkamar');
			$config['upload_path'] = './uploads/admin/kamar';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = 10000;
		
			$this->load->library('upload', $config);
			$this->upload->overwrite = true;
			
			if ( ! $this->upload->do_upload('gambar')){
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
				// redirect(base_url() . "tamu_kamar/pembayaran_form/" . $this->input->post("idkamar"));
			}else{
				$data = array(
					'idkamar'=>$this->input->post('idkamar'),
					'tipe'=>$this->input->post('tipe'),
					'jumlah'=>$this->input->post('jumlah'),
					'harga'=>$this->input->post('harga'),
					'gambar'=>$this->upload->data('file_name'),
				);
				$this->admin_model->update_kamar($data);
				redirect(base_url() . 'admin/ubah_kamar_saved');
			}
		}
        
		
	}

	public function ubah_kamar_saved(){
		$this->kamar_list();
	}

	public function hapus_kamar(){
		$id = $this->uri->segment(3);
		
		$this->admin_model->delete_kamar($id);
        redirect(base_url() . 'admin/terhapus_kamar');
	}

	public function terhapus_kamar(){
		$this->kamar_list();
	}

	//tamu
	public function tamu_list(){
		$config['base_url'] = site_url('admin/tamu_list');
		$config['total_rows'] = $this->db->count_all('tamu');
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);

		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		
		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['tamus'] = $this->admin_model->fetch_tamu_perpage($config['per_page'], $data['page']);

		$data['pagination'] = $this->pagination->create_links();
		
		$this->load->view('.header.php');
		$this->load->view('admin/.nav-admin.php');
		$this->load->view('admin/tamu/index.php', $data);
		$this->load->view('.footer.php');
	}

	public function pemesanan_list(){

		$config['base_url'] = site_url('admin/pemesanan_list');
		$config['total_rows'] = $this->db->count_all('pemesanan');
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);

		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		
		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['pemesanans'] = $this->admin_model->fetch_pemesanan_perpage($config['per_page'], $data['page']);

		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('.header.php');
		$this->load->view('admin/.nav-admin.php');
		$this->load->view('admin/pemesanan/index.php', $data);
		$this->load->view('.footer.php');

	}

	public function konfirmasi_pembayaran(){
		$data = array(
			'idpesan'=>$this->input->post('mid'),
			'status'=>"Berhasil",
		);
		
		$this->admin_model->update_pemesanan_status($data);
		
		redirect(base_url() . 'admin/terkonfirmasi_pemesanan');
	}

	public function terkonfirmasi_pemesanan(){
		$this->pemesanan_list();
	}
}
