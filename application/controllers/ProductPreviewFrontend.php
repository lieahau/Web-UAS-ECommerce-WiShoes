<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductPreviewFrontend extends CI_Controller {
    // Show main view
    // show product preview
    // buy in here and goes to shopping cart
    public function shoe($id)
	{
		echo "shoe id: $id";
    }
}