<?php

class User_model extends CI_model{
	public function user_login_data_check(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$attr = array(
			'email' => $username,
			'password' => $password
		);

		$result = $this->db->get_where('student',$attr);
		if($result->num_rows() == 1){
			$attr = array(
				'current_user_id' => $result->row(0)->id,
				'current_user_name' => $username
			);

			$this->session->set_userdata($attr);
			return true;
		} else {
			return false;
		}
	}

	public function is_user_logged_in(){
		return $this->session->userdata("current_user_id") != false;
	}

}