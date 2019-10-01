<!--Main Navigation-->
<header>
<div class="container-fluid">
  <nav class="navbar fixed-top navbar-expand-md navbar-light white double-nav scrolling-navbar">
    <a class="navbar-brand" href="#"><strong>SIUHotel</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=site_url()?>tamu_kamar">Kamar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Fasilitas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=site_url()?>tamu_kamar/riwayat_pemesanan">Data Reservasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Kontak</a>
        </li>
      </ul>
    </div>
    
    <div class="dropdown show">
      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user"></i> <?=$this->session->userdata('username') ?>
      </a>

      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#"><i class="fas fa-edit"></i>Ubah Data</a>
          <a class="dropdown-item" href="<?php echo base_url() ?>login/logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
      </div>
    </div>
    
  </nav>
</div>
</header>
<!--Main Navigation-->