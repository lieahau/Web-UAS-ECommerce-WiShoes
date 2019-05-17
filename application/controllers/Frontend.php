<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 1 class for frontend
// check config/routes.php for more route informations
class Frontend extends CI_Controller {
    public const LISTSEPATU = 'listsepatu';
    public const SEPATU = 'sepatu';
    public const EMPTYSEARCH = '';
    public const LISTBRAND = 'listbrand';
    public const LISTCAROUSEL = 'listcarousel';
    public const LISTCART = 'listcart';
    public const USERDATA = 'userdata';
    public const TOTALPRICE = 'totalprice';
    public const INITIAL = 'initial';
    public $initial;

    public function __construct(){
        parent::__construct();
        $this->load->model("item_model");
        $this->load->model("Login_model");
        $this->load->model("user_model");
        $this->load->model("Payment_model");
        $this->load->library('form_validation');
        $this->load->helper('directory');
        $this->load->helper('url');

        $this->initial = array(
            'header' => $this->load->view('includes/header.php', NULL, TRUE),
            'navbar' => $this->load->view('includes/navbar.php', NULL, TRUE),
            'footer' => $this->load->view('includes/footer.php', NULL, TRUE),
            'slickcss' => $this->load->view('includes/slick-css.php', NULL, TRUE),
            'slickjs' => $this->load->view('includes/slick-js.php', NULL, TRUE)
        );
    }

    /* -----HOME SEGMENT----- */
    // Show main view
    // show list of brand
    // if click then go to list of product
    // route: index.php
    public function index()
	{
        // get map of file in /assets/database/brands and /assets/database/carousels
        // then get brand and carousel images
        $data[Frontend::LISTBRAND] = [];
        $data[Frontend::LISTCAROUSEL] = [];
        $itemModel = $this->item_model;
        $brand_assets = directory_map('./assets/database/brands/');
        $brands = $itemModel->getAllMerk();
        for($i = 0;$i < count($brand_assets); $i++){
            for($j = 0;$j < count($brands); $j++){
                if(stripos($brand_assets[$i], $brands[$j]->merk) === 0){
                    array_push($data[Frontend::LISTBRAND], $brand_assets[$i]);
                    array_splice($brand_assets, $i, 1);
                    $i--;
                    array_splice($brands, $j, 1);
                    break;
                }
            }
        }

        $carousel_assets = directory_map('./assets/database/carousels/');
        for($i = 0;$i < count($carousel_assets); $i++){
            if(stripos($carousel_assets[$i], 'carousel_') === 0){
                array_push($data[Frontend::LISTCAROUSEL], $carousel_assets[$i]);
            }
        }

        // comment this var dump to hide
        // var_dump($data[Frontend::LISTBRAND]);
        // var_dump($data[Frontend::LISTCAROUSEL]);
        $data[Frontend::INITIAL] = $this->initial;
		$this->load->view('home', $data);
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

        // echo "brand: $brand ";
        // echo "listsepatu : ";
        // var_dump($data[Frontend::LISTSEPATU]);
        
        $data[Frontend::INITIAL] = $this->initial;
        // change view name as you want
        // best case if front end per brand use 1 view php only
        $this->load->view('brand', $data);
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
        $data[Frontend::INITIAL] = $this->initial;
        // change view name as you want
        //$this->load->view('sepatufrontend', $data);
    }
    /* -----SHOE SEGMENT----- */

    /* -----SEARCH SEGMENT----- */
    // show list of searched products
    // route: index.php/shoe
    // route: index.php/shoe/$something
    public function search($something = '')
	{
        $itemModel = $this->item_model;

        // show all product if $something empty
        // show search result if not empty
        if($something == Frontend::EMPTYSEARCH){
            // echo "show all list of sepatu";
            // $data[Frontend::LISTSEPATU] = $itemModel->getAll();
            
            // echo "listsepatu : ";
            // var_dump($data[Frontend::LISTSEPATU]);
        }
        else{
            $data[Frontend::LISTSEPATU] = $itemModel->searchByName($something);

            // echo "search: $something";
            // echo "listsepatu : ";
            // var_dump($data[Frontend::LISTSEPATU]);
        }

        $data[Frontend::INITIAL] = $this->initial;
        // change view name as you want
        $this->load->view('search', $data);
    }

