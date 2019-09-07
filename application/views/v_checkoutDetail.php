<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout | Asy-Syifa CARE </title>
    <?php
        $this->load->view('v_header');
    ?> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/pagination/src/jquery.paginate.css" />
    <style>
        .paginate { padding: 0; margin: 0; }
        .paginate > li { list-style: none; padding: 10px 20px; border: 1px solid #ddd; margin: 10px 0; }
    </style>
</head>

<body>
    <!-- Preloader -->
    <?php foreach ($getInvoice as $keranjang){ 
        $id_user = $keranjang->id_user;
        $nomor_invoice = $keranjang->nomor_invoice; 
        $orderTanggalInvoice = $keranjang->orderTanggalInvoice; 
        $orderProvinsi = $keranjang->orderProvinsi;
        $orderKota = $keranjang->orderKota;
        $orderDetailAlamat = $keranjang->orderDetailAlamat;
        $orderPaketKurir = $keranjang->orderPaketKurir;
        $orderKurir = $keranjang->orderKurir;
        $orderDurasiPengiriman = $keranjang->orderDurasiPengiriman;
        $orderCatatan = $keranjang->orderCatatan;
        
        $orderBeratKeranjang = $keranjang->orderBeratKeranjang;
        $orderBiayaPengiriman = $keranjang->orderBiayaPengiriman;
        $orderBiayaTotal = $keranjang->orderBiayaTotal;
        
        $status_pengiriman_barang = $keranjang->status_pengiriman_barang;
        $status_pembayaran = $keranjang->status_pembayaran;
        $metode_pembayaran = $keranjang->metode_pembayaran;
    }?>
    
    <?php if ($id_user != $this->session->userdata('id_user')){
        redirect(base_url());
    }
    ?>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- ***** Top Header Area ***** -->
        <?php
            $this->load->view('v_top_header');
        ?> 

        <!-- ***** Navbar Area ***** -->
        <?php
            $this->load->view('v_navbar');
        ?>   
    </header>
    <!-- ##### Header Area End ##### -->


    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area footer-area footer-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url(); ?>assets/img/bg-img/header2.png);">
            <h2>Checkout Detail</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->
    <!-- ##### Cart Area Start ##### -->
    <div class="cart-area section-padding-0-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th colspan="3"><h5 style="font-size:16px;">Nomor Invoice : INV-00<?php echo $nomor_invoice; if ($status_pembayaran == "Bukti Transfer Salah") { echo " <span style='color:red;'>(".$status_pembayaran.")</span>"; }?> </h5></th>
                                    <th colspan="4" style="text-align:right;"><h5 style="font-size:16px;">Waktu Checkout : <?php echo $orderTanggalInvoice; ?></h5></th>
                                </tr>
                                <tr>
                                    <th colspan="2">Produk</th>
                                    <th>Berat</th>
                                    <th>Harga</th>
                                    <th>Kuantitas</th>
                                    <th colspan="2">Total</th>
                                </tr>
                            </thead>
                            <tbody id="pagin">
                                <?php foreach($getInvoice as $keranjang){ 
                                    $total = $keranjang->quantity * $keranjang->productPrice; 
                                    $beratTotal = $keranjang->quantity * $keranjang->productWeight;
                                    $beratSubTotal = $beratSubTotal + $beratTotal;
                                    $subTotal = $subTotal+$total; ?>
                                <tr>
                                    <td >
                                        <a href="<?php echo base_url()."product/detail/".$keranjang->id_product."/"; ?>"><img style='width:100px;' src='<?php echo base_url()."assets/products/".$keranjang->productImage; ?>' alt="Product"></a>
                                    </td>
                                    <td style="width:1px;">
                                        <a href="<?php echo base_url()."product/detail/".$keranjang->id_product."/"; ?>">
                                        <h5><?php echo $keranjang->productName; ?></h5>
                                        </a>
                                       
                                    </td>
                                    <td ><span><?php echo $keranjang->productWeight." kg/pcs <br>* qty : ".$beratTotal." kg"; ?></span></td>
                                    <td ><span><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($keranjang->productPrice)),3)))." /pcs"; ?></span></td>
                                    <td>
                                        <div class="quantity" style="text-align: center;">
                                            
                                            <input readonly="readonly" type="number" id="qty" name="quantity" value="<?php echo $keranjang->quantity; ?>">
                                            
                                        </div>
                                    </td>
                                    <td colspan="2"><span><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($total)),3))); ?></span></td>
                                    
                                </tr>
                                <?php } 
                                if ($keranjang->nama_product == ""){
                                    // redirect(base_url());
                                }?>
                                <tr>
                                    <td colspan = "2" style="font-size:24px;color:red;text-align:right;"> Berat Keranjang : </td>
                                    <td colspan = "1" style="font-size:24px;color:red;"><?php echo $beratSubTotal." kg"; ?></td>
                                    <td colspan = "1" style="font-size:24px;color:red;text-align:right;"> Biaya Total : </td>
                                    <td colspan = "2" style="font-size:24px;color:red;"><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($subTotal)),3))).",-"; ?></td>
                                </tr>
                            </tbody>
                                
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">

                

                <!-- Cart Totals -->
                <div class="col-12 col-lg-6">
                    <div class="cart-totals-area mt-70">
                        <div class="shipping d-flex" align="center">
                            <h4>Data Pengiriman</h4>
                        </div>
                        <div class="shipping d-flex justify-content-between">
                            <h5>Alamat Tujuan :</h5>
                            <h5 style="text-align:right;"><?php echo $orderDetailAlamat.", ".$orderKota.", ".$orderProvinsi; ?></h5>
                        </div>
                        <div class="shipping d-flex justify-content-between">
                            <h5>Kurir :</h5>
                            <h5><?php echo $orderKurir; ?></h5>
                        </div>
                        <div class="shipping d-flex justify-content-between">
                            <h5>Jenis Pengiriman :</h5>
                            <h5><?php echo $orderPaketKurir; ?></h5>
                        </div>
                        <div class="shipping d-flex justify-content-between">
                            <h5>Durasi Pengiriman :</h5>
                            <h5><?php echo $orderDurasiPengiriman; ?></h5>
                        </div>
                        <div class="shipping d-flex justify-content-between">
                            <h5>Catatan Pengiriman : </h5>
                            <h5><?php if ($orderCatatan == "") { echo "Tidak ada"; } else { echo $orderCatatan; } ?></h5>
                        </div>
                        <?php if ($status_pembayaran == "Bukti Transfer Salah"){ ?>
                        <div class="shipping d-flex" align="center">
                            <h4></h4>
                        </div>
                        <div class="shipping d-flex" align="center" >
                            <h4>Bukti Pembayaran Salah, Kok Bisa?</h4>
                        </div>
                        <div class="shipping d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                            <h5>1. Gambar Bukti Transfer yang Kamu Kirim Tidak Jelas, atau</h5>
                        </div>
                        <div class="shipping d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                            <h5>2. Nominal yang Kamu Transfer Tidak Sesuai Dengan Grand Total, atau</h5>
                        </div>
                        <div class="shipping d-flex justify-content-between">
                            <h5>3. Rekening Tujuan yang Kamu Transfer Salah</h5>
                        </div>
                        <div class="shipping d-flex justify-content-between">
                            <h5 style='font-size:20px;'>Bagaimana Solusinya ? kamu dapat upload ulang gambar bukti transfer-mu</h5>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="cart-totals-area mt-70">
                            <div class="shipping d-flex" align="center">
                                <h4>Data Pembayaran</h4>
                            </div>
                            <div class="subtotal d-flex justify-content-between">
                                <h5>Ongkos Kirim : </h5>
                                <h5><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($orderBiayaPengiriman)),3))).",-"; ?></h5>
                            </div>
                            <div class="subtotal d-flex justify-content-between">
                                <h5>Subtotal (Biaya Total + PPN 5%) : </h5>
                                <h5><?php $subtotal = $subTotal + ($subTotal*0.05); echo "Rp. ".strrev(implode('.',str_split(strrev(strval($subtotal)),3))).",-"; ?></h5>
                            </div>
                            <div class="total d-flex justify-content-between">
                                <h5 style="color:red;">Grand Total (Subtotal + Ongkir): </h5>
                                <h4 style="color:red;"><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($orderBiayaTotal)),3))).",-"; ?></h4>
                            </div>
                            <div class="total d-flex justify-content-between">
                                <h5 >Metode Pembayaran :</h5>
                                <h5><?php echo $metode_pembayaran; ?></h5>
                            </div>

                            <?php if (($status_pembayaran == "Belum dibayar" || $status_pembayaran == "Bukti Transfer Salah") && $metode_pembayaran == "Transfer BCA") {?>
                                <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                    <h5>Rekening Transfer :</h5>
                                    <img style="width:85px;height:30px;"src="<?php echo base_url("assets/img/bca.png"); ?>" />
                                </div>
                                <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                    <h5></h5>
                                    <h5>Nomor Rekening : 1111</h5>
                                </div>
                                <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                    <h5></h5>
                                    <h5 style="color:green;">a/n BCA AKUN &nbsp <span class="fa fa-check-circle"></span> </h5>
                                </div>
                                <div class="total d-flex justify-content-between">
                                    <h5></h5>
                                    <h5 style="font-size:14px;color:red;">*Wajib Transfer Sesuai Dengan Nominal Grand Total</h5>
                                </div>
                            <?php } ?>

                            <?php if (($status_pembayaran == "Belum dibayar" || $status_pembayaran == "Bukti Transfer Salah") && $metode_pembayaran == "Transfer BRI") {?>
                                <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                    <h5>Rekening Transfer :</h5>
                                    <img style="width:85px;height:55px;"src="<?php echo base_url("assets/img/bri.png"); ?>" />
                                </div>
                                <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                    <h5></h5>
                                    <h5>Nomor Rekening : 9999</h5>
                                </div>
                                <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                    <h5></h5>
                                    <h5 style="color:green;">a/n BRI AKUN &nbsp <span class="fa fa-check-circle"></span> </h5>
                                </div>
                                <div class="total d-flex justify-content-between">
                                    <h5></h5>
                                    <h5 style="font-size:14px;color:red;">*Wajib Transfer Sesuai Dengan Nominal Grand Total</h5>
                                </div>
                            <?php } ?>

                            <?php if ($status_pembayaran == "Belum dibayar" || $status_pembayaran == "Bukti Transfer Salah") { ?>
                                <form enctype='multipart/form-data' action="<?php echo base_url(); ?>checkout/order" method="post" onsubmit="return confirm('Bukti Pembayaran Sudah Yakin Benar?') " >
                                    <div class="total d-flex justify-content-between">
                                        <h5 style="color:red;">Upload Bukti Transfer (Max 5mb) : </h5>
                                        <h5 style="text-align:right;"><input id='file' type='file' class='form-control' name='gambar' accept='image/*' required /></h5>
                                    </div>
                                    <div class="total d-flex justify-content-between">
                                        <h5 style="color:red;"></h5>
                                        <img style='width:70%;height:10%;' id='blah' src='<?php echo base_url()."assets/images/upload.png"; ?>' alt='Gambar Bukti Transfer' />
                                        <input type="hidden" name="nomor_invoice" value="<?php echo $nomor_invoice; ?>">
                                        <input type="hidden" name="berat" value="<?php echo $orderBeratKeranjang; ?>">
                                        <input type="hidden" name="ongkir" value="<?php echo $orderBiayaPengiriman; ?>">
                                        <input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">
                                        <input type="hidden" name="total" value="<?php echo $orderBiayaTotal; ?>">

                                    </div>
                                    <div class="total d-flex justify-content-between">
                                        <h5></h5>
                                        <input type="submit" class="btn alazea-btn w-40" value="Bayar">
                                    </div>
                                    <div class="total d-flex justify-content-between">
                                        <h5></h5>
                                        <h5 style="color:red;font-size:14px;">Setelah melakukan pembayaran, kami akan mengirimkan konfirmasi pembelian kamu lewat e-mail</h5>
                                    </div>
                                </form>
                            <?php } ?>

                            <?php if ($status_pembayaran == "Sudah dibayar" && $status_pengiriman_barang == "Belum dikirim") { ?>
                                <?php if ($metode_pembayaran == "Transfer BCA"){ ?>
                                    <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                        <h5>Rekening Transfer :</h5>
                                        <img style="width:85px;height:30px;"src="<?php echo base_url("assets/img/bca.png"); ?>" />
                                    </div>
                                    <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                        <h5></h5>
                                        <h5>Nomor Rekening : 1111</h5>
                                    </div>
                                    <div class="total d-flex justify-content-between" >
                                        <h5></h5>
                                        <h5 style="color:green;">a/n BCA AKUN &nbsp <span class="fa fa-check-circle"></span> </h5>
                                    </div>
                                <?php } else {?>
                                    <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                        <h5>Rekening Transfer :</h5>
                                        <img style="width:85px;height:55px;"src="<?php echo base_url("assets/img/bri.png"); ?>" />
                                    </div>
                                    <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                        <h5></h5>
                                        <h5>Nomor Rekening : 9999</h5>
                                    </div>
                                    <div class="total d-flex justify-content-between" >
                                        <h5></h5>
                                        <h5 style="color:green;">a/n BRI AKUN &nbsp <span class="fa fa-check-circle"></span> </h5>
                                    </div>
                                <?php }?>
                                <div class="total d-flex justify-content-between" >
                                    <h5 style="color:red;">Status Pengiriman : </h5>
                                    <h5 style="color:red;"><?php echo $status_pengiriman_barang; ?></h5>
                                </div>
                                <div class="total d-flex justify-content-between">
                                    <h5 style="color:red;">Status Pembayaran : </h5>
                                    <h5 style="color:red;"><?php echo $status_pembayaran." (Menunggu Konfirmasi)"; ?></h5>
                                </div>
                                <div class="total d-flex justify-content-between">
                                    <h5></h5>
                                    <h5 style="font-size:14px;color:red;">*Kami akan Mengirim Pembelian Anda Setelah Melakukan "KONFIRMASI" pada "BUKTI PEMBAYARAN" yang Telah Anda Berikan </h5>
                                </div>
                            <?php } ?>

                            <?php if ($status_pembayaran == "Sudah dikonfirmasi" && $status_pengiriman_barang == "Belum dikirim") { ?>
                                <?php if ($metode_pembayaran == "Transfer BCA"){ ?>
                                    <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                        <h5>Rekening Transfer :</h5>
                                        <img style="width:85px;height:30px;"src="<?php echo base_url("assets/img/bca.png"); ?>" />
                                    </div>
                                    <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                        <h5></h5>
                                        <h5>Nomor Rekening : 1111</h5>
                                    </div>
                                    <div class="total d-flex justify-content-between" >
                                        <h5></h5>
                                        <h5 style="color:green;">a/n BCA AKUN &nbsp <span class="fa fa-check-circle"></span> </h5>
                                    </div>
                                <?php } else {?>
                                    <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                        <h5>Rekening Transfer :</h5>
                                        <img style="width:85px;height:55px;"src="<?php echo base_url("assets/img/bri.png"); ?>" />
                                    </div>
                                    <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                        <h5></h5>
                                        <h5>Nomor Rekening : 9999</h5>
                                    </div>
                                    <div class="total d-flex justify-content-between" >
                                        <h5></h5>
                                        <h5 style="color:green;">a/n BRI AKUN &nbsp <span class="fa fa-check-circle"></span> </h5>
                                    </div>
                                <?php }?>
                                <div class="total d-flex justify-content-between" >
                                    <h5 style="color:red;">Status Pengiriman : </h5>
                                    <h5 style="color:red;"><?php echo $status_pengiriman_barang." (Menunggu Pengiriman)"; ?></h5>
                                </div>
                                <div class="total d-flex justify-content-between">
                                    <h5 style="color:green;">Status Pembayaran : </h5>
                                    <h5 style="color:green;"><?php echo $status_pembayaran; ?></h5>
                                </div>
                                <div class="total d-flex justify-content-between">
                                    <h5></h5>
                                    <h5 style="font-size:14px;color:green;">*Kami sudah mengkonfirmasi Bukti Pembayaran Anda dan akan melakukan pengiriman secepatnya, Terima kasih </h5>
                                </div>
                            <?php } ?>

                            <?php if ($status_pembayaran == "Sudah dikonfirmasi" && $status_pengiriman_barang == "Sedang dikirim") { ?>
                                <?php if ($metode_pembayaran == "Transfer BCA"){ ?>
                                    <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                        <h5>Rekening Transfer :</h5>
                                        <img style="width:85px;height:30px;"src="<?php echo base_url("assets/img/bca.png"); ?>" />
                                    </div>
                                    <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                        <h5></h5>
                                        <h5>Nomor Rekening : 1111</h5>
                                    </div>
                                    <div class="total d-flex justify-content-between" >
                                        <h5></h5>
                                        <h5 style="color:green;">a/n BCA AKUN &nbsp <span class="fa fa-check-circle"></span> </h5>
                                    </div>
                                <?php } else {?>
                                    <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                        <h5>Rekening Transfer :</h5>
                                        <img style="width:85px;height:55px;"src="<?php echo base_url("assets/img/bri.png"); ?>" />
                                    </div>
                                    <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                        <h5></h5>
                                        <h5>Nomor Rekening : 9999</h5>
                                    </div>
                                    <div class="total d-flex justify-content-between" >
                                        <h5></h5>
                                        <h5 style="color:green;">a/n BRI AKUN &nbsp <span class="fa fa-check-circle"></span> </h5>
                                    </div>
                                <?php }?>
                                <div class="total d-flex justify-content-between" >
                                    <h5 style="color:red;">Status Pengiriman : </h5>
                                    <h5 style="color:red;"><?php echo $status_pengiriman_barang; ?></h5>
                                </div>
                                <div class="total d-flex justify-content-between">
                                    <h5 style="color:green;">Status Pembayaran : </h5>
                                    <h5 style="color:green;"><?php echo $status_pembayaran; ?></h5>
                                </div>
                                <div class="total d-flex justify-content-between">
                                    <h5></h5>
                                    <h5 style="font-size:14px;color:green;">*Kami sudah mengirim pembelian anda menggunakan jasa kurir "<?php echo $orderKurir; ?>" dengan paket "<?php echo $orderPaketKurir; ?>" ke alamat anda. Mohon ditunggu ya, Terima Kasih</h5>
                                </div>
                            <?php } ?>

                            <?php if ($status_pembayaran == "Sudah dikonfirmasi" && $status_pengiriman_barang == "Sudah diterima") { ?>
                                <?php if ($metode_pembayaran == "Transfer BCA"){ ?>
                                    <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                        <h5>Rekening Transfer :</h5>
                                        <img style="width:85px;height:30px;"src="<?php echo base_url("assets/img/bca.png"); ?>" />
                                    </div>
                                    <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                        <h5></h5>
                                        <h5>Nomor Rekening : 1111</h5>
                                    </div>
                                    <div class="total d-flex justify-content-between" >
                                        <h5></h5>
                                        <h5 style="color:green;">a/n BCA AKUN &nbsp <span class="fa fa-check-circle"></span> </h5>
                                    </div>
                                <?php } else {?>
                                    <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                        <h5>Rekening Transfer :</h5>
                                        <img style="width:85px;height:55px;"src="<?php echo base_url("assets/img/bri.png"); ?>" />
                                    </div>
                                    <div class="total d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                        <h5></h5>
                                        <h5>Nomor Rekening : 9999</h5>
                                    </div>
                                    <div class="total d-flex justify-content-between" >
                                        <h5></h5>
                                        <h5 style="color:green;">a/n BRI AKUN &nbsp <span class="fa fa-check-circle"></span> </h5>
                                    </div>
                                <?php }?>
                                <div class="total d-flex justify-content-between" >
                                    <h5 style="color:green;">Status Pengiriman : </h5>
                                    <h5 style="color:green;"><?php echo $status_pengiriman_barang; ?></h5>
                                </div>
                                <div class="total d-flex justify-content-between">
                                    <h5 style="color:green;">Status Pembayaran : </h5>
                                    <h5 style="color:green;"><?php echo $status_pembayaran; ?></h5>
                                </div>
                                <div class="total d-flex justify-content-between">
                                    <h5></h5>
                                    <h5 style="font-size:14px;color:green;">Terima kasih sudah berbelanja di Serba Kelapa, kami tunggu belanjaan anda selanjutnya :)</h5>
                                </div>
                            <?php } ?>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>

        var uploadField = document.getElementById("file");
        

        uploadField.onchange = function() {
            if(this.files[0].size > 2000000){
                alert("Pastikan ukuran Gambar tidak melebihi 3 MB");
                this.value = "";
            }
        };
        
        

        function readURL(input) {

            if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            }
        }

        $("#file").change(function() {
                readURL(this);
            
        });
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/pagination/src/jquery.paginate.js"></script>

    <script>
        //call paginate
        $('#pagin').paginate();
    </script>
    <!-- ##### Cart Area End ##### -->

      <!-- Footer Bottom Area -->
        <?php
            $this->load->view('v_footer');
        ?> 
</body>

</html>