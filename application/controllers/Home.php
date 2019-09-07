<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Cart_model");
		$this->load->model("Product_model");
		$this->load->model("Paper_model");
		error_reporting(E_ERROR|E_PARSE);
	}
	
	public function index()
	{
		$where = array(
			'id_user' => $this->session->userdata('id_user'),
			'nomor_invoice' => 100000001
		);

		$data["best"]=$this->Product_model->getBest()->result();
		$data["paper"]=$this->Paper_model->recentPost()->result();
		$data["event"]=$this->Paper_model->recentPostEvents()->result();
		$data["cart"]=$this->Cart_model->getCart($where)->result();
		$this->load->view('index',$data);
	}
}