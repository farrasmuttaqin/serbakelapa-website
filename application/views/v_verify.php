<!DOCTYPE html>
<html lang="en">

<head>
    <title>Aktifkan Akun | Serba Kelapa</title>
    <?php
        $this->load->view('v_header');
    ?>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="<?php echo base_url(); ?>assets/img/core-img/logo4.png" alt="">
        </div>
    </div>

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
            <h2>Aktifkan Akun</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user-circle-o"></i> Aktikan Akun Saya</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="bgwhite p-t-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-b-20">
                <?php
                    if ($tampung==1){
                        echo "  <h4 style='color:green;' class='m-text16 t-center'>
                                    Akun ".$emailemail." berhasil di-aktifkan
                                </h4>";
                    }
                    if ($tampung==2){
                        echo "  <h4 style='color:green;' class='m-text16 t-center'>
                                    Akun ".$emailemail." sudah aktif
                                </h4>";
                    }
                ?>
                </div>
            </div>
        </div>
    </section>
    <?php
        $this->load->view('v_footer');
    ?> 
        
</body>
</html>