<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchFrontend extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
    
    // Show main view
    // show list of products and can search
    public function index()
	{
		echo "index";
    }

    public function search($something)
	{
		echo "search: $something";
    }
}