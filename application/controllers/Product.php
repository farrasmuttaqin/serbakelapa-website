<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Cart_model');
		error_reporting(E_ERROR|E_PARSE);
	}

	public function index()
	{
		$where = array(
			'id_user' => $this->session->userdata('id_user'),
			'nomor_invoice' => 100000001
		);
		$data["cart"]=$this->Cart_model->getCart($where)->result();

		$data["jenis"] = "All Products";
		$data["data_All"] = $this->Product_model->getAll("tb_product")->result();
		$data["best_product"] = $this->Product_model->getBest()->result();

		$this->load->view('v_productAll',$data);
	}

	public function detail()
	{
		if ($_SESSION["email"]==""){
			$this->session->set_flashdata("loginProduct","1");
			redirect(base_url("login"));
		}

		$id_product=$this->uri->segment(3);

		$where = array(
			'id_product' => $id_product
		);

		$data["detail"] = $this->Product_model->getAllParameter("tb_product",$where)->result();
			
		$data["similiarProduct"] = $this->Product_model->getLimit()->result();
		$data["review"] = $this->Product_model->getAllParameter("tb_product_comment",$where)->result();

		$where = array(
			'id_user' => $_SESSION["id_user"],
			'nomor_invoice' => 101,
			'id_product' => $this->uri->segment(3)
		);

		$data["cartz"]=$this->Cart_model->getCart($where)->result();

		$where = array(
			'id_user' => $this->session->userdata('id_user'),
			'nomor_invoice' => 100000001
		);
		$data["cart"]=$this->Cart_model->getCart($where)->result();

		$whereCheck = array(
			'id_user' => $_SESSION["id_user"],
			'status_pembayaran' => 'Belum Dibayar'
		);
		$data["pemesanan"]=$this->Cart_model->getPembayaran($whereCheck)->result();

		

		$this->load->view('v_detail',$data);
	}


	public function sortAll()
	{
		$sort = $this->input->get('sort');
		$data["urutkan"]=$sort;
		$data["jenis"] = "All Products";

		$data["best_product"] = $this->Product_model->getBest()->result();
		
		$where = array(
			'id_user' => $this->session->userdata('id_user'),
			'nomor_invoice' => 100000001
		);
		$data["cart"]=$this->Cart_model->getCart($where)->result();
		
		$whereCheck = array(
			'id_user' => $_SESSION["id_user"],
			'status_pembayaran' => 'Belum Dibayar'
		);

		$data["pemesanan"]=$this->Cart_model->getPembayaran($whereCheck)->result();

		if ($sort == "id"){
			$sortir="id_product";
			$urut = "ASC";
			$data["data_All"] = $this->Product_model->getallParameterSort($sortir,$urut)->result();
			$this->load->view('v_productAll',$data);
		}
		if ($sort == "alphabet"){
			$sortir="productName";
			$urut = "ASC";
			$data["data_All"] = $this->Product_model->getallParameterSort($sortir,$urut)->result();
			$this->load->view('v_productAll',$data);
		}
		if ($sort == "high"){
			$sortir="productPrice";
			$urut = "DESC";
			$data["data_All"] = $this->Product_model->getallParameterSort($sortir,$urut)->result();
			$this->load->view('v_productAll',$data);
		}
		if ($sort == "low"){
			$sortir="productPrice";
			$urut = "ASC";
			$data["data_All"] = $this->Product_model->getallParameterSort($sortir,$urut)->result();
			$this->load->view('v_productAll',$data);
		}
	}

}