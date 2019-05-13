<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Supplier_model extends CI_Model
{
	private $_table = "supplier";

	public $id;
	public $nama;
	public $alamat;
	public $no_telp;

	public function rules(){
		return [
			['field' => 'nama',
			'label' => 'Name',
			'rules' => 'required'],

			['field' => 'alamat',
			'label' => 'Addres',
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
		
		$this->nama = $post["nama"];
		$this->alamat = $post["alamat"];
		$this->no_telp = $post["no_telp"];
		$this->db->insert($this->_table,$this);
	}

	public function update(){
		$post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->no_telp = $post["no_telp"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
	}
	
	public function delete($id){
		return $this->db->delete($this->_table, array('id' => $id));
	}
}
?>
