<!DOCTYPE html>
<html lang="en">

<head>
    <title>Menunggu Pembayaran | Asy-Syifa CARE </title>
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
        <div class="top-breadcrumb-area footer-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url(); ?>assets/img/bg-img/header2.png);">
            <h2> Payment </h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Menunggu Pembayaran</li>
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
            <div class="row" >
                <div class="col-12">
                    <?php foreach($pemesanan as $payment){
                        $a=$payment->nomor_invoice;
                        
                        }
                        if ($payment->nomor_invoice == ""){
                            echo "<div align='center'>
                                <h4 style='color:red;'> Anda Belum Pernah Melakukan Transaksi </h4><br>
                                <p><a href='".base_url()."product' class='btn alazea-btn'>Mulai Berbelanja</a></p>
                                </div>";
                        }else{
                    ?>
                    <div class="cart-table clearfix" >
                        <table align="center" class="table table-responsive" style="color:black;">
                            <thead>
                                <tr>
                                    <th style="width:20%">Nomor Invoice</th>
                                    <th style="width:20%">Grand Total</th>
                                    <th style="width:25%">Status Pembayaran</th>
                                    <th style="width:25%">Status Pengiriman</th>
                                    <th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody id="pagin">
                            <?php foreach($pemesanan as $payment){ ?>
                                <tr>
                                    <td>
                                       <h5> <?php $nomor = "INV-"."00".$payment->nomor_invoice; echo $nomor; ?></h5>
                                    </td>
                                    <td class="price"><span><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($payment->orderBiayaTotal)),3))).",-"; ?></span></td>
                                    <td class="total_price">
                                    <?php if ($payment->status_pembayaran == "Sudah dikonfirmasi"){ ?>
                                        <span style='color:green;'><?php echo $payment->status_pembayaran; ?></span>
                                    <?php }else{ ?>

                                        <span style='color:red;'><?php echo $payment->status_pembayaran; if ($payment->status_pembayaran == "Sudah dibayar") echo "<br>(Menunggu Konfirmasi)";?></span>
                                    <?php } ?>
                                    </td>
                                    <td class="total_price">
                                    <?php if ($payment->status_pengiriman_barang == "Sudah diterima"){ ?>
                                        <span style='color:green;'><?php echo $payment->status_pengiriman_barang; ?></span>
                                    <?php }else{ ?>
                                        <span style='color:red;'><?php echo $payment->status_pengiriman_barang; ?></span>
                                    <?php } ?>
                                    </td>
                                    <td style='width:100px;' class='total_price'><?php echo "<a class='btn alazea-btn w-20' href='".base_url()."checkout/invoice/".$payment->nomor_invoice."/'><span>Lihat Invoice</span></a>"; ?></td>
                                </tr>
                            
                                <?php } ?>
                            </tbody>
                            
                        </table>
                    </div>
                                    <?php }?>
                </div>
            </div>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/pagination/src/jquery.paginate.js"></script>

        <script>
            //call paginate
            $('#pagin').paginate();
        </script>
        <?php
            $this->load->view('v_footer');
        ?> 
</body>

</html>