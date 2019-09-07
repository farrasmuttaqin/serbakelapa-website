<!doctype html>
<html class="no-js" lang="en">

<?php
    $this->load->view('admin/a_header');
?> 

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <?php
            $navbar["navbar"] = 2;
            $this->load->view('admin/a_navbar',$navbar);
        ?> 
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Detail Invoice</span></li>
                            </ul>
                        </div>
                    </div>
                   <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["nama_lengkap_admin"]; ?><i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo base_url(); ?>Admin_Dashboard/logout/">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php foreach ($invoice as $keranjang){ 
                $id_user = $keranjang->id_user;
                $nama_user = $keranjang->nama_lengkap;
                $tampungEmail = $keranjang->email;

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
                $orderBuktiTransaksi = $keranjang->orderBuktiTransaksi;
                
                $status_pengiriman_barang = $keranjang->status_pengiriman_barang;
                $status_pembayaran = $keranjang->status_pembayaran;
                $metode_pembayaran = $keranjang->metode_pembayaran;
            }
            ?>



            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="invoice-area">
                                    <div class="invoice-head">
                                        <div class="row">
                                            <div class="iv-left col-6">
                                                <span>INVOICE</span>
                                            </div>
                                            <div class="iv-right col-6 text-md-right">
                                                <span><?php echo "INV-00".$nomor_invoice; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="invoice-address">
                                                <h3>invoiced to</h3>
                                                <h5><?php echo $nama_user; ?></h5>
                                                <h5 style="font-size:14px;"><?php echo $orderDetailAlamat.", ".$orderKota.", ".$orderProvinsi; ?></h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <ul class="invoice-date">
                                                <li>Invoice Date : <?php echo $orderTanggalInvoice; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="invoice-table table-responsive mt-5">
                                        <table class="table table-bordered table-hover text-right">
                                            <thead>
                                                <tr class="text-capitalize">
                                                    <th class="text-left" style="width: 30%; min-width: 130px;font-size:18px;">Products</th>
                                                    <th class="text-center" style="width: 5%;font-size:18px;">Quantity</th>
                                                    <th style="font-size:18px;">Price</th>
                                                    <th style="font-size:18px;">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                foreach($invoice as $keranjang){?>  
                                                <tr>
                                                    <td class="text-left"><img style="width:40%;height:50%;" src='<?php echo base_url()."assets/products/".$keranjang->productImage; ?>'><?php echo " &nbsp ".$keranjang->productName; ?></td>
                                                    <td class="text-center" style="font-size:18px;"><?php echo $keranjang->quantity; ?></td>
                                                    <td style="font-size:18px;"><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($keranjang->productPrice)),3)))." /pcs"; ?></td>
                                                    <td style="font-size:18px;"><?php $total=$keranjang->quantity*$keranjang->productPrice; echo "Rp. ".strrev(implode('.',str_split(strrev(strval($total)),3))).",-"; ?></td>
                                                </tr>
                                            <?php
                                                $totalZ = $totalZ + $total;}
                                            ?>  
                                            </tbody>
                                        </table>

                                        <table class="table table-bordered table-hover text-right">
                                            <tbody>
                                                <tr>
                                                    <td style="font-size:18px;">Kurir :</td>
                                                    <td style="font-size:18px;"><?php echo $orderKurir; ?></td>
                                                    <td style="font-size:18px;">Berat Keranjang :</td>
                                                    <td style="font-size:18px;"><?php echo $orderBeratKeranjang." kg"; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size:18px;">Jenis Pengiriman :</td>
                                                    <td style="font-size:18px;"><?php echo $orderPaketKurir; ?></td>
                                                    <td style="font-size:18px;">Ongkos Kirim:</td>
                                                    <td style="font-size:18px;"><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($orderBiayaPengiriman)),3))).",-"; ?></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td style="font-size:18px;">Durasi Pengiriman :</td>
                                                    <td style="font-size:18px;"><?php echo $orderDurasiPengiriman; ?></td>
                                                    <td style="font-size:18px;">Subtotal (Biaya Total + PPN 5%) :</td>
                                                    <td style="font-size:18px;"><?php $subtotal = $totalZ+($totalZ*0.05); echo "Rp. ".strrev(implode('.',str_split(strrev(strval($subtotal)),3))).",-"; ?></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td style="font-size:18px;">Catatan Pengiriman :</td>
                                                    <td style="font-size:18px;"><?php if ($orderCatatan == ""){ echo "Tidak Ada Catatan"; }else{ $orderCatatan; }; ?></td>
                                                    <td style="font-size:18px;color:red;">Grand Total (Subtotal + Ongkir):</td>
                                                    <td style="font-size:18px;color:red;"><h5><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($orderBiayaTotal)),3))).",-"; ?></h5></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td colspan="2"></td>
                                                    <td style="font-size:18px;">Metode Pembayaran :</td>
                                                    <td style="font-size:18px;"><?php echo $metode_pembayaran; ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"></td>
                                                    <td style="font-size:18px;">Nomor Rekening :</td>
                                                    <td colspan="1" style="font-size:18px;"><?php if ($metode_pembayaran == "Transfer BCA") {echo "Nomor Rekening : 1111";}else{echo "Nomor Rekening : 9999";} ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"></td>
                                                    <td style="font-size:18px;">Atas Nama :</td>
                                                    <td colspan="1" style="font-size:18px;color:green;"><?php if ($metode_pembayaran == "Transfer BCA") {echo "BCA AKUN &nbsp <span class='fa fa-check-circle'></span> ";}else{echo "BRI AKUN &nbsp <span class='fa fa-check-circle'></span> ";} ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">Bukti Transaksi :</td>
													<?php
														if ($orderBuktiTransaksi != null){							
													?>
                                                    <td align="center"><img style="width:300px;height:350px;" src='<?php 
                                                    
                                                    $filename = pathinfo($orderBuktiTransaksi);

                                                    echo base_url()."assets/bukti/".str_replace('.', '_', $filename['filename']).".".$filename['extension'];
                                                    
                                                    
                                                    
                                                    
                                                    ?>'></td>
														<?php }else{ ?>
														<td style="color:red;">Belum ada bukti transaksi</td>
														<?php } ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                       
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-6 text-md-center">
                                            <div class="invoice-address">
                                                <h5>Status Pembayaran</h5>
                                                <?php echo $status_pembayaran; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-md-center">
                                            <div class="invoice-address">
                                                <h5>Status Penerimaan Barang</h5>
                                                <?php echo $status_pengiriman_barang; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if ($status_pembayaran == "Bukti Transfer Salah"){ 
                                        echo "<div align='center' style='margin-top:50px;'>
                                                <h4 style='color:red;'>Bukti Transfer INV-00".$nomor_invoice." Salah</h4><br>
                                                <h5 style='color:red;'>Data Invoice ini dapat diolah setelah Customer Kembali Upload Bukti Transfer yang Benar</h5>
                                            </div>";
                                    }
                                    if ($status_pengiriman_barang == "Sudah diterima" || $status_pembayaran == "Bukti Transfer Salah"){

                                    }else{
										if ($status_pengiriman_barang == "Sedang dikirim"){ ?>
										<div class="form-group" style="margin-top:25px;">
                                        <form action='<?php echo base_url()."Admin_Dashboard/konfirmasiPenerimaanBarang2/"; ?>' method='post' enctype='multipart/form-data'>
                                            <label class="col-form-label">Konfirmasi Penerimaan Barang</label>
                                            <select style="height:50px;" class="form-control" name="confirmation" required>
                                                <option value="">Apakah Barang Sudah Diterima ?</option>
                                                <option value="ya">Ya</option>
                                                <option value="tidak">Belum</option>
                                            </select>
                                            <input type="hidden" name="nomor_invoice" value="<?php echo $this->uri->segment(3); ?>" required />
											<input type="hidden" name="email_user" value="<?php echo $tampungEmail ?>" required />
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Konfirmasi Penerimaan Barang</button>
                                        </form>
                                    </div>
										
										<?php }
                                        if ($status_pembayaran == "Sudah dikonfirmasi" && $status_pengiriman_barang != "Sedang dikirim"){
                                    ?>
                                     <div class="form-group" style="margin-top:25px;">
                                        <form action='<?php echo base_url()."Admin_Dashboard/konfirmasiPenerimaanBarang/"; ?>' method='post' enctype='multipart/form-data'>
                                            <label class="col-form-label">Konfirmasi Pengiriman Barang</label>
                                            <select style="height:50px;" class="form-control" name="confirmation" required>
                                                <option value="">Apakah Barang Sudah Dikirim ?</option>
                                                <option value="ya">Ya</option>
                                                <option value="tidak">Belum</option>
                                            </select>
                                            <input type="hidden" name="nomor_invoice" value="<?php echo $this->uri->segment(3); ?>" required />
											<input type="hidden" name="email_user" value="<?php echo $tampungEmail ?>" required />
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Konfirmasi Pengiriman Barang</button>
                                        </form>
                                    </div>
                                    <?php
                                        }
										if($orderBuktiTransaksi != null){
											if ($status_pembayaran != "Sudah dikonfirmasi"){
                                    ?>
                                    <div class="form-group" style="margin-top:25px;">
                                        <form action='<?php echo base_url()."Admin_Dashboard/konfirmasiPembayaran/"; ?>' method='post' enctype='multipart/form-data'>
                                            <label class="col-form-label">Konfirmasi Pembayaran</label>
                                            <select style="height:50px;" class="form-control" id="confirmation" name="confirmation" required>
                                                <option value="">Apakah Bukti Transaksi Bernilai Benar ?</option>
                                                <option value="ya">Ya</option>
                                                <option value="tidak">Tidak</option>
                                            </select>
											<label id="pengiriman1" style="display:none;" class="col-form-label"><br> Konfirmasi Pengiriman</label>
                                            <select id="pengiriman2" style="display:none;height:50px;" class="form-control" name="pengiriman2">
                                                <option value="">Kirim Barang Sekarang ?</option>
                                                <option value="ya">Ya</option>
                                                <option value="tidak">Tidak</option>
                                            </select>
                                            <div>
                                                <h5 id="buktibukti" style="color:red;display:none;" class="col-form-label">Setelah menyatakan bukti transfer "Tidak Benar" maka akan mengembalikan stock product yang dibeli ke semula.</h5>
                                            </div>
                                            <input type="hidden" name="nomor_invoice" value="<?php echo $this->uri->segment(3); ?>" required />
											<input type="hidden" name="email_user" value="<?php echo $tampungEmail ?>" required />
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Konfirmasi Pembayaran</button>
                                        </form>
                                        <br>
                                        
                                    </div>
											<?php }}else{ ?>
									<div align="center" style="margin-top:50px;">
										<h4 style="color:red;"><?php echo "INV-00".$nomor_invoice; ?> Belum Dibayar</h4>
									</div>
									<?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
            <p>© 2018 Serba Kelapa. All Rights Reserved.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
	
	<script>
		var confirmation = document.getElementById('confirmation')
		var pengiriman1 = document.getElementById('pengiriman1');
		var pengiriman2 = document.getElementById('pengiriman2');
        var buktibukti = document.getElementById('buktibukti');
		
		confirmation.addEventListener('change',function(){
          if (confirmation.value === "ya"){
				pengiriman1.style.display="inline";
				pengiriman2.style.display="inline";
                buktibukti.style.display="none";
				pengiriman2.setAttribute('required','required');
			}else{
                if (confirmation.value === "tidak"){
                    buktibukti.style.display="inline";
                }else{
                    buktibukti.style.display="none";
                }
				pengiriman1.style.display="none";
				pengiriman2.style.display="none";
				pengiriman2.required=false;
			}
		})
		
	</script>
    <?php
        $this->load->view('admin/a_footer');
    ?> 
</body>

</html>
