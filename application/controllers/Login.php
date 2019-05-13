<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Login extends CI_Controller{
		
		public function index(){
			if(isset($_SESSION['email'])){
				redirect(base_url("index.php/report"));
			}
			$data["style"] = $this->load->view('stylelogin',NULL,TRUE);
			$this->load->view('login',$data);
		}
		public function checkLogin(){
			echo "test";
		}
	}
?>