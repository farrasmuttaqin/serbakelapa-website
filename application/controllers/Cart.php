<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model("Cart_model");
        if ($this->session->userdata('email')==""){
            header("Location: ".base_url());
        }
		error_reporting(E_ERROR|E_PARSE);
	}
    
    public function index(){
        redirect(base_url()."cart/cart");
    }

    
	public function cart()
	{
		$where = array(
			'id_user' => $this->session->userdata('id_user'),
			'nomor_invoice' => 100000001
		);
	
		$data["cart"]=$this->Cart_model->getCartCart($where);
	
		$whereUser = array(
			'id_user' => $this->session->userdata('id_user')
		);
	
		$data["pengguna"]=$this->Cart_model->getPengguna($whereUser)->result();
	
		$this->load->view("v_cart",$data);
	}
	
	public function tambah()
	{
		$where = array(
			'id_user' => $this->session->userdata('id_user'),
			'nomor_invoice' => 100000001,
			'id_product' => $this->uri->segment(3)
		);

		$this->Cart_model->plus($where);
		redirect(base_url('cart/cart'));
	}

	public function kurang()
	{
		$where = array(
			'id_user' => $this->session->userdata('id_user'),
			'nomor_invoice' => 100000001,
			'id_product' => $this->uri->segment(3)
		);

		$this->Cart_model->minus($where);
		redirect(base_url('cart/cart'));
	}

    public function add()
	{
		$id_user = $this->session->userdata("id_user");
		$id_product = $this->input->post('id_product');
		$nomor_invoice = '100000001';
		$quantity = $this->input->post('quantity');
        
		$save = array(
			'id_user' => $id_user,
			'id_product' => $id_product,
			'nomor_invoice' => $nomor_invoice,
			'quantity' => $quantity
        );
        
        if ($this->Cart_model->cartCheck($id_user,$id_product,$ukuran)){
            $this->Cart_model->updateSame($id_user,$id_product,$quantity,$ukuran);
            redirect(base_url('cart/cart'));
        }else{
            $this->Cart_model->insert($save);
            redirect(base_url('cart/cart'));
        }
    }

  public function delete()
	{
		$nama_cart = $this->uri->segment(4);
		$where = array(
			'id_user' => $this->session->userdata('id_user'),
			'nomor_invoice' => "100000001",
			'id_order_detail' => $this->uri->segment(3)
		);
		$this->Cart_model->delete($where);
		

		$this->session->set_flashdata('namacart', $nama_cart);
		redirect(base_url('cart/cart'));
	}

    function _api_ongkir_post($origin,$des,$qty,$cour)
   {
  	  $curl = curl_init();
	  curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => "origin=".$origin."&destination=".$des."&weight=".$qty."&courier=".$cour,	  
	  CURLOPT_HTTPHEADER => array(
	    "content-type: application/x-www-form-urlencoded",
	    "key: 8e80a564ab55f35a64f3ca91d551e8a5"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  return $err;
		} else {
		  return $response;
		}
   }





   function _api_ongkir($data)
   {
	   	$curl = curl_init();

		curl_setopt_array($curl, array(
		  //CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",
		  //CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/".$data,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",		  
		  CURLOPT_HTTPHEADER => array(
		  	/* masukan api key disini*/
		    "key: 8e80a564ab55f35a64f3ca91d551e8a5"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  return  $err;
		} else {
		  return $response;
		}
   }


	public function provinsi()
	{

		$provinsi = $this->_api_ongkir('province');
		$data = json_decode($provinsi, true);
		echo json_encode($data['rajaongkir']['results']);
	}


	public function lokasi()
	{
		$this->load->view('head');
		$this->load->view('nav');
		$this->load->view('halaman');
		$this->load->view('footer');
		
	}

	public function kota($provinsi="")
	{
		if(!empty($provinsi))
		{
			if(is_numeric($provinsi))
			{
				$kota = $this->_api_ongkir('city?province='.$provinsi);	
				$data = json_decode($kota, true);
				echo json_encode($data['rajaongkir']['results']);		  					 
			}
			else
			{
				show_404();
			}
		}
	   else
	   {
	   	show_404();
	   }
	}

	public function tarif($origin,$des,$qty,$cour)
	{
		$berat = $qty*1000;
		$tarif = $this->_api_ongkir_post($origin,$des,$berat,$cour);		
		$data = json_decode($tarif, true);
		echo json_encode($data['rajaongkir']['results']);		
	}
    
}
