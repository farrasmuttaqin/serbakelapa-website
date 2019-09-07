<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cart | Serba Kelapa </title>
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
            <h2>Cart</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
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
        <?php   foreach($cart as $keranjang){ 
                        $tampung = $keranjang->productName; 
                    }
                if ($tampung == ""){
                    echo "<div align='center'> <h4 style='color:red;'> Keranjang anda kosong </h4> <br> <a class='btn alazea-btn w-40' href='".base_url()."product'> Belanja Lagi ? </a> </div>";
                }else { ?>
            <div class="row">
                <div class="col-12">

                
                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                                <?php if ($this->session->flashdata("namacart") != "") { ?>
                                    <tr>
                                        <th colspan="7" style="text-align:center;color:green;">Berhasil menghapus <?php echo $this->session->flashdata("namacart"); ?> dari keranjang</th>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <th colspan="2">Produk</th>
                                    <th>Berat</th>
                                    <th>Harga</th>
                                    <th>Kuantitas</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="pagin">
                                <?php foreach($cart as $keranjang){ 
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
                                            <?php
                                                if ($keranjang->quantity > 1) {
                                            ?>
                                            <a href="<?php echo base_url()."cart/kurang/".$keranjang->id_product."/"; ?>"><span class="qty-minus" ><i class="fa fa-minus" aria-hidden="true"></i></span></a>
                                            <?php } ?>
                                            <input readonly="readonly" type="number" class="qty-text" id="qty" step="1" min="1" max="99" name="quantity" value="<?php echo $keranjang->quantity; ?>">
                                            <?php
                                                if ($keranjang->quantity < $keranjang->productStock) {
                                            ?>
                                            <a href="<?php echo base_url()."cart/tambah/".$keranjang->id_product."/".$keranjang->productName; ?>"> <span onclick="<?php echo base_url()."cart/tambah/"; ?>; return false" class="qty-plus" ><i class="fa fa-plus" aria-hidden="true"></i></span></a>
                                            <?php } ?>
                                        </div>
                                        <br>
                                        Stock di Gudang : <?php echo $keranjang->productStock; ?> Buah
                                    </td>
                                    <td ><span><?php echo "Rp. ".strrev(implode('.',str_split(strrev(strval($total)),3))); ?></span></td>
                                    <td class="action"><a href="<?php echo base_url()."cart/delete/".$keranjang->id_order_detail."/".$keranjang->productName; ?>" onclick="return confirm('Hapus Product dari Keranjang ?');"><i class="icon_close"></i></a></td>
                                </tr>
                                <?php } 
                                if ($keranjang->productName == ""){
                                    redirect(base_url());
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
                <div class="col-12 col-lg-12">
                    <div class="cart-totals-area mt-70">
                        <form action="<?php echo base_url(); ?>checkout/checkout" method="post" onsubmit="return confirm('Lokasi Tujuan Sudah Yakin Benar?') " >
                        <input type="hidden" value="1" id="berat" name="beratG" /> 
                        <input type="hidden" id="sel1" />
				        <input type="hidden" id="sel2" />
                            
                            <div class="subtotal d-flex justify-content-between">
                                <h5>Alamat Pengiriman : </h5>
                                <h5>Jl. KH. Tubagus Abdullah, RT.007/RW.02, Sukaasih, Purbaratu, Tasikmalaya, Jawa Barat 46196.</h5>
                            </div>
                            <div class="shipping d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                <h5>Alamat Tujuan :</h5>
                                <div class="shipping-address" >
                                    <select name="provG" class="form-control" id="sel11" style="font-size:18px;" required>
                                        <option value=""> Pilih Provinsi</option>            
                                    </select>
                                    <input type="hidden" name="provGG" id="provGG" />
                                </div>
                            </div>
                            <div class="shipping d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                <h5></h5>
                                <div class="shipping-address" >
                                    <select name="kotaG" class="form-control" id="sel22" style="font-size:18px;display:none;" required>
                                        <option value=""> Pilih Kota</option>            
                                    </select>
                                    <input type="hidden" name="kotaGG" id="kotaGG" />
                                </div>
                            </div>
                            <div class="shipping d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                <h5></h5>
                                <div class="shipping-address">  
                                    <input class="form-control" style="font-size:18px;display:none;max-width:300px;" type="text" placeholder="Detail Alamat"  name="newAddress" id="newAddress" pattern=".{25,}" title="Harap Masukkan Detail Alamat Dengan Benar, Contoh : jl kencana no 05, Kelurahan Aren Jaya, Kecamatan Bekasi Timur" required />
                                </div>
                            </div>
                            <div class="shipping d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                <h5></h5>
                                <div class="shipping-address" id="alamatBaru"   >  
                                    <select name="kurirG" class="form-control" id="kurir" style="font-size:18px;display:none;"  required>
                                        <option value=""> Pilih Kurir</option>
                                        <option value="jne">JNE</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="shipping d-flex justify-content-between" style="margin-bottom:-30px;border-bottom:0px solid;">
                                <h5></h5>
                                <div class="shipping-address" id="alamatBaru"   >  
                                    <select class="form-control" id="hasil" style="font-size:18px;display:none;"  required>
                                        <option value=""> Pilih Paket</option>            
                                    </select>
                                    <input type="hidden" name="paketG" id="paketG" />
                                </div>
                            </div>
                            <div class="shipping d-flex justify-content-between">
                                <h5>Catatan Pengiriman : </h5>
                                <div class="shipping-address">
                                    <textarea rows="3" cols="50" class="form-control" name="noteG" placeholder="Silahkan masukkan catatan penting kamu... (boleh di kosongkan karena bersifat optional)" ></textarea>
                                </div>
                            </div>
                            
                            <div class="subtotal d-flex justify-content-between">
                                <h5>Durasi Pengiriman : </h5>
                                <h5 id="durasi" style="color:green;">Durasi Pengiriman Belum Ditentukan</h5>
                                <input type="hidden" id="durasiG" name="durasiG" /> 
                            </div>

                            <div class="subtotal d-flex justify-content-between">
                                <h5>Ongkos Kirim : </h5>
                                <h5 id="ongkir" style="color:green;">Ongkir Belum Ditentukan</h5>
                                <input type="hidden" id="ongkirG" name="ongkirG" /> 
                            </div>
                            <div class="subtotal d-flex justify-content-between">
                                <h5>Sub Total (Biaya Total + PPN 5%) : </h5>
                                <?php $subtotal=($subTotal*0.05)+$subTotal; ?>
                                <h5 id="subtotal" style="color:green;">Subtotal Belum Ditentukan</h5>
                                <input type="hidden" id="subtotaltotal" value="<?php echo $subtotal ?>" />
                                <input type="hidden" id="subtotalZ" name="subtotalZ" /> 
                            
                            
                            </div>
                            <div class="total d-flex justify-content-between">
                                <h5 style="color:red;">Grand Total</h5>
                                <h4 id="total" style="color:red;">Grand Total Belum Ditentukan</h4>
                                <input type="hidden" id="totalZ" name="totalZ" /> 
                            </div>
                            <div class="total d-flex justify-content-between">
                                <h5 style="color:red;">Metode Pembayaran</h5>
                                <div class="shipping-address" >
                                    <select name="metodeG" class="form-control" style="font-size:18px;" required>
                                        <option value=""> Pilih Metode Pembayaran</option>
                                        <option value="Transfer BCA"> Transfer Melalui BCA</option>     
                                        <option value="Transfer BRI"> Transfer Melalui BRI</option>                 
                                    </select>
                                </div>
                            </div>
                            <div class="total d-flex justify-content-between">
                                <a href="<?php echo base_url()."product/"; ?>" class="btn alazea-btn w-40">Beli Product yang Lain</a>
                                <input type="submit" class="btn alazea-btn w-40" value="Lanjut Checkout">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <script>
        const numInputs = document.querySelectorAll('input[type=number]')

            numInputs.forEach(function (input) {
            input.addEventListener('change', function (e) {
                if (e.target.value == '') {
                e.target.value = 0
                }
            })
        })
    </script>



    
<script type="text/javascript">
  
  function getLokasi() {
    var $op = $("#sel1"),$oc = $("#sel2"), $op1 = $("#sel11");
    $op.val(9); 
    $oc.val(469);
    $.getJSON("provinsi", function(data){  
      $.each(data, function(i,field){  
         $op1.append('<option value="'+field.province_id+'">'+field.province+'</option>'); 
  
      });
      
    });
   
  }
  
  getLokasi();
  
  $("#sel11").on("change", function(e){
    e.preventDefault();
    var option = $('option:selected', this).val(); 
    var optionText = $("option:selected", this).text();
    $('#sel22 option:gt(0)').remove();
    $('#kurir').val('');
    $("#hasil").val(''); 
    $('#newAddress').val('');
    
    $("#newAddress").hide();
    $("#kurir").hide();
    $("#hasil").hide();
  
    if(option==='')
    {  
      $("#sel22").hide();
      $("#newAddress").hide();
      $("#kurir").hide();
      $("#hasil").hide();
      $("#ongkir").html('Ongkir Belum Ditentukan');
      $("#durasi").html('Durasi Pengiriman Belum Ditentukan');
      $("#subtotal").html('Subtotal Belum Ditentukan');
      $("#total").html('Total Belum Ditentukan');
    }
    else
    {        
      $("#provGG").val(optionText);
      $("#sel22").show();
      getKota1(option);
    }
  });
  
  
  
  
  
  
  $("#sel22").on("change", function(e){
    e.preventDefault();
    var option = $('option:selected', this).val(); 
    var optionText = $("option:selected", this).text();  
    $('#kurir').val('');
    $("#hasil").val(''); 

    $("#kurir").hide();
    $("#hasil").hide();

    $('#newAddress').val('');
    if(option==='')
    {   
      $("#newAddress").hide();
      $("#kurir").hide();
      $("#hasil").hide();
      $("#ongkir").html('Ongkir Belum Ditentukan');
      $("#durasi").html('Durasi Pengiriman Belum Ditentukan');
      $("#subtotal").html('Subtotal Belum Ditentukan');
      $("#total").html('Total Belum Ditentukan');
    }
    else
    {        
      $("#kotaGG").val(optionText);
      $("#newAddress").show(); 
    }
  });
  
  $("#newAddress").on("keyup", function(e){
    $('#kurir').val('');
    $("#hasil").val(''); 

    $("#kurir").hide();
    $("#hasil").hide();
    var totals = $("#newAddress").val().length;
    if(totals>15){   
        $("#kurir").show();
        $("#ongkir").html('Ongkir Belum Ditentukan');
        $("#durasi").html('Durasi Pengiriman Belum Ditentukan');
        $("#subtotal").html('Subtotal Belum Ditentukan');
        $("#total").html('Total Belum Ditentukan');
    }else{
        $("#kurir").hide();
        $("#hasil").hide();
    }
  });
  
  
  
  $("#kurir").on("change", function(e){
    e.preventDefault();
    var option = $('option:selected', this).val();    
    var origin = $("#sel2").val();
    var des = $("#sel22").val();
    var qty = $("#berat").val();
    $('#hasil').val('');
  
   
    if(option==='')
    { 
      $("#hasil").hide();
      $("#ongkir").html('Ongkir Belum Ditentukan');
      $("#durasi").html('Durasi Pengiriman Belum Ditentukan');	
      $("#subtotal").html('Subtotal Belum Ditentukan');
      $("#total").html('Total Belum Ditentukan');
    }
    else
    {         
      getOrigin(origin,des,qty,option);
      $("#hasil").show();
    }
  });
  
  
  function getOrigin(origin,des,qty,cour) {
    var $op = $("#hasil"); 
    var $id = $("#ongkir");
    var $durasi = $("#durasi");
    var i, j, x = "";
    if ($op !== '') {
        $op.html("<option value=''>Pilih Paket</option");
    }
   
    $.getJSON("tarif/"+origin+"/"+des+"/"+qty+"/"+cour, function(data){     
      $.each(data, function(i,field){  
          
        for(i in field.costs)
        {	
              $op.append("<option value='"+field.costs[i].service+"'>("+ field.costs[i].service +") "+field.costs[i].description+"</option>");
        }
       
  
      });
    });
   
  }
  
  $("#hasil").on("change", function(e){
    e.preventDefault();
    var option = $('option:selected', this).val();    
    var origin = $("#sel2").val();
    var des = $("#sel22").val();
    var qty = $("#berat").val();
    var cour = $("#kurir").val();
    var $id = $("#ongkir");
    var $durasi = $("#durasi");
    
    
    var $subtotaltotal = $("#subtotaltotal");
    var $subtotal = $("#subtotal");
    var $subtotalZ = $("#subtotalZ");
    
    
    var $total = $("#total");
    var $totalZ = $("#totalZ");
  
    if (option ===''){
      $("#ongkir").html('Ongkir Belum Ditentukan');
      $("#durasi").html('Durasi Pengiriman Belum Ditentukan');	
      $("#subtotal").html('Subtotal Belum Ditentukan');
      $("#total").html('Total Belum Ditentukan');
    }else{
  
   
    
     $.getJSON("tarif/"+origin+"/"+des+"/"+qty+"/"+cour, function(data){     
      $.each(data, function(i,field){
  
          for(i in field.costs){
              
                  if(field.costs[i].service == option){
                       $("#paketG").val("("+field.costs[i].service+") "+field.costs[i].description);
                       for (j in field.costs[i].cost) {
                           
                          
                          var bilangan = field.costs[i].cost[j].value;
                          $("#ongkirG").val(field.costs[i].cost[j].value);
          
                          var	reverse = bilangan.toString().split('').reverse().join(''),
                              ribuan 	= reverse.match(/\d{1,3}/g);
                              ribuan	= ribuan.join('.').split('').reverse().join('');
                              
                              $id.html("Rp. "+ribuan);
                              $durasi.html(field.costs[i].cost[j].etd+" Hari");
                              $("#durasiG").val(field.costs[i].cost[j].etd+" Hari");
                              
                          var bilanganSub = parseFloat($subtotaltotal.val(), 10)+(parseFloat($subtotaltotal.val(), 10)*0.05);
          
                          var	reverseSub = bilanganSub.toString().split('').reverse().join(''),
                              ribuanSub 	= reverseSub.match(/\d{1,3}/g);
                              ribuanSub	= ribuanSub.join('.').split('').reverse().join('');
                          
  
                          $subtotal.html("Rp. "+ribuanSub);
                          $subtotalZ.val(bilanganSub);
                          
                          var totalZZZ = bilanganSub + field.costs[i].cost[j].value
                          var	reverseTotal = totalZZZ.toString().split('').reverse().join(''),
                              ribuanTotal 	= reverseTotal.match(/\d{1,3}/g);
                              ribuanTotal	= ribuanTotal.join('.').split('').reverse().join('');
                              
                              
                          $total.html("Rp. "+ribuanTotal);
                          $totalZ.val(totalZZZ);
                          
                      }
                  }
          }
      });
    });
    }
  });
  
  
  function getKota1(idpro) {
    var $op = $("#sel22"); 
    
    $.getJSON("kota/"+idpro, function(data){      
      $.each(data, function(i,field){  
      
  
         $op.append('<option value="'+field.city_id+'">'+field.type+' '+field.city_name+'</option>'); 
  
      });
      
    });
  
  
  }
  
  
  </script>
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