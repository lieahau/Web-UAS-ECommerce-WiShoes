<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Transaction extends CI_Controller
{
   
    public function __construct()
    {
        parent::__construct();
        $this->load->model("transaction_model");
        $this->load->library('form_validation');
       
    }

    public function index()
    {
          if(!isset($_SESSION['email'])){
            redirect(base_url());
        }
         $model = $this->transaction_model;
        $data["head"] = $this->load->view("admin/_partials/head.php",NULL,TRUE);
        $data["breadcrumb"] = $this->load->view("admin/_partials/breadcrumb",NULL,TRUE);
        $data["footer"] = $this->load->view("admin/_partials/footer",NULL,TRUE);
        $data["js"] = $this->load->view("admin/_partials/js",NULL,TRUE);
        $data["modal"] = $this->load->view("admin/_partials/modal",NULL,TRUE);
        $data["navbar"] = $this->load->view("admin/_partials/navbar",NULL,TRUE);
        $data["scrolltop"] = $this->load->view("admin/_partials/scrolltop",NULL,TRUE);
        $data["sidebar"] = $this->load->view("admin/transaction/sidebar",NULL,TRUE);
        $data["item"] = $model->getAll();
        $this->load->view("admin/transaction/home",$data);
    }
    public function del_pembelian($id=NULL){
         $model = $this->transaction_model;
        echo $id;
        $model->del_pembelian($id);
        redirect(site_url('/transaction'));
    }
    public function edit($id=NULL){
          if(!isset($_SESSION['email'])){
            redirect(base_url());
        }
        $model = $this->transaction_model;
        $data["head"] = $this->load->view("admin/_partials/head.php",NULL,TRUE);
        $data["breadcrumb"] = $this->load->view("admin/_partials/breadcrumb",NULL,TRUE);
        $data["footer"] = $this->load->view("admin/_partials/footer",NULL,TRUE);
        $data["js"] = $this->load->view("admin/_partials/js",NULL,TRUE);
        $data["modal"] = $this->load->view("admin/_partials/modal",NULL,TRUE);
        $data["navbar"] = $this->load->view("admin/_partials/navbar",NULL,TRUE);
        $data["scrolltop"] = $this->load->view("admin/_partials/scrolltop",NULL,TRUE);
        $data["sidebar"] = $this->load->view("admin/transaction/sidebar",NULL,TRUE);
        $data["pembelian"] = $model->pembelian($id);

        $supplier = $model->supplier();
        $data["supplier"] = $supplier;
        $this->load->view("admin/transaction/edit",$data);
    }
    public function add(){
          if(!isset($_SESSION['email'])){
            redirect(base_url());
        }
         $model = $this->transaction_model;
        $data["head"] = $this->load->view("admin/_partials/head.php",NULL,TRUE);
        $data["footer"] = $this->load->view("admin/_partials/footer",NULL,TRUE);
        $data["js"] = $this->load->view("admin/_partials/js",NULL,TRUE);
        $data["modal"] = $this->load->view("admin/_partials/modal",NULL,TRUE);
        $data["navbar"] = $this->load->view("admin/_partials/navbar",NULL,TRUE);
        $data["scrolltop"] = $this->load->view("admin/_partials/scrolltop",NULL,TRUE);
        $data["sidebar"] = $this->load->view("admin/transaction/sidebar",NULL,TRUE);
        $supplier = $model->supplier();
        $sepatu = $model->sepatu();
        $temp_pembelian = $model->temp_pembelian()->result();

        $query = $model->temp_total();
        
        $data["num"] = $model->temp_pembelian()->num_rows();
        $data["total"] = $query;
        $data["temp_pembelian"] = $temp_pembelian;
        $data["supplier"] = $supplier;
        $data["sepatu"] = $sepatu;
        
        $this->load->view("admin/transaction/add",$data);
    }
    public function delete($id=NULL){
         $model = $this->transaction_model;
        $model->del_temp($id);
        redirect(base_url('/index.php/transaction/add'));
    }
    public function addItem(){
        $model = $this->transaction_model;  
         $validation = $this->form_validation;
         $validation->set_rules($model->ruleItem());
         if($validation->run()){
            if($model->check_temp()){
                $model->update_temp();
                $this->session->set_flashdata('success', 'Item Berhasil diupdate');
            }else{
                $model->add_temp();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }

         }
         redirect(site_url('/transaction/add'));
    }
    public function addTransaction($num=0){
        
        if($num){
            $model = $this->transaction_model;
            $validation = $this->form_validation;
            $validation->set_rules($model->ruleTransaction());
            if($validation->run()){
                $model->add_transaction();
                redirect(site_url("transaction/"));
                
            }
        
        }
        $this->load->view('InvalidInput');
    }
    public function runedit(){
          $model = $this->transaction_model;
            $validation = $this->form_validation;
            $validation->set_rules($model->ruleTransaction());
            if($validation->run()){
                $model->edit_transaction();
                redirect(site_url("transaction/"));
                
            }
    }
    public function details($id=NULL){
          if(!isset($_SESSION['email'])){
            redirect(base_url());
        }
        $model = $this->transaction_model;
        $data["head"] = $this->load->view("admin/_partials/head.php",NULL,TRUE);
        $data["footer"] = $this->load->view("admin/_partials/footer",NULL,TRUE);
        $data["js"] = $this->load->view("admin/_partials/js",NULL,TRUE);
        $data["modal"] = $this->load->view("admin/_partials/modal",NULL,TRUE);
        $data["navbar"] = $this->load->view("admin/_partials/navbar",NULL,TRUE);
        $data["scrolltop"] = $this->load->view("admin/_partials/scrolltop",NULL,TRUE);
        $data["sidebar"] = $this->load->view("admin/transaction/sidebar",NULL,TRUE);
        $data["id_pembelian"] = $id;
        $data["item"] = $model->detail_item($id)->result();
        $this->load->view("/admin/transaction/details",$data);
    }
    public function del_details(){
        $id = $this->uri->segment(3);
        $id_pembelian = $this->uri->segment(4);
        $model = $this->transaction_model;
        $model->del_details($id,$id_pembelian);
        redirect(site_url('transaction/details/'.$id_pembelian));
    }
    public function edit_details(){
          if(!isset($_SESSION['email'])){
            redirect(base_url());
        }
        $model = $this->transaction_model;
        $validation = $this->form_validation;
        $validation->set_rules($model->ruleItem());
        $id = $this->uri->segment(3);
        $id_pembelian = $this->uri->segment(4);
        
        $data["head"] = $this->load->view("admin/_partials/head.php",NULL,TRUE);
        $data["footer"] = $this->load->view("admin/_partials/footer",NULL,TRUE);
        $data["js"] = $this->load->view("admin/_partials/js",NULL,TRUE);
        $data["navbar"] = $this->load->view("admin/_partials/navbar",NULL,TRUE);
        $data["scrolltop"] = $this->load->view("admin/_partials/scrolltop",NULL,TRUE);
        $data["sidebar"] = $this->load->view("admin/transaction/sidebar",NULL,TRUE);

        $detail_item = $model->return_detail_item($id)->row();
        $data["id"] = $id;
        $data["id_pembelian"] = $id_pembelian;
        $data["detail_item"] = $detail_item;
        $sepatu = $model->sepatu();
        $data["sepatu"] = $sepatu;
        if($validation->run()){
            $model->edit_details($id,$id_pembelian);
            redirect(site_url('/transaction/details/'.$id_pembelian));
        }
        $this->load->view('/admin/transaction/edit_details',$data);
    }

}
?>