<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 1 class for frontend
// check config/routes.php for more route informations
class Frontend extends CI_Controller {
    public const LISTSEPATU = 'listsepatu';
    public const SEPATU = 'sepatu';
    public const EMPTYSEARCH = 'null';

    public function __construct(){
        parent::__construct();
        $this->load->model("item_model");
        $this->load->model("Login_model");
        $this->load->model("user_model");
        $this->load->library('form_validation');
    }

    /* -----HOME SEGMENT----- */
    // Show main view
    // show list of brand
    // if click then go to list of product
    // route: index.php
    public function index()
	{
		$this->load->view('home');
    }
    /* -----HOME SEGMENT----- */

    /* -----BRAND SEGMENT----- */
    // show list of product
    // if click then go to product preview
    // route: index.php/brand/$brand
    public function brand($brand)
    {
        $itemModel = $this->item_model;

        // use $data[Frontend::LISTSEPATU] to access list of sepatu for this brand
        $data[Frontend::LISTSEPATU] = $itemModel->getByMerk($brand);
        if (!$data[Frontend::LISTSEPATU]) show_404();

        echo "brand: $brand ";
        echo "listsepatu : ";
        var_dump($data[Frontend::LISTSEPATU]);

        // change view name as you want
        // best case if front end per brand use 1 view php only
        //$this->load->view('merkfrontend', $data);
    }
    /* -----BRAND SEGMENT----- */

    /* -----SHOE SEGMENT----- */
    // Show main view
    // show product preview
    // buy in here and goes to shopping cart
    // route: index.php/shoe/$id
    public function shoe($id)
	{
        $itemModel = $this->item_model;

        // use $data[Frontend::SEPATU] to access sepatu content
        $data[Frontend::SEPATU] = $itemModel->getById($id);
        if (!$data[Frontend::SEPATU]) show_404();

        echo "shoe id: $id";
        echo "shoe content : ";
        var_dump($data[Frontend::SEPATU]);

        // change view name as you want
        //$this->load->view('sepatufrontend', $data);
    }
    /* -----SHOE SEGMENT----- */

    /* -----SEARCH SEGMENT----- */
    // show list of searched products
    // route: index.php/shoe
    // route: index.php/shoe/$something
    public function search($something)
	{
        $itemModel = $this->item_model;

        // show all product if $something empty
        // show search result if not empty
        if($something == Frontend::EMPTYSEARCH){
            echo "show all list of sepatu";
            $data[Frontend::LISTSEPATU] = $itemModel->getAll();
            
            echo "listsepatu : ";
            var_dump($data[Frontend::LISTSEPATU]);
        }
        else{
            $data[Frontend::LISTSEPATU] = $itemModel->searchByName($something);

            echo "search: $something";
            echo "listsepatu : ";
            var_dump($data[Frontend::LISTSEPATU]);
        }

        // change view name as you want
        //$this->load->view('searchfrontend', $data);
    }
    /* -----SEARCH SEGMENT----- */


    /* -----AUTHENTICATION SEGMENT----- */
    // sign in
    // handle sign in view
    // route: index.php/signin
    public function signup()
	{
        if(isset($_SESSION['email'])){
            redirect(base_url("index.php"));
        }
        echo 'this is signup';

		// change view name as you want
        //$this->load->view('signupfrontend');

        // when post signin data use /index.php/signinhandle
        // when signout use /index.php/signout
    }

    public function signin()
	{
        if(isset($_SESSION['email'])){
            redirect(base_url("index.php"));
        }
        echo 'this is signin';
		// change view name as you want
        //$this->load->view('signinfrontend');

        // when post signin data use /index.php/signinhandle
        // when signout use /index.php/signout
    }

    // handle sign up process not view
    // use this for processing sign up data
    // will not show any view
    // route: index.php/signuphandle
    public function signupHandle()
	{
        $is_unique = '|is_unique[user.email]';
        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules($is_unique));

        if ($validation->run()) {
            $user->signup();
            $this->session->set_flashdata('success', 'Success creating your account');
        }

        redirect(base_url("index.php"));
    }

    // handle sign in process not view
    // use this for processing sign in data
    // will not show any view
    // route: index.php/signinhandle
    public function signinHandle()
	{
        $model = $this->Login_model;
        $validation = $this->form_validation;
        $validation->set_rules($model->rules());
        
        if($validation->run()){
            $valid = $model->loginUser();
            if($valid>0){
                $data = array(
                    "email"=>$this->input->post("email")
                );
                $this->session->set_userdata($data);
                redirect(base_url("index.php"));
                
            }
            else{
                echo "Login Failed";
            }
        }
    }

    // handle sign out process
    // use this when you want to sign out
    // route: index.php/signout
    public function signout()
    {
        session_destroy();
		redirect(base_url());
    }
    /* -----AUTHENTICATION SEGMENT----- */
}