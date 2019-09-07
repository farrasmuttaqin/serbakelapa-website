<?php
	
	class Checkout_model extends CI_Model{
		public function __construct()
		{
			parent::__construct();
        }
        
		public function getInvoice($nomor_invoice)
		{
            $this->db->select('*');
            $this->db->from('tb_order a'); 
			$this->db->join('tb_order_detail b', 'b.nomor_invoice=a.nomor_invoice', 'left');
			$this->db->join('tb_product c', 'c.id_product=b.id_product', 'left');
            $this->db->where('a.nomor_invoice',$nomor_invoice);   
			return $this->db->get();
		}

		public function getIdProduct($nomor_invoice)
		{
			$this->db->select('*');
			$this->db->from('tb_order_detail');
			$this->db->where("nomor_invoice = $nomor_invoice");
			return $this->db->get();
		}

		public function cekStock($id_product)
		{
			$this->db->select('*');
			$this->db->from('tb_product');
			$this->db->where("id_product = $id_product");
			return $this->db->get();
		}

		public function kurangProduct($idid,$quantity)
		{
			$where = "id_product = '$idid'";
			$this->db->set('productStock', 'productStock-'.$quantity, FALSE);
			$this->db->where($where);
			$this->db->update('tb_product');
		}

		public function tambahProduct($idid,$quantity)
		{
			$where = "id_product = '$idid'";
			$this->db->set('productStock', 'productStock+'.$quantity, FALSE);
			$this->db->where($where);
			$this->db->update('tb_product');
		}
		
		public function getNomor()
		{
			$this->db->select('nomor_invoice');
			$this->db->from('tb_order');
			return $this->db->get();
		}
		
		public function ubahNomor($id_user,$nomor_invoice)
		{
			$where = "id_user = '$id_user' AND nomor_invoice = 100000001 ";
			$this->db->set('nomor_invoice', $nomor_invoice);
			$this->db->where($where);
			$this->db->update('tb_order_detail');
		}
		
		public function insert($save){
			return $this->db->insert("tb_order",$save);
		}
		
		public function orderProduct($id_user,$nomor_invoice,$gambar)
		{
			$res = array(
              'orderBuktiTransaksi' => $gambar,
              'status_pembayaran' => 'Sudah dibayar',
              'status_pengiriman_barang' => 'Belum dikirim'
            );
			$where = "id_user = $id_user AND nomor_invoice = $nomor_invoice ";
			$this->db->where($where);
			$this->db->update('tb_order',$res);
		}

		public function getPembayaran($where)
		{
			return $this->db->get_where("tb_order",$where);
		}
	}

?>