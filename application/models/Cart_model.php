<?php
	
	class Cart_model extends CI_Model{
		public function __construct()
		{
			parent::__construct();
		}

		public function insert($save){
			return $this->db->insert("tb_order_detail",$save);
		}

		public function getPembayaran($where)
		{
			return $this->db->get_where("tb_order",$where);
		}
		
		
		public function cartCheck($id_user,$id_product)
		{
			$where = "id_user = $id_user AND id_product = $id_product AND nomor_invoice = 100000001 ";
			$this->db->where($where);
			$this->db->from("tb_order_detail");
			$query = $this->db->get();
			if ($query->num_rows() > 0){
				return $query->result();
			}else{
				return $query->result();
			}
		}
		public function updateSame($id_user,$id_product,$quantityNew)
		{
			$where = "id_user = $id_user AND id_product = $id_product AND nomor_invoice = 100000001";
			$this->db->set('quantity', 'quantity+'.$quantityNew,FALSE);
			$this->db->where($where);
			$this->db->update('tb_order_detail');
		}

		public function plus($where)
		{
			$this->db->set('quantity', 'quantity+1',FALSE);
			$this->db->where($where);
			$this->db->update('tb_order_detail');
		}

		public function minus($where)
		{
			$this->db->set('quantity', 'quantity-1',FALSE);
			$this->db->where($where);
			$this->db->update('tb_order_detail');
		}

		public function delete($where)
		{
			$this->db->where($where);
			$this->db->delete('tb_order_detail');
		}

		public function getCart($where){
			return $this->db->get_where('tb_order_detail',$where);		
		}

		public function getCartCart($where){
            $this->db->select('*');
            $this->db->from('tb_order_detail a'); 
            $this->db->join('tb_product b', 'b.id_product=a.id_product', 'left');
            $this->db->where($where);  
            $query = $this->db->get(); 
            return $query->result();
		}
		
		public function getPengguna($where){
			return $this->db->get_where('tb_users',$where);		
		}
	}

?>