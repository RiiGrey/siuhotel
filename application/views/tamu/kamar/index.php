
<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
        <h1>Daftar Kamar</h1>
        <div class="row">
            <?php 
            if($kamars->num_rows() > 0){
                foreach($kamars->result() as $kamar){
                    $kamar_harga = "Rp. " . $kamar->harga;
                    $kamar_jumlah = "Tersedia " . $kamar->jumlah . " Kamar"; 
            ?>
            
            <div class="col-sm">
                <!-- Card Dark -->
                <div class="card">

                    <!-- Card image -->
                    <div class="view overlay">
                        <img width="200" height="200" class="card-img-top" src="<?=site_url()?>uploads/admin/kamar/<?=$kamar->gambar?>" alt="Card image cap">
                        <a>
                        <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <!-- Card content -->
                    <div class="card-body elegant-color white-text rounded-bottom">
                        <!-- Title -->
                        <h4 class="card-title text-info"><?=$kamar->tipe?></h4>
                        <hr class="hr-light">
                        <!-- Text -->
                        <h5><?=$kamar_harga?></h5>
                        <div class="text-center">
                            <p class="text-center text-info"><?=$kamar_jumlah?></p>
                            <!-- Link -->                      
                            <a href="<?=site_url()?>tamu_kamar/pesan_form/<?=$kamar->idkamar?>" class="btn btn-info">Pesan</a>
                        </div>

                    </div>

                </div>
                <!-- Card Dark -->
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</main>