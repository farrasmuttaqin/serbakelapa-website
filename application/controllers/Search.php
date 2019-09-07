<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Cart_model');
		error_reporting(E_ERROR|E_PARSE);
	}

	public function index()
	{
		$search = $this->input->get("item");
		$data["type"]=0;
		$_SESSION["product"]=$search;
		if($search == ""){
			redirect(base_url());
		}

		$data["jenis"] = 'Search "'.$search.'" in All Products';
		$data["jeniss"] = $search;

// 		$data["data_CHC"] = $this->Product_model->getAllParameterSearch("cosmetic",$search)->result();
// 		$data["data_HFB"] = $this->Product_model->getAllParameterSearch("healthy",$search)->result();
// 		$data["data_Herbs"] = $this->Product_model->getAllParameterSearch("herbs",$search)->result();
		$data["data_search"] = $this->Product_model->getSearchParameter($search)->result();
		$data["best_product"] = $this->Product_model->getBest()->result();

		$where = array(
			'id_user' => $_SESSION["id_user"],
			'nomor_invoice' => 101
		);

		$data["cart"]=$this->Cart_model->getCart($where)->result();
		$whereCheck = array(
			'id_user' => $_SESSION["id_user"],
			'status_pembayaran' => 'Belum Dibayar'
		);
		$data["pemesanan"]=$this->Cart_model->getPembayaran($whereCheck)->result();

		$this->load->view('v_search',$data);
	}

	public function searchSort()
	{
		$sort = $this->input->get('sort');
		$data["urutkan"]=$sort;
		$search = $_SESSION["product"];

		if($search == ""){
			redirect(base_url());
		}

		$data["jenis"] = 'Search "'.$search.'" in All Products';
		$data["jeniss"] = $search;

// 		$data["data_CHC"] = $this->Product_model->getAllParameterSearch("cosmetic",$search)->result();
// 		$data["data_HFB"] = $this->Product_model->getAllParameterSearch("healthy",$search)->result();
// 		$data["data_Herbs"] = $this->Product_model->getAllParameterSearch("herbs",$search)->result();
		$data["best_product"] = $this->Product_model->getBest()->result();
		$where = array(
			'id_user' => $_SESSION["id_user"],
			'nomor_invoice' => 101
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
			$data["data_search"] = $this->Product_model->getallParameterSortSearch($sortir,$urut,$search)->result();
			$this->load->view('v_search',$data);
		}
		if ($sort == "alphabet"){
			$sortir="productName";
			$urut = "ASC";
			$data["data_search"] = $this->Product_model->getallParameterSortSearch($sortir,$urut,$search)->result();
			$this->load->view('v_search',$data);
		}
		if ($sort == "high"){
			$sortir="productPrice";
			$urut = "DESC";
			$data["data_search"] = $this->Product_model->getallParameterSortSearch($sortir,$urut,$search)->result();
			$this->load->view('v_search',$data);
		}
		if ($sort == "low"){
			$sortir="productPrice";
			$urut = "ASC";
			$data["data_search"] = $this->Product_model->getallParameterSortSearch($sortir,$urut,$search)->result();
			$this->load->view('v_search',$data);
		}
	}

	public function allProduct()
	{
		$search = $_SESSION["product"];
		$data["type"]=0;
		$_SESSION["product"]=$search;
		if($search == ""){
			redirect(base_url());
		}

		$data["jenis"] = 'Search "'.$search.'" in All Products';
		$data["jeniss"] = $search;

// 		$data["data_CHC"] = $this->Product_model->getAllParameterSearch("cosmetic",$search)->result();
// 		$data["data_HFB"] = $this->Product_model->getAllParameterSearch("healthy",$search)->result();
// 		$data["data_Herbs"] = $this->Product_model->getAllParameterSearch("herbs",$search)->result();
		$data["data_search"] = $this->Product_model->getSearchParameter($search)->result();
		$data["best_product"] = $this->Product_model->getBest()->result();
		$where = array(
			'id_user' => $_SESSION["id_user"],
			'nomor_invoice' => 101
		);

		$data["cart"]=$this->Cart_model->getCart($where)->result();
		$whereCheck = array(
			'id_user' => $_SESSION["id_user"],
			'status_pembayaran' => 'Belum Dibayar'
		);
		$data["pemesanan"]=$this->Cart_model->getPembayaran($whereCheck)->result();

		$this->load->view('v_search',$data);
	}

	
}