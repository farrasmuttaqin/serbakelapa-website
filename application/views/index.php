<!DOCTYPE html>
<html lang="en">

<head>
    <title>Serba Kelapa | Official Website</title>
    <meta name="description" content="Perusahaan yang bergerak dalam bidang eksplorasi bahan bahan alam menjadi produk bermanfaat dengan pemilihan bahan baku terbaik di padu kan dengan teknik formulasi unik dari team apoteker GHN guna menghadirkan solusi kongkrit produk berkualitas dan bermanfaat."/>
    <meta name="keywords" content="Serba Kelapa, official website, termurah,halal,cepat,mudah,top"/>
    <?php
        $this->load->view('v_header');
    ?>     
</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="<?php echo base_url(); ?>assets/img/core-img/logoloadgalenika.png" alt="">
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
    <!-- ##### Header Area End ##### -->

   <section class="hero-area">
        <div class="hero-post-slides owl-carousel">

            <div class="single-hero-post">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(<?php echo base_url(); ?>assets/img/bg-img/slider_1.png);"></div>
                <div class="container h-100">
                   
                </div>
            </div>

        </div>
    </section>


    <section class="our-services-area bg-gray section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>About Us</h2>
                        <p>Cerita singkat mengenai kami</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-lg-5">
                    <div class="alazea-service-area mb-100">

                        
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                            
                            <div class="service-content">
                                <div align="center">
                                    <img style="width:80%;margin-bottom:40px;" src="<?php echo base_url(); ?>assets/img/logo-ghn2.png" /> 
                                </div>
                                <h5>PT Global Heksa Natura</h5>
                                <p style="text-align:justify;">Perusahaan yang bergerak dalam bidang eksplorasi bahan bahan alam menjadi produk bermanfaat dengan pemilihan bahan baku terbaik di padu kan dengan teknik formulasi unik dari team apoteker GHN guna menghadirkan solusi kongkrit produk berkualitas dan bermanfaat.</p>
                                <br>
                                <p style="text-align:justify;">GHN merupakan kependekan dari Global, Heksa dan Natura yang memiliki makna sebagai berikut :</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="alazea-service-area mb-100">
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                            <div class="service-icon mr-30">
                                <img src="<?php echo base_url(); ?>assets/img/core-img/b4.png" alt="">
                            </div>
                            <div class="service-content">
                                <h5>Global</h5>
                                <p style="text-align:justify;">Digambarkan dg animasi dunia dg tujuan dari founder GHN untuk membawa produk produk alami ke seluruh penjuru dunia dengan eksplorasi bahan alam asli indonesia yang tercampur sempurna hasil dari racikan tenaga ahli farmasetika GHN.</p>
                            </div>
                        </div>
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                            <div class="service-icon mr-30">
                                <img src="<?php echo base_url(); ?>assets/img/core-img/b2.png" alt="">
                            </div>
                            <div class="service-content">
                                <h5>Heksa</h5>
                                <p style="text-align:justify;">Founder yang terdiri dari 6 apoteker ini menggabungkan potensi masing masing person dalam upaya sinergi lintas keahlian dan spesifikasi bidang yang dimiliki.</p>
                            </div>
                        </div>
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                            <div class="service-icon mr-30">
                                <img src="<?php echo base_url(); ?>assets/img/core-img/b1.png" alt="">
                            </div>
                            <div class="service-content">
                                <h5>Natura</h5>
                                <p style="text-align:justify;">Bahan Alam atau ke anega ragaman hayati khususnya bahan tanaman berkhasiat yg banyak terdapat di indonesia menjadikan motivasi tersendiri bagi team GHN yang secara konsisten mengembangkan serta meneliti sediaan yang memiliki manfaat khusus dengan konsentrasi ter ukur sehingga memberikan manfaat yang sangat signifikan. Cinta bahan alam sebagai wujud pengabdian profesi adalah cikal bakal lahirnya produk produk alami yang terbaik</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

	 <section class="alazea-blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>Our Top Products</h2>
                        <p>Beberapa Produk Terbaik Kami</p>
                    </div>
                    <div class="portfolio-slides owl-carousel">
                        <!-- Single Portfolio Slide -->
                        <?php foreach($best as $terbaik){ ?>
                        <div class="single-portfolio-slide">
                            <a href="<?php echo base_url();?>product/detail/<?php echo $terbaik->id_product; ?>"><img  style="width:100%;height:550px;" src="<?php echo base_url("assets/products/".$terbaik->productImage); ?>" alt=""></a>
                        </div>
                        <?php } ?>
						
						
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	
	 <section class="alazea-blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>Recent Article</h2>
                        <p>Artikel Terbaru Kami</p>
                    </div>
                    <div class="portfolio-slides owl-carousel mb-100">
                        <!-- Single Portfolio Slide -->
                        <?php foreach($paper as $ev){ ?>
                            <div class="single-portfolio-slide">
                                
                                <div class="post-thumbnail mb-30">
                                <a href="<?php echo base_url();?>article/detail/<?php echo $ev->id_paper; ?>"><img src="<?php echo base_url("assets/img/article/".$ev->thumbnail); ?>" alt=""></a>
                            </div>
                            <div class="post-content">
                                <a href="<?php echo base_url();?>article/detail/<?php echo $ev->id_paper; ?>" class="post-title">
                                    <h5><?php echo $ev->judul; ?></h5>
                                </a>
                                <div class="post-meta">
                                    <a href="<?php echo base_url();?>article/detail/<?php echo $ev->id_paper; ?>"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $ev->tanggal_publish; ?></a>
                                    <a href="<?php echo base_url();?>article/detail/<?php echo $ev->id_paper; ?>"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $ev->nama_pembuat; ?></a>
                                </div>
                                <p class="post-excerpt"><?php $kalimat = $ev->kalimat_pendek; $tampung = substr($kalimat, 0, 200).'...'; echo $tampung; ?></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	 <section class="alazea-blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>Latest Event</h2>
                        <p>Event-Event Terbaru Kami</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <!-- Single Blog Post Area -->
                <?php foreach($event as $ev){ ?>
                <div class="col-4 col-md-4 col-lg-4">
                    <div class="single-blog-post mb-100">
                        <div class="post-thumbnail mb-30">
                            <a href="<?php echo base_url();?>events/detail/<?php echo $ev->id_paper; ?>"><img src="<?php echo base_url("assets/img/events/".$ev->thumbnail); ?>" alt=""></a>
                        </div>
                        <div class="post-content">
                            <a href="<?php echo base_url();?>events/detail/<?php echo $ev->id_paper; ?>" class="post-title">
                                <h5><?php echo $ev->judul; ?></h5>
                            </a>
                            <div class="post-meta">
                                <a href="<?php echo base_url();?>events/detail/<?php echo $ev->id_paper; ?>"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $ev->tanggal_publish; ?></a>
                                <a href="<?php echo base_url();?>events/detail/<?php echo $ev->id_paper; ?>"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $ev->nama_pembuat; ?></a>
                            </div>
                            <p class="post-excerpt"><?php $kalimat = $ev->kalimat_pendek; $tampung = substr($kalimat, 0, 200).'...'; echo $tampung; ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </section>
	
    

   

    <!-- ##### Testimonial Area Start ##### -->
   
 


    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                    <?php if ($this->session->flashdata("pesan") == "1") { ?>
                        <h4 style="color:green;">Terima kasih, Pesan anda berhasil kami tampung :)</h4>
                    <?php } ?>
                        <h2>GET IN TOUCH</h2>
                        <p>Send us a message !</p>
                    </div>
                    <!-- Contact Form Area -->
                    <div class="contact-form-area mb-100">
                        <form action="<?php echo base_url(); ?>subscribe/contact/" method="post" onsubmit="return alert('Pesan anda sudah kami tampung, kami akan segera membalas pesan anda melalui e-mail anda');">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-name" placeholder="Your Name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="contact-email" placeholder="Your Email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-subject" placeholder="Subject" name="subject" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message" name="message" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn alazea-btn mt-15">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <!-- Google Maps -->
                    <div class="map-area mb-100">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2747560900866!2d108.24145911439123!3d-7.323003974045296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f59364112fc1d%3A0x7e2d5ad4671e9d5!2sPT+Global+Heksa+Natura!5e0!3m2!1sid!2sid!4v1550794514634" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    

        <!-- Footer Bottom Area -->
        <?php
            $this->load->view('v_footer');
        ?> 
        
</body>

</html>
