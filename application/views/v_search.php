<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search Product | Serba Kelapa</title>
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

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area footer-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url(); ?>assets/img/bg-img/header2.png);">
            <h2><?php echo $jenis; ?></h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $jeniss; ?> Products</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Shop Area Start ##### -->
    <section class="shop-page section-padding-0-100">
        <div class="container">
            <div class="row">
                <!-- Shop Sorting Data -->
                <div class="col-12">
                    <div class="shop-sorting-data d-flex flex-wrap align-items-center justify-content-between">
                        <!-- Shop Page Count -->
                        <div class="shop-page-count">
                            <?php
                            $cntSearch=0;
                                foreach ($data_search as $all){
                                    $cntSearch++;
                                }
                            ?>
                            <p>Showing <?php echo $cntSearch; ?> Results</p>
                        </div>
                        <!-- Search by Terms -->
                        <div class="search_by_terms">
                            <form action="<?php echo base_url(); ?>search/searchSort/" method="GET" class="form-inline">
                                <select name="sort" onchange="this.form.submit()" class="custom-select widget-title">
                                    <?php
                                        if ($urutkan == ""){
                                        echo "<option value='id' selected>Sort by Product ID</option>
                                        <option value='alphabet'>Sort by Alphabet</option>
                                        <option value='low'>Sort by Lowest Price</option>
                                        <option value='high'>Sort by Highest Price ".$urutkan."</option>";}
                                        if ($urutkan == "id"){
                                            echo "<option value='id' selected>Sort by Product ID</option>
                                            <option value='alphabet'>Sort by Alphabet</option>
                                            <option value='low'>Sort by Lowest Price</option>
                                            <option value='high'>Sort by Highest Price</option>";}
                                        if ($urutkan == "alphabet"){
                                            echo "<option value='id' value=''>Sort by Product ID</option>
                                            <option value='alphabet' selected>Sort by Alphabet</option>
                                            <option value='low'>Sort by Lowest Price</option>
                                            <option value='high'>Sort by Highest Price</option>";}
                                        if ($urutkan == "low"){
                                            echo "<option value='id' value=''>Sort by Product ID</option>
                                            <option value='alphabet'>Sort by Alphabet</option>
                                            <option value='low' selected>Sort by Lowest Price</option>
                                            <option value='high'>Sort by Highest Price</option>";}
                                        if ($urutkan == "high"){
                                            echo "<option value='id' value=''>Sort by Product ID</option>
                                            <option value='alphabet'>Sort by Alphabet</option>
                                            <option value='low'>Sort by Lowest Price</option>
                                            <option value='high' selected>Sort by Highest Price</option>";}
                                    ?>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar Area -->
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop-sidebar-area">

                        <!-- Shop Widget -->
                        
                        <div class="shop-widget best-seller mb-50">
                            <h4 class="widget-title">Best Products</h4>
                            <div class="widget-desc">
                               
                                    <?php
                                        foreach($best_product as $best){
                                            echo " <div class='single-best-seller-product d-flex align-items-center'>
                                                <div class='product-thumbnail'>
                                                    <a href='".base_url()."product/detailProduct/".$best->id_product."/'><img src='".base_url()."assets/products/".$best->productImage."' alt=''></a>
                                                </div>
                                                <div class='product-info'>
                                                    <a href='".base_url()."product/detailProduct/".$best->id_product."/'>".$best->productName."</a>
                                                    <p>Rp. ".strrev(implode('.',str_split(strrev(strval($best->productPrice)),3)))."</p>
                                                    <div class='ratings'>
                                                        <i class='fa fa-star'></i>
                                                        <i class='fa fa-star'></i>
                                                        <i class='fa fa-star'></i>
                                                        <i class='fa fa-star'></i>
                                                        <i class='fa fa-star'></i>
                                                    </div>
                                                </div>
                                                </div>";
                                        }
                                    ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- All Products Area -->
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop-products-area">
                        <div class="row" id='pagin'>
                            <?php
                            $tampungLoop=0;
                            if ($type==0){
                                foreach ($data_search as $product){
                                    echo "<div  class='col-12 col-sm-6 col-lg-4'>
                                            <div class='single-product-area mb-50'>
                                                <div class='product-img'>
                                                    <img style='height:250px;' src='".base_url()."assets/products/".$product->productImage."' alt=''>
                                                    <div class='product-tag'>
                                                        <a href='#'>Hot</a>
                                                    </div>
                                                    <div class='product-meta d-flex'>
                                                        <a></a>
                                                        <a href='".base_url()."product/detailProduct/".$product->id_product."/' class='add-to-cart-btn'>Add to cart</a>
                                                        <a></a>
                                                    </div>
                                                </div>
                                                <div class='product-info mt-15 text-center'>
                                                    <a href='".base_url()."product/detailProduct/".$product->id_product."/''".base_url()."product/detailProduct/".$product->id_product."/'>
                                                        <p>".$product->productName."</p>
                                                    </a>
                                                    <h6>Rp. ".strrev(implode('.',str_split(strrev(strval($product->productPrice)),3)))."</h6>
                                                </div>
                                            </div>
                                        </div>";
                                        $tampungLoop++;
                                    }
                                    if ($tampungLoop == 0){
                                        echo '<h4 style="color:red;">Pencarian "'.$jeniss.'" Tidak Ditemukan di Semua Product</h4>';
                                    }
                                }
                            if ($type==1){
                                foreach ($data_CHC as $product){
                                    echo "<div  class='col-12 col-sm-6 col-lg-4'>
                                            <div class='single-product-area mb-50'>
                                                <div class='product-img'>
                                                    <img style='height:250px;' src='".base_url()."assets/products/".$product->gambar_product."' alt=''>
                                                    <div class='product-tag'>
                                                        <a href='#'>Hot</a>
                                                    </div>
                                                    <div class='product-meta d-flex'>
                                                        <a style='opacity:0;'></a>
                                                        <a href='".base_url()."product/detailProduct/".$product->id_product."/' class='add-to-cart-btn'>Add to cart</a>
                                                        <a style='opacity:0;'></a>
                                                    </div>
                                                </div>
                                                <div class='product-info mt-15 text-center'>
                                                    <a href='".base_url()."product/detailProduct/".$product->id_product."/'>
                                                        <p>".$product->nama_product."</p>
                                                    </a>
                                                    <h6>Rp. ".strrev(implode('.',str_split(strrev(strval($product->harga_product)),3)))."</h6>
                                                </div>
                                            </div>
                                        </div>";
                                        $tampungLoop++;
                                    }
                                    if ($tampungLoop == 0){
                                        echo '<h4 style="color:red;">Pencarian "'.$jeniss.'" Tidak Ditemukan di Product Cosmetic & Home Care</h4>';
                                    }
                                }
                            if ($type==2){
                                foreach ($data_HFB as $product){
                                    echo "<div  class='col-12 col-sm-6 col-lg-4'>
                                            <div class='single-product-area mb-50'>
                                                <div class='product-img'>
                                                    <img style='height:250px;' src='".base_url()."assets/products/".$product->gambar_product."' alt=''>
                                                    <div class='product-tag'>
                                                        <a href='#'>Hot</a>
                                                    </div>
                                                    <div class='product-meta d-flex'>
                                                        <a></a>
                                                        <a href='".base_url()."product/detailProduct/".$product->id_product."/' class='add-to-cart-btn'>Add to cart</a>
                                                        <a></a>
                                                    </div>
                                                </div>
                                                <div class='product-info mt-15 text-center'>
                                                    <a href='".base_url()."product/detailProduct/".$product->id_product."/'>
                                                        <p>".$product->nama_product."</p>
                                                    </a>
                                                    <h6>Rp. ".strrev(implode('.',str_split(strrev(strval($product->harga_product)),3)))."</h6>
                                                </div>
                                            </div>
                                        </div>";
                                        $tampungLoop++;
                                    }
                                    if ($tampungLoop == 0){
                                        echo '<h4 style="color:red;">Pencarian "'.$jeniss.'" Tidak Ditemukan di Product Healthy Food & Beverage</h4>';
                                    }
                                }
                            if ($type==3){
                                foreach ($data_Herbs as $product){
                                    echo "<div  class='col-12 col-sm-6 col-lg-4'>
                                            <div class='single-product-area mb-50'>
                                                <div class='product-img'>
                                                    <img style='height:250px;' src='".base_url()."assets/products/".$product->gambar_product."' alt=''>
                                                    <div class='product-tag'>
                                                        <a href='#'>Hot</a>
                                                    </div>
                                                    <div class='product-meta d-flex'>
                                                        <a></a>
                                                        <a href='".base_url()."product/detailProduct/".$product->id_product."/' class='add-to-cart-btn'>Add to cart</a>
                                                        <a></a>
                                                    </div>
                                                </div>
                                                <div class='product-info mt-15 text-center'>
                                                    <a href='".base_url()."product/detailProduct/".$product->id_product."/'>
                                                        <p>".$product->nama_product."</p>
                                                    </a>
                                                    <h6>Rp. ".strrev(implode('.',str_split(strrev(strval($product->harga_product)),3)))."</h6>
                                                </div>
                                            </div>
                                        </div>";
                                        $tampungLoop++;
                                    }
                                    if ($tampungLoop == 0){
                                        echo '<h4 style="color:red;">Pencarian "'.$jeniss.'" Tidak Ditemukan di Product Herbs</h4>';
                                    }
                                }
                            ?>
                        </div>
                        <!-- Pagination -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/pagination/src/jquery.paginate.js"></script>

    <script>
        //call paginate
        $('#pagin').paginate();
    </script>

        <!-- Footer Bottom Area -->
        <?php
            $this->load->view('v_footer');
        ?> 
    
</body>

</html>