    // utility for form to redirect
    public function browse()
    {
        $search = $this->input->post("search");

        if(isset($search)){
            redirect(base_url('index.php/search/'.$search));
        }
        else{
            redirect(base_url("index.php"));
        }
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
        //echo 'this is signup';

        $data[Frontend::INITIAL] = $this->initial;
		// change view name as you want
        $this->load->view('signup', $data);

        // when post signin data use /index.php/signinhandle
        // when signout use /index.php/signout
    }

    public function signin()
	{
        if(isset($_SESSION['email'])){
            redirect(base_url("index.php"));
        }
        //echo 'this is signin';

        $data[Frontend::INITIAL] = $this->initial;
		// change view name as you want
        $this->load->view('signinfrontend', $data);

        // when post signin data use /index.php/signinhandle
        // when signout use /index.php/signout
    }

    // handle sign up process not view
    // use this for processing sign up data
    // will not show any view
    // route: index.php/signuphandle
    public function signupHandle()
	{
        $user = $this->user_model;
        $user->signup();

        redirect(base_url("index.php"));
    }

    // handle sign in process not view
    // use this for processing sign in data
    // will not show any view
    // route: index.php/signinhandle
    public function signinHandle()
	{
        $model = $this->Login_model;
        $valid = $model->loginFrontend();
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

    // handle sign out process
    // use this when you want to sign out
    // route: index.php/signout
    public function signout()
    {
        session_destroy();
		redirect(base_url());
    }
    /* -----AUTHENTICATION SEGMENT----- */

    /* -----PAYMENT SEGMENT----- */
    public function cart(){
        if(!isset($_SESSION['email'])){
            redirect(base_url("index.php"));
        }
        $user = $this->user_model;
        $payment = $this->Payment_model;
        $itemModel = $this->item_model;

        $data[Frontend::USERDATA] = $user->getUserDataByEmail($_SESSION['email']);
        $data[Frontend::LISTCART] = $payment->getCart($user->getIdByEmail($_SESSION['email'])->id);
        $data[Frontend::TOTALPRICE] = $payment->getCartTotal($user->getIdByEmail($_SESSION['email'])->id);
        foreach($data[Frontend::LISTCART] as $row){
            $row->detail = $itemModel->getById($row->id_sepatu);
        }

        $data[Frontend::INITIAL] = $this->initial;
        var_dump($data[Frontend::USERDATA]);
        echo "<br>";
        var_dump($data[Frontend::LISTCART]);
        echo "<br>";
        var_dump($data[Frontend::TOTALPRICE]);

        // change view name as you want
        //$this->load->view('cartfrontend', $data);
    }

    public function addcart(){
        if(!isset($_SESSION['email'])){
            redirect(base_url("index.php"));
        }
        $user = $this->user_model;
        $payment = $this->Payment_model;
        $payment->addCart($user->getIdByEmail($_SESSION['email'])->id);
    }

    public function removeCart($id){
        if(!isset($_SESSION['email'])){
            redirect(base_url("index.php"));
        }
        $user = $this->user_model;
        $payment = $this->Payment_model;
        $payment->removeCart($user->getIdByEmail($_SESSION['email'])->id, $id);
    }

    public function removeAllCart(){
        if(!isset($_SESSION['email'])){
            redirect(base_url("index.php"));
        }
        $user = $this->user_model;
        $payment = $this->Payment_model;
        $payment->removeAllCart($user->getIdByEmail($_SESSION['email'])->id);
    }

    public function payment(){
        if(!isset($_SESSION['email'])){
            redirect(base_url("index.php"));
        }
        $user = $this->user_model;
        $payment = $this->Payment_model;
        $itemModel = $this->item_model;

        $data[Frontend::USERDATA] = $user->getUserDataByEmail($_SESSION['email']);
        $data[Frontend::TOTALPRICE] = $payment->getCartTotal($user->getIdByEmail($_SESSION['email'])->id);
        
        $data[Frontend::INITIAL] = $this->initial;
        var_dump($data[Frontend::USERDATA]);
        echo "<br>";
        var_dump($data[Frontend::TOTALPRICE]);

        // change view name as you want
        //$this->load->view('paymentfrontend', $data);
    }
    /* -----PAYMENT SEGMENT----- */
}