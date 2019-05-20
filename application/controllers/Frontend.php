<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 1 class for frontend
// check config/routes.php for more route informations
class Frontend extends CI_Controller {
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
        $data['listbrand'] = [];
        $data['listcarousel'] = [];
        $itemModel = $this->item_model;
        $brand_assets = directory_map('./assets/database/brands/');
        $brands = $itemModel->getAllMerk();
        for($i = 0;$i < count($brand_assets); $i++){
            for($j = 0;$j < count($brands); $j++){
                if(stripos($brand_assets[$i], $brands[$j]->merk) === 0){
                    array_push($data['listbrand'], $brand_assets[$i]);
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
                array_push($data['listcarousel'], $carousel_assets[$i]);
            }
        }

        // comment this var dump to hide
        // var_dump($data['listbrand']);
        // var_dump($data['listcarousel']);
        $this->initial['slickcss'] = $this->load->view('includes/slick-css.php', NULL, TRUE);
        $this->initial['slickjs'] = $this->load->view('includes/slick-js.php', NULL, TRUE);
        $data['initial'] = $this->initial;
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

        // use $data['listsepatu'] to access list of sepatu for this brand
        $data['listsepatu'] = $itemModel->getByMerk($brand);
        if (!$data['listsepatu']) show_404();

        // echo "brand: $brand ";
        // echo "listsepatu : ";
        // var_dump($data['listsepatu']);
        
        $this->initial['slickcss'] = $this->load->view('includes/slick-css.php', NULL, TRUE);
        $this->initial['slickjs'] = $this->load->view('includes/slick-js.php', NULL, TRUE);
        $data['initial'] = $this->initial;
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

        // use $data['sepatu'] to access sepatu content
        $data['sepatu'] = $itemModel->getById($id);
        if (!$data['sepatu']) show_404();

        // echo "shoe id: $id";
        // echo "shoe content : ";
        // var_dump($data['sepatu']);
        $data['initial'] = $this->initial;
        // change view name as you want
        $this->load->view('shoe', $data);
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
        if($something === ''){
            // echo "show all list of sepatu";
            $data['listsepatu'] = $itemModel->getAll();
            
            // echo "listsepatu : ";
            // var_dump($data['listsepatu']);
        }
        else{
            $data['listsepatu'] = $itemModel->searchByName($something);

            // echo "search: $something";
            // echo "listsepatu : ";
            // var_dump($data['listsepatu']);
        }

        $this->initial['slickcss'] = $this->load->view('includes/slick-css.php', NULL, TRUE);
        $this->initial['slickjs'] = $this->load->view('includes/slick-js.php', NULL, TRUE);
        $data['initial'] = $this->initial;
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

        $data['initial'] = $this->initial;
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

        $data['initial'] = $this->initial;
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

        $data['userdata'] = $user->getUserDataByEmail($_SESSION['email']);
        $data['listcart'] = $payment->getCart($user->getIdByEmail($_SESSION['email'])->id);
        $data['totalprice'] = $payment->getCartTotal($user->getIdByEmail($_SESSION['email'])->id);
        if(isset($data['listcart'])){
            foreach($data['listcart'] as $row){
                $row->detail = $itemModel->getById($row->id_sepatu);
            }
        }

        $data['initial'] = $this->initial;
        // var_dump($data['userdata']);
        // echo "<br>";
        // var_dump($data['listcart']);
        // echo "<br>";
        // var_dump($data['totalprice']);

        // change view name as you want
        $this->load->view('cart', $data);
    }

    public function addcart(){
        if(!isset($_SESSION['email'])){
            redirect(base_url("index.php"));
        }
        $user = $this->user_model;
        $payment = $this->Payment_model;
        if($payment->addCart($user->getIdByEmail($_SESSION['email'])->id))
            $this->output->set_status_header(200);
        else
            $this->output->set_status_header(500);
    }

    public function removeCart(){
        if(!isset($_SESSION['email'])){
            redirect(base_url("index.php"));
        }
        $post = $this->input->post();

        $user = $this->user_model;
        $payment = $this->Payment_model;
        if($payment->removeCart($user->getIdByEmail($_SESSION['email'])->id, $post['id']))
            $this->output->set_status_header(200);
        else
            $this->output->set_status_header(500);
    }

    public function removeAllCart(){
        if(!isset($_SESSION['email'])){
            redirect(base_url("index.php"));
        }
        $user = $this->user_model;
        $payment = $this->Payment_model;
        $payment->removeAllCart($user->getIdByEmail($_SESSION['email'])->id);
        redirect(base_url("index.php/cart"));
    }

    public function payment(){
        if(!isset($_SESSION['email'])){
            redirect(base_url("index.php"));
        }
        $user = $this->user_model;
        $payment = $this->Payment_model;
        $payment->checkout($user->getIdByEmail($_SESSION['email'])->id);
        redirect(site_url("cart"));
    }
    /* -----PAYMENT SEGMENT----- */
}