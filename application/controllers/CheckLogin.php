<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class CheckLogin extends CI_Controller{
		public function __construct(){
			parent::__construct();
        	$this->load->model("Login_model");
        	$this->load->library('form_validation');
        	
		}
		public function index(){
			if(isset($_SESSION['email'])){
				redirect(base_url("index.php/report"));
			}
			$model = $this->Login_model;
			$validation = $this->form_validation;
			$validation->set_rules($model->rules());
			
			if($validation->run()){
				$valid = $model->login();
				if($valid>0){
					$data = array(
						"email"=>$this->input->post("email")
					);
					$this->session->set_userdata($data);
					redirect(base_url("index.php/report"));
					
				}
				else{
					echo "Login Failed";
				}
			}
		}
		public function logout(){
			session_destroy();
			redirect(base_url());
		}
	}
?>