<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
	{
		parent :: __construct(); 
			//load the validation library
		// $this->load->library('form_validation');
		// $this->load->library("pagination");
        // if($this->session->userdata('username') == ''){
        //     redirect(base_url() . 'login');
		// }
		$this->load->model("login_model");
    }
    
    public function index(){
        $this->load->view('.header.php');
        $this->load->view('login/index');
        $this->load->view('.footer.php');
    }

    public function login_validation(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // $this->load->model('login_model');

        $data = array(
            'username'=> $username,
            'password'=> md5($password),
        );
        

        $user = $this->login_model->fetch_user($data)->row();
        if(!empty($user)){
            if($user->level_user == 1){ 
                $session_data = array(
                    'id'=> $user->idtamu,
                    'username' => $username,
                    'level_user' => $user->level_user
                );
                $this->session->set_userdata($session_data);
                redirect(base_url() . 'login/enter');
            }else if($user->level_user == 2){
                $session_data = array(
                    'id'=> $user->idtamu,
                    'username' => $username,
                    'level_user' => $user->level_user
                );
                $this->session->set_userdata($session_data);
                redirect(base_url() . 'login/enter');
            }else{
                redirect(base_url() . 'login');
            }
        }else{
            redirect(base_url() . 'login');
        }
    }

    function enter(){
        if($this->session->userdata('username') != '' && $this->session->userdata('level_user') == '1'){
            //echo '<h2>Welcome - ' . $this->session->userdata('username'). '</h2>';
            //echo '<label><a href="' . base_url() . 'login/logout">Logout</a></label>';
            redirect(base_url() . 'admin');
        }else if($this->session->userdata("username") != '' && $this->session->userdata('level_user') == '2'){
            redirect(base_url() . 'tamu_kamar');
        }else{
            redirect(base_url() . 'login');
        }
    }

    function registrasi_form(){
        $this->load->view('.header.php');
        $this->load->view('login/registrasi');
        $this->load->view('.footer.php');
    }

    function registrasi_save(){
        $data = array(
            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password'),
            'email'=>$this->input->post('email'),
            'nama'=>$this->input->post('nama'),
            'alamat'=>$this->input->post('alamat'),
            'telepon'=>$this->input->post('notelp'),
        );

        print_r($data);
    }

    function logout(){
        $this->session->unset_userdata('username');
        redirect(base_url() . 'login');
    }
}