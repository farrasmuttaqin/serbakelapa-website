<?php
	foreach ($data_userTrue as $akun){
       $this->session->set_userdata("nama_lengkap_admin",$akun->nama_lengkap);
    }
   	
    $tampung = base_url()."Admin_Dashboard/";
   	header("Location: $tampung");
?>