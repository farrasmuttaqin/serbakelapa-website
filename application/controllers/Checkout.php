<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cart_model');
		$this->load->model('Checkout_model');
		error_reporting(E_ERROR|E_PARSE);
		if ($this->session->userdata('email')==""){
            header("Location: ".base_url("login"));
        }
	}
	
	public function index()
	{
		$where = array(
			'id_user' => $this->session->userdata('id_user'),
			'nomor_invoice' => 100000001
		);
		$data["cart"]=$this->Cart_model->getCart($where)->result();
		
		$data["nav"]=1;
        
		$this->load->view('v_checkout',$data);
	}

	public function payment()
	{
		$where = array(
			'id_user' => $this->session->userdata('id_user'),
			'nomor_invoice' => 100000001
		);
		$data["cart"]=$this->Cart_model->getCart($where)->result();
		$this->load->view('v_bayar',$data);
	}
	
	public function checkout(){
		$where = array(
			'id_user' => $this->session->userdata('id_user'),
			'nomor_invoice' => 100000001
		);
		$data["cart"]=$this->Cart_model->getCart($where)->result();
		$nomor = $this->Checkout_model->getNomor()->result();
		
		foreach ($nomor as $inv){
			$nomor_invoice = $inv->nomor_invoice;
		}
		
		$nomor_invoice = $nomor_invoice+1;

		$orderBiayaTotal = $this->input->post('totalZ');
		$orderBiayaPengiriman = $this->input->post('ongkirG');
		$orderBeratKeranjang = $this->input->post('beratG');
		$orderDurasiPengiriman = $this->input->post('durasiG');
		$orderKurir = $this->input->post('kurirG');
		$orderPaketKurir = $this->input->post('paketG');
		
		
		$orderProvinsi = $this->input->post('provGG');
		
		
		
		$orderKota = $this->input->post('kotaGG');
		
		$orderDetailAlamat = $this->input->post('newAddress');
		
		
		
		$orderCatatan = $this->input->post('noteG');
		
		if ($orderCatatan == ''){
			$oderCatatan = "Tidak ada";
		}
		
        $orderTanggalInvoice = date("h:i A, Y/m/d");
        
        $orderMetodePembayaran = $this->input->post('metodeG');
		
		$whereInsert = array(
			'nomor_invoice' => $nomor_invoice,
			'id_user' => $this->session->userdata('id_user'),
			'orderBiayaTotal' => $orderBiayaTotal,
			'orderBiayaPengiriman' => $orderBiayaPengiriman,
			'orderBeratKeranjang' => $orderBeratKeranjang,
			'orderDurasiPengiriman' => $orderDurasiPengiriman,
			'orderKurir' => $orderKurir,
			'orderPaketKurir' => $orderPaketKurir,
			'orderProvinsi' => $orderProvinsi,
			'orderKota' => $orderKota,
			'orderDetailAlamat' => $orderDetailAlamat,
			'orderCatatan' => $orderCatatan,
			'orderTanggalInvoice' => $orderTanggalInvoice,
			'status_pengiriman_barang' => '-',
            'status_pembayaran' => 'Belum dibayar',
            'metode_pembayaran' => $orderMetodePembayaran
		);
		
		$this->Checkout_model->ubahNomor($this->session->userdata('id_user'),$nomor_invoice);
		$this->Checkout_model->insert($whereInsert);
		redirect(base_url("checkout/invoice/".$nomor_invoice));
    }
    
    public function invoice()
	{
		$nomor_invoice = $this->uri->segment(3);

		$whereInvoice = array(
			'id_user' => $this->session->userdata('id_user'),
			'nomor_invoice' => $nomor_invoice
		);
		
		$where = array(
			'id_user' => $this->session->userdata('id_user'),
			'nomor_invoice' => 100000001
		);
		$data["cart"]=$this->Cart_model->getCart($where)->result();

        
		$data["getInvoice"]=$this->Checkout_model->getInvoice($nomor_invoice)->result();
		$this->load->view('v_checkoutDetail',$data);
	}

	public function daftar()
	{
		$whereCheck = array(
			'id_user' => $this->session->userdata('id_user')
		);
		$whereCart = array(
			'id_user' => $this->session->userdata('id_user'),
			'nomor_invoice' => 100000001
		);

		$data["cart"]=$this->Cart_model->getCart($whereCart)->result();
		$data["pemesanan"]=$this->Checkout_model->getPembayaran($whereCheck)->result();

		$this->load->view('v_daftar_transaksi',$data);
	}

	public function order()
	{
		$nomor_invoice = $this->input->post("nomor_invoice");
		
		$kurangiProduk = $this->Checkout_model->getIdProduct($nomor_invoice)->result();
		

		// foreach ($kurangiProduk as $inv){
		// 	$idid = $inv->id_product;
		// 	$quantity = $inv->quantity;
			
		// 	$cekStock = $this->Checkout_model->cekStock($idid)->result();

		// 	foreach($cekStock as $cek){
		// 		if ($quantity > $cek->productStock){
					
		// 			$this->session->set_flashdata("lowut","2");
		// 			redirect(base_url()."checkout/invoice/".$nomor_invoice);
		// 		}
		// 	}
		// }

		foreach ($kurangiProduk as $inv){
			$idid = $inv->id_product;
			$quantity = $inv->quantity;
			$this->Checkout_model->kurangProduct($idid,$quantity);
		}

		$gambar = $_FILES['gambar']['name'];
		$gambar = str_replace(' ', '_', $gambar);

		if ($gambar == ""){
			redirect(base_url());
		}
		
		$config = array(
	    'upload_path' => "./assets/bukti/",
	    'allowed_types' => "jpg|png|jpeg",
	    'overwrite' => FALSE,
	    'max_size' => "5000000", //File Size
	    'max_height' => "10000",
	    'max_width' => "10000"
	    );
		$this->load->library('upload', $config);
		$this->upload->do_upload('gambar');

		$email = $this->session->userdata('email');
		$beratKeranjang = $this->input->post('berat');
		$ongkosKirim = $this->input->post("ongkir");
		$subtotal = $this->input->post('subtotal');
		$total = $this->input->post('total');
		$messages = "
			<!DOCTYPE html>
				<html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
				<head>
					<meta charset='utf-8'> <!-- utf-8 works for most cases -->
					<meta name='viewport' content='width=device-width'> <!-- Forcing initial-scale shouldn't be necessary -->
					<meta http-equiv='X-UA-Compatible' content='IE=edge'> <!-- Use the latest (edge) version of IE rendering engine -->
					<meta name='x-apple-disable-message-reformatting'>  <!-- Disable auto-scale in iOS 10 Mail entirely -->
					<title>Checkout</title> <!-- The title tag shows in email notifications, like Android 4.4. -->

					<!-- Web Font / @font-face : BEGIN -->
					<!-- NOTE: If web fonts are not required, lines 10 - 27 can be safely removed. -->

					<!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
					<!--[if mso]>
						<style>
							* {
								font-family: sans-serif !important;
							}
						</style>
					<![endif]-->

					<!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
					<!--[if !mso]><!-->
					<!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> -->
					<!--<![endif]-->

					<!-- Web Font / @font-face : END -->

					<!-- CSS Reset : BEGIN -->
					<style>

						/* What it does: Remove spaces around the email design added by some email clients. */
						/* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
						html,
						body {
							margin: 0 auto !important;
							padding: 0 !important;
							height: 100% !important;
							width: 100% !important;
						}

						/* What it does: Stops email clients resizing small text. */
						* {
							-ms-text-size-adjust: 100%;
							-webkit-text-size-adjust: 100%;
						}

						/* What it does: Centers email on Android 4.4 */
						div[style*='margin: 16px 0'] {
							margin: 0 !important;
						}

						/* What it does: Stops Outlook from adding extra spacing to tables. */
						table,
						td {
							mso-table-lspace: 0pt !important;
							mso-table-rspace: 0pt !important;
						}

						/* What it does: Fixes webkit padding issue. */
						table {
							border-spacing: 0 !important;
							border-collapse: collapse !important;
							table-layout: fixed !important;
							margin: 0 auto !important;
						}

						/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
						a {
							text-decoration: none;
						}

						/* What it does: Uses a better rendering method when resizing images in IE. */
						img {
							-ms-interpolation-mode:bicubic;
						}

						/* What it does: A work-around for email clients meddling in triggered links. */
						*[x-apple-data-detectors],  /* iOS */
						.unstyle-auto-detected-links *,
						.aBn {
							border-bottom: 0 !important;
							cursor: default !important;
							color: inherit !important;
							text-decoration: none !important;
							font-size: inherit !important;
							font-family: inherit !important;
							font-weight: inherit !important;
							line-height: inherit !important;
						}

						/* What it does: Prevents Gmail from changing the text color in conversation threads. */
						.im {
							color: inherit !important;
						}

						/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
						.a6S {
						display: none !important;
						opacity: 0.01 !important;
						}
						/* If the above doesn't work, add a .g-img class to any image in question. */
						img.g-img + div {
						display: none !important;
						}

						/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
						/* Create one of these media queries for each additional viewport size you'd like to fix */

						/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
						@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
							u ~ div .email-container {
								min-width: 320px !important;
							}
						}
						/* iPhone 6, 6S, 7, 8, and X */
						@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
							u ~ div .email-container {
								min-width: 375px !important;
							}
						}
						/* iPhone 6+, 7+, and 8+ */
						@media only screen and (min-device-width: 414px) {
							u ~ div .email-container {
								min-width: 414px !important;
							}
						}

					</style>

					<!-- What it does: Makes background images in 72ppi Outlook render at correct size. -->
					<!--[if gte mso 9]>
					<xml>
						<o:OfficeDocumentSettings>
							<o:AllowPNG/>
							<o:PixelsPerInch>96</o:PixelsPerInch>
						</o:OfficeDocumentSettings>
					</xml>
					<![endif]-->

					<!-- CSS Reset : END -->

					<!-- Progressive Enhancements : BEGIN -->
					<style>

						/* What it does: Hover styles for buttons */
						.button-td,
						.button-a {
							transition: all 100ms ease-in;
						}
						.button-td-primary:hover,
						.button-a-primary:hover {
							background: #555555 !important;
							border-color: #555555 !important;
						}

						/* Media Queries */
						@media screen and (max-width: 600px) {

							.email-container {
								width: 100% !important;
								margin: auto !important;
							}

							/* What it does: Forces table cells into full-width rows. */
							.stack-column,
							.stack-column-center {
								display: block !important;
								width: 100% !important;
								max-width: 100% !important;
								direction: ltr !important;
							}
							/* And center justify these ones. */
							.stack-column-center {
								text-align: center !important;
							}

							/* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
							.center-on-narrow {
								text-align: center !important;
								display: block !important;
								margin-left: auto !important;
								margin-right: auto !important;
								float: none !important;
							}
							table.center-on-narrow {
								display: inline-block !important;
							}

							/* What it does: Adjust typography on small screens to improve readability */
							.email-container p {
								font-size: 17px !important;
							}
						}

					</style>
					<!-- Progressive Enhancements : END -->

				</head>
				<!--
					The email background color (#222222) is defined in three places:
					1. body tag: for most email clients
					2. center tag: for Gmail and Inbox mobile apps and web versions of Gmail, GSuite, Inbox, Yahoo, AOL, Libero, Comcast, freenet, Mail.ru, Orange.fr
					3. mso conditional: For Windows 10 Mail
				-->
				<body width='100%' style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: white;'>
					<center style='width: 100%; background-color: white;'>
					<!--[if mso | IE]>
					<table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%' style='background-color: #222222;'>
					<tr>
					<td>
					<![endif]-->

						<!-- Visually Hidden Preheader Text : BEGIN -->
						<div style='display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;'>
							(Optional) This text will appear in the inbox preview, but not the email body. It can be used to supplement the email subject line or even summarize the email's contents. Extended text preheaders (~490 characters) seems like a better UX for anyone using a screenreader or voice-command apps like Siri to dictate the contents of an email. If this text is not included, email clients will automatically populate it using the text (including image alt text) at the start of the email's body.
						</div>
						<!-- Visually Hidden Preheader Text : END -->

						<!-- Create white space after the desired preview text so email clients don’t pull other distracting text into the inbox preview. Extend as necessary. -->
						<!-- Preview Text Spacing Hack : BEGIN -->
						<div style='display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;'>
							&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
						</div>
						<!-- Preview Text Spacing Hack : END -->

						<!-- Email Body : BEGIN -->
						<table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='600' style='margin: auto;' class='email-container'>
							<!-- Email Header : BEGIN -->
							<tr>
								<td style='padding: 20px 0; text-align: center'>
									<img src='https://via.placeholder.com/200x50' width='200' height='50' alt='alt_text' border='0' style='height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 15px; color: #555555;'>
								</td>
							</tr>
							<!-- Email Header : END -->

							<!-- Hero Image, Flush : BEGIN -->
							<tr>
								<td style='background-color: #ffffff;'>
									<img src='https://via.placeholder.com/1200x600' width='600' height='' alt='alt_text' border='0' style='width: 100%; max-width: 600px; height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 15px; color: #555555; margin: auto; display: block;' class='g-img'>
								</td>
							</tr>
							<!-- Hero Image, Flush : END -->

							<!-- 1 Column Text + Button : BEGIN -->
							<tr>
								<td style='background-color: #ffffff;'>
									<table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
										<tr>
											<td style='padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;'>
												<h1 style='margin: 0 0 10px; font-size: 25px; line-height: 30px; color: #333333; font-weight: normal;'>Pembayaran Anda Sudah Kami Terima</h1>
												<p style='margin: 0 0 10px;'>Kami akan segera mengkonfirmasi pembelian anda dengan nomor invoice <span style='color:red;'>'INV-00".$nomor_invoice."'</span>. Jika bukti pembayaran anda salah, maka kami akan <span style='color:red;'>'Menolak'</span> pembelian anda.</p>
												<ul style='padding: 0; margin: 0; list-style-type: disc;'>
													<li style='margin:0 0 10px 20px;' class='list-item-first'>Berat Keranjang : ".$beratKeranjang." kg</li>
													<li style='margin:0 0 10px 20px;'>Ongkos Kirim : Rp. ".strrev(implode('.',str_split(strrev(strval($ongkosKirim)),3))).",- </li>
													<li style='margin:0 0 10px 20px;'>Subtotal (Total Keranjang + PPN 5%) : Rp. ".strrev(implode('.',str_split(strrev(strval($subtotal)),3))).",- </li>
													<li style='margin: 0 0 0 20px;' class='list-item-last'>Total (Subtotal + Ongkir) : Rp. ".strrev(implode('.',str_split(strrev(strval($total)),3))).",- </li>
												</ul>
											</td>
										</tr>
										<tr>
											<td style='padding: 0 20px 20px;'>
												<!-- Button : BEGIN -->
												<table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' style='margin: auto;'>
													<tr>
														<td class='button-td button-td-primary' style='border-radius: 4px; background: #222222;'>
															<a class='button-a button-a-primary' href='".base_url()."checkout/invoice/".$nomor_invoice."' style='background: #222222; border: 1px solid #000000; font-family: sans-serif; font-size: 15px; line-height: 15px; text-decoration: none; padding: 13px 17px; color: #ffffff; display: block; border-radius: 4px;'>Lihat Detail Pembelian</a>
														</td>
													</tr>
												</table>
												<!-- Button : END -->
											</td>
										</tr>

									</table>
								</td>
							</tr>
							<!-- 1 Column Text + Button : END -->


						</table>
						<!-- Email Body : END -->

						<!-- Email Footer : BEGIN -->
						<table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='600' style='margin: auto;' class='email-container'>
							<tr>
								<td style='padding: 20px; font-family: sans-serif; font-size: 12px; line-height: 15px; text-align: center; color: #888888;'>
									<a href='https://serbakelapa.com' style='color: #black; text-decoration: underline; font-weight: bold;'>serbakelapa.com</a>
									<br><br>
									Serba Kelapa<br><span class='unstyle-auto-detected-links'>123 Fake Street, SpringField, OR, 97477 US<br>(123) 456-7890</span>
								</td>
							</tr>
						</table>
						<!-- Email Footer : END -->


					<!--[if mso | IE]>
					</td>
					</tr>
					</table>
					<![endif]-->
					</center>
				</body>
				</html>
		";
			$this->load->library('email');
            $config['protocol']    = 'smtp';
            $config['smtp_host']    = 'ssl://smtp.gmail.com';
            $config['smtp_port']    = '465';
            $config['smtp_timeout'] = '7';
            $config['smtp_user']    = 'official.serbakelapa@gmail.com';
            $config['smtp_pass']    = 'serbakelapa123';
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not
            $this->email->initialize($config);
            $this->email->from('official.serbakelapa@gmail.com', 'Serba Kelapa');
            $this->email->to($email); 
            $this->email->subject('Your Payment Receipt');
            $this->email->message($messages);
            $this->email->send();
            
            // 	$this->load->library('phpmailer_lib');
            // $mail = $this->phpmailer_lib->load();
            // $mail->isSMTP();
            // $mail->Host     = 'mail.bhinestorm.com';
            // $mail->SMTPAuth = true;
            // $mail->Username = 'serba@bhinestorm.com';
            // $mail->Password = 'serba123';
            // $mail->SMTPSecure = 'ssl';
            // $mail->Port     = 465;
            // $mail->setFrom('serba@bhinestorm.com', 'Serba Kelapa');
            // $mail->addReplyTo('serba@bhinestorm.com', 'Serba Kelapa');
            // $mail->addAddress($email);
            // $mail->Subject = 'Your Payment Receipt';
            // $mail->isHTML(true);
            // $mail->Body = $messages;
            // $mail->send();
		

		$this->Checkout_model->orderProduct($this->session->userdata('id_user'),$nomor_invoice,$gambar);
		
		$this->session->set_flashdata("payment","1");
		redirect(base_url("checkout/payment"));
	}
}
?>