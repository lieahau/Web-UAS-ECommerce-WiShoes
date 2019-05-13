<?php defined('BASEPATH') OR exit('No direct script access allowed');


class User_model extends CI_Model
{
	private $_table = "user";

	public $id;
	public $username;
	public $email;
	public $password;
	public $status;
	public $first_name;
	public $last_name;
	public $alamat;
	public $no_telp;

	public function rules($is_unique){
		return [
			['field' => 'username',
			'label' => 'Username',
			'rules' => 'required'],

			['field' => 'email',
			'label' => 'Email',
			'rules' => 'required'.$is_unique],


			['field' => 'password',
			'label' => 'Password',
			'rules' => 'required'],


			['field' => 'status',
			'label' => 'Status',
			'rules' => 'required'],


			['field' => 'first_name',
			'label' => 'FirstName',
			'rules' => 'required'],


			['field' => 'last_name',
			'label' => 'LastName',
			'rules' => ''],

			['field' => 'alamat',
			'label' => 'Address',
			'rules' => 'required'],

			['field' => 'no_telp',
			'label' => 'Phone',
			'rules' => 'required']
		];
	}

	public function getAll(){
		return $this->db->get($this->_table)->result();
	}

	public function getById($id){
		return $this->db->get_where($this->_table, ["id" =>$id])->row();
	}

	public function save(){
		$post = $this->input->post();
		
		$this->username = $post["username"];
		$this->email = $post["email"];
		$this->password = md5($post["password"]);
		$this->status = $post["status"];
		$this->first_name = $post["first_name"];
		$this->last_name = $post["last_name"];
		$this->alamat = $post["alamat"];
		$this->no_telp = $post["no_telp"];
		$this->db->insert($this->_table,$this);
	}

	public function signup(){
		$post = $this->input->post();
		
		$this->username = $post["username"];
		$this->email = $post["email"];
		$this->password = md5($post["password"]);
		$this->status = "User";
		$this->first_name = $post["first_name"];
		$this->last_name = $post["last_name"];
		$this->alamat = $post["alamat"];
		$this->no_telp = $post["no_telp"];
		$this->db->insert($this->_table,$this);
	}

	public function update(){
		$post = $this->input->post();
        $this->id = $post["id"];
        $this->username = $post["username"];
		$this->email = $post["email"];
		$this->password = $post["password"];
		$this->status = $post["status"];
		$this->first_name = $post["first_name"];
		$this->last_name = $post["last_name"];
		$this->alamat = $post["alamat"];
		$this->no_telp = $post["no_telp"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
	}
	
	public function delete($id){
		return $this->db->delete($this->_table, array('id' => $id));
	}
}
?>
