<?php
	
	class Review_model extends CI_Model{
		public function __construct()
		{
			parent::__construct();
		}

		public function reviewInsert($save){
			return $this->db->insert("tb_product_comment",$save);
		}
	}

?>