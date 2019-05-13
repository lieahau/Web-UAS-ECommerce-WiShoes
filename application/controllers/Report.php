<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Report extends CI_Controller
{
	  public function __construct()
	    {
	        parent::__construct();
	        $this->load->model("report_model");
	        $this->load->library('form_validation');
	       
	    }

	public function index(){
		  if(!isset($_SESSION['email'])){
            redirect(base_url());
        }
		$data["head"] = $this->load->view("admin/_partials/head.php",NULL,TRUE);
        $data["breadcrumb"] = $this->load->view("admin/_partials/breadcrumb",NULL,TRUE);
        $data["footer"] = $this->load->view("admin/_partials/footer",NULL,TRUE);
        $data["js"] = $this->load->view("admin/_partials/js",NULL,TRUE);
        $data["modal"] = $this->load->view("admin/_partials/modal",NULL,TRUE);
        $data["navbar"] = $this->load->view("admin/_partials/navbar",NULL,TRUE);
        $data["scrolltop"] = $this->load->view("admin/_partials/scrolltop",NULL,TRUE);
        $data["sidebar"] = $this->load->view("admin/report/sidebar",NULL,TRUE);
        $this->load->view("/admin/report/home",$data);
	}
	public function fullfillment(){
		  if(!isset($_SESSION['email'])){
            redirect(base_url());
        }
		$data["head"] = $this->load->view("admin/_partials/head.php",NULL,TRUE);
        $data["breadcrumb"] = $this->load->view("admin/_partials/breadcrumb",NULL,TRUE);
        $data["footer"] = $this->load->view("admin/_partials/footer",NULL,TRUE);
        $data["js"] = $this->load->view("admin/_partials/js",NULL,TRUE);
        $data["modal"] = $this->load->view("admin/_partials/modal",NULL,TRUE);
        $data["navbar"] = $this->load->view("admin/_partials/navbar",NULL,TRUE);
        $data["scrolltop"] = $this->load->view("admin/_partials/scrolltop",NULL,TRUE);
        $data["sidebar"] = $this->load->view("admin/report/sidebar",NULL,TRUE);
        $this->load->view("/admin/report/fullfilment",$data);
	}
	public function requestFull($id=NULL){
		header('Content-type: application/json');
		$model = $this->report_model;
		echo json_encode($model->getFull($id)->result());
	}
	public function requestProcure($id=NULL){
		header('Content-type: application/json');
		$model = $this->report_model;
		echo json_encode($model->getAll($id)->result());
	}
}
?>