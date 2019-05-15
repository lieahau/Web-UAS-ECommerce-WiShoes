<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Item_model extends CI_Model
{
	private $_table = "sepatu";

	public $id;
	public $nama;
	public $merk;
	public $jenis;
	public $ukuran;
	public $image = "default.jpg";
	public $stok;
	public $harga_satuan;

	public function rules(){
		return [
			['field' => 'nama',
			'label' => 'nama',
			'rules' => 'required'],

			['field' => 'merk',
			'label' => 'Brand',
			'rules' => 'required'],

			['field' => 'jenis',
			'label' => 'Type',
			'rules' => 'required'],

			['field' => 'ukuran',
			'label' => 'Size',
			'rules' => 'required'],

			['field' => 'stok',
			'label' => 'Stock',
			'rules' => 'required'],

			['field' => 'harga_satuan',
			'label' => 'Price',
			'rules' => 'required']
		];
	}

	public function getAll(){
		return $this->db->get($this->_table)->result();
	}

	public function getAllMerk(){
		return $this->db->select("merk")->group_by("merk")->get($this->_table)->result();
	}

	public function getById($id){
		return $this->db->get_where($this->_table, ["id" =>$id])->row();
	}

	public function getByMerk($merk){
		return $this->db->get_where($this->_table, ["merk" =>$merk])->result();
	}

	public function searchByName($search){
		return $this->db
					->like('nama', $search)
					->get($this->_table)
					->result();
	}

	public function save(){
		$post = $this->input->post();
		$this->nama = $post["nama"];
		$this->merk = $post["merk"];
		$this->jenis = $post["jenis"];
		$this->ukuran = $post["ukuran"];
		$this->stok = $post["stok"];
		$this->harga_satuan = $post["harga_satuan"];
		$this->image = $this->_uploadImage();
		$this->db->insert($this->_table,$this);
	}

	public function update(){
		$post = $this->input->post();
        $this->id = $post["id"];
        $this->merk = $post["merk"];
		$this->jenis = $post["jenis"];
		$this->ukuran = $post["ukuran"];
		$this->stok = $post["stok"];
		$this->harga_satuan = $post["harga_satuan"];
		if (!empty($_FILES["image"]["name"])) {
		    $this->image = $this->_uploadImage();
		} else {
		    $this->image = $post["old_image"];
		}
        $this->db->update($this->_table, $this, array('id' => $post['id']));
	}
	
	public function delete($id){
		return $this->db->delete($this->_table, array('id' => $id));
	}

	private function _uploadImage()
	{
		$config['upload_path']          = './assets/database/shoes/'.$this->merk.'/';
		if(!is_dir($config['upload_path'])){
			mkdir($config['upload_path'], 0777, TRUE);
			copy('./assets/database/shoes/default.jpg', $config['upload_path'].'default.jpg');
		}

	    $config['allowed_types']        = 'gif|jpg|png';
	    $config['file_name']            = uniqid();
	    $config['overwrite']			= true;
	    $config['max_size']             = 10240; // 10MB
	    // $config['max_width']            = 1024;
	    // $config['max_height']           = 768;

	    $this->load->library('upload', $config);

	    if ($this->upload->do_upload('image')) {
	        return $this->upload->data("file_name");
	    }
	    
	    return "default.jpg";
	}

}
?>
