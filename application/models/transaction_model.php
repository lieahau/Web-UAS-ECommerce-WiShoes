<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class transaction_model extends CI_Model{
		private $_tablesupp="supplier";
		private $_tablebarang = "sepatu";
		private $num_item=0;
		public function ruleItem(){
			return [
				['field' => 'nama',
				'label' => 'nama',
				'rules' => 'required'],
				['field' => 'jumlah',
				'label' => 'jumlah',
				'rules' => 'required'],
				
				['field' => 'subtotal',
				'label' => 'subtotal',
				'rules' => 'required'],
			];
		}
		public function ruleTransaction(){
			return[
				['field' => 'Nama_supplier',
				'label' => 'Nama_supplier',
				'rules' => 'required'],
				['field' => 'id_supplier',
				'label' => 'id_supplier',
				'rules' => 'required'],
				
			];
		}
		public function getAll(){
			$this->db->select("pembelian.id,nama,alamat,no_telp,timestamp,total_harga,diskon,pajak");
			$this->db->from("pembelian");
			$this->db->join("supplier","supplier.id = pembelian.id_supplier","left");
			return $this->db->get()->result();
		}
		public function del_pembelian($id){
			$this->db->delete("detail_pembelian", array('id_pembelian' => $id));
			return $this->db->delete("pembelian", array('id' => $id));
		}
		public function supplier(){
			return $this->db->get($this->_tablesupp)->result();
		}

		public function sepatu(){
			return $this->db->get($this->_tablebarang)->result();
		}
		public function temp_pembelian(){
			$this->db->select("*");
			$this->db->from("temp_pembelian");
			$this->db->join("sepatu","temp_pembelian.id_sepatu = sepatu.id");
			$query=$this->db->get();
			$this->num_item = $query->num_rows();
		
			return $query;
		}
		public function del_temp($id){
			
			return $this->db->delete("temp_pembelian", array('id_sepatu' => $id));
		}
		public function check_temp(){
			$id = $this->input->post("id");
			$query = $this->db->get("temp_pembelian")->result();
			foreach ($query as $value) {
				if($value->id_sepatu == $id){
					return true;
				}
				
			}
			return false;
		}
		public function add_temp(){
			$id = $this->input->post('id');
			$jlh = $this->input->post('jumlah');
			$subtotal = $this->input->post('subtotal');
			$input = array(
				'id_sepatu' =>$id,
				'jumlah' => $jlh,
				'harga'=>$subtotal
			);
			$this->db->insert("temp_pembelian",$input);
		}
		public function update_temp(){
			$id = $this->input->post('id');
			$jlh = $this->input->post('jumlah');
			$subtotal = $this->input->post('subtotal');
			$input = array(
				'id_sepatu' =>$id,
				'jumlah' => $jlh,
				'harga'=>$subtotal
			);
			$this->db->query("update temp_pembelian set jumlah=jumlah+$jlh, harga=harga+$subtotal where id_sepatu='$id'");

		}
		public function temp_total(){
			return $this->db->query("select sum(harga) as total from temp_pembelian")->row()->total;
		}
		public function add_transaction(){
			
			
				$id_supplier = $this->input->post('id_supplier');
				$grandtotal = $this->input->post('grandtotal');
				$date = date("Y-m-d");
				$pajak = $this->input->post('pajak');
				$diskon = $this->input->post('diskon');

				$input = array(
					'timestamp'=>$date,
					'pajak'=>$pajak,
					'diskon'=>$diskon,
					'id_supplier'=>$id_supplier,
					'total_harga'=>$grandtotal
				);
				$this->db->query("insert into pembelian values('','$id_supplier','$date','$pajak','$diskon','$grandtotal')");
				$id_pembelian = $this->db->order_by('id','desc')->limit(1)->get('pembelian')->row()->id;
				echo $id_pembelian;
				$this->db->query("insert into detail_pembelian (id_pembelian,id_sepatu,jumlah,harga) select '$id_pembelian',temp_pembelian.id_sepatu, temp_pembelian.jumlah,temp_pembelian.harga from temp_pembelian");
				$this->db->query("truncate temp_pembelian");
			

		}
		public function pembelian($id){
			return $this->db->get_where("pembelian",array('id'=>$id))->row();
		}
		public function edit_transaction(){
			$id = $this->input->post('id');
			$id_supplier = $this->input->post('id_supplier');
			
			$grandtotal = $this->input->post('grandtotal');
			$date = $this->input->post("date");
			$input = array(
					'timestamp'=>$date,
					
					'id_supplier'=>$id_supplier,
					'total_harga'=>$grandtotal
			);
			$this->db->update("pembelian",$input,array('id'=>$id));
		}
		public function detail_item($id=NULL){
			$sql = "select detail_pembelian.id, Nama,merk,ukuran,jumlah,harga, detail_pembelian.id_sepatu from detail_pembelian inner join sepatu on detail_pembelian.id_sepatu = sepatu.id where detail_pembelian.id_pembelian = '$id'";
			$query = $this->db->query($sql);
			
			return $query;
		}
		public function return_detail_item($id=NULL){
			return $this->db->get_where("detail_pembelian",array("id"=>$id));
		}
		public function del_details($id,$id_pembelian){
			$this->db->delete("detail_pembelian",array('id'=>$id));
			$this->edit_harga($id_pembelian);
		}
		public function edit_details($id,$id_pembelian){
			$id_sepatu = $this->input->post("id");
			$jumlah = $this->input->post("jumlah");
			$harga = $this->input->post("subtotal");
			$data = array(
				'id_sepatu'=>$id_sepatu,
				'jumlah'=>$jumlah,
				'harga'=>$harga
			);

			$this->db->update("detail_pembelian",$data,array('id'=>$id));
			$this->edit_harga($id_pembelian);
		}
		public function edit_harga($id){
			$query = $this->db->query("select sum(harga) as total from detail_pembelian where id_pembelian='$id'")->row();
			$get = $this->db->query("select pajak,diskon from pembelian where id='$id'")->row();
			$total = $query->total;
			$diskon = $get->diskon;
			$pajak = $get->pajak;
			
			$grandtotal = 0;
			$grandtotal = $total-($diskon/100*$total)+($pajak/100*$total);
			
			$query2 = $this->db->update("pembelian",array('total_harga'=>$grandtotal),array('id'=>$id));


		}
	}

?>