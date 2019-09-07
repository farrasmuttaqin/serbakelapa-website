<?php
	
	class Product_model extends CI_Model{
		public function __construct()
		{
			parent::__construct();
		}

		public function getBest()
		{
			$this->db->select('tb_product_comment.id_product, AVG(tb_product_comment.productRatingComment), tb_product.productName, tb_product.productPrice, tb_product.productImage');
			$this->db->from('tb_product_comment');
			$this->db->join('tb_product', 'tb_product.id_product = tb_product_comment.id_product', 'RIGHT');
			$this->db->group_by('id_product');
			$this->db->order_by('AVG(productRatingComment) DESC');
			$this->db->limit(5);
			return $this->db->get();
		}
		public function getSearchParameter($search)
		{
			$where = "productName LIKE '%$search%'";
			$this->db->select('*');
	        $this->db->from('tb_product');
	        $this->db->where($where);
	        return $this->db->get();
		}

		public function getAllParameterSearch($type,$search)
		{
			$where = "jenis_product LIKE '%$type%' AND (jenis_product LIKE '%$search%' OR nama_product LIKE '%$search%')";
			$this->db->select('*');
	        $this->db->from('tb_product');
	        $this->db->where($where);
	        return $this->db->get();
		}

		public function getallParameterSortSearch($sortir,$urut,$search)
		{
			$where = "productName LIKE '%$search%'";
			$this->db->select('*');
	        $this->db->from('tb_product');
	        $this->db->where($where);
	        $this->db->order_by($sortir, $urut);
	        return $this->db->get();
		}

		public function getAllParameter($table,$where)
		{
			return $this->db->get_where($table,$where);
		}

		public function getLimit(){   
	        $this->db->select('*');
	        $this->db->from('tb_product');
	        //$this->db->where('jenis_product',$jenisProduct);
	        $this->db->order_by('rand()');
	        $this->db->limit(4);
	        return $this->db->get();
	    }

		public function getAll($table)
		{
			return $this->db->get($table);
		}

		public function getallParameterSort($sortir,$urut){   
	        $this->db->select('*');
	        $this->db->from('tb_product');
	        $this->db->order_by($sortir, $urut);
	        return $this->db->get();
	    }

	    public function getallParameterSortProduct($sortir,$urut,$jenisProduct){   
	        $this->db->select('*');
	        $this->db->from('tb_product');
	        $this->db->where('jenis_product',$jenisProduct);
	        $this->db->order_by($sortir, $urut);
	        return $this->db->get();
	    }
	}

?>