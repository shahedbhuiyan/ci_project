<?php

class Dashboard extends CI_Controller{
	public function index(){
		$this->load->model('user_model');
		if($this->user_model->is_user_logged_in()){
			$this->load->view('dashboard_layout');
		} else {
			redirect('login/?logged_in_first');
		}
	}
}