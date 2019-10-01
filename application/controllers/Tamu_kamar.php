<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamu_kamar extends CI_Controller {

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
		$this->load->model('tamu_kamar_model');
	}

	public function index()
	{
		$data['kamars'] = $this->tamu_kamar_model->fetch_data();

		$this->load->view('.header.php');
		$this->load->view('tamu/.nav-tamu.php');
		$this->load->view('tamu/kamar/index', $data);
		$this->load->view('.footer.php');
	}

	public function pesan_form(){
		$id = $this->uri->segment(3);
		$data['fetch_single'] = $this->tamu_kamar_model->fetch_single_data($id);
		$data['data_user'] = $this->tamu_kamar_model->fetch_single_user($this->session->userdata("id"));


		$this->load->view('.header.php');
		$this->load->view('tamu/.nav-tamu.php');
		$this->load->view('tamu/kamar/pesan_kamar', $data);
		$this->load->view('.footer.php');
	}

	public function pesan_save(){
		date_default_timezone_set("Asia/Bangkok");
		$data_tamu = $this->tamu_kamar_model->fetch_single_user($this->session->userdata("id"))->row();
		$now = date("Y-m-d H:i:s");
		$batas_bayar = date("Y-m-d H:i:s", strtotime('+5 hours'));

		$data = array(
			'tglpesan'=>$now,
			'batasbayar'=>$batas_bayar,
			'idkamar'=>$this->input->post('idkamar'),
			'tipe'=>$this->input->post('tipe'),
			'harga'=>$this->input->post('harga'),
			'jumlah'=>$this->input->post('jumlah'),
			'idtamu'=>$data_tamu->idtamu,
			'nama'=>$this->input->post('nama'),
			'alamat'=>$this->input->post('alamat'),
			'telepon'=>$this->input->post('notelp'),
			'tglmasuk'=>$this->input->post('tglmasuk'),
			'tglkeluar'=>$this->input->post('tglkeluar'),
			'lamahari'=>$this->input->post('lama_menginap'),
			'totalbayar'=>$this->input->post('total_biaya'),
			'status'=>'Pending...',
		);

		$this->tamu_kamar_model->insert_pemesanan($data);

		redirect(base_url() . 'tamu_kamar/riwayat_pemesanan/terpesan');
	}

	public function riwayat_pemesanan(){

		$data['pemesanans'] = $this->tamu_kamar_model->fetch_pemesanan_user($this->session->userdata("id"));

		$this->load->view('.header.php');
		$this->load->view('tamu/.nav-tamu.php');
		$this->load->view('tamu/kamar/riwayat_pemesanan', $data);
		$this->load->view('.footer.php');
	}

	public function pembayaran_form(){
		
		$data['data_user'] = $this->tamu_kamar_model->fetch_pemesanan_user($this->session->userdata("id"));

		$this->load->view('.header.php');
		$this->load->view('tamu/.nav-tamu.php');
		$this->load->view('tamu/kamar/pembayaran', $data);
		$this->load->view('.footer.php');
	}

	public function pembayaran_save(){
		
        $config['file_name'] = $this->input->post("idkamar");
		$config['upload_path'] = './uploads/tamu/bukti_pembayaran';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 10000;
       
		$this->load->library('upload', $config);
		$this->upload->overwrite = true;
		
        if ( ! $this->upload->do_upload('bukti')){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
            // redirect(base_url() . "tamu_kamar/pembayaran_form/" . $this->input->post("idkamar"));
        }else{
			
			$data = array(
				'idpesan'=>$this->input->post('idpesan'),
				'nama'=>$this->input->post('nama'),
				'jumlah_bayaran'=>$this->input->post('jumlah'),
				'bank'=>$this->input->post('bank'),
				'norek'=>$this->input->post('norek'),
				'namarek'=>$this->input->post('namarek'),
				'bukti_pembayaran'=>$this->upload->data('file_name'),
			);

			if($this->tamu_kamar_model->insert_pembayaran($data)){
				redirect(base_url() . 'tamu_kamar/riwayat_pemesanan/terbayar');
			}else{
				print_r($data);
			}
		}
	}
}
