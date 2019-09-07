<?php
	
	class Dashboard_model extends CI_Model{
		public function __construct()
		{
			parent::__construct();
		}

		public function getAllInvoice()
		{
			$this->db->select('*');
			$this->db->from('tb_order');
			return $this->db->get();
		}

		public function getAllPaper()
		{
			$this->db->select('*');
			$this->db->from('tb_paper');
			return $this->db->get();
		}

		public function getAllProduct()
		{
			$this->db->select('*');
			$this->db->from('tb_product');
			return $this->db->get();
		}

		public function getAllReviews()
		{
			$this->db->select('*');
			$this->db->from('tb_product_comment');
			return $this->db->get();
		}

		public function getAllUsers()
		{
			$this->db->select('*');
			$this->db->from('tb_users');
			return $this->db->get();
		}


		public function getAllComment()
		{
			$this->db->select('*');
			$this->db->from('tb_paper_comment');
			return $this->db->get();
		}

		public function getAllContact()
		{
			$this->db->select('*');
			$this->db->from('tb_contact');
			return $this->db->get();
		}

		public function tambahPaper($save){
			return $this->db->insert("tb_paper",$save);
		}

		public function tambahProduct($save){
			return $this->db->insert("tb_product",$save);
		}

		public function deletePaper($insert){
			$this->db->where($insert);
			$this->db->delete('tb_paper');
		}

		public function deleteProducts($where){
			$this->db->where($where);
			$this->db->delete('tb_product');
		}

		public function deleteReviews($insert){
			$this->db->where($insert);
			$this->db->delete('tb_product_comment');
		}

		public function deleteComment($insert){
			$this->db->where($insert);
			$this->db->delete('tb_paper_comment');
		}

		public function deleteContact($insert){
			$this->db->where($insert);
			$this->db->delete('tb_contact');
		}

		public function editPaper($id_paper,$save)
		{
			$where = "id_paper = $id_paper";
			$this->db->where($where);
			$this->db->update('tb_paper',$save);
		}

		public function editProducts($id_product,$save)
		{
			$where = "id_product = $id_product";
			$this->db->where($where);
			$this->db->update('tb_product',$save);
		}

		public function getInvoice($nomor_invoice)
		{
            $this->db->select('*');
            $this->db->from('tb_order a'); 
			$this->db->join('tb_order_detail b', 'b.nomor_invoice=a.nomor_invoice', 'left');
			$this->db->join('tb_product c', 'c.id_product=b.id_product', 'left');
			$this->db->join('tb_users d', 'd.id_user=b.id_user', 'left');
            $this->db->where('a.nomor_invoice',$nomor_invoice);   
			return $this->db->get();
		}

		public function getPaper($where)
		{
			return $this->db->get_where("tb_paper",$where);
		}
		
		public function getProduct($where)
		{
			return $this->db->get_where("tb_product",$where);
		}

		public function getCart($where)
		{
			return $this->db->get_where("tb_order_detail",$where);
		}


		public function getUser($where)
		{
			return $this->db->get_where("tb_users",$where);
		}

		public function konfirmasi($invoice,$status,$status2)
		{
			$where = "nomor_invoice = '$invoice'";
			$this->db->set('status_pembayaran', $status);
			$this->db->set('status_pengiriman_barang', $status2);
			$this->db->where($where);
			$this->db->update('tb_order');
		}

		public function deleteCart($where)
		{
			$this->db->where($where);
			$this->db->delete('tb_order_detail');
		}

		public function deleteInvoice($where)
		{
			$this->db->where($where);
			$this->db->delete('tb_order');
		}
	}

?>