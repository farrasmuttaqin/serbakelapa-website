<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pembayaran Berhasil | Serba Kelapa</title>
    <?php
        $this->load->view('v_header');
    ?>
</head>
<body>
    <?php if ($this->session->flashdata("payment") != "1"){
        redirect(base_url("checkout/daftar"));
    }?>
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
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area footer-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url(); ?>assets/img/bg-img/header2.png);">
            <h2>Pembayaran Berhasil</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="bgwhite p-t-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-b-20" style="text-align:center;">
                    <h2 class="display-3 text-black">Terima Kasih!</h2>
                    <p class="lead mb-5">Pembayaran anda sudah kami terima<br>Tunggu konfirmasi dari kami ya :)</p>
                    <p><a href="<?php echo base_url(); ?>product" class="btn alazea-btn">Belanja Lagi?</a></p>
                </div>
            </div>
        </div>
    </section>
    <?php
        $this->load->view('v_footer');
    ?> 
        
</body>
</html>