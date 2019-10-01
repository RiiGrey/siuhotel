
<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
        <div class="row">
        <?php 
         if($pemesanans->num_rows() > 0){
            foreach($pemesanans->result() as $pemesanan){
                $tglpembayaran = date("Y-m-d", strtotime($pemesanan->batasbayar));
                $jampembayaran = date("H:i:s", strtotime($pemesanan->batasbayar));
                
        ?>

            <div class="col-4 mt-5">
                <!-- Card Dark -->
                <div class="card">
                    <!-- Card image -->
                    <div class="view overlay">
                        <img width="200" height="200" class="card-img-top" src="<?=site_url()?>uploads/admin/kamar/<?=$pemesanan->gambar?>" alt="Card image cap">
                        <a>
                        <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <!-- Card content -->
                    <div class="card-body elegant-color white-text rounded-bottom">
                        <!-- Title -->
                        <h4 class="card-title text-center text-success"><?=$pemesanan->tipe?></h4>
                        <p class="text-center text-info">Tanggal Pemesanan : <?=$pemesanan->tglpesan?></p>
                        <p class="text-center text-info">Atas Nama : <?=$pemesanan->nama?></p>

                        <hr class="hr-light">
                        <!-- Text -->
                        <div class="text-center">
                            <p class="text-center text-info">Tanggal Check-In : <?=$pemesanan->tglmasuk?></p>
                            <p class="text-center text-info">Tanggal Check-Out : <?=$pemesanan->tglkeluar?></p>
                            <p class="text-center text-info">Lama Menginap : <?=$pemesanan->lamahari?> Hari</p>
                            <h5>Total Bayar : Rp. <?=$pemesanan->totalbayar?></h5>
                            <?php 
                            
                                if($pemesanan->status == 'Pending...'){
                                    $status="<span class='text-warning'>". $pemesanan->status ."</span>";
                            ?>

                                <p class="text-center">Status Transaksi : <?=$status?>
                                </p>

                                <p class="text-center text-warning">Segera Lakukan Pembayaran Sebelum : <br />
                                Tanggal : <?=$tglpembayaran?>
                                Jam : <?=$jampembayaran?>
                                </p>
                            
                                <!-- Link -->                      
                                <a href="<?=site_url()?>tamu_kamar/pembayaran_form/<?=$pemesanan->idpesan?>" class="btn btn-info">Pembayaran</a>
                            <?php
                                }else if($pemesanan->status == 'Konfirmasi'){
                                $status="<span class='text-default'>Menggunggu ". $pemesanan->status ."</span>";
                            ?>

                                <p class="text-center">Status Transaksi : <?=$status?>
                                </p>

                            <?php
                                    
                                }else if($pemesanan->status == 'Dibatalkan'){
                                    $status="<span class='text-danger'>". $pemesanan->status ."</span>";
                            ?>

                                <p class="text-center">Status Transaksi : <?=$status?>
                                </p>
                            <?php

                                }else if($pemesanan->status == 'Berhasil'){
                                    $status="<span class='text-success'>". $pemesanan->status ."</span>";
                            ?>

                                <p class="text-center">Status Transaksi : <?=$status?>
                                </p>
                            <?php

                                }else{
                            ?>

                                <p class="text-center">ERROR <?=$status?>
                                </p>
                            <?php
                                }
                            
                            ?>
                        </div>

                    </div>

                </div>
            </div>
        
        <?php
            }
        }
        ?>
           
        </div>
        
    </div>
</main>