<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		$this->load->model('user_model');
		
		if($this->user_model->is_user_logged_in()){
			$this->load->view('dashboard_layout');
		} else {
			$this->load->view('login-page');
		}
	}

	public function user_login_data_check(){
		$this->form_validation->set_rules('username','User Name','trim|xss_clean|min_length[3]');
		$this->form_validation->set_rules('password','Password','trim|xss_clean');

		if($this->form_validation->run() == FALSE){
			$this->load->view('login-page');
		} else {
			$this->load->model('user_model');
			if($this->user_model->user_login_data_check()){
				redirect('dashboard');
			} else {
				$data['errorLogin'] = "Username or Password is Invalid!!!";
 				$this->load->view('login-page',$data);
			}
		}
	}

	public function logout(){
		$this->session->unset_userdata('current_user_id');
		$this->session->unset_userdata('current_user_name');	
		$this->session->sess_destroy();

		redirect("login/?logout=success");
	}
}
