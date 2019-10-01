<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
        <h1>Data Kamar</h1>
        
        <div class="row">
            <table class="table" id="myTable">
                <caption style="caption-side: top; padding:0;">
                
                    <!-- Material input -->
                    <div class="md-form col-sm-4">
                        <input type="text" id="myInput" class="form-control">
                        <label for="form1">Cari Tamu</label>
                    </div>
                </caption>
                <thead>
                    <tr>
                        <th scope="col">Aksi</th>
                        <th scope="col">No.</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nama Asli</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telepon</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                
                if($tamus->num_rows() > 0){
                    $no = 1;
                    foreach($tamus->result() as $tamu){
                ?>
                    <tr>
                        <td><a class="text-info" href="<?=site_url()?>admin/ubah_tamu_form"><a href="#">Lihat</a>
                        <?=$tamu->idtamu!=14?" | <a href='#'>Hapus</a>":""?>
                        
                        
                        </td>
                        <td><?=$no?></td>
                        <td><?=$tamu->username?></td>
                        <td><?=$tamu->email?></td>
                        <td><?=$tamu->nama?></td>
                        <td><?=$tamu->alamat?></td>
                        <td><?=$tamu->telepon?></td>
                    </tr>
                <?php
                    $no++;
                    }
                }
                ?>

                </tbody>
            </table>
            
        <div class="row">
            <div class="col">
                <?=$pagination?>
            </div>
        </div>

        </div>
    </div>
</main>
