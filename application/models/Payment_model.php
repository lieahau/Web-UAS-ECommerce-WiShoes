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
            $post = $this->input->post();
            if(!isset($post["id_sepatu"]) || !isset($post["jumlah"]))
                return FALSE;

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
                        ->row();
                        
            $exist = $this->db
                        ->get_where($this->_tabledetailpenjualan, ["id_penjualan" => $penjualanid->id, "id_sepatu" => $post["id_sepatu"]])
                        ->row();
            
            // if exist item in detailpenjualan then update not insert
            if(isset($exist)){
                $data->jumlah = $exist->jumlah + $post['jumlah'];
                $data->harga = $exist->harga + $harga->harga_satuan * $post["jumlah"];
                $this->db->where('id', $exist->id)->update($this->_tabledetailpenjualan, $data);
            }else{
                $data->id_sepatu = $post["id_sepatu"];
                $data->id_penjualan = $penjualanid->id;
                $data->jumlah = $post["jumlah"];
                $data->harga = $harga->harga_satuan * $post["jumlah"];
                
                $this->db->insert($this->_tabledetailpenjualan, $data);
            }

            $newHarga = $this->db
                            ->select('total_harga')
                            ->get_where($this->_tablepenjualan, ["id_user" => $userid, "timestamp" => NULL])
                            ->row();

            if(isset($exist))
                $newHarga->total_harga += $harga->harga_satuan * $post["jumlah"];
            else
                $newHarga->total_harga += $data->harga;
            
            $this->db->where('id', $penjualanid->id)->update($this->_tablepenjualan, $newHarga);
            return TRUE;
        }

        public function removeCart($userid, $id){
            if(!isset($id)) return FALSE;

            $kurang = $this->db
                        ->select('harga')
                        ->get_where($this->_tabledetailpenjualan, ["id" => $id])
                        ->row();
            
            if(!isset($kurang)) return FALSE;
            
            $this->db->delete($this->_tabledetailpenjualan, ['id' => $id]);
            $prevHarga = $this->db
                        ->select('id, total_harga')
                        ->get_where($this->_tablepenjualan, ["id_user" => $userid, "timestamp" => NULL])
                        ->row();
            $newHarga->total_harga = $prevHarga->total_harga - $kurang->harga;
            $this->db->where('id', $prevHarga->id)->update($this->_tablepenjualan, $newHarga);
            
            return TRUE;
        }

        public function removeAllCart($userid){
            $data = $this->db
                        ->select('id')
                        ->get_where($this->_tablepenjualan, ["id_user" => $userid, "timestamp" => NULL])
                        ->row();

            if(!isset($data)) return;
            
            $this->db->delete($this->_tabledetailpenjualan, ['id_penjualan' => $data->id]);
            $newHarga->total_harga = 0;
            $this->db->where('id', $data->id)->update($this->_tablepenjualan, $newHarga);
        }

        public function checkout($userid){
            $penjualan = $this->db
                    ->select('id, timestamp')
                    ->get_where($this->_tablepenjualan, ["id_user" => $userid, "timestamp" => NULL])
                    ->row();
                    
            if(!isset($penjualan)) return FALSE;
            $newData->timestamp = date("Y-m-d");
            $this->db->where('id', $penjualan->id)
                    ->update($this->_tablepenjualan, $newData);

            return TRUE;
        }
	}

?>