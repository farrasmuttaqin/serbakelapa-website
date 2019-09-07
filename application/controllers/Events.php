<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cart_model');
		$this->load->model('Paper_model');
		$this->load->model("Product_model");
		error_reporting(E_ERROR|E_PARSE);
	}
	
	public function index()
	{
		$where = array(
			'id_user' => $this->session->userdata('id_user'),
			'nomor_invoice' => 100000001
		);
		$data["cart"]=$this->Cart_model->getCart($where)->result();
		$data["events"]=$this->Paper_model->getAllEvents()->result();
		$this->load->view('v_events',$data);
	}

	public function detail()
	{
		$id_events=$this->uri->segment(3);

		$whereEvents= array(
			'id_paper' => $id_events,
			'jenis' => 'Events'
		);
		$where = array(
			'id_user' => $this->session->userdata('id_user'),
			'nomor_invoice' => 100000001
		);
		$data["cart"]=$this->Cart_model->getCart($where)->result();
		$data["events"]=$this->Paper_model->getSelectArticle($whereEvents)->result();
		$data["recent"]=$this->Paper_model->recentPostEvents()->result();
		$data["tags"]=$this->Paper_model->tagsEvents()->result();
		$data["best_product"] = $this->Product_model->getBest()->result();
		$data["comment"] = $this->Paper_model->getComment($id_events)->result();
		$this->load->view('v_detailPaperEvents',$data);
	}

	public function inputComment()
	{
		$id_article = $this->input->post('id_article');

		$id_user = $_SESSION["id_user"];
		$nama_lengkap = $_SESSION["nama_lengkap"];
		$tanggal = date("h:i A, Y/m/d");
		$komen = $this->input->post('komen');

		$where = array(
			'id_paper' => $id_article,
			'id_user' =>$id_user,
			'paperName' => $nama_lengkap,
			'paperComment' => $komen,
			'paperCommentDate' => $tanggal
		);

		$this->Paper_model->insertComment($where);
		redirect(base_url("events/detail/".$id_article."/"));
	}
}
