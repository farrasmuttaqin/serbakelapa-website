<?php
    foreach($cart as $keranjangG){
        $totalCart++;
    }
    if ($totalCart == ""){
        $totalCart = 0;
    }
?>
<div class="top-header-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                    if (!$_SESSION["email"]=="")
                    {
                        echo "<div class='top-header-content d-flex align-items-center justify-content-between'>
                                <!-- Top Header Content -->
                                <div class='top-header-meta'>
                                    <a style='font-size:16px;' href='https://mail.google.com/mail/?view=cm&fs=1&to=serbakelapa@gmail.com'  title='serbakelapa@gmail.com'><i class='fa fa-envelope-o' aria-hidden='true'></i><span>serbakelapa@gmail.com</span></a>
                                    <a style='font-size:16px;' href='https://api.whatsapp.com/send?phone=628170808132&amp;text=Hi%20Serba%20Kelapa!!'  title='+62 812-9425-9494'><i class='fa fa-whatsapp' aria-hidden='true'></i><span>+62 812-9425-9494</span></a>
                                </div>
                                <div class='top-header-meta d-flex'>
                                    <div class='login'>
                                        <a style='font-size:16px;' href='".base_url()."profile'><i class='fa fa-user' aria-hidden='true'></i>Hi, ".$this->session->userdata('nama_depan')."</a>
                                    </div>
                                    ";
                                    if ($totalCart == 0){
                                        echo "<div class='cart'>
                                                <a style='font-size:16px;' href='#' "; ?> onclick="return alert('Keranjang anda kosong');" <?php echo " ><i class='fa fa-shopping-cart' aria-hidden='true'></i> ( ".$totalCart." )</a>
                                            </div>";
                                    }else{
                                        echo " <div class='cart'>
                                                    <a style='font-size:16px;' href='".base_url()."cart/cart'><i class='fa fa-shopping-cart' aria-hidden='true'></i> ( ".$totalCart." )</a>
                                                </div>";
                                    }
                                    echo "
                                   
                                </div>
                            </div>";
                    }else{
                        echo "<div class='top-header-content d-flex align-items-center justify-content-between'>
                                <!-- Top Header Content -->
                                <div class='top-header-meta'>
                                    <a style='font-size:16px;' href='https://mail.google.com/mail/?view=cm&fs=1&to=serbakelapa@gmail.com' title='serbakelapa@gmail.com'><i class='fa fa-envelope-o' aria-hidden='true'></i><span>serbakelapa@gmail.com</span></a>
                                    <a style='font-size:16px;' href='https://api.whatsapp.com/send?phone=628170808132&amp;text=Hi%20Serba%20Kelapa!!' title='+62 812-9425-9494'><i class='fa fa-whatsapp' aria-hidden='true'></i><span>+62 812-9425-9494</span></a>
                                </div>
                                <div class='top-header-meta d-flex'>
                                    <div class='login'>
                                        <a style='font-size:16px;' href='".base_url()."login'><i class='fa fa-user' aria-hidden='true'></i>Login / Register</a>
                                    </div>
                                    <div class='cart'>
                                        <a style='font-size:16px;' href='#' "; ?> onclick="return alert('Silahkan login untuk melihat keranjang');" <?php echo " ><i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
                                    </div>
                                </div>
                            </div>";
                        }
                ?>
                
            </div>
        </div>
    </div>
</div>
