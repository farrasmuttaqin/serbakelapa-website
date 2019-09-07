<?php
	
	class Profile_model extends CI_Model{
		public function __construct()
		{
			parent::__construct();
		}

		public function change($id_user,$new)
		{
			$where = "id_user = '$id_user'";
			$this->db->set('pass', $new);
			$this->db->where($where);
			$this->db->update('tb_users');
		}

		public function cariPass($where){		
			return $this->db->get_where("tb_users",$where);
		}	

		public function input($table,$save){
			return $this->db->insert($table,$save);
		}
	}
?>