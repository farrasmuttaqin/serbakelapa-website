<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Review_model');
		error_reporting(E_ERROR|E_PARSE);
		if ($this->session->userdata('email')==""){
            header("Location: ".base_url());
        }
	}

	public function index()
	{
		$orderTanggalInvoice = date("h:i A, Y/m/d");
		$star = $this->input->post('star');
		$save = array(
			'id_user' => $_SESSION["id_user"],
			'id_product' => $this->uri->segment(3),
			'productRatingComment' => $star,
			'productReasonComment' => $this->input->post('reason'),
			'productComment' => $this->input->post('komen'),
			'productCommentDate' => $date,
			'productNamadepanreviews' => $_SESSION["nama_depan"]
		);

		if ($star == "")
		{
			redirect(base_url());
		}else{
			$this->Review_model->reviewInsert($save);
			redirect(base_url('product/detail/'.$this->uri->segment(3).'/'));
		}
	}
}