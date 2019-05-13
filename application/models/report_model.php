<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class report_model extends CI_Model{
		public function getAll($id=NULL){
			$query = $this->db->query("select sum(total_harga) as total,timestamp from pembelian where month(timestamp)='$id' group by timestamp");
			return $query;
		}
		public function getFull($id=NULL){
			$query = $this->db->query("select sum(total_harga) as total,timestamp from penjualan where month(timestamp)='$id' group by timestamp");
			return $query;
		}
	}
?>