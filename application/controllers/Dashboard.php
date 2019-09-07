<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->library('session');
		$this->load->model('Dashboard_model');
		$this->load->model('Checkout_model');
		error_reporting(E_ERROR|E_PARSE);
		if ($_SESSION["nama_lengkap_admin"]==""){
            $tampung = base_url()."admin/";
            header("Location: $tampung");
        }
	}
	
	public function index()
	{
		$result["invoice"] = $this->Dashboard_model->getAllInvoice()->result();
		$this->load->view('admin/a_invoice',$result);
    }
    
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url()."admin/","refresh");
	}

	

    public function invoice()
	{
        $result["invoice"] = $this->Dashboard_model->getAllInvoice()->result();
		$this->load->view('admin/a_invoice',$result);
	}

	public function paper()
	{
        $result["paper"] = $this->Dashboard_model->getAllPaper()->result();
		$this->load->view('admin/a_paper',$result);
	}

	public function product()
	{
        $result["product"] = $this->Dashboard_model->getAllProduct()->result();
		$this->load->view('admin/a_product',$result);
	}

	public function reviews()
	{
        $result["reviews"] = $this->Dashboard_model->getAllReviews()->result();
		$this->load->view('admin/a_reviews',$result);
	}

	public function users()
	{
        $result["users"] = $this->Dashboard_model->getAllUsers()->result();
		$this->load->view('admin/a_users',$result);
	}

	public function deleteReviews()
	{
		$id_reviews=$this->uri->segment(3);
		$where = array(
			'id_reviews' => $id_reviews
		);
		$this->Dashboard_model->deleteReviews($where);
		redirect(base_url("Admin_Dashboard/reviews/"));
	}

	


	public function comment()
	{
        $result["comment"] = $this->Dashboard_model->getAllComment()->result();
		$this->load->view('admin/a_comment',$result);
	}

	public function deleteComment()
	{
		$id_comment=$this->uri->segment(3);
		$where = array(
			'id_comment' => $id_comment
		);
		$this->Dashboard_model->deleteComment($where);
		redirect(base_url("Admin_Dashboard/comment/"));
	}

	public function contact()
	{
        $result["contact"] = $this->Dashboard_model->getAllContact()->result();
		$this->load->view('admin/a_contact',$result);
	}

	public function deleteContact()
	{
		$id_contact=$this->uri->segment(3);
		$where = array(
			'id_contact' => $id_contact
		);
		$this->Dashboard_model->deleteContact($where);
		redirect(base_url("Admin_Dashboard/contact/"));
	}


	public function tambahProduct()
	{
        $result["product"] = $this->Dashboard_model->getAllProduct()->result();
		$this->load->view('admin/a_tambahProduct',$result);
	}

	public function deleteProduct()
	{
        $id_product=$this->uri->segment(3);
		$where = array(
			'id_product' => $id_product
		);

		$hasil = $this->Dashboard_model->getAllProduct()->result();

		foreach ($hasil as $all){
				$foto_lama=$all->gambar_product;
			}
		$dirname = "./assets/products/".$foto_lama;
		unlink($dirname);

		$this->Dashboard_model->deleteProducts($where);
		redirect(base_url("Admin_Dashboard/product/"));
	}

	public function editProduct()
	{
		$nomor = $this->uri->segment(3);
		$where = array(
			'id_product' => $nomor
		);
		$result["product"] = $this->Dashboard_model->getProduct($where)->result();
		$this->load->view('admin/a_editProduct',$result);
	}

	public function editProductAct(){

		$id_product = $this->input->post("id_product");

		$hasil = $this->Dashboard_model->getAllProduct()->result();

		foreach ($hasil as $all){
				$foto_lama=$all->gambar_product;
			}
		$dirname = "./assets/products/".$foto_lama;
		unlink($dirname);


		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$jenis = $this->input->post('jenis');
		$isi = $this->input->post('isi');
		$info = $this->input->post('info');
		$stock = $this->input->post('stock');
		$isi_singkat = $this->input->post('isi_singkat');
		$gambar = $_FILES['gambar']['name'];

		$config = array(
	    'upload_path' => "./assets/products/",
	    'allowed_types' => "jpg|png|jpeg",
	    'overwrite' => FALSE,
	    'max_size' => "2000000", //File Size
	    'max_height' => "10000",
	    'max_width' => "10000"
	    );
		$this->load->library('upload', $config);
		$this->upload->do_upload('gambar');

		$save = array(
			'nama_product' => $nama,
			'harga_product' => $harga,
			'deskripsi_product' => $isi,
			'gambar_product' => $gambar,
			'stock' => $stock,
			'prodcutMetaDescription' => $isi
		);

		$this->Dashboard_model->editProducts($id_product,$save);

		redirect(base_url("Admin_Dashboard/product/"));
	}

	public function tambahProductAct()
	{
		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$jenis = $this->input->post('jenis');
		$isi = $this->input->post('isi');
		$info = $this->input->post('info');
		$stock = $this->input->post('stock');
		$isi_singkat = $this->input->post('isi_singkat');
		$gambar = $_FILES['gambar']['name'];

		$config = array(
	    'upload_path' => "./assets/products/",
	    'allowed_types' => "jpg|png|jpeg",
	    'overwrite' => FALSE,
	    'max_size' => "2000000", //File Size
	    'max_height' => "10000",
	    'max_width' => "10000"
	    );
		$this->load->library('upload', $config);
		$this->upload->do_upload('gambar');

		$save = array(
			'nama_product' => $nama,
			'harga_product' => $harga,
			'deskripsi_product' => $isi,
			'gambar_product' => $gambar,
			'stock' => $stock,
			'productMetaDescription' => $isi
		);

		$this->Dashboard_model->tambahProduct($save);

		redirect(base_url("Admin_Dashboard/product/"));
	}

	public function konfirmasiPembayaran()
	{
		$nomor_invoice = $this->input->post("nomor_invoice"); 
		$confirmation = $this->input->post("confirmation"); 
		$pengiriman2 = $this->input->post("pengiriman2"); 
		if ($confirmation == "ya" && $pengiriman2 == "ya"){
			
			$email = $this->input->post("email_user");
			$messages = "


			<!DOCTYPE html>
			<html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
			<head>
				<meta charset='utf-8'> <!-- utf-8 works for most cases -->
				<meta name='viewport' content='width=device-width'> <!-- Forcing initial-scale shouldn't be necessary -->
				<meta http-equiv='X-UA-Compatible' content='IE=edge'> <!-- Use the latest (edge) version of IE rendering engine -->
				<meta name='x-apple-disable-message-reformatting'>  <!-- Disable auto-scale in iOS 10 Mail entirely -->
				<title>Aktifkan akun anda</title> <!-- The title tag shows in email notifications, like Android 4.4. -->

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
											<h1 style='margin: 0 0 10px; font-size: 25px; line-height: 30px; color: #333333; font-weight: normal;'>Pembayaran anda sudah di konfirmasi</h1>
											<p style='margin: 0 0 10px;'>Pembayaran anda dengan nomor invoice <span style='color:green;'>'INV-00".$nomor_invoice."'</span> sudah dikonfirmasi dan sedang <span style='color:green;'>di kirim</span>  ke alamat anda. Harap bersabar yaa, terima kasih.</p>
											
										</td>
									</tr>
									<tr>
										<td style='padding: 0 20px 20px;'>
											<!-- Button : BEGIN -->
											<table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' style='margin: auto;'>
												<tr>
													<td class='button-td button-td-primary' style='border-radius: 4px; background: #222222;'>
														<a class='button-a button-a-primary' href='".base_url()."checkout/invoice/".$nomor_invoice."/' style='background: #222222; border: 1px solid #000000; font-family: sans-serif; font-size: 15px; line-height: 15px; text-decoration: none; padding: 13px 17px; color: #ffffff; display: block; border-radius: 4px;'>Lihat Detail Pembelian</a>
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
            $this->email->subject('Your Payment has been Confirmed and The Product is being Sent');
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
            // $mail->Subject = 'Your Payment has been Confirmed and The Product is being Sent';
            // $mail->isHTML(true);
            // $mail->Body = $messages;
            // $mail->send();
			
			
			$this->Dashboard_model->konfirmasi($nomor_invoice,"Sudah dikonfirmasi","Sedang dikirim");
		}
		if ($confirmation == "ya" && $pengiriman2 == "tidak"){
			$email = $this->input->post("email_user");
			$messages = "

			<!DOCTYPE html>
			<html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
			<head>
				<meta charset='utf-8'> <!-- utf-8 works for most cases -->
				<meta name='viewport' content='width=device-width'> <!-- Forcing initial-scale shouldn't be necessary -->
				<meta http-equiv='X-UA-Compatible' content='IE=edge'> <!-- Use the latest (edge) version of IE rendering engine -->
				<meta name='x-apple-disable-message-reformatting'>  <!-- Disable auto-scale in iOS 10 Mail entirely -->
				<title>Aktifkan akun anda</title> <!-- The title tag shows in email notifications, like Android 4.4. -->

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
											<h1 style='margin: 0 0 10px; font-size: 25px; line-height: 30px; color: #333333; font-weight: normal;'>Pembayaran anda sudah di konfirmasi</h1>
											<p style='margin: 0 0 10px;'>Pembayaran anda dengan nomor invoice <span style='color:green;'>'INV-00".$nomor_invoice."'</span> sudah dikonfirmasi, namun belum  <span style='color:red;'>di kirim</span>  ke alamat anda. Harap bersabar yaa, terima kasih.</p>
											
										</td>
									</tr>
									<tr>
										<td style='padding: 0 20px 20px;'>
											<!-- Button : BEGIN -->
											<table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' style='margin: auto;'>
												<tr>
													<td class='button-td button-td-primary' style='border-radius: 4px; background: #222222;'>
														<a class='button-a button-a-primary' href='".base_url()."checkout/invoice/".$nomor_invoice."/' style='background: #222222; border: 1px solid #000000; font-family: sans-serif; font-size: 15px; line-height: 15px; text-decoration: none; padding: 13px 17px; color: #ffffff; display: block; border-radius: 4px;'>Lihat Detail Pembelian</a>
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
			</html>";
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
            $this->email->subject('Your Payment Confirmation');
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
            // $mail->Subject = 'Your Payment Confirmation';
            // $mail->isHTML(true);
            // $mail->Body = $messages;
            // $mail->send();
			
			
			$this->Dashboard_model->konfirmasi($nomor_invoice,"Sudah dikonfirmasi","Belum dikirim");
		}
		if ($confirmation == "tidak"){
			
			$email = $this->input->post("email_user");
			$messages = "
			<!DOCTYPE html>
			<html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
			<head>
				<meta charset='utf-8'> <!-- utf-8 works for most cases -->
				<meta name='viewport' content='width=device-width'> <!-- Forcing initial-scale shouldn't be necessary -->
				<meta http-equiv='X-UA-Compatible' content='IE=edge'> <!-- Use the latest (edge) version of IE rendering engine -->
				<meta name='x-apple-disable-message-reformatting'>  <!-- Disable auto-scale in iOS 10 Mail entirely -->
				<title>Aktifkan akun anda</title> <!-- The title tag shows in email notifications, like Android 4.4. -->

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
											<h1 style='margin: 0 0 10px; font-size: 25px; line-height: 30px; color: #333333; font-weight: normal;'>Pembayaran tidak kami terima</h1>
											<p style='margin: 0 0 10px;'>Pembayaran anda dengan nomor invoice Mohon maaf, Pembayaran anda dengan nomor invoice <span style='color:red;'>'INV-00".$nomor_invoice."'</span> tidak kami terima, Karena bukti pembayaran yang anda kirim <span style='color:red;'>Salah</span>. Silahkan kirim kembali bukti pembayaran anda.</p>
											
										</td>
									</tr>
									<tr>
										<td style='padding: 0 20px 20px;'>
											<!-- Button : BEGIN -->
											<table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' style='margin: auto;'>
												<tr>
													<td class='button-td button-td-primary' style='border-radius: 4px; background: #222222;'>
														<a class='button-a button-a-primary' href='".base_url()."checkout/invoice/".$nomor_invoice."/' style='background: #222222; border: 1px solid #000000; font-family: sans-serif; font-size: 15px; line-height: 15px; text-decoration: none; padding: 13px 17px; color: #ffffff; display: block; border-radius: 4px;'>Lihat Detail Pembelian</a>
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
					$this->email->subject('Your Payment is not Accepted!');
					$this->email->message($messages);
					$this->email->send();
				
			// 	 	$this->load->library('phpmailer_lib');
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
            // $mail->Subject = 'Your Payment is not Accepted!';
            // $mail->isHTML(true);
            // $mail->Body = $messages;
            // $mail->send();
			
						$tambahiProduk = $this->Checkout_model->getIdProduct($nomor_invoice)->result();
				
						foreach ($tambahiProduk as $inv){
							$idid = $inv->id_product;
							$quantity = $inv->quantity;
							$this->Checkout_model->tambahProduct($idid,$quantity);
						}
						
			$this->Dashboard_model->konfirmasi($nomor_invoice,"Bukti Transfer Salah","-");
		}
		
        redirect(base_url("Admin_Dashboard/invoice/"));
	}

	public function konfirmasiPenerimaanBarang()
	{
		$nomor_invoice = $this->input->post("nomor_invoice"); 
		$confirmation = $this->input->post("confirmation"); 
		if ($confirmation == "ya"){
			$email = $this->input->post("email_user");
			$messages = "


			<!DOCTYPE html>
			<html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
			<head>
				<meta charset='utf-8'> <!-- utf-8 works for most cases -->
				<meta name='viewport' content='width=device-width'> <!-- Forcing initial-scale shouldn't be necessary -->
				<meta http-equiv='X-UA-Compatible' content='IE=edge'> <!-- Use the latest (edge) version of IE rendering engine -->
				<meta name='x-apple-disable-message-reformatting'>  <!-- Disable auto-scale in iOS 10 Mail entirely -->
				<title>Aktifkan akun anda</title> <!-- The title tag shows in email notifications, like Android 4.4. -->

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
											<h1 style='margin: 0 0 10px; font-size: 25px; line-height: 30px; color: #333333; font-weight: normal;'>Produk anda sedang dalam perjalanan</h1>
											<p style='margin: 0 0 10px;'>Pembayaran anda dengan nomor invoice <span style='color:green;'>'INV-00".$nomor_invoice."'</span> sudah dikonfirmasi dan sedang dalam proses pengiriman.</p>
											
										</td>
									</tr>
									<tr>
										<td style='padding: 0 20px 20px;'>
											<!-- Button : BEGIN -->
											<table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' style='margin: auto;'>
												<tr>
													<td class='button-td button-td-primary' style='border-radius: 4px; background: #222222;'>
														<a class='button-a button-a-primary' href='".base_url()."checkout/invoice/".$nomor_invoice."/' style='background: #222222; border: 1px solid #000000; font-family: sans-serif; font-size: 15px; line-height: 15px; text-decoration: none; padding: 13px 17px; color: #ffffff; display: block; border-radius: 4px;'>Lihat Detail Pembelian</a>
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
            $this->email->subject('Your Product is being Shipped');
            $this->email->message($messages);
            $this->email->send();
            
            // 	 	$this->load->library('phpmailer_lib');
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
            // $mail->Subject = 'Your Product is being Shipped';
            // $mail->isHTML(true);
            // $mail->Body = $messages;
            // $mail->send();
			
			
			$this->Dashboard_model->konfirmasi($nomor_invoice,"Sudah dikonfirmasi","Sedang dikirim");
		}else{
			$this->Dashboard_model->konfirmasi($nomor_invoice,"Sudah dikonfirmasi","Belum dikirim");
		}
        redirect(base_url("Admin_Dashboard/invoice/"));
	}
	
	public function konfirmasiPenerimaanBarang2()
	{
		$nomor_invoice = $this->input->post("nomor_invoice"); 
		$confirmation = $this->input->post("confirmation"); 
		if ($confirmation == "ya"){
			$email = $this->input->post("email_user");
			$messages = "


			<!DOCTYPE html>
			<html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
			<head>
				<meta charset='utf-8'> <!-- utf-8 works for most cases -->
				<meta name='viewport' content='width=device-width'> <!-- Forcing initial-scale shouldn't be necessary -->
				<meta http-equiv='X-UA-Compatible' content='IE=edge'> <!-- Use the latest (edge) version of IE rendering engine -->
				<meta name='x-apple-disable-message-reformatting'>  <!-- Disable auto-scale in iOS 10 Mail entirely -->
				<title>Aktifkan akun anda</title> <!-- The title tag shows in email notifications, like Android 4.4. -->

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
											<h1 style='margin: 0 0 10px; font-size: 25px; line-height: 30px; color: #333333; font-weight: normal;'>Anda sudah menerima produk yang dibeli</h1>
											<p style='margin: 0 0 10px;'>Produk yang telah anda bayar dengan nomor invoice <span style='color:green;'>'INV-00".$nomor_invoice."'</span> sudah anda terima.</p>
											
										</td>
									</tr>
									<tr>
										<td style='padding: 0 20px 20px;'>
											<!-- Button : BEGIN -->
											<table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' style='margin: auto;'>
												<tr>
													<td class='button-td button-td-primary' style='border-radius: 4px; background: #222222;'>
														<a class='button-a button-a-primary' href='".base_url()."checkout/invoice/".$nomor_invoice."/' style='background: #222222; border: 1px solid #000000; font-family: sans-serif; font-size: 15px; line-height: 15px; text-decoration: none; padding: 13px 17px; color: #ffffff; display: block; border-radius: 4px;'>Lihat Detail Pembelian</a>
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
            $this->email->subject('Receipt of Purchase');
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
            // $mail->Subject = 'Receipt of Purchase';
            // $mail->isHTML(true);
            // $mail->Body = $messages;
            // $mail->send();
			
			$this->Dashboard_model->konfirmasi($nomor_invoice,"Sudah dikonfirmasi","Sudah diterima");
		}
        redirect(base_url("Admin_Dashboard/invoice/"));
	}

	public function tambahPaper()
	{
		$this->load->view('admin/a_tambahPaper');
	}

	public function editPaper()
	{
		$nomor = $this->uri->segment(3);
		$where = array(
			'id_paper' => $nomor
		);
		$result["paper"] = $this->Dashboard_model->getPaper($where)->result();
		$this->load->view('admin/a_editPaper',$result);
	}

	public function editPaperAct(){
		$nomor = $this->input->post("nomor");
		$judul = $this->input->post('judul');
		$jenis = $this->input->post('jenis');
		$tag = $this->input->post('tag');
		$isi = $this->input->post('isi');
		$isi_singkat = $this->input->post('isi_singkat');
		$gambar = $_FILES['thumbnail']['name'];
		$nama_pembuat = $_SESSION["nama_lengkap_admin"];
		$date = date("Y/m/d");


		if ($jenis == "Article"){
			$path = "./assets/img/article/";
		}else{
			$path = "./assets/img/events/";
		}

		$config = array(
	    'upload_path' => $path,
	    'allowed_types' => "jpg|png|jpeg",
	    'overwrite' => FALSE,
	    'max_size' => "2000000", //File Size
	    'max_height' => "10000",
	    'max_width' => "10000"
	    );
		$this->load->library('upload', $config);
		$this->upload->do_upload('thumbnail');

		$save = array(
			'judul' => $judul,
			'jenis' => $jenis,
			'tags' => $tag,
			'isi' => $isi,
			'kalimat_pendek' => $isi_singkat,
			'thumbnail' => $gambar,
			'nama_pembuat' => $nama_pembuat,
			'tanggal_publish' => $date,
			'paperMetaDescription' => $isi
		);

		$this->Dashboard_model->editPaper($nomor,$save);

		redirect(base_url("Admin_Dashboard/paper/"));
	}
	public function deletePaper()
	{
		$id_paper=$this->uri->segment(3);
		$where = array(
			'id_paper' => $id_paper
		);

		$this->Dashboard_model->deletePaper($where);
		redirect(base_url("Admin_Dashboard/paper/"));
	}

	function tambahPaperAct()
	{
	    
		$judul = $this->input->post('judul');
		$jenis = $this->input->post('jenis');
		$tag = $this->input->post('tag');
		$isi = $this->input->post('isi');
		$isi_singkat = $this->input->post('isi_singkat');
		$gambar = $_FILES['thumbnail']['name'];
		$nama_pembuat = $_SESSION["nama_lengkap_admin"];
		$date = date("Y/m/d");


		if ($jenis == "Article"){
			$path = "./assets/img/article/";
		}else{
			$path = "./assets/img/events/";
		}

		$config = array(
	    'upload_path' => $path,
	    'allowed_types' => "jpg|png|jpeg",
	    'overwrite' => FALSE,
	    'max_size' => "2000000", //File Size
	    'max_height' => "10000",
	    'max_width' => "10000"
	    );
		$this->load->library('upload', $config);
		$this->upload->do_upload('thumbnail');

		$save = array(
			'judul' => $judul,
			'jenis' => $jenis,
			'tags' => $tag,
			'isi' => $isi,
			'kalimat_pendek' => $isi_singkat,
			'thumbnail' => $gambar,
			'nama_pembuat' => $nama_pembuat,
			'tanggal_publish' => $date,
			'paperMetaDescription' => $isi_singkat
		);

		$this->Dashboard_model->tambahPaper($save);

		redirect(base_url("Admin_Dashboard/paper/"));
	}
	
	public function edit()
	{
		$nomor_invoice = $this->uri->segment(3);
		$result["invoice"] = $this->Dashboard_model->getInvoice($nomor_invoice)->result();
		$this->load->view('admin/a_detailInvoice',$result);
	}
	
	public function delete()
	{
		$nomor_invoice=$this->uri->segment(3);
		$where = array(
			'nomor_invoice' => $nomor_invoice
		);

		$this->Dashboard_model->deleteCart($where);
		$this->Dashboard_model->deleteInvoice($where);
		redirect(base_url("Admin_Dashboard/invoice/"));
    }
}
