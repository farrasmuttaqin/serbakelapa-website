<?php
	foreach ($data_userTrue as $akun){
		$this->session->set_userdata("id_user",$akun->id_user);
		$this->session->set_userdata("nama_lengkap",$akun->nama_lengkap);
		$this->session->set_userdata("email",$akun->email);
		$this->session->set_userdata("awal_join",$akun->awal_join);
		$this->session->set_userdata("nomor_hp",$akun->nomor_hp);
    }

    $name = $this->session->userdata("nama_lengkap");
    $parts = explode(' ', $name);
    $firstname = $parts[0];
	
   	$this->session->set_userdata("nama_depan",trim($firstname));
    $tampung = base_url();
   	header("Location: $tampung");
?>