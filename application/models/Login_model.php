<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model{
	private $_table = "user"; 
	public function rules(){
		return [
			['field' => 'email',
			'label' => 'email',
			'rules' => 'required'],

			['field' => 'password',
			'label' => 'password',
			'rules' => 'required'],
		];
	}

	public function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			"email" => $email,
			"password" => md5($password),
			"status" => "Admin"
		);
		$query = $this->db->get_where($this->_table,$where);
		return $query->num_rows();
	}

	public function loginUser(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			"email" => $email,
			"password" => md5($password),
			"status" => "User"
		);
		$query = $this->db->get_where($this->_table,$where);
		return $query->num_rows();
	}
}