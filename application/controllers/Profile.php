<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cart_model');
		$this->load->model('Profile_model');
		error_reporting(E_ERROR|E_PARSE);
		if ($this->session->userdata('email')==""){
            header("Location: ".base_url());
        }
	}
	
	public function index()
	{
		$where = array(
			'id_user' => $this->session->userdata('id_user'),
			'nomor_invoice' => 100000001
		);
		$data["cart"]=$this->Cart_model->getCart($where)->result();
		
		$this->load->view('v_profile',$data);
	}

	public function doChangePass()
	{
		$new= $this->input->post('password2');
		$old= $this->input->post('oldPass');
		$old = md5($old);
		$new = md5($new);

		$where = array(
			'pass' => $old
		);

		$cek = $this->Profile_model->cariPass($where)->num_rows();

		if ($cek > 0)
		{
			$this->Profile_model->change($this->session->userdata('email'),$new);
			redirect(base_url()."profile/index/1/");
		}else{
			redirect(base_url()."profile/index/2/");
		}
	}
}