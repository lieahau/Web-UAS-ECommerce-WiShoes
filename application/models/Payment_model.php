<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Payment_model extends CI_Model{
		private $_tablepenjualan="penjualan";
        private $_tabledetailpenjualan = "detail_penjualan";
        private $_tablesepatu = "sepatu";
        
        public function getCart($userid){
            // get penjualan id where timestamp null mean cart
            $penjualanid = $this->db
                                ->select('id')
                                ->get_where($this->_tablepenjualan, ["id_user" => $userid, "timestamp" => NULL])
                                ->row();

            if(!isset($penjualanid)) return NULL;
            // get cart list with sepatu detail
            $result = $this->db
                            ->select('id, id_sepatu, jumlah, harga')
                            ->get_where($this->_tabledetailpenjualan, ["id_penjualan" => $penjualanid->id])
                            ->result();
            
            return $result;
        }

        public function getCartTotal($userid){
            // get penjualan id where timestamp null mean cart
            $totalharga = $this->db
                                ->select('total_harga')
                                ->get_where($this->_tablepenjualan, ["id_user" => $userid, "timestamp" => NULL])
                                ->row();
            
            if(!isset($totalharga)) return NULL;
            return $totalharga->total_harga;
        }

        public function addCart($userid){
            if(!isset($post["id_sepatu"]) || !isset($post["jumlah"]))
                return;

            // check if cart penjualan exist if not then create one
            $penjualanid = $this->db
                                ->select('id')
                                ->get_where($this->_tablepenjualan, ["id_user" => $userid, "timestamp" => NULL])
                                ->row();
            if(!isset($penjualanid)){
                $this->db->insert($this->_tablepenjualan, ['id_user'=>$userid]);
                $penjualanid = $this->db
                                ->select('id')
                                ->get_where($this->_tablepenjualan, ["id_user" => $userid, "timestamp" => NULL])
                                ->row();
            }

            $harga = $this->db
                        ->select('harga_satuan')
                        ->get_where($this->_tablesepatu, ["id" => $post["id_sepatu"]])
                        ->row()
                        ->harga_satuan * $post["jumlah"];
            $data = array(
                'id_sepatu' => $post["id_sepatu"],
                'id_penjualan' => $penjualanid,
                'jumlah' => $post["jumlah"],
                'harga' => $harga
            );
            
            $this->db->insert($this->_tabledetailpenjualan, $data);
            
            $newHarga = $this->db
                        ->select('total_harga')
                        ->get_where($this->_tablepenjualan, ["id_user" => $userid, "timestamp" => NULL])
                        ->row();
            $newHarga->total_harga += $harga;
            $this->db->where('id_user', $userid)->update($this->_tablepenjualan, $newHarga);
        }

        public function removeCart($userid, $id){
            $kurang = $this->db
                        ->select('harga')
                        ->get_where($this->_tabledetailpenjualan, ["id" => $id])
                        ->row();
            
            if(!isset($kurang)) return;
            
            $this->db->delete($this->_tabledetailpenjualan, ['id' => $id]);
            $newHarga = $this->db
                        ->select('total_harga')
                        ->get_where($this->_tablepenjualan, ["id_user" => $userid, "timestamp" => NULL])
                        ->row();
            $newHarga->total_harga -= $kurang->harga;
            $this->db->where('id_user', $userid)->update($this->_tablepenjualan, $newHarga);
        }

        public function removeAllCart($userid){
            $penjualanid = $this->db
                                ->select('id')
                                ->get_where($this->_tablepenjualan, ["id_user" => $userid, "timestamp" => NULL])
                                ->row();

            if(!isset($penjualanid)) return;
            
            $this->db->delete($this->_tabledetailpenjualan, ['id_penjualan' => $penjualanid->id]);    
            $newHarga = $this->db
                    ->select('total_harga')
                    ->get_where($this->_tablepenjualan, ["id_user" => $userid, "timestamp" => NULL])
                    ->row();
            $newHarga->total_harga = 0;
            $this->db->where('id_user', $userid)->update($this->_tablepenjualan, $newHarga);
        }

        public function checkout($userid){
            $penjualanid = $this->db
                                ->select('id')
                                ->get_where($this->_tablepenjualan, ["id_user" => $userid, "timestamp" => NULL])
                                ->row();

            if(!isset($penjualanid)) return;
            
            $newHarga = $this->db
                    ->select('timestamp')
                    ->get_where($this->_tablepenjualan, ["id_user" => $userid, "timestamp" => NULL])
                    ->row();
            $newHarga->timestamp = date("Y-m-d");
            $this->db->where('id_user', $userid)->update($this->_tablepenjualan, $newHarga);
        }
	}

?>