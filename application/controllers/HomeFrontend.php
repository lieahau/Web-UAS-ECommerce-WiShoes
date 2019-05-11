<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeFrontend extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }

    //public function 

    // Show main view
    // show list of brand
    // if click then go to list of product
    public function index()
	{
		$this->load->view('home');
    }

    // show list of product
    // if click then go to product preview
    public function brand($id)
    {
        echo "brand: $id";
    }
}