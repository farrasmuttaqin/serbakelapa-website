<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | Serba Kelapa</title>
    <?php
        $this->load->view('v_header');
    ?>     
    <style>
        .notelp {
            background-color: white;
            background-repeat: no-repeat;
            background-size: auto 26px;
            background-position: 85% 50%;
        }
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
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area footer-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url(); ?>assets/img/bg-img/header2.png);">
            <h2>Login / Register</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-lock"></i> Login / Register</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="bgwhite p-t-60">
        <div class="container">
            <?php
                if ($this->session->flashdata("loginProduct") == "1"){
                    echo "<div class='row' style='text-align:center;padding-bottom:30px;'>
                        <div class='col-md-12 p-b-20'>
                            <h4 style='color:red;'>Silahkan login untuk membeli produk kami</h4>
                        </div>
                    </div>";
                }
            ?>
            <div class="row">
                <div class="col-md-5 p-b-20" id ="logindulu" <?php if ($this->session->flashdata("tampungForgot") != ""){ echo "style='display:none;'"; } ?>>
                    <h4 class="m-text16 t-center">
                        Login
                    </h4>
                    <br>
                    <form action='<?php echo base_url()."login/loginAction/"; ?>' method='post' enctype='multipart/form-data' autocomplete='off' >
                        <?php
                            if ($this->session->flashdata("tampungLogin") == "99")
                            {
                                echo "<h4 style='color:red;font-size:20px;' class='m-text16 t-center'>Login Failed <br> Your Email / Password Wrong.</h4><br>";
                            }
                            if ($this->session->flashdata("tampungLogin") == "999")
                            {
                                if ($this->session->flashdata("resent") != "1"){
                                    echo "<h4 style='color:red;font-size:20px;' class='m-text16 t-center'>Akun Belum Aktif<br>Kamu Harus Mengaktifkan Akun untuk Login<br>Silahkan Check Link Aktivasi di<br><br> ".$_SESSION["emailFalse"]." <br><br></h4>";
                                    echo "<div class='forget m-t-5 t-center' >
                                            <a class='forget m-t-5 t-center' href='".base_url()."login/sentVerification/'>Klik disini untuk mengirim ulang link aktivasi</a>
                                          </div><br>";
                                }
                            }
                            if ($this->session->flashdata("resent") == "1"){
                                echo "<h4 style='color:red;font-size:20px;' class='m-text16 t-center'>Link Aktivasi Sudah Dikirim Ulang<br> Silahkan cek link aktivasi di <br><br> ".$_SESSION["emailFalse"]." <br><br></h4>";
                                echo "<div class='forget m-t-5 t-center' >
                                        <a  class='forget m-t-5 t-center' href='".base_url()."login/sentVerification/'>Kirim lagi link aktivasi?</a>
                                        </div><br>
                                ";
                            }
                        ?>
                        <div class='search-product pos-relative bo4 of-hidden'>
                            <input class='s-text7 size2 p-l-23 p-r-50' pattern='[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$' type='email' name='e1' placeholder='Email' required>
                            <button class='flex-c-m size5 ab-r-m color2 color0-hov trans-0-4' disabled>
                                <i class='icon_mail'></i>
                            </button>
                        </div>
                        <div class='search-product m-t-10 pos-relative bo4 of-hidden'>
                            <input class='s-text7 size2 p-l-23 p-r-50' type='password' name='p1' placeholder='Password' required>
                            <button class='flex-c-m size5 ab-r-m color2 color0-hov trans-0-4' disabled>
                                <i class='fa fa-key'></i>
                            </button>
                        </div>
                        <br>
                        <div class='forget m-t-5 t-center'>
                            <span style='color:blue;cursor:pointer;' id='forgotforgot' class='fs-13'><i class='fa fa-key'></i> Lupa Password?</span>
                        </div>
                        <br>
                        <input type='submit' class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-t-10' value='LOGIN' style="cursor:pointer;" />
                    </form>
                </div>
                <div class="col-md-5 p-b-20" id ="forgotdulu" <?php if ($this->session->flashdata("tampungForgot") != ""){ echo "style='display:block;'"; }else { echo "style='display:none;'";} ?> >
                    <h4 class="m-text16 t-center">
                        Forgot Password
                    </h4>
                    <br>
                    <form action='<?php echo base_url()."login/forgotAction/"; ?>' method='post' enctype='multipart/form-data' autocomplete='off'>
                        <?php 
                            if ($this->session->flashdata("tampungForgot") == "1")
                            {
                                echo "<h4 style='color:green;font-size:20px;' class='m-text16 t-center'>Link reset password Berhasil di kirim ke e-mail kamu</h4><br>";
                            }
                            if ($this->session->flashdata("tampungForgot") == "2")
                            {
                                echo "<h4 style='color:red;font-size:20px;' class='m-text16 t-center'>E-mail belum terdaftar, gagal mengirim link reset password</h4><br>";
                            }
                        ?>
                        <div class='search-product pos-relative bo4 of-hidden'>
                            <input class='s-text7 size2 p-l-23 p-r-50' pattern='[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$' type='email' name='e1' placeholder='Email' required>
                            <button class='flex-c-m size5 ab-r-m color2 color0-hov trans-0-4' disabled>
                                <i class='icon_mail'></i>
                            </button>
                        </div>
                        <br>
                        <div class='forget m-t-5 t-center'>
                            <span style='color:blue;cursor:pointer;' id='loginlogin' class='fs-13'><i class='fa fa-undo'></i> Kembali Login?</span>
                        </div>
                        <br>
                        <input type='submit' class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-t-10' value='reset password' style="cursor:pointer;" />
                    </form>
                </div>
                <div class="col-md-2">
                    <h4 class="m-text16 t-center">
                            atau
                    </h4>
                </div>
                
                <div class="col-md-5">
                    <h4 class="m-text16 t-center">
                            Register
                    </h4>
                    <?php
                        if ($this->session->flashdata("tampungRegister") == "1")
                        {
                            echo "<h4 style='color:green;font-size:20px;' class='m-text16 t-center'>Register Berhasil, Cek Email dan Aktifkan Akun Kamu </h4>";
                        }
                        if ($this->session->flashdata("tampungRegister") == "2")
                        {
                            echo "<h4 style='color:red;font-size:20px;' class='m-text16 t-center'>Register Gagal, Nomor HP / E-mail Sudah Terdaftar</h4>";
                        }
                    ?>
                    <?php if ($this->session->flashdata("tampungRegister") != "1"){ ?>
                    <br>
                    <form action='<?php echo base_url('login/register'); ?>' method='post' enctype='multipart/form-data' autocomplete='off'>
                        <div class='search-product pos-relative bo4 of-hidden m-b-10'>
                            <input class='s-text7 size2 p-l-23 p-r-50' type='text' name='namaLengkap' placeholder='Full Name' required>
                            <button class='size5 ab-r-m color2 color0-hov trans-0-4' disabled>
                                <i class='fa fa-users'></i>
                            </button>
                        </div>
                        <div class='search-product m-t-10 pos-relative bo4 of-hidden'>
                            <input id="phoneh" placeholder='Phone Number (ex, 08562312221)' class='notelp s-text7 size2 p-l-23 p-r-50' type='text' name='notel2' pattern="\d*" title="Only Numbers" required>
                            <button class='size5 ab-r-m color2 color0-hov trans-0-4' disabled>
                                <i class='fa fa-phone'></i>
                            </button>
                        </div>
                        <div class='search-product m-t-10 pos-relative bo4 of-hidden'>
                            <input class='s-text7 size2 p-l-23 p-r-50' pattern='[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$' type='email' name='email2' placeholder='Email' required>
                            <button class='flex-c-m size5 ab-r-m color2 color0-hov trans-0-4' disabled>
                                <i class='icon_mail'></i>
                            </button>
                        </div>
                        <div class='search-product m-t-10 pos-relative bo4 of-hidden'>
                            <input id='password1' pattern='.{6,}' title='password requires 6 characters minimum' class='s-text7 size2 p-l-23 p-r-50' type='password' name='password1' placeholder='Password' required>
                            <button class='flex-c-m size5 ab-r-m color2 color0-hov trans-0-4' disabled>
                                <i class='fa fa-key'></i>
                            </button>
                        </div>
                        <div class='search-product m-t-10 pos-relative bo4 of-hidden'>
                            <input id='password2' class='s-text7 size2 p-l-23 p-r-50' type='password' name='password2' placeholder='Confirm Password' required>
                            <button class='flex-c-m size5 ab-r-m color2 color0-hov trans-0-4' disabled>
                                <i class='fa fa-key'></i>
                            </button>
                        </div>
                        <br>
                        <input type='submit' class='tombol flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 m-t-10' id='register' value='REGISTER' style='cursor:pointer;display:none;' />
                        <span id="aktifkan" style='color:red;' >Isi Nomor HP dengan Benar untuk Mengaktifkan Tombol Register</span>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <script>
    $(function() {
        $('#phoneh').on('keypress', function(e) {
            if (e.which == 32)
                return false;
        });
    });

        var forgotforgot = document.getElementById('forgotforgot');
        var loginlogin = document.getElementById('loginlogin');
        var logindulu = document.getElementById('logindulu');
        var forgotdulu = document.getElementById('forgotdulu');

        

        forgotforgot.addEventListener('click',function(){
            logindulu.style.display = "none";
            forgotdulu.style.display = "block";
        })

        loginlogin.addEventListener('click',function(){
            logindulu.style.display = "block";
            forgotdulu.style.display = "none";
        })
    </script>
     <!-- Footer Bottom Area -->
    <?php
        $this->load->view('v_footer');
    ?> 

    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script>
            var password = document.getElementById("password1")
          , confirm_password = document.getElementById("password2");
        
        function validatePassword(){
          if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
          } else {
            confirm_password.setCustomValidity('');
          }
        }
        
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
        
</body>
</html>